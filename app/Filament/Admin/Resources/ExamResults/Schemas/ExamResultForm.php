<?php

namespace App\Filament\Admin\Resources\ExamResults\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ExamResultForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        Select::make('student_id')
                            ->label('Siswa')
                            ->relationship('student', 'name')
                            ->required()
                            ->searchable(),

                        Select::make('subject_id')
                            ->label('Mata Pelajaran')
                            ->relationship('subject', 'name')
                            ->required()
                            ->searchable(),

                        DatePicker::make('exam_date')
                            ->label('Tanggal Ujian')
                            ->required(),

                        TextInput::make('total_score')
                            ->label('Skor Total')
                            ->numeric()
                            ->default(0),

                        TextInput::make('correct_count')
                            ->label('Jawaban Benar')
                            ->numeric()
                            ->default(0),

                        TextInput::make('wrong_count')
                            ->label('Jawaban Salah')
                            ->numeric()
                            ->default(0),
                    ]),
            ]);
    }
}
