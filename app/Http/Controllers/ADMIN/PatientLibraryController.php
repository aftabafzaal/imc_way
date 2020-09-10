<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PatientLibrary;
use App\PatientLibraryCategory;
use App\Pagesection;
use App\Helpers;
use Config;

class PatientLibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $patientlibraries = PatientLibrary::paginate($per_page);
        return view ('patientlibrary.index',compact("patientlibraries"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patientLibraryCategory = PatientLibraryCategory::all();
        return view ('patientlibrary.create',compact('patientLibraryCategory'));
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
            $helper = new Helpers();
            $this->validate($request,[
                'title_en' => 'required|max:500',
                'title_ar' => 'required|max:500',
                'file'      => 'required'
            ],[
                'title_en.required' => 'Please enter title in english',
                'title_ar.required' => 'Please enter title in arabic',
                'file.required' => 'Please select file'
            ]);

            $patientlibrary = new PatientLibrary();
            $patientlibrary->category_id = $request->category_id;
            $patientlibrary->title_en = $request->title_en;
            $patientlibrary->title_ar = $request->title_ar;
            // if($request->hasFile('file')) {
            //     $file= $helper->upload_image($request->file('file'),'images/patientlibrary/files/','none');
            //     $patientlibrary->file = $file;
            // }

            if(!empty($request->file) && $request->file != null) {
               $mediaid= $helper->getMediaID($request->file);
                $patientlibrary['file']= $request->file;
                $patientlibrary['media_id']= $mediaid;
            }

            $patientlibrary->save();
            return redirect('admin/patientlibrary')->with("message","Patient Library created")->with('alert-class', 'alert-success');
        }catch(Exception $e){
            return redirect('admin/patientlibrary')->with("message",$e->getMessage())->with('alert-class', 'alert-danger');
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
        $patientlibrary = PatientLibrary::find($id);
        $patientLibraryCategory = PatientLibraryCategory::all();
        return view("patientlibrary.edit",compact('patientlibrary','patientLibraryCategory'));
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
            $helper = new Helpers();
            $this->validate($request,[
                'title_en' => 'required|max:500',
                'title_ar' => 'required|max:500',
            ],[
                'title_en.required' => 'Please enter title in english',
                'title_ar.required' => 'Please enter title in arabic'
                ]);

            $patientlibrary = PatientLibrary::find($id);
            $patientlibrary->category_id = $request->category_id;
            $patientlibrary->title_en = $request->title_en;
            $patientlibrary->title_ar = $request->title_ar;
            if(!empty($request->file) && $request->file != null) {
               $mediaid= $helper->getMediaID($request->file);
                $patientlibrary['file']= $request->file;
                $patientlibrary['media_id']= $mediaid;
            }

            $patientlibrary->save();
            return redirect('admin/patientlibrary')->with("message","Patient Library Updated")->with('alert-class', 'alert-success');
        }catch(Exception $e){
            return redirect('admin/patientlibrary')->with("message",$e->getMessage())->with('alert-class', 'alert-danger');
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
            $patientlibrary = PatientLibrary::find($id);
            $patientlibrary->delete();
            return json_encode(array('status' => 1, 'message' => "Patient Library Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function deleteMultiple(Request $request)
    {
        try{
            $result = PatientLibrary::whereIn('id', $request->ids)->delete();
            return json_encode(array('status' => 1, 'message' => "Patient Library Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function section(){
        return view ('patientlibrary.section');
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
