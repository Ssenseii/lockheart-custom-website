<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?int $navigationSort = 100;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Settings')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('General')
                            ->schema([
                                Forms\Components\FileUpload::make('logo_path')
                                    ->label('Logo')
                                    ->image()
                                    ->directory('settings')
                                    ->preserveFilenames()
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                                            ->prepend('logo-')
                                    )
                                    ->openable()
                                    ->downloadable()
                                    ->columnSpanFull(),

                                Forms\Components\Section::make('System Modes')
                                    ->schema([
                                        Forms\Components\Toggle::make('maintenance_mode')
                                            ->label('Maintenance Mode')
                                            ->helperText('When enabled, the site will be in maintenance mode'),
                                        Forms\Components\Toggle::make('developer_mode')
                                            ->label('Developer Mode')
                                            ->helperText('When enabled, additional debug information will be shown'),
                                    ])
                                    ->columns(2),
                            ]),

                        Forms\Components\Tabs\Tab::make('Catalogue')
                            ->schema([
                                FileUpload::make('catalogue_pdf')
                                    ->label('Catalogue PDF')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->directory('settings')
                                    ->preserveFilenames()
                                    ->getUploadedFileNameForStorageUsing(
                                        fn(TemporaryUploadedFile $file): string => 'catalogue-' . $file->getClientOriginalName()
                                    )
                                    ->openable()
                                    ->downloadable()
                                    ->columnSpanFull(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Contact Information')
                            ->schema([
                                Forms\Components\Section::make('Email Addresses')
                                    ->schema([
                                        Forms\Components\TextInput::make('email_main')
                                            ->label('Main Email')
                                            ->email(),
                                        Forms\Components\TextInput::make('email_support')
                                            ->label('Support Email')
                                            ->email(),
                                        Forms\Components\TextInput::make('email_info')
                                            ->label('Info Email')
                                            ->email(),
                                    ])
                                    ->columns(2),

                                Forms\Components\Section::make('Phone Numbers')
                                    ->schema([
                                        Forms\Components\TextInput::make('contact_phone_1')
                                            ->label('Primary Phone'),
                                        Forms\Components\TextInput::make('contact_phone_2')
                                            ->label('Secondary Phone'),
                                        Forms\Components\TextInput::make('contact_phone_3')
                                            ->label('Tertiary Phone'),
                                    ])
                                    ->columns(3),

                                Forms\Components\Section::make('WhatsApp Numbers')
                                    ->schema([
                                        Forms\Components\TextInput::make('whatsapp_phone_1')
                                            ->label('Primary WhatsApp'),
                                        Forms\Components\TextInput::make('whatsapp_phone_2')
                                            ->label('Secondary WhatsApp'),
                                        Forms\Components\TextInput::make('whatsapp_phone_3')
                                            ->label('Tertiary WhatsApp'),
                                    ])
                                    ->columns(3),

                                Forms\Components\Section::make('Addresses')
                                    ->schema([
                                        Forms\Components\Textarea::make('contact_address_1')
                                            ->label('Primary Address')
                                            ->rows(3),
                                        Forms\Components\Textarea::make('contact_address_2')
                                            ->label('Secondary Address')
                                            ->rows(3),
                                        Forms\Components\Textarea::make('contact_address_3')
                                            ->label('Tertiary Address')
                                            ->rows(3),
                                        Forms\Components\Textarea::make('contact_address_4')
                                            ->label('Quaternary Address')
                                            ->rows(3),
                                    ])
                                    ->columns(2),
                            ]),

                        Forms\Components\Tabs\Tab::make('Social Media')
                            ->schema([
                                Forms\Components\Section::make('Main Platforms')
                                    ->schema([
                                        Forms\Components\TextInput::make('social_facebook')
                                            ->label('Facebook')
                                            ->prefix('https://facebook.com/'),
                                        Forms\Components\TextInput::make('social_twitter')
                                            ->label('Twitter')
                                            ->prefix('https://twitter.com/'),
                                        Forms\Components\TextInput::make('social_instagram')
                                            ->label('Instagram')
                                            ->prefix('https://instagram.com/'),
                                        Forms\Components\TextInput::make('social_linkedin')
                                            ->label('LinkedIn')
                                            ->prefix('https://linkedin.com/'),
                                        Forms\Components\TextInput::make('social_tiktok')
                                            ->label('TikTok')
                                            ->prefix('https://tiktok.com/'),
                                        Forms\Components\TextInput::make('social_youtube')
                                            ->label('YouTube')
                                            ->prefix('https://youtube.com/'),
                                    ])
                                    ->columns(2),

                                Forms\Components\Section::make('Additional Platforms')
                                    ->schema([
                                        Forms\Components\TextInput::make('social_extra_1')
                                            ->label('Extra Platform 1'),
                                        Forms\Components\TextInput::make('social_extra_2')
                                            ->label('Extra Platform 2'),
                                        Forms\Components\TextInput::make('social_extra_3')
                                            ->label('Extra Platform 3'),
                                        Forms\Components\TextInput::make('social_extra_4')
                                            ->label('Extra Platform 4'),
                                    ])
                                    ->columns(2),
                            ]),


                        Forms\Components\Tabs\Tab::make('SEO')
                            ->schema([
                                Forms\Components\TextInput::make('meta_title')
                                    ->label('Meta Title')
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('meta_description')
                                    ->label('Meta Description')
                                    ->rows(3)
                                    ->columnSpanFull(),
                                Forms\Components\TagsInput::make('meta_keywords')
                                    ->label('Meta Keywords')
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Feature Flags')
                            ->schema([
                                Forms\Components\Section::make('Feature Toggles')
                                    ->schema([
                                        Forms\Components\Toggle::make('enable_emails')
                                            ->label('Enable Email Features')
                                            ->default(true),
                                        Forms\Components\Toggle::make('enable_social')
                                            ->label('Enable Social Media Features')
                                            ->default(true),
                                        Forms\Components\Toggle::make('enable_contact')
                                            ->label('Enable Contact Features')
                                            ->default(true),
                                        Forms\Components\Toggle::make('enable_whatsapp')
                                            ->label('Enable WhatsApp Features')
                                            ->default(true),
                                        Forms\Components\Toggle::make('enable_locations')
                                            ->label('Enable Location Features')
                                            ->default(true),
                                    ])
                                    ->columns(2),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo_path')
                    ->label('Logo'),
                Tables\Columns\TextColumn::make('email_main')
                    ->label('Main Email'),
                Tables\Columns\TextColumn::make('contact_phone_1')
                    ->label('Primary Phone'),
                Tables\Columns\IconColumn::make('maintenance_mode')
                    ->label('Maintenance')
                    ->boolean(),
                Tables\Columns\IconColumn::make('developer_mode')
                    ->label('Dev Mode')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Typically you wouldn't want bulk actions on settings
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
