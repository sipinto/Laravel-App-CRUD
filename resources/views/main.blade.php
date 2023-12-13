<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>메인 페이지</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div class="wrap">
    {{-- 최상단 로고 --}}
    <div class="logo">  
      <a href="{{ route('main') }}">
        <img src="{{ asset('storage/img/logo.jpg') }}" alt="Image" style="width: 15%">
      </a>
    </div>
    {{-- 헤더 --}}
    <div class="header">
          <nav id="nav" class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/notice">공지사항</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/board">게시판</a>
                </li>
            </ul>
        </nav>
    </div>
    {{-- 주 내용 --}}
    <div class="container">
      {{-- 프로필 좌 --}}
      <div class="aside">
        <div class="profile">
          <img class="myImage" src="{{ asset('storage/img/로꼬.png') }}" alt="Image"> 
          <div class="logout-wrap">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <input type="hidden" name="token" value="{{ session('token') }}">
              <button type="submit" class="btn btn-dark logout">로그아웃</button>
            </form>   
            <div class="user_intro">안녕하세요 {{ session('name') }}님</div>
          </div>
        </div>
        <div class="myMenu bg-dark">
          <div class="myPage">
            <a class="nav-link active" aria-current="page" href="/myPage">
              마이페이지
            </a>
          </div>
          <div class="write">
            <a class="nav-link active" aria-current="page" href="/writePage">
              글쓰기
            </a>
          </div>
        </div>
      </div>
      {{-- 글목록 우 --}}
      <div class="content">
          {{-- 공지사항 --}}
          <div class="notice">
            <div class="captionTitle">
              <h2>공지사항</h2>
            </div>
            <div class="carousel">
              @foreach ($notice as $singleNotice)
                <div class="Card">
                  <a href="/notice/{{$singleNotice->id}}" class="custom-link">
                    @foreach($singleNotice->images as $image)
                    <img src="{{ asset($image->imgAdd) }}" alt="{{ $image->imgName }}" class="cardImg" onerror="this.onerror=null; this.src='{{ asset('storage/img/분실물.jpg') }}'" >
                    @endforeach
                    <p class="explainP">{{$singleNotice->title}}</p>
                  </a>
                </div>
              @endforeach
            </div>
          </div>
          <hr>
          {{-- 전체글보기 --}}
          <div class="board">
            <div class="captionTitle">
              <h2>게시판</h2>
            </div>
            <div class="carousel">
              @foreach ($board as $singleBoard)
                <div class="Card">
                  <a  href="/board/{{$singleBoard->id}}" class="custom-link">
                    @foreach($singleBoard->images as $image)
                    <img src="{{ asset($image->imgAdd) }}" alt="{{ $image->imgName }}" class="cardImg" onerror="this.onerror=null; this.src='{{ asset('storage/img/분실물.jpg') }}'">
                    @endforeach
                    <p class="explainP">{{$singleBoard->title}}</p>
                  </a>
                </div>
              @endforeach
            </div>
          </div>
          
      </div>
    </div>
    {{-- 푸터 --}}
    <div class="footer">
      푸터
    </div>
  </div>
  @if(Session::has('alert'))
  <script>
    alert('{{ Session::get('alert') }}');
  </script>
  @endif
</body>
</html>