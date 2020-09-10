<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use App\Section;
Use App\Setting;
use App\Helpers;
use App\Pagesection;
use Validator;
class TestimonialController extends Controller
{
    public function index()
    {
      $helper = new Helpers();

        $topmenu_0=Topmenu::where('order','1')->where('is_active','1')->get();
        $topmenu_1=Topmenu::where('order','2')->where('is_active','1')->get();
        $topmenu_2=Topmenu::where('order','3')->where('is_active','1')->get();
        $topmenu_3=Topmenu::where('order','4')->where('is_active','1')->get();
        $topmenu_4=Topmenu::where('order','5')->where('is_active','1')->get();
        //middlemenus
        $middlemenu_1=Middlemenu::where('order','1')->where('is_active','1')->get();
        $middlemenu_2=Middlemenu::where('order','2')->where('is_active','1')->get();
        $middlemenu_3=Middlemenu::where('order','3')->where('is_active','1')->get();
        $middlemenu_4=Middlemenu::where('order','4')->where('is_active','1')->get();
        $middlemenu_5=Middlemenu::where('order','5')->where('is_active','1')->get();
        //main menu
       $mainsection = Section::where('id',3)->where('is_enable','1')->first();
    if(!empty($mainsection)){
        $Mainmenu_1=Mainmenu::where('order','1')->where('parent_id','0')->where('is_active','1')->get();
        $Mainmenu_2=Mainmenu::where('order','2')->where('parent_id','0')->where('is_active','1')->get();
        $Mainmenu_3=Mainmenu::where('order','3')->where('parent_id','0')->where('is_active','1')->get();
        $Mainmenu_4=Mainmenu::where('order','4')->where('parent_id','0')->where('is_active','1')->get();
        $Mainmenu_5=Mainmenu::where('order','5')->where('parent_id','0')->where('is_active','1')->get();
        $Mainmenu_6=Mainmenu::where('order','6')->where('parent_id','0')->where('is_active','1')->get();
        //submenu for Mainmenu
        $Mainmenu_1_sub=Mainmenu::where('order','1')->where('parent_id','!=','0')->where('is_active','1')->get();
        $Mainmenu_2_sub=Mainmenu::where('order','2')->where('parent_id','!=','0')->where('is_active','1')->get();
        $Mainmenu_3_sub=Mainmenu::where('order','3')->where('parent_id','!=','0')->where('is_active','1')->get();
        $Mainmenu_4_sub=Mainmenu::where('order','4')->where('parent_id','!=','0')->where('is_active','1')->get();
        $Mainmenu_5_sub=Mainmenu::where('order','5')->where('parent_id','!=','0')->where('is_active','1')->get();
        $Mainmenu_6_sub=Mainmenu::where('order','6')->where('parent_id','!=','0')->where('is_active','1')->get();
      }else{
        $Mainmenu_1=[];
        $Mainmenu_2=[];
        $Mainmenu_3=[];
        $Mainmenu_4=[];
        $Mainmenu_5=[];
        $Mainmenu_6=[];
        //submenu for Mainmenu
        $Mainmenu_1_sub=[];
        $Mainmenu_2_sub=[];
        $Mainmenu_3_sub=[];
        $Mainmenu_4_sub=[];
        $Mainmenu_5_sub=[];
        $Mainmenu_6_sub=[];

      }
      $mainsectionFooter1 = Section::where('id',4)->where('is_enable','1')->first();
       if(!empty($mainsectionFooter1)){
          //footer menu
          $footermenu_1=Footermenu::where('order','1')->where('parent_id','0')->where('is_active','1')->get();
          $footermenu_2=Footermenu::where('order','2')->where('parent_id','0')->where('is_active','1')->get();
          $footermenu_3=Footermenu::where('order','3')->where('parent_id','0')->where('is_active','1')->get();
          //submenu for footer
          $footermenu_1_sub=Footermenu::where('order','1')->where('parent_id','!=','0')->where('is_active','1')->get();
          $footermenu_2_sub=Footermenu::where('order','2')->where('parent_id','!=','0')->where('is_active','1')->get();
          $footermenu_3_sub=Footermenu::where('order','3')->where('parent_id','!=','0')->where('is_active','1')->get();
          //footer contact section
          $footerContact=Contact::where('id','1')->get();
        }else{
          $footermenu_1=[];
          $footermenu_2=[];
          $footermenu_3=[];
          //submenu for footer
          $footermenu_1_sub=[];
          $footermenu_2_sub=[];
          $footermenu_3_sub=[];
          //footer contact section
          $footerContact=[];
        }
         //Bootom footer copyright section
         $mainsectionFooter2 = Section::where('id',5)->where('is_enable','1')->first();
         if(!empty($mainsectionFooter2)){
            $Bootomfooter=BottomFooter::where('id','1')->get();
          }else{
            $Bootomfooter=[];
          }
        //HealthTip Section
        $HealthTip=HealthTip::where('is_active','1')->get();
        //Know Imc section
        $mainsectionIMC = Section::where('id',9)->where('is_enable','1')->first();
         if(!empty($mainsectionIMC)){
          $Know_Imc=Know_Imc::get();
        }else{
          $Know_Imc=[];
        }
        //News and update section
        $mainsectionNews = Section::where('id',10)->where('is_enable','1')->first();
         if(!empty($mainsectionNews)){
            $News=News::where('is_active','1')->get();
          }else{
            $News=[];
          }
        //Testimonies section
        $mainsectionTestimonial = Section::where('id',11)->where('is_enable','1')->first();
         if(!empty($mainsectionTestimonial)){
           $testimonies= testimonies::where('is_active','1')->get();
          }else{
            $testimonies=[];
          }
        //Awards section
        $mainsectionAwards = Section::where('id',12)->where('is_enable','1')->first();
        if(!empty($mainsectionAwards)){
          $Award=Award::where('is_active','1')->get();
          //Affiliates Section
          $Affiliates=Affiliate::all();
        }else{
          $Award=[];
          $Affiliates=[];
        }
        //slider section content
        $mainsectionSlider = Section::where('id',8)->where('is_enable','1')->first();
         if(!empty($mainsectionSlider)){
          $slider=slider::where('is_active','1')->get();
         }else{
           $slider=[];
        }
        //enable disable section
        $section=Section::get();
        //topmenu enable disable Section
        $topmenu_section=Section::where('name','topmenu')->get();
        //middlemenu enable disable Section
        $middlemenu_section=Section::where('name','middlemenu')->get();
        //mainmenu enable disable Section
        $Mainmenu_section=Section::where('name','Mainmenu')->get();
        //footermenu enable disable Section
        $footermenu_section=Section::where('name','footermenu')->get();
        //Settings Section with logo
        $Settings=Setting::all();
        $mainsectionSlider = Section::where('id',8)->where('is_enable','1')->first();
         if(!empty($mainsectionSlider)){
           $followusSection =$mainsectionSlider;
         }else{
           $followusSection=[];
         }
         $mainsectionSlider = Section::where('id',8)->where('is_enable','1')->first();
          if(!empty($mainsectionSlider)){
            $followusSection =$mainsectionSlider;
          }else{
            $followusSection=[];
          }
          $totalTestimonal = testimonies::where('is_active','1')->get()->count();

          $testimonials= testimonies::where('is_active','1')->orderBy('is_order','asc')->orderBy('created_at','desc')->limit(6)->get();

          $contents=Pagesection::where(["page"=>"testimonies"])->get();
          $testimonies_content = array();
          foreach($contents as $content){
              $testimonies_content[$content->section] = $content->toArray();
          }
          $language=$helper->getLanguage();// Retrieving value "laravel-nepal" using key "name"
          if($language != "en"){
             $title="المرضى والزوار";
          }else{
             $title="Patients & Visitors";
          }
        return view ('webpages.testimonial', compact('title','followusSection','topmenu_0','topmenu_1','topmenu_2','topmenu_3','topmenu_4','middlemenu_1','middlemenu_2','middlemenu_3','middlemenu_4','middlemenu_5','Mainmenu_1','Mainmenu_2','Mainmenu_3','Mainmenu_4','Mainmenu_5','Mainmenu_6','footermenu_1','footermenu_2','footermenu_3','footerContact','Bootomfooter','Know_Imc','News','testimonies','Award','Affiliates','slider','footermenu_1_sub','footermenu_2_sub','footermenu_3_sub','Mainmenu_1_sub','Mainmenu_2_sub','Mainmenu_3_sub','Mainmenu_4_sub','Mainmenu_5_sub','Mainmenu_6_sub','section','topmenu_section','middlemenu_section','Mainmenu_section','footermenu_section','Settings','testimonials','testimonies_content','totalTestimonal'));
    }

    public function loadMore(Request $request){
      //$testimonials= testimonies::where('is_active','1')->offset($request->offset)->limit(2)->get();
      $testimonials= testimonies::where('is_active','1')->orderBy('is_order','asc')->orderBy('created_at','desc')->offset($request->offset)->limit(2)->get();

     $totalcount= testimonies::where('is_active','1')->count();
      return view('webpages.testimonial_loads',compact('testimonials','totalcount'));
    }

    public function store(Request $request){
      $helper = new Helpers();
      $validator = Validator::make($request->all(), [
      'name_en' => 'required|regex:/^[\pL\s\-]+$/u|max:500',
      'name_ar' => 'required|regex:/^[\pL\s\-]+$/u|max:500',
      'description_en' => 'required|max:5000',
      'description_ar' => 'required|max:5000',
      //'testimony_en' => 'required|max:5000',
      //'testimony_ar' => 'required|max:5000',
      'video1'=>'required|mimes:mp4,mov,ogg|max:500000',
      'is_advocacy' => 'required',
      'is_shareinfo' => 'required',
      'is_record' => 'required',
       'email' => 'required|email|max:255',
       //'email' => 'required|email|max:255|unique:testimonies,email,',
      'phone' =>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
       ]
     );

    if ($validator->fails()) {
      $errormes = [];
      if ($validator->errors()->has('name_en')) {
          $errormes['name_en'] = $validator->errors()->first('name_en');
      }

      if ($validator->errors()->has('name_ar')) {
          $errormes['name_ar'] = $validator->errors()->first('name_ar');
      }
      if ($validator->errors()->has('description_en')) {
          $errormes['description_en'] = $validator->errors()->first('description_en');
      }

      if ($validator->errors()->has('description_ar')) {
          $errormes['description_ar'] = $validator->errors()->first('description_ar');
      }


      if ($validator->errors()->has('testimony_en')) {
          $errormes['testimony_en'] = $validator->errors()->first('testimony_en');
      }

      if ($validator->errors()->has('testimony_ar')) {
          $errormes['testimony_ar'] = $validator->errors()->first('testimony_ar');
      }
      if ($validator->errors()->has('video1')) {
          $errormes['video1'] = $validator->errors()->first('video1');
      }
      if ($validator->errors()->has('is_advocacy')) {
          $errormes['is_advocacy'] = $validator->errors()->first('is_advocacy');
      }
      if ($validator->errors()->has('is_shareinfo')) {
          $errormes['is_shareinfo'] = $validator->errors()->first('is_shareinfo');
      }
      if ($validator->errors()->has('is_record')) {
          $errormes['is_record'] = $validator->errors()->first('is_record');
      }

      if ($validator->errors()->has('email')) {
          $errormes['email'] = $validator->errors()->first('email');
      }
      if ($validator->errors()->has('phone')) {
          $errormes['phone'] = $validator->errors()->first('phone');
      }

     return response()->json(['error'=> $errormes]);
      } else {
        $array = [
           'name_en' => $request->name_en,
           'name_ar' => $request->name_ar,
           'email' => $request->email,
           'phone' => $request->phone,
           'is_shareinfo' => $request->is_shareinfo,
           'is_advocacy' => $request->is_advocacy,
           'is_record' => $request->is_record,
           'description_en' => $request->description_en,
           'description_ar' => $request->description_ar,
           'testimony_en' => $request->testimony_en,
           'testimony_ar' => $request->testimony_ar,
           'is_active' =>'2',
           'created_at' => date('Y-m-d H:i:s'),
           'updated_at' => date('Y-m-d H:i:s'),
       ];
       if($request->hasFile('video1')) {
            $image= $helper->upload_image($request->file('video1'),'images/testimonies/videos/','none');
            $array['video1'] = "";
            $array['media_id'] = $image;
       }
       testimonies::insertGetId($array);
         $url=request()->segment(1);
             if(	$url == "en"){
                       return "Testimonial Uploaded Successfully";
             }elseif($url == "ar"){
                 return "Testimonial Uploaded Successfully";

             }else{
                return "Testimonial Uploaded Successfully";
             }
      }

    }
}
