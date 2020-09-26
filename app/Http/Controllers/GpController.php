<?php

namespace App\Http\Controllers;

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
use App\Leadership;
use App\LeadershipMessage;
use App\Service;
use App\History;
use App\About;
use App\Setting;
use App\Subscribe;
use App\Pagesection;
use App\User;
use App\Mayo;
use App\Department;
use App\Category;
use App\Doctor;
use App\Doctor_experience;
use App\Doctor_education;
use App\Doctor_language;
use App\Doctor_category;
use App\Contactus;
use App\Language;
use App\HealthCategory;
use Validator;

class GpController extends Controller implements PageInterface {

    use CommonTrait,
        UserTrait;

    public function departmentindexwithid($slug, $lang = null) {
        $helper = new Helpers();
        $getHeaderFooter = $helper->getHeaderFooter();
        $getHeaderMenus = $getHeaderFooter['header'];
        $getFooterMenus = $getHeaderFooter['footer'];
        $lang = $lang;
        $topmenu_1 = Topmenu::where('order', '1')->where('is_active', '1')->get();
        $topmenu_2 = Topmenu::where('order', '2')->where('is_active', '1')->get();
        $topmenu_3 = Topmenu::where('order', '3')->where('is_active', '1')->get();
        $topmenu_4 = Topmenu::where('order', '4')->where('is_active', '1')->get();
        //middlemenus
        $middlemenu_1 = Middlemenu::where('order', '1')->where('is_active', '1')->get();
        $middlemenu_2 = Middlemenu::where('order', '2')->where('is_active', '1')->get();
        $middlemenu_3 = Middlemenu::where('order', '3')->where('is_active', '1')->get();
        $middlemenu_4 = Middlemenu::where('order', '4')->where('is_active', '1')->get();
        $middlemenu_5 = Middlemenu::where('order', '5')->where('is_active', '1')->get();
        ;
        //main menu
        $Mainmenu_1 = Mainmenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_2 = Mainmenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_3 = Mainmenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_4 = Mainmenu::where('order', '4')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_5 = Mainmenu::where('order', '5')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_6 = Mainmenu::where('order', '6')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for Mainmenu
        $Mainmenu_1_sub = Mainmenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_2_sub = Mainmenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_3_sub = Mainmenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_4_sub = Mainmenu::where('order', '4')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_5_sub = Mainmenu::where('order', '5')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_6_sub = Mainmenu::where('order', '6')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        //footer menu
        $footermenu_1 = Footermenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_2 = Footermenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_3 = Footermenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for footer
        $footermenu_1_sub = Footermenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_2_sub = Footermenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_3_sub = Footermenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();

        $footerContact = Contact::where('id', '1')->get();
        //Bootom footer copyright section
        $Bootomfooter = BottomFooter::where('id', '1')->get();
        //HealthTip Section
        $HealthTip = HealthTip::all();
        //Know Imc section
        $Know_Imc = Know_Imc::all();
        //News and update section
        $News = News::all();
        //Testimonies section
        $testimonies = testimonies::all();
        //Awards section
        $Award = Award::all();
        //Affiliates Section
        $Affiliates = Affiliate::all();
        //slider section content
        $slider = slider::all();
        $Settings = Setting::all();
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        if (request()->segment(1) == "en") {
            $data = Department::where('slug_en', $slug)->first();
            if (empty($data)) {
                $data = Department::where('slug_ar', $slug)->first();
                return redirect('/en/department/' . $data['slug_en']);
            }
        } else if (request()->segment(1) == "ar") {
            $data = Department::where('slug_ar', $slug)->first();
            if (empty($data)) {
                $data = Department::where('slug_en', $slug)->first();
                return redirect('/ar/department/' . $data['slug_ar']);
            }
        } else {
            $data = Department::where('slug_en', $slug)->first();
            if (empty($data)) {
                $data = Department::where('slug_ar', $slug)->first();
                return redirect('/en/department/' . $data['slug_en']);
            }
        }
        $id = $data['id'];
        $view = 'about.departmentinner';
        $contentsddd = Pagesection::where('page', 'privacy')->get();
        $content = array();
        foreach ($contentsddd as $a) {
            $content[$a->section] = $a->toArray();
        }
        // $language=$helper->getLanguage();// Retrieving value "laravel-nepal" using key "name"
        $language = 'ar';
        if ($language != "en") {
            $title = "الإدارات";
        } else {
            $title = "Departments";
        }


        $docotrsid = Doctor::where('isactive', '1')->where('department_id', $id)->pluck('id')->all();
        $categoryconultant = Doctor_category::whereIn('doctor_id', $docotrsid)->where('category_id', '1')->pluck('doctor_id')->all();
        $docotrsconsultant = Doctor::where('isactive', '1')->whereIn('id', $categoryconultant)->get();
        $categoryRegistrar = Doctor_category::whereIn('doctor_id', $docotrsid)->where('category_id', '2')->pluck('doctor_id')->all();
        $docotrsyRegistrar = Doctor::where('isactive', '1')->whereIn('id', $categoryRegistrar)->get();
        //dd($docotrsyRegistrar);
        $categorySeniorRegistrar = Doctor_category::whereIn('doctor_id', $docotrsid)->where('category_id', '3')->pluck('doctor_id')->all();
        $docotrsySeniorRegistrar = Doctor::where('isactive', '1')->whereIn('id', $categorySeniorRegistrar)->get();
        $categorychairperson = Doctor_category::whereIn('doctor_id', $docotrsid)->where('category_id', '4')->pluck('doctor_id')->all();
        $docotrsychairperson = Doctor::where('isactive', '1')->whereIn('id', $categorychairperson)->first();
        if ($id == 24) {
            $docotrsychairperson = Doctor::where('isactive', '1')->where('id', "29")->first();
        } else {
            $docotrsychairperson = Doctor::where('isactive', '1')->whereIn('id', $categorychairperson)->first();
        }

        return view('webpages.departmentinner', compact('docotrsychairperson', 'docotrsyRegistrar', 'docotrsySeniorRegistrar', 'docotrsconsultant', 'categorySeniorRegistrar', 'data', 'Settings', 'content', 'language', 'data', 'getpage', 'getHeaderMenus', 'getFooterMenus', 'lang', 'topmenu_1', 'topmenu_2', 'topmenu_3', 'topmenu_4', 'middlemenu_1', 'middlemenu_2', 'middlemenu_3', 'middlemenu_4', 'middlemenu_5', 'Mainmenu_1', 'Mainmenu_2', 'Mainmenu_3', 'Mainmenu_4', 'Mainmenu_5', 'Mainmenu_6', 'footermenu_1', 'footermenu_2', 'footermenu_3', 'footerContact', 'Bootomfooter', 'Know_Imc', 'News', 'testimonies', 'Award', 'Affiliates', 'slider', 'footermenu_1_sub', 'footermenu_2_sub', 'footermenu_3_sub', 'Mainmenu_1_sub', 'Mainmenu_2_sub', 'Mainmenu_3_sub', 'Mainmenu_4_sub', 'Mainmenu_5_sub', 'Mainmenu_6_sub'));
    }

    // if user have nt permission then this page will show 
    public function dashboard() {
        return view('errors.notpermit');
    }

    public function dpsearch($search, $lang) {

        if ($lang == 'ar') {

            if ($search != "0") {
                $data = Department::where("title_ar", 'like', $search . '%')->orderBy("title_ar", 'asc')->get();
            } else {
                $data = Department::where('status', 1)->orderBy('title_ar', 'asc')->get();
            }
        } else {
            if ($search != "0") {
                $data = Department::where('title_en', 'LIKE', $search . "%")->orderBy('title_en', 'asc')->get();
            } else {
                $data = Department::where('status', 1)->orderBy('title_en', 'asc')->get();
            }
        }





        //$language=$helper->getLanguage();// Retrieving value "laravel-nepal" using key "name"

        $url = $lang;
        if ($url == "en") {
            $language = 'en';
        } elseif ($url == "ar") {
            $language = 'ar';
        } else {
            $language = 'en';
        }
        if ($language != "en") {
            $title = "سياسة الخصوصية IMC";
            $result = [];
            $alphaArabic = array(
                "ا" => [],
                "ب" => [],
                "ت" => [],
                "ث" => [],
                "ج" => [],
                "ح" => [],
                "خ" => [],
                "د" => [],
                "ذ" => [],
                "ر" => [],
                "ز" => [],
                "س" => [],
                "ش" => [],
                "ص" => [],
                "ض" => [],
                "ط" => [],
                "ظ" => [],
                "ع" => [],
                "غ" => [],
                "ف" => [],
                "ق" => [],
                "ك" => [],
                "ل" => [],
                "م" => [],
                "ن" => [],
                "ه" => [],
                "و" => [],
                "ي" => [],
            );
            foreach ($data as $item) {
                $firstLetter = mb_substr($item->title_ar, 0, 1, 'utf8');
                if (isset($alphaArabic[$firstLetter])) {
                    $alphaArabic[$firstLetter][] = $item;
                } else {
                    $alphaArabic[$firstLetter] = [];
                    $alphaArabic[$firstLetter][] = $item;
                }
            }
            $finalArray = [];
            foreach ($alphaArabic as $key => $valeu) {
                if (!empty($valeu)) {
                    $finalArray[$key] = $valeu;
                }
            }
            $result = $finalArray;
        } else {
            $result = [];
            foreach ($data as $item) {
                $firstLetter = strtoupper(substr($item->title_en, 0, 1));
                $result[$firstLetter][] = $item;
            }

            $alphaArabic = array(
                "A" => "ا",
                "B" => "ب",
                "C" => "ج",
                "D" => "ث",
                "E" => "ه",
                "F" => "ف",
                "G" => "خ",
                "H" => "ح",
                "I" => "أنا",
                "J" => "ي",
                "K" => "ك",
                "L" => "ط",
                "M" => "م",
                "N" => "ن",
                "O" => "س",
                "P" => "ظ",
                "Q" => "ف",
                "R" => "ر",
                "S" => "س",
                "T" => "ت",
                "U" => "ش",
                "V" => "الخامس",
                "W" => "ث",
                "X" => "إكس",
                "Y" => "ذ",
                "Z" => "ض"
            );
        }


        return view('webpages.depsearch', compact('result', 'language'));
    }

    public function departmentlisting($search) {
        //dd($request->all());
        //   dd($search);
        if ($search != "0") {
            $data = Department::where('title_en', 'LIKE', "%" . $search . "%")->orderBy('title_en', 'asc')->get();
        } else {
            $data = Department::where('status', 1)->orderBy('title_en', 'asc')->get();
        }
        return json_encode(array("status" => 0, "data" => $data));
    }

    // public function departmentindex(Request $request,$slug=null,$lang=null){
    //     $helper = new Helpers();
    //     $getHeaderFooter = $helper->getHeaderFooter();
    //     $getHeaderMenus =  $getHeaderFooter['header'];
    //     $getFooterMenus = $getHeaderFooter['footer'];
    //       $lang = $lang;
    //       $topmenu_1=Topmenu::where('order','1')->get();
    //       $topmenu_2=Topmenu::where('order','2')->get();
    //       $topmenu_3=Topmenu::where('order','3')->get();
    //       $topmenu_4=Topmenu::where('order','4')->get();
    //       //middlemenus
    //       $middlemenu_1=Middlemenu::where('order','1')->get();
    //       $middlemenu_2=Middlemenu::where('order','2')->get();
    //       $middlemenu_3=Middlemenu::where('order','3')->get();
    //       $middlemenu_4=Middlemenu::where('order','4')->get();
    //       $middlemenu_5=Middlemenu::where('order','5')->get();
    //       //main menu
    //       $Mainmenu_1=Mainmenu::where('order','1')->where('parent_id','0')->get();
    //       $Mainmenu_2=Mainmenu::where('order','2')->where('parent_id','0')->get();
    //       $Mainmenu_3=Mainmenu::where('order','3')->where('parent_id','0')->get();
    //       $Mainmenu_4=Mainmenu::where('order','4')->where('parent_id','0')->get();
    //       $Mainmenu_5=Mainmenu::where('order','5')->where('parent_id','0')->get();
    //       $Mainmenu_6=Mainmenu::where('order','6')->where('parent_id','0')->get();
    //       //submenu for Mainmenu
    //       $Mainmenu_1_sub=Mainmenu::where('order','1')->where('parent_id','!=','0')->get();
    //       $Mainmenu_2_sub=Mainmenu::where('order','2')->where('parent_id','!=','0')->get();
    //       $Mainmenu_3_sub=Mainmenu::where('order','3')->where('parent_id','!=','0')->get();
    //       $Mainmenu_4_sub=Mainmenu::where('order','4')->where('parent_id','!=','0')->get();
    //       $Mainmenu_5_sub=Mainmenu::where('order','5')->where('parent_id','!=','0')->get();
    //       $Mainmenu_6_sub=Mainmenu::where('order','6')->where('parent_id','!=','0')->get();
    //       //footer menu
    //       $footermenu_1=Footermenu::where('order','1')->where('parent_id','0')->get();
    //       $footermenu_2=Footermenu::where('order','2')->where('parent_id','0')->get();
    //       $footermenu_3=Footermenu::where('order','3')->where('parent_id','0')->get();
    //       //submenu for footer
    //       $footermenu_1_sub=Footermenu::where('order','1')->where('parent_id','!=','0')->get();
    //       $footermenu_2_sub=Footermenu::where('order','2')->where('parent_id','!=','0')->get();
    //       $footermenu_3_sub=Footermenu::where('order','3')->where('parent_id','!=','0')->get();
    //       $footerContact=Contact::where('id','1')->get();
    //       //Bootom footer copyright section
    //       $Bootomfooter=BottomFooter::where('id','1')->get();
    //       //HealthTip Section
    //       $HealthTip=HealthTip::all();
    //       //Know Imc section
    //       $Know_Imc=Know_Imc::all();
    //       //News and update section
    //       $News=News::all();
    //       //Testimonies section
    //       $testimonies= testimonies::all();
    //       //Awards section
    //       $Award=Award::all();
    //       //Affiliates Section
    //       $Affiliates=Affiliate::all();
    //       //slider section content
    //       $slider=slider::all();
    //       $Settings=Setting::all();
    //       $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
    //       if(!isset($request->lng)){
    //         $request->lng = "ar";
    //       }
    //           if(isset($request['departmentname']) and !empty($request['departmentname']))
    //           {
    //               $data=Department::where(($request->lng =="en")?"title_en":"title_ar",'LIKE',"%".$request['departmentname']."%")->orderBy(($request->lng =="en")?"title_en":"title_en", 'asc')->get();
    //           }else if(!empty(request()->segment(3))){
    //               $data=Department::where("title_ar", 'like', request()->segment(3). '%')->orderBy("title_en", 'asc')->get();
    //           }else{
    //               $data= Department::orderBy(($request->lng =="en")?"title_en":"title_en", 'asc')->get();
    //           }
    //             $view='about.department';
    //             $contentsddd= Pagesection::where('page','privacy')->get();
    //             $content = array();
    //             foreach($contentsddd as $a){
    //                 $content[$a->section] = $a->toArray();
    //             }
    //             $language=$helper->getLanguage();// Retrieving value "laravel-nepal" using key "name"
    //             if($language != "en"){
    //               $title="سياسة الخصوصية IMC";
    //             }else{
    //               $title="Privacy Policy IMC";
    //             }
    //                 $result = [];
    //  			foreach ($data as $item) {
    //  						$firstLetter = strtoupper(substr($item->title_en, 0, 1));
    //  						//	$firstLetter =	mb_substr($item->title_ar, 0, 1, 'utf8');
    //                       $result[$firstLetter][] = $item;
    //           }
    //       $alphaArabic = array(
    //               "A" =>"ا",
    //               "B" =>"ب",
    //               "C" =>"ت",
    //               "D" =>"ث",
    //               "E" =>"ج",
    //               "F" =>"ح",
    //               "G" =>"خ",
    //               "H" =>"د",
    //               "I" =>"ذ",
    //               "J" =>"ر",
    //               "K" =>"ز",
    //               "L" =>"س",
    //               "M" =>"ش",
    //               "N" =>"ص",
    //               "O" =>"ض",
    //               "P" =>"ط",
    //               "Q" =>"ظ",
    //               "R" =>"ع",
    //               "S" =>"غ",
    //               "T" =>"ف",
    //               "U" =>"ق",
    //               "V" =>"ك",
    //               "W" =>"ل",
    //               "X" =>"م",
    //               "Y" =>"ن",
    //               "Z" =>"ه",
    //   );
    //         return view('webpages.department', compact('result','alphaArabic','title','Settings','content','language','data','getpage','getHeaderMenus', 'getFooterMenus', 'lang','topmenu_1','topmenu_2','topmenu_3','topmenu_4','middlemenu_1','middlemenu_2','middlemenu_3','middlemenu_4','middlemenu_5','Mainmenu_1','Mainmenu_2','Mainmenu_3','Mainmenu_4','Mainmenu_5','Mainmenu_6','footermenu_1','footermenu_2','footermenu_3','footerContact','Bootomfooter','Know_Imc','News','testimonies','Award','Affiliates','slider','footermenu_1_sub','footermenu_2_sub','footermenu_3_sub','Mainmenu_1_sub','Mainmenu_2_sub','Mainmenu_3_sub','Mainmenu_4_sub','Mainmenu_5_sub','Mainmenu_6_sub'));
    //       }

    public function departmentindex(Request $request, $slug = null, $lang = null) {
        $helper = new Helpers();
        $getHeaderFooter = $helper->getHeaderFooter();
        $getHeaderMenus = $getHeaderFooter['header'];
        $getFooterMenus = $getHeaderFooter['footer'];
        $lang = $lang;
        $topmenu_1 = Topmenu::where('order', '1')->where('is_active', '1')->get();
        $topmenu_2 = Topmenu::where('order', '2')->where('is_active', '1')->get();
        $topmenu_3 = Topmenu::where('order', '3')->where('is_active', '1')->get();
        $topmenu_4 = Topmenu::where('order', '4')->where('is_active', '1')->get();
        //middlemenus
        $middlemenu_1 = Middlemenu::where('order', '1')->where('is_active', '1')->get();
        $middlemenu_2 = Middlemenu::where('order', '2')->where('is_active', '1')->get();
        $middlemenu_3 = Middlemenu::where('order', '3')->where('is_active', '1')->get();
        $middlemenu_4 = Middlemenu::where('order', '4')->where('is_active', '1')->get();
        $middlemenu_5 = Middlemenu::where('order', '5')->where('is_active', '1')->get();
        //main menu
        $Mainmenu_1 = Mainmenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_2 = Mainmenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_3 = Mainmenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_4 = Mainmenu::where('order', '4')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_5 = Mainmenu::where('order', '5')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_6 = Mainmenu::where('order', '6')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for Mainmenu
        $Mainmenu_1_sub = Mainmenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_2_sub = Mainmenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_3_sub = Mainmenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_4_sub = Mainmenu::where('order', '4')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_5_sub = Mainmenu::where('order', '5')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_6_sub = Mainmenu::where('order', '6')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        //footer menu
        $footermenu_1 = Footermenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_2 = Footermenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_3 = Footermenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for footer
        $footermenu_1_sub = Footermenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        ;
        $footermenu_2_sub = Footermenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_3_sub = Footermenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();

        $footerContact = Contact::where('id', '1')->get();
        //Bootom footer copyright section
        $Bootomfooter = BottomFooter::where('id', '1')->get();
        //HealthTip Section
        $HealthTip = HealthTip::all();
        //Know Imc section
        $Know_Imc = Know_Imc::all();
        //News and update section
        $News = News::all();
        //Testimonies section
        $testimonies = testimonies::all();
        //Awards section
        $Award = Award::all();
        //Affiliates Section
        $Affiliates = Affiliate::all();
        //slider section content
        $slider = slider::all();
        $Settings = Setting::all();
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));

        if (!isset($request->lng)) {
            $request->lng = "en";
        }


        if (isset($request['departmentname']) and ! empty($request['departmentname'])) {
            $data = Department::where(($request->lng == "en") ? "title_en" : "title_ar", 'LIKE', "%" . $request['departmentname'] . "%")->orderBy(($request->lng == "en") ? "title_en" : "title_ar", 'asc')->get();
        } elseif (!empty(request()->segment(3)) || !empty(request()->segment(4))) {
            if (request()->segment(1) == "en") {
                $data = Department::where("title_en", 'like', request()->segment(4) . '%')->orderBy("title_en", 'asc')->get();
            } elseif (request()->segment(1) == "ar") {
                $data = Department::where("title_ar", 'like', request()->segment(4) . '%')->orderBy("title_ar", 'asc')->get();
            } else {
                $url = request()->segment(1);
                if ($url == "en") {
                    $data = Department::where("title_en", 'like', request()->segment(3) . '%')->orderBy("title_en", 'asc')->get();
                } elseif ($url == "ar") {
                    $data = Department::where("title_ar", 'like', request()->segment(3) . '%')->orderBy("title_ar", 'asc')->get();
                } else {
                    $data = Department::where("title_en", 'like', request()->segment(3) . '%')->orderBy("title_en", 'asc')->get();
                }
            }
        } else {
            $data = Department::orderby(($request->lng == "en") ? "title_en" : "title_ar", 'asc')->get();
        }
        $view = 'about.department';
        $contentsddd = Pagesection::where('page', 'privacy')->get();
        $content = array();
        foreach ($contentsddd as $a) {
            $content[$a->section] = $a->toArray();
        }
        //$language=$helper->getLanguage();// Retrieving value "laravel-nepal" using key "name"

        $url = request()->segment(1);
        if ($url == "en") {
            $language = 'en';
        } elseif ($url == "ar") {
            $language = 'ar';
        } else {
            $language = 'en';
        }
        if ($language != "en") {
            $title = "سياسة الخصوصية IMC";
            $result = [];
            $alphaArabic = array(
                "ا" => [],
                "ب" => [],
                "ت" => [],
                "ث" => [],
                "ج" => [],
                "ح" => [],
                "خ" => [],
                "د" => [],
                "ذ" => [],
                "ر" => [],
                "ز" => [],
                "س" => [],
                "ش" => [],
                "ص" => [],
                "ض" => [],
                "ط" => [],
                "ظ" => [],
                "ع" => [],
                "غ" => [],
                "ف" => [],
                "ق" => [],
                "ك" => [],
                "ل" => [],
                "م" => [],
                "ن" => [],
                "ه" => [],
                "و" => [],
                "ي" => [],
            );
            foreach ($data as $item) {
                $firstLetter = mb_substr($item->title_ar, 0, 1, 'utf8');
                if (isset($alphaArabic[$firstLetter])) {
                    $alphaArabic[$firstLetter][] = $item;
                } else {
                    $alphaArabic[$firstLetter] = [];
                    $alphaArabic[$firstLetter][] = $item;
                }
            }
            $finalArray = [];
            foreach ($alphaArabic as $key => $valeu) {
                if (!empty($valeu)) {
                    $finalArray[$key] = $valeu;
                }
            }
            $result = $finalArray;
        } else {
            $result = [];
            foreach ($data as $item) {
                $firstLetter = strtoupper(substr($item->title_en, 0, 1));
                $result[$firstLetter][] = $item;
            }

            $alphaArabic = array(
                "A" => "ا",
                "B" => "ب",
                "C" => "ج",
                "D" => "ث",
                "E" => "ه",
                "F" => "ف",
                "G" => "خ",
                "H" => "ح",
                "I" => "أنا",
                "J" => "ي",
                "K" => "ك",
                "L" => "ط",
                "M" => "م",
                "N" => "ن",
                "O" => "س",
                "P" => "ظ",
                "Q" => "ف",
                "R" => "ر",
                "S" => "س",
                "T" => "ت",
                "U" => "ش",
                "V" => "الخامس",
                "W" => "ث",
                "X" => "إكس",
                "Y" => "ذ",
                "Z" => "ض"
            );
        }

        return view('webpages.department', compact('result', 'alphaArabic', 'title', 'Settings', 'content', 'language', 'data', 'getpage', 'getHeaderMenus', 'getFooterMenus', 'lang', 'topmenu_1', 'topmenu_2', 'topmenu_3', 'topmenu_4', 'middlemenu_1', 'middlemenu_2', 'middlemenu_3', 'middlemenu_4', 'middlemenu_5', 'Mainmenu_1', 'Mainmenu_2', 'Mainmenu_3', 'Mainmenu_4', 'Mainmenu_5', 'Mainmenu_6', 'footermenu_1', 'footermenu_2', 'footermenu_3', 'footerContact', 'Bootomfooter', 'Know_Imc', 'News', 'testimonies', 'Award', 'Affiliates', 'slider', 'footermenu_1_sub', 'footermenu_2_sub', 'footermenu_3_sub', 'Mainmenu_1_sub', 'Mainmenu_2_sub', 'Mainmenu_3_sub', 'Mainmenu_4_sub', 'Mainmenu_5_sub', 'Mainmenu_6_sub'));
    }

    public function addinguser(Request $request) {
        dd($request->all());
    }

    public function setlanguage($type) {
        if ($type == "ar") {
            session()->put('language', 'ar');
        } else {
            session()->put('language', 'en');
        }
        return redirect()->back();
    }

    public function getpage($type) {

        if ($type == "1") {
            $t = 'privacy-policy';
            $getpage = About::where('id', $type)->first();
        } else if ($type == "2") {
            $t = 'about-us';
            $getpage = About::where('id', $type)->first();
        } else if ($type == "3") {
            $t = 'terms-and-conditions';
            $getpage = About::where('id', $type)->first();
        }

        if (!empty($getpage)) {
            $data = $getpage;
        } else {
            $data = "";
        }
        return response()->json(['status' => true, 'message' => 'sucess', 'data' => $data], 200);
    }

    /*
      This controller includes page create, store, listing, editPage,
      deleteMultiplePages, deleteSinglePage  functions

     */


    /* this function will redirect to create page section */

    public function create() {
        $templates = Affiliate::get();


        return view('affiliates.create', compact('templates'));
    }

    // save page and its details from this function
    public function store(Request $request) {

        $helper = new Helpers();
        $input = $request->all();
        $request['title_en'] = trim($request['title_en']);
        $request['title_ar'] = trim($request['title_ar']);

        $this->validate($request, [
            'title_en' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:250',
            'title_ar' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:250',
            'icon' => 'mimes:jpeg,jpg,png,gif|max:10000' //
                ], [
            'title_en.required' => 'Please enter title',
            'title_ar.required' => 'Please enter title',
            'icon.required' => 'Please upload the icon',
        ]);


        $array = [
            'title_en' => $request->get('title_en'),
            'title_ar' => $request->get('title_ar'),
            'is_active' => $request->get('is_active'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];




        if (isset($request->id)) {
            $existingdata = Affiliate::where('id', $request->id)->first();
            if ($request->hasFile('icon')) {
                $oldimage = !empty($existingdata['icon']) ? $existingdata['icon'] : 'none';
                $image = $helper->upload_image($request->file('icon'), 'images/affiliates/', $oldimage);
                $array['icon'] = $image;
            }
            $result = Affiliate::where('id', $request->id)->update($array);
            if ($result) {
                Session::flash('message', 'Affiliate updated successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to update Affiliate!');
                Session::flash('alert-class', 'alert-danger');
            }
        } else {
            if ($request->hasFile('icon')) {
                $image = $helper->upload_image($request->file('icon'), 'images/affiliates/', 'none');
                $array['icon'] = $image;
            }
            $result = Affiliate::create($array);
            if ($result) {
                Session::flash('message', 'Affiliate added successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to add Affiliate!');
                Session::flash('alert-class', 'alert-danger');
            }
        }
        return redirect('affiliates/listing');
    }

    /* Pages listing will get through this function */

    public function listing(Request $request) {

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record')); //Config::get('variable.page_per_record');
        session(['sort_by' => 'asc']); // set default sorting
        $pages = Affiliate::select('id', 'title_en', 'icon', 'title_ar', 'created_at');
        if (isset($request->q)) { // search by name
            $pages = $pages->where(function($query) use($request) {
                $query->where('title_en', 'LIKE', '%' . $request->q . "%");
            });
        }

        if (isset($request->sort_by)) {

            if ($request->key == 'title') { // sort by name
                $pages = $pages->orderBy('title_en', $request->sort_by);
            }

            if ($request->key == 'date') { // sort by date
                $pages = $pages->orderBy('created_at', $request->sort_by);
            }
        } else {
            $pages = $pages->orderBy('id', 'desc');
        }
        $pages = $pages->paginate($per_page);

        // append search params
        if (isset($request->q)) {
            $pages = $pages->appends(['q' => $request->q]);  /* keywords will append to url using append */
            session(['q' => $request->q]);
        } else {
            session()->forget('q');
        }

        // append sort_by params
        if (isset($request->sort_by)) {
            $pages = $pages->appends(['key' => $request->key, 'sort_by' => $request->sort_by]);
            session(['key' => $request->key, 'sort_by' => ( $request->sort_by == 'asc') ? 'desc' : 'asc']);
        }

        // append recordvalue params
        if (isset($request->recordvalue)) {
            $pages = $pages->appends(['recordvalue' => $request->recordvalue]);
            session(['recordvalue' => $request->recordvalue]);
        } else {
            session()->forget('recordvalue');
        }
        return view('affiliates.view', compact('pages'));
    }

    /* go to edit page from this function */

    public function editPage($id) {
        $helper = new Helpers();
        $page = Affiliate::where('id', $id)->first();
        $templates = Affiliate::get();
        if (isset($id)) {
            $editmenu = Affiliate::where('id', $id)->first();
            if (!empty($editmenu)) {
                $editmenu->icon = !empty($editmenu->icon) ? ($helper->publicpath() . "/images/affiliates/" . $editmenu->icon) : "";
            }
        } else {
            $editmenu = [];
        }
        return view('affiliates.create', compact('page', 'templates', 'editmenu'));
    }

    /* delete multiple pages */

    public function deleteMultiplePages(Request $request) {

        $result = Affiliate::whereIn('id', $request->ids)->delete();

        if ($result) {
            $message = "Affiliate(s) deleted successfully";
            $returnStatus = 1;
        } else {
            $message = "Unable to delete Affiliate(s)";
            $returnStatus = 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }

    /* delete single page from this function */

    public function deleteSinglePage(Request $request) {
        $page = \App\Affiliate::find($request->id);
        $result = $page->delete();

        if ($result) {
            $message = "Affiliate deleted successfully";
            $returnStatus = 1;
        } else {
            $message = "Unable to delete this Affiliate";
            $returnStatus = 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }

    public function showview($slug = null, $lang = null) {
        $helper = new Helpers();
        $getHeaderFooter = $helper->getHeaderFooter();
        $getHeaderMenus = $getHeaderFooter['header'];
        $getFooterMenus = $getHeaderFooter['footer'];

        $lang = $lang;
        $topmenu_1 = Topmenu::where('order', '1')->get();
        $topmenu_2 = Topmenu::where('order', '2')->get();
        $topmenu_3 = Topmenu::where('order', '3')->get();
        $topmenu_4 = Topmenu::where('order', '4')->get();
        //middlemenus
        $middlemenu_1 = Middlemenu::where('order', '1')->where('is_active', '1')->get();
        $middlemenu_2 = Middlemenu::where('order', '2')->where('is_active', '1')->get();
        $middlemenu_3 = Middlemenu::where('order', '3')->where('is_active', '1')->get();
        $middlemenu_4 = Middlemenu::where('order', '4')->where('is_active', '1')->get();
        $middlemenu_5 = Middlemenu::where('order', '5')->where('is_active', '1')->get();
        ;
        //main menu
        $Mainmenu_1 = Mainmenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_2 = Mainmenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_3 = Mainmenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_4 = Mainmenu::where('order', '4')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_5 = Mainmenu::where('order', '5')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_6 = Mainmenu::where('order', '6')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for Mainmenu
        $Mainmenu_1_sub = Mainmenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_2_sub = Mainmenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_3_sub = Mainmenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_4_sub = Mainmenu::where('order', '4')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_5_sub = Mainmenu::where('order', '5')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_6_sub = Mainmenu::where('order', '6')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        //footer menu
        $footermenu_1 = Footermenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_2 = Footermenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_3 = Footermenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for footer
        $footermenu_1_sub = Footermenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_2_sub = Footermenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_3_sub = Footermenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();

        $footerContact = Contact::where('id', '1')->get();
        //Bootom footer copyright section
        $Bootomfooter = BottomFooter::where('id', '1')->get();
        //HealthTip Section
        $HealthTip = HealthTip::all();
        //Know Imc section
        $Know_Imc = Know_Imc::all();
        //News and update section
        $News = News::all();
        //Testimonies section
        $testimonies = testimonies::all();
        //Awards section
        $Award = Award::all();
        //Affiliates Section
        $Affiliates = Affiliate::all();
        //slider section content
        $slider = slider::all();

        $Settings = Setting::all();

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        if (!empty($slug)) {
            if ($slug == 'news-article') {
                $data = News::where('id', '!=', '1')->where('is_active', '1')->orderBy('id', 'desc')->paginate($per_page);
                $view = 'news.list';
                $t = News::where('id', '1')->first();
                $exactvalues = 't';
            } else if ($slug == 'events') {
                $data = Event::where('id', '!=', '1')->where('is_active', '1')->orderBy('id', 'desc')->paginate($per_page);
                $view = 'events.list';
                $t = Event::where('id', '1')->first();
            } else {
                $data = [];
                $view = 'content';
                $t = [];
            }
            $getpage = [];
            //session()->put('language', 'en');
            // $language=$helper->getLanguage();// Retrieving value "laravel-nepal" using key "name"
// Retrieving value "laravel-nepal" using key "name"
            $language = 'ar';
            return view('gp.' . $view, compact('Settings', 't', 'language', 'data', 'getpage', 'getHeaderMenus', 'getFooterMenus', 'lang', 'topmenu_1', 'topmenu_2', 'topmenu_3', 'topmenu_4', 'middlemenu_1', 'middlemenu_2', 'middlemenu_3', 'middlemenu_4', 'middlemenu_5', 'Mainmenu_1', 'Mainmenu_2', 'Mainmenu_3', 'Mainmenu_4', 'Mainmenu_5', 'Mainmenu_6', 'footermenu_1', 'footermenu_2', 'footermenu_3', 'footerContact', 'Bootomfooter', 'Know_Imc', 'News', 'testimonies', 'Award', 'Affiliates', 'slider', 'footermenu_1_sub', 'footermenu_2_sub', 'footermenu_3_sub', 'Mainmenu_1_sub', 'Mainmenu_2_sub', 'Mainmenu_3_sub', 'Mainmenu_4_sub', 'Mainmenu_5_sub', 'Mainmenu_6_sub'));
        }
    }

    public function showevents($slug = null, $lang = null) {
        $helper = new Helpers();
        $getHeaderFooter = $helper->getHeaderFooter();
        $getHeaderMenus = $getHeaderFooter['header'];
        $getFooterMenus = $getHeaderFooter['footer'];
        $lang = $lang;
        $topmenu_1 = Topmenu::where('order', '1')->get();
        $topmenu_2 = Topmenu::where('order', '2')->get();
        $topmenu_3 = Topmenu::where('order', '3')->get();
        $topmenu_4 = Topmenu::where('order', '4')->get();
        //middlemenus
        $middlemenu_1 = Middlemenu::where('order', '1')->where('is_active', '1')->get();
        $middlemenu_2 = Middlemenu::where('order', '2')->where('is_active', '1')->get();
        $middlemenu_3 = Middlemenu::where('order', '3')->where('is_active', '1')->get();
        $middlemenu_4 = Middlemenu::where('order', '4')->where('is_active', '1')->get();
        $middlemenu_5 = Middlemenu::where('order', '5')->where('is_active', '1')->get();
        ;
        //main menu
        $Mainmenu_1 = Mainmenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_2 = Mainmenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_3 = Mainmenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_4 = Mainmenu::where('order', '4')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_5 = Mainmenu::where('order', '5')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_6 = Mainmenu::where('order', '6')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for Mainmenu
        $Mainmenu_1_sub = Mainmenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_2_sub = Mainmenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_3_sub = Mainmenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_4_sub = Mainmenu::where('order', '4')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_5_sub = Mainmenu::where('order', '5')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_6_sub = Mainmenu::where('order', '6')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        //footer menu
        $footermenu_1 = Footermenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_2 = Footermenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_3 = Footermenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for footer
        $footermenu_1_sub = Footermenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_2_sub = Footermenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_3_sub = Footermenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();

        $footerContact = Contact::where('id', '1')->get();
        //Bootom footer copyright section
        $Bootomfooter = BottomFooter::where('id', '1')->get();
        //HealthTip Section
        $HealthTip = HealthTip::all();
        //Know Imc section
        $Know_Imc = Know_Imc::all();
        //News and update section
        $News = News::all();
        //Testimonies section
        $testimonies = testimonies::all();
        //Awards section
        $Award = Award::all();
        //Affiliates Section
        $Affiliates = Affiliate::all();
        //slider section content
        $slider = slider::all();
        $Settings = Setting::all();
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));

        $data = Event::where('id', '!=', '1')->where('is_active', '1')->orderBy('id', 'desc')->paginate($per_page);
        $view = 'events.list';
        $t = Pagesection::where('page', 'event')->first();
        $getpage = [];
        //()->put('language', 'en');
        //$language=$helper->getLanguage();
        $language = 'ar';
        if ($language != "en") {
            $title = "تواصل اجتماعي";
        } else {
            $title = "Community";
        }
        return view('gp.' . $view, compact('Settings', 'title', 't', 'language', 'data', 'getpage', 'getHeaderMenus', 'getFooterMenus', 'lang', 'topmenu_1', 'topmenu_2', 'topmenu_3', 'topmenu_4', 'middlemenu_1', 'middlemenu_2', 'middlemenu_3', 'middlemenu_4', 'middlemenu_5', 'Mainmenu_1', 'Mainmenu_2', 'Mainmenu_3', 'Mainmenu_4', 'Mainmenu_5', 'Mainmenu_6', 'footermenu_1', 'footermenu_2', 'footermenu_3', 'footerContact', 'Bootomfooter', 'Know_Imc', 'News', 'testimonies', 'Award', 'Affiliates', 'slider', 'footermenu_1_sub', 'footermenu_2_sub', 'footermenu_3_sub', 'Mainmenu_1_sub', 'Mainmenu_2_sub', 'Mainmenu_3_sub', 'Mainmenu_4_sub', 'Mainmenu_5_sub', 'Mainmenu_6_sub'));
    }

    public function shownews($slug = null, $lang = null) {
        $helper = new Helpers();
        $getHeaderFooter = $helper->getHeaderFooter();
        $getHeaderMenus = $getHeaderFooter['header'];
        $getFooterMenus = $getHeaderFooter['footer'];

        $lang = $lang;
        $topmenu_1 = Topmenu::where('order', '1')->get();
        $topmenu_2 = Topmenu::where('order', '2')->get();
        $topmenu_3 = Topmenu::where('order', '3')->get();
        $topmenu_4 = Topmenu::where('order', '4')->get();
        //middlemenus
        $middlemenu_1 = Middlemenu::where('order', '1')->where('is_active', '1')->get();
        $middlemenu_2 = Middlemenu::where('order', '2')->where('is_active', '1')->get();
        $middlemenu_3 = Middlemenu::where('order', '3')->where('is_active', '1')->get();
        $middlemenu_4 = Middlemenu::where('order', '4')->where('is_active', '1')->get();
        $middlemenu_5 = Middlemenu::where('order', '5')->where('is_active', '1')->get();
        ;
        //main menu
        $Mainmenu_1 = Mainmenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_2 = Mainmenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_3 = Mainmenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_4 = Mainmenu::where('order', '4')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_5 = Mainmenu::where('order', '5')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_6 = Mainmenu::where('order', '6')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for Mainmenu
        $Mainmenu_1_sub = Mainmenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_2_sub = Mainmenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_3_sub = Mainmenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_4_sub = Mainmenu::where('order', '4')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_5_sub = Mainmenu::where('order', '5')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_6_sub = Mainmenu::where('order', '6')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        //footer menu
        $footermenu_1 = Footermenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_2 = Footermenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_3 = Footermenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for footer
        $footermenu_1_sub = Footermenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_2_sub = Footermenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_3_sub = Footermenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();

        $footerContact = Contact::where('id', '1')->get();
        //Bootom footer copyright section
        $Bootomfooter = BottomFooter::where('id', '1')->get();
        //HealthTip Section
        $HealthTip = HealthTip::all();
        //Know Imc section
        $Know_Imc = Know_Imc::all();
        //News and update section
        $News = News::all();
        //Testimonies section
        $testimonies = testimonies::all();
        //Awards section
        $Award = Award::all();
        //Affiliates Section
        $Affiliates = Affiliate::all();
        //slider section content
        $slider = slider::all();

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));

        $data = News::where('is_active', '1')->orderBy('id', 'desc')->paginate($per_page);
        $view = 'news.list';
        $t = News::where('id', '1')->first();
        $exactvalues = 't';
        $Settings = Setting::all();
        // session()->put('language', 'en');
        // $language=$helper->getLanguage();

        $language = 'ar';
        $contents = Pagesection::where(["page" => "news"])->get();
        $content = array();
        foreach ($contents as $contentddd) {
            $content[$contentddd->section] = $contentddd->toArray();
        }
        // Retrieving value "laravel-nepal" using key "name"
        if ($language != "en") {
            $title = "تواصل اجتماعي";
        } else {
            $title = "Community";
        }

        return view('gp.' . $view, compact('title', 'content', 'Settings', 't', 'language', 'data', 'getHeaderMenus', 'getFooterMenus', 'lang', 'topmenu_1', 'topmenu_2', 'topmenu_3', 'topmenu_4', 'middlemenu_1', 'middlemenu_2', 'middlemenu_3', 'middlemenu_4', 'middlemenu_5', 'Mainmenu_1', 'Mainmenu_2', 'Mainmenu_3', 'Mainmenu_4', 'Mainmenu_5', 'Mainmenu_6', 'footermenu_1', 'footermenu_2', 'footermenu_3', 'footerContact', 'Bootomfooter', 'Know_Imc', 'News', 'testimonies', 'Award', 'Affiliates', 'slider', 'footermenu_1_sub', 'footermenu_2_sub', 'footermenu_3_sub', 'Mainmenu_1_sub', 'Mainmenu_2_sub', 'Mainmenu_3_sub', 'Mainmenu_4_sub', 'Mainmenu_5_sub', 'Mainmenu_6_sub'));
    }

    public function showawards($slug = null, $lang = null) {
        $helper = new Helpers();
        $getHeaderFooter = $helper->getHeaderFooter();
        $getHeaderMenus = $getHeaderFooter['header'];
        $getFooterMenus = $getHeaderFooter['footer'];
        $lang = $lang;
        $topmenu_1 = Topmenu::where('order', '1')->get();
        $topmenu_2 = Topmenu::where('order', '2')->get();
        $topmenu_3 = Topmenu::where('order', '3')->get();
        $topmenu_4 = Topmenu::where('order', '4')->get();
        //middlemenus
        $middlemenu_1 = Middlemenu::where('order', '1')->where('is_active', '1')->get();
        $middlemenu_2 = Middlemenu::where('order', '2')->where('is_active', '1')->get();
        $middlemenu_3 = Middlemenu::where('order', '3')->where('is_active', '1')->get();
        $middlemenu_4 = Middlemenu::where('order', '4')->where('is_active', '1')->get();
        $middlemenu_5 = Middlemenu::where('order', '5')->where('is_active', '1')->get();
        ;
        //main menu
        $Mainmenu_1 = Mainmenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_2 = Mainmenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_3 = Mainmenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_4 = Mainmenu::where('order', '4')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_5 = Mainmenu::where('order', '5')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_6 = Mainmenu::where('order', '6')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for Mainmenu
        $Mainmenu_1_sub = Mainmenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_2_sub = Mainmenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_3_sub = Mainmenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_4_sub = Mainmenu::where('order', '4')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_5_sub = Mainmenu::where('order', '5')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_6_sub = Mainmenu::where('order', '6')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        //footer menu
        $footermenu_1 = Footermenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_2 = Footermenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_3 = Footermenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for footer
        $footermenu_1_sub = Footermenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_2_sub = Footermenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_3_sub = Footermenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();

        $footerContact = Contact::where('id', '1')->get();
        //Bootom footer copyright section
        $Bootomfooter = BottomFooter::where('id', '1')->get();
        //HealthTip Section
        $HealthTip = HealthTip::all();
        //Know Imc section
        $Know_Imc = Know_Imc::all();
        //News and update section
        $News = News::all();
        //Testimonies section
        $testimonies = testimonies::all();
        //Awards section
        $Award = Award::all();
        //Affiliates Section
        $Affiliates = Affiliate::all();
        //slider section content
        $slider = slider::all();
        $Settings = Setting::all();
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $data = Award::where('is_active', '1')->orderBy('id', 'asc')->paginate($per_page);

        //  $data= Award::where('id','!=','1')->where('is_active','1')->orderBy('id','desc')->paginate($per_page);
        $view = 'awards.list';
        $t = Award::where('id', '1')->first();
        $exactvalues = 't';
        // $language=$helper->getLanguage();
        $language = 'ar';
        return view('gp.' . $view, compact('Settings', 't', 'language', 'data', 'getHeaderMenus', 'getFooterMenus', 'lang', 'topmenu_1', 'topmenu_2', 'topmenu_3', 'topmenu_4', 'middlemenu_1', 'middlemenu_2', 'middlemenu_3', 'middlemenu_4', 'middlemenu_5', 'Mainmenu_1', 'Mainmenu_2', 'Mainmenu_3', 'Mainmenu_4', 'Mainmenu_5', 'Mainmenu_6', 'footermenu_1', 'footermenu_2', 'footermenu_3', 'footerContact', 'Bootomfooter', 'Know_Imc', 'News', 'testimonies', 'Award', 'Affiliates', 'slider', 'footermenu_1_sub', 'footermenu_2_sub', 'footermenu_3_sub', 'Mainmenu_1_sub', 'Mainmenu_2_sub', 'Mainmenu_3_sub', 'Mainmenu_4_sub', 'Mainmenu_5_sub', 'Mainmenu_6_sub'));
    }

    // To sow the leaderships

    public function showleaderships($slug = null, $lang = null) {
        $helper = new Helpers();
        $getHeaderFooter = $helper->getHeaderFooter();
        $getHeaderMenus = $getHeaderFooter['header'];
        $getFooterMenus = $getHeaderFooter['footer'];
        $lang = $lang;
        $topmenu_1 = Topmenu::where('order', '1')->get();
        $topmenu_2 = Topmenu::where('order', '2')->get();
        $topmenu_3 = Topmenu::where('order', '3')->get();
        $topmenu_4 = Topmenu::where('order', '4')->get();
        //middlemenus
        $middlemenu_1 = Middlemenu::where('order', '1')->where('is_active', '1')->get();
        $middlemenu_2 = Middlemenu::where('order', '2')->where('is_active', '1')->get();
        $middlemenu_3 = Middlemenu::where('order', '3')->where('is_active', '1')->get();
        $middlemenu_4 = Middlemenu::where('order', '4')->where('is_active', '1')->get();
        $middlemenu_5 = Middlemenu::where('order', '5')->where('is_active', '1')->get();
        ;
        //main menu
        $Mainmenu_1 = Mainmenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_2 = Mainmenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_3 = Mainmenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_4 = Mainmenu::where('order', '4')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_5 = Mainmenu::where('order', '5')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_6 = Mainmenu::where('order', '6')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for Mainmenu
        $Mainmenu_1_sub = Mainmenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_2_sub = Mainmenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_3_sub = Mainmenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_4_sub = Mainmenu::where('order', '4')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_5_sub = Mainmenu::where('order', '5')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_6_sub = Mainmenu::where('order', '6')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        //footer menu
        $footermenu_1 = Footermenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_2 = Footermenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_3 = Footermenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for footer
        $footermenu_1_sub = Footermenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_2_sub = Footermenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_3_sub = Footermenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();

        $footerContact = Contact::where('id', '1')->get();
        //Bootom footer copyright section
        $Bootomfooter = BottomFooter::where('id', '1')->get();
        //HealthTip Section
        $HealthTip = HealthTip::all();
        //Know Imc section
        $Know_Imc = Know_Imc::all();
        //News and update section
        $News = News::all();
        //Testimonies section
        $testimonies = testimonies::all();
        //Awards section
        $Award = Award::all();
        //Affiliates Section
        $Affiliates = Affiliate::all();
        //slider section content
        $slider = slider::all();
        $Settings = Setting::all();
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));

        $data = Leadership::where('is_active', '1')->orderBy('id', 'desc')->paginate(20);
        $view = 'leaderships.list';
        $t = Leadership::where('id', '1')->first();
        $exactvalues = 't';
        // $language=$helper->getLanguage();// Retrieving value "laravel-nepal" using key "name"
        $language = 'ar';
        if ($language != "en") {
            $title = "قيادة";
        } else {
            $title = "Leadership";
        }
        return view('gp.' . $view, compact('Settings', 'title', 't', 'language', 'data', 'getHeaderMenus', 'getFooterMenus', 'lang', 'topmenu_1', 'topmenu_2', 'topmenu_3', 'topmenu_4', 'middlemenu_1', 'middlemenu_2', 'middlemenu_3', 'middlemenu_4', 'middlemenu_5', 'Mainmenu_1', 'Mainmenu_2', 'Mainmenu_3', 'Mainmenu_4', 'Mainmenu_5', 'Mainmenu_6', 'footermenu_1', 'footermenu_2', 'footermenu_3', 'footerContact', 'Bootomfooter', 'Know_Imc', 'News', 'testimonies', 'Award', 'Affiliates', 'slider', 'footermenu_1_sub', 'footermenu_2_sub', 'footermenu_3_sub', 'Mainmenu_1_sub', 'Mainmenu_2_sub', 'Mainmenu_3_sub', 'Mainmenu_4_sub', 'Mainmenu_5_sub', 'Mainmenu_6_sub'));
    }

    public function leadershipmessage($slug = null, $lang = null) {
        $helper = new Helpers();
        $getHeaderFooter = $helper->getHeaderFooter();
        $getHeaderMenus = $getHeaderFooter['header'];
        $getFooterMenus = $getHeaderFooter['footer'];
        $lang = $lang;
        $topmenu_1 = Topmenu::where('order', '1')->get();
        $topmenu_2 = Topmenu::where('order', '2')->get();
        $topmenu_3 = Topmenu::where('order', '3')->get();
        $topmenu_4 = Topmenu::where('order', '4')->get();
        //middlemenus
        $middlemenu_1 = Middlemenu::where('order', '1')->where('is_active', '1')->get();
        $middlemenu_2 = Middlemenu::where('order', '2')->where('is_active', '1')->get();
        $middlemenu_3 = Middlemenu::where('order', '3')->where('is_active', '1')->get();
        $middlemenu_4 = Middlemenu::where('order', '4')->where('is_active', '1')->get();
        $middlemenu_5 = Middlemenu::where('order', '5')->where('is_active', '1')->get();
        ;
        //main menu
        $Mainmenu_1 = Mainmenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_2 = Mainmenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_3 = Mainmenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_4 = Mainmenu::where('order', '4')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_5 = Mainmenu::where('order', '5')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_6 = Mainmenu::where('order', '6')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for Mainmenu
        $Mainmenu_1_sub = Mainmenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_2_sub = Mainmenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_3_sub = Mainmenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_4_sub = Mainmenu::where('order', '4')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_5_sub = Mainmenu::where('order', '5')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_6_sub = Mainmenu::where('order', '6')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        //footer menu
        $footermenu_1 = Footermenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_2 = Footermenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_3 = Footermenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for footer
        $footermenu_1_sub = Footermenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_2_sub = Footermenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_3_sub = Footermenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();

        $footerContact = Contact::where('id', '1')->get();
        //Bootom footer copyright section
        $Bootomfooter = BottomFooter::where('id', '1')->get();
        //HealthTip Section
        $HealthTip = HealthTip::all();
        //Know Imc section
        $Know_Imc = Know_Imc::all();
        //News and update section
        $News = News::all();
        //Testimonies section
        $testimonies = testimonies::all();
        //Awards section
        $Award = Award::all();
        //Affiliates Section
        $Affiliates = Affiliate::all();
        //slider section content
        $slider = slider::all();
        $Settings = Setting::all();
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $data = LeadershipMessage::where('is_active', '1')->orderBy('id', 'desc')->first();
        $view = 'leadershipmessages.list';
        $t = LeadershipMessage::where('id', '1')->first();
        $exactvalues = 't';
        // $language=$helper->getLanguage();// Retrieving value "laravel-nepal" using key "name"
        $language = 'ar';
        if ($language != "en") {
            $title = "قيادة";
        } else {
            $title = "Leadership Message";
        }
        return view('gp.' . $view, compact('Settings', 'title', 't', 'language', 'data', 'getpage', 'getHeaderMenus', 'getFooterMenus', 'lang', 'topmenu_1', 'topmenu_2', 'topmenu_3', 'topmenu_4', 'middlemenu_1', 'middlemenu_2', 'middlemenu_3', 'middlemenu_4', 'middlemenu_5', 'Mainmenu_1', 'Mainmenu_2', 'Mainmenu_3', 'Mainmenu_4', 'Mainmenu_5', 'Mainmenu_6', 'footermenu_1', 'footermenu_2', 'footermenu_3', 'footerContact', 'Bootomfooter', 'Know_Imc', 'News', 'testimonies', 'Award', 'Affiliates', 'slider', 'footermenu_1_sub', 'footermenu_2_sub', 'footermenu_3_sub', 'Mainmenu_1_sub', 'Mainmenu_2_sub', 'Mainmenu_3_sub', 'Mainmenu_4_sub', 'Mainmenu_5_sub', 'Mainmenu_6_sub'));
    }

    public function showservices($slug = null, $lang = null) {
        $helper = new Helpers();
        $getHeaderFooter = $helper->getHeaderFooter();
        $getHeaderMenus = $getHeaderFooter['header'];
        $getFooterMenus = $getHeaderFooter['footer'];
        $lang = $lang;
        $topmenu_1 = Topmenu::where('order', '1')->get();
        $topmenu_2 = Topmenu::where('order', '2')->get();
        $topmenu_3 = Topmenu::where('order', '3')->get();
        $topmenu_4 = Topmenu::where('order', '4')->get();
        //middlemenus
        $middlemenu_1 = Middlemenu::where('order', '1')->where('is_active', '1')->get();
        $middlemenu_2 = Middlemenu::where('order', '2')->where('is_active', '1')->get();
        $middlemenu_3 = Middlemenu::where('order', '3')->where('is_active', '1')->get();
        $middlemenu_4 = Middlemenu::where('order', '4')->where('is_active', '1')->get();
        $middlemenu_5 = Middlemenu::where('order', '5')->where('is_active', '1')->get();
        ;
        //main menu
        $Mainmenu_1 = Mainmenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_2 = Mainmenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_3 = Mainmenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_4 = Mainmenu::where('order', '4')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_5 = Mainmenu::where('order', '5')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_6 = Mainmenu::where('order', '6')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for Mainmenu
        $Mainmenu_1_sub = Mainmenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_2_sub = Mainmenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_3_sub = Mainmenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_4_sub = Mainmenu::where('order', '4')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_5_sub = Mainmenu::where('order', '5')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_6_sub = Mainmenu::where('order', '6')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        //footer menu
        $footermenu_1 = Footermenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_2 = Footermenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_3 = Footermenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for footer
        $footermenu_1_sub = Footermenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_2_sub = Footermenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_3_sub = Footermenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();

        $footerContact = Contact::where('id', '1')->get();
        //Bootom footer copyright section
        $Bootomfooter = BottomFooter::where('id', '1')->get();
        //HealthTip Section
        $HealthTip = HealthTip::all();
        //Know Imc section
        $Know_Imc = Know_Imc::all();
        //News and update section
        $News = News::all();
        //Testimonies section
        $testimonies = testimonies::all();
        //Awards section
        $Award = Award::all();
        //Affiliates Section
        $Affiliates = Affiliate::all();
        //slider section content
        $slider = slider::all();
        $Settings = Setting::all();
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $data = Service::where('is_active', '1')->orderBy('id', 'desc')->get();
        $view = 'services.list';
        $t = Pagesection::where('page', 'services')->first();
        $exactvalues = 't';
        //$language=$helper->getLanguage();// Retrieving value "laravel-nepal" using key "name"
        $language = 'ar';
        if ($language != "en") {
            $title = "الخدمات الطبية";
        } else {
            $title = "Medical Services";
        }
        return view('gp.' . $view, compact('Settings', 'title', 't', 'language', 'data', 'getpage', 'getHeaderMenus', 'getFooterMenus', 'lang', 'topmenu_1', 'topmenu_2', 'topmenu_3', 'topmenu_4', 'middlemenu_1', 'middlemenu_2', 'middlemenu_3', 'middlemenu_4', 'middlemenu_5', 'Mainmenu_1', 'Mainmenu_2', 'Mainmenu_3', 'Mainmenu_4', 'Mainmenu_5', 'Mainmenu_6', 'footermenu_1', 'footermenu_2', 'footermenu_3', 'footerContact', 'Bootomfooter', 'Know_Imc', 'News', 'testimonies', 'Award', 'Affiliates', 'slider', 'footermenu_1_sub', 'footermenu_2_sub', 'footermenu_3_sub', 'Mainmenu_1_sub', 'Mainmenu_2_sub', 'Mainmenu_3_sub', 'Mainmenu_4_sub', 'Mainmenu_5_sub', 'Mainmenu_6_sub'));
    }

    public function showhistories($slug = null, $lang = null) {
        $helper = new Helpers();
        $getHeaderFooter = $helper->getHeaderFooter();
        $getHeaderMenus = $getHeaderFooter['header'];
        $getFooterMenus = $getHeaderFooter['footer'];
        $lang = $lang;
        $topmenu_1 = Topmenu::where('order', '1')->get();
        $topmenu_2 = Topmenu::where('order', '2')->get();
        $topmenu_3 = Topmenu::where('order', '3')->get();
        $topmenu_4 = Topmenu::where('order', '4')->get();
        //middlemenus
        $middlemenu_1 = Middlemenu::where('order', '1')->where('is_active', '1')->get();
        $middlemenu_2 = Middlemenu::where('order', '2')->where('is_active', '1')->get();
        $middlemenu_3 = Middlemenu::where('order', '3')->where('is_active', '1')->get();
        $middlemenu_4 = Middlemenu::where('order', '4')->where('is_active', '1')->get();
        $middlemenu_5 = Middlemenu::where('order', '5')->where('is_active', '1')->get();
        ;
        //main menu
        $Mainmenu_1 = Mainmenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_2 = Mainmenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_3 = Mainmenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_4 = Mainmenu::where('order', '4')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_5 = Mainmenu::where('order', '5')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_6 = Mainmenu::where('order', '6')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for Mainmenu
        $Mainmenu_1_sub = Mainmenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_2_sub = Mainmenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_3_sub = Mainmenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_4_sub = Mainmenu::where('order', '4')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_5_sub = Mainmenu::where('order', '5')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_6_sub = Mainmenu::where('order', '6')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        //footer menu
        $footermenu_1 = Footermenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_2 = Footermenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_3 = Footermenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for footer
        $footermenu_1_sub = Footermenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_2_sub = Footermenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_3_sub = Footermenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();

        $footerContact = Contact::where('id', '1')->get();
        //Bootom footer copyright section
        $Bootomfooter = BottomFooter::where('id', '1')->get();
        //HealthTip Section
        $HealthTip = HealthTip::all();
        //Know Imc section
        $Know_Imc = Know_Imc::all();
        //News and update section
        $News = News::all();
        //Testimonies section
        $testimonies = testimonies::all();
        //Awards section
        $Award = Award::all();
        //Affiliates Section
        $Affiliates = Affiliate::all();
        //slider section content
        $slider = slider::all();
        $Settings = Setting::all();
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $data = History::where('is_active', '1')->orderBy('id', 'desc')->get();
        $view = 'histories.list';
        $t = History::where('id', '1')->first();
        $exactvalues = 't';
        // $language=$helper->getLanguage();// Retrieving value "laravel-nepal" using key "name"
        $language = 'ar';
        if ($language != "en") {
            $title = "الخدمات الطبية";
        } else {
            $title = "History & Milestones";
        }
        return view('gp.' . $view, compact('Settings', 'title', 't', 'language', 'data', 'getpage', 'getHeaderMenus', 'getFooterMenus', 'lang', 'topmenu_1', 'topmenu_2', 'topmenu_3', 'topmenu_4', 'middlemenu_1', 'middlemenu_2', 'middlemenu_3', 'middlemenu_4', 'middlemenu_5', 'Mainmenu_1', 'Mainmenu_2', 'Mainmenu_3', 'Mainmenu_4', 'Mainmenu_5', 'Mainmenu_6', 'footermenu_1', 'footermenu_2', 'footermenu_3', 'footerContact', 'Bootomfooter', 'Know_Imc', 'News', 'testimonies', 'Award', 'Affiliates', 'slider', 'footermenu_1_sub', 'footermenu_2_sub', 'footermenu_3_sub', 'Mainmenu_1_sub', 'Mainmenu_2_sub', 'Mainmenu_3_sub', 'Mainmenu_4_sub', 'Mainmenu_5_sub', 'Mainmenu_6_sub'));
    }

    public function showabout($slug = null, $lang = null) {
        $helper = new Helpers();
        $getHeaderFooter = $helper->getHeaderFooter();
        $getHeaderMenus = $getHeaderFooter['header'];
        $getFooterMenus = $getHeaderFooter['footer'];
        $lang = $lang;
        $topmenu_1 = Topmenu::where('order', '1')->get();
        $topmenu_2 = Topmenu::where('order', '2')->get();
        $topmenu_3 = Topmenu::where('order', '3')->get();
        $topmenu_4 = Topmenu::where('order', '4')->get();
        //middlemenus
        $middlemenu_1 = Middlemenu::where('order', '1')->where('is_active', '1')->get();
        $middlemenu_2 = Middlemenu::where('order', '2')->where('is_active', '1')->get();
        $middlemenu_3 = Middlemenu::where('order', '3')->where('is_active', '1')->get();
        $middlemenu_4 = Middlemenu::where('order', '4')->where('is_active', '1')->get();
        $middlemenu_5 = Middlemenu::where('order', '5')->where('is_active', '1')->get();
        ;
        //main menu
        $Mainmenu_1 = Mainmenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_2 = Mainmenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_3 = Mainmenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_4 = Mainmenu::where('order', '4')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_5 = Mainmenu::where('order', '5')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_6 = Mainmenu::where('order', '6')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for Mainmenu
        $Mainmenu_1_sub = Mainmenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_2_sub = Mainmenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_3_sub = Mainmenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_4_sub = Mainmenu::where('order', '4')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_5_sub = Mainmenu::where('order', '5')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_6_sub = Mainmenu::where('order', '6')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        //footer menu
        $footermenu_1 = Footermenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_2 = Footermenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_3 = Footermenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for footer
        $footermenu_1_sub = Footermenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_2_sub = Footermenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_3_sub = Footermenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();

        $footerContact = Contact::where('id', '1')->get();
        //Bootom footer copyright section
        $Bootomfooter = BottomFooter::where('id', '1')->get();
        //HealthTip Section
        $HealthTip = HealthTip::all();
        //Know Imc section
        $Know_Imc = Know_Imc::all();
        //News and update section
        $News = News::all();
        //Testimonies section
        $testimonies = testimonies::all();
        //Awards section
        $Award = Award::all();
        //Affiliates Section
        $Affiliates = Affiliate::all();
        //slider section content
        $slider = slider::all();
        $Settings = Setting::all();
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $data = About::where('id', '1')->orderBy('id', 'desc')->first();
        $view = 'about.listing';
        $t = About::where('id', '1')->first();
        $contentsddd = Pagesection::where('page', 'about')->get();
        $content = array();
        foreach ($contentsddd as $a) {
            $content[$a->section] = $a->toArray();
        }
        // $language=$helper->getLanguage();// Retrieving value "laravel-nepal" using key "name"
        $language = 'ar';
        if ($language != "en") {
            $title = "سياسة الخصوصية IMC";
        } else {
            $title = "Privacy Policy IMC";
        }

        return view('gp.' . $view, compact('Settings', 'content', 'language', 'data', 'getpage', 'getHeaderMenus', 'getFooterMenus', 'lang', 'topmenu_1', 'topmenu_2', 'topmenu_3', 'topmenu_4', 'middlemenu_1', 'middlemenu_2', 'middlemenu_3', 'middlemenu_4', 'middlemenu_5', 'Mainmenu_1', 'Mainmenu_2', 'Mainmenu_3', 'Mainmenu_4', 'Mainmenu_5', 'Mainmenu_6', 'footermenu_1', 'footermenu_2', 'footermenu_3', 'footerContact', 'Bootomfooter', 'Know_Imc', 'News', 'testimonies', 'Award', 'Affiliates', 'slider', 'footermenu_1_sub', 'footermenu_2_sub', 'footermenu_3_sub', 'Mainmenu_1_sub', 'Mainmenu_2_sub', 'Mainmenu_3_sub', 'Mainmenu_4_sub', 'Mainmenu_5_sub', 'Mainmenu_6_sub'));
    }

    public function showterms($slug = null, $lang = null) {
        $helper = new Helpers();
        $getHeaderFooter = $helper->getHeaderFooter();
        $getHeaderMenus = $getHeaderFooter['header'];
        $getFooterMenus = $getHeaderFooter['footer'];
        $lang = $lang;
        $topmenu_1 = Topmenu::where('order', '1')->get();
        $topmenu_2 = Topmenu::where('order', '2')->get();
        $topmenu_3 = Topmenu::where('order', '3')->get();
        $topmenu_4 = Topmenu::where('order', '4')->get();
        //middlemenus
        $middlemenu_1 = Middlemenu::where('order', '1')->where('is_active', '1')->get();
        $middlemenu_2 = Middlemenu::where('order', '2')->where('is_active', '1')->get();
        $middlemenu_3 = Middlemenu::where('order', '3')->where('is_active', '1')->get();
        $middlemenu_4 = Middlemenu::where('order', '4')->where('is_active', '1')->get();
        $middlemenu_5 = Middlemenu::where('order', '5')->where('is_active', '1')->get();
        ;
        //main menu
        $Mainmenu_1 = Mainmenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_2 = Mainmenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_3 = Mainmenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_4 = Mainmenu::where('order', '4')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_5 = Mainmenu::where('order', '5')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_6 = Mainmenu::where('order', '6')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for Mainmenu
        $Mainmenu_1_sub = Mainmenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_2_sub = Mainmenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_3_sub = Mainmenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_4_sub = Mainmenu::where('order', '4')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_5_sub = Mainmenu::where('order', '5')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_6_sub = Mainmenu::where('order', '6')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        //footer menu
        $footermenu_1 = Footermenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_2 = Footermenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_3 = Footermenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for footer
        $footermenu_1_sub = Footermenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_2_sub = Footermenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_3_sub = Footermenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();

        $footerContact = Contact::where('id', '1')->get();
        //Bootom footer copyright section
        $Bootomfooter = BottomFooter::where('id', '1')->get();
        //HealthTip Section
        $HealthTip = HealthTip::all();
        //Know Imc section
        $Know_Imc = Know_Imc::all();
        //News and update section
        $News = News::all();
        //Testimonies section
        $testimonies = testimonies::all();
        //Awards section
        $Award = Award::all();
        //Affiliates Section
        $Affiliates = Affiliate::all();
        //slider section content
        $slider = slider::all();
        $Settings = Setting::all();
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $data = About::where('id', '3')->orderBy('id', 'desc')->first();


        $view = 'about.list';
        $contentsddd = Pagesection::where('page', 'term')->get();
        $content = array();
        foreach ($contentsddd as $a) {
            $content[$a->section] = $a->toArray();
        }
        // $language=$helper->getLanguage();// Retrieving value "laravel-nepal" using key "name"
        $language = 'ar';
        if ($language != "en") {
            $title = "سياسة الخصوصية IMC";
        } else {
            $title = "Privacy Policy IMC";
        }
        $getpage = $helper->getPagedata('terms-and-conditions');
        $basedata = "";

        return view('gp.' . $view, compact('getpage', 'basedata', 'Settings', 'content', 'language', 'data', 'getpage', 'getHeaderMenus', 'getFooterMenus', 'lang', 'topmenu_1', 'topmenu_2', 'topmenu_3', 'topmenu_4', 'middlemenu_1', 'middlemenu_2', 'middlemenu_3', 'middlemenu_4', 'middlemenu_5', 'Mainmenu_1', 'Mainmenu_2', 'Mainmenu_3', 'Mainmenu_4', 'Mainmenu_5', 'Mainmenu_6', 'footermenu_1', 'footermenu_2', 'footermenu_3', 'footerContact', 'Bootomfooter', 'Know_Imc', 'News', 'testimonies', 'Award', 'Affiliates', 'slider', 'footermenu_1_sub', 'footermenu_2_sub', 'footermenu_3_sub', 'Mainmenu_1_sub', 'Mainmenu_2_sub', 'Mainmenu_3_sub', 'Mainmenu_4_sub', 'Mainmenu_5_sub', 'Mainmenu_6_sub'));
    }

    public function showcontactuspage($slug = null, $lang = null) {
        $helper = new Helpers();
        $getHeaderFooter = $helper->getHeaderFooter();
        $getHeaderMenus = $getHeaderFooter['header'];
        $getFooterMenus = $getHeaderFooter['footer'];
        $lang = $lang;
        $topmenu_1 = Topmenu::where('order', '1')->get();
        $topmenu_2 = Topmenu::where('order', '2')->get();
        $topmenu_3 = Topmenu::where('order', '3')->get();
        $topmenu_4 = Topmenu::where('order', '4')->get();
        //middlemenus
        $middlemenu_1 = Middlemenu::where('order', '1')->where('is_active', '1')->get();
        $middlemenu_2 = Middlemenu::where('order', '2')->where('is_active', '1')->get();
        $middlemenu_3 = Middlemenu::where('order', '3')->where('is_active', '1')->get();
        $middlemenu_4 = Middlemenu::where('order', '4')->where('is_active', '1')->get();
        $middlemenu_5 = Middlemenu::where('order', '5')->where('is_active', '1')->get();
        ;
        //main menu
        $Mainmenu_1 = Mainmenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_2 = Mainmenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_3 = Mainmenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_4 = Mainmenu::where('order', '4')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_5 = Mainmenu::where('order', '5')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_6 = Mainmenu::where('order', '6')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for Mainmenu
        $Mainmenu_1_sub = Mainmenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_2_sub = Mainmenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_3_sub = Mainmenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_4_sub = Mainmenu::where('order', '4')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_5_sub = Mainmenu::where('order', '5')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_6_sub = Mainmenu::where('order', '6')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        //footer menu
        $footermenu_1 = Footermenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_2 = Footermenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_3 = Footermenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for footer
        $footermenu_1_sub = Footermenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_2_sub = Footermenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_3_sub = Footermenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();

        $footerContact = Contact::where('id', '1')->get();
        //Bootom footer copyright section
        $Bootomfooter = BottomFooter::where('id', '1')->get();
        //HealthTip Section
        $HealthTip = HealthTip::all();
        //Know Imc section
        $Know_Imc = Know_Imc::all();
        //News and update section
        $News = News::all();
        //Testimonies section
        $testimonies = testimonies::all();
        //Awards section
        $Award = Award::all();
        //Affiliates Section
        $Affiliates = Affiliate::all();
        //slider section content
        $slider = slider::all();
        $Settings = Setting::all();
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $data = About::where('id', '2')->orderBy('id', 'desc')->first();
        $view = 'about.contact';
        $contentsddd = Pagesection::where('page', 'privacy')->get();
        $content = array();
        foreach ($contentsddd as $a) {
            $content[$a->section] = $a->toArray();
        }
        // $language=$helper->getLanguage();// Retrieving value "laravel-nepal" using key "name"
        $language = 'ar';
        if ($language != "en") {
            $title = "Contact Us";
        } else {
            $title = "Contact Us";
        }
        return view('gp.' . $view, compact('title', 'Settings', 'content', 'language', 'data', 'getpage', 'getHeaderMenus', 'getFooterMenus', 'lang', 'topmenu_1', 'topmenu_2', 'topmenu_3', 'topmenu_4', 'middlemenu_1', 'middlemenu_2', 'middlemenu_3', 'middlemenu_4', 'middlemenu_5', 'Mainmenu_1', 'Mainmenu_2', 'Mainmenu_3', 'Mainmenu_4', 'Mainmenu_5', 'Mainmenu_6', 'footermenu_1', 'footermenu_2', 'footermenu_3', 'footerContact', 'Bootomfooter', 'Know_Imc', 'News', 'testimonies', 'Award', 'Affiliates', 'slider', 'footermenu_1_sub', 'footermenu_2_sub', 'footermenu_3_sub', 'Mainmenu_1_sub', 'Mainmenu_2_sub', 'Mainmenu_3_sub', 'Mainmenu_4_sub', 'Mainmenu_5_sub', 'Mainmenu_6_sub'));
    }

    public function contsave(Request $request) {
        $helper = new Helpers();
        $validator = Validator::make($request->all(), [
                    'name' => 'required|regex:/^[\pL\s\-]+$/u|max:500',
                    'email' => 'required|email|max:255|unique:contact_us,email,',
                    'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                    'subject' => 'required|regex:/^[\pL\s\-]+$/u|max:500',
                    'message' => 'required|regex:/^[\pL\s\-]+$/u|max:5000',
                        ]
        );
        if ($validator->fails()) {
            $errormes = [];
            if ($validator->errors()->has('name')) {
                $errormes['name'] = $validator->errors()->first('name');
            }
            if ($validator->errors()->has('email')) {
                $errormes['email'] = $validator->errors()->first('email');
            }
            if ($validator->errors()->has('mobile')) {
                $errormes['mobile'] = $validator->errors()->first('mobile');
            }
            if ($validator->errors()->has('subject')) {
                $errormes['subject'] = $validator->errors()->first('subject');
            }
            if ($validator->errors()->has('message')) {
                $errormes['message'] = $validator->errors()->first('message');
            }
            return response()->json(['error' => $errormes]);
        } else {
            $data = Contactus::create($request->all());
            if (!empty($data)) {
                echo $data;
            } else {
                echo "0";
            }
        }
    }

    public function showprivacy($slug = null, $lang = null) {
        $helper = new Helpers();
        $getHeaderFooter = $helper->getHeaderFooter();
        $getHeaderMenus = $getHeaderFooter['header'];
        $getFooterMenus = $getHeaderFooter['footer'];
        $lang = $lang;
        $topmenu_1 = Topmenu::where('order', '1')->get();
        $topmenu_2 = Topmenu::where('order', '2')->get();
        $topmenu_3 = Topmenu::where('order', '3')->get();
        $topmenu_4 = Topmenu::where('order', '4')->get();
        //middlemenus
        $middlemenu_1 = Middlemenu::where('order', '1')->where('is_active', '1')->get();
        $middlemenu_2 = Middlemenu::where('order', '2')->where('is_active', '1')->get();
        $middlemenu_3 = Middlemenu::where('order', '3')->where('is_active', '1')->get();
        $middlemenu_4 = Middlemenu::where('order', '4')->where('is_active', '1')->get();
        $middlemenu_5 = Middlemenu::where('order', '5')->where('is_active', '1')->get();
        ;
        //main menu
        $Mainmenu_1 = Mainmenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_2 = Mainmenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_3 = Mainmenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_4 = Mainmenu::where('order', '4')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_5 = Mainmenu::where('order', '5')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_6 = Mainmenu::where('order', '6')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for Mainmenu
        $Mainmenu_1_sub = Mainmenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_2_sub = Mainmenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_3_sub = Mainmenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_4_sub = Mainmenu::where('order', '4')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_5_sub = Mainmenu::where('order', '5')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_6_sub = Mainmenu::where('order', '6')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        //footer menu
        $footermenu_1 = Footermenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_2 = Footermenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_3 = Footermenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for footer
        $footermenu_1_sub = Footermenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_2_sub = Footermenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_3_sub = Footermenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();

        $footerContact = Contact::where('id', '1')->get();
        //Bootom footer copyright section
        $Bootomfooter = BottomFooter::where('id', '1')->get();
        //HealthTip Section
        $HealthTip = HealthTip::all();
        //Know Imc section
        $Know_Imc = Know_Imc::all();
        //News and update section
        $News = News::all();
        //Testimonies section
        $testimonies = testimonies::all();
        //Awards section
        $Award = Award::all();
        //Affiliates Section
        $Affiliates = Affiliate::all();
        //slider section content
        $slider = slider::all();
        $Settings = Setting::all();
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $data = About::where('id', '2')->orderBy('id', 'desc')->first();
        $view = 'about.list';
        $contentsddd = Pagesection::where('page', 'privacy')->get();
        $content = array();
        foreach ($contentsddd as $a) {
            $content[$a->section] = $a->toArray();
        }
        // $language=$helper->getLanguage();// Retrieving value "laravel-nepal" using key "name"
        $language = 'ar';
        if ($language != "en") {
            $title = "سياسة الخصوصية IMC";
        } else {
            $title = "Privacy Policy IMC";
        }
        $getpage = $helper->getPagedata('social-media-policy');
        $basedata = "";
        return view('gp.' . $view, compact('getpage', 'basedata', 'Settings', 'content', 'language', 'data', 'getpage', 'getHeaderMenus', 'getFooterMenus', 'lang', 'topmenu_1', 'topmenu_2', 'topmenu_3', 'topmenu_4', 'middlemenu_1', 'middlemenu_2', 'middlemenu_3', 'middlemenu_4', 'middlemenu_5', 'Mainmenu_1', 'Mainmenu_2', 'Mainmenu_3', 'Mainmenu_4', 'Mainmenu_5', 'Mainmenu_6', 'footermenu_1', 'footermenu_2', 'footermenu_3', 'footerContact', 'Bootomfooter', 'Know_Imc', 'News', 'testimonies', 'Award', 'Affiliates', 'slider', 'footermenu_1_sub', 'footermenu_2_sub', 'footermenu_3_sub', 'Mainmenu_1_sub', 'Mainmenu_2_sub', 'Mainmenu_3_sub', 'Mainmenu_4_sub', 'Mainmenu_5_sub', 'Mainmenu_6_sub'));
    }

    public function showmedical() {
        $helper = new Helpers();
        $getHeaderFooter = $helper->getHeaderFooter();
        $getHeaderMenus = $getHeaderFooter['header'];
        $getFooterMenus = $getHeaderFooter['footer'];

        $topmenu_1 = Topmenu::where('order', '1')->get();
        $topmenu_2 = Topmenu::where('order', '2')->get();
        $topmenu_3 = Topmenu::where('order', '3')->get();
        $topmenu_4 = Topmenu::where('order', '4')->get();
        //middlemenus
        $middlemenu_1 = Middlemenu::where('order', '1')->where('is_active', '1')->get();
        $middlemenu_2 = Middlemenu::where('order', '2')->where('is_active', '1')->get();
        $middlemenu_3 = Middlemenu::where('order', '3')->where('is_active', '1')->get();
        $middlemenu_4 = Middlemenu::where('order', '4')->where('is_active', '1')->get();
        $middlemenu_5 = Middlemenu::where('order', '5')->where('is_active', '1')->get();
        ;
        //main menu
        $Mainmenu_1 = Mainmenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_2 = Mainmenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_3 = Mainmenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_4 = Mainmenu::where('order', '4')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_5 = Mainmenu::where('order', '5')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_6 = Mainmenu::where('order', '6')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for Mainmenu
        $Mainmenu_1_sub = Mainmenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_2_sub = Mainmenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_3_sub = Mainmenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_4_sub = Mainmenu::where('order', '4')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_5_sub = Mainmenu::where('order', '5')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_6_sub = Mainmenu::where('order', '6')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        //footer menu
        $footermenu_1 = Footermenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_2 = Footermenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_3 = Footermenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for footer
        $footermenu_1_sub = Footermenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_2_sub = Footermenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_3_sub = Footermenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();

        $footerContact = Contact::where('id', '1')->get();
        //Bootom footer copyright section
        $Bootomfooter = BottomFooter::where('id', '1')->get();
        //HealthTip Section
        $HealthTip = HealthTip::all();
        //Know Imc section
        $Know_Imc = Know_Imc::all();
        //News and update section
        $News = News::all();
        //Testimonies section
        $testimonies = testimonies::all();
        //Awards section
        $Award = Award::all();
        //Affiliates Section
        $Affiliates = Affiliate::all();
        //slider section content
        $slider = slider::all();

        $Settings = Setting::all();

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));

        $data = Page::where('slug', 'medical-disclaimer')->first();

        //session()->put('language', 'en');
        // $language=$helper->getLanguage();// Retrieving value "laravel-nepal" using key "name"
        // Retrieving value "laravel-nepal" using key "name"
        return view('custom', compact('Settings', 't', 'language', 'data', 'getpage', 'getHeaderMenus', 'getFooterMenus', 'lang', 'topmenu_1', 'topmenu_2', 'topmenu_3', 'topmenu_4', 'middlemenu_1', 'middlemenu_2', 'middlemenu_3', 'middlemenu_4', 'middlemenu_5', 'Mainmenu_1', 'Mainmenu_2', 'Mainmenu_3', 'Mainmenu_4', 'Mainmenu_5', 'Mainmenu_6', 'footermenu_1', 'footermenu_2', 'footermenu_3', 'footerContact', 'Bootomfooter', 'Know_Imc', 'News', 'testimonies', 'Award', 'Affiliates', 'slider', 'footermenu_1_sub', 'footermenu_2_sub', 'footermenu_3_sub', 'Mainmenu_1_sub', 'Mainmenu_2_sub', 'Mainmenu_3_sub', 'Mainmenu_4_sub', 'Mainmenu_5_sub', 'Mainmenu_6_sub', 'data'));
    }

    public function showsitemap($slug = null, $lang = null) {
        $helper = new Helpers();
        $getHeaderFooter = $helper->getHeaderFooter();
        $getHeaderMenus = $getHeaderFooter['header'];
        $getFooterMenus = $getHeaderFooter['footer'];
        $lang = $lang;
        $topmenu_1 = Topmenu::where('order', '1')->get();
        $topmenu_2 = Topmenu::where('order', '2')->get();
        $topmenu_3 = Topmenu::where('order', '3')->get();
        $topmenu_4 = Topmenu::where('order', '4')->get();
        //middlemenus
        $middlemenu_1 = Middlemenu::where('order', '1')->where('is_active', '1')->get();
        $middlemenu_2 = Middlemenu::where('order', '2')->where('is_active', '1')->get();
        $middlemenu_3 = Middlemenu::where('order', '3')->where('is_active', '1')->get();
        $middlemenu_4 = Middlemenu::where('order', '4')->where('is_active', '1')->get();
        $middlemenu_5 = Middlemenu::where('order', '5')->where('is_active', '1')->get();
        ;
        //main menu
        $Mainmenu_1 = Mainmenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_2 = Mainmenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_3 = Mainmenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_4 = Mainmenu::where('order', '4')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_5 = Mainmenu::where('order', '5')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_6 = Mainmenu::where('order', '6')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for Mainmenu
        $Mainmenu_1_sub = Mainmenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_2_sub = Mainmenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_3_sub = Mainmenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_4_sub = Mainmenu::where('order', '4')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_5_sub = Mainmenu::where('order', '5')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_6_sub = Mainmenu::where('order', '6')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        //footer menu
        $footermenu_1 = Footermenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_2 = Footermenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_3 = Footermenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for footer
        $footermenu_1_sub = Footermenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_2_sub = Footermenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_3_sub = Footermenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footerContact = Contact::where('id', '1')->get();
        //Bootom footer copyright section
        $Bootomfooter = BottomFooter::where('id', '1')->get();
        //HealthTip Section
        $HealthTip = HealthTip::all();
        //Know Imc section
        $Know_Imc = Know_Imc::all();
        //News and update section
        $News = News::all();
        //Testimonies section
        $testimonies = testimonies::all();
        //Awards section
        $Award = Award::all();
        //Affiliates Section
        $Affiliates = Affiliate::all();
        //slider section content
        $slider = slider::all();
        $Settings = Setting::all();
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $data = Mainmenu::orderBy('order', 'asc')->where('parent_id', '0')->where('is_active', '1')->get();
        $topmenu = Topmenu::orderBy('order', 'asc')->where('order', '!=', '6')->where('is_active', '1')->get();
        $view = 'map.list';
        $t = About::where('id', '2')->first();
        $exactvalues = 't';
        // $language=$helper->getLanguage();// Retrieving value "laravel-nepal" using key "name"
        $language = 'ar';
        if ($language != "en") {
            $title = "خريطة الموقع";
        } else {
            $title = "Site Map";
        }
        return view('gp.' . $view, compact('Settings', 'topmenu', 'title', 't', 'language', 'data', 'getpage', 'getHeaderMenus', 'getFooterMenus', 'lang', 'topmenu_1', 'topmenu_2', 'topmenu_3', 'topmenu_4', 'middlemenu_1', 'middlemenu_2', 'middlemenu_3', 'middlemenu_4', 'middlemenu_5', 'Mainmenu_1', 'Mainmenu_2', 'Mainmenu_3', 'Mainmenu_4', 'Mainmenu_5', 'Mainmenu_6', 'footermenu_1', 'footermenu_2', 'footermenu_3', 'footerContact', 'Bootomfooter', 'Know_Imc', 'News', 'testimonies', 'Award', 'Affiliates', 'slider', 'footermenu_1_sub', 'footermenu_2_sub', 'footermenu_3_sub', 'Mainmenu_1_sub', 'Mainmenu_2_sub', 'Mainmenu_3_sub', 'Mainmenu_4_sub', 'Mainmenu_5_sub', 'Mainmenu_6_sub'));
    }

    /* delete single page from this function */

    public function updtestatuss($status, $id) {
        $page = \App\Section::find($id);
        $result = $page->update(['is_enable' => $status]);
        if ($result) {
            $message = "Section deleted successfully";
            $returnStatus = 1;
        } else {
            $message = "Unable to delete this Section";
            $returnStatus = 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }

    // send email on home page subsribe option
    public function subscribeemail($email) {
        // $language = (Session::has("language"))?Session::get("language"):'en';
        $language = 'ar';
        if ($language == "ar") {
            $message = "تم الاشتراك بنجاح في النشرة الإخبارية";
        } else {
            $message = "subscribe for newsletter has been  submmited successfully.";
        }
        Subscribe::insertGetId(['email' => $email]);
        return json_encode(array('status' => "1", 'message' => $message));
    }

//
    public function showmayoclinic($slug = null, $lang = null) {
        $helper = new Helpers();
        $getHeaderFooter = $helper->getHeaderFooter();
        $getHeaderMenus = $getHeaderFooter['header'];
        $getFooterMenus = $getHeaderFooter['footer'];
        $lang = $lang;
        $topmenu_1 = Topmenu::where('order', '1')->get();
        $topmenu_2 = Topmenu::where('order', '2')->get();
        $topmenu_3 = Topmenu::where('order', '3')->get();
        $topmenu_4 = Topmenu::where('order', '4')->get();
        //middlemenus
        $middlemenu_1 = Middlemenu::where('order', '1')->where('is_active', '1')->get();
        $middlemenu_2 = Middlemenu::where('order', '2')->where('is_active', '1')->get();
        $middlemenu_3 = Middlemenu::where('order', '3')->where('is_active', '1')->get();
        $middlemenu_4 = Middlemenu::where('order', '4')->where('is_active', '1')->get();
        $middlemenu_5 = Middlemenu::where('order', '5')->where('is_active', '1')->get();
        ;
        //main menu
        $Mainmenu_1 = Mainmenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_2 = Mainmenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_3 = Mainmenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_4 = Mainmenu::where('order', '4')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_5 = Mainmenu::where('order', '5')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_6 = Mainmenu::where('order', '6')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for Mainmenu
        $Mainmenu_1_sub = Mainmenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_2_sub = Mainmenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_3_sub = Mainmenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_4_sub = Mainmenu::where('order', '4')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_5_sub = Mainmenu::where('order', '5')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_6_sub = Mainmenu::where('order', '6')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        //footer menu
        $footermenu_1 = Footermenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_2 = Footermenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_3 = Footermenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for footer
        $footermenu_1_sub = Footermenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_2_sub = Footermenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_3_sub = Footermenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();

        $footerContact = Contact::where('id', '1')->get();
        //Bootom footer copyright section
        $Bootomfooter = BottomFooter::where('id', '1')->get();
        //HealthTip Section
        $HealthTip = HealthTip::all();
        //Know Imc section
        $Know_Imc = Know_Imc::all();
        //News and update section
        $News = News::all();
        //Testimonies section
        $testimonies = testimonies::all();
        //Awards section
        $Award = Award::all();
        //Affiliates Section
        $Affiliates = Affiliate::all();
        //slider section content
        $slider = slider::all();
        $Settings = Setting::all();
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $data = Mayo::where('is_active', '1')->orderBy('id', 'desc')->get();
        $view = 'mayo.list';
        $t = "";
        $contentsddd = Pagesection::where('page', 'mayo')->get();
        $content = array();
        foreach ($contentsddd as $a) {
            $content[$a->section] = $a->toArray();
        }
        $exactvalues = 't';
        //$language=$helper->getLanguage();
        $language = 'ar';
        return view('gp.' . $view, compact('content', 'Settings', 't', 'language', 'data', 'getHeaderMenus', 'getFooterMenus', 'lang', 'topmenu_1', 'topmenu_2', 'topmenu_3', 'topmenu_4', 'middlemenu_1', 'middlemenu_2', 'middlemenu_3', 'middlemenu_4', 'middlemenu_5', 'Mainmenu_1', 'Mainmenu_2', 'Mainmenu_3', 'Mainmenu_4', 'Mainmenu_5', 'Mainmenu_6', 'footermenu_1', 'footermenu_2', 'footermenu_3', 'footerContact', 'Bootomfooter', 'Know_Imc', 'News', 'testimonies', 'Award', 'Affiliates', 'slider', 'footermenu_1_sub', 'footermenu_2_sub', 'footermenu_3_sub', 'Mainmenu_1_sub', 'Mainmenu_2_sub', 'Mainmenu_3_sub', 'Mainmenu_4_sub', 'Mainmenu_5_sub', 'Mainmenu_6_sub'));
    }

    public function custompage($slug = null, $lang = null) {
        $helper = new Helpers();
        $getHeaderFooter = $helper->getHeaderFooter();
        $getHeaderMenus = $getHeaderFooter['header'];
        $getFooterMenus = $getHeaderFooter['footer'];

        $lang = $lang;
        $topmenu_1 = Topmenu::where('order', '1')->get();
        $topmenu_2 = Topmenu::where('order', '2')->get();
        $topmenu_3 = Topmenu::where('order', '3')->get();
        $topmenu_4 = Topmenu::where('order', '4')->get();
        //middlemenus
        $middlemenu_1 = Middlemenu::where('order', '1')->where('is_active', '1')->get();
        $middlemenu_2 = Middlemenu::where('order', '2')->where('is_active', '1')->get();
        $middlemenu_3 = Middlemenu::where('order', '3')->where('is_active', '1')->get();
        $middlemenu_4 = Middlemenu::where('order', '4')->where('is_active', '1')->get();
        $middlemenu_5 = Middlemenu::where('order', '5')->where('is_active', '1')->get();
        ;
        //main menu
        $Mainmenu_1 = Mainmenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_2 = Mainmenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_3 = Mainmenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_4 = Mainmenu::where('order', '4')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_5 = Mainmenu::where('order', '5')->where('parent_id', '0')->where('is_active', '1')->get();
        $Mainmenu_6 = Mainmenu::where('order', '6')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for Mainmenu
        $Mainmenu_1_sub = Mainmenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_2_sub = Mainmenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_3_sub = Mainmenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_4_sub = Mainmenu::where('order', '4')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_5_sub = Mainmenu::where('order', '5')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $Mainmenu_6_sub = Mainmenu::where('order', '6')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        //footer menu
        $footermenu_1 = Footermenu::where('order', '1')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_2 = Footermenu::where('order', '2')->where('parent_id', '0')->where('is_active', '1')->get();
        $footermenu_3 = Footermenu::where('order', '3')->where('parent_id', '0')->where('is_active', '1')->get();
        //submenu for footer
        $footermenu_1_sub = Footermenu::where('order', '1')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_2_sub = Footermenu::where('order', '2')->where('parent_id', '!=', '0')->where('is_active', '1')->get();
        $footermenu_3_sub = Footermenu::where('order', '3')->where('parent_id', '!=', '0')->where('is_active', '1')->get();

        $footerContact = Contact::where('id', '1')->get();
        //Bootom footer copyright section
        $Bootomfooter = BottomFooter::where('id', '1')->get();
        //HealthTip Section
        $HealthTip = HealthTip::all();
        //Know Imc section
        $Know_Imc = Know_Imc::all();
        //News and update section
        $News = News::all();
        //Testimonies section
        $testimonies = testimonies::all();
        //Awards section
        $Award = Award::all();
        //Affiliates Section
        $Affiliates = Affiliate::all();
        //slider section content
        $slider = slider::all();

        $Settings = Setting::all();

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        if (!empty($slug)) {
            if (request()->segment(1) == "en") {
                $data = Page::where('slug', $slug)->first();
                if (empty($data)) {
                    $data = Page::where('slug_ar', $slug)->first();
                    if (empty($data)) {
                        return redirect('/en/404');
                    }
                    return redirect('/en/' . $data['slug']);
                }
                $language = "en";
            } else if (request()->segment(1) == "ar") {
                $data = Page::where('slug_ar', $slug)->first();
                if (empty($data)) {
                    $data = Page::where('slug', $slug)->first();
                    if (empty($data)) {
                        return redirect('/ar/404');
                    }
                    return redirect('/ar/' . $data['slug_ar']);
                }
                $language = "ar";
            } else {
                $data = Page::where('slug', $slug)->first();
                if (empty($data)) {
                    $data = Page::where('slug_ar', $slug)->first();
                    if (empty($data)) {
                        return redirect('/en/404');
                    }
                    return redirect('/en/' . $data['slug']);
                }
                $language = "en";
            }
        }

        //session()->put('language', 'en');
        // $language=$helper->getLanguage();// Retrieving value "laravel-nepal" using key "name"
        // Retrieving value "laravel-nepal" using key "name"
        $language = 'ar';
        return view('page', compact('Settings', 't', 'language', 'data', 'getpage', 'getHeaderMenus', 'getFooterMenus', 'lang', 'topmenu_1', 'topmenu_2', 'topmenu_3', 'topmenu_4', 'middlemenu_1', 'middlemenu_2', 'middlemenu_3', 'middlemenu_4', 'middlemenu_5', 'Mainmenu_1', 'Mainmenu_2', 'Mainmenu_3', 'Mainmenu_4', 'Mainmenu_5', 'Mainmenu_6', 'footermenu_1', 'footermenu_2', 'footermenu_3', 'footerContact', 'Bootomfooter', 'Know_Imc', 'News', 'testimonies', 'Award', 'Affiliates', 'slider', 'footermenu_1_sub', 'footermenu_2_sub', 'footermenu_3_sub', 'Mainmenu_1_sub', 'Mainmenu_2_sub', 'Mainmenu_3_sub', 'Mainmenu_4_sub', 'Mainmenu_5_sub', 'Mainmenu_6_sub', 'data'));
    }

    // Start Api================================================================== Start API


    public function deplist(Request $request) {
        $helper = new Helpers();

        if (request()->header('accept-language') != 'ar') {
            if (!empty($request['name'])) {
                $department = Department::where('title_en', 'LIKE', $request['name'] . '%')->where('status', 1)->orderBy('title_en', 'asc')->paginate(10)->toArray();
            } else {
                $department = Department::where('status', 1)->orderBy('title_en', 'asc')->paginate(10)->toArray();
            }
        } else {

            if (!empty($request['name'])) {
                $department = Department::where(\DB::raw("TRIM(title_ar)"), 'LIKE', $request['name'] . '%')->where('status', 1)->orderby(\DB::raw("TRIM(title_ar)"), 'asc')->paginate(10)->toArray();
            } else {
                $department = Department::where('status', 1)->orderby(\DB::raw("TRIM(title_ar)"), 'asc')->paginate(10)->toArray();
            }
        }



        if (isset($department['data']) and ! empty($department['data'])) {
            $i = 0;
            foreach ($department['data'] as $key) {
                $enImage = $helper->getImage($key['media_id']);
                $department['data'][$i]['image'] = env('BASE_URL') . $enImage;
                $i++;
            }

            $response['data'] = $department;
            $response['status'] = true;
            $response['message'] = "Data Found";
        } else {
            $response['status'] = false;
            $response['message'] = "Data Not Found";
        }

        return response()->json($response, 200);
    }

    public function doctorlist($d_id) {
        $helper = new Helpers();


        $doctor = Doctor::where(['department_id' => $d_id, 'isactive' => 1])->get()->toArray();
        if (isset($doctor) and ! empty($doctor)) {
            $i = 0;
            foreach ($doctor as $key) {
                $enImage = $helper->getImage($key['media_id_en']);
                if (!empty($enImage)) {
                    $doctor[$i]['imgUrl'] = env('BASE_URL') . $enImage;
                } else {
                    $doctor[$i]['imgUrl'] = url('images/doctors/9a96876e2f8f3dc4f3cf45f02c61c0c1d16fb36f0911f878998c136191af705e21102019123252_1111.png');
                }
                $i++;
            }
            $response['data'] = $doctor;
            $response['status'] = true;
            $response['message'] = "Data Found";
        } else {

            $response['status'] = false;
            $response['message'] = "Data Not Found";
        }

        return response()->json($response, 200);
    }

    public function doctorinfo($id) {
        $helper = new Helpers();
        $id = (int) $id; //string to int
        $doctor = Doctor::where(['docCode' => $id, 'isactive' => 1])->get()->toArray();
        if (isset($doctor) and ! empty($doctor)) {
            $i = 0;
            foreach ($doctor as $key) {

                $education = Doctor_education::where('doctor_id', $key['id'])->get();
                $doctor[$i]['education'] = $education;
                $languagesID = Doctor_language::where('doctor_id', $key['id'])->pluck('language_id')->all();
                $alllanguages = Language::whereIn('id', $languagesID)->get();
                $doctor[$i]['language'] = $alllanguages;
                $de = Department::where('id', $key['department_id'])->first();
                if (!empty($de)) {
                    $doctor[$i]['departments'] = $de;
                } else {
                    $doctor[$i]['departments'] = "";
                }
                $enImage = $helper->getImage($key['media_id_en']);

                if (!empty($enImage)) {
                    $doctor[$i]['imgUrl'] = env('BASE_URL') . $enImage;
                } else {
                    $doctor[$i]['imgUrl'] = url('images/doctors/9a96876e2f8f3dc4f3cf45f02c61c0c1d16fb36f0911f878998c136191af705e21102019123252_1111.png');
                }
                $i++;
            }
            $response['data'] = $doctor;
            $response['status'] = true;
            $response['message'] = "Data Found";
        } else {
            $response['status'] = false;
            $response['message'] = "Data Not Found";
        }

        return response()->json($response, 200);
    }

    public function doctorinfo_old($id) {
        $helper = new Helpers();

        $doctor = Doctor::where(['docCode' => $id, 'isactive' => 1])->get()->toArray();
        if (isset($doctor) and ! empty($doctor)) {
            $i = 0;
            foreach ($doctor as $key) {
                $de = Department::where('id', $key['department_id'])->first();
                if (!empty($de)) {
                    $doctor[$i]['departments'] = $de;
                } else {
                    $doctor[$i]['departments'] = "";
                }
                $enImage = $helper->getImage($key['media_id_en']);

                if (!empty($enImage)) {
                    $doctor[$i]['imgUrl'] = env('BASE_URL') . $enImage;
                } else {
                    $doctor[$i]['imgUrl'] = url('images/doctors/9a96876e2f8f3dc4f3cf45f02c61c0c1d16fb36f0911f878998c136191af705e21102019123252_1111.png');
                }
                $i++;
            }
            $response['data'] = $doctor;
            $response['status'] = true;
            $response['message'] = "Data Found";
        } else {
            $response['status'] = false;
            $response['message'] = "Data Not Found";
        }

        return response()->json($response, 200);
    }

    public function doctordetail($id) {
        $helper = new Helpers();

        $doctor = Doctor::where(['id' => $id, 'isactive' => 1])->get()->toArray();
        if (isset($doctor) and ! empty($doctor)) {
            $i = 0;
            foreach ($doctor as $key) {
                $enImage = $helper->getImage($key['media_id_en']);

                if (!empty($enImage)) {
                    $doctor[$i]['imgUrl'] = env('BASE_URL') . $enImage;
                } else {
                    $doctor[$i]['imgUrl'] = url('images/doctors/9a96876e2f8f3dc4f3cf45f02c61c0c1d16fb36f0911f878998c136191af705e21102019123252_1111.png');
                }
                $i++;
            }
            $response['data'] = $doctor;
            $response['status'] = true;
            $response['message'] = "Data Found";
        } else {
            $response['status'] = false;
            $response['message'] = "Data Not Found";
        }

        return response()->json($response, 200);
    }

    public function alldoctor($perpage) {
        $helper = new Helpers();
        $data = Doctor::paginate($perpage)->toArray();

        if (!empty($data['data'])) {

            $i = 0;
            foreach ($data['data'] as $key) {

                $enImage = $helper->getImage($key['media_id_en']);
                if (!empty($enImage)) {
                    $data['data'][$i]['imgUrl'] = env('BASE_URL') . $enImage;
                } else {
                    $data['data'][$i]['imgUrl'] = url('images/doctors/9a96876e2f8f3dc4f3cf45f02c61c0c1d16fb36f0911f878998c136191af705e21102019123252_1111.png');
                }
                $i++;
            }

            $response['data'] = $data;
            $response['status'] = true;
            $response['message'] = "Data Found";
        } else {

            $response['status'] = false;
            $response['message'] = "Data Not Found";
        }

        return response()->json($response, 200);
    }

    public function language() {
        $data = Language::get()->toArray();
        if (!empty($data)) {
            $response['data'] = $data;
            $response['status'] = true;
            $response['message'] = "Data Found";
        } else {
            $response['status'] = false;
            $response['message'] = "Data Not Found";
        }
        return response()->json($response, 200);
    }

    public function departmentlist() {

        $data = Department::select('title_en', 'title_ar', 'id')->get()->toArray();

        if (!empty($data) and sizeof($data)) {
            $response['data'] = $data;
            $response['status'] = true;
            $response['message'] = "Data Found";
        } else {
            $response['status'] = false;
            $response['message'] = "Data Not Found";
        }
        return response()->json($response, 200);
    }

    public function searchDoctor(Request $request) {
        $helper = new Helpers();
        if (request()->header('accept-language') == 'ar') {

            if (!empty($request->doctorname) && !empty($request->department_id) && empty($request->language)) {

                $data = Doctor::where('department_id', $request->department_id)
                                ->where(($request->lng == "en") ? "givenName" : "givenNameAr", "like", "%" . $request->doctorname . "%")->where('isactive', '1')->paginate(10)->toArray();
            } elseif (!empty($request->doctorname) && !empty($request->department_id) and ! empty($request->language)) {

                $data = Doctor::select('doctors.title', 'doctors.titleAr', 'doctors.givenName', 'doctors.givenNameAr', 'doctors.titleDesc', 'doctors.department_id', 'doctors.imgUrl', 'doctors.expYears', 'doctor_languages.id', 'doctors.expYears', 'doctors.id as d_id', 'doctors.id')
                                ->join("doctor_languages", "doctor_languages.doctor_id", "doctors.id")
                                ->where("language_id", $request->language)
                                ->where('doctors.department_id', $request->department_id)
                                ->where('doctors.isactive', '1')
                                ->paginate(10)->toArray();
            } elseif (isset($request->language) && isset($request->doctorname) && $request->language != "" && $request->doctorname != "" && !empty($request->language)) {
                $data = Doctor::select('doctors.title', 'doctors.titleAr', 'doctors.givenName', 'doctors.givenNameAr', 'doctors.titleDesc', 'doctors.department_id', 'doctors.imgUrl', 'doctors.expYears', 'doctor_languages.id', 'doctors.expYears', 'doctors.id as d_id', 'doctors.id', 'doctors.specialitiesTxt', 'doctors.specialitiesTxtAr')->
                                join("doctor_languages", "doctor_languages.doctor_id", "doctors.id")
                                ->where("language_id", $request->language)
                                ->where(($request->lng == "en") ? "givenName" : "givenNameAr", "like", "%" . $request->doctorname . "%")
                                ->where('isactive', '1')->orderby(\DB::raw("TRIM(givenNameAr)"), 'asc')
                                ->paginate(10)->toArray();
            } elseif (!empty($request->department_id) and ! empty($request->language)) {

                $data = Doctor::select('doctors.title', 'doctors.givenName', 'doctors.givenNameAr', 'doctors.titleDesc', 'doctors.department_id', 'doctors.imgUrl', 'doctors.expYears', 'doctor_languages.id', 'doctors.expYears', 'doctors.id as d_id', 'doctors.id', 'doctors.specialitiesTxt', 'doctors.specialitiesTxtAr')->
                                join("doctor_languages", "doctor_languages.doctor_id", "doctors.id")
                                ->where("language_id", $request->language)->where('doctors.department_id', $request->department_id)
                                ->where('isactive', '1')->orderby(\DB::raw("TRIM(givenNameAr)"), 'asc')
                                ->paginate(10)->toArray();
            } elseif (isset($request->language) && $request->language != "") {
                $data = Doctor::select('doctors.title', 'doctors.titleAr', 'doctors.givenName', 'doctors.givenNameAr', 'doctors.titleDesc', 'doctors.department_id', 'doctors.imgUrl', 'doctors.expYears', 'doctor_languages.id', 'doctors.expYears', 'doctors.id as d_id', 'doctors.id', 'doctors.specialitiesTxt', 'doctors.specialitiesTxtAr')->
                                join("doctor_languages", "doctor_languages.doctor_id", "doctors.id")
                                ->where("language_id", $request->language)
                                ->where('isactive', '1')->orderby(\DB::raw("TRIM(givenNameAr)"), 'asc')
                                ->paginate(10)->toArray();
            } elseif (isset($request->doctorname) && $request->doctorname != "") {

                $data = Doctor::where(($request->lng == "en") ? "givenName" : "givenNameAr", "like", "%" . $request->doctorname . "%")->where('isactive', '1')->orderby(\DB::raw("TRIM(givenNameAr)"), 'asc')
                                ->paginate(10)->toArray();
            } elseif (!empty(request()->segment(3))) {

                if (request()->segment(3) == "ا") {
                    $data = Doctor::where(\DB::raw("TRIM(givenNameAr)"), 'like', 'أ%')->orWhere(\DB::raw("TRIM(givenNameAr)"), 'like', 'ء%')->orWhere(\DB::raw("TRIM(givenNameAr)"), 'like', 'ا%')->orWhere(\DB::raw("TRIM(givenNameAr)"), 'like', 'إ%')->orWhere(\DB::raw("TRIM(givenNameAr)"), 'like', 'آ%')->where('isactive', '1')->orderby(\DB::raw("TRIM(givenNameAr)"), 'asc')->paginate(10)->toArray();
                } else {
                    $data = Doctor::where(\DB::raw("TRIM(givenNameAr)"), 'like', request()->segment(3) . '%')->where('isactive', '1')->orderby(\DB::raw("TRIM(givenNameAr)"), 'asc')->paginate(10)->toArray();
                }
            } elseif (!empty($request->department_id)) {
                $data = Doctor::where('department_id', $request->department_id)->where('isactive', '1')->orderby(\DB::raw("TRIM(givenNameAr)"), 'asc')->paginate(10)->toArray();
            } else {
                $data = Doctor::where('isactive', '1')->orderby(\DB::raw("TRIM(givenNameAr)"), 'asc')->paginate(10)->toArray();
            }
        } else {

            if (!empty($request->doctorname) && !empty($request->department_id) && empty($request->language)) {

                $data = Doctor::where('department_id', $request->department_id)
                                ->where("givenName", "like", "%" . $request->doctorname . "%")->where('isactive', '1')->orderBy('givenName', 'asc')->paginate(10)->toArray();
            } elseif (!empty($request->doctorname) && !empty($request->department_id) and ! empty($request->language)) {

                $data = Doctor::select('doctors.title', 'doctors.givenName', 'doctors.givenNameAr', 'doctors.titleDesc', 'doctors.department_id', 'doctors.imgUrl', 'doctors.expYears', 'doctor_languages.id', 'doctors.expYears', 'doctors.id as d_id', 'doctors.id')
                                ->join("doctor_languages", "doctor_languages.doctor_id", "doctors.id")
                                ->where("language_id", $request->language)
                                ->where('doctors.department_id', $request->department_id)
                                ->where('doctors.isactive', '1')
                                ->paginate(10)->toArray();
            } elseif (isset($request->language) && isset($request->doctorname) && $request->language != "" && $request->doctorname != "" && !empty($request->language)) {


                $data = Doctor::select('doctors.title', 'doctors.givenName', 'doctors.givenNameAr', 'doctors.titleDesc', 'doctors.department_id', 'doctors.imgUrl', 'doctors.expYears', 'doctor_languages.id', 'doctors.expYears', 'doctors.id as d_id', 'doctors.id', 'doctors.specialitiesTxt', 'doctors.specialitiesTxtAr')->
                                join("doctor_languages", "doctor_languages.doctor_id", "doctors.id")
                                ->where("language_id", $request->language)
                                ->where("givenName", "like", "%" . $request->doctorname . "%")
                                ->where('isactive', '1')->orderby("givenName", 'asc')
                                ->paginate(10)->toArray();
            } elseif (!empty($request->department_id) and ! empty($request->language)) {

                $data = Doctor::select('doctors.title', 'doctors.givenName', 'doctors.givenNameAr', 'doctors.titleDesc', 'doctors.department_id', 'doctors.imgUrl', 'doctors.expYears', 'doctor_languages.id', 'doctors.expYears', 'doctors.id as d_id', 'doctors.id', 'doctors.specialitiesTxt', 'doctors.specialitiesTxtAr')->
                                join("doctor_languages", "doctor_languages.doctor_id", "doctors.id")
                                ->where("language_id", $request->language)->where('doctors.department_id', $request->department_id)
                                ->where('isactive', '1')->orderby("givenName", "asc")
                                ->paginate(10)->toArray();
            } elseif (isset($request->language) && $request->language != "") {
                $data = Doctor::select('doctors.title', 'doctors.givenName', 'doctors.givenNameAr', 'doctors.titleDesc', 'doctors.department_id', 'doctors.imgUrl', 'doctors.expYears', 'doctor_languages.id', 'doctors.expYears', 'doctors.id as d_id', 'doctors.id', 'doctors.specialitiesTxt', 'doctors.specialitiesTxtAr')->
                                join("doctor_languages", "doctor_languages.doctor_id", "doctors.id")
                                ->where("language_id", $request->language)
                                ->where('isactive', '1')->orderby(($request->lng == "en") ? "givenName" : "givenNameAr", 'asc')
                                ->paginate(10)->toArray();
            } elseif (isset($request->doctorname) && $request->doctorname != "") {

                $data = Doctor::where("givenName", "like", "%" . $request->doctorname . "%")->where('isactive', '1')->orderby("givenNameAr", 'asc')->paginate(10)->toArray();
            } elseif (!empty(request()->segment(3))) {
                $data = Doctor::where("givenName", 'like', request()->segment(3) . '%')->where('isactive', '1')->orderby("givenName", 'asc')->paginate(10)->toArray();
            } else if (!empty($request->department_id)) {
                $data = Doctor::where('department_id', $request->department_id)->where('isactive', '1')->orderby("givenNameAr", 'asc')->paginate(10)->toArray();
            } else {
                $data = Doctor::where('isactive', '1')->orderby(($request->lng == "en") ? "givenName" : "givenNameAr", 'asc')->paginate(10)->toArray();
            }
        }



        if (!empty($data['data'])) {

            $i = 0;
            foreach ($data['data'] as $key) {
                $enImage = $helper->getImage($key['media_id_en']);
                if (!empty($enImage)) {
                    $data['data'][$i]['imgUrl'] = env('BASE_URL') . $enImage;
                } else {
                    $data['data'][$i]['imgUrl'] = url('images/doctors/9a96876e2f8f3dc4f3cf45f02c61c0c1d16fb36f0911f878998c136191af705e21102019123252_1111.png');
                }
                $i++;
            }

            $response['data'] = $data;
            $response['status'] = true;
            $response['message'] = "Data Found";
        } else {

            $response['status'] = false;
            $response['message'] = "Data Not Found";
        }

        return response()->json($response, 200);
    }

    public function healthcategory() {
        $data = HealthCategory::where('parent_id', 0)->orderBy('name_en', 'asc')->get()->toArray();

        if (!empty($data) and sizeof($data) > 0) {
            $response['data'] = $data;
            $response['status'] = true;
            $response['message'] = "Data Found";
        } else {
            $response['status'] = false;
            $response['message'] = "Data Not Found";
        }
        return response()->json($response, 200);
    }

    public function searchhealttips(Request $request) {

        if (request()->header('accept-language') == 'en') {

            if (!empty($request['name']) && !empty($request['category_id'])) {
                $data = HealthTip::where('category_id', $request['category_id'])->where('title_en', 'like', '%' . $request['name'] . '%')->orderBy('created_at', 'desc')->paginate(5)->toArray();
            } elseif (!empty($request['name'])) {
                $data = HealthTip::where('title_en', 'like', '%' . $request['name'] . '%')->orderBy('created_at', 'desc')->paginate(5)->toArray();
            } elseif (!empty($request['category_id'])) {
                $data = HealthTip::where('category_id', $request['category_id'])->orderBy('created_at', 'desc')->paginate(5)->toArray();
            } else {
                $data = HealthTip::orderBy('created_at', 'desc')->paginate(5)->toArray();
            }
        } else {
            if (!empty($request['name']) && !empty($request['category_id'])) {
                $data = HealthTip::where('category_id', $request['category_id'])->where('title_ar', 'like', '%' . $request['name'] . '%')->orderBy('created_at', 'desc')->paginate(5)->toArray();
            } elseif (!empty($request['name'])) {
                $data = HealthTip::where('title_en', 'like', '%' . $request['title_ar'] . '%')->orderBy('created_at', 'desc')->paginate(5)->toArray();
            } elseif (!empty($request['category_id'])) {
                $data = HealthTip::where('category_id', $request['category_id'])->orderBy('created_at', 'desc')->paginate(5)->toArray();
            } else {
                $data = HealthTip::orderBy('created_at', 'desc')->paginate(5)->toArray();
            }
        }

        if (!empty($data['data']) and sizeof($data['data']) > 0) {
            $response['data'] = $data;
            $response['status'] = true;
            $response['message'] = "Data Found";
        } else {
            $response['status'] = false;
            $response['message'] = "Data Not Found";
        }

        return response()->json($response, 200);
    }

    public function adddoctor(Request $request) {
        $validator = Validator::make($request->all(), [
                    'doctor_code' => 'required',
                    'givenName' => 'required',
                    'deptCode' => 'required',
                    'email' => 'required',
                    'password' => 'required',
                        ], [
                    'doctor_code.required' => 'Doctor code field is required',
                    'givenName.required' => 'Doctor name field is required',
                    'givenNameAr.required' => 'Doctor name Arbic field is required',
        ]);

        if ($validator->fails()) {
            $errormes = [];
            if ($validator->errors()->has('doctor_code')) {
                $errormes[] = $validator->errors()->first('doctor_code');
            }

            if ($validator->errors()->has('givenName')) {
                $errormes[] = $validator->errors()->first('givenName');
            }

            if ($validator->errors()->has('deptCode')) {
                $errormes[] = $validator->errors()->first('deptCode');
            }

            return response()->json(['status' => 'false', 'message' => $errormes[0]]);
            //return response()->json(['error'=> $errormes]);
        } else {
            if ($request['email'] == 'admin@gmail.com' && $request['password'] == '$%^#HFYE@%&&JDSG#@') {
                $ips = Config::get('variable.ALLOWED_IP');
                if (in_array($_SERVER['REMOTE_ADDR'], $ips)) {
                    $doctor = Doctor::where('docCode', $request['doctor_code'])->first();
                    if (!empty($doctor)) {
                        $errormes['doctor_code'] = 'Doctor code already exist';
                        return response()->json(['status' => 'false', 'message' => 'Doctor code already exist']);
                    } else {
                        $depExist = Department::where('id', $request['deptCode'])->first();
                        if (!empty($depExist)) {
                            $array['department_id'] = $request['deptCode'];
                            $array['fathersName'] = $request['fathersName'];
                            $array['fathersNameAr'] = $request['fathersNameAr'];
                            $array['gender'] = $request['gender'];
                            $array['isactive'] = 0;
                            $array['docCode'] = $request['doctor_code'];
                            $array['givenName'] = $request['givenName'];
                            $array['givenNameAr'] = $request['givenNameAr'];
                            $data = Doctor::insertGetID($array);
                            if (!empty($data)) {
                                return response()->json(['status' => 'true', 'message' => 'Data has been submmited successfully.']);
                            }
                        } else {
                            return response()->json(['status' => 'false', 'message' => 'Department Doesnot exist']);
                        }
                    }
                } else {
                    return response()->json(['status' => 'false', 'message' => 'You dont have access to add doctor.']);
                }
            } else {
                return response()->json(['status' => 'false', 'message' => 'Credentials are not matching.']);
            }
        }
    }

    public function doctoractivate(Request $request) {
        $validator = Validator::make($request->all(), [
                    'doctor_code' => 'required',
                    'email' => 'required',
                    'password' => 'required',
                        ], [
                    'doctor_code.required' => 'Doctor code field is required',
        ]);

        if ($validator->fails()) {
            $errormes = [];
            if ($validator->errors()->has('doctor_code')) {
                $errormes[] = $validator->errors()->first('doctor_code');
            }

            return response()->json(['status' => 'false', 'message' => $errormes[0]]);
        } else {
            if ($request['email'] == 'admin@gmail.com' && $request['password'] == '$%^#HFYE@%&&JDSG#@') {
                $ips = Config::get('variable.ALLOWED_IP');
                if (in_array($_SERVER['REMOTE_ADDR'], $ips)) {
                    $doctor = Doctor::where('docCode', $request['doctor_code'])->first();
                    if (!empty($doctor)) {
                        $data = Doctor::where('docCode', $request['doctor_code'])->update(['isactive' => 1]);
                        if (!empty($data)) {
                            return response()->json(['status' => 'true', 'message' => 'Data has been updated successfully.']);
                        }
                    } else {
                        return response()->json(['status' => 'false', 'message' => 'Doctor not  exist']);
                    }
                } else {
                    return response()->json(['status' => 'false', 'message' => 'You dont have access to add doctor.']);
                }
            } else {
                return response()->json(['status' => 'false', 'message' => 'Credentials are not matching.']);
            }
        }
    }

    // Close API================================================================== Close API

    public function infermedica(Request $request) {
        header('Access-Control-Allow-Origin: *');


        $in = $request->all();
        if ($in['method'] == "POST") {
            $curl = curl_init();
            $data_string = json_encode($in['data']);
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.infermedica.com/v2/" . $in['api'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $in['method'],
                CURLOPT_POSTFIELDS => $data_string,
                CURLOPT_HTTPHEADER => array(
                    "App-Id: 7ddd3bdd",
                    "App-Key: e684d6c6c272b0cab4fd905af8df8fb8",
                    "Content-Type: application/json",
                    "Model:" . $in['model'],
                    "Interview-Id:" . $in['interview-id']
                ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            echo $response;
            die;
        } else {

            //  dd($in['api']);
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $in['api'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "App-Id: 7ddd3bdd",
                    "App-Key: e684d6c6c272b0cab4fd905af8df8fb8",
                    "Content-Type: application/json",
                    "Model:" . $in['model'],
                    "Interview-Id:" . $in['interview-id']
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo $response;
            die;
        }
    }

}
