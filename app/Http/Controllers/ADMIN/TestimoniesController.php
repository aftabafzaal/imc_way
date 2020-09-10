<?php

namespace App\Http\Controllers\ADMIN;

use App\testimonies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use App\Http\Traits\CommonTrait;
use App\Http\Traits\UserTrait;
use App\Helpers;
use Session;
use App\Pagesection;
use Illuminate\Support\Facades\Auth;
class TestimoniesController extends Controller
{
    use CommonTrait, UserTrait;
    
      public function __construct()
          {

             $this->middleware(function ($request, $next) {
               $user= Auth::user();
               if($user->role_id == 2){
                  $path=  $request->path();
                  $checkroute= substr($path,0,18);
                  if($checkroute =="testimonials/edit/"){
                    $path="testimonials/edit/";
                  }
                  $helper = new Helpers();
                  if($path == "testimonials/listing"){
                    $route= "listing";
                  }else if($path=="testimonials/delete-single-page" || $path=="testimonials/delete-multiple-pages"){
                    $route="delete";
                  }else if($path=="testimonials/create" || $path=="testimonials/store"){
                    $route="create";
                  }else if($path=="testimonials/edit/" || $path=="testimonials/store"){
                    $route="edit";
                  }
                 $checkpermision= $helper->checkpermission($user,3,$route);
                    if($checkpermision != true){
                        if($request->ajax()){
                           $message 		= "You don't have permision to do this.";
                           $returnStatus 	= 0;
                             return response(json_encode(array('status' => $returnStatus, 'message' => $message)));
                         }else{
                           return  redirect('permission');
                         }
                    }else{
                      return $next($request);
                    }
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
    public function index()
    {
        //
        $Testimonies=testimonies::all();
        $order = testimonies::count();


        return view ('components.testimonies.index', compact('Testimonies','order'));
    }


    /*this function will redirect to create page section*/

           public function create()
           {
             $templates = testimonies::get();
                 $order = testimonies::count();
             return view('testimonials.create', compact('templates','order'));

           }

          // save page and its details from this function
           public function store(Request $request)
           {

             $helper = new Helpers();
             $input = $request->all();
             //dd($input);
             $request['name_en'] = trim($request['name_en']);
             $request['name_ar'] = trim($request['name_ar']);

               $this->validate($request,[
                 'name_en' => 'required',
                 'is_order' => 'required',
                  'is_active_home' => 'required',
                 'name_ar' => 'required',
                 'description_en' => 'required',
                 'description_ar' => 'required',
                 'testimony_en' => 'required',
                 'testimony_ar' => 'required',
                 //'video1' =>'mimes:mp4,mov,ogg',
               ]);

               $array = [
                 'name_en' => $request->get('name_en'),
                 'name_ar' => $request->get('name_ar'),
                 'is_active' => $request->get('is_active'),
                 'description_en' => $request->get('description_en'),
                 'description_ar' => $request->get('description_ar'),
                 'testimony_en' => $request->get('testimony_en'),
                 'testimony_ar' => $request->get('testimony_ar'),
                  'is_order' => $request->get('is_order'),
                  'is_active_home' => $request->get('is_active_home'),
                 'youtube_url'  => $request->get('youtube_url'),
                 'created_at' => date('Y-m-d H:i:s'),
                 'updated_at' => date('Y-m-d H:i:s'),
               ];


               if(isset($request->id)) {
                     $existingdata = testimonies::where('id',$request->id)->first();

                       if(!empty($request->video1) && $request->video1 != null) {
                          $mediaid= $helper->getMediaID($request->video1);
                           $array['video1']= $request->video1;
                           $array['media_id']= $mediaid;
                       }

                   $result = testimonies::where('id', $request->id)->update($array);
                   if($result) {
                       Session::flash('message', 'testimonies updated successfully');
                       Session::flash('alert-class', 'alert-success');
                   } else {
                       Session::flash('message', 'Unable to update testimonies!');
                       Session::flash('alert-class', 'alert-danger');
                   }
               } else {
                 if(!empty($request->video1) && $request->video1 != null) {
                    $mediaid= $helper->getMediaID($request->video1);
                     $array['video1']= $request->video1;
                     $array['media_id']= $mediaid;
                 }
                   $result =  testimonies::create($array);
                   if($result) {
                       Session::flash('message', 'testimonies added successfully');
                       Session::flash('alert-class', 'alert-success');
                   } else {
                       Session::flash('message', 'Unable to add testimonies!');
                       Session::flash('alert-class', 'alert-danger');
                   }
               }
               return redirect('testimonials/listing');

           }

           /* Pages listing will get through this function */
           public function listing(Request $request)
           {

               $per_page = (isset($request->recordvalue) ? $request->recordvalue :20); //Config::get('variable.page_per_record');
               session(['sort_by' => 'asc']); // set default sorting
               $pages = testimonies::select('id','testimony_en','testimony_ar','name_en','name_ar','description_en','description_ar','video1','created_at','youtube_url','is_order','is_active_home','media_id');
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
               return view('testimonials.view', compact('pages'));

           }


           /*go to edit page from this function*/
           public function editPage($id) {
             $helper = new Helpers();
               $page = testimonies::where('id', $id)->first();
               $templates = testimonies::get();
               if(isset($id)) {
                   $editmenu = testimonies::where('id', $id)->first();
                   // if(!empty($editmenu)){
                   //     $editmenu->video1 = !empty($editmenu->video1)?($helper->publicpath()."/images/testimonials/".$editmenu->video1):"";
                   // }
               }else{
                   $editmenu = [];
               }
                $order = testimonies::count();
               return view('testimonials.create', compact('page', 'templates','editmenu','order'));
           }

           /*delete multiple pages*/

           public function deleteMultiplePages(Request $request) {

               $result = testimonies::whereIn('id', $request->ids)->delete();

               if($result) {
       			$message 		= "testimonies(s) deleted successfully";
                   $returnStatus 	= 1;

               } else {
       			$message 		= "Unable to delete testimonies(s)";
       			$returnStatus 	= 0;
               }
               return json_encode(array('status' => $returnStatus, 'message' => $message));
           }


           /* delete single page from this function */
           public function deleteSinglePage(Request $request)
           {
               $page = \App\testimonies::find($request->id);
               $result = $page->delete();

               if($result) {
       			$message 		= "testimonies deleted successfully";
                   $returnStatus 	= 1;

               } else {
       			$message 		= "Unable to delete this testimonies";
       			$returnStatus 	= 0;
               }
               return json_encode(array('status' => $returnStatus, 'message' => $message));
           }

    public function section(){
        return view ('components.testimonies.section');
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
