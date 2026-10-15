<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ujian - {{ $subject->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-4xl mx-auto py-8 px-4">
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ $subject->name }}</h1>
                    <p class="text-gray-600">{{ $questions->count() }} Soal</p>
                </div>
                <div class="text-right">
                    <div class="text-sm text-gray-500">Waktu</div>
                    <div id="timer" class="text-2xl font-bold text-indigo-600">00:00</div>
                </div>
            </div>
        </div>

        <form action="{{ route('ujian.submit', $subject) }}" method="POST" id="examForm">
            @csrf

            @foreach($questions as $index => $question)
                <div class="bg-white rounded-xl shadow-sm p-6 mb-4">
                    <div class="flex items-start gap-4">
                        <span class="flex-shrink-0 w-8 h-8 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center font-semibold">
                            {{ $index + 1 }}
                        </span>
                        <div class="flex-1">
                            <p class="text-gray-900 mb-4">{{ $question->payload['question_text'] }}</p>

                            <div class="space-y-2">
                                @foreach(['A', 'B', 'C', 'D'] as $option)
                                    <label class="flex items-center gap-3 p-3 rounded-lg border border-gray-200 hover:bg-gray-50 cursor-pointer transition">
                                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option }}" class="w-4 h-4 text-indigo-600">
                                        <span class="font-medium text-gray-700">{{ $option }}.</span>
                                        <span class="text-gray-600">{{ $question->payload['option_' . strtolower($option)] }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 p-4">
                <div class="max-w-4xl mx-auto flex justify-between items-center">
                    <div class="text-sm text-gray-600">
                        <span id="answered">0</span> / {{ $questions->count() }} terjawab
                    </div>
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-lg font-semibold transition">
                        Selesai
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Timer
        let seconds = 0;
        const timerEl = document.getElementById('timer');
        const answeredEl = document.getElementById('answered');
        const form = document.getElementById('examForm');

        setInterval(() => {
            seconds++;
            const mins = Math.floor(seconds / 60).toString().padStart(2, '0');
            const secs = (seconds % 60).toString().padStart(2, '0');
            timerEl.textContent = `${mins}:${secs}`;
        }, 1000);

        // Track answered questions
        const totalQuestions = {{ $questions->count() }};
        form.addEventListener('change', () => {
            const answered = form.querySelectorAll('input[type="radio"]:checked').length;
            answeredEl.textContent = answered;
        });
    </script>
</body>
</html>
