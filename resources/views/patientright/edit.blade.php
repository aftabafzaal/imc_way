@extends('layouts.app')
@section('title', 'Edit Patientright')
@section('content')

<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
         Edit Patientright
      </h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>
	  <div class="kt-subheader__breadcrumbs">
			<span class="kt-subheader__breadcrumbs-separator"></span>
			<a href="{{url('admin/patientright')}}" class="kt-subheader__breadcrumbs-link">
				Patientright
			</a>
			<span class="kt-subheader__breadcrumbs-separator"></span>
			Edit Patientright
		</div>
   </div>
   <div class="kt-subheader__toolbar">
      <a href="{{url('admin/patientright')}}" class="btn btn-default btn-bold">
      Back </a>
   </div>
</div>


<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
<div class="kt-wizard-v4" id="kt_apps_user_add_user" data-ktwizard-state="step-first">
<div class="kt-portlet">
<div class="kt-portlet__body kt-portlet__body--fit">
<div class="kt-grid">
	<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">

		<!--begin: Form Wizard Form-->
    <form class="kt-form" id="kt_apps_user_add_user_form" action="{{ url('admin/patientright')}}/{{$patientright->id}}" method="POST">
          @csrf
          @method('PUT')
			<!--begin: Form Wizard Step 1-->
			<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
				<div class="kt-heading kt-heading--md">Edit Patientright Details :</div>
				<div class="kt-section kt-section--first">
					<div class="kt-wizard-v4__form">
						<div class="row">
							<div class="col-xl-12">
								<div class="kt-section__body">
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label"> Title(En)</label>
										<div class="col-lg-9 col-xl-9">
                                        <input placeholder="Title in english " id="title_en" name="title_en" type="text" class="form-control {{ $errors->has('title_en') ? ' is-invalid' : '' }}" value="{{$patientright->title_en}}" autofocus>
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
                                            <input placeholder="Title in Arabic " id="title_ar" name="title_ar" type="text" class="form-control {{ $errors->has('title_ar') ? ' is-invalid' : '' }} " value="{{$patientright->title_ar}}" autofocus>
                                            @if ($errors->has('title_ar'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('title_ar') }}</strong>
                                                </span>
                                            @endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label"> Descriptions(En)</label>
										<div class="col-lg-9 col-xl-9">
										<textarea id="description_en" name="description_en" placeholder="Content" id="description_en" class="form-control {{ $errors->has('description_en') ? ' is-invalid' : '' }}">{{$patientright->description_en}}</textarea>
										@if ($errors->has('description_en'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('description_en') }}</strong>
											</span>
										@endif
										</div>
									</div>
                                    <div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label"> Descriptions(Ar)</label>
										<div class="col-lg-9 col-xl-9">
										<textarea id="description_ar" name="description_ar" placeholder="Content" id="description_ar" class="form-control {{ $errors->has('description_ar') ? ' is-invalid' : '' }}">{{$patientright->description_ar}}</textarea>
										@if ($errors->has('description_ar'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('description_ar') }}</strong>
											</span>
										@endif
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
