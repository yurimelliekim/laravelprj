<?php

namespace App\Http\Controllers\testmem;

use App\Http\Controllers\Controller;
use App\Models\dd;
use App\Models\testmem\Testmem;
use Illuminate\Http\Request;
use function Symfony\Component\Translation\t;

class TestmemController extends Controller
{

    public function testmemList(){
        $view= view('testmem/testmemList');

            //$fromDate = $_GET['fromDate'];
            //$toDate = $_GET['toDate'];
            //dd($fromDate, $toDate);

            // $date = explode('-', $_GET['dateRange']);
            //
            //        //dd($_GET['dateRange']);
            //
            //        $from = trim($date[0]);
            //        $to = trim($date[1]);
            //        dd($from, $to);

            $items=((new Testmem())->searchData())->get();
            $view->items = $items;

        return $view;

    }
    public function testmemList1(){
        $view = view('testmem/testmemList');

        $items = (new Testmem())->searchData();
        $view->items = Testmem::all();
        //$view->items = $items;

        /*if(isset($_GET['searchText'])||isset($_GET['searchAuth'])||isset($_GET['searchStartDate'])||isset($_GET['searchEndDate'])){
            $searchText = $_GET['searchText'];
            $searchAuth = $_GET['searchAuth'];
            $searchStartDate = $_GET['searchStartDate'];
            $searchEndDate = $_GET['searchEndDate'];

            $text=(object)null;
            $text->searchText = $searchText;
            $text->searchAuth = $searchAuth;
            $text->searchStartDate = $searchStartDate;
            $text->searchEndDate = $searchEndDate;

            //dd($text);
            $items=(new Testmem())->searchData($text);
            $view->items = $items;
        }*/
//        if(isset($_GET['searchText'])){
//            $text = $_GET['searchText'];
//            $items=(new Testmem())->searchData($text);
//            $view->items = $items;
//        }

//        else{
//            $view->items = Testmem::all();
//        }

//            $eachAuth = (new Testmem())->searchAuth();
//            $view->eachAuth = $eachAuth;

        function lawUsersLevel($val = null)
        {
            $res = collect();
            $res->put("1", "최고관리자");
            $res->put("2", "관리자");
            $res->put("10", "변호사");
            if ($val != null) return $res->get($val);
            return $res;
        }

        $view->dd = lawUsersLevel();


        return $view;
    }

    public function testmemDetail($id){
        $view = view('testmem/testmemDetail');
        $view->items = Testmem::find($id);
            //dd($id);
        $view->id = $id;
        return $view;
    }


    public function testmemCreate(Request $request){

        $data = $request->input();
        $res = (new Testmem())->testmemCreate($data);
        if($res){
            return redirect()->Route('testmemList');
        }else{
            return false;
        }

    }

    public function testmemUpdate(Request $request, $id){

        //dd($id);
        $data = $request->input();
        //$data->id = $id;
        //dd($data);
        $res = (new Testmem())->testmemUpdate($data, $id);

        if($res){

            return redirect()->Route('testmemList');
        }else{
            return false;
        }

    }


        public function testmemDelete($id){
            //$data = $request->input();

            //dd($data);
            $res = (new Testmem())->testmemDelete($id);

            if($res){

                return redirect()->Route('testmemList');
            }else{
                return false;
            }

    }

        /*public function searchTest(){
            //$orders = App\Models\Testmem::search($tt)->get();
            //$orders=Testmem::search('')->get();
                $orders=Testmem::count();
                 return $orders;
        }*/













}
