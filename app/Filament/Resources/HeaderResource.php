<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Header;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\HeaderResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HeaderResource\RelationManagers;

class HeaderResource extends Resource
{
    protected static ?string $model = Header::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              Section::make()
              ->schema([
                  Forms\Components\FileUpload::make('image')
                      ->image()
                      ->avatar()
                      ->imageEditor()
                      ->circleCropper()
                      ->columnSpanFull()
                      ->required(),
                Forms\Components\TextInput::make('name')
                    
                ->required()
                ->maxLength(255),
            Forms\Components\TagsInput::make('i_can_do')
                ->required(),

              ])->columns(2),
              Section::make()
              ->schema([
                    
                Forms\Components\TextInput::make('phone')
                ->tel()
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('whsatappUrl')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),
        
               
                Repeater::make('soicalMedai')
                ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('icon')
                            ->required(),
                        Forms\Components\TextInput::make('link')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Toggle::make('status')
                            ->required(),
                    ])
                    ->columnSpanFull()
                    ->minItems(1)
              ->grid(3)

                    ->maxItems(7),
              ])->columns(3)
              ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('whsatappUrl')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('i_can_do')
                   ->getStateUsing(function (Header $record) {
                        if ($record->i_can_do) {
                            $data = [];
                            foreach ($record->i_can_do as $key => $value) {
                                $data[] = $value;
                            }
                            return $data;
                        }
                    }),

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
            'index' => Pages\ListHeaders::route('/'),
            'create' => Pages\CreateHeader::route('/create'),
            'view' => Pages\ViewHeader::route('/{record}'),
            'edit' => Pages\EditHeader::route('/{record}/edit'),
        ];
    }
}
