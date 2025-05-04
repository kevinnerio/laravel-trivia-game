<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            Game Result
        </h2>
    </x-slot>

    <style>
        .cta-btn:hover {
            background-color: rgb(0, 0, 0);
            color: white;
        }
        .cta-btn {
            border-radius: 10px;
            border: 2px solid black;
            padding: 10px 20px;
        }
        .bg-light-blue {
            border-radius: 10px;
        }
        .bg-blue-gray {
            background: #33496e;
        }
        .bg-submit {
            background: #42a0e9;
        }
        .bg-light-gray {
            background: #f4f4f4;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
                        <main class="flex flex-col w-full lg:max-w-4xl px-6 py-6">
                        <h3 class="text-2xl font-bold mb-4">🎉 You scored {{ $score }} out of {{ $totalQuestions }}!</h3>
                            <div class="mt-8 space-y-4">
                                <a href="{{ route('game.start') }}" class="cta-btn bg-light-blue bg-submit text-white inline-block">
                                    Play Again
                                </a>
                                @guest
                                    <a href="{{ route('register') }}" class="cta-btn bg-blue-gray text-white inline-block">
                                        Register to Save Scores
                                    </a>
                                @else
                                    <a href="{{ route('dashboard') }}" class="cta-btn bg-blue-gray text-white inline-block">
                                        Return to Dashboard
                                    </a>
                                @endguest
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
