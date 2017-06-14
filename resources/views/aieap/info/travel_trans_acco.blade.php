 @extends('aieap.master')
@section ('title','Travel Transport and Accommodation')
@section ('content')

	
<div class="container"> 
	<ol class="breadcrumb">
    <li><a href="index">Home</a></li>
    <li>Help and Support</li>
    <li class="active"> Travel, Transport and Accommodation</li>
  </ol>   
         
   <div class="jumbotron text-center">
       <p class="h4"><strong>Travel, Transport and Accommodation</strong></p>
   </div>
                
   <div class="panel-group" id="accordion" 
        role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
           <div class="panel-heading" role="tab" id="headingOne">
               <p class="panel-title text-left h4 ">
                 
                     <a href="#travel" role="button"
                        data-toggle="collapse" data-parent="#accordion"
                        aria-expanded="false" aria-controls="travel"> <strong> Travel</strong></a>
                
               </p>
           </div>
     
           <div class="panel-collapse collapse in" id="travel"
                 role="tabpanel" aria-labelledby="headingOne">
                 <div class="panel-body">
                 <p class="h5"> Information Regarding travel...... </p> 
                 </div>
           
           </div>
         </div> 

         <div class="panel panel-default">
           <div class="panel-heading" role="tab" id="headingTwo">
             <p class="panel-title text-left h4">
       
            <a href="#transport" role="button"
            data-toggle="collapse" data-parent="#accordion"
            aria-expanded="false" aria-controls="transport"> <strong> Transport</strong></a>
             
            </p>
           
           </div>
     
           <div class="panel-collapse collapse" id="transport"
            role="tabpanel" aria-labelledby="headingTwo">
               <div class="panel-body">
               <p class="h5"> Information regarding transport...... </p> 
               
               </div>
           
           </div>
     </div> 
      
        
       <div class="panel panel-default">
     
            <div class="panel-heading" role="tab" id="headingThree">
           
           <p class="panel-title text-left h4">
      
         <a href="#accommodation" role="button"
            data-toggle="collapse" data-parent="#accordion"
            aria-expanded="false" aria-controls="accommodation"> <strong> Accommodation</strong></a>
               
         </p>
           
           </div>
     
           <div class="panel-collapse collapse" id="accommodation"
            role="tabpanel" aria-labelledby="headingThree">
               <div class="panel-body">
               <p class="h5"> Information Regarding accommodation...... </p> 
               
               </div>
           
           </div>
     </div> 

    </div>
    </div>
	 @endsection