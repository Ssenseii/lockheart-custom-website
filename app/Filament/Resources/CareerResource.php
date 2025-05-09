<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CareerResource\Pages;
use App\Filament\Resources\CareerResource\RelationManagers;
use App\Models\Career;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CareerResource extends Resource
{
    protected static ?string $model = Career::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\TextInput::make('slug')
                    ->required(),
                Forms\Components\TextArea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('requirements')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('responsibilities')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('location')
                    ->required(),
                Forms\Components\TextInput::make('job_type')
                    ->required(),
                Forms\Components\TextInput::make('salary_min')
                    ->numeric(),
                Forms\Components\TextInput::make('salary_max')
                    ->numeric(),
                Forms\Components\Toggle::make('is_remote')
                    ->required(),
                Forms\Components\Toggle::make('is_published')
                    ->required(),
                Forms\Components\DatePicker::make('application_deadline'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\TextColumn::make('job_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('salary_min')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('salary_max')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_remote')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('application_deadline')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCareers::route('/'),
            'create' => Pages\CreateCareer::route('/create'),
            'edit' => Pages\EditCareer::route('/{record}/edit'),
        ];
    }
}
