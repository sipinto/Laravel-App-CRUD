<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){
        $user = User::where('email', $request->email)->first();

        // 비밀번호 확인
        if(!Hash::check($request->password, $user->password)){
            return response()->json([
                'status' => false,
                'message' => 'can not login'
            ]);
        } else {
            // Admin 유저인지 확인 
            $check = User::where('email', $request->email)->first();
            
            // Admin 일 경우 반환 값
            if($check->position=='admin') {
                auth()->user();
                $token = $check->createToken($check->name,['admin'])->plainTextToken;
                
                return redirect()->route('main')->with('token', $token);

                // return response()->json([
                //     'token' =>$token,
                //     'message' => '관리자 로그인 완료!', 
                // ], 200);
            } 

            // 일반 유저일 경우 
            auth()->user();
            $token = $user->createToken($user->name,['user'])->plainTextToken;
            
            return redirect()->route('main')->with('token', $token);
           
            // return response()->json([
            //     'token' => $token, 
            //     'message' => '유저 로그인 완료!',
            // ], 200);
        }
    }
}
