@extends('layouts.app')
@section('title', 'Add')
@section('content')
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
         {{(isset($page) && $page !='' ? 'Edit' : 'Add')}} services
      </h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>
	  <div class="kt-subheader__breadcrumbs">
			<span class="kt-subheader__breadcrumbs-separator"></span>
			<a href="{{url('services/listing')}}" class="kt-subheader__breadcrumbs-link">
				services
			</a>
			<span class="kt-subheader__breadcrumbs-separator"></span>
			{{(isset($page) && $page !='' ? 'Edit' : 'Add')}} services
		</div>
   </div>
   <div class="kt-subheader__toolbar">
      <a href="{{url('services/listing')}}" class="btn btn-default btn-bold">
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
		<form class="kt-form" id="kt_apps_user_add_user_form" action="{{ url('services/store')}}" method="POST" enctype="multipart/form-data">
          @csrf
			<!--begin: Form Wizard Step 1-->
			<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
				<div class="kt-heading kt-heading--md">{{ (isset($page) && $page !='') ? 'Edit' : 'Add' }} services :</div>
				<div class="kt-section kt-section--first">
					<div class="kt-wizard-v4__form">
						<div class="row">
							<div class="col-xl-12">
								<div class="kt-section__body">





                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label">Title(En)</label>
                    <div class="col-lg-9 col-xl-9">
                    <input style="display:none" name="id" value="{{ (isset($page) && $page !='') ? $page->id : '' }}">
                    <input placeholder="title" id="title_en" name="title_en" value="{{ (isset($page) && $page !='') ? $page->title_en : old('title_en') }}" type="text" class="form-control{{ $errors->has('title_en') ? ' is-invalid' : '' }}"  autofocus>
                    @if ($errors->has('title_en'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title_en') }}</strong>
                      </span>
                    @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Title(Ar)</label>
                    <div class="col-lg-9 col-xl-9">
                    <input style="display:none" name="id" value="{{ (isset($page) && $page !='') ? $page->id : '' }}">
                    <input placeholder="parent title" id="title_ar" name="title_ar" value="{{ (isset($page) && $page !='') ? $page->title_ar : old('title_ar') }}" type="text" class="form-control{{ $errors->has('title_ar') ? ' is-invalid' : '' }}"  autofocus>
                    @if ($errors->has('title_ar'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title_ar') }}</strong>
                      </span>
                    @endif
                    </div>
                  </div>



                  <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12"> Description(En)</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                    <textarea placeholder="meta desc" id="description_en" name="description_en" maxlength="500" class="form-control{{ $errors->has('description_en') ? ' is-invalid' : '' }}" rows="8" >{{ (isset($page) && $page !='') ? $page->description_en : old('description_en') }}</textarea>
                    <span class="form-text text-muted">Please enter description maximum length is 500.</span>
                    @if ($errors->has('description_en'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description_en') }}</strong>
                      </span>
                    @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12"> Description(Ar)</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                    <textarea  placeholder="meta desc"  id="description_ar" name="description_ar" maxlength="500" class="form-control{{ $errors->has('description_ar') ? ' is-invalid' : '' }}" rows="8" >{{ (isset($page) && $page !='') ? $page->description_ar : old('description_ar') }}</textarea>
                    <span class="form-text text-muted">Please enter description maximum length is 500.</span>
                    @if ($errors->has('description_ar'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description_ar') }}</strong>
                      </span>
                    @endif
                    </div>
                  </div>





                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Image</label>
                    <div class="col-lg-8 col-xl-8">
                      <input placeholder="Upload Image" id="image1" name="image1" type="text" class="form-control {{ $errors->has('image1') ? ' is-invalid' : '' }}" value="{{old('image1')}}" readonly>
                      @if ($errors->has('image1'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('image1') }}</strong>
                        </span>
                      @endif
                    </div>
                    <div class="col-lg-1 col-xl-1">
                        <button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModel" data-toggle="modal" data-target="#media-model" data-control="image1">Browse</button>
                    </div>
                  </div>

                  <?php
                  $helper = new App\Helpers();
                  ?>
                  <?php
                  if(!empty($page->media_id)){
                   $enImage= $helper->getImage($page->media_id);
                   $img=env('BASE_URL').$enImage;
                  }else{
                    $img="";
                  }
                  ?>
                  @if(!empty($img))
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label"></label>
                    <div class="col-md-8">
                      <img id="iconPreview" width="150px" src="{{$img}}">
                    </div>
                  </div>
                  @endif




                  <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12"> Status</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">

                      <div class="kt-radio-inline">
                        <label class="kt-radio">
                          <input type="radio" value="1" name="is_active" <?php if(empty($editmenu->id)){ echo "checked"; }?> <?php if(!empty($editmenu->is_active) && $editmenu->is_active=="1"){ echo "checked"; }?>>Active
                          <span></span>
                        </label>
                        <label class="kt-radio">
                          <input type="radio" value="2" name="is_active" <?php if(!empty($editmenu->is_active) && $editmenu->is_active=="2"){ echo "checked"; }?>> Inactive
                          <span></span>
                        </label>
                      </div>

                    </div>
                  </div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end: Form Wizard Step 1-->
			<!--begin: Form Actions -->
			<div class="kt-form__actions">
			   <input type="submit" value="Submit" name="submit" class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
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
