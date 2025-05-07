<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\{TextInput, Textarea, Select, RichEditor, Repeater, FileUpload, Grid, Tabs, TagsInput, Toggle, UrlInput};
use Filament\Tables\Columns\{TextColumn, BadgeColumn};
use Filament\Tables\Filters\Filter;
    
class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Service Details')
                    ->tabs([
                        Tabs\Tab::make('Basic Info')->schema([
                            TextInput::make('title')->required()->maxLength(255)->columnSpanFull(),
                            TextInput::make('slug')->required()->unique(Service::class, 'slug', ignoreRecord: true)->columnSpanFull(),
                            TextInput::make('category')->nullable()->maxLength(255)->columnSpanFull(),
                            Textarea::make('short_description')->rows(2)->columnSpanFull(),
                            RichEditor::make('description')->columnSpanFull(),
                        ])->columns(1), // Force single column layout

                        Tabs\Tab::make('Features & Steps')->schema([
                            Repeater::make('features')
                                ->schema([
                                    TextInput::make('value')->label('Feature')->columnSpanFull(),
                                ])
                                ->columnSpanFull()
                                ->defaultItems(1)
                                ->reorderable(),

                            Repeater::make('workflow_steps')
                                ->schema([
                                    TextInput::make('title')->required()->columnSpanFull(),
                                    Textarea::make('description')->rows(2)->nullable()->columnSpanFull(),
                                ])
                                ->columnSpanFull()
                                ->defaultItems(1)
                                ->reorderable(),
                        ])->columns(1),

                        Tabs\Tab::make('Pricing')->schema([
                            TextInput::make('price')->numeric()->prefix('$')->columnSpanFull(),
                            TextInput::make('discount_price')->numeric()->prefix('$')->columnSpanFull(),
                            TextInput::make('pricing_note')->maxLength(255)->columnSpanFull(),
                        ])->columns(1),

                        Tabs\Tab::make('Media')->schema([
                            FileUpload::make('image_url')->image()->columnSpanFull(),
                            FileUpload::make('gallery')->multiple()->image()->columnSpanFull(),
                            TextInput::make('video_url')->label('Video URL')->url()
                                ->suffixIcon('heroicon-m-globe-alt')->columnSpanFull(),
                        ])->columns(1),

                        Tabs\Tab::make('Trust & Testimonials')->schema([
                            Repeater::make('testimonials')
                                ->schema([
                                    TextInput::make('author')->required()->columnSpanFull(),
                                    Textarea::make('quote')->rows(2)->required()->columnSpanFull(),
                                ])
                                ->defaultItems(1)
                                ->reorderable()
                                ->columnSpanFull(),

                            Repeater::make('trust_badges')
                                ->schema([
                                    FileUpload::make('image')->image()->columnSpanFull(),
                                    TextInput::make('alt')->nullable()->columnSpanFull(),
                                ])
                                ->defaultItems(1)
                                ->columnSpanFull(),
                        ])->columns(1),

                        Tabs\Tab::make('Case Studies & FAQs')->schema([
                            Repeater::make('case_studies')
                                ->schema([
                                    TextInput::make('title')->required()->columnSpanFull(),
                                    TextInput::make('url')
                                        ->suffixIcon('heroicon-m-globe-alt')->required()->columnSpanFull(),
                                ])
                                ->columnSpanFull(),

                            Repeater::make('faqs')
                                ->schema([
                                    TextInput::make('question')->required()->columnSpanFull(),
                                    Textarea::make('answer')->required()->columnSpanFull(),
                                ])
                                ->columnSpanFull(),
                        ])->columns(1),

                        Tabs\Tab::make('CTA & SEO')->schema([
                            Textarea::make('cta_text')->rows(2)->nullable()->columnSpanFull(),
                            TextInput::make('cta_button_label')->maxLength(255)->nullable()->columnSpanFull(),
                            TextInput::make('cta_button_url')->nullable()
                                ->suffixIcon('heroicon-m-globe-alt')->columnSpanFull(),

                            TextInput::make('seo_title')->maxLength(255)->columnSpanFull(),
                            TextInput::make('seo_description')->maxLength(255)->columnSpanFull(),
                            TagsInput::make('seo_keywords')->columnSpanFull(),

                            TagsInput::make('tags')->label('Service Tags')->columnSpanFull(),
                        ])->columns(1),
                    ])
                    ->columnSpanFull() // Make tabs take full width
                    ->persistTabInQueryString(),
            ])
            ->columns(1); // Force single column layout for the entire form
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('category')->sortable(),
                TextColumn::make('price')->money('usd', true),
                TextColumn::make('discount_price')->money('usd', true),
                TextColumn::make('tags')->badge()->separator(', '),
                TextColumn::make('created_at')->label('Created')->dateTime()->sortable(),
            ])
            ->filters([
                Filter::make('category')
                    ->form([
                        TextInput::make('category'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query->when($data['category'], fn($q) => $q->where('category', 'like', '%' . $data['category'] . '%'));
                    }),

                Filter::make('Price Above $100')
                    ->query(fn($query) => $query->where('price', '>', 100)),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
