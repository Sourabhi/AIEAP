@extends('aieap.master')
@section('title','Timeslot ')
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
         <div class="panel-heading">  <h4> <strong> Timeslot Form </strong></h4>
         </div>
         <div class="panel-body">
           {!!Form::open(array('url' => 'create/timeslot', 'data-toggle'=>'validator')) !!} 
             <div class="form-group">
               {!!Form::label('timeslot', 'Timeslot *', ['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::select('timeslot',['Morning'=>'Morning', 'Afternoon'=>'Afternoon','Evening'=>'Evening'], null, ['placeholder'=>'Select a timeslot','class' => 'form-control', 'required'=>'required']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('starttime', 'Start Time *',['class'=>'col-sm-4 control-label']);!!}
                 <div class="col-sm-8">
                   {!!Form::select('starttime', ['9.00'=>'9.00', '10.00'=>'10.00','11.00'=>'11.00','12.00'=>'12.00','13.00'=>'13.00','14.00'=>'14.00','15.00'=>'15.00','16.00'=>'16.00','17.00'=>'17.00','18.00'=>'18.00','19.00'=>'19.00','20.00'=>'20.00','21.00'=>'21.00','22.00'=>'22.00','23.00'=>'23.00','24.00'=>'24.00'], null, ['placeholder'=>'Select a time','class' => 'form-control', 'required'=>'required']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('endtime', 'End Time *',['class'=>'col-sm-4 control-label']);!!}
                 <div class="col-sm-8">
                   {!!Form::select('endtime', ['9.00'=>'9.00', '10.00'=>'10.00','11.00'=>'11.00','12.00'=>'12.00','13.00'=>'13.00','14.00'=>'14.00','15.00'=>'15.00','16.00'=>'16.00','17.00'=>'17.00','18.00'=>'18.00','19.00'=>'19.00','20.00'=>'20.00','21.00'=>'21.00','22.00'=>'22.00','23.00'=>'23.00','24.00'=>'24.00'], null, ['placeholder'=>'Select a time','class' => 'form-control', 'required'=>'required']);!!}<br>
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

