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
use App\Topmenu;
use App\Middlemenu;
use App\Mainmenu;
use App\Footermenu;
use App\Contact;
use App\BottomFooter;
use App\HealthTip;
use App\Know_Imc;
use App\News;
use App\testimonies;
use App\Affiliate;
use App\Award;
use App\slider;
use App\Job;

class JobController extends Controller implements PageInterface
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
      $templates = Template::get();
      return view('jobs.create', compact('templates'));

    }

   // save page and its details from this function
    public function store(Request $request)

    {

        $this->validate($request,[
            'name_en' => 'required|max:1000',
            'name_ar' => 'required|max:1000',
        ],[
            'name_en.required' => 'Please enter name',
            'name_ar.required' => 'Please enter name'
        ]);

        if(isset($request->id)) {
            
       
              
          $array = [
              'name_en' => $request->get('name_en'),
              'name_ar' => $request->get('name_ar'),

          ];

            $result = Job::where('id', $request->id)->update($array);

            if($result) {
                Session::flash('message', 'Job updated successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to update page!');
                Session::flash('alert-class', 'alert-danger');
            }

        } else {
          $array = [
              'name_en' => $request->get('name_en'),
              'name_ar' => $request->get('name_ar'),

          ];

            $result =  Job::insertGetId($array);

            if($result) {
                Session::flash('message', 'Page added successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to add page!');
                Session::flash('alert-class', 'alert-danger');
            }
        }

        return redirect('jobs/listing');

    }

      public function showview($slug=null,$lang=null){
          $helper = new Helpers();
        $getHeaderFooter = $helper->getHeaderFooter();
        $getHeaderMenus =  $getHeaderFooter['header'];
        $getFooterMenus = $getHeaderFooter['footer'];

            $lang = $lang;




            $topmenu_1=Topmenu::where('order','1')->get();
            $topmenu_2=Topmenu::where('order','2')->get();
            $topmenu_3=Topmenu::where('order','3')->get();
            $topmenu_4=Topmenu::where('order','4')->get();


            //middlemenus
            $middlemenu_1=Middlemenu::where('order','1')->get();
            $middlemenu_2=Middlemenu::where('order','2')->get();
            $middlemenu_3=Middlemenu::where('order','3')->get();
            $middlemenu_4=Middlemenu::where('order','4')->get();
            $middlemenu_5=Middlemenu::where('order','5')->get();


            //main menu
            $Mainmenu_1=Mainmenu::where('order','1')->where('parent_id','0')->get();
            $Mainmenu_2=Mainmenu::where('order','2')->where('parent_id','0')->get();
            $Mainmenu_3=Mainmenu::where('order','3')->where('parent_id','0')->get();
            $Mainmenu_4=Mainmenu::where('order','4')->where('parent_id','0')->get();
            $Mainmenu_5=Mainmenu::where('order','5')->where('parent_id','0')->get();
            $Mainmenu_6=Mainmenu::where('order','6')->where('parent_id','0')->get();

            //submenu for Mainmenu
            $Mainmenu_1_sub=Mainmenu::where('order','1')->where('parent_id','!=','0')->get();
            $Mainmenu_2_sub=Mainmenu::where('order','2')->where('parent_id','!=','0')->get();
            $Mainmenu_3_sub=Mainmenu::where('order','3')->where('parent_id','!=','0')->get();
            $Mainmenu_4_sub=Mainmenu::where('order','4')->where('parent_id','!=','0')->get();
            $Mainmenu_5_sub=Mainmenu::where('order','5')->where('parent_id','!=','0')->get();
            $Mainmenu_6_sub=Mainmenu::where('order','6')->where('parent_id','!=','0')->get();


            //footer menu
            $footermenu_1=Footermenu::where('order','1')->where('parent_id','0')->get();
            $footermenu_2=Footermenu::where('order','2')->where('parent_id','0')->get();
            $footermenu_3=Footermenu::where('order','3')->where('parent_id','0')->get();

            //submenu for footer
            $footermenu_1_sub=Footermenu::where('order','1')->where('parent_id','!=','0')->get();
            $footermenu_2_sub=Footermenu::where('order','2')->where('parent_id','!=','0')->get();
            $footermenu_3_sub=Footermenu::where('order','3')->where('parent_id','!=','0')->get();


            //footer contact section
            /*$footerContact=Contact::all();
            dd($footerContact);*/

            $footerContact=Contact::where('id','1')->get();


            //Bootom footer copyright section

            $Bootomfooter=BottomFooter::where('id','1')->get();


            //HealthTip Section
            $HealthTip=HealthTip::all();

            //Know Imc section
            $Know_Imc=Know_Imc::all();

            //News and update section
            $News=News::all();

            //Testimonies section
            $testimonies= testimonies::all();

            //Awards section
            $Award=Award::all();

            //Affiliates Section
            $Affiliates=Affiliate::all();


            //slider section content
            $slider=slider::all();

            if(!empty($slug)){
              $getpage= Page::where('slug',$slug)->first();
              return view('gp.content', compact('getpage','getHeaderMenus', 'getFooterMenus', 'lang','topmenu_1','topmenu_2','topmenu_3','topmenu_4','middlemenu_1','middlemenu_2','middlemenu_3','middlemenu_4','middlemenu_5','Mainmenu_1','Mainmenu_2','Mainmenu_3','Mainmenu_4','Mainmenu_5','Mainmenu_6','footermenu_1','footermenu_2','footermenu_3','footerContact','Bootomfooter','Know_Imc','News','testimonies','Award','Affiliates','slider','footermenu_1_sub','footermenu_2_sub','footermenu_3_sub','Mainmenu_1_sub','Mainmenu_2_sub','Mainmenu_3_sub','Mainmenu_4_sub','Mainmenu_5_sub','Mainmenu_6_sub'));
            }
      }
    /* Pages listing will get through this function */
    public function listing(Request $request)
    {

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record')); //Config::get('variable.page_per_record');
        session(['sort_by' => 'asc']); // set default sorting
        $pages = Job::select('id', 'name_en', 'name_ar','created_at','updated_at');

        if(isset($request->q)) { // search by name

            $pages = $pages->where(function($query) use($request) {
               $query->where('name_en','LIKE','%'.$request->q."%");
            });
        }

        if(isset($request->sort_by)) {

            if($request->key == 'name') { // sort by name
                $pages = $pages->orderBy('name_en', $request->sort_by);
            }

            if($request->key == 'metadesc') { // sort by metadesc
                $pages = $pages->orderBy('meta_desc_en', $request->sort_by);
            }

            if($request->key == 'date') { // sort by date
                $pages = $pages->orderBy('created_at', $request->sort_by);
            }

            if($request->key == 'status') { // sort by status
                $pages = $pages->orderBy('status', $request->sort_by);
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


        return view('jobs.view', compact('pages'));

    }


    /*go to edit page from this function*/
    public function editPage($id) {

        $page = Job::select('id', 'name_en', 'name_ar', 'created_at','updated_at')->where('id', $id)->first();
        $templates = Template::get();
                return view('jobs.create', compact('page', 'templates'));
    }

    /*delete multiple pages*/

    public function deleteMultiplePages(Request $request) {

        $result = Job::whereIn('id', $request->ids)->delete();

        if($result) {
			$message 		= "Page(s) deleted successfully";
            $returnStatus 	= 1;

        } else {
			$message 		= "Unable to delete page(s)";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }


    /* delete single page from this function */
    public function deleteSinglePage(Request $request)
    {
        $page = \App\Job::find($request->id);
        $result = $page->delete();

        if($result) {
			$message 		= "Page deleted successfully";
            $returnStatus 	= 1;

        } else {
			$message 		= "Unable to delete this page";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }


     // this is the api use at the applciation
        public function getpage($type=null)
        {

           if($request['type'] ="1"){
              $slug= 'privacy-policy';
           }else if($request['type'] ="2"){
             $slug= 'contact-us';
            }else if($request['type'] ="3"){
              $slug= 'terms-and-conditions';
            }
            $getpage= Page::where('slug',$slug)->first();
             if(!empty($getpage)){
               $data['content_en']=$getpage['content_en'];
               $data['content_ar']=$getpage['content_ar'];
               $data['name_en']=$getpage['name_en'];
                $data['name_ar']=$getpage['name_ar'];
             }else{
               $data=[];
             }
              return response()->json(['status' => true,'message'=>'file uploaded successfully.','data'=>$data],200);
        }


}
