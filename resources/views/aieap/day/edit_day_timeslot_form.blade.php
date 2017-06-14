@extends('aieap.master')
@section('title','Update Day Timeslot')
@section('stylesheets1')
{!!Html::style('css/select2.min.css')!!}
@endsection
@section('content')


<div class="container"> 
   <ol class="breadcrumb">
     <li><a href="index">Home</a></li>
     <li class="active">Edit Day and Timeslot</li>
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
     <div class=" col-sm-offset-1 col-sm-10">
       <div class="panel panel-default "> 
         <div class="panel-heading">  <h4> <strong> Edit Day-Timeslot Form </strong></h4>
         </div>
         <div class="panel-body">
           {!!Form::open(array('url' => 'edit/day/'. $day->id)) !!}
             {!!Form::hidden('_method', 'PUT') !!}
               <div class="form-group">
                 {!!Form::label('day', 'Day *', ['class'=>'col-sm-4 control-label']);!!} 
                   <div class="col-sm-8">
                     {!!Form::select('day',['Monday'=>'Monday', 'Tuesday'=>'Tuesday','Wednesday'=>'Wednesday', 'Thursday'=>'Thursday', 'Friday'=>'Friday', 'Saturday'=>'Saturday', 'Sunday'=>'Sunday'], $day->day, ['placeholder'=>'Select a day','class' => 'form-control', 'required'=>'required']);!!}<br>
                   </div>
               </div>

               <div class="form-group">
                 {!!Form::label('timeslots', 'Timeslots *', ['class'=>'col-sm-4 control-label']);!!} 
                   <div class="col-sm-8">
                     {!! Form::select('timeslots[]',$timeslots, null, ['class'=>'select2-multi form-control','id'=>'timeslots', 'multiple'=>'multiple'])!!}
                     <br><br>
                   </div>
               </div>

               <div class="from-group">
                 <div class=" col-xs-4 col-sm-offset-4 col-sm-4  col-md-1 col-lg-offset-4 col-lg-2 ">
                   {!! Form::submit('Update',['class' => 'btn btn-primary']);!!}
                 </div> 
               </div>
           {!! Form::close() !!}

           {!!Form::open(array('url' => 'delete/day/'. $day->id)) !!}
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

@section('scripts1')
{!!Html::script('js/select2.min.js')!!}
<script type="text/javascript"> 
$('.select2-multi').select2();
$('.select2-multi').select2().val({!!json_encode($day->timeslots()->getRelatedIds())!!}).trigger('change');
</script>
@endsection