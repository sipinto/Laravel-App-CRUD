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
                'status' => 'can not login',
                'message' => 'can not login'
            ]);
        } else {
            // Admin 유저인지 확인 
            $admin = Admin::where('email', $request->email)->first();
            
            // Admin 일 경우 반환 값
            if($admin) {
                auth()->guard('admin')->login($admin);
                $token = $admin->createToken($admin->name);
              
                return response()->json([
                    'token' =>$token->plainTextToken,
                    'message' => '관리자 로그인 완료!', 
                ], 200);
            } 

            // 일반 유저일 경우 
            auth()->user();
            $token = $user->createToken($user->name);

            return response()->json([
                'token' => $token->plainTextToken, 
                'message' => '유저 로그인 완료!',
            ], 200);
        }
    }
}
