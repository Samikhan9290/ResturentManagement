<?php

namespace App\Http\Controllers;


use App\Models\Chef;
use App\Models\order;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Flash;
use App\Models\User;
use App\Models\Food;

class AdminControoler extends Controller
{
//    User Function
    public function users(){
        $data=User::all();
        return view('admin.user',compact('data'));
    }
    public function deleteUSer($id){
        $data=User::find($id);
        $data->delete();
        Session::flash('message','UserDelete successfully');
        return redirect()->back();
    }

//    Food Function
    public function food(){
        $data=Food::all();
        return view('admin.food',compact('data'));
    }
    public function uploadFood(Request $request){
        $data=new Food;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodImage',$imagename);
        $data->image=$imagename;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();
        Session::flash('message',"New menu Add successfully ");
        return redirect()->back();

    }
    public function foodDelete($id){
        $data=Food::find($id);
        $data->delete();
        Session::flash('message',"Menu delete successfully");
        return redirect()->back();
    }
    public function EditFood(Request $request ,$id){
        $data=Food::find($id);
        return view('admin/edit',compact('data'));
    }
    public  function UpdateMenu(Request $request ,$id){
        $data=Food::find($id);
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodImage',$imagename);
        $data->image=$imagename;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();
        Session::flash('message',"menu Updated successfully ");
        return redirect()->back();

    }
//    Chefs Function
    public function chefs(){
        $data=Chef::all();
        return view('admin/chefs.chefs',compact('data'));
    }
    public function uploadChef(Request $request){
        $data=new Chef;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefsImage',$imagename);
        $data->image=$imagename;
        $data->name=$request->name;
        $data->expert=$request->expert;
        $data->save();
        Session::flash('message',"chef Add successfully ");
        return redirect()->back();
    }
    public function chefsDelete(Request $request ,$id){
        $data=Chef::find($id);
        $data->delete();
        Session::flash('message','chef delete successfully');
        return redirect()->back();
    }
    public function EditChef(Request $request ,$id){
        $data=Chef::find($id);
       return view('admin/chefs.edit',compact('data'));

    }
    public function updateChef(Request $request ,$id){
        $data=Chef::find($id);
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefsImage',$imagename);
        $data->image=$imagename;
        $data->name=$request->name;
        $data->expert=$request->expert;
        $data->save();
        Session::flash('message',"chef update successfully ");
        return redirect()->back();

    }
    public function reservation(Request $request){
        $data=new Reservation;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->number=$request->number;
        $data->date=$request->date;
        $data->time=$request->time;
        $data->message=$request->message;
        $data->save();
//        Session::flash('message',"chef Add successfully ");
        return redirect()->back();

    }
    public function viewReservation(){
        if (Auth::id())
        {


        $data=Reservation::all();
        return view('admin.viewReservation',compact('data'));
        }
        else{
            return redirect('login');
        }
    }
    public function deleteReservation($id){
        $data=Reservation::find($id);
        $data->delete();
        Session::flash("message","reservation delete successfully");
        return redirect()->back();
    }
    public function order(){
        $data=order::all();
        return view('admin.order',compact('data'));
    }
    public function search(Request $request){
        $search=$request->search;
        $data=order::where('name','like','%'.$search.'%')
            ->orwhere('foodName','like','%'.$search.'%')
            ->orwhere('Address','like','%'.$search.'%')
            ->get();
        return view('admin.order',compact('data'));
    }
}
