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
class UserController extends Controller
{
    public function index()
    {
    }

    public function loadMore(Request $request){

    }

    public function store(Request $request){
      $helper = new Helpers();
      dd($request->all());
         $array = [
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'testimony_en' => $request->testimony_en,
            'testimony_ar' => $request->testimony_ar,
            'is_active' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        if($request->hasFile('video1')) {
             $image= $helper->upload_image($request->file('video1'),'images/testimonies/videos/','none');
             $array['video1'] = $image;
        }
        testimonies::create($array);

        return redirect('/tetsimonial')->with("message","Testimonial Uploaded Successfully")->with('alert-class', 'alert-success');
    }
}
