<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patientright;
use App\Pagesection;
use Config;

class PatientrightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $patientrights = Patientright::paginate($per_page);
        return view ('patientright.index',compact("patientrights"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('patientright.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $this->validate($request,[
                'title_en' => 'required',
                'title_ar' => 'required',
                'description_en' => 'required',
                'description_ar' => 'required',
            ],[
                'title_en.required' => 'Please enter title in english',
                'title_ar.required' => 'Please enter title in arabic',
                'description_en.required' => 'Please enter descriptions in english',
                'description_ar.required' => 'Please enter descriptions in arabic'
            ]);

            $patientright = new Patientright();
            $patientright->title_en = $request->title_en;
            $patientright->title_ar = $request->title_ar;
            $patientright->description_en = $request->description_en;
            $patientright->description_ar = $request->description_ar;
            $patientright->save();
            return redirect('admin/patientright')->with("message","Patientright created")->with('alert-class', 'alert-success');
        }catch(Exception $e){
            return redirect('admin/patientright')->with("message",$e->getMessage())->with('alert-class', 'alert-danger');
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
        $patientright = Patientright::find($id);
        return view("patientright.edit",compact("patientright"));
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
                'title_en' => 'required',
                'title_ar' => 'required',
                'description_en' => 'required',
                'description_ar' => 'required',
            ],[
                'title_en.required' => 'Please enter title in english',
                'title_ar.required' => 'Please enter title in arabic',
                'description_en.required' => 'Please enter descriptions in english',
                'description_ar.required' => 'Please enter descriptions in arabic'
                ]);

            $patientright = Patientright::find($id);
            $patientright->title_en = $request->title_en;
            $patientright->title_ar = $request->title_ar;
            $patientright->description_en = $request->description_en;
            $patientright->description_ar = $request->description_ar;
            $patientright->save();
            return redirect('admin/patientright')->with("message","Patientright Updated")->with('alert-class', 'alert-success');
        }catch(Exception $e){
            return redirect('admin/patientright')->with("message",$e->getMessage())->with('alert-class', 'alert-danger');
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
            $patientright = Patientright::find($id);
            $patientright->delete();
            return json_encode(array('status' => 1, 'message' => "Patientright Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function deleteMultiple(Request $request)
    {
        try{
            $result = Patientright::whereIn('id', $request->ids)->delete();
            return json_encode(array('status' => 1, 'message' => "Patientrights Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function section(){
        return view ('patientright.section');
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
