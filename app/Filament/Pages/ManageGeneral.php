<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageGeneral extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = GeneralSettings::class;

    protected static ?string $navigationGroup = 'Settings Group';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('site_name')
                            ->label('Site Name')
                            ->required(),
                        Forms\Components\Repeater::make('socials')
                            ->label('Social data')
                            ->schema([
                                Forms\Components\TextInput::make('website')
                                    ->label('Website')
                                    ->url()
                                    ->placeholder('Like Facebook, X, Instagram, Etc')
                                    ->required(),
                                Forms\Components\TextInput::make('url')
                                    ->label('Url Social')
                                    ->placeholder('Like https://www.youtube.com/@KosekiBijou or else')
                                    ->required()
                            ])
                    ])
            ]);
    }
}
