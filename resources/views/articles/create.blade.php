<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
</head>
<body>
    <div class="container p-5">
        <h1 class="text-2xl">글쓰기</h1>
    <form action="/articles" method="POST" class="mt-3">
        <input type="text" class="black w-full mb-2">
        <input type="button" value="저장하기" class="py-1 px-3 bg-black text-white rounded text-xs">
    </form>
    </div>
</body>
</html>