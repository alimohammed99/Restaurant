<x-app-layout>
    
</x-app-layout>



<!DOCTYPE html>
<html lang="en">
  <head>
         @include("admin.admincss")



         <style>
           
            /* tr:nth-child(odd) {background-color: green;}
             tr:nth-child(even) {background-color: tomato;}*/

             tr a:link{text-decoration:none; color:red; background-color:black; padding:10px}
             tr a:hover{background-color:red; color:white;}
         </style>
        
  </head>
  <body>

  <div class="container-scroller">



        

          @include("admin.navbar")

         <div style="position:relative; top:80%">






           <table class="table table-bordered" style="position:relative; top:8%; left:50%">
             <tr style="color:white; background-color:black">
               <th>NAME</th>
               <th>EMAIL</th>
               <th>ACTION</th>
             </tr>



          @foreach($data as $data)
            <tr style="color:white;">
               <td>{{$data->name}}</td>
               <td>{{$data->email}}</td>


            @if($data->usertype == "0")
               <td><a href="{{url('/deleteuser', $data->id)}}">Delete</a></td>
            @else
               <td>Can't delete</td>

            @endif

            </tr>
          @endforeach


            
              
           </table>
         </div>

         

          </div>
   
    
      @include("admin.adminscript")
       
     
   
  </body>
</html>