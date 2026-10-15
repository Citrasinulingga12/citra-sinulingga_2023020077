<?php

namespace App\Filament\Ujian\Pages;

use App\Models\Subject;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;

class UjianPage extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string $view = 'filament.ujian.pages.ujian-page';

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    protected static ?string $navigationLabel = 'Ujian';

    protected static ?string $title = 'Daftar Ujian';

    public function table(Table $table): Table
    {
        return $table
            ->query(Subject::query())
            ->columns([
                TextColumn::make('name')
                    ->label('Mata Pelajaran')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('questions_count')
                    ->label('Jumlah Soal')
                    ->sortable(),
            ])
            ->actions([
                \Filament\Tables\Actions\Action::make('mulai')
                    ->label('Mulai Ujian')
                    ->icon('heroicon-o-play')
                    ->color('success')
                    ->url(fn (Subject $record): string => route('ujian.exam', $record)),
            ])
            ->bulkActions([
                //
            ]);
    }
}
