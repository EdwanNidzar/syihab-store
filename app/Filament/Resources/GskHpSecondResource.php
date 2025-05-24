<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GskHpSecondResource\Pages;
use App\Filament\Resources\GskHpSecondResource\RelationManagers;
use App\Models\GskHpSecond;
use App\Models\GskTipe;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class GskHpSecondResource extends Resource
{
    protected static ?string $model = GskHpSecond::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'GSK STORE';

    protected static ?string $navigationLabel = 'HP Second';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Phone Details')
                    ->schema([
                        Select::make('gsk_tipe_id')
                            ->label('Phone Model')
                            ->options(GskTipe::all()->pluck('tipe', 'id'))
                            ->searchable()
                            ->required(),
                            
                        TextInput::make('storage')
                            ->label('Storage (GB)')
                            ->required()
                            ->numeric(),
                            
                        TextInput::make('condition')
                            ->label('Condition (e.g., Good, Fair, Mint)')
                            ->required(),
                            
                        TextInput::make('qualification')
                            ->label('Grade (A, B, C)')
                            ->required(),
                            
                        TextInput::make('price')
                            ->label('Price (Rp)')
                            ->numeric()
                            ->prefix('Rp')
                            ->required(),
                    ])->columns(2),
                    
                Section::make('Images')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Phone Image')
                            ->image()
                            ->directory('second-hand-phones')
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('gskTipe.tipe')
                    ->label('Model')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('storage')
                    ->label('Storage')
                    ->suffix(' GB'),
                    
                TextColumn::make('condition')
                    ->label('Condition'),
                    
                TextColumn::make('price')
                    ->label('Price')
                    ->money('IDR'),
                    
                ImageColumn::make('image')
                    ->label('Photo')
                    ->circular(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('gsk_tipe_id')
                    ->label('Filter by Model')
                    ->relationship('gskTipe', 'tipe'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListGskHpSeconds::route('/'),
            'create' => Pages\CreateGskHpSecond::route('/create'),
            'edit' => Pages\EditGskHpSecond::route('/{record}/edit'),
        ];
    }
}
