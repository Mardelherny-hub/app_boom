<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Geologica', sans-serif;
            }
            
            .login-gradient {
                background: linear-gradient(-45deg, #79BFEA, #FFC2F5, #E5E863, #79BFEA);
                background-size: 400% 400%;
                animation: gradientShift 15s ease infinite;
            }
            
            @keyframes gradientShift {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            
            @keyframes float {
                0%, 100% { transform: translateY(0px) translateX(0px); }
                50% { transform: translateY(-20px) translateX(10px); }
            }
            
            .animate-float {
                animation: float 6s ease-in-out infinite;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="min-h-screen login-gradient flex items-center justify-center relative overflow-hidden p-4">
            
            <!-- Elementos flotantes decorativos -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute top-20 right-20 w-64 h-64 bg-orange-500 opacity-20 rounded-full blur-3xl animate-float"></div>
                <div class="absolute bottom-20 left-20 w-96 h-96 bg-pink-400 opacity-20 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
            </div>

            <div class="w-full max-w-md relative z-10">
                <!-- Logo -->
                <div class="text-center mb-8">
                    <a href="/" class="inline-block">
                        <h1 class="text-5xl font-bold text-white" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.2);">
                            boom! <span class="text-2xl font-normal">studio</span>
                        </h1>
                    </a>
                </div>

                <!-- Card de login -->
                <div class="bg-white/95 backdrop-blur-md shadow-2xl rounded-2xl overflow-hidden">
                    <div class="p-8">
                        {{ $slot }}
                    </div>
                </div>

                <!-- Link a home -->
                <div class="text-center mt-6">
                    <a href="/" class="text-sm text-white hover:text-white/80 transition-colors inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Volver al sitio
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>