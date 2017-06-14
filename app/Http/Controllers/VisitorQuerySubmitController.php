<?php
namespace aieapV1\Http\Controllers;
use Illuminate\Http\Request;
use aieapV1\Http\Requests;
use aieapV1\Http\Requests\CreateVisitorQueryRequest;
use aieapV1\QueryVisitor; 
use Illuminate\Support\Facades\Input;
use DB;
use aieapV1\Http\Controllers\Controller;
class VisitorQuerySubmitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data= array(
            'message' => 'Thank you very much.',
            //'courses'=> Course::all()
            );
       return view('aieap.visitor_query.visitor_query_submit_confirm',$data);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('aieap.admin.admin_contact_us');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVisitorQueryRequest $request)
    {
       $visitor=new QueryVisitor;
       $visitor->first_name=Input::get ('first_name');
       $visitor->last_name=Input::get ('last_name');
       $visitor->email=Input::get ('email');
       $visitor->phone=Input::get ('phone');
       $visitor->nationality=Input::get ('nationality');
       $visitor->message=strip_tags(Input::get ('message', '<p><em><strong><br>'));
       $query=DB::table('queryvisitors')->where('email','=', Input::get('email'))->count();
       if($query>=1){$test = QueryVisitor:: onlyTrashed()->where('email','=', Input::get('email'))->count();
            if ($test>=1){$test1 = QueryVisitor:: onlyTrashed()->where('email','=', Input::get('email'))->restore();
                     return redirect('/admin_dash')->with('success',$visitor->first_name. " ".$visitor->last_name. "'s". " ". 'query  been restored with previous information. Please check the information if it is required to edit');
                 }
            else {return redirect('/admin_dash')->with('warning',  $visitor->first_name." ". $visitor->last_name." with email " .$visitor->email. ' has already been taken');
            } 
        }
        else{return redirect('/admin_dash')->with('warning', 'This visitor does not exist.');
         }
       
       // $visitor->save();
       // return redirect('/query_confirm');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
