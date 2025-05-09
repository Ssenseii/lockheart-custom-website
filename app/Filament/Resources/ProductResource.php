<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages\CreateProduct;
use App\Filament\Resources\ProductResource\Pages\EditProduct;
use App\Filament\Resources\ProductResource\Pages\ListProducts;
use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Product;
use App\Models\Service;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\{Fieldset, TextInput, Textarea, Select, RichEditor, Repeater, FileUpload, Grid, KeyValue, Section, Tabs, TagsInput, Toggle, UrlInput};
use Filament\Tables\Columns\{TextColumn, BadgeColumn};
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Str;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Product Details')
                    ->tabs([
                        Tabs\Tab::make('Basic Info')->schema([
                            TextInput::make('name')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state)))
                                ->columnSpanFull(),
                            TextInput::make('slug')
                                ->required()
                                ->unique(Product::class, 'slug', ignoreRecord: true)
                                ->maxLength(255)
                                ->columnSpanFull(),
                            TextInput::make('sku')
                                ->label('SKU')
                                ->unique(Product::class, 'sku', ignoreRecord: true)
                                ->maxLength(255)
                                ->columnSpanFull(),
                            TextInput::make('brand')
                                ->maxLength(255)
                                ->columnSpanFull(),
                            TextInput::make('category')
                                ->maxLength(255)
                                ->columnSpanFull(),
                            Textarea::make('short_description')
                                ->rows(2)
                                ->columnSpanFull(),
                            RichEditor::make('description')
                                ->columnSpanFull(),
                        ])->columns(1),

                        Tabs\Tab::make('Specifications')->schema([
                            Repeater::make('specifications')
                                ->schema([
                                    TextInput::make('key')
                                        ->label('Spec Name')
                                        ->requiredWith('value'),
                                    TextInput::make('value')
                                        ->label('Spec Value'),
                                ])
                                ->defaultItems(1)
                                ->columnSpanFull()
                                ->reorderable()
                                ->collapsible(),

                            Repeater::make('features')
                                ->schema([
                                    TextInput::make('value')
                                        ->label('Feature')
                                        ->columnSpanFull(),
                                ])
                                ->defaultItems(1)
                                ->columnSpanFull()
                                ->reorderable()
                                ->collapsible(),
                        ])->columns(1),

                        Tabs\Tab::make('Pricing & Inventory')->schema([
                            TextInput::make('price')
                                ->required()
                                ->numeric()
                                ->prefix('$'),
                            TextInput::make('sale_price')
                                ->numeric()
                                ->prefix('$'),
                            TextInput::make('stock_quantity')
                                ->required()
                                ->numeric()
                                ->default(0),
                            TextInput::make('weight')
                                ->numeric()
                                ->suffix('grams'),
                            TextInput::make('rating')
                                ->numeric()
                                ->minValue(0)
                                ->maxValue(5)
                                ->step(0.1),
                        ])->columns(2),

                        Tabs\Tab::make('Attributes')->schema([
                            TextInput::make('material')
                                ->maxLength(255),
                            TextInput::make('color')
                                ->maxLength(255),
                            Repeater::make('size_options')
                                ->schema([
                                    TextInput::make('size')
                                        ->requiredWith('price_adjustment'),
                                    TextInput::make('price_adjustment')
                                        ->numeric()
                                        ->prefix('$'),
                                ])
                                ->defaultItems(1)
                                ->columnSpanFull()
                                ->reorderable()
                                ->collapsible(),
                            TextInput::make('warranty')
                                ->maxLength(255),
                            Fieldset::make('Dimensions (cm)')
                                ->schema([
                                    TextInput::make('dimensions.length')
                                        ->numeric()
                                        ->label('Length'),
                                    TextInput::make('dimensions.width')
                                        ->numeric()
                                        ->label('Width'),
                                    TextInput::make('dimensions.height')
                                        ->numeric()
                                        ->label('Height'),
                                ])->columns(3),
                            Textarea::make('shipping_details')
                                ->rows(2)
                                ->columnSpanFull(),
                        ])->columns(2),

                        Tabs\Tab::make('Media')->schema([
                            FileUpload::make('images')
                                ->multiple()
                                ->image()
                                ->directory('products')
                                ->columnSpanFull(),
                        ])->columns(1),

                        Tabs\Tab::make('Reviews & SEO')->schema([
                            Repeater::make('reviews')
                                ->schema([
                                    TextInput::make('author')
                                        ->maxLength(255),
                                    Textarea::make('content')
                                        ->rows(2)
                                        ->columnSpanFull(),
                                    TextInput::make('rating')
                                        ->numeric()
                                        ->minValue(1)
                                        ->maxValue(5),
                                ])
                                ->defaultItems(1)
                                ->columnSpanFull()
                                ->reorderable()
                                ->collapsible(),

                            Section::make('SEO Settings')
                                ->schema([
                                    TextInput::make('seo_title')
                                        ->maxLength(255),
                                    Textarea::make('seo_description')
                                        ->rows(2),
                                    TagsInput::make('seo_keywords')
                                        ->columnSpanFull(),
                                    KeyValue::make('meta')
                                        ->columnSpanFull(),
                                ])
                                ->columns(1),
                        ])->columns(1),

                        Tabs\Tab::make('Status')->schema([
                            Toggle::make('is_featured')
                                ->label('Featured Product'),
                            Toggle::make('is_bestseller')
                                ->label('Bestseller'),
                            Toggle::make('is_new')
                                ->label('New Arrival'),
                            Toggle::make('is_published')
                                ->label('Published')
                                ->default(true),
                        ])->columns(2),
                    ])
                    ->columnSpanFull()
                    ->persistTabInQueryString(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('images')
                    ->label('Image')
                    ->getStateUsing(fn($record) => $record->images[0] ?? null)
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->description(fn($record) => Str::limit($record->short_description, 50)),

                Tables\Columns\TextColumn::make('category')
                    ->sortable(),

                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('M d, Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options(Product::query()->distinct('category')->pluck('category', 'category'))
                    ->searchable()
                    ->preload(),

                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published Status'),

                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured Products'),
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProducts::route('/'),
            'create' => CreateProduct::route('/create'),
            'edit' => EditProduct::route('/{record}/edit'),
        ];
    }
}
