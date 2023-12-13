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
            <div class="nonLoginLogo">  
                <a href="{{ route('login') }}">
                    <img class="myLogo" src="{{ asset('storage/img/logo.jpg') }}" alt="Image">
                </a>
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
                          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ session('email') }}">
                        </div>
                        @if(session('email_msg'))
                            <div class="alert alert-success">
                                {{ session('email_msg') }}
                            </div>
                        @endif
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="{{ session('password') }}">
                        </div>
                        @if(session('pass_msg'))
                            <div class="alert alert-success">
                                {{ session('pass_msg') }}
                            </div>
                        @endif
                        <div class="loginModule">
                            {{-- <div class="passwordButton">
                                <a href="{{ url('/register') }}" class="btn btn-info registerAncor" role="button">비밀번호 찾기</a>
                            </div> --}}
                            <button id="loginButton" type="submit" class="btn btn-primary">로그인</button>
                            <div class="registerButton">
                                <a href="{{ url('/register') }}" class="btn btn-info registerAncor" role="button">회원가입</a>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
            </div>
        </div>
        <div class="footer">
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @if(Session::has('alert'))
    <script>
      alert('{{ Session::get('alert') }}');
    </script>
    @endif
    @if(Session::has('msg'))
  <script>
    alert('{{ Session::get('msg') }}');
  </script>
  @endif
<script>
$(document).ready(function(){
    $('.login-form').on('submit', function(e){
        if ($('input[name="email"]').val() == '') {
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