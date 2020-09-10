<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pagesection;
use App\Helpers;
use Config;
use App\InitProject;
use App\InitCategory;
use Illuminate\Support\Facades\Auth;
use App\InitProjectCategory;

class InitProjectController extends Controller {

    private $title = "Project";
    private $action = "projects";
    private $folder = "projects";

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

        $all = InitProject::get();

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $searchname = "";
        if (isset($request->name)) {
            $searchname = $request->name;
            $model = InitProject::where("title_en", "like", "%" . $request->name . "%")->paginate($per_page);
        } else {
            $model = InitProject::paginate($per_page);
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

        $categories = InitCategory::latest()->pluck("title_en", "id");

        $data["categories"] = $categories;
        $model = new InitProject();
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
            unset($input['categories']);
            unset($input['image1']);
            $model = new InitProject();

            if (empty($request->slug_en)) {
                $input["slug_en"] = str_slug($request->title_en, '-');
            }
            if (empty($request->slug_ar)) {
                $input["slug_ar"] = str_slug($request->title_ar, '-');
            }
            if (isset($request->status)) {
                $input["status"] = 1;
            } else {
                $input["status"] = 2;
            }


            if (!empty($request->image1) && $request->image1 != null) {
                $media_id = $helper->getMediaID($request->image1);
                $input["image"] = $request->image1;
                $input["media_id"] = $media_id;
            }
            
            $model = InitProject::create($input);

            $categories = $request->categories;

            foreach ($categories as $category_id) {
                $categoryModel = new InitProjectCategory();
                $categoryModel->category_id = $category_id;
                $categoryModel->project_id = $model->id;
                $categoryModel->created_at = date("Y-m-d H:i:s");
                $categoryModel->save();
            }

            return redirect('admin/init/' . $this->folder)->with("message", "InitProject created")->with('alert-class', 'alert-success');
        } catch (Exception $e) {
            return redirect('admin/init/' . $this->folder)->with("message", $e->getMessage())->with('alert-class', 'alert-danger');
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
        $model = InitProject::find($id);

        $helper = new Helpers();

        $selected = array();
        foreach ($model->categories as $gc) {
            $selected[] = $gc->category_id;
        }

        $categories = InitCategory::latest()->pluck('title_en', 'id');


        $data["helper"] = $helper;
        $data["categories"] = $categories;
        $data["selected"] = $selected;
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
            $categories = $input['categories'];
            unset($input['_token']);
            unset($input['_method']);
            unset($input['submit']);
            unset($input['categories']);
             unset($input['image1']);

            if (empty($request->slug_en)) {
                $input["slug_en"] = str_slug($request->title_en, '-');
            }
            if (empty($request->slug_ar)) {
                $input["slug_ar"] = str_slug($request->title_ar, '-');
            }
            if (isset($request->status)) {
                $input["status"] = 1;
            } else {
                $input["status"] = 2;
            }

            if (!empty($request->image1) && $request->image1 != null) {
                $media_id = $helper->getMediaID($request->image1);
                $input["image"] = $request->image1;
                $input["media_id"] = $media_id;
            }

            $model = InitProject::where("id", $id)->update($input);

            InitProjectCategory::where('project_id', $id)->delete();
            foreach ($categories as $category_id) {
                $categoryModel = new InitProjectCategory();
                $categoryModel->category_id = $category_id;
                $categoryModel->project_id = $id;
                $categoryModel->created_at = date("Y-m-d H:i:s");
                $categoryModel->save();
            }

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
            $model = InitProject::find($id);
            $model->delete();
            return json_encode(array('status' => 1, 'message' => "Project Deleted"));
        } catch (Exception $e) {
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function deleteMultiple(Request $request) {
        try {
            $result = InitProject::whereIn('id', $request->ids)->delete();
            return json_encode(array('status' => 1, 'message' => "Project Deleted"));
        } catch (Exception $e) {
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

}
