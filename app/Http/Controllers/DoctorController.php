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
Use App\Doctor;
Use App\Category;
Use App\Department;
Use App\Language;


class DoctorController extends Controller
{
    public function index(Request $request)
    {
    	//public/die("ajdsahksd");
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

        $queryString = "";
        if(isset($request->specialization)){
            $queryString .= empty($queryString)?"specialization=$request->specialization":"&specialization=$request->specialization";
        }
        if(isset($request->language)){
            $queryString .= empty($queryString)?"language=$request->language":"&language=$request->language";
        }
        if(isset($request->doctorname)){
            $queryString .= empty($queryString)?"doctorname=$request->doctorname":"&doctorname=$request->doctorname";
        }
        if(isset($request->gender)){
            $queryString .= empty($queryString)?"gender=$request->gender":"&gender=$request->gender";
        }
        if(!isset($request->lng)){
          $request->lng = "en";
        }

        if(!empty($request->doctorname) && !empty($request->department_id) && empty($request->language)){
          $data = Doctor::where('department_id', $request->department_id)
              ->where(($request->lng =="en")?"givenName":"givenNameAr","like","%".$request->doctorname."%")->where('isactive','1')->paginate(12);

        }elseif(!empty($request->doctorname) && !empty($request->department_id) and !empty($request->language)){
                 $data = Doctor::select('doctors.title','doctors.titleAr','doctors.givenName','doctors.givenNameAr','doctors.titleDesc','doctors.department_id','doctors.imgUrl','doctors.expYears','doctor_languages.id' ,'doctors.expYears','doctors.id as d_id','doctors.id')
                            ->join("doctor_languages","doctor_languages.doctor_id","doctors.id")
                            ->where("language_id",$request->language)
                            ->where(($request->lng == "en")?"givenName":"givenNameAr","like","%".$request->doctorname."%")
                            ->where('doctors.department_id', $request->department_id)
                            ->where('doctors.isactive','1')
                            ->paginate(12);
        }elseif(isset($request->language) && isset($request->doctorname) && $request->language !="" && $request->doctorname !="" && !empty($request->language)){
            $data = Doctor::select('doctors.title','doctors.titleAr','doctors.givenName','doctors.givenNameAr','doctors.titleDesc','doctors.department_id','doctors.imgUrl','doctors.expYears','doctor_languages.id' ,'doctors.expYears','doctors.id as d_id','doctors.id','doctors.specialitiesTxt','doctors.specialitiesTxtAr')->
                            join("doctor_languages","doctor_languages.doctor_id","doctors.id")
                            ->where("language_id",$request->language)
                            ->where(($request->lng =="en")?"givenName":"givenNameAr","like", "%".$request->doctorname."%")
                            ->where('isactive','1')->orderby(($request->lng =="en")?"givenName":\DB::raw("TRIM(givenNameAr)"),'asc')
                            ->paginate(12);
          }elseif(!empty($request->department_id) and !empty($request->language)){

              $data =  Doctor::select('doctors.title','doctors.givenName','doctors.givenNameAr','doctors.titleDesc','doctors.department_id','doctors.imgUrl','doctors.expYears','doctor_languages.id' ,'doctors.expYears','doctors.id as d_id','doctors.id','doctors.specialitiesTxt','doctors.specialitiesTxtAr')->
                            join("doctor_languages","doctor_languages.doctor_id","doctors.id")
                            ->where("language_id",$request->language)->where('doctors.department_id',$request->department_id)
                            ->where('isactive','1')->orderby(($request->lng =="en")?"givenName":\DB::raw("TRIM(givenNameAr)"),'asc')
                            ->paginate(12);

          }elseif(isset($request->language) && $request->language !="" ){
            $data = Doctor::select('doctors.title','doctors.titleAr','doctors.givenName','doctors.givenNameAr','doctors.titleDesc','doctors.department_id','doctors.imgUrl','doctors.expYears','doctor_languages.id' ,'doctors.expYears','doctors.id as d_id','doctors.id','doctors.specialitiesTxt','doctors.specialitiesTxtAr')->
                            join("doctor_languages","doctor_languages.doctor_id","doctors.id")
                            ->where("language_id",$request->language)
                            ->where('isactive','1')->orderby(($request->lng =="en")?"givenName":\DB::raw("TRIM(givenNameAr)"),'asc')
                            ->paginate(12);
          }elseif(isset($request->doctorname) && $request->doctorname !=""){

            $data = Doctor::where(($request->lng =="en")?"givenName":"givenNameAr","like","%".$request->doctorname."%")->where('isactive','1')->orderby(($request->lng =="en")?"givenName":\DB::raw("TRIM(givenNameAr)"),'asc')
                            ->paginate(12);
          }elseif (!empty(request()->segment(3)) || !empty(request()->segment(4)) ) {
            if(request()->segment(1) == "en"){
                $data=Doctor::where(\DB::raw("TRIM(givenName)"),'like',request()->segment(4).'%')->where('isactive','1')->orderby(($request->lng =="en")?"givenName":\DB::raw("TRIM(givenNameAr)"),'asc')->paginate(12);
            }elseif(request()->segment(1) == "ar"){
              if(request()->segment(4) == "ا"){
                   $data=Doctor::where(\DB::raw("TRIM(givenNameAr)"),'like','أ%')->orWhere(\DB::raw("TRIM(givenNameAr)"),'like','ء%')->orWhere(\DB::raw("TRIM(givenNameAr)"),'like','ا%')->orWhere(\DB::raw("TRIM(givenNameAr)"),'like','إ%')->orWhere(\DB::raw("TRIM(givenNameAr)"),'like','آ%')->where('isactive','1')->orderby(\DB::raw("TRIM(givenNameAr)"),'asc')->paginate(12);
               }else{
                   $data=Doctor::where(\DB::raw("TRIM(givenNameAr)"),'like',request()->segment(4).'%')->where('isactive','1')->orderby(($request->lng =="en")?"givenName":\DB::raw("TRIM(givenNameAr)"),'asc')->paginate(12);
               }
            }else{
                 $url=request()->segment(1);
                if($url == "en"){
                  $data=Doctor::where(\DB::raw("TRIM(givenName)"),'like',request()->segment(3).'%')->where('isactive','1')->orderby(($request->lng =="en")?"givenName":\DB::raw("TRIM(givenNameAr)"),'asc')->paginate(12);
                }else if($url == "ar"){
                  if(request()->segment(3) == "ا"){
                       $data=Doctor::where(\DB::raw("TRIM(givenNameAr)"),'like','أ%')->orWhere(\DB::raw("TRIM(givenNameAr)"),'like','ء%')->orWhere(\DB::raw("TRIM(givenNameAr)"),'like','ا%')->orWhere(\DB::raw("TRIM(givenNameAr)"),'like','إ%')->orWhere(\DB::raw("TRIM(givenNameAr)"),'like','آ%')->where('isactive','1')->orderby(\DB::raw("TRIM(givenNameAr)"),'asc')->paginate(12);
                   }else{
                       $data=Doctor::where(\DB::raw("TRIM(givenNameAr)"),'like',request()->segment(4).'%')->where('isactive','1')->orderby(($request->lng =="en")?"givenName":\DB::raw("TRIM(givenNameAr)"),'asc')->paginate(12);
                   }
                }else{
                  $data=Doctor::where(\DB::raw("TRIM(givenName)"),'like',request()->segment(3).'%')->where('isactive','1')->orderby(($request->lng =="en")?"givenName":\DB::raw("TRIM(givenNameAr)"),'asc')->paginate(12);
                }
            }

          }elseif(!empty($request->department_id)){
             $data=Doctor::where('department_id', $request->department_id)->where('isactive','1')->orderby(($request->lng =="en")?"givenName":\DB::raw("TRIM(givenNameAr)"),'asc')->paginate(12);
          }else{

             $data = Doctor::where('isactive','1')->orderby(($request->lng =="en")?"givenName":\DB::raw("TRIM(givenNameAr)"),'asc')->paginate(12);
          }
          $languages = Language::all();
          $searchLanguage = isset($request->language)?$request->language:"";
          $department  = Department::orderBy('title_en' ,'ASC')->where('status',1)->get();
        return view ('webpages.doctors', compact('data','followusSection','topmenu_0','topmenu_1','topmenu_2','topmenu_3','topmenu_4','middlemenu_1','middlemenu_2','middlemenu_3','middlemenu_4','middlemenu_5','Mainmenu_1','Mainmenu_2','Mainmenu_3','Mainmenu_4','Mainmenu_5','Mainmenu_6','footermenu_1','footermenu_2','footermenu_3','footerContact',
        'Bootomfooter','Know_Imc','News','testimonies','Award','Affiliates','slider','footermenu_1_sub','footermenu_2_sub','footermenu_3_sub','Mainmenu_1_sub','Mainmenu_2_sub','Mainmenu_3_sub','Mainmenu_4_sub','Mainmenu_5_sub','Mainmenu_6_sub','section','topmenu_section','middlemenu_section','Mainmenu_section','footermenu_section','Settings','queryString','languages','searchLanguage','department'));
    }

    public function getSearchDoctor($request){

        $page = isset($request->page)?$request->page-1:0;
        $doctorName = isset($request->doctorname)?$request->doctorname:"";
        $language = isset($request->language)?$request->language:"arabic";
    //     $searchData = array(
    //         "clinic_code"   => "",
    //         "search_txt"    => $doctorName,
    //         "rating"        => "",
    //         "serviceid"     => "",
    //         "item_count"    => "20",
    //         "mrnumber"      => "111492",
    //         "lang"          => $language,
    //         "page"          => $page
    //     );
    //
    //     $headers = [
    //       'Authorization: Bearer imc_123_789_***_###',
    // 	  'Content-Type: application/json'
    // 		];
    //
    //
    // 		$ch = curl_init();
    // 		curl_setopt($ch, CURLOPT_URL,'http://192.168.1.49:8080/imc_portal/api/physician/findall/');
    // 		curl_setopt($ch, CURLOPT_POST, true);
    // 		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    // //		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // 		//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //
    //
		// // I changed UA here
		// 	curl_setopt ($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1');
    //
		// 	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
		// 	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
		// 	curl_setopt ($ch, CURLOPT_AUTOREFERER, true);
		// 	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
		// 	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 2);
    //
    // 		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($searchData));
    // 		$result = json_decode(curl_exec($ch));


    	//	curl_close($ch);


        // //echo json_encode($searchData);
        // $ch = curl_init('http://192.168.1.49:8080/imc_portal/api/physician/findall/');
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($searchData));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //     'Content-Type: application/json',
        //     'Authorization: Bearer imc_123_789_***_###')
        // );

        //$result = json_decode(curl_exec($ch));
      //  dd($result);
      $result=[];
        return $result;
    }

    public function profile($id){
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
            if(request()->segment(1) == "en"){
                 $data=Doctor::where('slug_en',$id)->where('isactive','1')->first();
                 if(empty($data)){
                   $data= Doctor::where('slug_ar',$id)->where('isactive','1')->first();
                     if(empty($data)){
                         return redirect('/en/doctorsprofile/'.$data['slug_en']);
                     }else{
                          return redirect('/en/404/');
                     }
                 }
              }else if(request()->segment(1) == "ar"){
               $data=Doctor::where('slug_ar',$id)->where('isactive','1')->first();
               if(empty($data)){
                 $data= Doctor::where('slug_en',$id)->where('isactive','1')->first();
                 if(empty($data)){
                 return redirect('/ar/doctorsprofile/'.$data['slug_ar']);
                 }else{
                      return redirect('/ar/404/');
                 }
               }
              }else{
                 $data=Doctor::where('slug_en',$id)->where('isactive','1')->first();
                 if(empty($data)){
                   $data= Doctor::where('slug_ar',$id)->where('isactive','1')->first();
                    if(empty($data)){
                   return redirect('/en/doctorsprofile/'.$data['slug_en']);
                    }else{
                          return redirect('/en/404/');
                    }
                 }
              }
            return view ('webpages.doctorprofile', compact('data','followusSection','topmenu_0','topmenu_1','topmenu_2','topmenu_3','topmenu_4','middlemenu_1','middlemenu_2','middlemenu_3','middlemenu_4','middlemenu_5','Mainmenu_1','Mainmenu_2','Mainmenu_3','Mainmenu_4','Mainmenu_5','Mainmenu_6','footermenu_1','footermenu_2','footermenu_3','footerContact','Bootomfooter','Know_Imc','News','testimonies','Award','Affiliates','slider','footermenu_1_sub','footermenu_2_sub','footermenu_3_sub','Mainmenu_1_sub','Mainmenu_2_sub','Mainmenu_3_sub','Mainmenu_4_sub','Mainmenu_5_sub','Mainmenu_6_sub','section','topmenu_section','middlemenu_section','Mainmenu_section','footermenu_section','Settings'));
      //  }
    }

    public function getLanguage(){

        // $ch = curl_init("http://192.168.1.49:8080/imc_portal/api/home/fetchlanguages");
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //     'Content-Type: application/json',
        //     'Authorization: Bearer imc_123_789_***_###')
        // );
        // $languages = json_decode(curl_exec($ch));
        // if(isset($languages->languages)){
        //   return $languages->languages;
        // }else{
        //   return [];
        // }
    }

public function doctorsearch(Request $request)
    {


         $d = request()->segments();

         if(!empty($d[0]) && $d[0] == 'ar'){

          $language = 'ar';

          if(!empty($request->doctorname) && !empty($request->department_id) && empty($request->language)){

              $data = Doctor::where('department_id', $request->department_id)
               ->where(($request->lng =="en")?"givenName":"givenNameAr","like","%".$request->doctorname."%")->where('isactive','1')->paginate(12);

          }elseif(!empty($request->doctorname) && !empty($request->department_id) and !empty($request->language))
          {


                $data = Doctor::select('doctors.slug_en','doctors.slug_ar','doctors.media_id_en','doctors.media_id_ar','doctors.title','doctors.givenName','doctors.givenNameAr','doctors.titleDesc','doctors.department_id','doctors.imgUrl','doctors.expYears','doctor_languages.id' ,'doctors.expYears','doctors.id as d_id','doctors.id','doctors.specialitiesTxt','doctors.specialitiesTxtAr')->
                            join("doctor_languages","doctor_languages.doctor_id","doctors.id")
                                            ->where("language_id",$request->language)
                                            ->where('doctors.department_id', $request->department_id)
                                            ->where('doctors.givenNameAr','like', "%".$request->doctorname.'%')
                                            ->where('doctors.isactive','1')
                                            ->paginate(12);


        }elseif(isset($request->language) && isset($request->doctorname) && $request->language !="" && $request->doctorname !="" && !empty($request->language)){
            $data = Doctor::select('doctors.slug_en','doctors.slug_ar','doctors.media_id_en','doctors.media_id_ar','doctors.title','doctors.titleAr','doctors.givenName','doctors.givenNameAr','doctors.titleDesc','doctors.department_id','doctors.imgUrl','doctors.expYears','doctor_languages.id' ,'doctors.expYears','doctors.id as d_id','doctors.id','doctors.specialitiesTxt','doctors.specialitiesTxtAr')->
                            join("doctor_languages","doctor_languages.doctor_id","doctors.id")
                            ->where("language_id",$request->language)
                            ->where(($request->lng =="en")?"givenName":"givenNameAr","like", "%".$request->doctorname."%")
                            ->where('isactive','1')->orderby(\DB::raw("TRIM(givenNameAr)"),'asc')
                            ->paginate(12);
          }elseif(!empty($request->department_id) and !empty($request->language)){

              $data =  Doctor::select('doctors.slug_en','doctors.slug_ar','doctors.media_id_en','doctors.media_id_ar','doctors.title','doctors.givenName','doctors.givenNameAr','doctors.titleDesc','doctors.department_id','doctors.imgUrl','doctors.expYears','doctor_languages.id' ,'doctors.expYears','doctors.id as d_id','doctors.id','doctors.specialitiesTxt','doctors.specialitiesTxtAr')->
                            join("doctor_languages","doctor_languages.doctor_id","doctors.id")
                            ->where("language_id",$request->language)->where('doctors.department_id',$request->department_id)
                            ->where('isactive','1')->orderby(\DB::raw("TRIM(givenNameAr)"),'asc')
                            ->paginate(12);

          }elseif(isset($request->language) && $request->language !="" ){
            $data = Doctor::select('doctors.slug_en','doctors.slug_ar','doctors.media_id_en','doctors.media_id_ar','doctors.title','doctors.titleAr','doctors.givenName','doctors.givenNameAr','doctors.titleDesc','doctors.department_id','doctors.imgUrl','doctors.expYears','doctor_languages.id' ,'doctors.expYears','doctors.id as d_id','doctors.id','doctors.specialitiesTxt','doctors.specialitiesTxtAr')->
                            join("doctor_languages","doctor_languages.doctor_id","doctors.id")
                            ->where("language_id",$request->language)
                            ->where('isactive','1')->orderby(\DB::raw("TRIM(givenNameAr)"),'asc')
                            ->paginate(12);
          }elseif(isset($request->doctorname) && $request->doctorname !=""){

            $data = Doctor::where(($request->lng =="en")?"givenName":"givenNameAr","like","%".$request->doctorname."%")->where('isactive','1')->orderby(\DB::raw("TRIM(givenNameAr)"),'asc')
                            ->paginate(12);
          } elseif (!empty(request()->segment(3))) {

                 if(request()->segment(3) == "ا"){
                    $data=Doctor::where(\DB::raw("TRIM(givenNameAr)"),'like','أ%')->orWhere(\DB::raw("TRIM(givenNameAr)"),'like','ء%')->orWhere(\DB::raw("TRIM(givenNameAr)"),'like','ا%')->orWhere(\DB::raw("TRIM(givenNameAr)"),'like','إ%')->orWhere(\DB::raw("TRIM(givenNameAr)"),'like','آ%')->where('isactive','1')->orderby(\DB::raw("TRIM(givenNameAr)"),'asc')->paginate(12);
                }else{
                    $data=Doctor::where(\DB::raw("TRIM(givenNameAr)"),'like',request()->segment(3).'%')->where('isactive','1')->orderby(\DB::raw("TRIM(givenNameAr)"),'asc')->paginate(12);
                }
          }elseif(!empty($request->department_id)){
             $data=Doctor::where('department_id', $request->department_id)->where('isactive','1')->orderby(\DB::raw("TRIM(givenNameAr)"),'asc')->paginate(12);
          }else{
             $data = Doctor::where('isactive','1')->orderby(\DB::raw("TRIM(givenNameAr)"),'asc')->paginate(12);
          }

     }else{


       $language = 'en';
       if(!empty($request->doctorname) && !empty($request->department_id) && empty($request->language)){

          $data = Doctor::where('department_id', $request->department_id)
              ->where("givenName","like","%".$request->doctorname."%")->where('isactive','1')->orderBy('givenName','asc')->paginate(12);


        }elseif(!empty($request->doctorname) && !empty($request->department_id) and !empty($request->language)){

          $data =  Doctor::select('doctors.slug_en','doctors.slug_ar','doctors.isactive','doctors.media_id_en','doctors.media_id_ar','doctors.title','doctors.givenName','doctors.givenNameAr','doctors.titleDesc','doctors.department_id','doctors.imgUrl','doctors.expYears','doctor_languages.id' ,'doctors.expYears','doctors.id as d_id','doctors.id','doctors.specialitiesTxt','doctors.specialitiesTxtAr')->
                            join("doctor_languages","doctor_languages.doctor_id","doctors.id")
                            ->where("language_id",$request->language)
                            ->where('doctors.department_id', $request->department_id)
                            ->where('doctors.givenName','like',  $request->doctorname.'%')
                            ->where('doctors.isactive','1')
                            ->orderBy('givenName','asc')
                            ->paginate(12);



        }elseif(isset($request->language) && isset($request->doctorname) && $request->language !="" && $request->doctorname !="" && !empty($request->language)){

            $data = Doctor::select('doctors.slug_en','doctors.slug_ar','doctors.isactive','doctors.media_id_en','doctors.media_id_ar','doctors.title','doctors.givenName','doctors.givenNameAr','doctors.titleDesc','doctors.department_id','doctors.imgUrl','doctors.expYears','doctor_languages.id' ,'doctors.expYears','doctors.id as d_id','doctors.id','doctors.specialitiesTxt','doctors.specialitiesTxtAr')->
                            join("doctor_languages","doctor_languages.doctor_id","doctors.id")
                            ->where("language_id",$request->language)
                            ->where("givenName","like", "%".$request->doctorname."%")
                            ->where('isactive','1')->orderby("givenName",'asc')
                            ->paginate(12);
          }elseif(!empty($request->department_id) and !empty($request->language)){

              $data =  Doctor::select('doctors.slug_en','doctors.slug_ar','doctors.isactive','doctors.media_id_en','doctors.media_id_ar','doctors.title','doctors.givenName','doctors.givenNameAr','doctors.titleDesc','doctors.department_id','doctors.imgUrl','doctors.expYears','doctor_languages.id' ,'doctors.expYears','doctors.id as d_id','doctors.id','doctors.specialitiesTxt','doctors.specialitiesTxtAr')->
                            join("doctor_languages","doctor_languages.doctor_id","doctors.id")
                            ->where("language_id",$request->language)->where('doctors.department_id',$request->department_id)
                            ->where('isactive','1')->orderby("givenName","asc")
                            ->paginate(12);

          }else if(isset($request->language) && $request->language !="" ){
            $data = Doctor::select('doctors.slug_en','doctors.slug_ar','doctors.isactive','doctors.title','doctors.givenName','doctors.givenNameAr','doctors.titleDesc','doctors.department_id','doctors.imgUrl','doctors.expYears','doctor_languages.id' ,'doctors.expYears','doctors.id as d_id','doctors.id','doctors.specialitiesTxt','doctors.specialitiesTxtAr','doctors.media_id_en','doctors.media_id_ar')->
                            join("doctor_languages","doctor_languages.doctor_id","doctors.id")
                            ->where("language_id",$request->language)
                            ->where('isactive','1')->orderBy('givenName','asc')
                            ->paginate(12);
          }else if(isset($request->doctorname) && $request->doctorname !=""){

            $data = Doctor::where('isactive','1')->where("givenName","like","%".$request->doctorname."%")->orderBy('givenName','asc')->paginate(12);
            //dd($data);
            
          } elseif (!empty(request()->segment(3))) {
               $data=Doctor::where("givenName", 'like',request()->segment(3).'%')->where('isactive','1')->orderby("givenName",'asc')->paginate(12);

          }else if(!empty($request->department_id)){
              $data=Doctor::where('department_id', $request->department_id)->where('isactive','1')->orderby("givenName",'asc')->paginate(12);
          }else{
            $data = Doctor::where('isactive','1')->orderBy('givenName','asc')->paginate(12);
          }

         }
           return view ('webpages/searchdoctor',compact('data','language'));
    }





    public function searchalphabet($name)
    {
        $d = request()->segments();
         if(!empty($d[0]) && $d[0] == 'ar'){
           $language = 'ar';
          if($name == 'الكل ') {
          $data = Doctor::where('isactive','1')->orderby(\DB::raw("TRIM(givenNameAr)"),'asc')->paginate(12);
          }elseif($name == "ا"){
           $data=Doctor::where(\DB::raw("TRIM(givenNameAr)"),'like','أ%')->orWhere(\DB::raw("TRIM(givenNameAr)"),'like','ء%')->orWhere(\DB::raw("TRIM(givenNameAr)"),'like','ا%')->orWhere(\DB::raw("TRIM(givenNameAr)"),'like','إ%')->orWhere(\DB::raw("TRIM(givenNameAr)"),'like','آ%')->where('isactive','1')->orderby(\DB::raw("TRIM(givenNameAr)"),'asc')->paginate(12);

          }else{  $data = Doctor::where(\DB::raw("TRIM(givenNameAr)"),'like', $name.'%')->where('isactive','1')->orderby(\DB::raw("TRIM(givenNameAr)"),'asc')->paginate(12); }

         }else{
           $language = 'en';
           if($name == 'all')
            {
              $data=Doctor::where('isactive','1')->orderby("givenName",'asc')->paginate(12);
            }else{
           $data=Doctor::where("givenName", 'like',$name.'%')->where('isactive','1')->orderby("givenName",'asc')->paginate(12);
            }
         }
       return view ('webpages/searchdoctor',compact('data','language'));
    }

               public function getdocimage($doccode=null){
                    $docdata=Doctor::where('docCode',$doccode)->first();
                    if(!empty($docdata)){
                         $image= env('BASE_URL')."images/doctors/".$docdata['imgUrl'];
                    }else{
                        $image="";
                    }

                  $img=  str_replace('\/', '\\', $image);

                    return response()->json(['status' => true,'message'=>'file fetch successfully.','data'=>['image'=>$img],],200);

               }



}
