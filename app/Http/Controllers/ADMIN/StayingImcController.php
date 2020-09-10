<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StayingImc;
use App\Pagesection;
use App\Helpers;
use Config;
use Illuminate\Support\Facades\Auth;

class StayingImcController extends Controller
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
        $stayingimcs = StayingImc::paginate($per_page);
        return view ('stayingimc.index',compact("stayingimcs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('stayingimc.create');
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
                'description_en' => 'required|max:2000',
                'description_ar' => 'required|max:2000',
                'image1' => 'required',
                'image2' => 'required',
                'image3' => 'required'
            ],[
                'title_en.required' => 'Please enter title in english',
                'title_ar.required' => 'Please enter title in arabic',
                'description_en.required' => 'Please enter descriptions in english',
                'description_ar.required' => 'Please enter descriptions in arabic',
                'image1.required' => 'Please select image1',
                'image2.required' => 'Please select image2',
                'image3.required' => 'Please select image3'

            ]);

            $stayingimc = new StayingImc();
            $stayingimc->title_en = $request->title_en;
            $stayingimc->title_ar = $request->title_ar;
            $stayingimc->description_en = $request->description_en;
            $stayingimc->description_ar = $request->description_ar;


            if(!empty($request->image1) && $request->image1 != null) {
               $mediaid= $helper->getMediaID($request->image1);
               $stayingimc['image1']= $request->image1;
               $stayingimc['media_id_1'] = $mediaid;
            }

            if(!empty($request->image2) && $request->image2 != null) {
               $mediaid= $helper->getMediaID($request->image2);
               $stayingimc['image2']= $request->image2;
               $stayingimc['media_id_2'] = $mediaid;
            }

            if(!empty($request->image3) && $request->image3 != null) {
               $mediaid= $helper->getMediaID($request->image3);
               $stayingimc['image3']= $request->image3;
               $stayingimc['media_id_3'] = $mediaid;
            }


            $stayingimc->save();
            return redirect('admin/stayingimc')->with("message","StayingImc created")->with('alert-class', 'alert-success');
        }catch(Exception $e){
            return redirect('admin/stayingimc')->with("message",$e->getMessage())->with('alert-class', 'alert-danger');
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
        $stayingimc = StayingImc::find($id);
        return view("stayingimc.edit",compact("stayingimc"));
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
                'description_en' => 'required|max:2000',
                'description_ar' => 'required|max:2000',
            ],[
                'title_en.required' => 'Please enter title in english',
                'title_ar.required' => 'Please enter title in arabic',
                'description_en.required' => 'Please enter descriptions in english',
                'description_ar.required' => 'Please enter descriptions in arabic',
                ]);

            $stayingimc = StayingImc::find($id);
            $stayingimc->title_en = $request->title_en;
            $stayingimc->title_ar = $request->title_ar;
            $stayingimc->description_en = $request->description_en;
            $stayingimc->description_ar = $request->description_ar;
              if(!empty($request->image1) && $request->image1 != null) {
                 $mediaid= $helper->getMediaID($request->image1);
                 $stayingimc['image1']= $request->image1;
                 $stayingimc['media_id_1'] = $mediaid;
              }
              if(!empty($request->image2) && $request->image2 != null) {
                 $mediaid= $helper->getMediaID($request->image2);
                 $stayingimc['image2']= $request->image2;
                 $stayingimc['media_id_2'] = $mediaid;
              }
              if(!empty($request->image3) && $request->image3 != null) {
                 $mediaid= $helper->getMediaID($request->image3);
                 $stayingimc['image3']= $request->image3;
                 $stayingimc['media_id_3'] = $mediaid;
              }
            $stayingimc->save();
            return redirect('admin/stayingimc')->with("message","StayingImc Updated")->with('alert-class', 'alert-success');
        }catch(Exception $e){
            return redirect('admin/stayingimc')->with("message",$e->getMessage())->with('alert-class', 'alert-danger');
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
            $stayingimc = StayingImc::find($id);
            $stayingimc->delete();
            return json_encode(array('status' => 1, 'message' => "StayingImc Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function deleteMultiple(Request $request)
    {
        try{
            $result = StayingImc::whereIn('id', $request->ids)->delete();
            return json_encode(array('status' => 1, 'message' => "StayingImcs Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function section(){
        return view ('stayingimc.section');
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
