@extends('aieap.master')
@section('title','Visitor Restore ')
@section('content')

<div class="container">   
   <ol class="breadcrumb">
     <li><a href="index">Home</a></li>
     <li>Contact Us</li>
     <li class="active">Visitor Restore </li>
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
     <div class=" col-sm-offset-1 col-sm-7 ">
       <div class="panel panel-default "> 
         <div class="panel-heading">  <h4> <strong> Visitor Restore Form </strong></h4>
         </div>
         <div class="panel-body">
           {!!Form::open(array('url' => 'restore/visitor', 'id'=> 'MyForm', 'data-toggle'=>'validator')) !!}
             <div class="form-group">
               {!!Form::label('first_name', 'First Name *', ['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::text('first_name', '',['placeholder'=>'First Name','class' => 'form-control', 'required'=>'required']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('last_name', 'Last Name *',['class'=>'col-sm-4 control-label']);!!}
                 <div class="col-sm-8">
                   {!!Form::text('last_name', '',['placeholder'=>'Last Name','class' => 'form-control', 'required'=>'required']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('email', 'Email *',['class'=>'col-sm-4 control-label']);!!}
                 <div class="col-sm-8">
                   {!!Form::email ('email', '',['placeholder'=>'example@gmail.com','class' => 'form-control','required'=>'required']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('phone', 'Mobile/Phone*',['class'=>'col-sm-4 control-label']);!!}
                 <div class="col-sm-8">
                   {!!Form::text('phone', '',['placeholder'=>'Example: 001234567898','class' => 'form-control', 'required'=>'required']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('nationality', 'Nationality *',['class'=>'col-sm-4 control-label']);!!}
                 <div class="col-sm-8">
                   {!!Form::text('nationality', '',['placeholder'=>'Nationality','class' => 'form-control', 'required'=>'required']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('message', 'Message *',['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::textarea('message','',['placeholder'=>'Message', 'size'=>'40x5','class' => 'form-control', 'required'=>'required']);!!}<br>
                 </div>
             </div>

             <div class="from-group">
               <div class="col-xs-offset-2 col-xs-2 col-sm-offset-4 col-sm-2 col-md-offset-5 col-md-1 col-lg-offset-5 col-lg-1 ">
                 {!! Form::submit('Submit',['class' => 'btn btn-success']);!!}
               </div>
             </div>
           {!! Form::close() !!}

           <div class=" col-xs-offset-2 col-xs-5  col-sm-offset-2 col-sm-4 col-md-offset-2 col-md-4 lg-offset-5 col-lg-1 ">
             <button type="button"  class="btn btn-warning" onclick="FormReset()"> <strong> Reset</strong></button>
           </div>
         </div>
       </div>
     </div>
     <div class="text-center">  <h5> <strong> Address </strong></h5>
     </div><br><br>
     <address class="text-center"> 2929 Lawrence Avenue East.<br>
       Suite # 210 (2nd Floor) <br>
       Scarborough, ON.<br><br><br>
     </address>
     <div class="text-center">  <h5> <strong> Phone </strong></h5>
     </div>
     <p class="text-center"> (647) 783-9262</p><br><br>
     <div class="text-center">  <h5> <strong> Email </strong></h5>
     </div><br>
     <p class="text-center"> <a href="mailto:sustpeace@gmail.com">sustpeace@gmail.com</a></p>
   </div>
 </div>
 <br><br><br>
@endsection

