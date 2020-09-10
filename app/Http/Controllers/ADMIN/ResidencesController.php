<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Residence;
use App\Pagesection;
use App\Helpers;
use Config;
use App\Department;
use Illuminate\Support\Facades\Auth;
class ResidencesController extends Controller
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
        $residences = Residence::paginate($per_page);
        $page = Department::select('id','title_en','title_ar')->get();
        return view ('residence.index',compact("residences","page"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $page = Department::select('id','title_en','title_ar')->get();
        return view ('residence.create')->with('page',$page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $helper = new Helpers();
            $this->validate($request,[
                'title_en' => 'required',
                'title_ar' => 'required',
            ],[
                'title_en.required' => 'Please enter title in english',
                'title_ar.required' => 'Please enter title in arabic',
                      ]);
            $residence = new Residence();
            $residence->title_en = $request->title_en;
            $residence->title_ar = $request->title_ar;
            $residence->page_id =!empty($request->page_id)?$request->page_id:NULL;
            if(!empty($request->image1) && $request->image1 != null) {
               $mediaid= $helper->getMediaID($request->image1);
                $residence['image']= $request->image1;
                $residence['media_id']= $mediaid;
            }

            $residence->save();
            return redirect('admin/residence')->with("message","Residence created")->with('alert-class', 'alert-success');

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

        $residence = Residence::find($id);
        $page = Department::select('id','title_en','title_ar')->get();
        return view("residence.edit",compact("residence","page"));
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
                'title_ar.required' => 'Please enter title in arabic',
            ]);
            $residence = Residence::find($id);
            $residence->title_en = $request->title_en;
            $residence->title_ar = $request->title_ar;
            $residence->page_id =!empty($request->page_id)?$request->page_id:NULL;
            if(!empty($request->image1) && $request->image1 != null) {
               $mediaid= $helper->getMediaID($request->image1);
                $residence['image']= $request->image1;
                $residence['media_id']= $mediaid;
            }
            $residence->save();
            return redirect('admin/residence')->with("message","Residence Updated")->with('alert-class', 'alert-success');
        }catch(Exception $e){
            return redirect('admin/residence')->with("message",$e->getMessage())->with('alert-class', 'alert-danger');
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
            $residence = Residence::find($id);
            $residence->delete();
            return json_encode(array('status' => 1, 'message' => "Residence Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function deleteMultiple(Request $request)
    {
        try{
            $result = Residence::whereIn('id', $request->ids)->delete();
            return json_encode(array('status' => 1, 'message' => "Residences Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function section(){
        return view ('residence.section');
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
            }else if($request->section == "section_2"){
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
                    $pageSection['icon']= $request->image1;
                    $residence['media_id']= $mediaid;
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
                    $pageSection['icon']= $request->image1;
                    $residence['media_id']= $mediaid;
                }
                $pageSection->save();
            }
            return json_encode(array("status" => 1, "message" => "Update Data Successfully"));
        }catch(Exception $e){
            return json_encode(array("status" => 0, "message" => $e->getMessage()));
        }
    }
}
