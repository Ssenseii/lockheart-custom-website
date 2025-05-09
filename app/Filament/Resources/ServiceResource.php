<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\{TextInput, Textarea, Select, RichEditor, Repeater, FileUpload, Grid, Tabs, TagsInput, Toggle, UrlInput};
use Filament\Tables\Columns\{TextColumn, BadgeColumn};
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Str;


class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Service Details')
                    ->tabs([
                        Tabs\Tab::make('Basic Info')->schema([
                            TextInput::make('slug')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state)))
                                ->columnSpanFull(),
                            TextInput::make('slug')
                                ->required()
                                ->unique(Service::class, 'slug', ignoreRecord: true)
                                ->maxLength(255)
                                ->columnSpanFull(),
                            TextInput::make('category')
                                ->nullable()
                                ->maxLength(255)
                                ->columnSpanFull(),
                            Textarea::make('short_description')
                                ->nullable()
                                ->rows(2)
                                ->columnSpanFull(),
                            RichEditor::make('description')
                                ->nullable()
                                ->columnSpanFull(),
                        ])->columns(1),

                        Tabs\Tab::make('Features & Steps')->schema([
                            Repeater::make('features')
                                ->schema([
                                    TextInput::make('value')
                                        ->label('Feature')
                                        ->nullable()
                                        ->columnSpanFull(),
                                ])
                                ->nullable()
                                ->columnSpanFull()
                                ->defaultItems(1)
                                ->reorderable()
                                ->collapsible(),

                            Repeater::make('workflow_steps')
                                ->schema([
                                    TextInput::make('title')
                                        ->nullable()
                                        ->columnSpanFull(),
                                    Textarea::make('description')
                                        ->rows(2)
                                        ->nullable()
                                        ->columnSpanFull(),
                                ])
                                ->nullable()
                                ->columnSpanFull()
                                ->defaultItems(1)
                                ->reorderable()
                                ->collapsible(),
                        ])->columns(1),

                        Tabs\Tab::make('Pricing')->schema([
                            TextInput::make('price')
                                ->nullable()
                                ->numeric()
                                ->prefix('$')
                                ->columnSpanFull(),
                            TextInput::make('discount_price')
                                ->nullable()
                                ->numeric()
                                ->prefix('$')
                                ->columnSpanFull(),
                            TextInput::make('pricing_note')
                                ->nullable()
                                ->maxLength(255)
                                ->columnSpanFull(),
                        ])->columns(1),

                        Tabs\Tab::make('Media')->schema([
                            FileUpload::make('image_url')
                                ->nullable()
                                ->image()
                                ->directory('services')
                                ->columnSpanFull(),
                            FileUpload::make('gallery')
                                ->nullable()
                                ->multiple()
                                ->image()
                                ->directory('services/gallery')
                                ->columnSpanFull(),
                            TextInput::make('video_url')
                                ->nullable()
                                ->label('Video URL')
                                ->url()
                                ->suffixIcon('heroicon-m-globe-alt')
                                ->columnSpanFull(),
                        ])->columns(1),

                        Tabs\Tab::make('Trust & Testimonials')->schema([
                            Repeater::make('testimonials')
                                ->schema([
                                    TextInput::make('author')
                                        ->nullable()
                                        ->columnSpanFull(),
                                    Textarea::make('quote')
                                        ->rows(2)
                                        ->nullable()
                                        ->columnSpanFull(),
                                ])
                                ->nullable()
                                ->defaultItems(1)
                                ->reorderable()
                                ->collapsible()
                                ->columnSpanFull(),

                            Repeater::make('trust_badges')
                                ->schema([
                                    FileUpload::make('image')
                                        ->nullable()
                                        ->image()
                                        ->directory('trust-badges')
                                        ->columnSpanFull(),
                                    TextInput::make('alt')
                                        ->nullable()
                                        ->columnSpanFull(),
                                ])
                                ->nullable()
                                ->defaultItems(1)
                                ->collapsible()
                                ->columnSpanFull(),
                        ])->columns(1),

                        Tabs\Tab::make('Case Studies & FAQs')->schema([
                            Repeater::make('case_studies')
                                ->schema([
                                    TextInput::make('title')
                                        ->nullable()
                                        ->columnSpanFull(),
                                    TextInput::make('url')
                                        ->nullable()
                                        ->suffixIcon('heroicon-m-globe-alt')
                                        ->columnSpanFull(),
                                ])
                                ->nullable()
                                ->collapsible()
                                ->columnSpanFull(),

                            Repeater::make('faqs')
                                ->schema([
                                    TextInput::make('question')
                                        ->nullable()
                                        ->columnSpanFull(),
                                    Textarea::make('answer')
                                        ->nullable()
                                        ->columnSpanFull(),
                                ])
                                ->nullable()
                                ->collapsible()
                                ->columnSpanFull(),
                        ])->columns(1),

                        Tabs\Tab::make('CTA & SEO')->schema([
                            Textarea::make('cta_text')
                                ->nullable()
                                ->rows(2)
                                ->columnSpanFull(),
                            TextInput::make('cta_button_label')
                                ->nullable()
                                ->maxLength(255)
                                ->columnSpanFull(),
                            TextInput::make('cta_button_url')
                                ->nullable()
                                ->suffixIcon('heroicon-m-globe-alt')
                                ->columnSpanFull(),

                            TextInput::make('seo_title')
                                ->nullable()
                                ->maxLength(255)
                                ->columnSpanFull(),
                            TextInput::make('seo_description')
                                ->nullable()
                                ->maxLength(255)
                                ->columnSpanFull(),
                            TagsInput::make('seo_keywords')
                                ->nullable()
                                ->columnSpanFull(),

                            TagsInput::make('tags')
                                ->nullable()
                                ->label('Service Tags')
                                ->columnSpanFull(),
                        ])->columns(1),
                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString(),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->description(fn($record) => str($record->short_description)->limit(50)),

                TextColumn::make('category')
                    ->sortable(),

                TextColumn::make('tags')
                    ->badge()
                    ->separator(','),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M d, Y')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->options(Service::query()->distinct('category')->pluck('category', 'category'))
                    ->searchable()
                    ->preload(),

            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()->icon('heroicon-o-eye'),
                    Tables\Actions\EditAction::make()->icon('heroicon-o-pencil'),
                    Tables\Actions\DeleteAction::make()->icon('heroicon-o-trash'),
                ])
                    ->icon('heroicon-m-ellipsis-vertical')
                    ->size('sm')
                    ->color('gray'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ])->dropdown(false),
            ])
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->deferLoading();
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
