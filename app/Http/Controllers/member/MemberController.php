<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use App\Models\member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function memberList(){
        //$view = view('member/memberList')->with('test','jin');
        $view = view('member/memberList')->with([
            'test'=>'jin',
            'test2'=>'hehe']);
        $members = member::get();

        $view->members = $members;

        return $view;

    }
    //# withTrashed() = 삭제된 로우 포함
    //# onlyTrashed() = 삭제된 로우만
    //# ex) member::withTrashed()->get()

    public function memberDetail($id){
        $view = view('member/memberDetail');
        // dd($id);
        $memberDetail = member::find($id);

        $view->memberDetail = $memberDetail;
        $view->id = $id;

        return $view;
    }



    public function memberCreate(Request $request){
        $data = $request->input();
        //dd($data);
        $res =(new member())->memberCreate($data);
        if($res){

            return redirect()->route('memberList')->with('alert','Added to members!');
        }else{
            return false;
        }


    }

    public function memberUpdate(Request $request, $id){
        $data = $request->input();
        //dd($data);

        $res = (new member())->memberUpdate($data, $id);
        if($res){

            return redirect()->route('memberList')->with('flashSuccess', '데이터 편집 성공');
        }else{
            return false;
        }
    }






}
