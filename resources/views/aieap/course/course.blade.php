@extends('aieap.master')
@section ('title','Timeslot')
@section ('content')
<br><br><br>
<div class="container">
 <div class=" col-xs-12">
   <div class="panel panel-default"> 
     <div class="panel-heading"><h4><strong> This is a AIEAP active Course slot page! </strong></h4>
     </div>
     <div class="panel-body">
       <h5> Information of AIEAP Course </h5>
         <div class="table-responsive"> 
           <table class="table table-bordered">
             <thead>
               <tr class="info">
                 <th>ID</th>
                 <th>Course</th>
                 <th>Start Date</th>
                 <th>Completion Date</th>
                 <th>Created_at<br>(Y-M-D)(h:m:s)</th>
                 <th>Updated_at<br>(Y-M-D)(h:m:s)</th>
               </tr>
             </thead>

             <tbody>
            	 @foreach ($timeslots as $timeslot)
                 <tr class="active">
                   <td><a href="{{url('timeslot/'. $timeslot->id)}}">{{ $timeslot->id}}</a></td>
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
          <a class ="btn btn-info" href="{{url('create/timeslot/')}}">Create</a>
     </div> 
   </div> 
 </div>
</div>
@endsection