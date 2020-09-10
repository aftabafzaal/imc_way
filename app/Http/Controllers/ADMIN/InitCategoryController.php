<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pagesection;
use App\Helpers;
use Config;
use App\InitCategory;
use Illuminate\Support\Facades\Auth;

class InitCategoryController extends Controller {

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

        $all = InitCategory::with("ancestors")->get();

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $searchname = "";
        if (isset($request->name)) {
            $searchname = $request->name;
            $model = InitCategory::with("ancestors")->where("title_en", "like", "%" . $request->name . "%")->paginate($per_page);
        } else {
            $model = InitCategory::with("ancestors")->paginate($per_page);
        }
        return view('admin.init.categories.index', compact("model", "searchname"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $categories = InitCategory::latest()->pluck("title_en","id");

        $data["categories"] = $categories;
        $model = new InitCategory();
        $data["model"] = $model;
        return view('admin.init.categories.create', $data);
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
            $model = new InitCategory();

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
            $category = InitCategory::create($input);

            if ($request->parent && $request->parent !== 'none') {
                //  Here we define the parent for new created category
                $node = InitCategory::find($request->parent);

                $node->appendNode($category);
            }

            //$model->insert($model);
            return redirect('admin/init/categories')->with("message", "InitCategory created")->with('alert-class', 'alert-success');
        } catch (Exception $e) {
            return redirect('admin/init/categories')->with("message", $e->getMessage())->with('alert-class', 'alert-danger');
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
        $data["model"] = InitCategory::find($id);

        $categories = InitCategory::where("id", "!=", $id)->latest()->pluck('title_en', 'id');

        $data["categories"] = $categories;

        return view("admin.init.categories.edit", $data);
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
            unset($input['_token']);
            unset($input['_method']);
            unset($input['parent']);
            unset($input['submit']);

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
            $category = InitCategory::where("id", $id)->update($input);

            if ($request->parent && $request->parent !== 'none') {
                //  Here we define the parent for new created category
                $model = InitCategory::find($id);
                $node = InitCategory::find($request->parent);
                $node->appendNode($model);
            } elseif ($request->parent == 'none') {
                $node = InitCategory::find($id);
                $node->makeRoot()->save();
            }




            return redirect('admin/init/categories')->with("message", "Category Updated")->with('alert-class', 'alert-success');
        } catch (Exception $e) {
            return redirect('admin/init/categories')->with("message", $e->getMessage())->with('alert-class', 'alert-danger');
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
            $model = InitCategory::find($id);
            $model->delete();
            return json_encode(array('status' => 1, 'message' => "Category Deleted"));
        } catch (Exception $e) {
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function deleteMultiple(Request $request) {
        try {
            $result = InitCategory::whereIn('id', $request->ids)->delete();
            return json_encode(array('status' => 1, 'message' => "Category Deleted"));
        } catch (Exception $e) {
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

}
