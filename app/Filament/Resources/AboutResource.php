<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages\CreateAbout;
use App\Filament\Resources\AboutResource\Pages\EditAbout;
use App\Filament\Resources\AboutResource\Pages\ListAbouts;
use App\Models\About;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationLabel = 'About';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('About Page Content')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Company Overview')
                            ->schema([
                                Forms\Components\TextInput::make('company_name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('company_tagline')
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('company_description')
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('founding_year')
                                    ->numeric()
                                    ->minValue(1800)
                                    ->maxValue(now()->year),
                                Forms\Components\TextInput::make('employee_count')
                                    ->numeric()
                                    ->minValue(1),
                                Forms\Components\TagsInput::make('operational_regions')
                                    ->placeholder('Add region')
                                    ->helperText('Press enter to add a region'),
                                Forms\Components\TextInput::make('headquarters_location')
                                    ->maxLength(255),
                            ])->columns(2),

                        Forms\Components\Tabs\Tab::make('Mission & Vision')
                            ->schema([
                                Forms\Components\Textarea::make('mission_statement')
                                    ->maxLength(500)
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('vision_statement')
                                    ->maxLength(500)
                                    ->columnSpanFull(),
                                Forms\Components\Repeater::make('long_term_goals')
                                    ->schema([
                                        Forms\Components\TextInput::make('goal')
                                            ->required()
                                            ->maxLength(255),
                                    ])
                                    ->defaultItems(3)
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Core Values')
                            ->schema([
                                Forms\Components\Repeater::make('core_values')
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->maxLength(100)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(function ($state, Forms\Set $set, $get, $index) {
                                                $set("value_descriptions.{$index}.name", $state);
                                            }),
                                        Forms\Components\Textarea::make('description')
                                            ->required(),
                                    ])
                                    ->columns(2)
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('History & Milestones')
                            ->schema([
                                Forms\Components\Repeater::make('history_timeline')
                                    ->schema([
                                        Forms\Components\TextInput::make('year')
                                            ->numeric()
                                            ->required(),
                                        Forms\Components\Textarea::make('event')
                                            ->required(),
                                    ])
                                    ->columns(2)
                                    ->columnSpanFull(),
                                Forms\Components\TagsInput::make('key_achievements')
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Services & Products')
                            ->schema([
                                Forms\Components\TagsInput::make('main_services')
                                    ->columnSpanFull(),
                                Forms\Components\TagsInput::make('main_products')
                                    ->columnSpanFull(),
                                Forms\Components\FileUpload::make('product_brochure_url')
                                    ->directory('about/brochures')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->downloadable(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Industry Expertise')
                            ->schema([
                                Forms\Components\TagsInput::make('industries_served')
                                    ->columnSpanFull(),
                                Forms\Components\TagsInput::make('specializations')
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('years_in_industry')
                                    ->numeric()
                                    ->minValue(1),
                            ]),

                        Forms\Components\Tabs\Tab::make('Facilities & Tech')
                            ->schema([
                                Forms\Components\TagsInput::make('facilities_locations')
                                    ->columnSpanFull(),
                                Forms\Components\TagsInput::make('manufacturing_capabilities')
                                    ->columnSpanFull(),
                                Forms\Components\TagsInput::make('technology_investments')
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Certifications')
                            ->schema([
                                Forms\Components\TagsInput::make('certifications')
                                    ->columnSpanFull(),
                                Forms\Components\TagsInput::make('regulatory_compliance')
                                    ->columnSpanFull(),
                                Forms\Components\Toggle::make('is_safety_certified')
                                    ->inline(false),
                            ]),

                        Forms\Components\Tabs\Tab::make('Leadership')
                            ->schema([
                                Forms\Components\Repeater::make('executive_team')
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->required(),
                                        Forms\Components\TextInput::make('role')
                                            ->required(),
                                        Forms\Components\Textarea::make('bio'),
                                        Forms\Components\FileUpload::make('photo')
                                            ->directory('about/team')
                                            ->image()
                                            ->imageEditor(),
                                    ])
                                    ->columns(2)
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Clients & Cases')
                            ->schema([
                                Forms\Components\TagsInput::make('notable_clients')
                                    ->columnSpanFull(),
                                Forms\Components\Repeater::make('case_study_urls')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->required(),
                                        Forms\Components\TextInput::make('url')
                                            ->required()
                                            ->url(),
                                    ])
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Safety & Sustainability')
                            ->schema([
                                Forms\Components\TagsInput::make('safety_policies')
                                    ->columnSpanFull(),
                                Forms\Components\TagsInput::make('sustainability_goals')
                                    ->columnSpanFull(),
                                Forms\Components\Toggle::make('is_eco_friendly')
                                    ->inline(false)
                                    ->label('Eco-Friendly Certified'),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('founding_year')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_safety_certified')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_eco_friendly')
                    ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
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
            'index' => ListAbouts::route('/'),
            'create' => CreateAbout::route('/create'),
            'edit' => EditAbout::route('/{record}/edit'),
        ];
    }
}
