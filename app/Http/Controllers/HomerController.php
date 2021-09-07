<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Cart;
use App\Models\order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

//use MongoDB\Driver\Session;


class HomerController extends Controller
{
    public function index(){
        if (Auth::id()){
            return redirect('redirects');
        }
        else{
        $data=Food::all();
        $chefs=Chef::all();
        return view('home',compact('data','chefs'));
        }
    }
    public function redirects(){
        $data=Food::all();
        $chefs=Chef::all();
        $usetype=Auth::user()->userType;
        if($usetype==1){
            return view('admin/adminhome');
        }
        else{
            $user_id=Auth::id();
            $count=Cart::where('user_id',$user_id)->count();

            return view('home',compact('data','chefs','count'));
        }
    }
    public function addCart(Request $request ,$id){
        if (Auth::id()){
            $user_id=Auth::id();
            $food_id=$id;
           $quantity=$request->quantity;
           $cart=new Cart;
           $cart->user_id=$user_id;
           $cart->food_id=$food_id;
           $cart->quantity=$quantity;
           $cart->save();


            return redirect()->back();
        }
        else{
            return redirect('/login');
        }
    }
    public function showCart(Request $request,$id){
        $count=Cart::where('user_id',$id)->count();
        if (Auth::id()==$id){


        $data2=Cart::select('*')->where('user_id','=',$id)->get();
        $data=Cart::where('user_id',$id)->join('food','carts.food_id','=','food.id')->get();
//        echo '<pre>';
//        print_r($data);
//        die();

        return view('showCart',compact('count','data',"data2"));
        }
        else{
            return redirect()->back();
        }
    }
    public function remove(Request $request,$id){
        $model=Cart::find($id);
        $model->delete();
        return redirect()->back();
    }
    public function confirmOrder(Request $request,$id){

        foreach ($request->foodName as $key=>$foodName){
            $data=new order;
            $data->foodName=$foodName;
            $data->price=$request->price[$key];
            $data->quantity=$request->quantity[$key];
            $data->name=$request->name;
            $data->phone=$request->phone;
            $data->address=$request->address;
            $data->save();
        }
//        echo "<pre>";
//        print_r($id);
//        die();
        Session::flash('message','Order Confirm successfully');
        DB::table('carts')->where(['user_id'=>$id])->delete();
        return redirect()->back();
    }
    //
}
