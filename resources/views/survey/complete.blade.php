<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Complete</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg text-center">
        <h1 class="text-2xl font-bold mb-4">Thank You!</h1>
        <p>Your survey responses have been submitted successfully.</p>
        <a href="{{ route('survey.show') }}" class="mt-4 inline-block bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700">Start Over</a>
    </div>
</body>
</html>
