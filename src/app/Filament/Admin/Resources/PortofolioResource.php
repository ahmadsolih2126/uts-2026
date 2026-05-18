<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PortofolioResource\Pages;
use App\Models\Portofolio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PortofolioResource extends Resource
{
    protected static ?string $model = Portofolio::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    // Memberikan nama label navigasi yang rapi di sidebar
    protected static ?string $navigationLabel = 'Portofolio';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Dibungkus pake Section biar ada kotak card estetik
                Forms\Components\Section::make('Input Data Project')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Project')
                            ->placeholder('Masukkan judul project portfolio...')
                            ->required()
                            ->maxLength(255),

                        // Diubah dari TextInput biasa jadi Select Dropdown pilihan
                        Forms\Components\Select::make('progress')
                            ->label('Status Progress')
                            ->options([
                                'Planning' => 'Planning',
                                'On Progress' => 'On Progress',
                                'Testing' => 'Testing',
                                'Done' => 'Done',
                            ])
                            ->default('Planning')
                            ->required(),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi Project')
                            ->placeholder('Jelaskan detail mengenai project ini...')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(), // Makan tempat penuh kiri-kanan

                        Forms\Components\TextInput::make('client')
                            ->label('Nama Klien / Perusahaan')
                            ->placeholder('Contoh: PT. Maju Mundur'),

                        Forms\Components\TextInput::make('year')
                            ->label('Tahun Pembuatan')
                            ->placeholder('Contoh: 2026')
                            ->maxLength(4),

                        Forms\Components\TextInput::make('role')
                            ->label('Peran Anda (Role)')
                            ->placeholder('Contoh: Fullstack Developer'),
                    ])
                    ->columns(2) // MEMBAGI FORM MENJADI KIRI-KANAN (2 Kolom)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Judul Project')
                    ->searchable()
                    ->sortable(),
                    
                // Menampilkan status pake badge warna-warni keren
                TextColumn::make('progress')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Planning' => 'gray',
                        'On Progress' => 'warning',
                        'Testing' => 'info',
                        'Done' => 'success',
                    }),
                    
                TextColumn::make('client')
                    ->label('Klien')
                    ->searchable(),
                    
                TextColumn::make('year')
                    ->label('Tahun')
                    ->sortable(),
                    
                TextColumn::make('role')
                    ->label('Role'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), // Menambahkan tombol hapus langsung di tabel
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
            'index' => Pages\ListPortofolios::route('/'),
            'create' => Pages\CreatePortofolio::route('/create'),
            'edit' => Pages\EditPortofolio::route('/{record}/edit'),
        ];
    }
}