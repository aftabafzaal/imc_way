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
class PageController extends Controller implements PageInterface
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
      return view('pages.create', compact('templates'));

    }

   // save page and its details from this function
    public function store(Request $request)

    {
       //cars = 2 means image 
       // cares = 3 //means slider
         $this->validate($request,[
            'name_en' => 'required|max:50',
            'name_ar' => 'required|max:50',
            // 'google_analytics' => 'required',
        ]);

        if(isset($request->id)) {
            
              $pagedata = Page::where('id', $request->id)->first();
              if(!empty($request->get('image1')) || $request->get('image1') != null){
                   $image =  $request->get('image1');
              }else{
                   $image = $pagedata['image1'];
              }
              if($pagedata->is_change_slug == "Yes"){
                     $array = [
              'name_en' => $request->get('name_en'),
              'name_ar' => $request->get('name_ar'),
              'page_title_en' => $request->get('page_title_en'),
              'page_title_ar' => $request->get('page_title_ar'),
              'slug' => $request->get('slug'),
              'slug_ar' => $request->get('slug_ar'),
              'google_analytics' => $request->get('google_analytics'),
              'meta_title_en' => $request->get('meta_title_en'),
              'meta_title_ar' => $request->get('meta_title_ar'),
              'meta_desc_en' => $request->get('meta_desc_en'),
              'meta_desc_ar' => $request->get('meta_desc_ar'),
              'meta_keyword_en' => $request->get('meta_keyword_en'),
              'meta_keyword_ar' => $request->get('meta_keyword_ar'),
              'content_en' => $request->get('content_en'),
               'image1' => $image,
              'content_ar' => $request->get('content_ar'),
              'author' => $request->get('author'),
               'slideren' => $request->get('slideren'),
              'sliderAr' => $request->get('sliderAr'),
              'created_at' => time(),
              'updated_at' => time(),

          ];
              }else{
                     $array = [
              'name_en' => $request->get('name_en'),
              'name_ar' => $request->get('name_ar'),
              'page_title_en' => $request->get('page_title_en'),
              'page_title_ar' => $request->get('page_title_ar'),
              'google_analytics' => $request->get('google_analytics'),
              'meta_title_en' => $request->get('meta_title_en'),
              'meta_title_ar' => $request->get('meta_title_ar'),
              'meta_desc_en' => $request->get('meta_desc_en'),
              'meta_desc_ar' => $request->get('meta_desc_ar'),
              'meta_keyword_en' => $request->get('meta_keyword_en'),
              'meta_keyword_ar' => $request->get('meta_keyword_ar'),
              'content_en' => $request->get('content_en'),
               'image1' => $image,
              'content_ar' => $request->get('content_ar'),
              'author' => $request->get('author'),
               'slideren' => $request->get('slideren'),
              'sliderAr' => $request->get('sliderAr'),
              'created_at' => time(),
              'updated_at' => time(),

          ];
              }

         $result = Page::where('id', $request->id)->update($array);
                 if($request->cars == "2"){
                             $result = Page::where('id', $request->id)->update(['sliderAr'=>null,'slideren'=>null]);
                        }else if($request->cars == "3"){
                             $result = Page::where('id', $request->id)->update(['image1'=>null,]);
                        }
        
            if($result) {
                Session::flash('message', 'Page updated successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Page updated successfully');
                Session::flash('alert-class', 'alert-success');
            }

        } else {
          $array = [
              'name_en' => $request->get('name_en'),
              'name_ar' => $request->get('name_ar'),
              'page_title_en' => $request->get('page_title_en'),
              'page_title_ar' => $request->get('page_title_ar'),
              'slug' => $request->get('slug'),
              'slug_ar' => $request->get('slug_ar'),
              'google_analytics' => $request->get('google_analytics'),
              'meta_title_en' => $request->get('meta_title_en'),
              'meta_title_ar' => $request->get('meta_title_ar'),
              'meta_desc_en' => $request->get('meta_desc_en'),
              'meta_desc_ar' => $request->get('meta_desc_ar'),
              'image1' => $request->get('image1'),
              'meta_keyword_en' => $request->get('meta_keyword_en'),
              'meta_keyword_ar' => $request->get('meta_keyword_ar'),
             // 'slug' => str_slug($request->get('name_en'), '-'),
              'content_en' => $request->get('content_en'),
              'content_ar' => $request->get('content_ar'),
              'author' => $request->get('author'),
              'slideren' => $request->get('slideren'),
              'sliderAr' => $request->get('sliderAr'),
              'created_at' => time(),
              'updated_at' => time(),

          ];

            $result =  Page::insertGetId($array);

            if($result) {
                Session::flash('message', 'Page added successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Page updated successfully');
                Session::flash('alert-class', 'alert-success');
            }
        }

        return redirect('pages/listing');

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
        $pages = Page::select('id', 'name_en', 'name_ar', 'meta_title_en', 'meta_title_ar', 'meta_desc_en', 'meta_desc_ar', 'meta_keyword_en' ,'meta_keyword_ar', 'slug',
        'content_en', 'content_ar', 'status', 'created_at','author','image1','slug_ar','google_analytics','is_change_slug','page_title_en','page_title_ar','slideren','sliderAr');

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


        return view('pages.view', compact('pages'));

    }


    /*go to edit page from this function*/
    public function editPage($id) {

        $page = Page::select('id', 'name_en', 'name_ar', 'meta_title_en', 'meta_title_ar', 'meta_desc_en', 'meta_desc_ar', 'meta_keyword_en' ,'meta_keyword_ar', 'slug',
        'content_en', 'content_ar', 'status', 'created_at','author','image1','slug_ar','google_analytics','is_change_slug','page_title_en','page_title_ar','slideren','sliderAr')->where('id', $id)->first();
        $templates = Template::get();
        

        return view('pages.create', compact('page', 'templates'));
    }

    /*delete multiple pages*/

    public function deleteMultiplePages(Request $request) {

        $result = Page::whereIn('id', $request->ids)->delete();

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
        $page = \App\Page::find($request->id);
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
                  $data['slideren']=$getpage['slideren'];
                                    $data['sliderAr']=$getpage['sliderAr'];

             }else{
               $data=[];
             }
              return response()->json(['status' => true,'message'=>'file uploaded successfully.','data'=>$data],200);
        }


}
