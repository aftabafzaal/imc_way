<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers;
use Config;
use Illuminate\Support\Facades\Auth;
class DepartmentsController extends Controller
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
        return view ('departments.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view ('departments.create'); 
    }   

    public function convertData(Request $request){
        $data = $request->toArray();        
        unset($data['_token']);        
        return json_encode($data);
    }
}
