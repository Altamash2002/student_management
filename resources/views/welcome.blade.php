<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Management</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 text-gray-100 min-h-screen flex items-center justify-center">
        <div class="max-w-lg w-full p-6 bg-gray-800 shadow-lg rounded-lg">
            <div class="text-center">
                <img src="https://static.vecteezy.com/system/resources/previews/000/379/680/original/user-management-vector-icon.jpg" alt="User Management Logo" class="w-24 h-24 mx-auto mb-4 rounded-full shadow-md">
                <h1 class="text-2xl font-bold text-white">Welcome to Student Management</h1>
                <p class="text-gray-400 mt-2">Manage your users with ease and simplicity!</p>
            </div>

            <div class="mt-8 space-y-4">
                <a href="/login" class="block w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                    LOGIN
                </a>
                <a href="/register" class="block w-full text-center bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                    REGISTER
                </a>
            </div>

            <div class="mt-8 text-center text-gray-400 text-sm">
                <p>&copy; {{ date('Y') }} Student Management. All rights reserved.</p>
            </div>
        </div>
    </body>
</html>
