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
      {{-- 글 포장 --}}
      <div class="content">
        @if(session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif
        {{-- 글 쓰기 --}}
        <div class="writeWrap">
            <div class="titleWrap">
                <div class="titleBlock">글쓰기</div>
            </div>
            <form id="articleForm" action="{{route('post')}}" method="POST" class="form-container" enctype="multipart/form-data">
                @csrf
                @method('POST') <!-- Initially, the method is POST -->
                <div class="mb-3">
                    <label for="category" class="form-label">카테고리</label>
                    <select class="form-select" id="category" name="category">

                        @if($work == 'edit')
                          <option value="{{$category}}">{{$category}}</option>
                        @else 
                          <option selected>카테고리를 선택하세요</option>
                          @if(session('position')=='admin')
                            <option value="notice">공지사항</option>
                          @endif
                          <option value="board">일반글</option>
                          <option value="unknown">미정</option>
                        @endif
                        
                        
                        <!-- More categories -->
                    </select>
                </div>
                <div class="mb-3">
                    <label for="writer" class="form-label">작성자</label>
                    <input style="background-color:gainsboro" type="disable" class="form-control" name="writer" value="{{ session('name') }}"id="writer"  readonly>
                    <input type="hidden" name="email" value="{{ session('email') }}">  
                </div>
                
                <div class="mb-3">
                    <label for="title" class="form-label">제목</label>
                    @if ($work =='edit')
                    <input type="text" class="form-control" id="title" name="title" value="{{$articles->title}}" placeholder="제목을 입력하세요">
                    @else
                    <input type="text" class="form-control" id="title" name="title" value="{{ session('title') }}" placeholder="제목을 입력하세요">
                    @endif
                    
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">내용</label>
                    @if ($work =='edit')
                    <textarea class="form-control" id="content" name="content" rows="20" value="{{ $articles->content }}" placeholder="내용을 입력하세요">{{$articles->content}}</textarea>
                    @else
                    <textarea class="form-control" id="content" name="content" rows="20" value="{{ session('content') }}" placeholder="내용을 입력하세요"></textarea>
                    @endif
                    
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">썸네일</label>
                    <input type="file" class="form-control" id="image" name="image" onchange="previewImage();">
                </div>
                <div class="mb-3">
                  <img id="preview"  alt="Image Preview" style="display:none;">
                </div>
                <div class="buttonList">
                    <a href="{{ url('/main') }}" class="btn btn-secondary cancelButton">취소</a>
                    @if($work == 'write')
                    <button type="submit" class="btn btn-dark writeButton">글쓰기</button>
                    @else
                    <a id="editButton" href="/editPage" class="btn btn-primary writeButton">글 수정</a>
                    @endif
                </div>
                
            </form>
        </div>
        </div>
      </div>
    {{-- 푸터 --}}
    <div class="footer">
        
    </div>
  </div>

  @if(Session::has('alert'))
    <script>
      alert('{{ Session::get('alert') }}');
    </script>
  @endif

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
  $(document).ready(function(){
      $('.form-container').on('submit', function(e){
          if ($('#category').val() == '카테고리를 선택하세요') {
              alert('카테고리를 선택해주세요.');
              $('#category').focus();
              e.preventDefault();
          } else if ($('#title').val() == '') {
              alert('제목을 입력해주세요.');
              $('#title').focus();
              e.preventDefault();
          } else if ($('#content').val() == '') {
              alert('내용을 입력해주세요.');
              $('#content').focus();
              e.preventDefault();
          }
      });
  });
  </script>
  <script>
    function previewImage() {
        var file = document.querySelector("#image").files[0];
        var reader = new FileReader();
    
        reader.addEventListener("load", function () {
            document.querySelector("#preview").src = reader.result;
            document.querySelector("#preview").style.display = "block";
        }, false);
    
        if (file) {
            reader.readAsDataURL(file);
        }
    }
    </script>

</body>
</html>