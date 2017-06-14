@extends('aieap.master')
@section ('title','Visitor Query')
@section ('content')

<br><br><br>
<div class="container">
   <div class=" col-xs-12">
     <div class="panel panel-default"> 
       <div class="panel-heading">  <h4> <strong> This is a Visitor's Query page! </strong></h4>
       </div>
       <div class="panel-body"><h5> Information of AIEAP visitors and their queries </h5>
         <div class="table-responsive"> 
           <table class="table table-bordered">
             <thead>
               <tr class="info">
                 <th>ID</th>
                   <th>First Name</th>
                   <th>Last Name</th>
                   <th>Email</th>
                   <th>Phone</th>
                   <th>Nationality</th>
                   <th>Message</th>
                   <th>Created_at<br>(Y-M-D)(h:m:s)</th>
                   <th>Updated_at<br>(Y-M-D)(h:m:s)</th>
               </tr>
             </thead>
             <tbody>
            	 @foreach ($queryvisitors as $visitor)
                 <tr class="active">
                   <td><a href="{{url('visitor/'. $visitor->id)}}">{{ $visitor->id}}</a></td>
                    <td>{{ $visitor->first_name}}</td>
                    <td>{{ $visitor->last_name}} </td>
                    <td>{{ $visitor->email}} </td>
                    <td>{{ $visitor->phone}} </td>
                    <td>{{ $visitor->nationality}} </td>
                    <td>{{ $visitor->message}} </td>
                    <td>{{ $visitor->created_at}} </td>
                    <td>{{ $visitor->updated_at}} </td>
                 </tr>
               @endforeach
             </tbody>
           </table>
         </div>
       </div> 
     </div> 
   </div>
 </div>

@endsection




