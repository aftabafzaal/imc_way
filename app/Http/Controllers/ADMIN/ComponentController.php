<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use App\Page;
use App\Menu;
use App\MenuType;
use App\SubMenu;
use App\Topmenu;
use App\Middlemenu;
use App\Mainmenu;
use App\slider;
use Config;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Lcobucci\JWT\Parser;
use Mail;
use Response;
use App\Http\Traits\CommonTrait;
use App\Http\Traits\UserTrait;
use Session;
use App\Helpers;
use DB;
use App\BottomFooter;
use App\Footermenu;

class ComponentController extends Controller
{
    use CommonTrait, UserTrait;
   public function __construct()
          {
           $this->middleware(function ($request, $next) {
               $user= Auth::user();
               if($user->role_id == 2){
                    return redirect('permission');
               }else{
                   return $next($request);
               }
           });
       }

      /* menus listing will get through this function */
      public function topmenu_list(Request $request)
      {

          $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
          session(['sort_by' => 'asc']); // set default sorting
          $menus = Topmenu::select('topmenus.id', 'topmenus.title_en', 'topmenus.title_ar','topmenus.icon','topmenus.type','topmenus.link','topmenus.page_id','topmenus.order','pages.slug');
          if(isset($request->q)) { // search by name
              $menus = $menus->where(function($query) use($request) {
                 $query->where('topmenus.title_en','LIKE','%'.$request->q."%");
              });
          }

          if(isset($request->sort_by)) {

          } else {
              $menus = $menus->orderBy('topmenus.order','ASC');

          }
          $menus = $menus->leftJoin('pages','pages.id','topmenus.page_id');
          $menus = $menus->paginate($per_page);
          $helper = new Helpers();

          // append search params
          if(isset($request->q)) {
             $menus = $menus->appends(['q' => $request->q]);  /*keywords will append to url using append*/
             session(['q' => $request->q]);
          } else {
             session()->forget('q');
          }

          // append sort_by params
          if(isset($request->sort_by)) {
              $menus = $menus->appends(['key' => $request->key, 'sort_by' => $request->sort_by]);
              session(['key' => $request->key, 'sort_by' =>( $request->sort_by == 'asc') ? 'desc' : 'asc']);
          }

           // append recordvalue params
           if(isset($request->recordvalue)) {
              $menus = $menus->appends(['recordvalue' => $request->recordvalue]);
              session(['recordvalue' => $request->recordvalue]);
          } else {
              session()->forget('recordvalue');
          }
          $order = Topmenu::orderBy('order', 'DESC')->pluck('order')->first();
          if(isset($request->id)) {
              $editmenu = Topmenu::where('id', $request->id)->first();
          }else{
              $editmenu = [];
              $order = $order+1;
          }
          $page = Page::select('id','name_en','slug')->get();


          return view('components.topmenu.list', compact('menus','editmenu','page','order'));

      }

      // save and update menu and its details from this function
      public function topmenu_create(Request $request)
      {
          $helper = new Helpers();
          $input = $request->all();
          $request['title_en'] = trim($request['title_en']);
          $request['title_ar'] = trim($request['title_ar']);

          $this->validate($request,[
              'title_en' => 'required|min:3|max:100',
              'title_ar' => 'required|min:3|max:100',
              'type' => 'required',
              'order'=>'required',
              'icon'=>'required',

          ],[
              'title_en.required' => 'Please enter title in english',
              'title_ar.required' => 'Please enter title in arabic'
          ]);
          $highestOrder = Topmenu::orderBy('order', 'DESC')->pluck('order')->first();
          $array = [
              'order' => $request->get('order'),
              'title_en' => $request->get('title_en'),
              'title_ar' => $request->get('title_ar'),
              'type' => $request->get('type'),
              'icon' => $request->get('icon'),
              'is_active' => $request->get('is_active'),
              'link' => !empty($request->link)?$request->link:NULL,
              'page_id' => !empty($request->page_id)?$request->page_id:NULL,
              'created_at' => date('Y-m-d H:i:s',time()),
              'updated_at' => date('Y-m-d H:i:s',time())
          ];


          if(isset($request->id)) {
              unset($array['created_at']);
              $result = Topmenu::where('id', $request->id)->update($array);

              if($result) {
                  Session::flash('message', 'Menu updated successfully');
                  Session::flash('alert-class', 'alert-success');
              } else {
                  Session::flash('message', 'Unable to update menu!');
                  Session::flash('alert-class', 'alert-danger');
              }

          } else {

              $result =  Topmenu::create($array);

              if($result) {
                  Session::flash('message', 'Menu added successfully');
                  Session::flash('alert-class', 'alert-success');
              } else {
                  Session::flash('message', 'Unable to add menu!');
                  Session::flash('alert-class', 'alert-danger');
              }
          }

          return redirect('admin/topmenu/list');

      }

      /* delete single menu */

      public function topmenu_delete(Request $request)
      {
          $menu = \App\Topmenu::find($request->id);
          $unlinkIcon = $menu->icon;
          $result = $menu->delete();

          if($result) {

  			$message 		= "Menu deleted successfully";
              $returnStatus 	= 1;
          } else {
  			$message 		= "Unable to delete this menu";
  			$returnStatus 	= 0;
          }
          return json_encode(array('status' => $returnStatus, 'message' => $message));
      }

      /* sort menu*/

      public function updateTopmenuOrder(Request $request) {
          $selectedData = $request->selectedData;

          $i = 1;
          foreach($selectedData as $selectedValue) {
              TopMenu::where('id', $selectedValue)->update(['order' =>  $i]);
              $i++;
          }

       return json_encode(array('status' => 1, 'message' => 'Sequence updated succcessfully'));
      }

      public function slider_list(Request $request)
      {
             $slider=slider::all();
             if(isset($request->id)) {
                  $slide_edit = Mainmenu::where('id', $request->id)->first();
              }else{
                  $slide_edit = [];
              }
          return view ('components.slider.list', compact('slider','slide_edit'));
      }

    public function slider_create(Request $request)
    {
        $helper = new Helpers();
         $this->validate($request,[
            'name_en' => 'required',
            'name_ar' => 'required',
             'description_en' => 'required',
             'description_ar' => 'required',
             'photo1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);
          $array = [
            'name_en' => $request->get('name_en'),
            'name_ar' => $request->get('name_ar'),
            'description_en' => $request->get('description_en'),
            'description_ar' => $request->get('description_ar'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
         if($request->hasFile('photo1')) {
             $image= $helper->upload_image($request->file('photo1'),'images/sliders/','none');
             $array['photo1'] = $image;
          }
         $slider = slider::create($array);
         if($slider) {
                Session::flash('message', 'Slider added successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to add Sliders!');
                Session::flash('alert-class', 'alert-danger');
            }


        return redirect('slider/list');

    }

    public function editSlider($id) {
      $helper = new Helpers();
        $page = Slider::where('id', $id)->first();
        $templates = Slider::get();
        if(isset($id)) {
            $editmenu = Slider::where('id', $id)->first();
            if(!empty($editmenu)){
                $editmenu->icon = !empty($editmenu->icon)?($helper->publicpath()."/images/icon/".$editmenu->icon):"";
            }
        }else{
            $editmenu = [];
        }
        return view('components.slider.list', compact('page', 'templates','editmenu'));
    }

    /*delete multiple pages*/

    public function deleteMultipleSlider(Request $request) {

        $result = Slider::whereIn('id', $request->ids)->delete();

        if($result) {
      $message 		= "Slider(s) deleted successfully";
            $returnStatus 	= 1;

        } else {
      $message 		= "Unable to delete Slider(s)";
      $returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }


    /* delete single page from this function */
    public function deleteSingleSlider(Request $request)
    {
        $page = \App\Slider::find($request->id);
        $result = $page->delete();

        if($result) {
      $message 		= "Slider deleted successfully";
            $returnStatus 	= 1;

        } else {
      $message 		= "Unable to delete this Slider";
      $returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }

       /* menus listing will get through this function */
       public function middlemenu_list(Request $request)
       {

           $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
           session(['sort_by' => 'asc']);

           $menus = Middlemenu::select('id', 'type', 'icon','link','order');
           $menus = $menus->orderBy('order','ASC');
           $menus = $menus->paginate($per_page);
           $helper = new Helpers();
           // append search params
           if(isset($request->q)) {
              $menus = $menus->appends(['q' => $request->q]);  /*keywords will append to url using append*/
              session(['q' => $request->q]);
           } else {
              session()->forget('q');
           }

           // append sort_by params
           if(isset($request->sort_by)) {
               $menus = $menus->appends(['key' => $request->key, 'sort_by' => $request->sort_by]);
               session(['key' => $request->key, 'sort_by' =>( $request->sort_by == 'asc') ? 'desc' : 'asc']);
           }

            // append recordvalue params
            if(isset($request->recordvalue)) {
               $menus = $menus->appends(['recordvalue' => $request->recordvalue]);
               session(['recordvalue' => $request->recordvalue]);
           } else {
               session()->forget('recordvalue');
           }
           $order = Middlemenu::orderBy('order', 'DESC')->pluck('order')->first();
           if(isset($request->id)) {
               $editmenu = Middlemenu::where('id', $request->id)->first();
           }else{
               $editmenu = [];
               $order = $order+1;
           }

           return view('components.middlemenu.list', compact('menus','editmenu','order'));

       }

       // save and update menu and its details from this function
       public function middlemenu_create(Request $request)
       {
           $helper = new Helpers();
           $this->validate($request,[
              'type' => 'required',
               'link' => 'required',
               'order' => 'required',
               'icon'=>'required'
           ],[
              'type.required' => 'Please select icon',
              'link.required' => 'Please enter link'
          ]);


           $highestOrder = Middlemenu::orderBy('order', 'DESC')->pluck('order')->first();

           $array = [
               'order' => $request->get('order'),
               'type' => $request->get('type'),
               'icon' => $request->get('icon'),
                 'is_active' => $request->get('is_active'),
               'link' => !empty($request->link)?$request->link:NULL,
               'created_at' => date('Y-m-d H:i:s',time()),
               'updated_at' => date('Y-m-d H:i:s',time())
           ];

           if(isset($request->id)) {
               unset($array['created_at']);
               $result = Middlemenu::where('id', $request->id)->update($array);
               if($result) {
                   Session::flash('message', 'Menu updated successfully');
                   Session::flash('alert-class', 'alert-success');
               } else {
                   Session::flash('message', 'Unable to update menu!');
                   Session::flash('alert-class', 'alert-danger');
               }
           } else {
               $result =  Middlemenu::create($array);
               if($result) {
                   Session::flash('message', 'Menu added successfully');
                   Session::flash('alert-class', 'alert-success');
               } else {
                   Session::flash('message', 'Unable to add menu!');
                   Session::flash('alert-class', 'alert-danger');
               }
           }

           return redirect('admin/middlemenu/list');

       }

       /* delete single menu */

       public function middlemenu_delete(Request $request)
       {
           $menu = \App\Middlemenu::find($request->id);
           $unlinkIcon = $menu->icon;
           $result = $menu->delete();

           if($result) {
               $message 		= "Menu deleted successfully";
               $returnStatus 	= 1;
           } else {
               $message 		= "Unable to delete this menu";
               $returnStatus 	= 0;
           }
           return json_encode(array('status' => $returnStatus, 'message' => $message));
       }

       /* sort menu*/

       public function updateMiddlemenuOrder(Request $request) {
           $selectedData = $request->selectedData;

           $i = 1;
           foreach($selectedData as $selectedValue) {
              Middlemenu::where('id', $selectedValue)->update(['order' =>  $i]);
               $i++;
           }

        return json_encode(array('status' => 1, 'message' => 'Sequence updated succcessfully'));
       }





      /* menus listing will get through this function */
      public function mainmenu_list(Request $request)
      {
          $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
          session(['sort_by' => 'asc']); // set default sorting
          $menus = Mainmenu::select('mainmenus.id', 'mainmenus.title_en', 'mainmenus.title_ar','mainmenus.type','mainmenus.link','mainmenus.page_id','mainmenus.order','mainmenus.parent_id','pages.slug',
          DB::raw("count(submenu.id) as submenu_count"));

          if(!empty($request->id) && !empty($request->type) && $request->type=="submenu"){
              $menus = $menus->where('mainmenus.parent_id',$request->id);
              $width="25"; $submenu = 1;
          }else{
              $width="20"; $submenu = 0;
              $menus = $menus->where('mainmenus.parent_id',0);
          }

          if(isset($request->q)) { // search by name
              $menus = $menus->where(function($query) use($request) {
                 $query->where('mainmenus.title_en','LIKE','%'.$request->q."%");
              });
          }

          if(isset($request->sort_by)) {

          } else {
              $menus = $menus->orderBy('mainmenus.order','ASC');

          }

          $menus = $menus->leftJoin('pages','pages.id','mainmenus.page_id');
          $menus = $menus->leftJoin('mainmenus as submenu','submenu.parent_id','mainmenus.id')->groupBy('mainmenus.id', 'mainmenus.title_en', 'mainmenus.title_ar','mainmenus.type','mainmenus.link','mainmenus.page_id','mainmenus.order','mainmenus.parent_id','pages.slug');
          $menus = $menus->paginate($per_page);

          $helper = new Helpers();

          // append search params
          if(isset($request->q)) {
             $menus = $menus->appends(['q' => $request->q]);  /*keywords will append to url using append*/
             session(['q' => $request->q]);
          } else {
             session()->forget('q');
          }

          // append sort_by params
          if(isset($request->sort_by)) {
              $menus = $menus->appends(['key' => $request->key, 'sort_by' => $request->sort_by]);
              session(['key' => $request->key, 'sort_by' =>( $request->sort_by == 'asc') ? 'desc' : 'asc']);
          }

           // append recordvalue params
           if(isset($request->recordvalue)) {
              $menus = $menus->appends(['recordvalue' => $request->recordvalue]);
              session(['recordvalue' => $request->recordvalue]);
          } else {
              session()->forget('recordvalue');
          }
          if($submenu==1 && !empty($request->id)){
              $order = Mainmenu::where('parent_id',$request->id)->orderBy('order', 'DESC')->pluck('order')->first();
          }else{
              $order = Mainmenu::where('parent_id',0)->orderBy('order', 'DESC')->pluck('order')->first();
          }

          $parentId = 0;
          if(isset($request->id)) {
              if($submenu==1 && !empty($request->submenuid)){
                  $editmenu = Mainmenu::where('id', $request->submenuid)->first();
                  $parentId = $request->id;
              }else{
                  $editmenu = Mainmenu::where('id', $request->id)->first();
                  $order = $order+1;
                  $parentId = 0;
              }

          }else{
              $editmenu = [];
              $order = $order+1;
          }

          $page = Page::select('id','name_en','slug')->get();
          $parent = Mainmenu::select('id','title_en')->where('parent_id',0)->get();

          if($submenu==1 && !empty($request->id) && empty($request->submenuid)){
              $parentId = $request->id;
              $request->id = NULL;
              $editmenu = new \stdClass();
              $editmenu->parent_id = $parentId;
          }
           $order=10;
          return view('components.mainmenu.list', compact('menus','editmenu','page','order','parent','width','submenu','parentId'));

      }

      // save and update menu and its details from this function
      public function mainmenu_create(Request $request)
      {
          $helper = new Helpers();

          $input = $request->all();
          $request['title_en'] = trim($request['title_en']);
          $request['title_ar'] = trim($request['title_ar']);
          $this->validate($request,[
              'title_en' => 'required|min:3|max:100',
              'title_ar' => 'required|min:3|max:100',
             'order'=>'required',
          ],[
              'title_en.required' => 'Please enter title in english',
              'title_ar.required' => 'Please enter title in arabic'
          ]);
          $highestOrder = Mainmenu::where('parent_id',$request->parent_id)->orderBy('order', 'DESC')->pluck('order')->first();


          $array = [
              'order' => $request->get('order'),
              'parent_id' => $request->get('parent_id'),
              'title_en' => $request->get('title_en'),
              'title_ar' => $request->get('title_ar'),
              'is_active' => $request->get('is_active'),
              'type' => $request->get('type'),
              'link' => !empty($request->link)?$request->link:NULL,
              'page_id' => !empty($request->page_id)?$request->page_id:NULL,
              'created_at' => date('Y-m-d H:i:s',time()),
              'updated_at' => date('Y-m-d H:i:s',time())
          ];

          if(isset($request->id)) {
              unset($array['created_at']);
              $result = Mainmenu::where('id', $request->id)->update($array);

              if($result) {
                  Session::flash('message', 'Menu updated successfully');
                  Session::flash('alert-class', 'alert-success');
              } else {
                  Session::flash('message', 'Unable to update menu!');
                  Session::flash('alert-class', 'alert-danger');
              }

          } else {

              $result =  Mainmenu::create($array);

              if($result) {
                  Session::flash('message', 'Menu added successfully');
                  Session::flash('alert-class', 'alert-success');
              } else {
                  Session::flash('message', 'Unable to add menu!');
                  Session::flash('alert-class', 'alert-danger');
              }
          }
          if(!empty($request->parent_id)){
              //return redirect('admin/mainmenu/list/'.$request->parent_id.'/submenu');
              return redirect('admin/mainmenu/list');
          }else{
              return redirect('admin/mainmenu/list');
          }


      }

      /* delete single menu */

      public function mainmenu_delete(Request $request)
      {
          $menu = \App\Mainmenu::find($request->id);
          $result = $menu->delete();

          if($result) {
  			$message 		= "Menu deleted successfully";
              $returnStatus 	= 1;
          } else {
  			$message 		= "Unable to delete this menu";
  			$returnStatus 	= 0;
          }
          return json_encode(array('status' => $returnStatus, 'message' => $message));
      }

      /* sort menu*/

      public function updateMainmenuOrder(Request $request) {
          $selectedData = $request->selectedData;

          $i = 1;
          foreach($selectedData as $selectedValue) {
              Mainmenu::where('id', $selectedValue)->update(['order' =>  $i]);
              $i++;
          }

       return json_encode(array('status' => 1, 'message' => 'Sequence updated succcessfully'));
      }



    /* menus listing will get through this function */
    public function footer2_list(Request $request)
    {

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        session(['sort_by' => 'asc']);

        $menus = BottomFooter::select('id','copyright_ar','copyright_en','page_id');
        $menus = $menus->orderBy('id','ASC');
        $menus = $menus->paginate($per_page);
        $helper = new Helpers();
               // append recordvalue params
         if(isset($request->recordvalue)) {
            $menus = $menus->appends(['recordvalue' => $request->recordvalue]);
            session(['recordvalue' => $request->recordvalue]);
        } else {
            session()->forget('recordvalue');
        }
        if(isset($request->id)) {
            $editmenu = BottomFooter::where('id', $request->id)->first();
             if(!empty($editmenu->page_id)){
                $pageid= explode(",",$editmenu->page_id);
             }else{
               $pageid=[];
             }
        }else{
            $editmenu = [];
            $pageid=[];
        }
         $allpages=Page::get();

        return view('components.bottomfooter.list', compact('menus','editmenu','allpages','pageid'));

    }

    // save and update menu and its details from this function
    public function footer2_create(Request $request)
    {
    //  dd($request->all());
        $helper = new Helpers();
        $input = $request->all();
        $request['copyright_en'] = trim($request['copyright_en']);
        $request['copyright_ar'] = trim($request['copyright_ar']);

        $this->validate($request,[
           'copyright_en' => 'required|min:3|max:500',
            'copyright_ar' => 'required|min:3|max:500',
        ],[
           'copyright_en.required' => 'Please enter the copyright',
           'copyright_ar.required' => 'Please enter the copyright'
       ]);

        $array = [
            'copyright_en' => $request->get('copyright_en'),
            'copyright_ar' => $request->get('copyright_ar'),
            'page_id' => !empty($request->link)?$request->link:NULL,
            'created_at' => date('Y-m-d H:i:s',time()),
            'updated_at' => date('Y-m-d H:i:s',time())
        ];

        if(isset($request->id)) {
          $existingdata = BottomFooter::where('id',$request->id)->first();
          if(!empty($request->page_id)) {
              $pageid=implode(",",$request->page_id);
              $array['page_id'] = $pageid;
          }
            $result = BottomFooter::where('id', $request->id)->update($array);
            if($result) {
                Session::flash('message', 'Footer2 updated successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to update Footer2!');
                Session::flash('alert-class', 'alert-danger');
            }

        }
        return redirect('admin/footer2/list/1');

    }

    // FOOTER 1 DATA STORE



        /* menus listing will get through this function */
        public function footer1_list(Request $request)
        {
            $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
            session(['sort_by' => 'asc']); // set default sorting
            $menus = Footermenu::select('footermenus.id', 'footermenus.title_en', 'footermenus.title_ar','footermenus.type','footermenus.link','footermenus.page_id','footermenus.order','footermenus.parent_id','pages.slug',
            DB::raw("count(submenu.id) as submenu_count"));

            if(!empty($request->id) && !empty($request->type) && $request->type=="submenu"){
                $menus = $menus->where('footermenus.parent_id',$request->id);
                $width="25"; $submenu = 1;
            }else{
                $width="20"; $submenu = 0;
                $menus = $menus->where('footermenus.parent_id',0);
            }

            if(isset($request->q)) { // search by name
                $menus = $menus->where(function($query) use($request) {
                   $query->where('footermenus.title_en','LIKE','%'.$request->q."%");
                });
            }

            if(isset($request->sort_by)) {

            } else {
                $menus = $menus->orderBy('footermenus.order','ASC');

            }

            $menus = $menus->leftJoin('pages','pages.id','footermenus.page_id');
            $menus = $menus->leftJoin('footermenus as submenu','submenu.parent_id','footermenus.id')->groupBy('footermenus.id', 'footermenus.title_en', 'footermenus.title_ar','footermenus.type','footermenus.link','footermenus.page_id','footermenus.order','footermenus.parent_id','pages.slug');
            $menus = $menus->paginate($per_page);

            $helper = new Helpers();

            // append search params
            if(isset($request->q)) {
               $menus = $menus->appends(['q' => $request->q]);  /*keywords will append to url using append*/
               session(['q' => $request->q]);
            } else {
               session()->forget('q');
            }

            // append sort_by params
            if(isset($request->sort_by)) {
                $menus = $menus->appends(['key' => $request->key, 'sort_by' => $request->sort_by]);
                session(['key' => $request->key, 'sort_by' =>( $request->sort_by == 'asc') ? 'desc' : 'asc']);
            }

             // append recordvalue params
             if(isset($request->recordvalue)) {
                $menus = $menus->appends(['recordvalue' => $request->recordvalue]);
                session(['recordvalue' => $request->recordvalue]);
            } else {
                session()->forget('recordvalue');
            }
            if($submenu==1 && !empty($request->id)){
                $order = Footermenu::where('parent_id',$request->id)->orderBy('order', 'DESC')->pluck('order')->first();
            }else{
                $order = Footermenu::where('parent_id',0)->orderBy('order', 'DESC')->pluck('order')->first();
            }

            $parentId = 0;
            if(isset($request->id)) {
                if($submenu==1 && !empty($request->submenuid)){
                    $editmenu = Footermenu::where('id', $request->submenuid)->first();
                    $parentId = $request->id;
                }else{
                    $editmenu = Footermenu::where('id', $request->id)->first();
                    $order = $order+1;
                    $parentId = 0;
                }

            }else{
                $editmenu = [];
                $order = $order+1;
            }

            $page = Page::select('id','name_en','slug')->get();
            $parent = Footermenu::select('id','title_en')->where('parent_id',0)->get();


            if($submenu==1 && !empty($request->id) && empty($request->submenuid)){
                $parentId = $request->id;
                $request->id = NULL;
                $editmenu = new \stdClass();
                $editmenu->parent_id = $parentId;
            }


            $order=10;
            return view('components.footermenu.list', compact('menus','editmenu','page','order','parent','width','submenu','parentId'));

        }

        // save and update menu and its details from this function
        public function footer1_create(Request $request)
        {
            $helper = new Helpers();
            $input = $request->all();
            $request['title_en'] = trim($request['title_en']);
            $request['title_ar'] = trim($request['title_ar']);
            $this->validate($request,[
                'title_en' => 'required|min:3|max:100',
                'title_ar' => 'required|min:3|max:100',
                'type' => 'required',
                'order'=>'required',
            ],[
                'title_en.required' => 'Please enter title in english',
                'title_ar.required' => 'Please enter title in arabic'
            ]);
            $highestOrder = Footermenu::where('parent_id',$request->parent_id)->orderBy('order', 'DESC')->pluck('order')->first();


            $array = [
                'order' => $request->get('order'),
                'parent_id' => !empty($request->parent_id)?$request->parent_id:0,
                'title_en' => $request->get('title_en'),
                'title_ar' => $request->get('title_ar'),
                'type' => $request->get('type'),
                'is_active' => $request->get('is_active'),
                'link' => !empty($request->link)?$request->link:NULL,
                'page_id' => !empty($request->page_id)?$request->page_id:NULL,
                'created_at' => date('Y-m-d H:i:s',time()),
                'updated_at' => date('Y-m-d H:i:s',time())
            ];

            if(isset($request->id)) {
                unset($array['created_at']);
                $result = Footermenu::where('id', $request->id)->update($array);

                if($result) {
                    Session::flash('message', 'Menu updated successfully');
                    Session::flash('alert-class', 'alert-success');
                } else {
                    Session::flash('message', 'Unable to update menu!');
                    Session::flash('alert-class', 'alert-danger');
                }

            } else {

                $result =  Footermenu::create($array);

                if($result) {
                    Session::flash('message', 'Menu added successfully');
                    Session::flash('alert-class', 'alert-success');
                } else {
                    Session::flash('message', 'Unable to add menu!');
                    Session::flash('alert-class', 'alert-danger');
                }
            }
            if(!empty($request->parent_id)){
                //return redirect('admin/footer1/list/'.$request->parent_id.'/submenu');
                return redirect('admin/footer1/list');
            }else{
                return redirect('admin/footer1/list');
            }


        }

        /* delete single menu */

        public function footer1_delete(Request $request)
        {
            $menu = \App\Footermenu::find($request->id);
            $result = $menu->delete();

            if($result) {
    		    	$message 		= "Menu deleted successfully";
                $returnStatus 	= 1;
            } else {
    			$message 		= "Unable to delete this menu";
    			$returnStatus 	= 0;
            }
            return json_encode(array('status' => $returnStatus, 'message' => $message));
        }

        /* sort menu*/

        public function updateFooterOrder(Request $request) {
            $selectedData = $request->selectedData;

            $i = 1;
            foreach($selectedData as $selectedValue) {
                Footermenu::where('id', $selectedValue)->update(['order' =>  $i]);
                $i++;
            }

         return json_encode(array('status' => 1, 'message' => 'Sequence updated succcessfully'));
        }

}
