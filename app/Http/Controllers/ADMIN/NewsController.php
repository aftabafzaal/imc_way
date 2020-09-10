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
use App\Event;
use App\Pagesection;

class NewsController extends Controller implements PageInterface
{
    use CommonTrait, UserTrait;

    /*
    This controller includes page create, store, listing, editPage,
    deleteMultiplePages, deleteSinglePage  functions

    */

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
    /*this function will redirect to create page section*/

    public function create()
    {
      $templates = News::get();

      $order = News::count();

      return view('news.create', compact('templates','order'));

    }

   // save page and its details from this function
    public function store(Request $request)
    {

      $helper = new Helpers();
      $input = $request->all();

      $request['title_en'] = trim($request['title_en']);
      $request['title_ar'] = trim($request['title_ar']);
      $request['description_en'] = trim($request['description_en']);
      $request['description_ar'] = trim($request['description_ar']);


        $this->validate($request,[
            'title_en' => 'required|min:3',
            'title_ar' =>'required|min:3',
            'description_en' => 'required',
            'description_ar' => 'required',
            'date' => 'required',
            'is_order' => 'required',
            'icon' => 'mimes:jpeg,jpg,png,gif' //
        ],[
            'title_en.required' => 'Please enter title',
            'title_ar.required' => 'Please enter title',
            'description_en.required' => 'Please enter description',
            'description_ar.required' => 'Please enter description',
            'icon.required' => 'Please upload the icon',
            'date.required'=>'Please enter date',
            'is_order.required'=>'please enter the order',
        ]);
        $array = [
            'title_en' => $request->get('title_en'),
            'title_ar' => $request->get('title_ar'),
            'description_en' => $request->get('description_en'),
            'description_ar' => $request->get('description_ar'),
            'is_active' => $request->get('is_active'),
            'inner_title_en' => $request->get('inner_title_en'),
            'inner_title_ar' => $request->get('inner_title_ar'),
            'embed_url' => $request->get('embed_url'),
            //'slug_en' => str_slug( $request['title_en'],'-'),
            //'slug_ar' => str_slug( $request['title_en'],'-'),

            'slug_en' =>  $request->get('slug_en'),
            'slug_ar' =>  $request->get('slug_ar'),
            'is_order' => $request->get('is_order'),
            'date' =>date('Y-m-d', strtotime($request->get('date'))),
            'is_active_home' => $request->get('is_active_home'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if(isset($request->id)) {
              $existingdata = News::where('id',$request->id)->first();

              if(!empty($request->image1) && $request->image1 != null) {
                 $mediaid= $helper->getMediaID($request->image1);
                  $array['icon']= $request->image1;
                  $array['media_id']= $mediaid;
              }



            $result = News::where('id', $request->id)->update($array);
            if($result) {
                Session::flash('message', 'News updated successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to update News!');
                Session::flash('alert-class', 'alert-danger');
            }
        } else {
          if(!empty($request->image1) && $request->image1 != null) {
             $mediaid= $helper->getMediaID($request->image1);
              $array['icon']= $request->image1;
              $array['media_id']= $mediaid;
          }
            $result =  News::insertGetId($array);
            if($result) {
                Session::flash('message', 'News added successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to add News!');
                Session::flash('alert-class', 'alert-danger');
            }
        }
        return redirect('news/listing');

    }

    /* Pages listing will get through this function */
    public function listing(Request $request)
    {
       $helper = new Helpers();
        $all= News::get();
        foreach($all as $key=>$v){
         //News::where('id',$v->id)->update(['slug_en'=>str_slug($v['title_en'],'-'),  'slug_ar'=>$helper->make_slug($v['title_ar'],'-')    ]);
         //News::where('id',$v->id)->update(['slug_en'=>str_slug($v['title_en'],'-'), 'slug_ar'=>str_slug($v['title_en'],'-')  ]);

        }

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record')); //Config::get('variable.page_per_record');
        session(['sort_by' => 'asc']); // set default sorting
        $pages = News::select('id','title_en','icon','description_en','title_ar','description_ar','created_at','embed_url','inner_title_ar','inner_title_en','media_id');
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
        //$pages = $pages->where('id','!=','1');
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
        $order = News::count();

        return view('news.view', compact('pages','order'));

    }


    /*go to edit page from this function*/
    public function editPage($id) {
      $helper = new Helpers();
        $page = News::where('id', $id)->first();
        $templates = News::get();
        if(isset($id)) {
            $editmenu = News::where('id', $id)->first();
            if(!empty($editmenu)){
              //  $editmenu->icon = !empty($editmenu->icon)?($helper->publicpath()."/images/news/".$editmenu->icon):"";
            }
        }else{
            $editmenu = [];
        }
        $order = News::count();

        return view('news.create', compact('page', 'templates','editmenu','order'));
    }

    /*delete multiple pages*/

    public function deleteMultiplePages(Request $request) {

      $result = News::whereIn('id', $request->ids)->where('id','!=',1)->delete();
        if($result) {
			$message 		= "New(s) deleted successfully";
            $returnStatus 	= 1;

        } else {
			$message 		= "Unable to delete New(s)";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }


    /* delete single page from this function */
    public function deleteSinglePage(Request $request)
    {
        $page = \App\News::find($request->id);
        if($request->id == "1"){
          $message 		= "Unable to delete.One news should be there.";
          $returnStatus 	= 0;
        }
        $result = $page->delete();

        if($result) {
			$message 		= "News deleted successfully";
            $returnStatus 	= 1;

        } else {
			$message 		= "Unable to delete this New";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }


// update the news heading

public function heading_list(Request $request)
{

    $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
    session(['sort_by' => 'asc']);

    $menus =   Pagesection::where(["page"=>'news',"section"=>'section_1'])->first();

    $helper = new Helpers();

    $editmenu =  Pagesection::where(["page"=>'news',"section"=>'section_1'])->first();

    if(!empty($editmenu)) {
      $editmenu =  Pagesection::where(["page"=>'news',"section"=>'section_1'])->first();
         $pageid=[];
    }else{
        $editmenu = [];
        $pageid=[];
    }
      $allpages=Page::get();
     return view('news.headinglist', compact('menus','editmenu','allpages','pageid'));

}

// save and update menu and its details from this function
public function heading_create(Request $request)
{
    $helper = new Helpers();

    $input = $request->all();
    $request['title_en'] = trim($request['title_en']);
    $request['title_ar'] = trim($request['title_ar']);

    $this->validate($request,[
        'title_en' => 'required|max:500',
        'title_ar' => 'required|max:500',
        'description_ar' => 'required|max:2000',
        'description_en' => 'required|max:2000',
    ],[
       'title_en.required' => 'Please enter the News headline',
       'title_ar.required' => 'Please enter the News headline  in arabic',

   ]);


    $array = [
        'title_en' => $request->get('title_en'),
        'title_ar' => $request->get('title_ar'),
        'description_en' => $request->get('description_en'),
        'description_ar' => $request->get('description_ar'),
        'created_at' => date('Y-m-d H:i:s',time()),
        'updated_at' => date('Y-m-d H:i:s',time())
    ];


    $content = Pagesection::where(["page"=>'news',"section"=>'section_1'])->first();
    if($content){
        $pageSection = Pagesection::find($content->id);
        $pageSection->title_en = $request->title_en;
        $pageSection->title_ar = $request->title_ar;
        $pageSection->description_en = $request->description_en;
        $pageSection->description_ar = $request->description_ar;
        $pageSection->save();
    }else{
        $pageSection = new Pagesection;
        $pageSection->page = 'news';
        $pageSection->section = 'section_1';
        $pageSection->title_en = $request->title_en;
        $pageSection->title_ar = $request->title_ar;
        $pageSection->description_en = $request->description_en;
        $pageSection->description_ar = $request->description_ar;
        $pageSection->save();
    }
    Session::flash('message', 'News updated successfully');
    Session::flash('alert-class', 'alert-success');
        return redirect('heading/list');

}

public function serviceheading_list(Request $request)
{

    $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
    session(['sort_by' => 'asc']);

    $menus =   Pagesection::where(["page"=>'services',"section"=>'section_1'])->first();

    $helper = new Helpers();

    $editmenu =  Pagesection::where(["page"=>'services',"section"=>'section_1'])->first();

    if(!empty($editmenu)) {
      $editmenu =  Pagesection::where(["page"=>'services',"section"=>'section_1'])->first();
         $pageid=[];
    }else{
        $editmenu = [];
        $pageid=[];
    }
      $allpages=Page::get();
     return view('news.servicelist', compact('menus','editmenu','allpages','pageid'));

}

// save and update menu and its details from this function
public function serviceheading_create(Request $request)
{
    $helper = new Helpers();

    $input = $request->all();
    $request['title_en'] = trim($request['title_en']);
    $request['title_ar'] = trim($request['title_ar']);

    $this->validate($request,[
        'title_en' => 'required|max:500',
        'title_ar' => 'required|max:500',
        'description_ar' => 'required|max:2000',
        'description_en' => 'required|max:2000',
    ],[
       'title_en.required' => 'Please enter the News headline',
       'title_ar.required' => 'Please enter the News headline  in arabic',

   ]);


    $array = [
        'title_en' => $request->get('title_en'),
        'title_ar' => $request->get('title_ar'),
        'description_en' => $request->get('description_en'),
        'description_ar' => $request->get('description_ar'),
        'created_at' => date('Y-m-d H:i:s',time()),
        'updated_at' => date('Y-m-d H:i:s',time())
    ];


    $content = Pagesection::where(["page"=>'services',"section"=>'section_1'])->first();
    if($content){
        $pageSection = Pagesection::find($content->id);
        $pageSection->title_en = $request->title_en;
        $pageSection->title_ar = $request->title_ar;
        $pageSection->description_en = $request->description_en;
        $pageSection->description_ar = $request->description_ar;
        $pageSection->save();
    }else{
        $pageSection = new Pagesection;
        $pageSection->page = 'services';
        $pageSection->section = 'section_1';
        $pageSection->title_en = $request->title_en;
        $pageSection->title_ar = $request->title_ar;
        $pageSection->description_en = $request->description_en;
        $pageSection->description_ar = $request->description_ar;
        $pageSection->save();
    }
    Session::flash('message', 'Services updated successfully');
    Session::flash('alert-class', 'alert-success');
        return redirect('serviceheading/list');

}

// events


public function eventheading_list(Request $request)
{

    $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
    session(['sort_by' => 'asc']);

    $menus =   Pagesection::where(["page"=>'event',"section"=>'section_1'])->first();

    $helper = new Helpers();

    $editmenu =  Pagesection::where(["page"=>'event',"section"=>'section_1'])->first();

    if(!empty($editmenu)) {
      $editmenu =  Pagesection::where(["page"=>'event',"section"=>'section_1'])->first();
         $pageid=[];
    }else{
        $editmenu = [];
        $pageid=[];
    }
      $allpages=Page::get();
     return view('news.eventlist', compact('menus','editmenu','allpages','pageid'));

}

public function section(){
    return view ('news.section');
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
                $pageSection['icon']= $request->image1;
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
                $pageSection['icon']= $request->image1;
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
