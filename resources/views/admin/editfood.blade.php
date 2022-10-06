<x-app-layout>
    
</x-app-layout>



<!DOCTYPE html>
<html lang="en">
  <head>

  <base href="/public">
         @include("admin.admincss")
  </head>
  <body>

          <div class="container-scroller">

         

          @include("admin.navbar")





          <div style="position:relative; top:70px; left:70px; justify-content:space-between" class="d-flex">
                    <form action="{{url('/updatefood', $data->id)}}" class="form" method="post" enctype="multipart/form-data">
                            @csrf
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input value="{{$data->title}}" type="text" name="title" class="form-control" style="color:white" placeholder="Write a title" required>
                      </div>
                      <div class="form-group">
                        <label for="price">Price</label>
                        <input value="{{$data->price}}" type="num" name="price" class="form-control" style="color:white" placeholder="Price" required>
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <input value="{{$data->description}}" type="text" name="description" style="color:white" class="form-control" placeholder="Write a description" required>
                      </div>
                      <div class="form-group">
                        <label for="Old Image">Old Image</label>
                        <img height="200" width="200" src="/foodimage/{{$data->image}}" alt="">
                      </div>
                      <div class="form-group">
                        <label for="image">New Image</label>
                        <input type="file" class="form-control" name="image" required>
                      </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Update">
                      </div>
                    </form> 
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