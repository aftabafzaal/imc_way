<?php

namespace App\Http\Controllers\ADMIN;

use App\Know_Imc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use App\Http\Traits\CommonTrait;
use App\Http\Traits\UserTrait;
use App\Helpers;
use Session;
use Illuminate\Support\Facades\Auth;

class KnowImcController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $knowImc=Know_Imc::all();

        return view ('components.knowImc.index' ,compact('knowImc'));
    }

    /*this function will redirect to create page section*/

    public function create()
    {
      $templates = Know_Imc::get();

      return view('knowimcs.create', compact('templates'));

    }

   // save page and its details from this function
    public function store(Request $request)
    {

      $helper = new Helpers();
      $input = $request->all();

      $request['knowdescription_en'] = trim($request['knowdescription_en']);
      $request['knowdescription_ar'] = trim($request['knowdescription_ar']);
        $this->validate($request,[
          'knowdescription_en' => 'required',
          'knowdescription_ar' => 'required',
        //  'photo1' => 'image|mimes:jpeg,png,jpg,gif,svg',
        //'video1' =>'mimes:mp4,mov,ogg',
        ]);

        $array = [
            'knowdescription_en' => $request->get('knowdescription_en'),
            'knowdescription_ar' => $request->get('knowdescription_ar'),
            'is_active' => $request->get('is_active'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if(isset($request->id)) {
              $existingdata = Know_Imc::where('id',$request->id)->first();
              if(!empty($request->video1) && $request->video1 != null) {
                 $mediaid= $helper->getMediaID($request->video1);
                  $array['video1']= $request->video1;
                  $array['media_id_video']= $mediaid;
              }
              if(!empty($request->image1) && $request->image1 != null) {
                 $mediaid= $helper->getMediaID($request->image1);
                  $array['photo1']= $request->image1;
                  $array['media_id_photo']= $mediaid;
              }
            $result = Know_Imc::where('id', $request->id)->update($array);
            if($result) {
                Session::flash('message', 'Know_Imc updated successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to update Know_Imc!');
                Session::flash('alert-class', 'alert-danger');
            }
        } else {
          if(!empty($request->video1) && $request->video1 != null) {
             $mediaid= $helper->getMediaID($request->video1);
              $array['video1']= $request->video1;
              $array['media_id_video']= $mediaid;
          }
          if(!empty($request->image1) && $request->image1 != null) {
             $mediaid= $helper->getMediaID($request->image1);
              $array['photo1']= $request->image1;
              $array['media_id_photo']= $mediaid;
          }
            $result =  Know_Imc::insertGetId($array);
            if($result) {
                Session::flash('message', 'Know_Imc added successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to add Know_Imc!');
                Session::flash('alert-class', 'alert-danger');
            }
        }
        return redirect('knowimcs/listing');

    }

    /* Pages listing will get through this function */
    public function listing(Request $request)
    {

        $per_page = (isset($request->recordvalue) ? $request->recordvalue :20); //Config::get('variable.page_per_record');
        session(['sort_by' => 'asc']); // set default sorting
        $pages = Know_Imc::select('id','knowdescription_en','knowdescription_ar','video1','photo1','created_at','media_id_video','media_id_photo');
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
        return view('knowimcs.view', compact('pages'));

    }


    /*go to edit page from this function*/
    public function editPage($id) {
      $helper = new Helpers();
        $page = Know_Imc::where('id', $id)->first();
        $templates = Know_Imc::get();
        if(isset($id)) {
            $editmenu = Know_Imc::where('id', $id)->first();
            if(!empty($editmenu)){
               //$editmenu->video1 = !empty($editmenu->video1)?($helper->publicpath()."/images/knowimc/videos/".$editmenu->video1):"";
               //$editmenu->photo1 = !empty($editmenu->photo1)?($helper->publicpath()."/images/knowimc/".$editmenu->photo1):"";
            }
        }else{
            $editmenu = [];
        }
        return view('knowimcs.create', compact('page', 'templates','editmenu'));
    }

    /*delete multiple pages*/

    public function deleteMultiplePages(Request $request) {

        $result = Know_Imc::whereIn('id', $request->ids)->delete();

        if($result) {
      $message 		= "Know_Imc(s) deleted successfully";
            $returnStatus 	= 1;

        } else {
      $message 		= "Unable to delete Know_Imc(s)";
      $returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }


    /* delete single page from this function */
    public function deleteSinglePage(Request $request)
    {
        $page = \App\Know_Imc::find($request->id);
        $result = $page->delete();

        if($result) {
      $message 		= "Know_Imc deleted successfully";
            $returnStatus 	= 1;

        } else {
      $message 		= "Unable to delete this Know_Imc";
      $returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }



}
