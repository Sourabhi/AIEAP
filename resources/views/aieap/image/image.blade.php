
	 @extends('aieap.master')
@section ('title','Delete Information')
@section ('content')
    
    <div class="container"> 
	<div class="row">

     <div class=" text-center"> 
              <div class="jumbotron">
                  <heading class="h4"><b>
                       Would you like to delete this photo?
                      </b></heading>
     
             </div>
         
          </div>
    
    {!!Form::open(['url'=>'image/delete/'.$image->id])!!}
    {!!Form::hidden('_method', 'DELETE') !!}
    <div class="col-xs-12">
      <div class="thumbnail">
        <img src="/uploads/images/{{$image->path}}" class="img-thumbnail">
      

      </div>


    </div>


  </div>
       <div class="col-xs-12">
         {!!Form::submit ('Delete',array('class'=>'btn btn-warning'))!!}
         {!!Form::close()!!}
       </div>
         
    </div>
<br><br>
	@endsection                             		                            		                             		                               		