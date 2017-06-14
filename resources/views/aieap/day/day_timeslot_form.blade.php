@extends('aieap.master')
@section('title','Day-Timeslot ')
@section('stylesheets')
{!!Html::style('css/select2.min.css')!!}
@endsection
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
       <div class="panel-heading">  <h4> <strong> Day-Timeslot Form </strong></h4>
       </div>
       <div class="panel-body">
         {!!Form::open(array('url' => 'create/day', 'data-toggle'=>'validator')) !!}
           <div class="form-group">
             {!!Form::label('day', 'Day *', ['class'=>'col-sm-4 control-label']);!!} 
               <div class="col-sm-8">
                 {!!Form::select('day',['Monday'=>'Monday', 'Tuesday'=>'Tuesday','Wednesday'=>'Wednesday', 'Thursday'=>'Thursday', 'Friday'=>'Friday', 'Saturday'=>'Saturday', 'Sunday'=>'Sunday'], null, ['placeholder'=>'Select a day','class' => 'form-control','required' => 'required']);!!}<br>
               </div>
           </div>

           <div class="form-group">
             {!!Form::label('timeslots', 'Timeslots *', ['class'=>'col-sm-4 control-label']);!!} 
               <div class="col-sm-8">
                 <select class="form-control select2-multi" name="timeslots[]" multiple="multiple" id="timeslots" required="required">
                   @foreach($timeslots as $timeslot)
                     <option value='{{$timeslot->id}}'>{{$timeslot->timeslot}}: {{$timeslot->starttime}} to {{$timeslot->endtime}}</option> 
                   @endforeach
                 </select> 
                 <br><br>
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
<br>
<br>
<br>
@endsection
@section('scripts')
{!!Html::script('js/select2.min.js')!!}
<script type="text/javascript"> 
$('.select2-multi').select2();
</script>
@endsection
