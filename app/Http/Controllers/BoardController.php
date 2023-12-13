<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $board = Board::orderBy("id","desc")->paginate(10);

        return view('board', ['board' => $board]);
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
    public function store($id)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show($bId)
    {
        $Board = Board::with('images')->where('id', $bId)->firstOrFail();
        
        $user = session('position');
        $nowUser = session('email');
        // return $Board;

        // 공지사항 권한 있는 지 확인
        if($user == 'admin'){
            // return response()->json([
            //     'pid' => $nId,
            //     'pro' => $Board,
            //     'email' => $Board->email,
            //     'now' => $nowUser,
            // ]);
            if($Board->email == $nowUser){
                $auth = true;
                // 수정/삭제 권한
                return view('details', [
                    'articles' => $Board, 
                    'auth' => $auth, 
                    'category' => 'board', 
                    'work' => 'write'
                ]);
            } else {
                $auth = false;
                return view('details', [
                    'articles' => $Board, 
                    'auth' => $auth, 
                    'category' => 'board', 
                    'work' => 'read'
                ]);
            }

        } else {
            // 일반 유저
            $auth = true; 
            return view('details', [
                'articles' => $Board, 
                'auth' => $auth, 
                'category' => 'board', 
                'work' => 'read'
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Board $board)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Board $board)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Board $board)
    {
        //
    }
}
