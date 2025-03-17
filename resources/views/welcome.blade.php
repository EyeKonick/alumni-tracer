<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="flex flex-col items-center justify-center min-h-screen py-6 bg-gray-50">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4">Welcome to Alumni Tracer</h1>
            <p class="mb-8">Please click the button below</p>
            <a href="{{ route('survey.show') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                Start Survey
            </a>
        </div>
    </div>
</body>
</html>
