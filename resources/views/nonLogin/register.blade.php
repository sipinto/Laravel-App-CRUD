<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>회원가입 페이지</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="wrap">
        <div class="header">
            <div class="nonLoginLogo">  
            <a href="{{ route('login') }}">
                <img class="myLogo" src="{{ asset('storage/img/logo.jpg') }}" alt="Image">
            </a>
            </div>
        </div>
        <div class="container">
            <div class="login-container">
                {{-- 회원가입 헤더 --}}
            <div class="login-header">
                <h1>회원가입 헤더 입니당</h1>
            </div>
            {{-- 회원가입 주 박스 --}}
            <div class="login-wrap">
                {{-- 회원가입 박스 --}}
                <div class="login-Box">
                    <form class="login-form" action="{{route('user.regist')}}" method="POST">
                        @csrf
                        {{-- 이름 --}}
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">이름</label>
                          <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ session('name') }}">
                        </div>
    
                        {{-- 이메일 --}}
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">이메일</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ session('email') }}">
                        </div>
                        
                        {{-- 비밀번호 --}}
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">비밀번호</label>
                          <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="{{ session('password') }}">
                        </div>
                        
                        @if ($errors->post->has('email'))
                            <div class="alert alert-danger">
                                {{ $errors->post->first('email') }}
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary registButton">회원등록</button>
                      </form>
                </div>
                <div id="회원가입">
                    <div>

                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="footer">
    
        </div>
    </div>

    @if(Session::has('msg'))
    <script>
      alert('{{ Session::get('msg') }}');
    </script>
    @endif
   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    $(document).ready(function(){
        $('.login-form').on('submit', function(e){
            if ($('input[name="name"]').val() == '') {
                alert('이름을 입력해주세요.');
                $('input[name="name"]').focus();
                e.preventDefault();
            } else if ($('input[name="email"]').val() == '') {
                alert('이메일을 입력해주세요.');
                $('input[name="email"]').focus();
                e.preventDefault();
            } else if ($('input[name="password"]').val() == '') {
                alert('비밀번호를 입력해주세요.');
                $('input[name="password"]').focus();
                e.preventDefault();
            }
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>