<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GskTipeResource\Pages;
use App\Filament\Resources\GskTipeResource\RelationManagers;
use App\Models\GskTipe;
use App\Models\Brand;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;


class GskTipeResource extends Resource
{
    protected static ?string $model = GskTipe::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'GSK STORE';

    protected static ?string $navigationLabel = 'Tipe Mode HP';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Model Information')
                    ->schema([
                        Select::make('brand_id')
                            ->label('Brand')
                            ->options(Brand::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                            
                        TextInput::make('tipe')
                            ->label('Model Name')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('brand.name')
                    ->label('Brand')
                    ->sortable()
                    ->searchable(),
                    
                TextColumn::make('tipe')
                    ->label('Model')
                    ->searchable(),
                    
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('brand_id')
                    ->label('Filter by Brand')
                    ->relationship('brand', 'name')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListGskTipes::route('/'),
            'create' => Pages\CreateGskTipe::route('/create'),
            'edit' => Pages\EditGskTipe::route('/{record}/edit'),
        ];
    }
}
