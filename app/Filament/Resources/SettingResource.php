<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Setting;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ColorPicker;
use App\Filament\Resources\SettingResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SettingResource\RelationManagers;
// fix the errors in seeting model 
class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $navigationGroup = 'الإعدادات';
    protected static ?string $navigationLabel = 'الإعدادات العامة';

    protected static ?string $modelLabel = 'الإعدادات العامة';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()
                ->schema([
                    Section::make(__('البيانات الأساسية'))
                    ->schema([
                        TextInput::make('email')->label(__('البريد الالكتروني') ),
                        TextInput::make('phone')->label(__('رقم الهاتف') ),
                        TextInput::make('location')->label(__('عنوان الشركة') ),
                        Toggle::make('maintenance')->label(__('الصيانة') ),
    
                        FileUpload::make('favicon')
                        ->label(__('شعار رأس الصفحة'))
                        ->required()
                        ->acceptedFileTypes(['image/png','image/jpg','image/jpeg'])
                        ->directory('settingImages/favIcon')
                        ->visibility('public')
                        ->disk('public')
                        ->imageEditor(),
                        FileUpload::make('footerlogo')
                        ->label(__('شعار إسفل الصفحة'))
                        ->required()
                        ->acceptedFileTypes(['image/png','image/jpg','image/jpeg'])
                        ->directory('settingImages/favIcon')
                        ->visibility('public')
                        ->disk('public')
                        ->imageEditor()
    
                    ])
                    ->columnSpan(
                        [  
                          'default' => 1,
                          'sm' => 3,
                          'md' => 3,
                          'lg' => 3,
                          'xl' => 3,
                          '2xl' => 1,
                          ]
                      ),

                    Section::make(__('الألوان'))
                    ->schema([
                        Repeater::make('color')->label(__('اللون'))
                    ->schema([
                        TextInput::make('primary_name')->required()->label(__('اسم الون الأساسي')),
                        ColorPicker::make('primary_value')->required()->label(__('قيمة اللون')),

                        TextInput::make('seondary_name')->required()->label(__('اسم الون الفرعي')),
                        ColorPicker::make('seondary_value')->required()->label(__('قيمة اللون')),
                    ])
                    ->disableItemCreation()
                    ->disableItemDeletion()
                    ->columns(4)
                    ,

                        Repeater::make('social_links')->label(__('روابط التواصل الاجتماعي') )
                        ->schema([
                            TextInput::make('name')->required()->label(__('اسم الشوسل ميديا')),
                            TextInput::make('url')->rules('url')->required()->label(__('الرابط السوشل ميديا')),
                            FileUpload::make('icon')
                            ->label(__('الأيقونة السوشل ميديا'))
                            ->required()
                            ->directory('settingImages/socialIcon')
                            ->visibility('public')
                            ->disk('public')
                            ->imageEditor(),
                        ])
                        ->columns(1)
                        ->grid(3)
                        ,
                  

    
                    ])
                    ->columnSpan(
                      [  
                        'default' => 1,
                        'sm' => 3,
                        'md' => 3,
                        'lg' => 3,
                        'xl' => 3,
                        '2xl' => 2,
                        ]
                    ),

                ])->columns(3),


             

                Section::make(__('seo -- بيانات لمحرك البحث جوجل'))
                ->schema([
                 TextInput::make('meta_title'),
                 FileUpload::make('meta_image')
                 ->image()
                 ->imageEditor(),
                 TagsInput::make('meta_keywords'),
                 TextInput::make('meta_description'),
                ]),


        ]);
    }
    public static function table(Table $table): Table
    {   
        return $table
            ->columns([

                ToggleColumn::make('maintenance')->label(__('وضع الصيانة')) ,
                ImageColumn::make('favicon')->label(__('الأيقونة')),
                TextColumn::make('created_at')->label(__('تاريخ الأنشاء'))->dateTime()
                ->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->label(__('تاريخ التعديل'))->dateTime()
                ->sortable()->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'view' => Pages\ViewSetting::route('/{record}'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
