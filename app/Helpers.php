<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use DB;
use App\Setting;
use App\Menu;
use App\Follow;
use App\BottomFooter;
use App\Page;
use App\Topmenu;
use App\Section;
use App\Middlemenu;
use App\Mainmenu;
use App\Pagesection;
use App\Rightbar;
use App\Commonfooter;
use App\Doctor;
use App\Doctor_experience;
use App\Doctor_education;
use App\Doctor_language;
use App\Doctor_category;
use App\Department;
use Config;
use App\Media;
use App\Permission;
use App\UserPermission;
use Illuminate\Support\Facades\Auth;
use Session;
class Helpers
{

    function getimageattirbute($enImage){
        	$last_dot_index = strrpos($enImage, ".");
           $without_extention = substr($enImage, 92, $last_dot_index);
            return $without_extention;
    }

  function checkpermission ($userdata,$permissionID,$route){
    if($userdata->role_id == "2"){
      $permitted= UserPermission::where(['user_id'=>$userdata['id'],'permission_id'=>$permissionID])->first();
       if(!empty($permitted)){
           if($route == "listing"){
               if($permitted['is_view'] == "1"){
                    $perm =true;
               }else{
                 $perm =false;
               }
           }else if($route == "create"){
                if($permitted['is_create'] == "1"){
                     $perm =true;
                }else{
                  $perm =false;
                }
            }else if($route == "edit"){
                 if($permitted['is_edit'] == "1"){
                      $perm =true;
                 }else{
                   $perm =false;
                 }
             }else if($route == "delete"){
                  if($permitted['is_delete'] == "1"){
                       $perm =true;
                  }else{
                    $perm =false;
                  }
              }
      }else{
        $perm=false;
      }
    }else{
      $perm=true;
    }
      return $perm;
  }

function getMediaID($imagename){
  $getmedia= Media::where('filepath',$imagename)->first();
  if(!empty($getmedia)){
     $mediaid = $getmedia['id'];
  }else{
    $mediaid="";
  }
  return $mediaid;
}

function getImage($mediaid){
  $getmedia= Media::where('id',$mediaid)->first();
  if(!empty($getmedia)){
     $mediaImagePath = "images/media/".$getmedia['filepath'];
  }else{
    $mediaImagePath="";
  }
  return $mediaImagePath;
}
function movemages($path){
  $url= env('BASE_URL')."images/".$path;
//  dd(GetImageSize($url));
  if (GetImageSize($url) != "") {
  $contents=file_get_contents($url);
    preg_match("/[^\/]+$/", $url, $url);
    $last_word = $url[0]; // test
    $save_path = base_path()."/images/media/2019/11/".$last_word;
     file_put_contents($save_path,$contents);
     chmod( $save_path,0777);

}

}
function getdepartment($id){
   $data=Department::where('id',$id)->first();
   return $data;
}
function smart_wordwrap($string, $width = 75, $break = "\n") {
    //split on problem words over the line length
    $pattern = sprintf('/([^ ]{%d,})/', $width);
    $output = '';
    $words = preg_split($pattern, $string, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);

    foreach ($words as $word) {
        if (false !== strpos($word, ' ')) {
            // normal behaviour, rebuild the string
            $output .= $word;
        } else {
            // work out how many characters would be on the current line
            $wrapped = explode($break, wordwrap($output, $width, $break));
            $count = $width - (strlen(end($wrapped)) % $width);

            // fill the current line and add a break
            $output .= substr($word, 0, $count) . $break;

            // wrap any remaining characters from the problem word
            $output .= wordwrap(substr($word, $count), $width, $break, true);
        }
    }
    // wrap the final output
    return wordwrap($output, $width, $break);
}


public function getPagedata($slug){
  $getname= Page::where('slug',$slug)->first();
  if(!empty($getname)){
      $getname = $getname;
  }else{
      $getname =[];
  }
  return $getname;
}

function make_slug($string, $separator = '-')
{
	$string = trim($string);
	$string = mb_strtolower($string, 'UTF-8');


	// Make alphanumeric (removes all other characters)
	// this makes the string safe especially when used as a part of a URL
	// this keeps latin characters and Persian characters as well
	$string = preg_replace("/[^a-z0-9_\s-ءاآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوهی]/u", '', $string);

	// Remove multiple dashes or whitespaces or underscores
	$string = preg_replace("/[\s-_]+/", ' ', $string);

	// Convert whitespaces and underscore to the given separator
	$string = preg_replace("/[\s_]/", $separator, $string);

	return $string;
}

public function getPageBasedata($slug){
  $getname= Mainmenu::where('order',$slug)->where('parent_id','0')->first();
  return $getname;
}

public function getMainBasedata($slug){
  $getname= Page::where('slug',$slug)->first();
  return $getname;
}


public function getdoclang(){
  $languages = Language::all();
  return $languages;
}

public function getalleducationResidence($doctorid){
       $department = Doctor_education::where('doctor_id',$doctorid)->where('isResidency','1')->get();
     return $department;

}
public function getalleducationfollowship($doctorid){
       $department = Doctor_education::where('doctor_id',$doctorid)->where('isfollowship','1')->get();
     return $department;

}

public function getalleducation($doctorid){
       $department = Doctor_education::where('doctor_id',$doctorid)->where('isfollowship','0')->where('isResidency','0')->get();
     return $department;

}


public function getallexpboard($doctorid){
       $department = Doctor_experience::where('doctor_id',$doctorid)->where('isboard','1')->get();
     return $department;

}



  public function getallexp($doctorid){
    $department = Doctor_experience::where('doctor_id',$doctorid)->where('isboard','0')->orderby('fromDate','desc')->get();
       return $department;
  }

      public function getallcategory($doctorid){
           $getids=Doctor_category::where('doctor_id',$doctorid)->pluck('category_id')->all();
           $data=Category::whereIn("id",$getids)->get()->toArray();

            //  dd($data);
          // dd($data);
          return $data;
      }

      public function getalldepartment($doctorid){
             $getdoc= Doctor::where('id',$doctorid)->first();
             $department = Department::where('id',$getdoc->department_id)->first();
            //$data=Doctor_category::where('id',$id)->get();
           return $department;

      }
      public function getalllanguages($doctorid){
        $getids=Doctor_language::where('doctor_id',$doctorid)->pluck('language_id')->all();
          $data=Language::whereIn('id',$getids)->get();

        return $data;
      }

    public function footermenu_4_sub(){
      $footermenu_4_sub=Mainmenu::where('order','4')->where('parent_id','!=','0')->where('is_active','1')->get();
       return $footermenu_4_sub;
    }

    public function footermenu_5_sub(){
      $footermenu_5_sub=Mainmenu::where('order','5')->where('parent_id','!=','0')->where('is_active','1')->get();
       return $footermenu_5_sub;
    }

  public function footermenu_4(){
    $footermenu_4=Footermenu::where('order','4')->where('parent_id','0')->where('is_active','1')->get();
     return $footermenu_4;
  }

  public function footermenu_5(){
    $footermenu_5=Footermenu::where('order','5')->where('parent_id','0')->where('is_active','1')->get();
     return $footermenu_5;
  }

public function getcommonfooter(){
   $data=Commonfooter::first();
   return $data;
}
public function getnewsdata(){
  $mainsectionAwards = Pagesection::where('page','news')->where('section','section_1')->first();
   if(!empty($mainsectionAwards)){
     $data =$mainsectionAwards;
   }else{
     $data=[];
   }
   return $data;
}
public function getMenu(){
  //main menu
  $checksection =Section::where("id",3)->where('is_enable','1')->first();
  if(!empty($checksection)){
      $data= Mainmenu::orderby('order','asc')->where('is_active','1')->where('parent_id','0')->get();
    }else{
       $data =[];
    }

  return $data;
}

public function getSubMenu($id){
  //main menu
  $checksection =Section::where("id",3)->where('is_enable','1')->first();
  if(!empty($checksection)){
      $data= Mainmenu::where('parent_id',$id)->where('is_active','1')->get();
    }else{
       $data =[];
    }
  return $data;
}


  public function getmiddlemenu(){
        $checksection =   Section::where("id",2)->where('is_enable','1')->first();
        if(!empty($checksection)){
           $data= Middlemenu::orderBy("order",'asc')->where('is_active','1')->get();
        }else{
           $data =[];
        }
        return $data;
  }


public function gettopmenu(){
      $checksection =   Section::where("id",1)->where('is_enable','1')->first();
      if(!empty($checksection)){
         $data= Topmenu::orderBy("order",'asc')->where('is_active','1')->take("6")->get();
      }else{
         $data =[];
      }
      return $data;
}

public function getfooterlinks(){

   $pages= BottomFooter::first();
   if(!empty($pages)){
        if(!empty($pages->page_id)){
           $pageid= explode(",",$pages->page_id);
        }else{
          $pageid=[];
        }
   }else{
      $pageid=[];
   }
   if(!empty($pageid)){
      $data=Page::whereIn('id',$pageid)->get();
   }else{
     $data=[];
   }
   $mainsectionFooter1 = Section::where('id',4)->where('is_enable','1')->first();
    if(!empty($mainsectionFooter1)){
      $data =$data;
    }else{
      $data=[];
    }
  return $data;
}


  public function getfollowusContent(){
     $follow= Follow::first();
     if(!empty($follow)){
        $data= $follow;
     }else{
        $data=[];
     }
    return $data;
  }

  public function getLanguage(){
    $language = Config::get('variable.segment');
    if($language != null && $language !=""){
       $lang  =$language;
    }else{
      $lang="en";
    }
    return $lang;
  }

  /*
  Method :  to get the common health tips
  parameters : get the first index of health tip
  Created by : gurpreet kaur
  purpose :  used in footercoom layout
  */


public function getHealthTip() {
    $data= HealthTip::where('is_active','1')->first();
return $data;
}

  /*
  Method : upload images
  parameters : token in headers
  Created by : sarabjit singh
  purpose :  upload images
  */

  public function getHeaderFooter() {

      $getHeaderMenus = Menu:: select('id', 'name_en', 'name_ar', 'menu_type_id', 'page_id', 'order')
      ->with(['getSubMenu' => function($q) {
          $q->select('id', 'menu_id', 'name_en', 'name_ar', 'page_id');
      }, 'getSubMenu.getPage'  => function($q) {
          $q->select('id', 'name_en', 'name_ar', 'slug');
      }, 'getPage'  => function($q) {
          $q->select('id', 'name_en', 'name_ar', 'slug');
      }])->where('menu_type_id', MenuType::where('name', 'header')->first()->id)->get();

      $getFooterMenus = Menu:: select('id', 'name_en', 'name_ar', 'menu_type_id', 'page_id', 'order')
      ->with(['getSubMenu' => function($q) {
          $q->select('id', 'menu_id', 'name_en', 'name_ar', 'page_id');
      }, 'getSubMenu.getPage'  => function($q) {
          $q->select('id', 'name_en', 'name_ar', 'slug');
      }, 'getPage'  => function($q) {
          $q->select('id', 'name_en', 'name_ar', 'slug');
      }])->where('menu_type_id', MenuType::where('name', 'footer')->first()->id)->get();

      $data['header'] = $getHeaderMenus;
      $data['footer'] = $getFooterMenus;
      return $data;
  }

    /*
    Method : upload images
    parameters : token in headers
    Created by : sarabjit singh
    purpose :  upload images
    */
 function getlogo(){
   $settingdat=Setting::where('id',1)->first();
   if(!empty($settingdat)){
      $logo= url('/')."/images/".$settingdat['icon'];
   }else{
     $logo= url('/')."/images/logo/logo.png";
   }
   return  $logo;

 }
 
 

 
    function upload_image($file,$path,$old_image) {
        //dd($file);
    // $oldimage = $path.$old_image;
    // $url = getcwd()."/".$oldimage ;
    // $urls = str_replace("\\","/",$url);
    // if (is_file($urls)){
    //     // remove the old image and upload new images
    //     unlink(str_replace("\\","/",getcwd().'/'.$oldimage));
    //     $trimmeds = str_replace(' ','_' ,$file->getClientOriginalName());
    //     $trimmed = str_replace('/','_' ,$trimmeds);
    //
    //     if(strlen($trimmed) > 15){
    //     $name= md5(rand(1,1000)).date('dmYhis').'_'.substr($trimmed,0,15).'.'.$file->getClientOriginalExtension();
    //     } else {
    //     $name= md5(rand(1,1000)).date('dmYhis').'_'.$trimmed;
    //     }
    //
    // } else{
    //     // upload the new image
    //     $trimmeds = str_replace(' ','_' ,$file->getClientOriginalName());
    //     $trimmed = str_replace('/','_' ,$trimmeds);
    //
    //     if(strlen($trimmed) > 15){
    //     $name= md5(rand(1,1000)).md5('xyz').date('dmYhis').'_'.substr($trimmed,0,15).'.'.$file->getClientOriginalExtension();
    //     } else {
    //     $name= md5(rand(1,1000)).md5('xyz').date('dmYhis').'_'.$trimmed;
    //     }
    //
    // }
    // $name=substr($name,-90);
    // $file->move($path,$name); // move to the desired folder
    //


    $file = $file;
    // upload the new image
    $trimmeds = str_replace(' ','_' ,$file->getClientOriginalName());
    $trimmed = str_replace('/','_' ,$trimmeds);
    if(strlen($trimmed) > 15){
    $name= md5(rand(1,1000)).md5('xyz').date('dmYhis').'_'.substr($trimmed,0,15).'.'.$file->getClientOriginalExtension();
    } else {
    $name= md5(rand(1,1000)).md5('xyz').date('dmYhis').'_'.$trimmed;
    }
     $year = date('Y');
     $month = date('m');
     $yearMonth = "{$year}/{$month}";
    // $path = "/images/media/" . $year . "/" . $month;
     $path = base_path()."/images/media/";
     $year_folder = $path .date("Y");
     $month_folder = $year_folder . '/' . date("m");
     !file_exists($year_folder) && mkdir($year_folder , 0777);
      chmod( $year_folder,0777);
     !file_exists($month_folder) && mkdir($month_folder, 0777);
       chmod( $month_folder,0777);
     $name = date('Ymdhis').md5(rand(999,9999));
     $name = md5(rand(9999,99999999) ).time().'.'.$file->getClientOriginalExtension();
     $file->move($month_folder, $name);
     chmod( $month_folder,0777);
     chmod( $month_folder.'/'.$name,0777);
     $dbFIlename = "{$yearMonth}/{$name}";
    $ext = $file->getClientOriginalExtension();
    $media = new Media();
    $media->filepath = $dbFIlename;
    $media->type = $ext;
    $media->save();
      return $media->id;
    }

      // To get the public path of the server.
   public static function publicpath($path = null)
   {

       return url('/');
   // return rtrim(basePath('public/' . $path), '/');
   }

    public function getPageUrl($pageId){
      $pageData = Page::find($pageId);
      if(!empty($pageData)){
            $slug=   Config::get('variable.URL_LINK').$pageData->slug;
      }else{
            $slug="#";
      }
     // $slug=   Config::get('variable.URL_LINK').$pageData->slug;
      return isset($slug)?$slug:"#";
   }

   public function getRightBars(){
     $rightbars = Rightbar::all()->toArray();
     return $rightbars;
   }

}
