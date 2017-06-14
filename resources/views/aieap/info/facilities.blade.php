@extends('aieap.master')
@section ('title','Facilities')
@section ('content')
	
<div class="container"> 
   <ol class="breadcrumb">
     <li><a href="index">Home</a></li>
     <li>About</li>
     <li class="active">Facilities</li>
   </ol>
   <div class=" text-center"> 
     <div class="jumbotron">
       <p class="h4"><strong>Facilities</strong></p>
     </div>
   </div>
        
   <div class="row">
     <div class="col-sm-6">
       <p >In AIEAP there are ten classrooms. All Rooms are equipped with </p> 

       <ul > 
         <li> A whiteboard.</li>
         <li>  Audio facilities.</li>
         <li>  Comfortable chairs and spacious study tables.</li>
         <li> All rooms have a projector installed for presentations and videos.</li>
       </ul>
     </div>
     <div class="col-sm-6 col-md-offset-1 col-md-5 col-lg-offset-2 col-md-4">
       <img class="thumbnail" src="{{URL::asset('/image/classroom.ping.jpg')}}" alt="classroom">
     </div>
   </div>
   <br><br>
   <div class="row">
     <div class="col-sm-6">
       <p >In AIEAP there is high-speed wireless internet access throughout the institute.
           There is a lounge and kitchen for students in AIEAP.  We provide:</p>
       <ul>
         <li>  Tea and coffee.</li>
         <li> A microwave, kettle and fridge.</li>
         <li> TV and videos. </li>
         <li> Comfortable chairs.</li> 
       </ul>
     </div>
     <div class="col-sm-6 col-md-offset-1 col-md-5 col-lg-offset-2 col-md-4">
       <img class="thumbnail" src="{{URL::asset('/image/kitchen-300.ping.jpg')}}" alt="kitchen">
     </div>
   </div>
 </div>
 <br><br><br>
 @endsection 
	
	