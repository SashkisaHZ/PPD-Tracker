<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label class="block mb-1" for="name">Name</label>
                <input class="w-full border rounded px-3 py-2" type="text" name="name" id="name" required>
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1" for="email">Email</label>
                <input class="w-full border rounded px-3 py-2" type="email" name="email" id="email" required>
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1" for="password">Password</label>
                <input class="w-full border rounded px-3 py-2" type="password" name="password" id="password" required>
                @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1" for="password_confirmation">Confirm Password</label>
                <input class="w-full border rounded px-3 py-2" type="password" name="password_confirmation" id="password_confirmation" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1" for="role">Register as</label>
                <select class="w-full border rounded px-3 py-2" name="role" id="role" required>
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                </select>
                @error('role') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition duration-150" type="submit">
                Register
            </button>
        </form>
        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Already have an account? Login</a>
        </div>
    </div>
</body>
</html>
