<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\AboutMe;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AboutMeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AboutMeResource\RelationManagers;

class AboutMeResource extends Resource
{
    protected static ?string $model = AboutMe::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $modelLabel = 'من أنا';
    protected static ?int $navigationSort = 2;

    public static function getPluralModelLabel(): string
    {
        return __('من أنا');
    }
        public static function getNavigationLabel(): string
    {
        return __('من أنا');
    }

        public static function getNavigationGroup(): ?string
    {
        return __('بيانتي الشخصية');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()
                ->schema([
                    Forms\Components\TextInput::make('section_title')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('description')
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\FileUpload::make('download_cv')
                    ->columnSpanFull()
                    ->downloadable()
                    ->required(),
  
                ])->columns(2),
                
                Section::make()
                ->schema([
                    Repeater::make('info')
                    ->schema([
                            Forms\Components\TextInput::make('label_name')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('title')
                                ->required(),
                        ])
                        ->columnSpanFull()
                        ->minItems(1)
                  ->grid(3)
                ])->columns(2)
                ->columnSpanFull(),
                
              

                 
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
            'index' => Pages\ListAboutMes::route('/'),
            'create' => Pages\CreateAboutMe::route('/create'),
            'view' => Pages\ViewAboutMe::route('/{record}'),
            'edit' => Pages\EditAboutMe::route('/{record}/edit'),
        ];
    }
}
