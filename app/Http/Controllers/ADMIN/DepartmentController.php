<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Survey;
use App\Pagesection;
use App\Helpers;
use Config;
use App\Department;
use Illuminate\Support\Facades\Auth;
class DepartmentController extends Controller
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
      $helper = new Helpers();
         $all= Department::get();
           foreach($all as $key=>$v){
            //Department::where('id',$v->id)->update(['slug_en'=>str_slug( $v['title_en'], '-'),'slug_ar'=>$helper->make_slug($v['title_ar'],'-') ]);
           }
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $searchname = "";
        if(isset($request->name)){
            $searchname = $request->name;
            $surveys = Department::where("title_en","like","%".$request->name."%")->paginate($per_page);
        }else{
            $surveys = Department::paginate($per_page);
        }

        return view ('department.index',compact("surveys","searchname"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('department.create');
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
                //'image' =>'required',
            ],[
                'title_en.required' => 'Please enter title in english',
                'title_ar.required' => 'Please enter title in arabic',
              //  'image.required' => 'Please select image file'
            ]);

            $survey = new Department();
            $survey->title_en = $request->title_en;
            $survey->title_ar = $request->title_ar;
            $survey->slug_en = str_slug( $request->title_en, '-');
            $survey->slug_ar = str_slug($request->title_ar, '-');

            //$doctorData['slug_en'] =  str_slug( $doctorData['slug_en'],'-');
            //$doctorData['slug_ar'] = $helper->make_slug($v['slug_ar'],'-');


            $survey->slug_en =  $request->slug_en;
            $survey->slug_ar =$request->slug_ar;
            $survey->description_en = $request->description_en;
            $survey->description_ar = $request->description_ar;
            $survey->service_en = $request->service_en;
            $survey->service_ar = $request->service_ar;
            if(isset($request->status)){
                $survey->status = 1;
            }else{
                $survey->status = 2;
            }

            if(!empty($request->image1) && $request->image1 != null) {
                $mediaid= $helper->getMediaID($request->image1);
                $survey->image = $request->image1;
                $survey->media_id = $mediaid;
            }
            $survey->save();
            return redirect('admin/department')->with("message","Department created")->with('alert-class', 'alert-success');
        }catch(Exception $e){
            return redirect('admin/department')->with("message",$e->getMessage())->with('alert-class', 'alert-danger');
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
        $survey = Department::find($id);
        return view("department.edit",compact("survey"));
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

        $helper = new Helpers();
        try{
            $this->validate($request,[
                'title_en' => 'required|max:500',
                'title_ar' => 'required|max:500',
            ],[
                'title_en.required' => 'Please enter title in english',
                'title_ar.required' => 'Please enter title in arabic',
                ]);

            $survey = Department::find($id);
            $survey->title_en = $request->title_en;
            $survey->title_ar = $request->title_ar;
            //$survey->slug_en = str_slug($request->title_en, '-');
          //  $survey->slug_ar = str_slug($request->title_ar, '-');
            $survey->slug_en =  $request->slug_en;
            $survey->slug_ar =$request->slug_ar;
            $survey->description_en = $request->description_en;
            $survey->description_ar = $request->description_ar;
            $survey->service_en = $request->service_en;
            $survey->service_ar = $request->service_ar;
            if(isset($request->status)){
                $survey->status = 1;
            }else{
                $survey->status = 2;
            }
            // if(!empty($request->image1) && $request->image1 != null) {
            //     copy(base_path('/media/'.$request->image1),base_path('images/department/'.$request->image1));
            //     $survey->image = $request->image1;
            // }
            if(!empty($request->image1) && $request->image1 != null) {
                $mediaid= $helper->getMediaID($request->image1);
                $survey->image = $request->image1;
                $survey->media_id = $mediaid;
            }
            $survey->save();
            return redirect('admin/department')->with("message","Survey Updated")->with('alert-class', 'alert-success');
        }catch(Exception $e){
            return redirect('admin/department')->with("message",$e->getMessage())->with('alert-class', 'alert-danger');
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
            $survey = Department::find($id);
            $survey->delete();
            return json_encode(array('status' => 1, 'message' => "Department Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function deleteMultiple(Request $request)
    {
        try{
            $result = Department::whereIn('id', $request->ids)->delete();
            return json_encode(array('status' => 1, 'message' => "Surveys Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function section(){
        return view ('department.section');
    }

    public function getSectionContent(Request $request){
      $helper = new Helpers();

        try{
            $content = Pagesection::where(["page"=>$request->page,"section"=>$request->section])->get()->first();
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
                    copy(base_path('/media/'.$request->image1),base_path('images/department/'.$request->image1));
                    $pageSection->icon = $request->image1;
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
                    copy(base_path('/media/'.$request->image1),base_path('images/department/'.$request->image1));
                    $pageSection->icon = $request->image1;
                }
                $pageSection->save();
            }
            return json_encode(array("status" => 1, "message" => "Update Data Successfully"));
        }catch(Exception $e){
            return json_encode(array("status" => 0, "message" => $e->getMessage()));
        }
    }
}
