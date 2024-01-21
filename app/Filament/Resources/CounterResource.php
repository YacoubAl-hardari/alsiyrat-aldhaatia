<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Counter;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use App\Filament\Resources\CounterResource\Pages;

class CounterResource extends Resource
{
    protected static ?string $model = Counter::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $modelLabel = 'الأحصائيات';
    protected static ?int $navigationSort = 3;

    public static function getPluralModelLabel(): string
    {
        return __('الأحصائيات');
    }
        public static function getNavigationLabel(): string
    {
        return __('الأحصائيات');
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
              ->schema(
                [
                    Forms\Components\TextInput::make('counter_title')
                    ->required(),
                Forms\Components\TextInput::make('counter_number')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->avatar()
                    ->imageEditor()
                    ->circleCropper()
                    ->columnSpanFull()
                    ->required(),
                ]
              )->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('counter_title'),
                Tables\Columns\TextColumn::make('counter_number'),
                Tables\Columns\ImageColumn::make('image'),
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
            'index' => Pages\ListCounters::route('/'),
            'create' => Pages\CreateCounter::route('/create'),
            'view' => Pages\ViewCounter::route('/{record}'),
            'edit' => Pages\EditCounter::route('/{record}/edit'),
        ];
    }
}
