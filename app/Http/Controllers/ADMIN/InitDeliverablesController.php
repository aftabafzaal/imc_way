<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pagesection;
use App\Helpers;
use Config;
use App\InitDeliverables;
use Illuminate\Support\Facades\Auth;

class InitDeliverablesController extends Controller {

    private $title = "Deliverable";
    private $action = "deliverables";
    private $folder = "deliverables";

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

        $all = InitDeliverables::get();

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $searchname = "";
        if (isset($request->name)) {
            $searchname = $request->name;
            $model = InitDeliverables::where("description_en", "like", "%" . $request->name . "%")->paginate($per_page);
        } else {
            $model = InitDeliverables::paginate($per_page);
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

        $model = new InitDeliverables();
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
                'description_en' => 'required|max:500',
                'description_ar' => 'required|max:500',
                    //'image' =>'required',
                    ], [
                'description_en.required' => 'Please enter description in english',
                'description_ar.required' => 'Please enter description in arabic',
                    //  'image.required' => 'Please select image file'
            ]);

            $input = $request->all();
            unset($input['_token']);

            $model = new InitDeliverables();

            if (isset($request->status)) {
                $input["status"] = 1;
            } else {
                $input["status"] = 2;
            }


            $model = InitDeliverables::create($input);

            return redirect('admin/init/' . $this->action)->with("message", "InitDeliverables created")->with('alert-class', 'alert-success');
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
        $model = InitDeliverables::find($id);

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
                'description_en' => 'required|max:500',
                'description_ar' => 'required|max:500',
                    ], [
                'description_en.required' => 'Please enter description in english',
                'description_ar.required' => 'Please enter description in arabic',
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

            $model = InitDeliverables::where("id", $id)->update($input);

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
            $model = InitDeliverables::find($id);
            $model->delete();
            return json_encode(array('status' => 1, 'message' => "Project Deleted"));
        } catch (Exception $e) {
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function deleteMultiple(Request $request) {
        try {
            $result = InitDeliverables::whereIn('id', $request->ids)->delete();
            return json_encode(array('status' => 1, 'message' => "Project Deleted"));
        } catch (Exception $e) {
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

}
