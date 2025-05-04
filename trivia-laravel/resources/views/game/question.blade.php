<x-app-layout>
    <style>
        .cta-btn:hover {
            background-color:rgb(0, 0, 0);
            color: white;
        }
        .cta-btn {
            border-radius: 10px; 
            border: 2px solid black; 
            padding: 10px 20px; 
        }
        .cta-btn-nb-orange{
            border-radius: 10px;  
        }
        .bg-orange{
            background:#33496e;
        }
        .bg-submit{
            background:#42a0e9; 
        }
        .bg-light-gray{
            background: #f4f4f4; 
        }
        </style>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Question {{ $game->current_question_index + 1 }}/10
    </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
                    <main class="flex flex-col w-full lg:max-w-4xl px-6 py-6">
                        <div class="mb-6">
                            <!-- <h1 class="text-xl font-semibold">Trivia Question</h1> --> 
                        </div>
                        <div class="">
                            <p class="px-4 py-2 text-lg font-bold ">{!! $question['question'] !!}</p>
                        </div> 
                        <div class="space-y-4 ">
                            <form method="POST" action="{{ route('game.submitAnswer', $game->id) }}">
                                @csrf
                                <!-- Incorrect answers -->
                                @foreach($question['incorrect_answers'] as $incorrect)
                                    <div class="flex items-center space-x-2 px-4 py-2 ">
                                        <input type="radio" name="answer" value="{{ $incorrect }}" required>
                                        <label class="text-md px-2">{{ $incorrect }}</label>
                                    </div>
                                @endforeach
                                <!-- Correct answer -->
                                <div class="flex items-center space-x-2 px-4 py-2 ">
                                    <input type="radio" name="answer" value="{{ $question['correct_answer'] }}" required>
                                    <label class="text-md px-2">{{ $question['correct_answer'] }}</label>
                                </div>
                                <div class="mt-4 mb-4 px-4 text-white">
                                    <button type="submit" class="px-6 py-4 cta-btn-nb-orange bg-submit">Submit Answer</button>
                                </div>
                            </form>
                        </div>
                    </main>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>