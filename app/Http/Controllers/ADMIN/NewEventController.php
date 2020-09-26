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
use App\Eventcourse;
use App\Eventspeaker;
use App\Eventbanner;
use App\Eventsbanner;


class NewEventController extends Controller implements PageInterface
{
    use CommonTrait, UserTrait;

    /*
    This controller includes page create, store, listing, editPage,
    deleteMultiplePages, deleteSinglePage  functions

    */


    /*this function will redirect to create page section*/

    public function create()
    {

      $templates = Event::get();
      return view('events.create', compact('templates'));

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

        if(isset($request->id)){
            $this->validate($request,[
                'title_en' => 'required|min:3|max:255',
                'title_ar' =>'required|min:3|max:255',
                'description_en' => 'required',
                'description_ar' => 'required',
                'event_start_date' => 'required',
                'event_start_time' => 'required',
                'event_end_date' => 'required',
                'event_end_time' => 'required',
                'address_en' => 'required',
                'address_ar' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'image1' => 'required',
            ],[
                'title_en.required' => 'Please enter title',
                'title_ar.required' => 'Please enter title',
                'description_en.required' => 'Please enter description',
                'description_ar.required' => 'Please enter description',
                'event_start_date' => 'Please enter start date',
                'event_start_time' => 'Please enter start time',
                'event_end_date' => 'Please enter end date',
                'event_end_time' => 'Please enter end time',
                'address_en' => 'Please enter address',
                'address_ar' => 'Please enter address',
                'email' => 'Please enter email',
                'phone' => 'Please enter phone',
                'image1.required' => 'Please upload the icon',
            ]);
        }else{
            $this->validate($request,[
                'title_en' => 'required|min:3|max:255',
                'title_ar' =>'required|min:3|max:255',
                'description_en' => 'required',
                'description_ar' => 'required',
                'event_start_date' => 'required',
                'event_start_time' => 'required',
                'event_end_date' => 'required',
                'event_end_time' => 'required',
                'address_en' => 'required',
                'address_ar' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ],[
                'title_en.required' => 'Please enter title',
                'title_ar.required' => 'Please enter title',
                'description_en.required' => 'Please enter description',
                'description_ar.required' => 'Please enter description',
                'event_start_date' => 'Please enter start date',
                'event_start_time' => 'Please enter start time',
                'event_end_date' => 'Please enter end date',
                'event_end_time' => 'Please enter end time',
                'address_en' => 'Please enter address',
                'address_ar' => 'Please enter address',
                'email' => 'Please enter email',
                'phone' => 'Please enter phone',
            ]);
        }
        

        $array = [
            'title_en' => $request->get('title_en'),
            'title_ar' => $request->get('title_ar'),
            'description_en' => $request->get('description_en'),
            'description_ar' => $request->get('description_ar'),
            'event_start_date' => date("Y-m-d",strtotime($request->get('event_start_date'))),
            'event_end_date' => date("Y-m-d",strtotime($request->get('event_end_date'))),
            'event_start_time' => date("H:i:s",strtotime($request->get('event_start_time'))),
            'event_end_time' => date("H:i:s",strtotime($request->get('event_end_time'))),
            'address_en' => $request->get('address_en'),
            'address_ar' => $request->get('address_ar'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'content_en' => $request->get('content_en'),
            'content_ar' => $request->get('content_ar'),
            'attend_en' => $request->get('attend_en'),
            'attend_ar' => $request->get('attend_ar'),
            'register_link' => $request->get('register_link'),
            'contact_en' => $request->get('contact_en'),
            'contact_ar' => $request->get('contact_ar'),
            'is_active' => $request->get('is_active'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if(isset($request->id)) {
              $existingdata = Event::where('id',$request->id)->first();
              if(!empty($request->image1)) {
                copy(base_path('/media/'.$request->image1),base_path('images/events/'.$request->image1));
                 copy(base_path('/media/'.$request->image1),env('BASE_AR_PATH').'images/events/'.$request->image1);                
                $array['image1'] = $request->image1;
              }

            $result = Event::where('id', $request->id)->update($array);

            // courses
               if(count($request->courses)>0){
                    Eventcourse::where("event_id",$request->id)->delete();
                    foreach($request->courses as $course){
                        $newCourse = new Eventcourse();
                        $newCourse->event_id = $request->id;
                        $newCourse->name_en = $course["name_en"];
                        $newCourse->name_ar = $course["name_ar"];
                        $newCourse->amount = $course["amount"];
                        $newCourse->vat = $course["vat"];
                        $newCourse->save();
                    } 
               }              

            // speakers  

            if(count($request->speakers)>0){
                    Eventspeaker::where("event_id",$request->id)->delete();
                    foreach($request->speakers as $speaker){
                        $newSpeaker = new Eventspeaker();
                        $newSpeaker->event_id = $request->id;
                        $newSpeaker->name_en = $speaker["name_en"];
                        $newSpeaker->name_ar = $speaker["name_ar"];
                        $newSpeaker->title_en = $speaker["title_en"];
                        $newSpeaker->title_ar = $speaker["title_ar"];
                        $newSpeaker->bio_en = $speaker["bio_en"];
                        $newSpeaker->bio_ar = $speaker["bio_ar"];
                        $newSpeaker->facebook = $speaker["facebook"];
                        $newSpeaker->twitter = $speaker["twitter"];
                        $newSpeaker->instagram = $speaker["instagram"];
                        $newSpeaker->youtube = $speaker["youtube"];
                        if(!empty($speaker["image"])) {
                            copy(base_path('/media/'.$speaker["image"]),base_path('images/events/speaker/'.$speaker["image"]));    
                            copy(base_path('/media/'.$speaker["image"]),env('BASE_AR_PATH').'images/events/speaker/'.$speaker["image"]);              
                            $newSpeaker->image = $speaker["image"];
                        }
                        $newSpeaker->save();
                    } 
            } 

            // banners  

            if(count($request->banners)>0){
                    Eventbanner::where("event_id",$request->id)->delete();
                    foreach($request->banners as $banner){
                        $newBanner = new Eventbanner();
                        $newBanner->event_id = $request->id;
                        $newBanner->title = $banner["title"];
                        $newBanner->link = $banner["link"];                        
                        if(!empty($banner["image"])) {
                            copy(base_path('/media/'.$banner["image"]),base_path('images/events/banner/'.$banner["image"])); 
                            copy(base_path('/media/'.$banner["image"]),env('BASE_AR_PATH').'images/events/banner/'.$banner["image"]);               
                            $newBanner->image = $banner["image"];
                        }
                        $newBanner->save();
                    } 
            } 

            if($result) {
                Session::flash('message', 'Event updated successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to update Event!');
                Session::flash('alert-class', 'alert-danger');
            }
        } else {

            if(!empty($request->image1)) {
                copy(base_path('/media/'.$request->image1),base_path('images/events/'.$request->image1));
                copy(base_path('/media/'.$request->image1),env('BASE_AR_PATH').'images/events/'.$request->image1);                 
                $array['image1'] = $request->image1;
            }
            $result =  Event::create($array);

            // courses
               if(count($request->courses)>0){                    
                    foreach($request->courses as $course){
                        $newCourse = new Eventcourse();
                        $newCourse->event_id = $result->id;
                        $newCourse->name_en = $course["name_en"];
                        $newCourse->name_ar = $course["name_ar"];
                        $newCourse->amount = $course["amount"];
                        $newCourse->vat = $course["vat"];
                        $newCourse->save();
                    } 
               }              

            // speakers  

            if(count($request->speakers)>0){                    
                    foreach($request->speakers as $speaker){
                        $newSpeaker = new Eventspeaker();
                        $newSpeaker->event_id = $result->id;
                        $newSpeaker->name_en = $speaker["name_en"];
                        $newSpeaker->name_ar = $speaker["name_ar"];
                        $newSpeaker->title_en = $speaker["title_en"];
                        $newSpeaker->title_ar = $speaker["title_ar"];
                        $newSpeaker->bio_en = $speaker["bio_en"];
                        $newSpeaker->bio_ar = $speaker["bio_ar"];
                        $newSpeaker->facebook = $speaker["facebook"];
                        $newSpeaker->twitter = $speaker["twitter"];
                        $newSpeaker->instagram = $speaker["instagram"];
                        $newSpeaker->youtube = $speaker["youtube"];
                        if(!empty($speaker["image"])) {
                            copy(base_path('/media/'.$speaker["image"]),base_path('images/events/speaker/'.$speaker["image"])); 
                                 copy(base_path('/media/'.$request->image1),env('BASE_AR_PATH').'images/events/speaker'.$request->image1);               
                            $newSpeaker->image = $speaker["image"];
                        }
                        $newSpeaker->save();
                    } 
            }

            // banners  

            if(count($request->banners)>0){                    
                    foreach($request->banners as $banner){
                        $newBanner = new Eventbanner();
                        $newBanner->event_id = $result->id;
                        $newBanner->title = $banner["title"];
                        $newBanner->link = $banner["link"];                        
                        if(!empty($banner["image"])) {
                            copy(base_path('/media/'.$banner["image"]),base_path('images/events/banner/'.$banner["image"]));    
                            copy(base_path('/media/'.$speaker["image"]),base_path('images/events/banner/'.$banner["image"]));             
                            $newBanner->image = $banner["image"];
                        }
                        $newBanner->save();
                    } 
            } 

            if($result) {
                Session::flash('message', 'Event added successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to add Event!');
                Session::flash('alert-class', 'alert-danger');
            }
        }
        return redirect('events/listing');
    }

    /* Pages listing will get through this function */
    public function listing(Request $request)
    {

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record')); //Config::get('variable.page_per_record');
        session(['sort_by' => 'asc']); // set default sorting
        $pages = Event::select('id','title_en','image1','description_en','title_ar','description_ar','created_at');
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
        $pages = $pages->where('id','!=','1');
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
        return view('events.view', compact('pages'));

    }


    /*go to edit page from this function*/
    public function editPage($id) {
      $helper = new Helpers();
        $page = Event::where('id', $id)->first();
        $templates = Event::get();
        if(isset($id)) {
            $editmenu = Event::where('id', $id)->first();
            if(!empty($editmenu)){
                $editmenu->icon = !empty($editmenu->icon)?($helper->publicpath()."/images/events/".$editmenu->icon):"";
            }
        }else{
            $editmenu = [];
        }
        /* echo "<pre>";
        $page->eventcourses;
        $page->eventspeakers;
        print_r($page->toarray());  die; */
        return view('events.create', compact('page', 'templates','editmenu'));
    }

    /*delete multiple pages*/

    public function deleteMultiplePages(Request $request) {

        $result = Event::whereIn('id', $request->ids)->delete();

        if($result) {
			$message 		= "Event(s) deleted successfully";
            $returnStatus 	= 1;

        } else {
			$message 		= "Unable to delete Event(s)";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }


    /* delete single page from this function */
    public function deleteSinglePage(Request $request)
    {
        $page = \App\Event::find($request->id);
        $result = $page->delete();

        if($result) {
			$message 		= "Event deleted successfully";
            $returnStatus 	= 1;

        } else {
			$message 		= "Unable to delete this Event";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }


public function banner(Request $request)
{
    $eventbanner = Eventsbanner::all();
    return view('events.banner',compact('eventbanner'));

}

public function bannerUpdate(Request $request){
    if(count($request->banners)>0){
        Eventsbanner::truncate();
        foreach($request->banners as $banner){
            $newBanner = new Eventsbanner();
            $newBanner->title = $banner["title"];
            $newBanner->link = $banner["link"];                        
            if(!empty($banner["image"])) {
                copy(base_path('/media/'.$banner["image"]),base_path('images/events/banner/'.$banner["image"]));
                copy(base_path('/media/'.$banner["image"]),env('BASE_AR_PATH').'images/events/banner/'.$banner["image"]);                 
                $newBanner->image = $banner["image"];
            }
            $newBanner->save();
        } 
    } 
    return redirect('events/banner');
}

}
