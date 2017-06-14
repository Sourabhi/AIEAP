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
               <th>ID</th>
               <th>Timeslot</th>
               <th>Start Time (24 H)</th>
               <th>End Time (24 H)</th>
               <th>Created_at<br>(Y-M-D)(h:m:s)</th>
               <th>Updated_at<br>(Y-M-D)(h:m:s)</th>
             </tr>
           </thead>

           <tbody>
             @foreach ($timeslots as $timeslot)
               <tr class="active">
                 <td><a class ="btn btn-info" href="{{url('timeslot/'. $timeslot->id)}}">{{ $timeslot->id}}</a></td>
                 <td>{{ $timeslot->timeslot}}</td>
                 <td>{{ $timeslot->starttime}}</td>
                 <td>{{ $timeslot->endtime}}</td>
                 <td>{{ $timeslot->created_at}} </td>
                 <td>{{ $timeslot->updated_at}} </td>
               </tr>
             @endforeach
           </tbody>
         </table>
       </div>
       <a href="{{url('create/timeslot/')}}">Create Timeslot</a>
     </div> 
   </div> 
 </div>
</div>
@endsection