<?php

namespace App\Filament\Admin\Resources\ExamResults\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExamResultsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('student.name')
                    ->label('Siswa')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('subject.name')
                    ->label('Mata Pelajaran')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('exam_date')
                    ->label('Tanggal Ujian')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                TextColumn::make('total_score')
                    ->label('Skor')
                    ->sortable(),

                TextColumn::make('correct_count')
                    ->label('Benar')
                    ->sortable(),

                TextColumn::make('wrong_count')
                    ->label('Salah')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                //
            ]);
    }
}
