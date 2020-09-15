<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use App\Helpers;
use App\Media;
use App\Doctor;
use App\Department;
use App\About;
use App\Affiliate;
use App\Award;
use App\Benefit;
use App\Event;
use App\Eventcourse;
use App\Eventspeaker;
use App\Eventbanner;
use App\Eventsbanner;
use App\History;
use App\Know_Imc;
use App\slider;
use App\Leadership;
use App\LeadershipMessage;
use App\News;
use App\Pagesection;
use App\Service;
use App\testimonies;
use App\Residence;
use App\PatientLibrary;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller {

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            if ($user->role_id == 2) {
                return redirect('permission');
            } else {
                return $next($request);
            }
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //$allmedia = Media::all();
        //return view ('media.index',compact("allmedia"));
        $allmedia = Media::orderBy('id', 'desc')->paginate('20');
        return view('media.index', compact('allmedia'));
    }

    public function getmedia() {
        // media ke save ke liye 2019 dalo, but folder mai nahi
        $helper = new Helpers();

        //       $alldep= Residence::get();
        //       foreach($alldep as $d){
        //       if(!empty($d['image'])){
        //       $path = "residences/".$d['image'];
        //       $imgname="2019/11/".$d['image'];
        //       $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        //       $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        //       Residence::where('id',$d['id'])->update(['media_id'=>$Mediaid]);
        //       $helper->movemages($path);
        //       }
        //   }
        //       $alldep= Pagesection::where('page','mayo')->get();
        //       foreach($alldep as $d){
        //       if(!empty($d['icon'])){
        //       $path = "section/".$d['icon'];
        //       $imgname="2019/11/".$d['icon'];
        //       $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        //       $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        //       Pagesection::where('id',$d['id'])->update(['media_id_en'=>$Mediaid]);
        //       $helper->movemages($path);
        //       }
        //       if(!empty($d['icon_ar'])){
        //       $path = "section/".$d['icon_ar'];
        //       $imgname="2019/11/".$d['icon_ar'];
        //       $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        //       $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        //       Pagesection::where('id',$d['id'])->update(['media_id_ar'=>$Mediaid]);
        //       $helper->movemages($path);
        //       }
        //   }
        //     $alldep= Pagesection::get();
        //     foreach($alldep as $d){
        //     if(!empty($d['icon'])){
        //     $path = "section/".$d['icon'];
        //     $imgname="2019/11/".$d['icon'];
        //     $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        //     $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        //     Pagesection::where('id',$d['id'])->update(['media_id_en'=>$Mediaid]);
        //     $helper->movemages($path);
        //     }
        //     if(!empty($d['icon_ar'])){
        //     $path = "section/".$d['icon_ar'];
        //     $imgname="2019/11/".$d['icon_ar'];
        //     $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        //     $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        //     Pagesection::where('id',$d['id'])->update(['media_id_ar'=>$Mediaid]);
        //     $helper->movemages($path);
        //     }
        // }
        // $alldep= testimonies::get();
        // foreach($alldep as $d){
        //       if(!empty($d['video1'])){
        //          $path = "testimonies/".$d['video1'];
        //          $imgname="2019/11/".$d['video1'];
        //           $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        //           $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        //             testimonies::where('id',$d['id'])->update(['media_id'=>$Mediaid]);
        //          $helper->movemages($path);
        //         }
        //       }
        // $alldep= Pagesection::get();
        // foreach($alldep as $d){
        // if(!empty($d['icon'])){
        // $path = "section/".$d['icon'];
        // $imgname="2019/11/".$d['icon'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // Pagesection::where('id',$d['id'])->update(['media_id_en'=>$Mediaid]);
        // }
        // if(!empty($d['icon_ar'])){
        // $path = "section/".$d['icon_ar'];
        // $imgname="2019/11/".$d['icon_ar'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // Pagesection::where('id',$d['id'])->update(['media_id_ar'=>$Mediaid]);
        // $helper->movemages($path);
        // }
        // }
        // $alldep= Service::get();
        // foreach($alldep as $d){
        // if(!empty($d['icon'])){
        // $path = "services/".$d['icon'];
        // $imgname="2019/11/".$d['icon'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // Service::where('id',$d['id'])->update(['media_id'=>$Mediaid]);
        // }
        // $helper->movemages($path);
        // }
        // $alldep= News::get();
        // foreach($alldep as $d){
        //     if(!empty($d['icon'])){
        //     $path = "news/".$d['icon'];
        //     $imgname="2019/11/".$d['icon'];
        //     $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        //     $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        //     News::where('id',$d['id'])->update(['media_id'=>$Mediaid]);
        //     $helper->movemages($path);
        //     }
        // }
        // $alldep= LeadershipMessage::get();
        // foreach($alldep as $d){
        // if(!empty($d['icon'])){
        // $path = "leaderships/".$d['icon'];
        // $imgname="2019/11/".$d['icon'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // LeadershipMessage::where('id',$d['id'])->update(['media_id'=>$Mediaid]);
        // $helper->movemages($path);
        // }
        // }
        // $alldep= Leadership::get();
        // foreach($alldep as $d){
        // if(!empty($d['icon'])){
        // $path = "leaderships/".$d['icon'];
        // $imgname="2019/11/".$d['icon'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // Leadership::where('id',$d['id'])->update(['media_id'=>$Mediaid]);
        //     $helper->movemages($path);
        // }
        // }
        // $alldep= slider::get();
        // foreach($alldep as $d){
        // if(!empty($d['photo1'])){
        // $path = "sliders/".$d['photo1'];
        // $imgname="2019/11/".$d['photo1'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // slider::where('id',$d['id'])->update(['media_id_en'=>$Mediaid]);
        // $helper->movemages($path);
        // }
        // if(!empty($d['photo_ar'])){
        // $path = "sliders/".$d['photo_ar'];
        // $imgname="2019/11/".$d['photo_ar'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // slider::where('id',$d['id'])->update(['media_id_ar'=>$Mediaid]);
        // $helper->movemages($path);
        // }
        // }
        // $alldep= Know_Imc::get();
        // foreach($alldep as $d){
        // if(!empty($d['photo1'])){
        // $path = "knowimc/".$d['photo1'];
        // $imgname="2019/11/".$d['photo1'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // Know_Imc::where('id',$d['id'])->update(['media_id_photo'=>$Mediaid]);
        // $helper->movemages($path);
        // }
        // if(!empty($d['video1'])){
        // $path = "knowimc/videos/".$d['video1'];
        // $imgname="2019/11/".$d['video1'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // Know_Imc::where('id',$d['id'])->update(['media_id_video'=>$Mediaid]);
        // $helper->movemages($path);
        // }
        // }
        // $alldep= History::get();
        // foreach($alldep as $d){
        // if(!empty($d['icon'])){
        // $path = "histories/".$d['icon'];
        // $imgname="2019/11/".$d['icon'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // History::where('id',$d['id'])->update(['media_id_en'=>$Mediaid]);
        //  $helper->movemages($path);
        // }
        // if(!empty($d['icon_ar'])){
        // $path = "histories/".$d['icon_ar'];
        // $imgname="2019/11/".$d['icon_ar'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // History::where('id',$d['id'])->update(['media_id_ar'=>$Mediaid]);
        // $helper->movemages($path);
        // }
        // }
        //      $alldep= Eventsbanner::get();
        //      foreach($alldep as $d){
        //      if(!empty($d['image'])){
        //      $path = "events/banner/".$d['image'];
        //      $imgname="2019/11/".$d['image'];
        //      $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        //      $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        //      Eventsbanner::where('id',$d['id'])->update(['media_id'=>$Mediaid]);
        //       $helper->movemages($path);
        //      }
        //   }
//      $alldep= Eventbanner::get();
//          foreach($alldep as $d){
//          if(!empty($d['image'])){
//          $path = "events/banner/".$d['image'];
//          $imgname="2019/11/".$d['image'];
//          $ext = pathinfo($imgname, PATHINFO_EXTENSION);
//          $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
//          Eventbanner::where('id',$d['id'])->update(['media_id_en'=>$Mediaid]);
//           $helper->movemages($path);
//          }
//          if(!empty($d['imageAr'])){
//           $path = "events/banner/".$d['imageAr'];
//           $imgname="2019/11/".$d['imageAr'];
//           $ext = pathinfo($imgname, PATHINFO_EXTENSION);
//           $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
//           Eventbanner::where('id',$d['id'])->update(['media_id_ar'=>$Mediaid]);
//           $helper->movemages($path);
//           }
//   }
        // $alldep= Eventspeaker::get();
        // foreach($alldep as $d){
        // if(!empty($d['image'])){
        // $path = "events/speaker/".$d['image'];
        // $imgname="2019/11/".$d['image'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // Eventspeaker::where('id',$d['id'])->update(['media_id_en'=>$Mediaid]);
        //  $helper->movemages($path);
        // }
        // if(!empty($d['imageAr'])){
        // $path = "events/speaker/".$d['imageAr'];
        // $imgname="2019/11/".$d['imageAr'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // Eventspeaker::where('id',$d['id'])->update(['media_id_ar'=>$Mediaid]);
        // $helper->movemages($path);
        // }
        // }
        // $alldep= Event::whereIn('id',[28,29,30,31])->get();
        // foreach($alldep as $d){
        // if(!empty($d['image1']) ){
        // $path = "events/".$d['image1'];
        // $imgname="2019/11/".$d['image1'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // Event::where('id',$d['id'])->update(['media_id_en'=>$Mediaid]);
        // $helper->movemages($path);
        // }
        // if(!empty($d['image1Ar'])){
        // $path = "events/".$d['image1Ar'];
        // $imgname="2019/11/".$d['image1Ar'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // Event::where('id',$d['id'])->update(['media_id_ar'=>$Mediaid]);
        // $helper->movemages($path);
        // }
        // }
        // $alldep= Benefit::get();
        // foreach($alldep as $d){
        // if(!empty($d['image'])){
        // $path = "benefits/".$d['image'];
        // $imgname="2019/11/".$d['image'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // Benefit::where('id',$d['id'])->update(['media_id'=>$Mediaid]);
        // $helper->movemages($path);
        // }
        // }
        // $alldep= Award::get();
        // foreach($alldep as $d){
        // if(!empty($d['icon'])){
        // $path = "awards/".$d['icon'];
        // $imgname="2019/11/".$d['icon'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // Award::where('id',$d['id'])->update(['media_id'=>$Mediaid]);
        //  $helper->movemages($path);
        //   }
        // }
        // $alldep= Affiliate::get();
        // foreach($alldep as $d){
        // if(!empty($d['icon'])){
        // $path = "affiliates/".$d['icon'];
        // $imgname="2019/11/".$d['icon'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // Affiliate::where('id',$d['id'])->update(['media_id'=>$Mediaid]);
        // $helper->movemages($path);
        // }
        // }
        // $alldep= About::get();
        // foreach($alldep as $d){
        // if(!empty($d['video'])){
        // $path = "about/".$d['video'];
        // $imgname="2019/11/".$d['video'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // About::where('id',$d['id'])->update(['media_id'=>$Mediaid]);
        // $helper->movemages($path);
        // }
        // }
        // $alldep= Department::get();
        // foreach($alldep as $d){
        // if(!empty($d['image'])){
        // $path = "department/".$d['image'];
        // $imgname="2019/11/".$d['image'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=  Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // Department::where('id',$d['id'])->update(['media_id'=>$Mediaid]);
        // $helper->movemages($path);
        // }
        // }
        // $alldoc= Doctor::get();
        // foreach($alldoc as $d){
        // if(!empty($d['imgUrl'])){
        // $path = "doctors/".$d['imgUrl'];
        // $imgname="2019/11/".$d['imgUrl'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // Doctor::where('id',$d['id'])->update(['media_id_en'=>$Mediaid]);
        // $helper->movemages($path);
        // }
        // if(!empty($d['imgUrlAr'])){
        // $path = "doctors/".$d['imgUrlAr'];
        // $imgname="2019/11/".$d['imgUrlAr'];
        // $ext = pathinfo($imgname, PATHINFO_EXTENSION);
        // $Mediaid=Media::insertGetId(['filepath'=>$imgname,'type'=>$ext]);
        // Doctor::where('id',$d['id'])->update(['media_id_ar'=>$Mediaid]);
        // $helper->movemages($path);
        // }
        // }

        $allmedia = Media::where("type", "!=", "youtube")->orderBy('id', 'desc')->paginate(20);
        return view('media.getmedia', compact('allmedia'));
    }

    public function store(Request $request) {
        try {
            $helper = new Helpers();
            $files = $request->file('files');
            foreach ($files as $file) {
                $trimmeds = str_replace(' ', '_', $file->getClientOriginalName());
                $trimmed = str_replace('/', '_', $trimmeds);
                if (strlen($trimmed) > 15) {
                    $name = md5(rand(1, 1000)) . md5('xyz') . date('dmYhis') . '_' . substr($trimmed, 0, 15) . '.' . $file->getClientOriginalExtension();
                } else {
                    $name = md5(rand(1, 1000)) . md5('xyz') . date('dmYhis') . '_' . $trimmed;
                }
                $year = date('Y');
                $month = date('m');
                $yearMonth = "{$year}/{$month}";
                $path = base_path() . "/images/media/";
                $year_folder = $path . date("Y");
                $month_folder = $year_folder . '/' . date("m");
                !file_exists($year_folder) && mkdir($year_folder, 0777);
                chmod($year_folder, 0777);
                !file_exists($month_folder) && mkdir($month_folder, 0777);
                chmod($month_folder, 0777);
                $name = date('Ymdhis') . md5(rand(999, 9999));
                $name = md5(rand(9999, 99999999)) . time() . '.' . $file->getClientOriginalExtension();
                $file->move($month_folder, $name);
                chmod($month_folder, 0777);
                chmod($month_folder . '/' . $name, 0777);
                $dbFIlename = "{$yearMonth}/{$name}";
                $ext = $file->getClientOriginalExtension();
                $media = new Media();
                $media->filepath = $dbFIlename;
                $media->type = $ext;
                $media->save();
            }
            return redirect('admin/media')->with("message", "Files upload successfully")->with('alert-class', 'alert-success');
        } catch (Exception $e) {
            return redirect('admin/media')->with("message", $e->getMessage())->with('alert-class', 'alert-danger');
        }
    }

    public function deleteMultiple(Request $request) {
        try {
            $result = Media::whereIn('id', $request->ids)->delete();
            return json_encode(array('status' => 1, 'message' => "Media Deleted"));
        } catch (Exception $e) {
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    function upload(Request $request) {
        try {
            $helper = new Helpers();
            $file = $request->file('file');
            // upload the new image
            $trimmeds = str_replace(' ', '_', $file->getClientOriginalName());
            $trimmed = str_replace('/', '_', $trimmeds);
            if (strlen($trimmed) > 15) {
                $name = md5(rand(1, 1000)) . md5('xyz') . date('dmYhis') . '_' . substr($trimmed, 0, 15) . '.' . $file->getClientOriginalExtension();
            } else {
                $name = md5(rand(1, 1000)) . md5('xyz') . date('dmYhis') . '_' . $trimmed;
            }
            $year = date('Y');
            $month = date('m');
            $yearMonth = "{$year}/{$month}";
            // $path = "/images/media/" . $year . "/" . $month;
            $path = base_path() . "/images/media/";

            $year_folder = $path . date("Y");
            $month_folder = $year_folder . '/' . date("m");

            //Thumbnail Path
            //dd($month_folder);
            !file_exists($year_folder) && mkdir($year_folder, 0777);
            chmod($year_folder, 0777);
            !file_exists($month_folder) && mkdir($month_folder, 0777);
            chmod($month_folder, 0777);
            //Checking if thumbnails folders exist
            //dd($month_folder.'/'.$name);

            $name = date('Ymdhis') . md5(rand(999, 9999));
            $name = md5(rand(9999, 99999999)) . time() . '.' . $file->getClientOriginalExtension();
            //  chmod( $month_folder.'/'.$name,0777);
            //echo $month_folder.'/'.$name; exit;
            $file->move($month_folder, $name);
            chmod($month_folder, 0777);
            chmod($month_folder . '/' . $name, 0777);

            $dbFIlename = "{$yearMonth}/{$name}";
            // echo $dbFIlename; exit;
            //  $name=$year."/".$month."/".substr($name,-90);
            //$file->move($path,$name); // move to the desired folder

            $ext = $request->file->getClientOriginalExtension();
            $media = new Media();
            $media->filepath = $dbFIlename;
            $media->type = $ext;
            $media->save();
            $position = strpos($file, '_');
            $original_filename = substr($file, $position + 1, strlen($file));
            $response = array(
                "status" => 1,
                "filepath" => $dbFIlename,
                "fileOriginalName" => $original_filename,
                'extention' => $ext
            );
        } catch (\Exception $e) {
            $response = array(
                "status" => 0,
                "filepath" => $e->getMessage()
            );
        }
        return response()->json($response);
    }

}
