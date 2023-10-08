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
        @csrf
        <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
        <input type="text" name="body" class="black w-full mb-2 rounded" value="{{ old('body') }}" >
        @error('body')
            <p class="text-xs text-red-500 my-3">{{ $message }}</p>
        @enderror
        <button class="py-1 px-3 bg-black text-white 
        rounded text-xs">저장하기</button>
        {{ dd(old('body')) }}
    </form>
    </div>
</body>
</html>