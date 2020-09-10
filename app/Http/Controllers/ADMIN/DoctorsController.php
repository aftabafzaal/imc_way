<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers;
use App\Department;
use App\Category;
use App\Language;
use App\Doctor;
use App\Doctor_experience;
use App\Doctor_education;
use App\Doctor_language;
use App\Doctor_category;
use Config;
use DB;

class DoctorsController extends Controller
{



      /* User record can be delete by this function */
      public function deleteSingleUser(Request $request)
      {
          $user = \App\Doctor::find($request->id);
          $status = $user->delete();

          if($status) {
  			$message 		= "Doctor deleted successfully";
              $returnStatus 	= 1;

          } else {
  			$message 		= "Unable to delete this doctor";
  			$returnStatus 	= 0;
          }
          return json_encode(array('status' => $returnStatus, 'message' => $message));
      }




      /*update multi users status*/
      public function updateMultiUserStatus(Request $request) {

          $result = Doctor::whereIn('id', $request->ids)->update(['isactive' => $request->status]);

          if($result) {

              if($request->status == 1) {
                  $message 		= "Doctor(s) activated successfully";
              } else {
                  $message 		= "Doctor(s) blocked successfully";
              }

              $returnStatus 	= 1;

          } else {

              if($request->status == 1) {
                  $message 		= " Unable to activate Doctor(s)";
              } else {
                  $message 		= "Unable to block Doctor(s)";
              }
              $returnStatus 	= 0;
           }
          return json_encode(array('status' => $returnStatus, 'message' => $message));
      }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $helper = new Helpers();

          $all= Doctor::get();
          foreach($all as $key=>$v){
         //  Doctor::where('id',$v->id)->update(['slug_en'=>str_slug($v['givenName'],'-'), 'slug_ar'=>$helper->make_slug($v['givenNameAr'],'-')   ]);
          //Doctor::where('id',$v->id)->update(['slug_en'=>str_slug($v['givenName'],'-'), 'slug_ar'=>str_slug($v['givenName'],'-')   ]);


          }

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $searchname = "";
        if(isset($request->name)){
            $searchname = $request->name;
            $doctors = Doctor::where("givenName","like","%".$request->name."%")->orderby('id','desc')->paginate($per_page);
        }else{
            $doctors = Doctor::orderby('id','desc')->paginate($per_page);
        }
        return view ('doctors.index',compact("doctors","searchname"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $categories = Category::all();
        $languages = Language::all();
        return view ('doctors.create',compact("departments","categories","languages"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $helper = new Helpers();
            $this->validate($request,[
              //   'docCode' => 'required',
              // //  'title' => 'required',
              //   'givenName' => 'required',
              //   'givenNameAr' => 'required',
              //   'department_id' => 'required',
              //   'category_id' => 'required',
              //   'docRating' => 'required',
              //   'imgUrl' => 'required',
              //   'designation' => 'required',
              //   'languages' => 'required|array'

            ],[
                // 'docCode.required' => 'Please enter doctor code',
                // //'title.required' => 'Please enter title',
                // 'givenName.required' => 'Please enter name in english',
                // 'givenNameAr.required' => 'Please enter name in arabic',
                // 'department_id.required' => 'Please select department',
                // 'category_id.required' => 'Please select category',
                // 'docRating.required' => 'Please enter rating',
                // 'imgUrl.required' => 'Please select image',
                // 'designation.required' => 'Please enter designation',
                // 'languages.required' => 'Please select languages'
            ]);


           $doctorData = $request->toArray();
            //$doctorData['slug_en'] =  str_slug( $doctorData['slug_en'],'-');
            //$doctorData['slug_ar'] = $helper->make_slug($v['slug_ar'],'-');
            $doctorData['slug_en'] =$doctorData['slug_en'];
            $doctorData['slug_ar'] =$doctorData['slug_ar'];

           $doctorEducation = $doctorData['education'];
           $doctorExperience = $doctorData['experience'];
           $doctorLanguages = isset($doctorData['languages'])?$doctorData['languages']:["1"];
           $doctorCategories = isset($doctorData['category_id'])?$doctorData['category_id']:["1"];

           unset($doctorData['_token']);
           unset($doctorData['education']);
           unset($doctorData['experience']);
           unset($doctorData['languages']);
           unset($doctorData['category_id']);

            if(!isset($doctorData['isactive'])){
                $doctorData['isactive'] = 0;
            }

            if(!isset($doctorData['is_surgon'])){
                $doctorData['is_surgon'] = 0;
            }


            if(!empty($request->imgUrl) && $request->imgUrl != null) {
                $mediaid= $helper->getMediaID($request->imgUrl);
                $doctorData['imgUrl'] = $request->imgUrl;
                $doctorData['media_id_en'] = $mediaid;
            }

            if(!empty($request->imgUrlAr) && $request->imgUrlAr != null) {
                $mediaid= $helper->getMediaID($request->imgUrlAr);
                $doctorData['imgUrlAr'] = $request->imgUrlAr;
                $doctorData['media_id_ar'] = $mediaid;
            }


            $doctor = Doctor::create($doctorData);

            foreach($doctorEducation as $education){
                if($education['title'] !=""){
                    $education['doctor_id'] = $doctor->id;
                    Doctor_education::create($education);
                }
            }

            foreach($doctorExperience as $experience){
                if($experience['title'] !=""){
                    $experience['doctor_id'] = $doctor->id;
                    Doctor_experience::create($experience);
                }
            }

            foreach($doctorLanguages as $lang){
                $language['language_id'] = $lang;
                $language['doctor_id'] = $doctor->id;
                Doctor_language::create($language);
            }

            foreach($doctorCategories as $category){
                $categories['category_id'] = $category;
                $categories['doctor_id'] = $doctor->id;
                Doctor_category::create($categories);
            }

            return redirect('admin/doctors')->with("message","Doctor created")->with('alert-class', 'alert-success');
        }catch(Exception $e){
            return redirect('admin/doctors')->with("message",$e->getMessage())->with('alert-class', 'alert-danger');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Department::all();
        $categories = Category::all();
        $languages = Language::all();

        $doctor = Doctor::findOrFail($id);
//dd($languages);
        return view("doctors.edit",compact("departments","languages","categories","doctor"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $helper = new Helpers();
            $this->validate($request,[
              //   'docCode' => 'required',
              // //  'title' => 'required',
              //   'givenName' => 'required',
              //   'givenNameAr' => 'required',
              //   'department_id' => 'required',
              //   'category_id' => 'required',
              //   'docRating' => 'required',
              //   'imgUrl' => 'required',
              //   'designation' => 'required',
              //   'languages' => 'required|array'

            ],[
                // 'docCode.required' => 'Please enter doctor code',
                // //'title.required' => 'Please enter title',
                // 'givenName.required' => 'Please enter name in english',
                // 'givenNameAr.required' => 'Please enter name in arabic',
                // 'department_id.required' => 'Please select department',
                // 'category_id.required' => 'Please select category',
                // 'docRating.required' => 'Please enter rating',
                // 'imgUrl.required' => 'Please select image',
                // 'designation.required' => 'Please enter designation',
                // 'languages.required' => 'Please select languages'
            ]);


           $doctor = Doctor::find($id);
           $doctorData = $request->toArray();
           $doctorData['slug_en'] =$doctorData['slug_en'];
           $doctorData['slug_ar'] =$doctorData['slug_ar'];
           $doctorEducation = $doctorData['education'];
           $doctorExperience = $doctorData['experience'];
           $doctorLanguages = isset($doctorData['languages'])?$doctorData['languages']:["1"];
           $doctorCategories = isset($doctorData['category_id'])?$doctorData['category_id']:["1"];

           unset($doctorData['_token']);
           unset($doctorData['_method']);
           unset($doctorData['education']);
           unset($doctorData['experience']);
           unset($doctorData['languages']);
           unset($doctorData['category_id']);

            if(!isset($doctorData['isactive'])){
                $doctorData['isactive'] = 0;
            }

            if(!isset($doctorData['is_surgon'])){
                $doctorData['is_surgon'] = 0;
            }

            DB::beginTransaction();



            if(!empty($request->imgUrl) && $request->imgUrl != null) {
                $mediaid= $helper->getMediaID($request->imgUrl);
                $doctorData['imgUrl'] = $request->imgUrl;
                $doctorData['media_id_en'] = $mediaid;
            }else{
                $doctorData['imgUrl'] = $doctor['imgUrl'];
                $doctorData['media_id_en'] = $doctor['media_id_en'];
            }


                if(!empty($request->imgUrlAr) && $request->imgUrlAr != null) {
                    $mediaid= $helper->getMediaID($request->imgUrlAr);
                    $doctorData['imgUrlAr'] = $request->imgUrl;
                    $doctorData['media_id_ar'] = $mediaid;
                }else{
                    $doctorData['imgUrlAr'] = $doctor['imgUrlAr'];
                    $doctorData['media_id_ar'] = $doctor['media_id_ar'];
                }



            Doctor::where('id',$id)->update($doctorData);

            Doctor_education::where('doctor_id',$id)->delete();
            foreach($doctorEducation as $education){
                if($education['title'] !=""){
                    $education['doctor_id'] = $id;
                    Doctor_education::create($education);
                }
            }

            Doctor_experience::where('doctor_id',$id)->delete();
            foreach($doctorExperience as $experience){
                if($experience['title'] !=""){
                    $experience['doctor_id'] = $id;
                    Doctor_experience::create($experience);
                }
            }

            Doctor_language::where('doctor_id',$id)->delete();
            foreach($doctorLanguages as $lang){
                $language['language_id'] = $lang;
                $language['doctor_id'] = $id;
                Doctor_language::create($language);
            }

            Doctor_category::where('doctor_id',$id)->delete();
            foreach($doctorCategories as $category){
                $categories['category_id'] = $category;
                $categories['doctor_id'] = $id;
                Doctor_category::create($categories);
            }
            DB::commit();
            return redirect('admin/doctors')->with("message","Doctor created")->with('alert-class', 'alert-success');
        }catch(Exception $e){
            return redirect('admin/doctors')->with("message",$e->getMessage())->with('alert-class', 'alert-danger');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            return json_encode(array('status' => 1, 'message' => "Doctor Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function deleteMultiple(Request $request)
    {
        try{
            return json_encode(array('status' => 1, 'message' => "Doctor Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
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

    public function convertData(Request $request){
        $data = $request->toArray();
        $data["languagesTxt"] = implode("/",$data["languages"]);
        $data["languagesTxtAr"] = implode("/",$data["languages"]);
        /* $data["languagesTxtAr"] = "MED"; */
        $data["work_experience"] = $data["experience"];
        unset($data['_token']);
        unset($data['languages']);
        unset($data['experience']);
        return json_encode($data);
    }
}
