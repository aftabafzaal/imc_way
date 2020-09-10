<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Appointment;
use App\Pagesection;
use Config;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{   
    
    public function __construct()
          {
           $this->middleware(function ($request, $next) {
               $user= Auth::user();
               if($user->role_id == 2){
                    return redirect('permission');
               }else{
                   return $next($request);
               }
           });
       }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $appointments = Appointment::paginate($per_page);
        return view ('appointment.index',compact("appointments")); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('appointment.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* echo "<pre>";
        print_r($request->all());
        die; */
        try{
            $this->validate($request,[
                'title_en' => 'required|max:500',
                'title_ar' => 'required|max:500',
                'description_en' => 'required|max:2000',
                'description_ar' => 'required|max:2000',

            ],[
                'title_en.required' => 'Please enter title in english',
                'title_ar.required' => 'Please enter title in arabic',
                'description_en.required' => 'Please enter descriptions in english',
                'description_ar.required' => 'Please enter descriptions in arabic'
            ]);
    
            $appointment = new Appointment();
            $appointment->title_en = $request->title_en;
            $appointment->title_ar = $request->title_ar;
            $appointment->description_en = $request->description_en;
            $appointment->description_ar = $request->description_ar;
            $appointment->save();
            return redirect('admin/appointment')->with("message","Appointment created")->with('alert-class', 'alert-success');
        }catch(Exception $e){
            return redirect('admin/appointment')->with("message",$e->getMessage())->with('alert-class', 'alert-danger');
        }
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
        $appointment = Appointment::find($id);
        return view("appointment.edit",compact("appointment"));
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
        try{
            $this->validate($request,[
                'title_en' => 'required|max:500',
                'title_ar' => 'required|max:500',
                'description_en' => 'required|max:2000',
                'description_ar' => 'required|max:2000',
            ],[
                'title_en.required' => 'Please enter title in english',
                'title_ar.required' => 'Please enter title in arabic',
                'description_en.required' => 'Please enter descriptions in english',
                'description_ar.required' => 'Please enter descriptions in arabic'
                ]);
                
            $appointment = Appointment::find($id);
            $appointment->title_en = $request->title_en;
            $appointment->title_ar = $request->title_ar;
            $appointment->description_en = $request->description_en;
            $appointment->description_ar = $request->description_ar;
            $appointment->save();
            return redirect('admin/appointment')->with("message","Appointment Updated")->with('alert-class', 'alert-success');
        }catch(Exception $e){
            return redirect('admin/appointment')->with("message",$e->getMessage())->with('alert-class', 'alert-danger');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $appointment = Appointment::find($id);
            $appointment->delete();
            return json_encode(array('status' => 1, 'message' => "Appointment Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function deleteMultiple(Request $request)
    {
        try{
            $result = Appointment::whereIn('id', $request->ids)->delete();
            return json_encode(array('status' => 1, 'message' => "Appointments Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function section(){
        return view ('appointment.section'); 
    }

    public function getSectionContent(Request $request){
        try{
            $content = Pagesection::where(["page"=>$request->page,"section"=>$request->section])->get()->first();
            return json_encode(array("status" => 1, "message" => "Load Data Successfully", "content" => $content));
        }catch(Exception $e){
            return json_encode(array("status" => 0, "message" => $e->getMessage()));
        }
    }

    public function updateSectionContent(Request $request){
        try{
            $content = Pagesection::where(["page"=>$request->page,"section"=>$request->section])->get()->first();
            if($content){
                $pageSection = Pagesection::find($content->id);
                $pageSection->title_en = $request->title_en;
                $pageSection->title_ar = $request->title_ar;
                $pageSection->description_en = $request->description_en;
                $pageSection->description_ar = $request->description_ar;
                $pageSection->save();
            }else{
                $pageSection = new Pagesection;
                $pageSection->page = $request->page;
                $pageSection->section = $request->section;
                $pageSection->title_en = $request->title_en;
                $pageSection->title_ar = $request->title_ar;
                $pageSection->description_en = $request->description_en;
                $pageSection->description_ar = $request->description_ar;
                $pageSection->save();
            }          
            return json_encode(array("status" => 1, "message" => "Update Data Successfully"));
        }catch(Exception $e){
            return json_encode(array("status" => 0, "message" => $e->getMessage()));
        }
    }
}
