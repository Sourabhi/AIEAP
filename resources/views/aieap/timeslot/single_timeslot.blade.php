@extends('aieap.master')
@section ('title','Single Timeslot')
@section('content')
<br><br><br>
<div class="container">
 <div class=" col-xs-12">
   <div class="panel panel-default"> 
     <div class="panel-heading">  <h4> <strong> This is a Single Timeslot Page! </strong></h4>
     </div>
     <div class="panel-body">
       <!--  <div class="table-responsive"> did not work for Edge-->
           <div style="overflow-x:auto"> <!-- serves same purpose as table-responsive and works on Edge-->
         <table class="table table-bordered">
           <thead>
             <tr class="info">
               <th>ID</th>
               <th>Title</th>
               <th>Start Time (24 H)</th>
               <th>End Time (24 H)</th>
               <th>Created_at<br>(Y-M-D)(h:m:s)</th>
               <th>Updated_at<br>(Y-M-D)(h:m:s)</th>      
             </tr>
           </thead>
           <tbody>
             <tr class="active">
               <td>{{ $timeslot->id}}</td>
               <td>{{ $timeslot->timeslot}}</td>
               <td>{{ $timeslot->starttime}}</td>
               <td>{{ $timeslot->endtime}}</td>
               <td>{{ $timeslot->created_at}} </td>
               <td>{{ $timeslot->updated_at}} </td>
             </tr>
           </tbody>
         </table>
       </div>
        <div class="row">
         <div class= "col-xs-12 col-sm-4 col-md-4 col-lg-3">
           <a href="{{url('edit/timeslot/'.$timeslot->id)}}"><em class ="fa fa-gear"></em> Update Timeslot</a> 
         </div>
         <div class="col-xs-12 col-sm-2 col-md-4 col-lg-3">
           <a href="{{URL::previous()}}"><em class="fa fa-arrow-left" aria-hidden="true"></em> Back </a>
         </div>
       </div>
     </div> 
   </div> 
 </div>
</div>
@endsection