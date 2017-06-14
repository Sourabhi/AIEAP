@extends('aieap.master')
@section ('title','Day')
@section ('content')

 <br><br><br>
 <div class="container">
	 <div class=" col-xs-12">
     <div class="panel panel-default"> 
       <div class="panel-heading">  <h4> <strong> This is a AIEAP active Day slot page! </strong></h4>
       </div>
       <div class="panel-body"><h5> Information of AIEAP Class Day </h5>
         <div class="table-responsive"> 
           <table class="table table-bordered">
             <thead>
               <tr class="info">
                 <th>ID</th>
                 <th>Day</th>
                 <th>Completion Date</th>
                 <th>Created_at<br>(Y-M-D)(h:m:s)</th>
                 <th>Updated_at<br>(Y-M-D)(h:m:s)</th>
               </tr>
             </thead>

             <tbody>
            	 @foreach ($days as $day)
                 <tr class="active">
                   <td><a href="{{url('day/'. $day->id)}}">{{ $day->id}}</a></td>
                   <td>{{ $day->day}}</td>
                   <td>{{ $day->created_at}}</td>
                   <td>{{ $day->updated_at}}</td>
                 </tr>
                @endforeach
             </tbody>
           </table>
         </div>
         <a href="{{url('create/day/')}}">Create</a>
       </div> 
     </div> 
   </div>
 </div>
@endsection