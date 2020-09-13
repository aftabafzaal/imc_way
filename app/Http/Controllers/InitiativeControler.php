<?php

namespace App\Http\Controllers;

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

class InitiativeControler extends Controller  {
    
    private $title = "Initiative";
    private $action = "initiatives";
    private $folder = "initiatives";

    public function index() {
        //die("dasdasd");
        $helper = new Helpers();
        $model = Initiatives::where("status", 1);
        $model = $model->orderBy("id", "desc")->get();
        
        $data["model"] = $model;
        $data["folder"] = $this->folder;
        $data["title"] = $this->title;
        $data["action"] = $this->action;
        dd($data);
        return view( $this->folder . ".index", $data);
    }

    public function search(Request $request) {
        
    }

}
