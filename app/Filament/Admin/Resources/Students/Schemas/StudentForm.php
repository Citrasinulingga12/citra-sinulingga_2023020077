<?php

namespace App\Filament\Admin\Resources\Students\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('nis')
                            ->label('NIS (Nomor Induk Siswa)')
                            ->required()
                            ->unique('students', 'nis')
                            ->maxLength(255),

                        TextInput::make('name')
                            ->label('Nama Siswa')
                            ->required()
                            ->maxLength(255),
                    ]),
            ]);
    }
}
