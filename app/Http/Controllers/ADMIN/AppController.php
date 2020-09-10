<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
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
use App\Page;

class AppController extends Controller implements PageInterface
{
    use CommonTrait, UserTrait;


    /*
    This controller includes page create, store, listing, editPage,
    deleteMultiplePages, deleteSinglePage  functions
    */

    /*this function will redirect to create page section*/

    public function getpage(Request $request)
    {
       if($request['type'] ="1"){
          $slug= 'privacy-policy';
       }else if($request['type'] ="2"){
         $slug= 'contact-us';
        }else if($request['type'] ="3"){
          $slug= 'terms-and-conditions';
        }
        $getpage= Page::where('slug',$slug)->first();
         if(!empty($getpage)){
           $data['content_en']=$getpage['content_en'];
           $data['content_ar']=$getpage['content_ar'];
           $data['name_en']=$getpage['name_en'];
            $data['name_ar']=$getpage['name_ar'];
         }else{
           $data=[];
         }
          return response()->json(['status' => true,'message'=>'file uploaded successfully.','data'=>$data],200);
    }



}
