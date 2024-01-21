<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\ClientLogo;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ClientLogoResource\Pages;
use App\Filament\Resources\ClientLogoResource\RelationManagers;

class ClientLogoResource extends Resource
{
    protected static ?string $model = ClientLogo::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $modelLabel = 'شعارات العملاء';
    protected static ?int $navigationSort = 1;

    public static function getPluralModelLabel(): string
    {
        return __('شعارات العملاء');
    }
        public static function getNavigationLabel(): string
    {
        return __('شعارات العملاء');
    }

        public static function getNavigationGroup(): ?string
    {
        return __('العملاء & والعملاء');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema([
                  Forms\Components\FileUpload::make('image')
                    ->image()
                    ->imageEditor()
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\TextInput::make('url')
                    ->maxLength(255),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\Toggle::make('status')
                    ->columnSpanFull()

                    ->required(),
                ])
                ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('url')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
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
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListClientLogos::route('/'),
            'create' => Pages\CreateClientLogo::route('/create'),
            'view' => Pages\ViewClientLogo::route('/{record}'),
            'edit' => Pages\EditClientLogo::route('/{record}/edit'),
        ];
    }
}
