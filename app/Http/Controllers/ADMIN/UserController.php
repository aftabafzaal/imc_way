<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Config;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Lcobucci\JWT\Parser;
use Mail;
use Response;
use App\Interfaces\UserInterface;
use App\Http\Traits\CommonTrait;
use App\Http\Traits\UserTrait;
use Session;
use DB;
use App\Commonfooter;
use App\Permission;
use App\UserPermission;
use App\Helpers;

class UserController extends Controller implements UserInterface
{
    use CommonTrait, UserTrait;
    public function __construct()
          {
           $this->middleware(function ($request, $next) {
               $user= Auth::user();
                if(!empty($user)){
               if($user->role_id == 2){
                  $path=  $request->path();
                  $helper = new Helpers();
                  if($path == "users/listing"){
                    return redirect('permission');
                  }else{
                    return $next($request);
                  }
               }else{
                   return $next($request);
               }
                }else{
                   return $next($request);
               }
           });
       }
    /*
    This controller includes user  create, store, listing, deleteSingleUser, changeStatus,  editUser, SaveEditUser, deleteMultiple,
  updateMultiUserStatus, ChangePassword, ChangePasswordSubmit, forgotpassword, resetPassword, resetPasswordSubmit functions

    */

    public function section(){
      $content = Commonfooter::first();
        return view ('users.section')->with('content',$content);
    }

    public function getSectionContent(Request $request){
            $content = Commonfooter::first();
            return json_encode(array("status" => 1, "message" => "Load Data Successfully", "content" => $content));
    }

    public function updateSectionContent(Request $request){
        try{
            $content = Commonfooter::first();
            if($content){
                $pageSection = Commonfooter::find($content->id);
                $pageSection->get_en = $request->get_en;
                $pageSection->get_ar = $request->get_ar;
                $pageSection->doc_en = $request->doc_en;
                $pageSection->doc_ar = $request->doc_ar;
                $pageSection->doc_link = $request->doc_link;
                $pageSection->expert_en = $request->expert_en;
                $pageSection->expert_ar = $request->expert_ar;
                $pageSection->expert_link = $request->expert_link;
                $pageSection->call_us = $request->call_us;
                $pageSection->appointment_en = $request->appointment_en;
                $pageSection->appointment_ar = $request->appointment_ar;
                $pageSection->appointment_link = $request->appointment_link;
                $pageSection->make_ar = $request->make_ar;
                $pageSection->make_en = $request->make_en;
                $pageSection->make_link = $request->make_link;
                $pageSection->save();
            }else{
              $pageSection->get_en = $request->get_en;
              $pageSection->get_ar = $request->get_ar;
              $pageSection->doc_en = $request->doc_en;
              $pageSection->doc_ar = $request->doc_ar;
              $pageSection->doc_link = $request->doc_link;
              $pageSection->expert_en = $request->expert_en;
              $pageSection->expert_ar = $request->expert_ar;
              $pageSection->expert_link = $request->expert_link;
              $pageSection->call_us = $request->call_us;
              $pageSection->appointment_en = $request->appointment_en;
              $pageSection->appointment_ar = $request->appointment_ar;
              $pageSection->appointment_link = $request->appointment_link;
              $pageSection->make_ar = $request->make_ar;
              $pageSection->make_en = $request->make_en;
              $pageSection->make_link = $request->make_link;
                $pageSection->save();
            }
               return redirect('/admin/pages/section');
        }catch(Exception $e){
          return redirect('/admin/pages/section');

        }
    }


    /*create function create user in website*/
    public function logout(Request $request)
    {
       Auth::logout();
      return redirect('/login');

    }
    public function dashboard()
    {
      return view('users.dashboard');

    }


    /*create function create user in website*/

    public function create()
    {
      $permission= Permission::get();

      return view('users.create')->with('permission',$permission);

    }

   // save newly created users from this function
    public function store(Request $request)

    {


        $this->validate($request,[
            'name' => 'required|max:50',
            'password' => 'required|max:100',
            'email' => 'required|email|unique:users,email'
        ],[
            'name.required' => 'Please enter name',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email',
            'email.unique' => 'This email is already registered with us.'
        ]);
        $randomkey = $this->getVerificationCode();
        // $user_password = substr(time().$randomkey, 0, 15);
          $user_password = "admin";
         DB::beginTransaction();
           $user = [
              'role_id' => (int)$request->get('role_id'),
              'name' => $request->get('name'),
              'email' => $request->get('email'),
              'password' => Hash::make($request['password']),
                 'org_pwd'=> $request->password,
              'created_at' => time(),
              'updated_at' => time(),
           ];
            $status = User::insertGetId($user);
             $permission= Permission::get();
             if($request->get('role_id') != 1  ){
             foreach($permission as $v){
                 $data=[];
                 if(!empty($request->get($v->id))){
                    foreach($request->get($v->id) as $v1){
                        $data['permission_id']=$v->id;
                        $data['user_id']=$status;
                        $data[$v1]="1";
                     }
                      UserPermission::insertGetId($data);
                 }
               
              }
           }
        if($status) {
            try {
                $data['name'] = $request->get('name');
                $data['email'] = $request->get('email');
                $data['password'] = $request->get('password');
                $data['admin'] = Config::get('variable.ADMIN_EMAIL');
                $data['server_url'] = Url('/');
                // \Mail::send('emails.users.new_user', ['data' => $data],
                // function ($message) use ($data)
                // {
                //     $message
                //         ->from($data['admin'])
                //         ->to($data['email'])->subject('Login Credentials');
                // });
                DB::commit();
                Session::flash('message', 'User created successfully');
                Session::flash('alert-class', 'alert-success');
              } catch (\Exception $e) {
                  DB::rollback();
                  Session::flash('message', $e->getMessage());
                  Session::flash('alert-class', 'alert-danger');
              }
        } else {
            Session::flash('message', 'Unable to create user!');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect('/users/listing');

    }

    /* User listing can be view by this function */
    public function listing(Request $request)
    {


        $per_page = (isset($request->recordvalue) ? $request->recordvalue : Config::get('variable.page_per_record')); //Config::get('variable.page_per_record');
        session(['sort_by' => 'asc']); // set default sorting
        $users = User::select('id', 'name', 'email', 'status', 'created_at');

        if(isset($request->q)) { // search by name and email

            $users = $users->where(function($query) use($request) {
               $query->where('name','LIKE','%'.$request->q."%");
               $query->orWhere('email','LIKE','%'.$request->q."%");
            });
        }

        if(isset($request->sort_by)) {

            if($request->key == 'user') { // sort by user
                $users = $users->orderBy('name', $request->sort_by);
            }

            if($request->key == 'email') { // sort by email
                $users = $users->orderBy('email', $request->sort_by);
            }

            if($request->key == 'date') { // sort by date
                $users = $users->orderBy('created_at', $request->sort_by);
            }

            if($request->key == 'status') { // sort by status
                $users = $users->orderBy('status', $request->sort_by);
            }

        } else {
            $users = $users->orderBy('id', 'desc');

        }

        //$users = $users->where('role_id', Role::where('name', 'sub_admin')
        //->first()->id);
        $users = $users->paginate($per_page);


        // append search params
        if(isset($request->q)) {
           $users = $users->appends(['q' => $request->q]);  /*keywords will append to url using append*/
           session(['q' => $request->q]);
        } else {
           session()->forget('q');
        }

        // append sort_by params
        if(isset($request->sort_by)) {
            $users = $users->appends(['key' => $request->key, 'sort_by' => $request->sort_by]);
            session(['key' => $request->key, 'sort_by' =>( $request->sort_by == 'asc') ? 'desc' : 'asc']);
        }

         // append recordvalue params
         if(isset($request->recordvalue)) {
            $users = $users->appends(['recordvalue' => $request->recordvalue]);
            session(['recordvalue' => $request->recordvalue]);
        } else {
            session()->forget('recordvalue');
        }

        return view('users.view', compact('users'));

    }

    /* User record can be delete by this function */
    public function deleteSingleUser(Request $request)
    {
        $user = \App\User::find($request->id);
        $status = $user->delete();

        if($status) {
			$message 		= "User deleted successfully";
            $returnStatus 	= 1;

        } else {
			$message 		= "Unable to delete this user";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }

    /* Update user status from this function */
    public function changeStatus(Request $request)
    {

        $result = User::where('id', $request->id)->update(['status' => $request->status ]);//$user->save();

        if($request->status ==  1) {
            $message 		= "User un-blocked successfully";

           } else {
            $message 		= "User blocked successfully";

        }

        if($result) {
			$returnStatus 	= 1;
        } else {
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }

    /*go to edit user page from this function*/
    public function editUser($id) {

        $permission= Permission::get();
        $user_permission= UserPermission::where('user_id',$id)->get();
        $user = User::select('id', 'name', 'email','role_id','password','org_pwd')->where('id', $id)->first();

        return view('users.edit', compact('user','permission','user_permission'));
    }

    /*update user detail*/
    public function SaveEditUser(Request $request) {
     UserPermission::where('user_id',$request->id)->delete();
         $permission =Permission::get();
      foreach($permission as $v){
          $data=[];
             if(!empty($request->get($v->id))){
               foreach($request->get($v->id) as $v1){
                   $data['permission_id']=$v->id;
                   $data['user_id']=$request->id;
                   $data[$v1]="1";
                }
              
           }
          UserPermission::insertGetId($data);
      }

if(!empty($request->password)){
    $data= ['name'=>$request->name,
        'role_id'=>(int)$request->role_id,
        'password'=> Hash::make($request->password),
        'org_pwd'=> $request->password,
        ];
}else{
    $data= ['name'=>$request->name,
        'role_id'=>(int)$request->role_id,
        ];
}
        
        $result = User::where('id',$request->id)->update($data);

        // if($result) {
            Session::flash('message', 'User updated successfully');
            Session::flash('alert-class', 'alert-success');
        // } else {
        //     Session::flash('message', 'Unable to update user!');
        //     Session::flash('alert-class', 'alert-danger');

        // }
        return redirect('/users/listing');
    }

    /*delete multiple users*/

    public function deleteMultiple(Request $request) {

        $result = User::whereIn('id', $request->ids)->delete();

        if($result) {
			$message 		= "User(s) deleted successfully";
            $returnStatus 	= 1;

        } else {
			$message 		= "Unable to delete user(s)";
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }

    /*update multi users status*/
    public function updateMultiUserStatus(Request $request) {

        $result = User::whereIn('id', $request->ids)->update(['status' => $request->status]);

        if($result) {

            if($request->status == 1) {
                $message 		= "User(s) activated successfully";
            } else {
                $message 		= "User(s) blocked successfully";
            }

            $returnStatus 	= 1;

        } else {

            if($request->status == 1) {
                $message 		= " Unable to activate user(s)";
            } else {
                $message 		= "Unable to block user(s)";
            }
			$returnStatus 	= 0;
        }
        return json_encode(array('status' => $returnStatus, 'message' => $message));
    }

    /*redirect to change password section*/

    public function ChangePassword() {

        return view('users.change_password');

    }

    public function ChangeProfile() {
        $user= Auth::user();
        return view('users.change_profile',compact('user'));

    }
    
    
    
     public function ChangeProfileSubmit(Request $request) {


        $this->validate($request,[
            'name' => 'required',
        ]);
    $data= ['name'=>$request->name,
        ];
        $result = User::where('id',$request->id)->update($data);
            if($result) {
               Session::flash('message', 'User updated successfully');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to change profile!');
                Session::flash('alert-class', 'alert-danger');
            }
            return redirect('/users/change-profile');

    }
    
    
    /*change password funtion*/

    public function ChangePasswordSubmit(Request $request) {

        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'min:6'
        ],[
            'old_password.required' => 'Old  password is required',
            'password.required' => 'New password is required',
            'password.confirmed' => 'New password and confirm password does not matched.'
        ]);

        if (Hash::check($request->old_password, Auth::user()->password)) {
            $user = User::where('id', Auth::id())->update(['password' => Hash::make($request->password)]);

            if($user) {

                Session::flash('message', 'Password change successfully!');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Unable to change password!');
                Session::flash('alert-class', 'alert-danger');
            }
            //return redirect('/users/listing');
 return redirect('/users/change-password');
        } else {

            Session::flash('message', 'Incorrect old password!');
            Session::flash('alert-class', 'alert-danger');

            return redirect('/users/change-password');
        }


    }

    /*forgot password function*/

    public function forgotpassword(Request $request) {

        $randomkey = $this->getVerificationCode();
        $forgot_password_token 	 = substr(time().$randomkey, 0, 15);

        $result = User::where('email', $request->email)->update(['forgot_password_token' => $forgot_password_token, 'updated_at' => time()]);

        if($result) {

            try {

                $data['email'] = $request->get('email');
                $data['forgot_password_token'] = $forgot_password_token;
                $data['admin'] = Config::get('variable.ADMIN_EMAIL');
                $data['server_url'] = Url('/');

                \Mail::send('emails.users.forgot_password', ['data' => $data],
                function ($message) use ($data)
                {
                    $message
                        ->from($data['admin'])
                        ->to( $data['email'] )->subject('Reset password');
                });

                Session::flash('message', 'An email has been sent to you in your email id! Please check');
                Session::flash('alert-class', 'alert-success');

              } catch (\Exception $e) {

                  Session::flash('message', $e->getMessage());
                  Session::flash('alert-class', 'alert-danger');
              }

        } else {
            Session::flash('message', 'Unable to send email!');
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect('/login');
    }

    /*redirect to reset password page*/
    public function resetPassword($token) {

        $user = User::select('id', 'forgot_password_token', 'updated_at')->where('forgot_password_token', $token)->first();

        if($user) {

            $add30 = strtotime("+10 minutes", $user->updated_at); // link will expire after 30 minute
            $current_time = time();

            if($current_time <  $add30) {

                $token = $token;
                return view('auth.passwords.reset', compact('token'));

            } else {

                Session::flash('message', 'Token expire!');
                Session::flash('alert-class', 'alert-danger');

                return redirect('/login');
            }


          } else {

              Session::flash('message', 'Token expire!');
              Session::flash('alert-class', 'alert-danger');

              return redirect('/login');
        }
    }

    /*reset password submit function*/

    public function resetPasswordSubmit(Request $request) {

        $this->validate($request,[
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'min:6'
        ],[
            'password.required' => 'New password is required',
            'password.confirmed' => 'New password and confirm password does not matched.'
        ]);

        $user = User::select('id', 'email', 'forgot_password_token', 'updated_at')->where('email', $request->email)->where('forgot_password_token', $request->token)->first();

        if($user) {

            $result = User::where('email', $request->email)->update(['forgot_password_token' => '', 'password' => Hash::make($request->password)]);

            if($result) {

                Session::flash('message', 'Password has been reset successfully');
                Session::flash('alert-class', 'alert-success');

            } else {

                Session::flash('message', 'Unable to reset password');
                Session::flash('alert-class', 'alert-danger');
            }

            return redirect('/login');

        } else {

            Session::flash('message', 'To reset password please enter same email id for which you have requested to reset password!');
            Session::flash('alert-class', 'alert-danger');

            return redirect('/users/reset-password/'.$request->token);

        }

    }

}
