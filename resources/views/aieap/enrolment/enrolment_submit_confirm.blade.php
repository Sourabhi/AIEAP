@extends('aieap.master')
@section ('title','Enrolment Form Submittion Confirmation')
@section ('content')

 <div class="container"> 
   <ol class="breadcrumb">
     <li class="active">Home</li>
   </ol>
   <div class="jumbotron">
     <div class="row">
       <div class="col-xs-4 col-sm-2 col-md-2"> 
         <div class="item"> <img  src="{{URL::asset('/image/main_logo3.png')}}" class="img-responsive left-block" alt="AIEAP logo" > 
         </div>
       </div>
       <div class="col-xs-8 col-sm-10 col-md-10">
         <div class=" text-center">
           <p><strong> {{$message}}</strong></p>
           <P class =h5 ><strong> You have sumbitted 'Online Enrolment Form' successfully. <br> <br>
            AIEAP will contact you regarding your enrolment within 10 working days.</strong> </p>
         </div>
       </div>
     </div>
   </div>               
 </div>
 <br><br><br>
 @endsection