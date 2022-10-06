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




          <div style="position:relative; top:70px; left:70px; justify-content:space-between" class="d-flex">






                  <div style="position:relative; margin-right:75px">
                            <form action="{{url('/uploadchef')}}" class="form" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <h1>ADD CHEF</h1> <br><br>
                              <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" style="color:white" placeholder="Write name of Chef" required>
                              </div>
                              <div class="form-group">
                                <label for="specialty">Specialty</label>
                                <input type="text" name="specialty" class="form-control" style="color:white" placeholder="What's the Chef Specialty?" required>
                              </div>
                              <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" required>
                              </div>
                              <div class="form-group">
                                <input type="submit" style="background-color:green" class="btn btn-success" value="Save" required>
                              </div>
                            </form> 
                    </div>




                    <div style="margin-left:0px; position:relative; right:60px">
                            

                            <div>
                                  <h1>CHEF DATA</h1> <br><br>

                                  <table class="table table-bordered table-hover" bgcolor="black">

                                      <tr style="color:white; background-color:black">
                                          <th style="text-align:center">Chef Name</th>
                                          <th style="text-align:center">Specialty</th>
                                          <th style="text-align:center">Image</th>
                                          <th colspan="2" style="text-align:center">Action</th>
                                      </tr>


                                       
                                        @foreach($data as $data)

                                        <tr style="color:white"> 
                                    
                                          <td>{{$data->name}}</td>
                                          <td>{{$data->specialty}}</td>
                                          <td><img src="/chefimage/{{$data->image}}" style="height:150px; width:150px" alt=""></td>
                                          <td><a href="{{url('/editchef', $data->id)}}">Edit</a></td>
                                          <td><a href="{{url('/deletechef', $data->id)}}">Delete</a></td>
                                         
                                        </tr>

                                         @endforeach

                                     

                                  </table>
                                  <br><br><br><br><br>
        
                            </div>


                    </div>





                   




         
          </div>
          <br><br><br>


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