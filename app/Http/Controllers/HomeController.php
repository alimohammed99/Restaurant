<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Food;

use App\Models\Foodchef;

use App\Models\Cart;

use App\Models\Order;


class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            return redirect('redirects');
        }else
        $data = food::all();
        $data2 = foodchef::all();
        return view("home", compact("data", "data2"));
    }




    public function redirects(){

        $data = food::all();
        $data2 = foodchef::all();

        $usertype = Auth::user()->usertype;

        if ($usertype == '1'){
            return view("admin.adminhome");
        }else{

            $user_id = Auth::id();
                         //GETTING THE USER ID, WHICH USER IS CURRENTLY LOGGED IN
                          //GETTING THE USER ID, WHICH USER IS CURRENTLY LOGGED IN
                           //GETTING THE USER ID, WHICH USER IS CURRENTLY LOGGED IN

            $count = cart::where('user_id', $user_id)->count();

                          //HOW MANY TIMES THE SAME USER APPEARS IN THE CART. THAT IS, THIS USER HAS ADDED ITEM(S) TO THE CART HOW MANY TIMES. IT WILL NOW COUNT THE NUMBER OF TIMES THE USER HAS ADDED ITEM(S) TO THE CART AND STORE IT IN THE VARIABLE $count. 

      
            return view('home', compact("data", "data2", "count"));
        }
    }



    public function addcart(Request $request, $id)

    {
        

       if(Auth::id())
       
       {
           $user_id = Auth::id();

           $food_id = $id;

           $quantity = $request->quantity;

           $cart = new Cart; 

           $cart->user_id = $user_id;
           
           $cart->food_id = $food_id;

           $cart->quantity = $quantity;

           $cart->save();
           
           return redirect()->back();
       }
       else
       {
           return redirect('/login');
       }



    }


    public function showcart(Request $request, $id){

        $count = cart::where('user_id', $id)->count();

        if(Auth::id() == $id){


        $data = cart::where('user_id', $id)->join('food', 'carts.food_id', '=', 'food.id')->get();
        $data2 = cart::select('*')->where('user_id', '=', $id)->get();
        return view("showcart", compact('count', 'data', 'data2'));

        }else{
            return redirect()->back();
        }
    }



    public function remove($id){
        
        $data = cart::find($id);

        $data->delete();

        return redirect()->back();
    }                                                                  


    public function confirmorder(Request $request)
    {
        foreach($request->foodname as $key => $foodname)
        { 
            $data = new order;
            $data->foodname = $foodname;
            // WE DID NOT ADD "$request" OR "$key" COZ WE ALREADY DID, IN THE foreach() LOOP
            $data->price = $request->price[$key];
            $data->quantity = $request->quantity[$key];
            // I THINK WHAT THIS SECTION IS TALKING ABOUT IS, FOR EVERY/EACH FOOD, IT SHOULD BRING US THE PRICE AND ALSO THE QUANTITY FROM THE DATABASE. MAYBE THAT IS WHY WE USED $key.

            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->address = $request->address;
            // I THINK WE ADDED THESE COZ IF WE WANT TO ORDER FOOD, WE ARE GOING TO SURELY PROVIDE OUR NAME, ADDRESS AND PHONE NUMBER.

            $data->save();
        }
        return Redirect()->back();
    }
    // WE NEED TO DO ONE MORE THING. SINCE WE WANNA ENTER OUR DETAILS BEFORE WE CAN ORDER FOOD, THAT IS A FORM OF REGISTERING USERS OR FORM/INPUT COLLECTION FROM THE USER INTO THE DB, SO WE HAVE TO GO TO OUR ORDER MODEL TO PROTECT OUR INPUTS. JUST LIKE WE DID WHEN WE WERE DOING USER LOGIN AND REGISTRATION.
}
