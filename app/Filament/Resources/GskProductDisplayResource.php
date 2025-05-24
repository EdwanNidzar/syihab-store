<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GskProductDisplayResource\Pages;
use App\Filament\Resources\GskProductDisplayResource\RelationManagers;
use App\Models\GskProductDisplay;
use App\Models\Brand;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GskProductDisplayResource extends Resource
{
    protected static ?string $model = GskProductDisplay::class;
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?string $navigationLabel = 'Product Displays';
    protected static ?string $modelLabel = 'Product Display';
    protected static ?string $navigationGroup = 'Product Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Product Information')
                    ->schema([
                        Select::make('brand_id')
                            ->label('Brand')
                            ->options(Brand::all()->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                            
                        TextInput::make('product_name')
                            ->label('Product Name')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn($state, $set) => $set('slug', Str::slug($state)))
                            ->maxLength(255),
                            
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                            
                        TextInput::make('price')
                            ->label('Price')
                            ->required()
                            ->numeric()
                            ->prefix('Rp'),
                    ]),
                    
                Section::make('Product Image')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Display Image')
                            ->image()
                            ->directory('product-displays')
                            ->maxSize(2048) // 2MB
                            ->imageResizeMode('cover')
                            ->imageResizeTargetWidth('800')
                            ->imageResizeTargetHeight('600'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Image')
                    ->circular(),
                    
                TextColumn::make('brand.name')
                    ->label('Brand')
                    ->sortable()
                    ->searchable(),
                    
                TextColumn::make('product_name')
                    ->label('Product')
                    ->searchable(),
                    
                TextColumn::make('price')
                    ->label('Price')
                    ->money('IDR')
                    ->sortable(),
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
            'index' => Pages\ListGskProductDisplays::route('/'),
            'create' => Pages\CreateGskProductDisplay::route('/create'),
            'edit' => Pages\EditGskProductDisplay::route('/{record}/edit'),
        ];
    }
}
