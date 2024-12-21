@if($errors->any())
   <div class="row ">
       <div class="col-12 bg-white">
           <ul>
               @foreach ($errors->all() as $error)
                   <li class="text-danger">{{ $error }}</li>
               @endforeach
           </ul>
       </div>
   </div>
@endif
