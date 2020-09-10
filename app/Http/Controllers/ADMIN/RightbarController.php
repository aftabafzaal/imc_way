<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rightbar;
use Config;
use App\Commonfooter;
use Illuminate\Support\Facades\Auth;

class RightbarController extends Controller
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
        return view ('rightbar.section');
    }

    public function getSectionContent(Request $request){
        try{
            $content = Rightbar::where("section",$request->section)->get()->first();
            return json_encode(array("status" => 1, "message" => "Load Data Successfully", "content" => $content));
        }catch(Exception $e){
            return json_encode(array("status" => 0, "message" => $e->getMessage()));
        }
    }
    public function updateSectionContent(Request $request){
        try{
            $content = Rightbar::where("section",$request->section)->get()->first();
            if($content){
                $pageSection = Rightbar::find($content->id);
                $pageSection->title_en = $request->title_en;
                $pageSection->title_ar = $request->title_ar;
                $pageSection->link = $request->link;
                $pageSection->save();
            }else{
                $pageSection = new Rightbar;
                $pageSection->section = $request->section;
                $pageSection->title_en = $request->title_en;
                $pageSection->title_ar = $request->title_ar;
                $pageSection->link = $request->link;
                $pageSection->save();
            }
            return json_encode(array("status" => 1, "message" => "Update Data Successfully"));
        }catch(Exception $e){
            return json_encode(array("status" => 0, "message" => $e->getMessage()));
        }
    }



    public function finddoctorbottom(Request $request)
    {
      $content = Commonfooter::where("id",1)->get()->first();
        return view ('rightbar.commonfooter.section')->with('content',$content);
    }


      public function updatefinddoctorbottom(Request $request){
                   $content = Commonfooter::where("id",1)->get()->first();
                   $array = array(
                          'get_en'=>$request['get_en'],
                          'get_ar'=>$request['get_ar'],
                          'doc_en'=>$request['doc_en'],
                          'doc_ar'=>$request['doc_ar'],
                          'appointment_en'=>$request['appointment_en'],
                          'appointment_ar'=>$request['appointment_ar'],
                          'appointment_link'=>$request['appointment_link'],
                          'call_us'=>$request['call_us'],
                   );
                   Commonfooter::where('id',1)->update($array);
                return json_encode(array("status" => 1, "message" => "Update Data Successfully"));

        }



}
