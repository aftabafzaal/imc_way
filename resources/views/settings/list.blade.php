@extends('layouts.app')

@section('title',  'Follow us ')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.css') }}">
<style>
a.socialmiddlemenuicons {
    font-size: 18px;
    color: #005a9c;
    transition: .5s ease;
    width: 35px;
    height: 35px;
    border: 1px solid;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}
.invalid-feed {
  width: 100%;
  margin-top: 0.25rem;
  font-size: 80%;
  color: #fd397a; }
</style>
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
            Follow
            </h3>


        </div>

    </div>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	@if(Session::has('message'))
	<p class="alert {{ Session::get('alert-class') }} successMessage">{{ Session::get('message') }}</p>
	@endif
	<div class="row">

   <div class="col-md-12">
	   <!--begin::Portlet-->
	   <div class="kt-portlet">
										<div class="kt-portlet__head">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">
                         Update Follow us Content</h3>
											</div>
										</div>
										<!--begin::Form-->
										<form class="kt-form" method="POST" enctype="multipart/form-data" action="{{ url('follow/create') }}" >
										@csrf
										<input type="hidden" name="id" value="<?php if(!empty($editmenu->id)){ echo $editmenu->id; }?>" >
											<div class="kt-portlet__body">
                        <div class="form-group customlink">
                          <label>Title (en)</label>
                          <input type="text" name="main_title_en" value="<?php if(!empty($editmenu->main_title_en)){ echo $editmenu->main_title_en; }?>" class="form-control" aria-describedby="emailHelp" placeholder="Enter here" required>
                          <?php
                          if(isset($errors)){
                            ?>
                            <span class="invalid-feed" role="alert">
                              <strong>{{ $errors->getBag('default')->first('main_title_en') }}</strong>
                            </span>
                          <?php
                          }
                           ?>
                        </div>

                        <div class="form-group customlink">
                          <label>Title(ar)</label>
                          <input type="text" name="main_title_ar" value="<?php if(!empty($editmenu->main_title_ar)){ echo $editmenu->main_title_ar ; }?>" class="form-control" aria-describedby="emailHelp" placeholder="Enter here" required>
                          <?php
                          if(isset($errors)){
                            ?>
                            <span class="invalid-feed" role="alert">
                              <strong>{{ $errors->getBag('default')->first('main_title_ar') }}</strong>
                            </span>
                          <?php
                          }
                           ?>
                        </div>

                        <div class="form-group customlink">
                          <label>Description (en)</label>
                          <textarea name="description_en" class="form-control" aria-describedby="emailHelp" placeholder="Enter here" required><?php if(!empty($editmenu->description_en)){ echo $editmenu->description_en ; }?></textarea>
                          <?php
                          if(isset($errors)){
                            ?>
                            <span class="invalid-feed" role="alert">
                              <strong>{{ $errors->getBag('default')->first('description_en') }}</strong>
                            </span>
                          <?php
                          }
                           ?>
                        </div>

                        <div class="form-group customlink">
                          <label>Description (ar)</label>
                          <textarea name="description_ar" class="form-control" aria-describedby="emailHelp" placeholder="Enter here" required><?php if(!empty($editmenu->description_ar)){ echo $editmenu->description_ar ; }?></textarea>
                          <?php
                          if(isset($errors)){
                            ?>
                            <span class="invalid-feed" role="alert">
                              <strong>{{ $errors->getBag('default')->first('description_ar') }}</strong>
                            </span>
                          <?php
                          }
                           ?>
                        </div>

											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<button type="submit" class="btn btn-primary">Update</button>
												</div>
											</div>
										</form>
										<!--end::Form-->
									</div>
   </div>
   </div>
</div>
@stop
@section('script')
<script src="{{ env('BASE_URL')}}assets/unisharp/laravel-ckeditor/ckeditor.js"></script>

<script>
CKEDITOR.replace('description_en', {
  toolbar: [{
      name: 'document',
      items: ['Print']
    },
    {
      name: 'clipboard',
      items: ['Undo', 'Redo']
    },
    {
      name: 'styles',
      items: ['Format', 'Font', 'FontSize']
    },
    {
      name: 'colors',
      items: ['TextColor', 'BGColor']
    },
    {
      name: 'align',
      items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
    },
    '/',
    {
      name: 'basicstyles',
      items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting']
    },
    {
      name: 'links',
      items: ['Link', 'Unlink']
    },
    {
      name: 'paragraph',
      items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
    },
    {
      name: 'insert',
      items: ['Image', 'Table']
    },
    {
      name: 'tools',
      items: ['Maximize']
    },
    {
      name: 'editing',
      items: ['Scayt','Source']
    }
  ],
  extraAllowedContent: 'h3{clear};h2{line-height};h2 h3{margin-left,margin-top}',
  extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
  height: 560,
  removeDialogTabs: 'image:advanced;link:advanced'
});

CKEDITOR.replace('description_ar', {
  toolbar: [{
      name: 'document',
      items: ['Print']
    },
    {
      name: 'clipboard',
      items: ['Undo', 'Redo']
    },
    {
      name: 'styles',
      items: ['Format', 'Font', 'FontSize']
    },
    {
      name: 'colors',
      items: ['TextColor', 'BGColor']
    },
    {
      name: 'align',
      items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
    },
    '/',
    {
      name: 'basicstyles',
      items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting']
    },
    {
      name: 'links',
      items: ['Link', 'Unlink']
    },
    {
      name: 'paragraph',
      items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
    },
    {
      name: 'insert',
      items: ['Image', 'Table']
    },
    {
      name: 'tools',
      items: ['Maximize']
    },
    {
      name: 'editing',
      items: ['Scayt','Source']
    }
  ],
  extraAllowedContent: 'h3{clear};h2{line-height};h2 h3{margin-left,margin-top}',
  extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
  height: 560,
  removeDialogTabs: 'image:advanced;link:advanced'
});

/* select template */
function selectTemplate(obj, type) {
	var thisvalue = obj.value; //$(obj).find("option:selected").text();
	if(type == 'en') {
		CKEDITOR.instances['description_en'].setData(thisvalue);
	} else {
		CKEDITOR.instances['description_ar'].setData(thisvalue);
	}
}
</script>
@stop
