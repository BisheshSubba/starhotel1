<?php

namespace App\Http\Controllers;
use App\Models\main;
use App\Models\Room;
use App\Models\booking;
use App\Models\news;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){
        return view('Login');
    }
    public function authenticate(Request $request){
        $validator= Validator::make($request->all(),[
            'email'=> 'required|email',
            'password'=> 'required',
        ]);
        if($validator->passes()){
                if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                    if(Auth::user()->role!="customer"){
                        Auth::logout();
                        return redirect()->route('admin.login')->with('error','This is not admin page.');
                    }
                    return redirect()->route('account.dashboard');
                }
                else{
                    return redirect()->route('account.login')->with('error','Either email or password is incorrect.');
                }
        }
        else{
            return redirect()->route('account.login')
            ->withInput()
            ->withErrors($validator);
        }
    }
    public function register(){

        return view('register');
    }

    public function processRegister(Request $request){
        
        $validator= Validator::make($request->all(),[
            'email'=> 'required|email|unique:users',
            'password'=> 'required|confirmed|min:5',
            'password_confirmation'=> 'required|min:5',
            'name'=>'required',
        ]);
        if($validator->passes()){
              $user = new User();
              $user->name=$request->name;
              $user->email=$request->email;
              $user->phone=$request->phone;
              $user->password= Hash::make($request->password);
              $user->role = 'customer';
              $user->save();

              return redirect()->route('account.login')->with('sucess','You have registered sucessfully');

        }
        else{
            return redirect()->route('account.register')
            ->withInput()
            ->withErrors($validator);
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('account.home');
    }
    public function home(){
        $data =main::all();
        return view('home',compact('data'));
    }
    public function view_room(){
        $data =Room::all();
        return view('rooms',compact('data'));
    }
    public function room_details($id){
        $room=Room::find($id);
        return view('room_details',compact('room'));
    }
    public function add_booking(Request $request,$id){
        $request->validate([
            'startdate'=>'required|date',
            'enddate'=>'date|after:startdate',
        ]);
        $data= new booking;
        $data->room_id=$id;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;

        $startdate=$request->startdate;
        $enddate=$request->enddate;

        $isBooked = booking::where('room_id',$id)
        ->where('start_date','<=',$enddate)
        ->where('end_date','>=',$startdate)->exists();

        if($isBooked){
            return redirect()->back()->with('message','Room is already booked');
        }
        else{
            
        $data->start_date=$request->startdate;
        $data->end_date=$request->enddate;

        $data->save();
        return redirect()->back()->with('message','Room Booked Sucessfully');
        }

    }

    public function add_newsletter(Request $request){
        $data=new news();
        $data->email=$request->email;

        $data->save();
        return redirect()->back()->with('message','You are now subcribed');
    }
}
