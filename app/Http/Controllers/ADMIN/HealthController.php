<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use App\Page;
use App\Template;
use Config;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Lcobucci\JWT\Parser;
use Mail;
use Response;
use App\Interfaces\PageInterface;
use App\Http\Traits\CommonTrait;
use App\Http\Traits\UserTrait;
use Session;
use App\Helpers;
use App\Pagesection;

use App\HealthTip;
use App\HealthCategory;
class HealthController extends Controller implements PageInterface
{
    use CommonTrait, UserTrait;
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
    /*
    This controller includes page create, store, listing, editPage,
    deleteMultiplePages, deleteSinglePage  functions

    */


    /*this function will redirect to create page section*/

    public function create()
    {

      $templates = HealthTip::get();
      $parentcat= HealthCategory::where('parent_id','0')->get();
      $subcat= HealthCategory::where('parent_id','!=','0')->get();
      return view('healthtips.create', compact('templates','parentcat','subcat'));
    }

   // save page and its details from this function
    public function store(Request $request)
    {

      $helper = new Helpers();
      $input = $request->all();
      $request['title_en'] = trim($request['title_en']);
      $request['title_ar'] = trim($request['title_ar']);
      $request['subtitle_en'] = trim($request['subtitle_en']);
      $request['subtitle_ar'] = trim($request['subtitle_ar']);
      $request['description_en'] = trim($request['description_en']);
      $request['description_ar'] = trim($request['description_ar']);
    //  $request['icon'] =  trim($request['icon']);
    //  $request['slug_en'] = str_slug( $request['title_en'],'-');
      //$request['slug_ar'] = str_slug( $request['title_en'],'-');

      $request['slug_en'] =  $request['slug_en'];
      $request['slug_ar'] = $request['slug_ar'];
        $this->validate($request,[
            'title_en' =>  'required',
            'title_ar' => 'required',
          //  'subtitle_en' => 'required',
            //'subtitle_ar' => 'required',
          //  'description_en' => 'required',
            //'description_ar' => 'required',
        ],[
            'title_en.required' => 'Please enter title',
            'title_ar.required' => 'Please enter title',

        ]);

        $array = [
            'title_en' => $request->get('title_en'),
            'title_ar' => $request->get('title_ar'),
            'subtitle_en' => $request->get('subtitle_en'),
            'subtitle_ar' => $request->get('subtitle_ar'),
            'description_en' => $request->get('description_en'),
            'description_ar' => $request->get('description_ar'),
            'is_active' => $request->get('is_active'),
             'youtube_url'  => $request->get('youtube_url'),
             'category_id'  => (int)$request->get('category_id'),
             'subcategory_id'  => (int)$request->get('subcategory_id'),
            'icon' => $request->get('icon'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'slug_en' =>$request['slug_en'],
            'slug_ar'  =>$request['slug_ar'],

        ];

        if(isset($request->id)) {
              $existingdata = HealthTip::where('id',$request->id)->first();

              // if(!empty($request->image1) && $request->image1 != null) {
              //
              //     copy(base_path('/media/'.$request->image1),base_path('images/healthtips/'.$request->image1));
              //
              //    $array['icon'] = $request->image1;
              // }

            if(!empty($request->image1) && $request->image1 != null) {
               $mediaid= $helper->getMediaID($request->image1);
               $array['icon']= $request->image1;
               $array['media_id'] = $mediaid;
            }

            $result = HealthTip::where('id', $request->id)->update($array);
            if($result) {
                Session::flash('message', 'Tips updated successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to update tipe!');
                Session::flash('alert-class', 'alert-danger');
            }
        } else {
          if(!empty($request->image1) && $request->image1 != null) {
             $mediaid= $helper->getMediaID($request->image1);
             $array['icon']= $request->image1;
             $array['media_id'] = $mediaid;
          }
            $result =  HealthTip::insertGetID($array);
            if($result) {
                Session::flash('message', 'Tips added successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to add Tips!');
                Session::flash('alert-class', 'alert-danger');
            }
        }
        return redirect('health/listing');

    }

    /* Pages listing will get through this function */
    public function listing(Request $request)
    {
      $helper = new Helpers();

      $all= HealthTip::get();
      foreach($all as $key=>$v){
       // HealthTip::where('id',$v->id)->update(['slug_en'=>str_slug($v['title_en'],'-'),'slug_ar'=>$helper->make_slug($v['title_ar'],'-') ]);
         //HealthTip::where('id',$v->id)->update(['slug_en'=>str_slug($v['title_en'],'-'),'slug_ar'=>str_slug($v['title_en'],'-') ]);
      }

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record')); //Config::get('variable.page_per_record');
        session(['sort_by' => 'asc']); // set default sorting
        $pages = HealthTip::select('id','title_en','icon','subtitle_en','description_en','title_ar','subtitle_ar','description_ar','created_at');
        if(isset($request->q)) { // search by name
            $pages = $pages->where(function($query) use($request) {
               $query->where('title_en','LIKE','%'.$request->q."%");
            });
        }

        if(isset($request->sort_by)) {

            if($request->key == 'title') { // sort by name
                $pages = $pages->orderBy('title_en', $request->sort_by);
            }

            if($request->key == 'date') { // sort by date
                $pages = $pages->orderBy('created_at', $request->sort_by);
            }

            if($request->key == 'description') { // sort by status
                $pages = $pages->orderBy('description_en', $request->sort_by);
            }

        } else {
            $pages = $pages->orderBy('id', 'desc');

        }
        $pages = $pages->paginate($per_page);

        // append search params
        if(isset($request->q)) {
           $pages = $pages->appends(['q' => $request->q]);  /*keywords will append to url using append*/
           session(['q' => $request->q]);
        } else {
           session()->forget('q');
        }

        // append sort_by params
        if(isset($request->sort_by)) {
            $pages = $pages->appends(['key' => $request->key, 'sort_by' => $request->sort_by]);
            session(['key' => $request->key, 'sort_by' =>( $request->sort_by == 'asc') ? 'desc' : 'asc']);
        }

         // append recordvalue params
         if(isset($request->recordvalue)) {
            $pages = $pages->appends(['recordvalue' => $request->recordvalue]);
            session(['recordvalue' => $request->recordvalue]);
        } else {
            session()->forget('recordvalue');
        }
        return view('healthtips.view', compact('pages'));

    }


    /*go to edit page from this function*/
    public function editPage($id) {
      $helper = new Helpers();
        $page = HealthTip::where('id', $id)->first();
        $templates = HealthTip::get();
        $parentcat= HealthCategory::where('parent_id','0')->get();
        $subcat= HealthCategory::where('parent_id','!=','0')->get();
        if(isset($id)) {
            $editmenu = HealthTip::where('id', $id)->first();
            // if(!empty($editmenu)){
            //     $editmenu->icon = !empty($editmenu->icon)?($helper->publicpath()."/images/healthtips/".$editmenu->icon):"";
            // }
        }else{
            $editmenu = [];
        }
        return view('healthtips.create', compact('page', 'templates','editmenu','parentcat','subcat'));
    }

    /*delete multiple pages*/

    public function deleteMultiplePages(Request $request) {

        $result = HealthTip::whereIn('id', $request->ids)->delete();

        if($result) {
			$message 		= "Tips(s) deleted successfully";
            $returnStatus 	= 1;

        } else {
			$message 		= "Unable to delete Tip(s)";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }


    /* delete single page from this function */
    public function deleteSinglePage(Request $request)
    {
        $page = \App\HealthTip::find($request->id);
        $result = $page->delete();

        if($result) {
			$message 		= "Tip deleted successfully";
            $returnStatus 	= 1;

        } else {
			$message 		= "Unable to delete this tip";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }



    public function healthlist(){
      dd("sdfsdf");
      localStorage.setItem("language", "en");
      localStorage.getItem("language"); // Retrieving value "laravel-nepal" using key "name"
      dd("SDfsdf");
    }
    public function section(){
        return view ('healthtips.section');
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
            }else if($request->section == "section_1"){
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
               
                if(!empty($request->image1)) {
                    if(!empty($request->image1) && $request->image1 != null) {
                       $mediaid= $helper->getMediaID($request->image1);
                       $pageSection['icon']= $request->image1;
                       $pageSection['media_id_en'] = $mediaid;
                    }
              }

              if(!empty($request->image1)) {
                    if(!empty($request->image1) && $request->image1 != null) {
                       $mediaid= $helper->getMediaID($request->image1);
                       $pageSection['icon_ar']= $request->image1;
                       $pageSection['media_id_ar'] = $mediaid;
                    }
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
                 if(!empty($request->image1)) {
                    if(!empty($request->image1) && $request->image1 != null) {
                       $mediaid= $helper->getMediaID($request->image1);
                       $pageSection['icon']= $request->image1;
                       $pageSection['media_id_en'] = $mediaid;
                    }
              }

              if(!empty($request->image1)) {
                    if(!empty($request->image1) && $request->image1 != null) {
                       $mediaid= $helper->getMediaID($request->image1);
                       $pageSection['icon_ar']= $request->image1;
                       $pageSection['media_id_ar'] = $mediaid;
                    }
              }
                $pageSection->save();
            }
            return json_encode(array("status" => 1, "message" => "Update Data Successfully"));
        }catch(Exception $e){
            return json_encode(array("status" => 0, "message" => $e->getMessage()));
        }
    }

}
