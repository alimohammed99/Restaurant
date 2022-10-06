<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Food;

use App\Models\Reservation;

use App\Models\Foodchef;

use App\Models\Order;

class AdminController extends Controller
{
    public function user(){
        $data = user::all();
        return view("admin.users", compact("data"));
    }


    public function deleteuser($id){
        $data = user::find($id);
        $data->delete();
        return redirect()->back();
    }


    public function deletefood($id){
        $data = food::find($id);
        $data->delete();
        return redirect()->back();
    }


    public function foodmenu(){
       $data = food::all();
        return view("admin.foodmenu", compact("data"));
    }


    public function editfood($id){
        $data = food::find($id);
        return view("admin.editfood", compact("data"));
    }


    public function updatefood(Request $request, $id){
        $data = food::find($id);

        $image = $request->image;

        $imagename = time(). '.' .$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);
        // 'foodimage' is a new folder you have to create. All our food pics will be stored there
        $data->image = $imagename;
        // The image up here is our db table name actually. I mean in the food table in our db, we surely have a col named image i.e where our food images will be stored, that col is the image we have up here. So, make sure the spellings tally.

        $data->title = $request->title;
        // The first title here is the title column in our db under the food table. The second title is the name of the form input we wanna use to send in our data. So check the spellings well.
        $data->price = $request->price;
        // The first price here is the title column in our db under the food table. The second price is the name of the form input we wanna use to send in our data. So check the spellings well.
        $data->description = $request->description;
        // The first description here is the title column in our db under the food table. The second description is the name of the form input we wanna use to send in our data. So check the spellings well.

        $data->save();

        return redirect()->back();
        // To go back to the same page again after saving our data.
        
    }


    public function uploadfood(Request $request){
        $data = new food;

        $image = $request->image;

        $imagename = time(). '.' .$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);
        // 'foodimage' is a new folder you have to create. All our food pics will be stored there
        $data->image = $imagename;
        // The image up here is our db table name actually. I mean in the food table in our db, we surely have a col named image i.e where our food images will be stored, that col is the image we have up here. So, make sure the spellings tally.

        $data->title = $request->title;
        // The first title here is the title column in our db under the food table. The second title is the name of the form input we wanna use to send in our data. So check the spellings well.
        $data->price = $request->price;
        // The first price here is the title column in our db under the food table. The second price is the name of the form input we wanna use to send in our data. So check the spellings well.
        $data->description = $request->description;
        // The first description here is the title column in our db under the food table. The second description is the name of the form input we wanna use to send in our data. So check the spellings well.

        $data->save();

        return redirect()->back();
        // To go back to the same page again after saving our data.
    }



    public function reservation(Request $request){

        $data = new reservation;

        

        $data->name = $request->name;
      
        $data->email = $request->email;
      
        $data->phone = $request->phone;

        $data->guest = $request->guest;
      
        $data->date = $request->date;
      
        $data->time = $request->time;

        $data->message = $request->message;

        $data->save();

       

        return redirect()->back();
        // To go back to the same page again after saving our data.
    }




    public function viewreservation(){

        if(Auth::id()){

         
        $data = reservation::all();

        return view("admin.adminreservation", compact("data"));
    }

    else
    {
        return redirect('login');
    }
}


    public function viewchefs(){
         
        $data = foodchef::all();

        return view("admin.adminchefs", compact("data"));
    }


    public function uploadchef(Request $request){

        $data = new foodchef;

        $image = $request->image;

        $imagename = time(). '.' .$image->getClientOriginalExtension();
        $request->image->move('chefimage', $imagename);
        // 'chefimage' is a new folder you have to create. All our chef pics will be stored there
        $data->image = $imagename;

        $data->name = $request->name;
        $data->specialty = $request->specialty;

        $data->save();
        return redirect()->back();

    }


    public function deletechef($id){
        $data = foodchef::find($id);
        $data->delete();
        return redirect()->back();
    }



    public function editchef($id){
        $data = foodchef::find($id);
        return view("admin.editfoodchefs", compact("data"));
    }


    public function updatechef(Request $request, $id){
        $data = foodchef::find($id);

        $image = $request->image;

        if($image){

            $imagename = time(). '.' .$image->getClientOriginalExtension();
        $request->image->move('chefimage', $imagename);
     
        $data->image = $imagename;

        }

        
  

        $data->name = $request->name;
 
        $data->specialty = $request->specialty;
  


        $data->save();

        return redirect()->back();
        // To go back to the same page again after saving our data.
        
    }



    public function orders(){
        $data = order::all();
        return view("admin.orders", compact('data'));
    }



    public function search(Request $request){
        $search = $request->search;

        $data = order::where('name', 'Like', '%' . $search . '%')->orWhere('foodname', 'Like', '%' . $search . '%')->get();

        return view('admin.orders', compact('data'));
    }






}

