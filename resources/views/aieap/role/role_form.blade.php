@extends('aieap.master')
@section('title','Role Form ')
@section('content')

<div class="container">  
 <ol class="breadcrumb">
   <li><a href="index">Home</a></li>
   <li class="active">Timeslot</li>
  </ol> 
 @if (count($errors) > 0)
   <div class="alert alert-danger">
     <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
     </ul>
   </div>
 @endif

 <div class="row">
   <div class=" col-sm-offset-1 col-sm-10 ">
     <div class="panel panel-default "> 
       <div class="panel-heading">  <h4> <strong> Create Role Form </strong></h4>
       </div>
       <div class="panel-body">
         {!!Form::open(array('url' =>'create/role', 'data-toggle'=>'validator')) !!}
           <div class="form-group">
             {!!Form::label('role', 'Role *', ['class'=>'col-sm-4 control-label']);!!} 
               <div class="col-sm-8">
                 {!!Form::text('role','', ['placeholder'=>'Role','class' => 'form-control', 'required'=>'required']);!!}<br>
               </div>
           </div>

           <div class="form-group">
             {!!Form::label('description', 'Description *',['class'=>'col-sm-4 control-label']);!!}
               <div class="col-sm-8">
                 {!!Form::textarea('description', '', ['placeholder'=>'Description of the role','class' => 'form-control','size'=>'40x5', 'required'=>'required']);!!}<br>
               </div>
           </div>

           <div class="from-group">
             <div class="col-xs-12 col-sm-offset-4 col-sm-8">
               {!! Form::submit('Submit',['class' => 'btn btn-success']);!!}
             </div>
           </div>
         {!! Form::close() !!}
       </div>
     </div>
   </div>     
 </div>
</div>
<br><br><br>
@endsection

