<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DailyPromoResource\Pages;
use App\Models\DailyPromo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class DailyPromoResource extends Resource
{
    protected static ?string $model = DailyPromo::class;
    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationLabel = 'Promo Harian';
    protected static ?string $modelLabel = 'Promo Hari Ini';
    protected static ?string $navigationGroup = 'Promo & Diskon';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Promo')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->label('Judul Promo')
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn($state, $set) => $set('slug', Str::slug($state))),
                            
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->label('Slug URL')
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                            
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->label('Deskripsi'),

                    ])->columns(2),
                    
                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->required()
                            ->label('Gambar Promo')
                            ->image()
                            ->directory('daily-promos'),
                            
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktifkan Promo')
                            ->default(true),

                        Forms\Components\Toggle::make('is_popups')
                            ->label('Tampilkan sebagai Pop-up')
                            ->default(false)
                            ->helperText('Jika diaktifkan, promo akan ditampilkan sebagai pop-up saat pengguna mengunjungi halaman.'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->size(50),
                    
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->searchable(),
                    
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean(),

                Tables\Columns\IconColumn::make('is_popups')
                    ->label('Pop-up')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDailyPromos::route('/'),
            'create' => Pages\CreateDailyPromo::route('/create'),
            'edit' => Pages\EditDailyPromo::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Promo Hari Ini';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Promo Hari Ini';
    }
}