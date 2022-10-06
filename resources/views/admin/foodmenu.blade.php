<x-app-layout>
    
</x-app-layout>



<!DOCTYPE html>
<html lang="en">
  <head>
         @include("admin.admincss")

         <style>
             tr:nth-child(even) {background-color: tomato;}
             tr:nth-child(odd) {background-color: green;}
             tr a:link{text-decoration:none; color:red; background-color:black; padding:10px}
             tr a:hover{background-color:red; color:white;}
         </style>
  </head>
  <body>

          <div class="container-scroller">

          

          @include("admin.navbar")
          


    <!-- <div style="position:relative; top:70px; left:70px; justify-content:space-between" class="d-flex"> -->

            <div style="margin-top:50px">
                    <form action="{{url('/uploadfood')}}" class="form" method="post" enctype="multipart/form-data">
                            @csrf
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" style="color:white" placeholder="Write a title" required>
                      </div>
                      <div class="form-group">
                        <label for="price">Price</label>
                        <input type="num" name="price" class="form-control" style="color:white" placeholder="Price" required>
                      </div>
                      <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" style="width:100px" name="image" required>
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" style="color:white" class="form-control" placeholder="Write a description" required>
                      </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn-success" value="save">
                      </div>
                    </form> 
            </div> 

           
       



    <!-- </div> -->



          </div>


<div class="container-scroller">
<div style="margin-top:margin-left:500px; position:relative;">
                    <div style="position:relative; left:20%;">
                      <table style="padding:100%" class="table" bgcolor="black">
                        <tr style="color:white; background-color:black">
                          <th style="text-align:center">Food Name</th>
                          <th style="text-align:center">Price</th>
                          <th style="text-align:center">Description</th>
                          <th style="text-align:center">Image</th>
                          <th colspan="2" style="text-align:center">Action</th>
                        </tr>


                        @foreach($data as $data)

                        <tr style="color:white">
                          <td>{{$data->title}}</td>
                          <td>{{$data->price}}</td>
                          <td>{{$data->description}}</td>
                          <td style=""><img style="width:150px; height:150px" src="/foodimage/{{$data->image}}" alt=""></td>
                          <td><a href="{{url('/editfood', $data->id)}}">Edit</a></td>
                          <td><a href="{{url('/deletefood', $data->id)}}">Delete</a></td>
                        </tr>

                       

                        @endforeach

                      </table>
                      <br><br><br> <br><br><br> <br><br><br>
                    </div>
            </div>
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