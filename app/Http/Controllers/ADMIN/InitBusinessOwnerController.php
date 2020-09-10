<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pagesection;
use App\Helpers;
use Config;
use App\InitBusinessOwner;
use Illuminate\Support\Facades\Auth;

class InitBusinessOwnerController extends Controller {

    private $title = "Business Owners";
    private $action = "businessowners";
    private $folder = "business_owners";

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
        //die("dasdasd");
        $helper = new Helpers();

        $all = InitBusinessOwner::get();

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $searchname = "";
        if (isset($request->name)) {
            $searchname = $request->name;
            $model = InitBusinessOwner::where("title_en", "like", "%" . $request->name . "%")->paginate($per_page);
        } else {
            $model = InitBusinessOwner::paginate($per_page);
        }
        $data["searchname"] = $searchname;
        $data["model"] = $model;
        $data["folder"] = $this->folder;
        $data["title"] = $this->title;
        $data["action"] = $this->action;

        return view("admin.init." . $this->folder . ".index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
        $model = new InitBusinessOwner();
        $data["model"] = $model;
        $data["selected"] = NULL;
        $data["folder"] = $this->folder;
        $data["title"] = $this->title;
        $data["action"] = $this->action;


        return view("admin.init." . $this->folder . ".create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {
            $helper = new Helpers();
            $this->validate($request, [
                'title_en' => 'required|max:500',
                'title_ar' => 'required|max:500',
                    //'image' =>'required',
                    ], [
                'title_en.required' => 'Please enter title in english',
                'title_ar.required' => 'Please enter title in arabic',
                    //  'image.required' => 'Please select image file'
            ]);

            $input = $request->all();
            unset($input['_token']);

            $model = new InitBusinessOwner();

            if (isset($request->status)) {
                $input["status"] = 1;
            } else {
                $input["status"] = 2;
            }


            $model = InitBusinessOwner::create($input);

            return redirect('admin/init/' . $this->action)->with("message", "InitBusinessOwner created")->with('alert-class', 'alert-success');
        } catch (Exception $e) {
            return redirect('admin/init/' . $this->action)->with("message", $e->getMessage())->with('alert-class', 'alert-danger');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $model = InitBusinessOwner::find($id);

        $data["model"] = $model;
        $data["folder"] = $this->folder;
        $data["title"] = $this->title;
        $data["action"] = $this->action;
        return view("admin.init." . $this->folder . ".edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $helper = new Helpers();
        try {
            $this->validate($request, [
                'title_en' => 'required|max:500',
                'title_ar' => 'required|max:500',
                    ], [
                'title_en.required' => 'Please enter title in english',
                'title_ar.required' => 'Please enter title in arabic',
            ]);

            $input = $request->all();
            unset($input['_method']);
            unset($input['_token']);
            unset($input['submit']);

            if (isset($request->status)) {
                $input["status"] = 1;
            } else {
                $input["status"] = 2;
            }

            $model = InitBusinessOwner::where("id", $id)->update($input);

            return redirect('admin/init/' . $this->action)->with("message", "Project Updated")->with('alert-class', 'alert-success');
        } catch (Exception $e) {
            return redirect('admin/init/' . $this->action)->with("message", $e->getMessage())->with('alert-class', 'alert-danger');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            $model = InitBusinessOwner::find($id);
            $model->delete();
            return json_encode(array('status' => 1, 'message' => "Project Deleted"));
        } catch (Exception $e) {
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function deleteMultiple(Request $request) {
        try {
            $result = InitBusinessOwner::whereIn('id', $request->ids)->delete();
            return json_encode(array('status' => 1, 'message' => "Project Deleted"));
        } catch (Exception $e) {
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

}
