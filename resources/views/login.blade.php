<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>로그인 페이지</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="wrap">
        <div class="header">
            <div class="logo">  
                <img src="{{ asset('storage/img/logo.jpg') }}" alt="Image">
            </div>
        </div>
        <div class="container">
            <div class="login-container">
                {{-- 로그인 헤더 --}}
            <div class="login-header">
                <h1>로그인 헤더 입니당</h1>
            </div>
            {{-- 로그인 주 박스 --}}
            <div class="login-wrap">
                {{-- 로그인 박스 --}}
                <div class="login-Box">
                    <form class="login-form" action="{{route('user.login')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">로그인</button>
                      </form>
                </div>
                <div id="회원가입">
                    <div>회원가입 페이지 리다이렉트 ><</div>
                </div>
            </div>
            </div>
        </div>
        <div class="footer">
    
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>