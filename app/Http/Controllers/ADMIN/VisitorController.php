<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Visitor;
use App\Pagesection;
use Config;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $visitors = Visitor::paginate($per_page);
        return view ('visitor.index',compact("visitors"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('visitor.create');
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
            $this->validate($request,[
                'title_en' => 'required|max:500',
                'title_ar' => 'required|max:500',
                'description_en' => 'required',
                'description_ar' => 'required',
            ],[
                'title_en.required' => 'Please enter title in english',
                'title_ar.required' => 'Please enter title in arabic',
                'description_en.required' => 'Please enter descriptions in english',
                'description_ar.required' => 'Please enter descriptions in arabic'
            ]);

            $visitor = new Visitor();
            $visitor->title_en = $request->title_en;
            $visitor->title_ar = $request->title_ar;
            $visitor->description_en = $request->description_en;
            $visitor->description_ar = $request->description_ar;
            $visitor->save();
            return redirect('admin/visitor')->with("message","Visitor created")->with('alert-class', 'alert-success');
        }catch(Exception $e){
            return redirect('admin/visitor')->with("message",$e->getMessage())->with('alert-class', 'alert-danger');
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
        $visitor = Visitor::find($id);
        return view("visitor.edit",compact("visitor"));
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
            $this->validate($request,[
                'title_en' => 'required|max:500',
                'title_ar' => 'required|max:500',
                //'description_en' => 'required|max:2000',
                //'description_ar' => 'required|max:2000',
            ],[
                'title_en.required' => 'Please enter title in english',
                'title_ar.required' => 'Please enter title in arabic',
              //  'description_en.required' => 'Please enter descriptions in english',
                //'description_ar.required' => 'Please enter descriptions in arabic'
                ]);

            $visitor = Visitor::find($id);
            $visitor->title_en = $request->title_en;
            $visitor->title_ar = $request->title_ar;
            $visitor->description_en = $request->description_en;
            $visitor->description_ar = $request->description_ar;
            $visitor->save();
            return redirect('admin/visitor')->with("message","Visitor Updated")->with('alert-class', 'alert-success');
        }catch(Exception $e){
            return redirect('admin/visitor')->with("message",$e->getMessage())->with('alert-class', 'alert-danger');
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
            $visitor = Visitor::find($id);
            $visitor->delete();
            return json_encode(array('status' => 1, 'message' => "Visitor Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function deleteMultiple(Request $request)
    {
        try{
            $result = Visitor::whereIn('id', $request->ids)->delete();
            return json_encode(array('status' => 1, 'message' => "Visitors Deleted"));
        }catch(Exception $e){
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function section(){
        return view ('visitor.section');
    }

    public function getSectionContent(Request $request){
        try{
            $content = Pagesection::where(["page"=>$request->page,"section"=>$request->section])->get()->first();
            return json_encode(array("status" => 1, "message" => "Load Data Successfully", "content" => $content));
        }catch(Exception $e){
            return json_encode(array("status" => 0, "message" => $e->getMessage()));
        }
    }

    public function updateSectionContent(Request $request){
        try{
            $content = Pagesection::where(["page"=>$request->page,"section"=>$request->section])->get()->first();
            if($content){
                $pageSection = Pagesection::find($content->id);
                $pageSection->title_en = $request->title_en;
                $pageSection->title_ar = $request->title_ar;
                $pageSection->description_en = $request->description_en;
                $pageSection->description_ar = $request->description_ar;
                $pageSection->save();
            }else{
                $pageSection = new Pagesection;
                $pageSection->page = $request->page;
                $pageSection->section = $request->section;
                $pageSection->title_en = $request->title_en;
                $pageSection->title_ar = $request->title_ar;
                $pageSection->description_en = $request->description_en;
                $pageSection->description_ar = $request->description_ar;
                $pageSection->save();
            }
            return json_encode(array("status" => 1, "message" => "Update Data Successfully"));
        }catch(Exception $e){
            return json_encode(array("status" => 0, "message" => $e->getMessage()));
        }
    }
}
