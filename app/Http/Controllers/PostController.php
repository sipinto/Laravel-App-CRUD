<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BoardImage;
use App\Models\NoticeImage;

use App\Models\Comment;
use App\Models\Notice;
use App\Models\Board;

class PostController extends Controller
{
    /**
     * 글 수정 페이지 불러 오기
     */
    public function index(Request $request){

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 카테고리가 선택 안될 시
        if($request->category =='카테고리를 선택하세요'){

            return redirect()->route('writePage')->with([
                'write_msg' => '카테고리를 선택해주세요.',
                'title'=> $request->title,
                'content'=> $request->content
            ]);
        }
        // 제목이 없을 시
        else if($request->title == ''){
            return redirect()->route('writePage')->with([
                'write_msg' => '제목을 입력해주세요.',
                'title'=> $request->title,
                'content'=> $request->content
            ]);
        }
        // 
        else if($request->content == ''){
            return redirect()->route('writePage')->with([
                'write_msg' => '내용을 입력해주세요.',
                'title'=> $request->title,
                'content'=> $request->content
            ]);
        } else {
            // 정상 진행 시 여기부터 진행
            $data['category'] = $request->category;

            $data['writer'] = $request->writer;
            $data['email'] = $request->email;
            $data['title'] = $request->title;
            $data['content'] = $request->content;
            

            // 게시글 생성
            if($request->category == 'notice'){
                $post = Notice::create($data);
            } else if ($request->category == 'board') {
                $post = Board::create($data);
            }

            // 파일이 요청에 포함되었는지 확인
            if($request->hasFile('image')) {
                $file = $request->file('image');

                // 파일 이름 가져오기
                $fileName = $file->getClientOriginalName();

                // category 값에 따라 저장 경로 결정
                $path = $request->category == 'notice' ? 'public/notice' : 'public/board';

                // 파일 저장하고 저장된 경로 받기
                $fileSavePath = $file->storeAs($path, $fileName);

                // storeAs 메서드는 'public/'을 포함한 전체 경로를 반환하므로, 
                // asset 함수에서 사용할 수 있는 경로로 변환
                $assetPath = str_replace('public/', 'storage/', $fileSavePath);


                if($request->category == 'notice'){
                    // 공지사항 Image 모델에 저장
                    $image = new NoticeImage;
                    $image->noticeId = $post->id;
                } else if ($request->category == 'board') {
                    // 게시판 Image 모델에 저장
                    $image = new BoardImage;
                    $image->boardId = $post->id;
                }

                $image->imgName = $fileName;
                $image->imgAdd = $assetPath;
                $image->save();

                }

                return redirect()->route('main')->with([
                    'alert' => '글이 정상적으로 등록되었습니다.' ,
                ]);
    }
}

    /**
     * Display the specified resource.
     */
    public function show($category ,$pId)
    {   if($category == 'notice'){
            $article = Notice::with('images')->where('id', $pId)->firstOrFail();
        } else {
            $article = Board::with('images')->where('id', $pId)->firstOrFail();
        }
        // return $Notice;
        
        // 공지사항 권한 있는 지 확인
            // return response()->json([
            //     
            // ]);
            // return $article;
    return view('editWritePage', [
        'articles' => $article, 
        'work'=>'edit', 
        'category' => $category
    ]);
            
    }

    /**
     *  수정 버튼 
     */
    public function edit(Request $request, $category ,$pId)
    {
        // 카테고리가 선택 안될 시
    if($request->category =='카테고리를 선택하세요'){
        return redirect()->back()->with([
            'write_msg' => '카테고리를 선택해주세요.',
            'title'=> $request->title,
            'content'=> $request->content
        ]);
    }
    // 제목이 없을 시
    else if($request->title == ''){
        return redirect()->back()->with([
            'write_msg' => '제목을 입력해주세요.',
            'title'=> $request->title,
            'content'=> $request->content
        ]);
    }
    // 내용이 없을 시
    else if($request->content == ''){
        return redirect()->back()->with([
            'write_msg' => '내용을 입력해주세요.',
            'title'=> $request->title,
            'content'=> $request->content
        ]);
    } else {
        // 정상 진행 시 여기부터 진행
        $data['title'] = $request->title;
        $data['content'] = $request->content;

        // 게시글 업데이트
        if($request->category == 'notice'){
            $post = Notice::find($pId);
        } else if ($request->category == 'board') {
            $post = Board::find($pId);
        }

        // 게시글 수정 실행
        $post->update($data);

        // 파일이 요청에 포함되었는지 확인
        if($request->hasFile('image')) {
            $file = $request->file('image');

            // 파일 이름 가져오기
            $fileName = $file->getClientOriginalName();

            // category 값에 따라 저장 경로 결정
            $path = $request->category == 'notice' ? 'public/notice' : 'public/board';

            // 파일 저장하고 저장된 경로 받기
            $fileSavePath = $file->storeAs($path, $fileName);

            // storeAs 메서드는 'public/'을 포함한 전체 경로를 반환하므로, 
            // asset 함수에서 사용할 수 있는 경로로 변환
            $assetPath = str_replace('public/', 'storage/', $fileSavePath);

            if($request->category == 'notice'){
                // 공지사항 Image 모델에 저장
                $image = NoticeImage::where('noticeId', $pId)->first();
            } else if ($request->category == 'board') {
                // 게시판 Image 모델에 저장
                $image = BoardImage::where('boardId', $pId)->first();
            }

            $image->imgName = $fileName;
            $image->imgAdd = $assetPath;
            $image->save();
        }

        return redirect()->route('main')->with([
            'alert' => '글이 정상적으로 수정되었습니다.' ,
        ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $category, $pId)
    {
        // 포스트 찾기
        if($request->category == 'notice'){
            $post = Notice::find($pId);
        } else if ($request->category == 'board') {
            $post = Board::find($pId);
        } 

        // 삭제
        if($post){
            $post->delete();
        } else {
            return redirect()->route('main')->with([
                'alert' => '글을 찾지 못했습니다.' ,
            ]);
        }
        return redirect()->route('main')->with([
            'alert' => '글이 정상적으로 삭제 되었습니다.' ,
        ]);
        // return response()->json([
        //     "category" => $category,
        //     "pId" => $pId,
        // ]);
    }
}
