<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Throwable;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // 회원가입
    public function register(Request $request){
        
        $check_email = explode('@', $request['email'])[1];
        $is_not_g_suite_mail = strcmp($check_email, 'g.yju.ac.kr');

        // name 을 입력 안했을 시
        if (!$request->name) {
            // 세션 플래시 데이터 저장 : 새로고침 시 없어지는 데이터
            return redirect()->route('register')->with([
                'msg' => '이름을 적어주세요.' ,
                'name' => $request->name,
                'email'=> $request->email,
                'password'=> $request->password
            ]);
        } 
        // email을 입력 안했을 시
        if (!$request->email) {
            // 세션 플래시 데이터 저장 : 새로고침 시 없어지는 데이터
            return redirect()->route('register')->with([
                'msg' => '이메일을 입력해주세요.' ,
                'name' => $request->name,
                'email'=> $request->email,
                'password'=> $request->password
            ]);
        } 
        // G-suite 계정이 아닌 경우
        if ($is_not_g_suite_mail) {
            // 세션 플래시 데이터 저장 : 새로고침 시 없어지는 데이터
            return redirect()->route('register')->with([
                'msg' => 'G-suite 계정이 아닙니다.' ,
                'name' => $request->name,
                'email'=> $request->email,
                'password'=> $request->password
            ]);
        } 
        // 비밀번호를 입력안했을 시
        if ($is_not_g_suite_mail) {
            // 세션 플래시 데이터 저장 : 새로고침 시 없어지는 데이터
            return redirect()->route('register')->with([
                'msg' => 'G-suite 계정이 아닙니다.' ,
                'name' => $request->name,
                'email'=> $request->email,
                'password'=> $request->password
            ]);
        } 
            $validated = Validator::make($request->all(),[
                'name' => 'unique:users|max:20',
                'email' => 'required|unique:users',
                'password' => 'required|min:4', 
            ]);

            if ($validated->fails()) {
                $errorMsg = $validated->errors()->first();  // 첫 번째 에러 메시지 가져오기
                return redirect()->route('register')->with('msg', $errorMsg);
            }

            User::create($validated->validate());

            return redirect()->route('login')->with([
                'msg' => '회원가입 성공'
            ]); 

        
    }
}
