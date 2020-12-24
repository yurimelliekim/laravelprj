<?php

namespace App\Models\testmem;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;


class Testmem extends Model
{
    //use HasFactory;
    use SoftDeletes;
    use Searchable;
    protected $table='testmem';

    public function testmemCreate($data){

        $model = new self();
        $model->userid = $data['userid'];
        $model->name = $data['name'];
        $model->phone = $data['phone'];
        $model->email = $data['email'];
        $model->auth = $data['auth'];
        $res=$model->save();

        return $res;
    }

    public function testmemUpdate($data, $id){

        $model = self::find($id);
        $model->userid = $data['userid'];
        $model->name = $data['name'];
        $model->phone = $data['phone'];
        $model->email = $data['email'];
        $model->auth = $data['auth'];
        $res = $model->save();
        return $res;
    }

    public function testmemDelete($id){
        $model = self::find($id);
        $res = $model->delete();
        return $res;
    }

    //검색기능
    public function searchData(){
        $model = $this;
        //dd($_GET);
        if(!empty($_GET['searchText'])){
            $data = $_GET['searchText'];
            $model = $model->where(function($query) use ($data){
                $query->where('name', 'like' ,'%'.$data.'%');
                $query->orWhere('id', 'like' ,'%'.$data.'%');
                $query->orWhere('phone', 'like' ,'%'.$data.'%');
                $query->orWhere('email', 'like' ,'%'.$data.'%');
            });
        }
        if(!empty($_GET['searchAuth'])){
            $data = $_GET['searchAuth'];
            $model = $model->where(function($query) use ($data){
                $query->where('auth', $data);
            });
        }

            if((!empty($_GET['fromDate']))&&(!empty($_GET['toDate']))){
                $fromDate = $_GET['fromDate'];
                $toDate = $_GET['toDate'];
                $model = $model->where(function($query) use($fromDate, $toDate){
                    $query->whereBetween('created_at',  [$fromDate, $toDate]);
                });
            }

        return $model;
    }
    public function searchData1(){
        //dd(gettype($data));
        $model = $this;

        $qq = 'dd';

        if(!empty($_GET['searchText'])){
            $model = $model->where(function($query) use ($qq){
                $query->where('userid', $_GET['searchText']);
            });
        }
        //dd($model);


        return $model;


//        $searchText = $data->searchText;
//        $searchAuth = $data->searchAuth;
//        $searchStartDate = $data->searchStartDate;
//        $searchEndDate = $data->searchEndDate;

//        if(empty($searchAuth)){
//            dd($searchText,$searchAuth);
//        }

//        $model = $this;
//        if(!empty($searchText)){
//            $model = $model ->where('userid',$searchText)
//                ->orwhere('name',$searchText)
//                ->orwhere('phone',$searchText)
//                ->orwhere('email',$searchText)
//                ->get();

//            if(!empty($searchAuth)){
//                $lastQuery = end($model);
//                dd($lastQuery);
//                $model = $model ->where('auth',$searchAuth)
//                                ->get();
 //           }
            //echo '1111';
            //dd($searchText,$data->searchAuth);
//        }
        //dd($searchText,$data->searchAuth);

//        $model = $model->where(function($query) use ($data){
//            $query->where('name', $data);
//            $query->orWhere('id', $data);
//            $query->orWhere('phone', $data);
//            $query->orWhere('email', $data);
//        });
        //dd($model);
    }

    /*public function searchAuth(){
        $model = $this;
        $model = $model ->distinct()
                        ->select('auth')
                        ->orderBy('auth')
                        ->get();
        return $model;
    }*/



}
