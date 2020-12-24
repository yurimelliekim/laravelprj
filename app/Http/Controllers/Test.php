<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class Test extends Controller
{
    public function index()
    {
        $view = view('dd');
        $dd = customer::get();

//        $dd = '1111';
//        debug($dd);
//        dump('2222');
//        dd('dd');

        $view->dd = $dd;
        return $view;
    }

    public function test(){

        $customers = DB::table('customers')->get();
        return view();

//        $users = DB::table('users')->get();
//
//        return view('user.index', ['users' => $users]);
    }

    public function customer(){
        $view = view('test');
        $customers = customer::get();
        dd($customers);

        $view->customers = $customers;
        return $view;
    }

}
