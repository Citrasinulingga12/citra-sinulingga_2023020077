<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Ujian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-4xl mx-auto py-8 px-4">
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Histori Ujian</h1>
            <p class="text-gray-600">{{ $examResult->subject->name }} - {{ $examResult->exam_date->format('d/m/Y H:i') }}</p>
        </div>

        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="bg-white rounded-xl shadow-sm p-6 text-center">
                <div class="text-3xl font-bold text-indigo-600">{{ number_format($examResult->total_score, 2) }}</div>
                <div class="text-sm text-gray-500">Skor</div>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 text-center">
                <div class="text-3xl font-bold text-green-600">{{ $examResult->correct_count }}</div>
                <div class="text-sm text-gray-500">Benar</div>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 text-center">
                <div class="text-3xl font-bold text-red-600">{{ $examResult->wrong_count }}</div>
                <div class="text-sm text-gray-500">Salah</div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Rincian Jawaban</h2>

            <div class="space-y-4">
                @foreach($examResult->answers as $index => $answer)
                    <div class="border border-gray-200 rounded-lg p-4 {{ $answer->is_correct ? 'bg-green-50' : 'bg-red-50' }}">
                        <div class="flex items-start gap-3">
                            <span class="flex-shrink-0 w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold {{ $answer->is_correct ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-700' }}">
                                {{ $index + 1 }}
                            </span>
                            <div class="flex-1">
                                <p class="text-gray-900 mb-2">{{ $answer->question->payload['question_text'] }}</p>
                                <div class="flex gap-4 text-sm">
                                    <span class="{{ $answer->is_correct ? 'text-green-600' : 'text-red-600' }}">
                                        Jawaban Anda: {{ $answer->student_answer ?? '-' }}
                                    </span>
                                    @if(!$answer->is_correct)
                                        <span class="text-green-600">
                                            Kunci: {{ $answer->correct_answer }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('ujian.histori') }}" class="text-indigo-600 hover:text-indigo-700 font-medium">
                Kembali ke Histori
            </a>
        </div>
    </div>
</body>
</html>
