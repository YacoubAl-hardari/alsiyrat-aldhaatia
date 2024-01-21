<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\MyWorkCategory;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MyWorkCategoryResource\Pages;
use App\Filament\Resources\MyWorkCategoryResource\RelationManagers;

class MyWorkCategoryResource extends Resource
{
    protected static ?string $model = MyWorkCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';

    protected static ?string $modelLabel = 'أقسام المشاريع';
    protected static ?int $navigationSort = 1;

    public static function getPluralModelLabel(): string
    {
        return __('أقسام المشاريع');
    }
        public static function getNavigationLabel(): string
    {
        return __('أقسام المشاريع');
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
                    Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\Toggle::make('status')
                    ->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
            'index' => Pages\ListMyWorkCategories::route('/'),
            'create' => Pages\CreateMyWorkCategory::route('/create'),
            'view' => Pages\ViewMyWorkCategory::route('/{record}'),
            'edit' => Pages\EditMyWorkCategory::route('/{record}/edit'),
        ];
    }
}
