<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# 라라벨 학습 정리

## 1강. 개발 환경 설정
- 라라벨 프로젝트 설치 방법
  - 전제 조건
    - PHP 설치
    - Composer설치
    - Laravel 설치

  - 라라벨로 설치 시

    `laravel new 프로젝트명`
  - 컴포저로 설치 시
  
    `composer create-project --prefer-dist  laravel/laravel 프로젝트명`
  - 실행 전 애플리케이션의 고유 암호화 키 생성

    `php artisan key:generate`
  - 개발자 서버 실행 

    `php artisan serve`

## 2강. 설정 관련 이모저모
- config 파사드 or config() 메서드 사용 방법
    - config 파사드
  
      `Config::get('app.name');`
    - config 메서드
        
        `config('app.name');`
- env() 메서드로 .env파일에 있는 환경변수 참조
    
    `env('APP_URL');`
    - 주의 사항 
      - env() 메서드는 config 디렉터리 이외에서는 사용하지 말것
      - 배포시에 제대로 동작하지 않고 null값 반환

## 3. 라라벨 동작
- 라라벨 작동 방식
  - /public 디렉터리에 있는 index.php으로 모든 요청이 들어오면서 시작함.
## 4. 라라벨 브리즈
- 라라벨 브리즈 설치 (스타터 킷) 

    `composer require laravel/breeze --dev`
    
    
    `php artisan migrate`
    
    `npm install`

    `npm dev`

- '/' 홈 화면에서 로그인 후 dashboard가 아닌 home으로 이동 시키고 싶을 시
    - App\Provider\RouteServiceProvider.php에서

        `public const HOME = '/dashboard';` 에서

        `public const HOME = '/';` 으로 변경

## 5. 글쓰기 화면 만들기
- 블레이드 파일 생성 위치
  - resources/views 안에 생성
- 라우팅 방법
  - routes/web.php에 라우트 등록

  ```
  Route::get('/라우트명',function(){
    return view('라우트 위치');
  });
  ```

## 6. 자바스크립트와 CSS 불러오기
- 라라벨에서 resources안에 있는 자원을 불러오기 위해서는
  - vite() 메서드를 사용 하면 된다
  - vite() 메서드 사용 법
  ```
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  ```
- 공식 문서에서 찾아 보려면...
  - Asset Bundling (vite)
    - Loading Your Scripts And Style


## 7. 테일윈드 CSS로 꾸미기

## 8. 글 저장하기 라우트 추가하기

## 9. 유효성 검사
## 10. 에러 메세지 표시하기


## 11. 한글화 하기


## 12. 폼 다시 채워주기


## 13. 마이그레이션


## 14. 글 저장하기 

## 15. 대량 할당



## 16. 글 목록 보여주기


## 17. 블레이드 기초

## 18.글 정렬하기

## 19. 페이지네이션


## 20. 사람이 보기 좋은 시간 데이터로 변경하기

## 21. 작성자 이름 표시하기


## 22. 데이터 조회 횟수 줄이기


## 23. 엘로퀸트 스트릭트 모드



## 24. 개별글 조회하기




## 25. 라우트 이름 



## 26. 글 수정하기


## 27. 글 삭제하기


## 28. 컨트롤러 라우트 그룹


## 29. 테스트



## 30. 리소스 컨트롤러



## 31. 블레이드 컴포넌트 레이아웃

##


##


##


##

##

##
##
##
##
##
##
##
##
##
##
##
##
##
##
##
##
##
##
##
##
##
##
##
##
##

























