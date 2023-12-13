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
        $credentials = $request->only('email', 'password');
        // 이메일 존재
        if(!$user){

            // 세션 플래시 데이터 저장 : 새로고침 시 없어지는 데이터
            return redirect()->route('login')->with([
                    'email_msg' => '존재하지 않는 이메일 입니다.',
                    'email'=> $request->email,
                    'password'=> $request->password
                ]);
        }
        // 비밀번호 확인
        else if(!Hash::check($request->password, $user->password)){

            // 세션 플래시 데이터 저장 : 새로고침 시 없어지는 데이터
            return redirect()->route('login')->with([
                'pass_msg' => '비밀번호를 틀리셨습니다.' ,
                'email'=> $request->email,
                'password'=> $request->password
            ]);
        } else {
            // Admin 유저인지 확인 
            $check = User::where('email', $request->email)->first();

            if (Auth::attempt($credentials)) {
            // Admin 일 경우 반환 값
            if($check->position=='admin') {
                auth()->user();
                $token = $check->createToken($check->email,['admin'])->plainTextToken;
                
                $msg = '관리자';

            } else {
                // 일반 유저일 경우 

                auth()->user();
                $token = $user->createToken($user->email,['user'])->plainTextToken;

                $msg = '유저';

            }}
            // 세션 저장
            session()->put('token', $token);
            session()->put('name', $check->name);
            session()->put('email', $check->email);
            session()->put('position',$check->position);

            return redirect()->route('main')
                ->with([
                    'msg' => $msg.'로그인 성공' // 세션 플래시 데이터 저장 : 새로고침 시 없어지는 데이터
                ]);
        }
    }
    public function logout(Request $request){
        
        $request->session()
        ->forget(['token','name', 'email', 'url', 'position']);
        // $user->tokens()->delete();
        $user = Auth::user();
        
        $user->tokens()->delete();

        return redirect()->route('login')
                ->with([
                    'msg' => '로그아웃 성공' // 세션 플래시 데이터 저장 : 새로고침 시 없어지는 데이터
                ]);
    }

}
