<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contactus;
use Config;
use App\Subscribe; 
use Auth; 
use App\Helpers;
class ContactusController extends Controller
{
    
      public function __construct()
        {

           $this->middleware(function ($request, $next) {
             $user= Auth::user();
             if($user->role_id == 2){
                $path=  $request->path();
                $helper = new Helpers();

                if($path == "contactlist"){
                  $route= "listing";
                  $permID="4";
                }else if($path=="deletecontact" || $path=="deletemultiplecontact" ){
                  $route="delete";
                  $permID="4";
                }else if($path=="subscribe" ){
                   $route= "listing";
                   $permID="2";
                }else if($path=="deletemultisubscriber" || $path=="deletesubscriber" ){
                  $route="delete";
                  $permID="2";
                }
                $checkpermision= $helper->checkpermission($user,$permID,$route);
                  if($checkpermision != true){
                      if($request->ajax()){
                         $message 		= "You don't have permision to do this.";
                         $returnStatus 	= 0;
                           return response(json_encode(array('status' => $returnStatus, 'message' => $message)));
                       }else{
                         return  redirect('permission');
                       }
                  }else{
                    return $next($request);
                  }
             }else{
                 return $next($request);
             }
         });
     }
     
    public function index(Request $request)
    {
    	 $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));    	
    	if(!empty($request['name']))
        {
          $data = Contactus::where('name','like', $request['name'].'%' )->orderBy('created_at','desc')->paginate($per_page);
        }else{

        	 $data = Contactus::orderBy('created_at','desc')->paginate($per_page);
        }
       return view('contactus.view',compact('data'));    
    }





    public function delete(Request $request)
    {    	
    	$data = Contactus::where('id' ,$request['id'])->delete();
    	           if($data)
    	           	{  
    	           		$message 		= "Delete Sucessfully";
                        $returnStatus 	= 1; 
                       }else{
                        $message 		= "Unable to delete data";
			            $returnStatus 	= 0;
                    }
    	return json_encode(array('status' => $returnStatus, 'message' => $message));
    }




    public function deletemultiplecontact(Request $request)
    { 
           
    	$data = Contactus::whereIn('id' ,$request['ids'])->delete();
    	           if($data)
    	           	{  
    	           		$message 		= "Delete Sucessfully";
                        $returnStatus 	= 1; 
                       }else{
                        $message 		= "Unable to delete data";
			            $returnStatus 	= 0;
                    }
    	return json_encode(array('status' => $returnStatus, 'message' => $message));
    }



    public function subscribe(Request $request)
    {
    	$per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record'));    	
    	if(!empty($request['email']))
        {
          $data = Subscribe::where('email','like', $request['email'].'%' )->orderBy('created_at','desc')->paginate($per_page);
        }else{

        	 $data = Subscribe::orderBy('created_at','desc')->paginate($per_page);
        }

        return view('contactus.subscribe',compact('data'));    
    }




    public function deletesubscriber(Request $request)
    {    	
    	$data = Subscribe::where('id' ,$request['id'])->delete();
    	           if($data)
    	           	{  
    	           		$message 		= "Delete Sucessfully";
                        $returnStatus 	= 1; 
                       }else{
                        $message 		= "Unable to delete data";
			            $returnStatus 	= 0;
                    }
    	return json_encode(array('status' => $returnStatus, 'message' => $message));
    }



    public function deletemultisubscriber(Request $request)
    {    
           	$data = Subscribe::whereIn('id' ,$request['ids'])->delete();
    	           if($data)
    	           	{  
    	           		$message 		= "Delete Sucessfully";
                        $returnStatus 	= 1; 
                       }else{
                        $message 		= "Unable to delete data";
			            $returnStatus 	= 0;
                    }
    	return json_encode(array('status' => $returnStatus, 'message' => $message));
    }
}
