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
use App\Affiliate;
use App\Leadership;
use App\LeadershipMessage;

class LeadershipMessageController extends Controller implements PageInterface
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
      $templates = LeadershipMessage::get();


      return view('leadershipmessages.create', compact('templates'));

    }

   // save page and its details from this function
    public function store(Request $request)
    {


      $helper = new Helpers();
      $input = $request->all();
      $request['parent_title_en'] = trim($request['parent_title_en']);
      $request['parent_title_ar'] = trim($request['parent_title_ar']);
      $request['parent_description_en'] = trim($request['parent_description_en']);
      $request['parent_description_ar'] = trim($request['parent_description_ar']);
      $request['title_en'] = trim($request['title_en']);
      $request['title_ar'] = trim($request['title_ar']);
      $request['subtitle_en'] = trim($request['subtitle_en']);
      $request['subtitle_ar'] = trim($request['subtitle_ar']);
      $request['signature'] = trim($request['signature']);

      $this->validate($request,[
            'parent_title_en' => 'required',
            'parent_title_ar' => 'required',
            'parent_description_en' => 'required',
            'parent_description_ar' => 'required',
            'title_en' => 'required',
            'title_ar' => 'required',
            'subtitle_ar' => 'required',
            'subtitle_en' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            //'signature' => 'required',
            //'icon' => 'required',
        ]);

        $array = [
            'parent_title_en' => $request->get('parent_title_en'),
            'parent_title_ar' => $request->get('parent_title_ar'),
            'parent_description_en' => $request->get('parent_description_en'),
            'parent_description_ar' => $request->get('parent_description_ar'),
            'title_en' => $request->get('title_en'),
            'title_ar' => $request->get('title_ar'),
            'subtitle_ar' => $request->get('subtitle_ar'),
            'subtitle_en' => $request->get('subtitle_en'),
            'description_en' => $request->get('description_en'),
            'description_ar' => $request->get('description_ar'),
            'designation_en' => $request->get('designation_en'),
            'designation_ar' => $request->get('designation_ar'),
            'is_active' => $request->get('is_active'),
            'signature' => $request->get('signature'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        if(isset($request->id)) {
              $existingdata = LeadershipMessage::where('id',$request->id)->first();

              if(!empty($request->image1) && $request->image1 != null) {
                 $mediaid= $helper->getMediaID($request->image1);
                  $array['icon']= $request->image1;
                  $array['media_id']= $mediaid;
              }
            $result = LeadershipMessage::where('id', $request->id)->update($array);
            if($result) {
                Session::flash('message', 'Leadership updated successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to update Leadership!');
                Session::flash('alert-class', 'alert-danger');
            }
        } else {

            if(!empty($request->image1) && $request->image1 != null) {
               $mediaid= $helper->getMediaID($request->image1);
                $array['icon']= $request->image1;
                $array['media_id']= $mediaid;
            }
            $result =  LeadershipMessage::create($array);
            if($result) {
                Session::flash('message', 'Leadership added successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to add Leadership!');
                Session::flash('alert-class', 'alert-danger');
            }
        }
        return redirect('leadershipmessages/listing');

    }

    /* Pages listing will get through this function */
    public function listing(Request $request)
    {
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record')); //Config::get('variable.page_per_record');
        session(['sort_by' => 'asc']); // set default sorting
        $pages = LeadershipMessage::select('id','parent_title_ar','parent_title_en','parent_description_ar','parent_description_en','title_en','title_ar','subtitle_ar','subtitle_en','signature','icon','created_at','media_id');
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
        return view('leadershipmessages.view', compact('pages'));

    }


    /*go to edit page from this function*/
    public function editPage($id) {
      $helper = new Helpers();
        $page = LeadershipMessage::where('id', $id)->first();
        $templates = LeadershipMessage::get();
        if(isset($id)) {
            $editmenu = LeadershipMessage::where('id', $id)->first();
            if(!empty($editmenu)){
                $editmenu->icon = !empty($editmenu->icon)?($helper->publicpath()."/images/leaderships/".$editmenu->icon):"";
            }
        }else{
            $editmenu = [];
        }
        return view('leadershipmessages.create', compact('page', 'templates','editmenu'));
    }

    /*delete multiple pages*/

    public function deleteMultiplePages(Request $request) {

        $result = LeadershipMessage::whereIn('id', $request->ids)->delete();

        if($result) {
			$message 		= "Leadership(s) deleted successfully";
            $returnStatus 	= 1;

        } else {
			$message 		= "Unable to delete Leadership(s)";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }


    /* delete single page from this function */
    public function deleteSinglePage(Request $request)
    {
        $page = \App\LeadershipMessage::find($request->id);
        $result = $page->delete();

        if($result) {
			         $message= "Leadership deleted successfully";
            $returnStatus 	= 1;

        } else {
			$message 		= "Unable to delete this Leadership";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }

}
