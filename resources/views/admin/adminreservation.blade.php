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


          

            <div style="position:relative; top:70px; left:70px;">

            <table class="table table-bordered table-hover" bgcolor="black">
                
                <tr>

                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Message</th>

                </tr>


                @foreach($data as $data)


                <tr>
                  <td> {{$data -> name}} </td>
                  <td> {{$data -> email}} </td>
                  <td> {{$data -> phone}} </td>
                  <td> {{$data -> date}} </td>
                  <td> {{$data -> time}} </td>
                  <td> {{$data -> message}} </td>
                </tr>

                @endforeach

              </table>

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