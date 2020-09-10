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
use Illuminate\Routing\Route;
class AboutController extends Controller implements PageInterface
{
    use CommonTrait, UserTrait;


    /*this function will redirect to create page section*/
    /*this function will redirect to create page section*/

    public function create()
    {

    }

   // save page and its details from this function
    public function store(Request $request)
    {

    }

    /* Pages listing will get through this function */
    public function listing(Request $request)
    {

    }


    /*go to edit page from this function*/
    public function editPage($id) {

    }

    /*delete multiple pages*/

    public function deleteMultiplePages(Request $request) {

    }


    /* delete single page from this function */
    public function deleteSinglePage(Request $request)
    {

    }



public function showabout($slug=null,$lang=null){

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
          $Settings=Setting::all();
          $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
          $data= About::where('id','1')->orderBy('id','desc')->first();
          $view='about.listing';
          $t= About::where('id','1')->first();
          $contentsddd= Pagesection::where('page','about')->get();
          $content = array();
          foreach($contentsddd as $a){
              $content[$a->section] = $a->toArray();
          }
          $language=$helper->getLanguage();// Retrieving value "laravel-nepal" using key "name"
          if($language != "en"){
             $title="سياسة الخصوصية IMC";
          }else{
             $title="Privacy Policy IMC";
          }

      return view('gp.'.$view, compact('Settings','content','language','data','getpage','getHeaderMenus', 'getFooterMenus', 'lang','topmenu_1','topmenu_2','topmenu_3','topmenu_4','middlemenu_1','middlemenu_2','middlemenu_3','middlemenu_4','middlemenu_5','Mainmenu_1','Mainmenu_2','Mainmenu_3','Mainmenu_4','Mainmenu_5','Mainmenu_6','footermenu_1','footermenu_2','footermenu_3','footerContact','Bootomfooter','Know_Imc','News','testimonies','Award','Affiliates','slider','footermenu_1_sub','footermenu_2_sub','footermenu_3_sub','Mainmenu_1_sub','Mainmenu_2_sub','Mainmenu_3_sub','Mainmenu_4_sub','Mainmenu_5_sub','Mainmenu_6_sub'));
    }


}
