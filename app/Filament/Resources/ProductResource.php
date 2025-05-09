<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Product Details')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Basic Info')->schema([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state)))
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('slug')
                                ->required()
                                ->unique(Product::class, 'slug', ignoreRecord: true)
                                ->maxLength(255)
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('sku')
                                ->label('SKU')
                                ->unique(Product::class, 'sku', ignoreRecord: true)
                                ->maxLength(255)
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('brand')
                                ->maxLength(255)
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('category')
                                ->maxLength(255)
                                ->columnSpanFull(),
                            Forms\Components\Textarea::make('short_description')
                                ->rows(2)
                                ->columnSpanFull(),
                            Forms\Components\RichEditor::make('description')
                                ->columnSpanFull(),
                        ])->columns(1),

                        Forms\Components\Tabs\Tab::make('Specifications')->schema([
                            Forms\Components\Repeater::make('specifications')
                                ->schema([
                                    Forms\Components\TextInput::make('key')
                                        ->label('Spec Name')
                                        ->requiredWith('value'),
                                    Forms\Components\TextInput::make('value')
                                        ->label('Spec Value'),
                                ])
                                ->defaultItems(1)
                                ->columnSpanFull()
                                ->reorderable()
                                ->collapsible(),

                            Forms\Components\Repeater::make('features')
                                ->schema([
                                    Forms\Components\TextInput::make('value')
                                        ->label('Feature')
                                        ->columnSpanFull(),
                                ])
                                ->defaultItems(1)
                                ->columnSpanFull()
                                ->reorderable()
                                ->collapsible(),
                        ])->columns(1),

                        Forms\Components\Tabs\Tab::make('Pricing & Inventory')->schema([
                            Forms\Components\TextInput::make('price')
                                ->required()
                                ->numeric()
                                ->prefix('$'),
                            Forms\Components\TextInput::make('sale_price')
                                ->numeric()
                                ->prefix('$'),
                            Forms\Components\TextInput::make('stock_quantity')
                                ->required()
                                ->numeric()
                                ->default(0),
                            Forms\Components\TextInput::make('weight')
                                ->numeric()
                                ->suffix('grams'),
                            Forms\Components\TextInput::make('rating')
                                ->numeric()
                                ->minValue(0)
                                ->maxValue(5)
                                ->step(0.1),
                        ])->columns(2),

                        Forms\Components\Tabs\Tab::make('Attributes')->schema([
                            Forms\Components\TextInput::make('material')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('color')
                                ->maxLength(255),
                            Forms\Components\Repeater::make('size_options')
                                ->schema([
                                    Forms\Components\TextInput::make('size')
                                        ->requiredWith('price_adjustment'),
                                    Forms\Components\TextInput::make('price_adjustment')
                                        ->numeric()
                                        ->prefix('$'),
                                ])
                                ->defaultItems(1)
                                ->columnSpanFull()
                                ->reorderable()
                                ->collapsible(),
                            Forms\Components\TextInput::make('warranty')
                                ->maxLength(255),
                            Forms\Components\Fieldset::make('Dimensions (cm)')
                                ->schema([
                                    Forms\Components\TextInput::make('dimensions.length')
                                        ->numeric()
                                        ->label('Length'),
                                    Forms\Components\TextInput::make('dimensions.width')
                                        ->numeric()
                                        ->label('Width'),
                                    Forms\Components\TextInput::make('dimensions.height')
                                        ->numeric()
                                        ->label('Height'),
                                ])->columns(3),
                            Forms\Components\Textarea::make('shipping_details')
                                ->rows(2)
                                ->columnSpanFull(),
                        ])->columns(2),

                        Forms\Components\Tabs\Tab::make('Media')->schema([
                            Forms\Components\FileUpload::make('images')
                                ->multiple()
                                ->image()
                                ->directory('products')
                                ->columnSpanFull(),
                        ])->columns(1),

                        Forms\Components\Tabs\Tab::make('Reviews & SEO')->schema([
                            Forms\Components\Repeater::make('reviews')
                                ->schema([
                                    Forms\Components\TextInput::make('author')
                                        ->maxLength(255),
                                    Forms\Components\Textarea::make('content')
                                        ->rows(2)
                                        ->columnSpanFull(),
                                    Forms\Components\TextInput::make('rating')
                                        ->numeric()
                                        ->minValue(1)
                                        ->maxValue(5),
                                ])
                                ->defaultItems(1)
                                ->columnSpanFull()
                                ->reorderable()
                                ->collapsible(),

                            Forms\Components\Section::make('SEO Settings')
                                ->schema([
                                    Forms\Components\TextInput::make('seo_title')
                                        ->maxLength(255),
                                    Forms\Components\Textarea::make('seo_description')
                                        ->rows(2),
                                    Forms\Components\TagsInput::make('seo_keywords')
                                        ->columnSpanFull(),
                                    Forms\Components\KeyValue::make('meta')
                                        ->columnSpanFull(),
                                ])
                                ->columns(1),
                        ])->columns(1),

                        Forms\Components\Tabs\Tab::make('Status')->schema([
                            Forms\Components\Toggle::make('is_featured')
                                ->label('Featured Product'),
                            Forms\Components\Toggle::make('is_bestseller')
                                ->label('Bestseller'),
                            Forms\Components\Toggle::make('is_new')
                                ->label('New Arrival'),
                            Forms\Components\Toggle::make('is_published')
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
