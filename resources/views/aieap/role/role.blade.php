@extends('aieap.master')
@section ('title','Role')
@section ('content')

<br><br><br>
<div class="container">
 <div class=" col-xs-12">
   <div class="panel panel-default"> 
     <div class="panel-heading">  <h4> <strong> This is a AIEAP active Roles </strong></h4>
     </div>
     <div class="panel-body"><h5> Information of AIEAP Roles </h5>
       <div class="table-responsive"> 
         <table class="table table-bordered">
           <thead>
             <tr class="info">
               <th>ID</th>
               <th>Role</th>
               <th>Description </th>
               <th>Created_at<br>(Y-M-D)(h:m:s)</th>
               <th>Updated_at<br>(Y-M-D)(h:m:s)</th>
             </tr>
           </thead>
           
           <tbody>
             @foreach ($roles as $role)
               <tr class="active">
                 <td><a href="{{url('role/'. $role->id)}}">{{ $role->id}}</a></td>
                 <td>{{ $role->role}}</td>
                 <td>{{ $role->description}}</td>
                 <td>{{ $role->created_at}} </td>
                 <td>{{ $role->updated_at}} </td>
               </tr>
             @endforeach
           </tbody>
         </table>
       </div>
       <a class ="btn btn-info" href="{{url('create/role/')}}">Create Role</a>
     </div> 
   </div> 
 </div>
</div>
@endsection