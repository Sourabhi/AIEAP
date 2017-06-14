   @extends('aieap.master')
@section ('title','Student Welfare')
@section ('content')
 
	
    <div class="container"> 
	
<ol class="breadcrumb">
    <li><a href="index">Home</a></li>
    <li>Help and Support</li>
   <li class="active"> Student Welfare</li>
  </ol>   
         
         
        
         <div class=" text-center"> 
             
              <div class="jumbotron">
                  <p class="h4"><strong> Student Welfare</strong></p>
     
             </div>
         
          
         </div>
                
                
 <div class="panel-group" id="accordion" 
      role="tablist" aria-multiselectable="true">
        
       <div class="panel panel-default">
     
     <div class="panel-heading" role="tab" id="headingOne">
           
           <p class="panel-title text-left">
               
         
         <a href="#health" role="button"
            data-toggle="collapse" data-parent="#accordion"
            aria-expanded="false" aria-controls="health"> <strong> Health</strong></a>
         
         </p>
           
           </div>
     
           <div class="panel-collapse collapse in" id="health"
            role="tabpanel" aria-labelledby="headingOne">
               <div class="panel-body">
               <p class="h5"> Information Regarding health...... </p> 
               
               </div>
           
           </div>
     </div> 
        
   
        
  
        
      <div class="panel panel-default">
     
     <div class="panel-heading" role="tab" id="headingTwo">
           
           <p class="panel-title text-left">
         
         <a href="#counselling" role="button"
            data-toggle="collapse" data-parent="#accordion"
            aria-expanded="false" aria-controls="counselling"> <strong> Counselling</strong></a>
               
         </p>
           
           </div>
     
           <div class="panel-collapse collapse" id="counselling"
            role="tabpanel" aria-labelledby="headingTwo">
               <div class="panel-body">
               <p class="h5"> Information regarding counselling...... </p> 
               
               </div>
           
           </div>
     </div> 
        </div>
        

    </div>
    
		@endsection