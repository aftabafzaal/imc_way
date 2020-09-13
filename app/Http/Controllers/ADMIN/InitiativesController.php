<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pagesection;
use App\Helpers;
use App\Department;
use Config;
use App\Initiatives;
use App\InitCategory;
use Illuminate\Support\Facades\Auth;
use App\InitiativeCategory;
use App\InitProject;
use App\InitBusinessOwner;
use App\InitiativeMedia;
use App\Media;

class InitiativesController extends Controller {

    private $title = "Initiative";
    private $action = "initiatives";
    private $folder = "initiatives";

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

        //$all = Initiatives::get();

        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));
        $searchname = "";
        if (isset($request->name)) {
            $searchname = $request->name;
            $model = Initiatives::where("title_en", "like", "%" . $request->name . "%");
        } else {
            $model = new Initiatives;
        }

        $model = $model->orderBy("id", "desc")->paginate($per_page);
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

        $projects = InitProject::latest()->pluck("title_en", "id");
        $categories = InitCategory::latest()->pluck("title_en", "id");
        $owners = InitBusinessOwner::latest()->pluck("title_en", "id");
        $departments = Department::latest()->pluck("title_en", "id");

        $data["projects"] = $projects;
        $data["departments"] = $departments;
        $data["owners"] = $owners;
        $data["categories"] = $categories;
        $model = new Initiatives();
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
                'project_id' => 'required|max:500',
                'where_en' => 'required|max:500',
                'where_ar' => 'required',
                    //'categories' => 'required',
                    //'image' =>'required',
                    ], [
                'title_en.required' => 'Please enter title in english',
                'title_ar.required' => 'Please enter title in arabic',
                'where_en.required' => 'Please location title in english ',
                'where_ar.required' => 'Please location title in arabic',
                    //  'image.required' => 'Please select image file'
            ]);

            $input = $request->all();
            $categories = isset($input['categories']) ? $input['categories'] : [];
            $attachments = isset($input['attachments']) ? $input['attachments'] : [];

            unset($input['_token']);
            unset($input['categories']);
            unset($input['attachments']);
            //InitiativeMedia

            $model = new Initiatives();

            if (empty($request->slug_en)) {
                $input["slug_en"] = str_slug($request->title_en, '-');
            }
            if (empty($request->slug_ar)) {
                $input["slug_ar"] = str_slug($request->title_ar, '- ');
            }
            if (isset($request->status)) {
                $input["status"] = 1;
            } else {
                $input["status"] = 2;
            }
            $model = Initiatives::create($input);

            foreach ($categories as $category_id) {
                $categoryModel = new InitiativeCategory();
                $categoryModel->category_id = $category_id;
                $categoryModel->initiative_id = $model->id;
                $categoryModel->created_at = date("Y-m-d H:i:s");
                $categoryModel->save();
            }

            $this->manageMedia($attachments, $model->id);

            return redirect('admin/init/' . $this->folder)->with("message", "Initiatives created")->with('alert-class', 'alert-success');
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
        $model = Initiatives::find($id);

        $helper = new Helpers();

        $selected = array();
        foreach ($model->categories as $gc) {
            $selected[] = $gc->category_id;
        }

        $projects = InitProject::latest()->pluck("title_en", "id");
        $categories = InitCategory::latest()->pluck("title_en", "id");
        $owners = InitBusinessOwner::latest()->pluck("title_en", "id");
        $departments = Department::latest()->pluck("title_en", "id");

        $mediaModel = InitiativeMedia::join('media', 'media.id', '=', 'initiative_media.media_id')
                ->select('media.id', 'media.filepath', 'media.type')
                ->where('initiative_id', $id)
                ->get();

        $data["mediaModel"] = $mediaModel;
        $data["projects"] = $projects;
        $data["departments"] = $departments;
        $data["owners"] = $owners;
        $data["categories"] = $categories;

        $data["helper"] = $helper;
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
    public function manageMedia($attachments, $id) {

        $i = 0;
        $helper = new Helpers();
        foreach ($attachments as $attachment) {

            if (!isset($attachment["deleted"])) {
                if ($attachment["type"] == "youtube") {
                    $model = new Media();
                    $model->filepath = $attachment["file"];
                    $model->type = $attachment["type"];
                    $model->created_at = date("Y-m-d H:i:s");
                    $model->save();
                    $media_id = $model->id;
                } else {
                    $media_id = $helper->getMediaID($attachment["file"]);
                }
                $initiativeModel = new InitiativeMedia();
                $initiativeModel->media_id = $media_id;
                $initiativeModel->initiative_id = $id;
                $initiativeModel->created_at = date("Y-m-d H:i:s");
                $initiativeModel->save();
            }
            $i++;
        }
    }

    public function update(Request $request, $id) {

        $helper = new Helpers();
        try {
            $this->validate($request, [
                'title_en' => 'required|max:500',
                'title_ar' => 'required|max:500',
                'project_id' => 'required|max:500',
                'where_en' => 'required|max:500',
                'where_ar' => 'required',
                    //'categories' => 'required',
                    //'image' =>'required',
                    ], [
                'title_en.required' => 'Please enter title in english',
                'title_ar.required' => 'Please enter title in arabic',
                'where_en.required' => 'Please location title in english ',
                'where_ar.required' => 'Please location title in arabic',
                    //  'image.required' => 'Please select image file'
            ]);

            $input = $request->all();

            $categories = isset($input['categories']) ? $input['categories'] : [];
            $attachments = isset($input['attachments']) ? $input['attachments'] : [];



            unset($input['_token']);
            unset($input['_method']);
            unset($input['submit']);
            unset($input['categories']);
            unset($input['attachments']);
            unset($input['image1']);
            unset($input['image']);
            unset($input['deleted']);



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

            Initiatives::where("id", $id)->update($input);

            InitiativeCategory::where('initiative_id', $id)->delete();
            foreach ($categories as $category_id) {


                $categoryModel = new InitiativeCategory();
                $categoryModel->category_id = $category_id;
                $categoryModel->initiative_id = $id;
                $categoryModel->created_at = date("Y-m-d H:i:s");
                $categoryModel->save();
            }

            InitiativeMedia::where('initiative_id', $id)->delete();
            $i = 0;
            $this->manageMedia($attachments, $id);


            return redirect('admin/init/' . $this->action)->with("message", "Project Updated")->with('alert-class', 'alert-success');
        } catch (Exception $e) {
            return redirect('admin/init/' . $this->action)->with("message", $e->getMessage())->with('alert-class', 'alert-danger');
        }
    }

    public function getcategories($id) {
        $model = InitCategory::where('status', 1)
                ->join("init_project_categories as ipc", 'ipc.category_id', 'init_categories.id');

        if ($id) {
            $model = $model->where('ipc.project_id', $id);
        }

        $model = $model->select("init_categories.title_en as title", "init_categories.id as id");
        $model = $model->get();
        $data["model"] = $model;
        return view("admin.init." . $this->folder . ".getcategories", $data);
    }

    public function destroy($id) {
        try {
            $model = Initiatives::find($id);
            $model->delete();
            InitiativeMedia::where('initiative_id', $id)->delete();
            InitiativeCategory::where('initiative_id', $id)->delete();
            return json_encode(array('status' => 1, 'message' => "Project Deleted"));
        } catch (Exception $e) {
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

    public function deleteMultiple(Request $request) {
        try {
            $result = Initiatives::whereIn('id', $request->ids)->delete();
            InitiativeMedia::whereIn('initiative_id', $request->ids)->delete();
            InitiativeCategory::whereIn('initiative_id', $request->ids)->delete();
            return json_encode(array('status' => 1, 'message' => "Project Deleted"));
        } catch (Exception $e) {
            return json_encode(array('status' => 0, 'message' => $e->getMessage()));
        }
    }

}
