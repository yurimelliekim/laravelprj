<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){

        $view = view('customer');
        $customers = customer::get();

//        $customers->id = $customers['id'];
//        $customers->name = $customers['name'];
//        $customers->phone = $customers['phone'];
//        $customers->reg = $customers['reg'];

        $view->customers = $customers;


        return $view;





    }

    public function add(Request $request){


        if( isset($_POST['check']) ){
            //확인용
            //$name = $request->input('name');
            //dd($name);

            //객체생성
            $customer = new Customer;
            $customer->name= $request->input('name');
            $customer->phone= $request->input('phone');

           dump($customer->name, $customer->phone);






        }
        $view = view('customer_add');

        return $view;
    }




}
