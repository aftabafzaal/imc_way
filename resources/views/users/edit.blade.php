
@extends('layouts.app')

@section('title', 'Edit user')

@section('content')

<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
         Edit {{(Auth::user()->id == $user->id) ? 'Profile' : 'User'}}
      </h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>
		<div class="kt-subheader__breadcrumbs">
				<span class="kt-subheader__breadcrumbs-separator"></span>
				<a href="{{url('users/listing')}}" class="kt-subheader__breadcrumbs-link">
					Users
				</a>
				<span class="kt-subheader__breadcrumbs-separator"></span>
				Edit user
		</div>
   </div>
   <div class="kt-subheader__toolbar">
      <a href="{{url('users/listing')}}" class="btn btn-default btn-bold">
      Back </a>
   </div>
</div>


<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
<div class="kt-wizard-v4" id="kt_apps_user_add_user" data-ktwizard-state="step-first">

<!--begin: Form Wizard Nav -->

<!--end: Form Wizard Nav -->
<div class="kt-portlet">
<div class="kt-portlet__body kt-portlet__body--fit">
<div class="kt-grid">
	<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">

		<!--begin: Form Wizard Form-->
		<form class="kt-form" id="kt_apps_user_add_user_form" action="{{ url('users/save-edit-user')}}" method="POST">
          @csrf
			<!--begin: Form Wizard Step 1-->
			<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
				<div class="kt-heading kt-heading--md">Edit User :</div>
				<div class="kt-section kt-section--first">
					<div class="kt-wizard-v4__form">
						<div class="row">
							<div class="col-xl-12">
								<div class="kt-section__body">

									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Name</label>
										<div class="col-lg-9 col-xl-9">
										<input style="display:none" name="id" value="{{$user->id}}">
										<input maxlength='50' placeholder="name" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>
										@if ($errors->has('name'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('name') }}</strong>
											</span>
										@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
										<div class="col-lg-9 col-xl-9">
											<div class="input-group">
											<input placeholder="Email" readonly="true" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required autofocus>
											@if ($errors->has('email'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('email') }}</strong>
												</span>
											@endif
											</div>
										</div>
									</div>
	<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Password</label>
										<div class="col-lg-9 col-xl-9">
										<input style="display:none" name="id" value="{{$user->id}}">
										<input maxlength='50' placeholder="password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ $user->org_pwd }}" autofocus>
										@if ($errors->has('password'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
										</div>
									</div>
                  <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">Role</label>
                    <div class="col-lg-9 col-xl-9">
                      <div class="input-group">
                        <input type="checkbox" name="role_id" class="example" value="1" {{($user->role_id == 1) ? 'checked' : ''}}>Superadmin</input>
                        <input type="checkbox"  name="role_id" class="example" value="2"{{($user->role_id == 2) ? 'checked' : ''}}>Sub-admin</input>
                      </div>
                    </div>
                  </div>

                <?php
                if(!empty($permission)){
                   foreach($permission as $v){
                      ?>
                      <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">{{$v->name}}</label>
                         <div class="col-lg-9 col-xl-9">
                           <div class="input-group">
                             <div class="col-md-12">
                               <?php
                               if($user->role_id != 1){
                                foreach($user_permission as $v1){
                                    if($v1->permission_id == $v->id){
                                       if($v1->is_create =="1"){
                                          $iscreate="checked";
                                       }else{
                                         $iscreate="";
                                       }
                                       if($v1->is_edit =="1"){
                                          $isedit="checked";
                                       }else{
                                         $isedit="";
                                       }
                                       if($v1->is_delete =="1"){
                                          $isdelete="checked";
                                       }else{
                                         $isdelete="";
                                       }
                                       if($v1->is_view =="1"){
                                          $isview="checked";
                                       }else{
                                         $isview="";
                                       }
                                    }
                                }
                              }else{
                                  $iscreate="checked";
                                  $isedit="checked";
                                  $isdelete="checked";
                                  $isview="checked";
                              }
                               ?>
                                <input type="checkbox" name="{{$v->id}}[]" value="is_create"
                                 <?php  if(isset($iscreate)){
                                   echo $iscreate;
                                }
                                ?>> Create
                                <input type="checkbox" name="{{$v->id}}[]" value="is_edit" <?php  if(isset($isedit)){
                                  echo $isedit;
                               }
                               ?>> Edit
                                <input type="checkbox" name="{{$v->id}}[]" value="is_delete"
                                <?php  if(isset($isdelete)){
                                  echo $isdelete;
                               }?>
                               > Delete
                                <input type="checkbox" name="{{$v->id}}[]" value="is_view"
                                <?php  if(isset($isview)){
                                  echo $isview;
                               }?>
                                > View
                              </div>
                            </div>
                        </div>
                      </div>
                      <?php
                   }
                }
                ?>



								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end: Form Wizard Step 1-->
			<!--begin: Form Actions -->
			<div class="kt-form__actions">
			   <input type="submit" value="Submit" id="checkBtn" name="submit" class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
			</div>
			<!--end: Form Actions -->
		</form>
		<!--end: Form Wizard Form-->
	</div>
</div>
</div>
</div>
</div>
</div>
<script>
$('input.example').on('change', function() {
  var value= $(this).val();
    if(value == 1){
     $('input:checkbox').not(this).prop('checked', this.checked);
   }else{
     $('input:checkbox').not(this).prop('checked', false);
   }
    $('input.example').not(this).prop('checked', false);
});
// $("#checkAll").click(function () {
//     $('input:checkbox').not(this).prop('checked', this.checked);
// });
$('#checkBtn').click(function() {
   checked = $("input.example[type=checkbox]:checked").length;
   if(!checked) {
     alert("You must check at least one role.");
     return false;
   }
//   checked = $("input.perm[type=checkbox]:checked").length;
//   if(!checked) {
//      alert("You must check at least one permission.");
//      return false;
//   }

 });
</script>
@endsection
