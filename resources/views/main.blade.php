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
    @if(session('token'))
    <div class="alert alert-success">
        {{ session('token') }}
    </div>
    @endif
    {{-- 최상단 로고 --}}
    <div class="logo">  
      <img src="{{ asset('storage/img/logo.jpg') }}" alt="Image">
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
                <li class="nav-item">
                  <a class="nav-link" href="#">미정</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">미정</a>
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
            <button type="button" class="btn btn-dark logout">로그아웃</button>
            <div class="user_intro">안녕하세요 김민재 님</div>
          </div>
        </div>
        <div class="myMenu bg-dark">
          <div class="myPage">마이페이지</div>
          <div class="write">글쓰기</div>
        </div>
        <div class="my-active">
          댓글알림 & 나의 활동란
        </div>
      </div>
      {{-- 글목록 우 --}}
      <div class="content">
          {{-- 공지사항 --}}
          <div class="notice">
            <table class="table caption-top">
              <caption>List of users</caption>
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
          </div>
          {{-- 전체글보기 --}}
          <div class="board">
            <table class="table caption-top">
              <caption>List of users</caption>
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>
    </div>
    {{-- 푸터 --}}
    <div class="footer">
      푸터
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>