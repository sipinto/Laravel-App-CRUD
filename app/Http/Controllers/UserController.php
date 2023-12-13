<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserController extends Controller
{
    public function edit(Request $req){

        $user = User::where('email',$req->email)->first();
        if($req->password == null){
            return redirect()->route('myPage')->with([
                'alert' => '비밀번호를 입력해 주세요' ,
            ]);
        } else if(!Hash::check($req->password, $user->password)) {
            return redirect()->route('myPage')->with([
                'alert' => '비밀번호를 틀리셨습니다.' ,
            ]);
        } else {
            // 수정할 컬럼들 (추후 추가)
            // $data['컬럼1'] = $req->'받아올 컬럼명';
            // $data['컬럼2'] = $req->'받아올 컬럼명';
            $data = $req->all();
            $user->update($data);

            return redirect()->route('main')->with([
                'alert' => '정보가 정상적으로 변경 되었습니다.' ,
            ]); 
        }

        
    }

    public function destroy(Request $req,$email){
        $user = User::where('email',$email)->first();
        if($req->password == null){
            return redirect()->route('myPage')->with([
                'alert' => '비밀번호를 입력해 주세요' ,
            ]);
        } else if(!Hash::check($req->password, $user->password)) {
            return redirect()->route('myPage')->with([
                'alert' => '비밀번호를 틀리셨습니다.' ,
            ]);
        } else {
            $user->tokens()->delete();
            $user->delete();

            return redirect()->route('login')->with([
                'alert' => '회원이 정상적으로 탈퇴되었습니다.' ,
            ]); 
        }

        // return response()->json([
        //     "data" => $req->all(),
        // ]);
    }
}
