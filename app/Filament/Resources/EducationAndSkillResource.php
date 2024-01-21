<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\EducationAndSkill;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use App\Filament\Resources\EducationAndSkillResource\Pages;

class EducationAndSkillResource extends Resource
{
    protected static ?string $model = EducationAndSkill::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';
    
    protected static ?string $modelLabel = 'المهارات والخبرات';
    protected static ?int $navigationSort = 3;

    public static function getPluralModelLabel(): string
    {
        return __('المهارات والخبرات');
    }
        public static function getNavigationLabel(): string
    {
        return __('المهارات والخبرات');
    }

        public static function getNavigationGroup(): ?string
    {
        return __('بيانتي الشخصية');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               
                Section::make("الخبرات")
                ->description("الخبرات السابقة")
                ->schema([
                    TextInput::make('section_title')
                    ->required(),
                        ]) ->columnSpanFull() ,


                Section::make("الخبرات")
                ->description("الخبرات السابقة")
                ->schema([
                    Repeater::make('skills')
                    ->schema([
                        DatePicker::make('date')
                            ->required(),
                        TextInput::make('experience_job_title')
                            ->required(),
                        TextInput::make('experience_name')
                            ->required(),
                        Toggle::make('experience_status')
                            ->required(),
                            ])->grid(3)
                            ->cloneable()
                            ->columnSpanFull()
                            ,
                           
                        ])->columns(3)
                        ->columnSpanFull(),


                Section::make("المؤهل العلمي")
                ->schema([
                    Repeater::make('educations')
                    ->schema([
                        DatePicker::make('date')
                    ->required(),
                TextInput::make('education_title')
                ->label("مدرسة - جامعة - و...")
                    ->required(),
                TextInput::make('education_name')
                ->label("المؤهل العلمي")
                    ->required(),
                Toggle::make('education_status')
                    ->required(),
                    ])->grid(3)
                    ->cloneable()
                    ->columnSpanFull(),
                   
                ])->columns(3)
                ->columnSpanFull(),

                Section::make("المهارات والخبرات")
                ->description("المهارات والخبرات السابقة")
                ->schema([
                    Repeater::make('skill_and_tools')
                    ->schema([
                        TextInput::make('title')
                            ->required(),
                        TextInput::make('percentage')
                            ->required(),
                            ])->grid(3)
                            ->cloneable()
                            ->columnSpanFull(),
                           
                        ])->columns(3)
                        ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section_title')
                    ->sortable(),
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
            'index' => Pages\ListEducationAndSkills::route('/'),
            'create' => Pages\CreateEducationAndSkill::route('/create'),
            'view' => Pages\ViewEducationAndSkill::route('/{record}'),
            'edit' => Pages\EditEducationAndSkill::route('/{record}/edit'),
        ];
    }
}
