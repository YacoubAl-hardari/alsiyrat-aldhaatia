<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Review;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ReviewResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ReviewResource\RelationManagers;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $modelLabel = 'مراجعة العملاء';
    protected static ?int $navigationSort = 1;

    public static function getPluralModelLabel(): string
    {
        return __('مراجعة العملاء');
    }
        public static function getNavigationLabel(): string
    {
        return __('مراجعة العملاء');
    }

        public static function getNavigationGroup(): ?string
    {
        return __('العملاء & والعملاء');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("مراجعة العملاء")
                ->schema(
                    [
                        Forms\Components\FileUpload::make('clientImage')
                    ->required()
                    ->image()
                    ->avatar()
                    ->circleCropper()
                    ->imageEditor()
                    ->columnSpanFull()
                    ,

                Forms\Components\TextInput::make('clientName')
                    ->required(),
                Forms\Components\TextInput::make('clientJob')
                    ->required(),
                Forms\Components\TextInput::make('clientReview')
                ->columnSpanFull()

                    ->required(),
                Forms\Components\Toggle::make('status')
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
                Tables\Columns\TextColumn::make('clientImage')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('status'),
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'view' => Pages\ViewReview::route('/{record}'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
