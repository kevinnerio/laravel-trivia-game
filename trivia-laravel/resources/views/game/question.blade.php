<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        .bg-light-orange{
            background: #9eb5da; 
        }
        </style>
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                {{-- Pub Trivia Logo --}}
                    <a
                            href="{{ url('/') }}"
                            class="inline-block border border-transparent hover:border-[#19140035] rounded-sm text-sm leading-normal"
                        >
                        <svg class="w-full max-w-[300px] text-[#0066ff] dark:text-[#F61500] transition-all translate-y-0 opacity-100 max-w-none duration-750 starting:opacity-0 starting:translate-y-6" viewBox="0 0 600 120" xmlns="http://www.w3.org/2000/svg">
                            <text x="0" y="90" font-family="Arial Black, sans-serif" font-size="32" fill="currentColor">PUB TRIVIA</text>
                        </svg>
                        </a>
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
        <div class="flex justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="flex flex-col w-full lg:max-w-4xl px-6 py-6">
                <div class="mb-6">
                    <!-- <h1 class="text-xl font-semibold">Trivia Question</h1> --> 
                </div>
                <div class="">
                    <h2 class="px-4 py-2 text-lg text-white font-medium border border-2 bg-orange">Question {{ $game->current_question_index + 1 }}/10</h2>
                    <p class="px-4 py-2 text-md bg-light-orange">{!! $question['question'] !!}</p>
                </div> 
                <div class="space-y-4 bg-light-orange">
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


        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>




<!DOCTYPE html>
<html>

</body>
</html>
