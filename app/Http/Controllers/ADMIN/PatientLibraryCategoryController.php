<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PatientLibraryCategory;
use App\Pagesection;
use App\Helpers;
use Config;

class PatientLibraryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $patientlibrarycategories = PatientLibraryCategory::paginate($per_page);
        return view ('patientlibrarycategory.index',compact("patientlibrarycategories")); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('patientlibrarycategory.create'); 
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
                'category_name_en' => 'required|max:254',
                'category_name_ar' => 'required|max:254',
            ],[
                'category_name_en.required' => 'Please enter title in english',
                'category_name_ar.required' => 'Please enter title in arabic'
            ]);
    
            $patientlibrarycategory = new PatientLibraryCategory();
            $patientlibrarycategory->category_name_en = $request->category_name_en;
            $patientlibrarycategory->category_name_ar = $request->category_name_ar;
            $patientlibrarycategory->save();
            return redirect('admin/patientlibrarycategory')->with("message","Patient Library Category created")->with('alert-class', 'alert-success');
        }catch(Exception $e){
            return redirect('admin/patientlibrarycategory')->with("message",$e->getMessage())->with('alert-class', 'alert-danger');
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
        $patientlibrarycategory = PatientLibraryCategory::find($id);
        return view("patientlibrarycategory.edit",compact("patientlibrarycategory"));
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
                'category_name_en' => 'required|max:254',
                'category_name_ar' => 'required|max:254',
            ],[
                'category_name_en.required' => 'Please enter title in english',
                'category_name_ar.required' => 'Please enter title in arabic'
            ]);
                
            $patientlibrarycategory = PatientLibraryCategory::find($id);
            $patientlibrarycategory->category_name_en = $request->category_name_en;
            $patientlibrarycategory->category_name_ar = $request->category_name_ar;                      
            $patientlibrarycategory->save();
            return redirect('admin/patientlibrarycategory')->with("message","Patient Library Category Updated")->with('alert-class', 'alert-success');
        }catch(Exception $e){
            return redirect('admin/patientlibrarycategory')->with("message",$e->getMessage())->with('alert-class', 'alert-danger');
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
            $patientlibrarycategory = PatientLibraryCategory::find($id);
            $patientlibrarycategory->delete();
            return json_encode(array('status' => 1, 'message' => "Patient Library Category Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function deleteMultiple(Request $request)
    {
        try{
            $result = PatientLibraryCategory::whereIn('id', $request->ids)->delete();
            return json_encode(array('status' => 1, 'message' => "Patient Library Category Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

}
