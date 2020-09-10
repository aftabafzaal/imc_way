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
use App\Event;
use App\Eventsbanner;
use DB;
use App\Eventbanner;
use App\Eventcourse;
use App\Eventspeaker;
class EventController extends Controller
{
    public function index(Request $request)
    {
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

          /* $contents=Pagesection::where(["page"=>"testimonies"])->get();
          $testimonies_content = array();
          foreach($contents as $content){
              $testimonies_content[$content->section] = $content->toArray();
          }  */

          // $events= Event::where('id','>','1')->where('is_active','1')->where('event_start_date','>=',date("Y-m-d"))->limit(3)->get();


          $events = Event::where('is_active','1')->orderBy('event_start_date','asc');

          if(!empty($request->from_event) and  !empty($request->to_event))
          {
            $events = $events->whereBetween('event_start_date',[$request->from_event,$request->to_event]);

          }elseif(!empty($request->from_event)){
            $events =  $events->whereDate('event_start_date', '>=', $request->from_event);

          }elseif(!empty($request->to_event)){
            $events =  $events->whereDate('event_start_date', '<=', $request->to_event);
            }elseif(!empty($request->name)){
             $events =  $events->where('title_en' ,'LIKE', '%'.$request->name.'%');
          }else{
            $events =  $events->whereDate('event_start_date','>=',date("Y-m-d"));
          }

          $totalEvents = $events->get()->count();
                    $futureEvents = $events->orderby('id','asc')->get();

          $events = $events->limit(3)->get();

          $eventDates = [];
          foreach($futureEvents as $event){
            if(!in_array($event->event_start_date,$eventDates)){
              array_push($eventDates,$event->event_start_date);
            }
          }

          $eventbanner = Eventsbanner::all();

        return view ('webpages.event', compact('followusSection','topmenu_0','topmenu_1','topmenu_2','topmenu_3','topmenu_4','middlemenu_1','middlemenu_2','middlemenu_3','middlemenu_4','middlemenu_5','Mainmenu_1','Mainmenu_2','Mainmenu_3','Mainmenu_4','Mainmenu_5','Mainmenu_6','footermenu_1','footermenu_2','footermenu_3','footerContact','Bootomfooter','Know_Imc','News','testimonies','Award','Affiliates','slider','footermenu_1_sub','footermenu_2_sub','footermenu_3_sub','Mainmenu_1_sub','Mainmenu_2_sub','Mainmenu_3_sub','Mainmenu_4_sub','Mainmenu_5_sub','Mainmenu_6_sub','section','topmenu_section','middlemenu_section','Mainmenu_section','footermenu_section','Settings','events','eventDates','eventbanner','totalEvents'));
    }

    public function loadMore(Request $request){
      $where_condition[] = "id > 1";
      $where_condition[] = "is_active = 1";
      if(!empty($request->from_event)){
        $where_condition[] = "event_start_date >='" . date("Y-m-d",strtotime($request->from_event)) . "'";
      }else{
        $where_condition[] = "event_start_date >='" . date("Y-m-d") . "'";
      }
      if(!empty($request->to_event)){
        $where_condition[] = "event_end_date <='" . date("Y-m-d",strtotime($request->to_event)) . "'";
      }
      if(!empty($request->event_date)){
        $where_condition[] = "'".date("Y-m-d",strtotime($request->event_date))."' BETWEEN event_start_date AND event_end_date";
      }
      if(!empty($request->name)){
        $where_condition[] = "title_en LIKE '%" . $request->name. "%'";
      }

      $where_condition = implode(" AND ",$where_condition);
      $sql    = "SELECT * FROM `events` WHERE ". $where_condition ." order by event_start_date ASC limit 3 offset ".$request->offset;
      $sqlTotal    = "SELECT * FROM `events` WHERE ". $where_condition;
      $events = DB::select($sql);
      $eventsTotal = DB::select($sqlTotal);
      
    //     if(!empty($request->event_date) || !empty($request->name) ){
    //           $where_condition[] = "id > 1";
    //   $where_condition[] = "is_active = 1";
    //   if(!empty($request->from_event)){
    //     $where_condition[] = "event_start_date >='" . date("Y-m-d",strtotime($request->from_event)) . "'";
    //   }else{
    //     $where_condition[] = "event_start_date >='" . date("Y-m-d") . "'";
    //   }
    //   if(!empty($request->to_event)){
    //     $where_condition[] = "event_end_date <='" . date("Y-m-d",strtotime($request->to_event)) . "'";
    //   }
    //   if(!empty($request->event_date)){
    //     $where_condition[] = "'".date("Y-m-d",strtotime($request->event_date))."' BETWEEN event_start_date AND event_end_date";
    //   }
    //   if(!empty($request->name)){
    //     $where_condition[] = "title_en LIKE '%" . $request->name. "%'";
    //   }

    //   $where_condition = implode(" AND ",$where_condition);
    //   $sql    = "SELECT * FROM `events` WHERE ". $where_condition ." limit 3 offset ".$request->offset;
    //   $sqlTotal    = "SELECT * FROM `events` WHERE ". $where_condition;
    //   $events = DB::select($sql);
    //   $eventsTotal = DB::select($sqlTotal);
    //     }else{
    //          $events = Event::where('is_active','1');
    //       if(!empty($request->from_event) and  !empty($request->to_event))
    //       {
    //         $events = $events->whereBetween('event_start_date',[$request->from_event,$request->to_event]);
    //       }elseif(!empty($request->from_event)){
    //         $events =  $events->whereDate('event_start_date', '>=', $request->from_event);
    //       }elseif(!empty($request->to_event)){
    //         $events =  $events->whereDate('event_start_date', '<=', $request->to_event);
    //         }elseif(!empty($request->name)){
    //          $events =  $events->where('title_en' ,'LIKE', '%'.$request->name.'%');
    //       }else{
    //         $events =  $events->whereDate('event_start_date','>=',date("Y-m-d"));
    //       }
    //       $totalEvents = $events->get()->count();
    //       $futureEvents = $events->get();
    //       $events = $events->offset(3)->limit(3)->get();
    //       $eventsTotal =$futureEvents;
    //     }
          

      $view = \View::make('webpages.event_loads',compact('events'));
      $contents = (string) $view;
      return [
        "eventsTotal" => count($eventsTotal),
        "eventsContent" => $contents
      ];
    }

    public function getEvent($id)
    {
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

          /* $contents=Pagesection::where(["page"=>"testimonies"])->get();
          $testimonies_content = array();
          foreach($contents as $content){
              $testimonies_content[$content->section] = $content->toArray();
          }  */

          $url='event';

        //$event= Event::where('slug',$id)->first();

        if(request()->segment(1) == "en"){
           $event=Event::where('slug_en',$id)->orderby('id','desc')->where('is_active',1)->first();
           if(empty($event)){
             $event= Event::where('slug_ar',$id)->orderby('id','desc')->where('is_active',1)->first();
             return redirect('/en/event/'.$event['slug_en']);
           }
        }else if(request()->segment(1) == "ar"){
         $event=Event::where('slug_ar',$id)->orderby('id','desc')->where('is_active',1)->first();
         if(empty($event)){
           $event= Event::where('slug_en',$id)->orderby('id','desc')->where('is_active',1)->first();
           return redirect('/ar/event/'.$event['slug_ar']);
         }
        }else{
           $event=Event::where('slug_en',$id)->orderby('id','desc')->where('is_active',1)->first();
           if(empty($event)){
             $event= Event::where('slug_ar',$id)->orderby('id','desc')->where('is_active',1)->first();
             return redirect('/en/event/'.$event['slug_en']);
           }
        }

         if(empty($event)){
             return redirect()->back();
         }
         $getpage['name_en']=$event['title_en'];
        $getpage['name_ar']=$event['title_ar'];
        $event['eventbanner']=Eventbanner::where("event_id",$event['id'])->get();
        $event['eventspeakers']=Eventspeaker::where("event_id",$event['id'])->get();
        $event['eventcourses']=Eventcourse::where("event_id",$event['id'])->get();
        return view ('webpages.eventinfo', compact('url','getpage','followusSection','topmenu_0','topmenu_1','topmenu_2','topmenu_3','topmenu_4','middlemenu_1','middlemenu_2','middlemenu_3','middlemenu_4','middlemenu_5','Mainmenu_1','Mainmenu_2','Mainmenu_3','Mainmenu_4','Mainmenu_5','Mainmenu_6','footermenu_1','footermenu_2','footermenu_3','footerContact','Bootomfooter','Know_Imc','News','testimonies','Award','Affiliates','slider','footermenu_1_sub','footermenu_2_sub','footermenu_3_sub','Mainmenu_1_sub','Mainmenu_2_sub','Mainmenu_3_sub','Mainmenu_4_sub','Mainmenu_5_sub','Mainmenu_6_sub','section','topmenu_section','middlemenu_section','Mainmenu_section','footermenu_section','Settings','event'));
    }

}
