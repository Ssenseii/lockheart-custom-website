<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReferenceResource\Pages;
use App\Models\Reference;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\{TextInput, Textarea, FileUpload, Tabs, Toggle};
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn};
use Filament\Tables\Filters\SelectFilter;

class ReferenceResource extends Resource
{
    protected static ?string $model = Reference::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $modelLabel = 'Reference';

    protected static ?string $navigationLabel = 'References';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Reference Details')
                    ->tabs([
                        Tabs\Tab::make('Basic Information')->schema([
                            FileUpload::make('company_logo')
                                ->label('Company Logo')
                                ->image()
                                ->directory('references/logos')
                                ->imageEditor()
                                ->columnSpanFull(),

                            TextInput::make('company_name')
                                ->required()
                                ->maxLength(255)
                                ->columnSpanFull(),

                            TextInput::make('title')
                                ->required()
                                ->maxLength(255)
                                ->columnSpanFull(),

                            Textarea::make('description')
                                ->nullable()
                                ->rows(5)
                                ->columnSpanFull(),

                            Toggle::make('is_published')
                                ->label('Published')
                                ->default(true),
                        ])->columns(1),
                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('company_logo')
                    ->label('Logo')
                    ->circular()
                    ->size(40),

                TextColumn::make('company_name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->description(fn($record) => str($record->description)->limit(50)),

                IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M d, Y')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('is_published')
                    ->options([
                        '1' => 'Published',
                        '0' => 'Unpublished',
                    ])
                    ->label('Status'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
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
            'index' => Pages\ListReferences::route('/'),
            'create' => Pages\CreateReference::route('/create'),
            'edit' => Pages\EditReference::route('/{record}/edit'),
        ];
    }
}
