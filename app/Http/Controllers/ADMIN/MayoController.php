<?php
namespace App\Http\Controllers\ADMIN;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patientright;
use App\Pagesection;
use Config;
use App\Mayo;
use App\Helpers;
use Illuminate\Support\Facades\Auth;
class MayoController extends Controller
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
        $patientrights = Mayo::paginate($per_page);
        return view ('mayo.index',compact("patientrights"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('mayo.create');
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

            $patientright = new Mayo();
            $patientright->title_en = $request->title_en;
            $patientright->title_ar = $request->title_ar;
            $patientright->description_en = $request->description_en;
            $patientright->description_ar = $request->description_ar;
            $patientright->save();
            return redirect('admin/mayo')->with("message","mayo created")->with('alert-class', 'alert-success');
        }catch(Exception $e){
            return redirect('admin/mayo')->with("message",$e->getMessage())->with('alert-class', 'alert-danger');
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
        $patientright = Mayo::find($id);
        return view("mayo.edit",compact("patientright"));
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

            $patientright = Mayo::find($id);
            $patientright->title_en = $request->title_en;
            $patientright->title_ar = $request->title_ar;
            $patientright->description_en = $request->description_en;
            $patientright->description_ar = $request->description_ar;
            $patientright->save();
            return redirect('admin/mayo')->with("message","mayo Updated")->with('alert-class', 'alert-success');
        }catch(Exception $e){
            return redirect('admin/mayo')->with("message",$e->getMessage())->with('alert-class', 'alert-danger');
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
            $patientright = Mayo::find($id);
            $patientright->delete();
            return json_encode(array('status' => 1, 'message' => "mayo Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function deleteMultiple(Request $request)
    {
        try{
            $result = Mayo::whereIn('id', $request->ids)->delete();
            return json_encode(array('status' => 1, 'message' => "mayo Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function section(){
        return view ('mayo.section');
    }

    public function getSectionContent(Request $request){
      $helper = new Helpers();

        try{
            $content = Pagesection::where(["page"=>$request->page,"section"=>$request->section])->get()->first();
            // if(!empty($content->icon)){
            //     $content->icon = !empty($content->icon)?($helper->publicpath()."/images/section/".$content->icon):"";
            // }
            // if(!empty($content->icon_ar)){
            //     $content->icon_ar = !empty($content->icon)?($helper->publicpath()."/images/section/".$content->icon_ar):"";
            // }



            if($request->section == "video"){
              return view('layouts.video')->with('content',$content);
            }else if($request->section == "banner"){
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
                    $pageSection['media_id_en']= $mediaid;
                }

                if(!empty($request->icon_ar) && $request->icon_ar != null) {
                   $mediaid= $helper->getMediaID($request->icon_ar);
                    $pageSection['icon_ar']= $request->icon_ar;
                    $pageSection['media_id_ar']= $mediaid;
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
                    $pageSection['media_id_en']= $mediaid;
                }

                if(!empty($request->icon_ar) && $request->icon_ar != null) {
                   $mediaid= $helper->getMediaID($request->icon_ar);
                    $pageSection['icon_ar']= $request->icon_ar;
                    $pageSection['media_id_ar']= $mediaid;
                }

                $pageSection->save();
            }
            return json_encode(array("status" => 1, "message" => "Update Data Successfully"));
        }catch(Exception $e){
            return json_encode(array("status" => 0, "message" => $e->getMessage()));
        }
    }
}
