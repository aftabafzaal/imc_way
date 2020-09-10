@extends('layouts.app')
@section('title', 'Add Department')
@section('content')
<style>
.customTitle{
	flex: none;
    max-width: 185px;
}
.check{
	width: 70px;
    flex: none;
}
</style>
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
         Add Department
      </h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>
	  <div class="kt-subheader__breadcrumbs">
			<span class="kt-subheader__breadcrumbs-separator"></span>
			<a href="{{url('admin/departments')}}" class="kt-subheader__breadcrumbs-link">
				Department 
			</a>
			<span class="kt-subheader__breadcrumbs-separator"></span>
			Add Department			
		</div>
   </div>
   <div class="kt-subheader__toolbar">
      <a href="{{url('admin/departments')}}" class="btn btn-default btn-bold">
      Back </a>
   </div>
</div>


<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
<div class="kt-wizard-v4" id="kt_apps_user_add_user" data-ktwizard-state="step-first">
<div class="kt-portlet">
<div class="kt-portlet__body kt-portlet__body--fit">
<div class="kt-grid">
	<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">
		{{-- Tab layout start --}}
		<form class="kt-form" id="addDepartmentForm" action="#" method="POST" enctype="multipart/form-data" style="width:100%">
		@csrf
		<div class="kt-portlet__body" style="width:100%">
			<div class="form-group row">
				<label class="col-xl-2 col-lg-2 col-form-label"> Department Code</label>
				<div class="col-lg-4 col-xl-4">
					<input placeholder="Department code" id="dept_id" name="dept_id" type="text" class="form-control" required autofocus>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xl-2 col-lg-2 col-form-label"> Department Name (En)</label>
				<div class="col-lg-4 col-xl-4">
					<input placeholder="Department name in english" id="dept_name" name="dept_name" type="text" class="form-control" required >
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xl-2 col-lg-2 col-form-label"> Department Name (Ar)</label>
				<div class="col-lg-4 col-xl-4">
					<input placeholder="Department name in arabic" id="dept_name_ar" name="dept_name_ar" type="text" class="form-control" required >
				</div>
			</div>					    
		</div>
		<div class="kt-form__actions" style="float: right;margin-right: 20px;">
			<input type="submit" value="Submit" name="submit" class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
		</div>
			<!--end: Form Actions -->
		</form> 
		{{-- Tab layout end --}}			
	</div>	
</div>
</div>
</div>
</div>
</div>
@stop
