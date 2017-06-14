@extends('aieap.master')
@section('title','Update the Role')
@section('content')

<br><br>
<div class="container">
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
     <div class=" col-sm-offset-2 col-sm-8 ">
       <div class="panel panel-default"> 
         <div class="panel-heading">  <h4> <strong> Update Role Form </strong></h4>
         </div>
         <div class="panel-body">
           {!!Form::open(array('url' => 'edit/role/'. $role->id)) !!}
           {!!Form::hidden('_method', 'PUT') !!}
             <div class="form-group"> 
               {!!Form::label('role', 'Role *', ['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::text('role', $role->role, ['class' => 'form-control', 'required' => 'required']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('description', 'Description *',['class'=>'col-sm-4 control-label']);!!}
                 <div class="col-sm-8">
                   {!!Form::textarea('description', $role->description, ['class' => 'form-control', 'size'=>'40x5','required' => 'required']);!!}<br>
                 </div>
             </div>

             <div class="from-group">
               <div class=" col-xs-4 col-sm-offset-4 col-sm-4  col-md-1 col-lg-offset-4 col-lg-2 ">
                 {!! Form::submit('Update',['class' => 'btn btn-primary']);!!}
               </div> 
             </div>
           {!! Form::close() !!}

           {!!Form::open(array('url' => 'delete/role/'. $role->id)) !!}
           {!!Form::hidden('_method', 'DELETE') !!}
             <div class="from-group">
               <div class=" col-xs-offset-1 col-xs-5  col-sm-offset-0 col-sm-2 col-md-offset-2 col-md-4 lg-offset-3 col-lg-1 ">
                 {!! Form::submit('Delete',['class' => 'btn btn-warning']);!!}<br> <br>
               </div> 
             </div>
           {!! Form::close() !!}
   
           <div class="col-xs-12 col-sm-offset-4 col-sm-8 col-md-offset-4 col-md-8 col-lg-2 ">
             <a href="{{URL::previous()}}"> <em class="fa fa-arrow-left" aria-hidden="true"></em> Back </a>
           </div>
         </div>
       </div>
     </div>
   </div>
</div>
<br> <br>
@endsection


