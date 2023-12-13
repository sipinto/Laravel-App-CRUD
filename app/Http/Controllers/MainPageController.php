<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\Notice;

class MainPageController extends Controller
{
    public function index(){
        $Notice = Notice::with('images')->orderBy("id","desc")->paginate(5, ['*'] , 'notice_page');

        $Board = Board::with('images')->orderBy("id","desc")->paginate(5, ['*'],'board_page');
        
        // return response()->json([
        //     "Notice" => $Notice,
        //     "Board" => $Board
        // ]);
        
        return view('main', ['notice' => $Notice, 'board' => $Board]);
    }
}
