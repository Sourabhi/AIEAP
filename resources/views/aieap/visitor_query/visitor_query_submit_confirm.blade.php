@extends('aieap.master')
@section ('title','Query Confirmation')
@section ('content')
<div class="container"> 
   <ol class="breadcrumb">
     <li class="active">Home</li>
   </ol>
   <div class="jumbotron row">
     <div class="col-xs-4 col-sm-2 col-md-2"> 
       <div class="item"> <img  src="{{URL::asset('/image/main_logo3.png')}}" class="img-responsive left-block" alt="AIEAP logo" > 
       </div>
     </div>
     
     <div class="col-xs-8 col-sm-10 col-md-10 text-center">
       <p><strong> {{$message}}</strong></p>
       <P class = h5 > <strong>AIEAP will contact you regarding your enquiry within 5 working days.</strong> </p>
     </div>
   </div> 
 </div>     
 <br><br><br>
 @endsection