<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class member extends Model
{
    use SoftDeletes;
    //use HasFactory;
    protected $table ='members';

    //멤버추가
    public function memberCreate($data){
        $model = new self();
        $model->userid = $data['userid'];
        $model->name = $data['name'];
        $model->phone = $data['phone'];
        $model->email = $data['email'];
        $res = $model->save();
        return $res;
    }

    //멤버수정
    public function memberUpdate($data, $id){
        $model = self::find($id);
        $model->userid = $data['userid'];
        $model->name = $data['name'];
        $model->phone = $data['phone'];
        $model->email = $data['email'];
        $res = $model->save();
        return $res;



    }

    //멤버삭제
    public function memberDelete($id){
        dd($id);
        return 1111;

    }
//    public function memberDelete($id){
//        $model = self::find($id);
//        $res = $model->delete();
//        return $res;
//    }
}
