<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Notice = Notice::orderBy("id","desc")->paginate(10);

        return view('notice', ['notice' => $Notice]);
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
        return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show($nId)
    {
        
        $Notice = Notice::with('images')->where('id', $nId)->firstOrFail();
        
        $user = session('position');
        $nowUser = session('email');
        // return $Notice;

        // 공지사항 권한 있는 지 확인
        if($user == 'admin'){
            // return response()->json([
            //     'pid' => $nId,
            //     'pro' => $Notice,
            //     'email' => $Notice->email,
            //     'now' => $nowUser,
            // ]);
            if($Notice->email == $nowUser){
                $auth = true;
                // 수정/삭제 권한
                return view('details', [
                    'articles' => $Notice, 
                    'auth' => $auth, 
                    'category' => 'notice', 
                    'work' => 'write'
                ]);
            } else {
                $auth = false;
                return view('details', [
                    'articles' => $Notice, 
                    'auth' => $auth, 
                    'category' => 'notice', 
                    'work' => 'read'
                ]);
            }

            
        
        } else {
            // 일반 유저
            $auth = false; 
            return view('details', [
                'articles' => $Notice, 
                'auth' => $auth, 
                'category' => 'notice', 
                'work' => 'read'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notice $notice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notice $notice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice)
    {
        //
    }
}
