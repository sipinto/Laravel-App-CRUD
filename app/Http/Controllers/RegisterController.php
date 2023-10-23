<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Throwable;

class RegisterController extends Controller
{
    public function register(Request $request){
        try {
        $check_email = explode('@', $request['email'])[1];
        $is_not_g_suite_mail = strcmp($check_email, 'g.yju.ac.kr');

        // G-suite 계정이 아닌 경우
        if ($is_not_g_suite_mail) {
            return response()->json([
                'status' => false,
                'message' => 'G-suite 계정이 아닙니다.',
            ], 422);
        } 

            $validated = $request->validate([
                'name' => 'required|unique:users|max:20',
                'email' => 'required|unique:users',
                'password' => 'required|min:4', 
            ]);

            User::create($validated);

            return redirect()->route('login')->with('alert', '회원 등록이 완료되었습니다.'); 

        } catch (Throwable $e) {
            report($e);
    
            return false;
        }
    }
}
