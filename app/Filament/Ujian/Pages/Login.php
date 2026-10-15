<?php

namespace App\Filament\Ujian\Pages;

use Filament\Pages\Auth\Login as BaseLogin;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Login extends BaseLogin
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nis')
                    ->label('NIS (Nomor Induk Siswa)')
                    ->required()
                    ->autocomplete()
                    ->autofocus()
                    ->maxLength(255),

                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->revealable()
                    ->required(),
            ])
            ->statePath('data');
    }

    public function authenticate(): void
    {
        $data = $this->form->getState();

        if (! Auth::guard('student')->attempt([
            'nis' => $data['nis'],
            'password' => $data['password'],
        ])) {
            throw ValidationException::withMessages([
                'nis' => 'NIS atau password salah.',
            ]);
        }

        session()->regenerate();

        $student = Auth::guard('student')->user();

        Notification::make()
            ->success()
            ->title('Login berhasil')
            ->body("Selamat datang, {$student->name}!")
            ->send();
    }
}
