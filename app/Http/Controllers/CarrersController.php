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
use App\Visitor;
use App\Pagesection;
use App\Helpers;

use App\Carrer;
use App\CarrerUser;

use Session;
use DB;
use Validator;
use App\Job;


class CarrersController extends Controller
{



    public function index(Request $request)
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
              $jobs=Job::all(); // to get the jobs 

        $data=Carrer::all();
        $contents=Pagesection::where(["page"=>"carrers"])->get();
        $visitor_content = array();
        foreach($contents as $content){
            $visitor_content[$content->section] = $content->toArray();
        }
        //$language=$helper->getLanguage();// Retrieving value "laravel-nepal" using key "name"
         $language=request()->segment(1);
        if($language == "ar"){
           $title="وظائف";
        }else{
           $title="Careers";
        }
          if(count($request->all())>0){



               //dd($request->all());
               DB::beginTransaction();

               $array = [
                  'role_id' => '3',
                  'job' => $request->get('job'),
                  'residency' => $request->get('residency'),
                  'number' => $request->get('number'),
                  'nationality' => $request->get('nationality'),
                  'name' => $request->get('name'),
                  'email' => $request->get('email'),
                  'number' =>$request->get('number'),
                  'password'=>'',

               ];

               // if($request->hasFile('resume')) {
               //    $image= $helper->upload_image($request->file('resume'),'images/users/',"");
               //    $array['resume'] = $image;
               // }

               $status = CarrerUser::insertGetId($array);
               if($status) {
                   try {
                       DB::commit();
                       Session::flash('message', 'Data has been submmited successfully');
                       Session::flash('alert-class', 'alert-success');
                     } catch (\Exception $e) {
                         DB::rollback();
                         Session::flash('message', $e->getMessage());
                         Session::flash('alert-class', 'alert-danger');
                     }
               } else {
                   Session::flash('message', 'Unable to submit data!');
                   Session::flash('alert-class', 'alert-danger');
               }
              return redirect()->back();
          }else{
          return view ('carrers', compact('jobs','language','data','title','followusSection','topmenu_0','topmenu_1','topmenu_2','topmenu_3','topmenu_4','middlemenu_1','middlemenu_2','middlemenu_3','middlemenu_4','middlemenu_5','Mainmenu_1','Mainmenu_2','Mainmenu_3','Mainmenu_4','Mainmenu_5','Mainmenu_6','footermenu_1','footermenu_2','footermenu_3','footerContact','Bootomfooter','Know_Imc','News','testimonies','Award','Affiliates','slider','footermenu_1_sub','footermenu_2_sub','footermenu_3_sub','Mainmenu_1_sub','Mainmenu_2_sub','Mainmenu_3_sub','Mainmenu_4_sub','Mainmenu_5_sub','Mainmenu_6_sub','section','topmenu_section','middlemenu_section','Mainmenu_section','footermenu_section','Settings','visitors','visitor_content'));
        }
    }


    // public function store(Request $request){


    //                  DB::beginTransaction();

    //                  $array = [
    //                     'role_id' => '3',
    //                     'job' => $request->get('job'),
    //                     'residency' => $request->get('residency'),
    //                     'number' => $request->get('number'),
    //                     'nationality' => $request->get('nationality'),
    //                     'name' => $request->get('name'),
    //                     'email' => $request->get('email'),
    //                     'number' =>$request->get('number'),
    //                     'password'=>'',

    //                  ];


    //                  $status = CarrerUser::insertGetId($array);
    //                  if($status) {
    //                      try {
    //                          DB::commit();
    //                          Session::flash('message', 'Data has been submmited successfully');
    //                          Session::flash('alert-class', 'alert-success');
    //                        } catch (\Exception $e) {
    //                            DB::rollback();
    //                            Session::flash('message', $e->getMessage());
    //                            Session::flash('alert-class', 'alert-danger');
    //                        }
    //                  } else {
    //                      Session::flash('message', 'Unable to submit data!');
    //                      Session::flash('alert-class', 'alert-danger');
    //                  }
    //              return redirect('/career')->with("message","Carrer Uploaded Successfully")->with('alert-class', 'alert-success');
    // }



      public function store(Request $request){
           $helper = new Helpers();
            $validator = Validator::make($request->all(), [
            'job' => 'required',
            'name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'email' => 'required|email|max:255|unique:carrer_users,email,',
            'nationality' => 'required',
            'residency' =>'required',
            'number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'resumes'=>'required|mimes:doc,docx,pdf|max:10240',
             ]
           );
          if ($validator->fails()) {
            $errormes = [];
            if ($validator->errors()->has('job')) {
                $errormes['job'] = $validator->errors()->first('job');
            }

            if ($validator->errors()->has('name')) {
                $errormes['name'] = $validator->errors()->first('name');
            }

            if ($validator->errors()->has('email')) {
                $errormes['email'] = $validator->errors()->first('email');
            }
             if ($validator->errors()->has('nationality')) {
                $errormes['nationality'] = $validator->errors()->first('nationality');
            }
            if ($validator->errors()->has('residency')) {
                $errormes['residency'] = $validator->errors()->first('residency');
            }
            if ($validator->errors()->has('number')) {
                $errormes['number'] = $validator->errors()->first('number');
            }
            if ($validator->errors()->has('resumes')) {
                $errormes['resume'] = $validator->errors()->first('resumes');

            }
           return response()->json(['error'=> $errormes]);
        } else {
                $request['role_id'] = '3';
                $request['password'] = '';
                if($request->hasFile('resumes')) {
                     $image= $helper->upload_image($request->file('resumes'),'images/resume/','none');
                      $array['resume']="";
                      $array['media_resume'] = $image;
                }
                 $array['name']=$request['name'];
                 $array['email']=$request['email'];
                 $array['nationality']=$request['nationality'];
                 $array['residency']=$request['residency'];
                 $array['number']=$request['number'];
                 $array['password']="";
                 $array['ip']=$_SERVER['SERVER_ADDR'];
                $array['job']=$request['job'];
                CarrerUser::insertGetId($array);
                return response()->json(['success'=>'Data has been submmited successfully.']);

            }

          }


}
