<x-app-layout>
    
</x-app-layout>



<!DOCTYPE html>
<html lang="en">
  <head>
         @include("admin.admincss")
  </head>
  <body>

          <div class="container-scroller">

         

          @include("admin.navbar")

<div><h1 style="margin-top:50px; text-align:center">Customer Orders</h1></div. <br>


<div>
<form action="{{url('/search')}}" method="get">
  @csrf
  <input class="form-control" type="text" name="search" style="color:white; padding-left:50px; padding-right:50px" placeholder="Search Customer's name or food name"> <br>
  <input type="submit" value="submit" class="btn btn-success">
</form>
</div> <br><br>

      

           <table class="table table-hover">

               <tr>
                   <th>Name</th>
                   <th>Phone</th>
                   <th>Address</th>
                   <th>Food name</th>
                   <th>Price</th>
                   <th>Quantity</th>
                   <th>Total Price</th>
               </tr align="center">

               @foreach($data as $data)
               <tr>
                   <td> {{$data->name}} </td>
                   <td> {{$data->phone}} </td>
                   <td> {{$data->address}} </td>
                   <td> {{$data->foodname}} </td>
                   <td> ₦{{$data->price}} </td>
                   <td> {{$data->quantity}} </td>
                   <td> ₦{{$data->price * $data->quantity}}</td>
               </tr>
               
               @endforeach

           </table>

        
          </div>


    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Enjoy</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0"></a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include("admin.adminscript")
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
   
  </body>
</html>