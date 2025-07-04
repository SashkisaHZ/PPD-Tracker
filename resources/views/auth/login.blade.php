<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
        @if(session('status'))
            <div class="mb-4 text-green-600">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block mb-1" for="email">Email</label>
                <input class="w-full border rounded px-3 py-2" type="email" name="email" id="email" required autofocus>
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1" for="password">Password</label>
                <input class="w-full border rounded px-3 py-2" type="password" name="password" id="password" required>
                @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700" type="submit">Login</button>
        </form>
        <div class="mt-4 text-center">
            <a href="{{ route('register') }}">
                <button class="bg-green-200 text-black px-4 py-2 rounded hover:bg-green-300 shadow-md border border-green-700 transition duration-150" type="button">
                    Don't have an account? Register
                </button>
            </a>
        </div>
    </div>
</body>
</html>
