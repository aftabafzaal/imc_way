<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Academy;
use App\Pagesection;
use Config;
use App\Helpers;
use App\About;

class PrivacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $academies = Academy::paginate($per_page);
        return view ('academy.index',compact("academies"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('academy.create');
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

            $academy = new About();
            $academy->title_en = $request->title_en;
            $academy->title_ar = $request->title_ar;
            $academy->description_en = $request->description_en;
            $academy->description_ar = $request->description_ar;
            $academy->save();
            return redirect('admin/privacy/edit/2')->with("message","Privacy updated")->with('alert-class', 'alert-success');
        }catch(Exception $e){
            return redirect('admin/privacy/edit/2')->with("message",$e->getMessage())->with('alert-class', 'alert-danger');
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
        $academy = About::where('id','2')->first();
        return view("privacy.edit",compact("academy"));
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

            $academy = About::find($id);
            $academy->title_en = $request->title_en;
            $academy->title_ar = $request->title_ar;
            $academy->description_en = $request->description_en;
            $academy->description_ar = $request->description_ar;
            $academy->save();
            return redirect('admin/privacy/edit/2')->with("message","Privacy Updated")->with('alert-class', 'alert-success');
        }catch(Exception $e){
            return redirect('admin/privacy/edit/2')->with("message",$e->getMessage())->with('alert-class', 'alert-danger');
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
            $academy = Academy::find($id);
            $academy->delete();
            return json_encode(array('status' => 1, 'message' => "Academy Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function deleteMultiple(Request $request)
    {
        try{
            $result = Academy::whereIn('id', $request->ids)->delete();
            return json_encode(array('status' => 1, 'message' => "Academys Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function section(){
        return view ('privacy.section');
    }

    public function getSectionContent(Request $request){
      $helper = new Helpers();

        try{
            $content = Pagesection::where(["page"=>$request->page,"section"=>$request->section])->get()->first();
            // if(!empty($content->icon)){
            //     $content->icon = !empty($content->icon)?($helper->publicpath()."/images/section/".$content->icon):"";
            // }
           if($request->section == "banner"){
              return view('layouts.insidebanner')->with('content',$content);
            }else{
              return view('layouts.titledes')->with('content',$content);
            }
          //  return json_encode(array("status" => 1, "message" => "Load Data Successfully", "content" => $content));
        }catch(Exception $e){
            return json_encode(array("status" => 0, "message" => $e->getMessage()));
        }
    }



    public function updateSectionContent(Request $request){
      $helper = new Helpers();
        try{
            $content = Pagesection::where(["page"=>$request->page,"section"=>$request->section])->get()->first();
            if($content){
                $pageSection = Pagesection::find($content->id);
                $pageSection->title_en = $request->title_en;
                $pageSection->title_ar = $request->title_ar;
                $pageSection->description_en = $request->description_en;
                $pageSection->description_ar = $request->description_ar;
                $pageSection->bgcolor = $request->bgcolor;

                if(!empty($request->image1) && $request->image1 != null) {
                   $mediaid= $helper->getMediaID($request->image1);
                    $pageSection['file']= $request->image1;
                    $pageSection['media_id']= $mediaid;
                }

                $pageSection->save();
            }else{
                $pageSection = new Pagesection;
                $pageSection->page = $request->page;
                $pageSection->section = $request->section;
                $pageSection->title_en = $request->title_en;
                $pageSection->title_ar = $request->title_ar;
                $pageSection->bgcolor = $request->bgcolor;
                $pageSection->description_en = $request->description_en;
                $pageSection->description_ar = $request->description_ar;
                if(!empty($request->image1) && $request->image1 != null) {
                   $mediaid= $helper->getMediaID($request->image1);
                    $pageSection['file']= $request->image1;
                    $pageSection['media_id']= $mediaid;
                }

                $pageSection->save();
            }
            return json_encode(array("status" => 1, "message" => "Update Data Successfully"));
        }catch(Exception $e){
            return json_encode(array("status" => 0, "message" => $e->getMessage()));
        }
    }


}
