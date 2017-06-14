@extends('aieap.master')
@section ('title','Timeslot')
@section('content')
<br><br><br>
<div class="container">
 <div class=" col-xs-12">
   <div class="panel panel-default"> 
     <div class="panel-heading">  <h4> <strong> This is a AIEAP active Time slot page! </strong></h4>
     </div>
     <div class="panel-body"><h5> Information of AIEAP Timeslot </h5>
       <div class="table-responsive"> 
         <table class="table table-bordered">
           <thead>
             <tr class="info">
               
               <th>Timeslot</th>
               
             </tr>
           </thead>

           <tbody>
             @foreach ($timeslots as $timeslot)
               <tr class="active">
                 
                 <td>{{ $timeslot->timeslot}}</td>
                 
               </tr>
             @endforeach
           </tbody>
         </table>
       </div>
       <a href="{{url('create/timeslot/')}}">Create</a>
     </div> 
   </div> 
 </div>
</div>
@endsection