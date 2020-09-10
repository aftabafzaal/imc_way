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

use App\HealthTip;
use App\News;
use App\Award;
use App\slider;

class SliderController extends Controller implements PageInterface
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
      $templates = slider::get();


      return view('sliders.create', compact('templates'));

    }

   // save page and its details from this function
    public function store(Request $request)
    {

      $helper = new Helpers();
      $input = $request->all();
      $request['name_en'] = trim($request['name_en']);
      $request['name_ar'] = trim($request['name_ar']);
        $this->validate($request,[
            'name_en' => 'required|min:3|max:250',
            //'name_ar' => 'required|min:3|max:250',
            'description_en' => 'required|max:2000',
            'description_ar' => 'required|max:2000',
            'photo1' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'bgcolor' => 'required'
        ],[
            'name_en.required' => 'Please enter title',
           // 'name_ar.required' => 'Please enter title',
            'photo1.required' => 'Please upload the icon',
            'bgcolor.required' => 'Please select background color'
        ]);

        $array = [
            'name_en' => $request->get('name_en'),
            'name_ar' => $request->get('name_ar'),
            'is_active' => $request->get('is_active'),
            'description_en' => $request->get('description_en'),
            'description_ar' => $request->get('description_ar'),
            'bgcolor' => $request->get('bgcolor'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'url' => $request->get('url'),
            'url_ar' => $request->get('url_ar'),
        ];



        if(isset($request->id)) {
              $existingdata = Slider::where('id',$request->id)->first();
              if(!empty($request->image1) && $request->image1 != null) {
                 $mediaid= $helper->getMediaID($request->image1);
                  $array['photo1']= $request->image1;
                  $array['media_id_en']= $mediaid;
              }
              if(!empty($request->photo_ar) && $request->photo_ar != null) {
                 $mediaid= $helper->getMediaID($request->photo_ar);
                  $array['photo_ar']= $request->photo_ar;
                  $array['media_id_ar']= $mediaid;
              }

            $result = slider::where('id', $request->id)->update($array);
            if($result) {
                Session::flash('message', 'Slider updated successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to update Slider!');
                Session::flash('alert-class', 'alert-danger');
            }
        } else {
          if(!empty($request->image1) && $request->image1 != null) {
             $mediaid= $helper->getMediaID($request->image1);
              $array['photo1']= $request->image1;
              $array['media_id_en']= $mediaid;
          }
          if(!empty($request->photo_ar) && $request->photo_ar != null) {
             $mediaid= $helper->getMediaID($request->photo_ar);
              $array['photo_ar']= $request->photo_ar;
              $array['media_id_ar']= $mediaid;
          }
            $result =  slider::insertGetId($array);
            if($result) {
                Session::flash('message', 'Slider added successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to add Slider!');
                Session::flash('alert-class', 'alert-danger');
            }
        }
        return redirect('sliders/listing');

    }

    /* Pages listing will get through this function */
    public function listing(Request $request)
    {

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record')); //Config::get('variable.page_per_record');
        session(['sort_by' => 'asc']); // set default sorting
        $pages = slider::select('id','name_en','name_ar','description_en','description_ar','photo1','created_at','media_id_ar','media_id_en');
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
        return view('sliders.view', compact('pages'));

    }


    /*go to edit page from this function*/
    public function editPage($id) {
      $helper = new Helpers();
        $page = slider::where('id', $id)->first();
        $templates = slider::get();
        if(isset($id)) {
            $editmenu = slider::where('id', $id)->first();
            // if(!empty($editmenu)){
            //     $editmenu->photo1 = !empty($editmenu->photo1)?($helper->publicpath()."/images/sliders/".$editmenu->photo1):"";
            //     $editmenu->photo_ar = !empty($editmenu->photo_ar)?($helper->publicpath()."/images/sliders/".$editmenu->photo_ar):"";
            // }
        }else{
            $editmenu = [];
        }


        return view('sliders.create', compact('page', 'templates','editmenu'));
    }

    /*delete multiple pages*/

    public function deleteMultiplePages(Request $request) {

        $result = slider::whereIn('id', $request->ids)->delete();

        if($result) {
			$message 		= "slider(s) deleted successfully";
            $returnStatus 	= 1;

        } else {
			$message 		= "Unable to delete slider(s)";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }


    /* delete single page from this function */
    public function deleteSinglePage(Request $request)
    {
        $page = \App\slider::find($request->id);
        $result = $page->delete();

        if($result) {
			$message 		= "slider deleted successfully";
            $returnStatus 	= 1;

        } else {
			$message 		= "Unable to delete this slider";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }

}
