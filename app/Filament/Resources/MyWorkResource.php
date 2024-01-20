<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\MyWork;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MyWorkResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MyWorkResource\RelationManagers;

class MyWorkResource extends Resource
{
    protected static ?string $model = MyWork::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              Section::make()
              ->schema([
                 Forms\Components\Select::make('category_id')
                    ->relationship('categories', 'name')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\TextInput::make('url')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->imageEditor()
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\Toggle::make('status')
                    ->required(),
              ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('url')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
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
            'index' => Pages\ListMyWorks::route('/'),
            'create' => Pages\CreateMyWork::route('/create'),
            'view' => Pages\ViewMyWork::route('/{record}'),
            'edit' => Pages\EditMyWork::route('/{record}/edit'),
        ];
    }
}
