<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\main;
use App\Models\booking;
use App\Models\gallery;
use App\Models\news;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function rooms(){
        return view('admin.create_rooms');
    }

    public function add_room(Request $request){
        $data = new Room;

        $data->room_title = $request->title;

        $data->description = $request->description;

        $data->room_type = $request->type;

        $data->price = $request->price;

        $image = $request->image;

        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('room',$imagename);

            $data->image=$imagename;
        }

        $data->save();

        return redirect()->back();
    }
    public function view_room() {
        $data =Room::all();
        return view('admin.viewroom',compact('data'));
    }
    public function delete_room($id){
        $data= Room::find($id);

        $data->delete();
         
        return redirect()->back();
    }
    public function update_room($id){
      
        $data= Room::find($id);
        return view('admin.updateroom',compact('data'));
    }
    public function edit_room(Request $request,$id){
        $data=Room::find($id);

        $data->room_title=$request->title;
        $data->description=$request->description;
        $data->room_type=$request->type;
        $data->price=$request->price;

        $image=$request->image;

        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room',$imagename);
            $data->image=$imagename;
        }

        $data->save();
        return redirect(route('admin.viewroom'));

    }
    
    public function edit_main(){
        return view('admin.mainpage');
    }
    public function add_main(Request $request){
        $data = new main;

        $data->title = $request->title;
        $image = $request->image;

        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->mainimage->move('mainpage',$imagename);

            $data->mainimage=$imagename;
        }

        $data->save();

        return redirect()->back();

    }
    public function view_main() {
        $data =main::all();
        return view('admin.viewmain',compact('data'));
    }
    public function update_main($id){

        $page= main::find($id);
        return view('admin.updatemain',compact('page'));

    }
    public function edit_images(Request $request,$id){
        $page=main::find($id);
        $page->title=$request->title;
        $image=$request->image;

        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('mainpage',$imagename);
            $page->mainimage=$imagename;
        }

        $page->save();
        return redirect(route('admin.viewmain'));
    }
    public function booking(){
        $data=booking::all();
        return view('admin.booking',compact('data'));
        
    }
    public function deletebooking($id){
        $data=booking::find($id);
        $data->delete();
        return redirect()->back();

    }
    public function approvebooking($id){
        $data=booking::find($id);
        $data->status='Approve';
        $data->save();
        return redirect()->back();
    }
    public function rejectbooking($id){
        $data=booking::find($id);
        $data->status='Rejected';
        $data->save();
        return redirect()->back();
    }
    public function view_gallery(){
        $gallery=gallery::all();

        return view('admin.gallery',compact('gallery'));
    }

    public function uploadgallery(Request $request){
        $data= new gallery;
        $image= $request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('gallery',$imagename);
            $data->image=$imagename;
            $data->save();
        }
        return redirect()->back();
    }

    public function deleteimage($id){
        $data=gallery::find($id);
        $data->delete();

        return redirect()->back();
    }
    public function view_newsletter(){
        $data= news::all();
        return view ('admin.newsletter',compact('data'));

    }

    public function manage_user(){
           $data=User::where('role','=','customer')->get();

           return view('admin.manageuser',compact('data'));
    }

}
