
@extends('layouts.app')

@section('title', 'Add page')

@section('content')

<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
         {{(isset($page) && $page !='' ? 'Edit' : 'Add')}} Page
      </h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>
	  <div class="kt-subheader__breadcrumbs">
			<span class="kt-subheader__breadcrumbs-separator"></span>
			<a href="{{url('pages/listing')}}" class="kt-subheader__breadcrumbs-link">
				Pages
			</a>
			<span class="kt-subheader__breadcrumbs-separator"></span>
			{{(isset($page) && $page !='' ? 'Edit' : 'Add')}} Page
		</div>
   </div>
   <div class="kt-subheader__toolbar">
      <a href="{{url('pages/listing')}}" class="btn btn-default btn-bold">
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
		<form class="kt-form" id="kt_apps_user_add_user_form" action="{{ url('pages/store')}}" method="POST">
          @csrf
			<!--begin: Form Wizard Step 1-->
			<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
				<div class="kt-heading kt-heading--md">{{ (isset($page) && $page !='') ? 'Edit' : 'Add' }} Page :</div>
				<div class="kt-section kt-section--first">
					<div class="kt-wizard-v4__form">
						<div class="row">
							<div class="col-xl-12">
								<div class="kt-section__body">


									
									
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Name(En)</label>
										<div class="col-lg-9 col-xl-9">
										<input style="display:none" name="id" value="{{ (isset($page) && $page !='') ? $page->id : '' }}">
										<input placeholder="name " id="name_en" name="name_en" value="{{ (isset($page) && $page !='') ? $page->name_en : '' }}" type="text" class="form-control{{ $errors->has('name_en') ? ' is-invalid' : '' }}" required autofocus>
										@if ($errors->has('name_en'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('name_en') }}</strong>
											</span>
										@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Name(Ar)</label>
										<div class="col-lg-9 col-xl-9">
										<input placeholder="name" id="name_ar" name="name_ar" value="{{ (isset($page) && $page !='') ? $page->name_ar : '' }}" type="text" class="form-control{{ $errors->has('name_ar') ? ' is-invalid' : '' }}" required autofocus>
										@if ($errors->has('name_ar'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('name_ar') }}</strong>
											</span>
										@endif
										</div>
									</div>
									 <?php 
                         if(!empty($page->is_change_slug)){ 
                             if($page->is_change_slug == "No"){
                                  $dis= "disabled";
                             }else{
                                  $dis= "";
                             }
                         }else{
                              $dis= "";
                         }
                      ?>

<div class="form-group row">
                  <label class="col-xl-2 col-lg-2 col-form-label">Slug(en)</label>
                  <div class="col-lg-9 col-xl-9">
                     
                  <input placeholder="slug english" id="slug" name="slug" value="{{ (isset($page) && $page !='') ? $page->slug : '' }}" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}"  autofocus    {{$dis}}>											
                  @if ($errors->has('slug'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                  @endif
                  </div>
                </div>
                
                    <div class="form-group row">
                  <label class="col-xl-2 col-lg-2 col-form-label">Slug(Ar)</label>
                  <div class="col-lg-9 col-xl-9">
                  <input placeholder="slug arabic" id="slug_ar" name="slug_ar" value="{{ (isset($page) && $page !='') ? $page->slug_ar : '' }}" type="text" class="form-control{{ $errors->has('slug_ar') ? ' is-invalid' : '' }}" autofocus {{$dis}}>											
                  @if ($errors->has('slug_ar'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('slug_ar') }}</strong>
                    </span>
                  @endif
                  </div>
                </div>



	              <div class="form-group row">
						<label class="col-xl-2 col-lg-2 col-form-label">Page Title(En)</label>
						<div class="col-lg-9 col-xl-9">
						<input style="display:none" name="id" value="{{ (isset($page) && $page !='') ? $page->id : '' }}">
						<input placeholder="page_title_en " id="page_title_en" name="page_title_en" value="{{ (isset($page) && $page !='') ? $page->page_title_en : '' }}" type="text" class="form-control{{ $errors->has('page_title_en') ? ' is-invalid' : '' }}" required autofocus>
						@if ($errors->has('page_title_en'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('page_title_en') }}</strong>
							</span>
						@endif
						</div>
				    	</div>
				    	
				    	  <div class="form-group row">
						<label class="col-xl-2 col-lg-2 col-form-label">Page Title(Ar)</label>
						<div class="col-lg-9 col-xl-9">
						<input style="display:none" name="id" value="{{ (isset($page) && $page !='') ? $page->id : '' }}">
						<input placeholder="page_title_ar " id="page_title_ar" name="page_title_ar" value="{{ (isset($page) && $page !='') ? $page->page_title_ar : '' }}" type="text" class="form-control{{ $errors->has('page_title_ar') ? ' is-invalid' : '' }}" required autofocus>
						@if ($errors->has('page_title_ar'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('page_title_ar') }}</strong>
							</span>
						@endif
						</div>
				    	</div>
					
									

                <div class="form-group row">
                  <label class="col-xl-2 col-lg-2 col-form-label">google Analaytics Code </label>
                  <div class="col-lg-9 col-xl-9">
                  <textarea class="form-control"  id="google_analytics" name="google_analytics" placeholder="google analytics code" id="google_analytics" class="form-control{{ $errors->has('google_analytics') ? ' is-invalid' : '' }}">
                        {{ (isset($page) && $page !='') ? $page->google_analytics : '' }}
                  </textarea>
                  
                  @if ($errors->has('google_analytics'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('google_analytics') }}</strong>
                    </span>
                  @endif
                  </div>
                </div>
                
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Meta title(En)</label>
										<div class="col-lg-9 col-xl-9">
										<input placeholder="meta title " id="meta_title_en" name="meta_title_en" value="{{ (isset($page) && $page !='') ? $page->meta_title_en : '' }}" type="text" class="form-control{{ $errors->has('meta_title_en') ? ' is-invalid' : '' }}"  required autofocus>
										@if ($errors->has('meta_title_en'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('meta_title_en') }}</strong>
											</span>
										@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Meta title(Ar)</label>
										<div class="col-lg-9 col-xl-9">
										<input placeholder="meta title" id="meta_title_ar" name="meta_title_ar" value="{{ (isset($page) && $page !='') ? $page->meta_title_ar : '' }}" type="text" class="form-control{{ $errors->has('meta_title_ar') ? ' is-invalid' : '' }}" required autofocus>
										@if ($errors->has('meta_title_ar'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('meta_title_ar') }}</strong>
											</span>
										@endif
										</div>
									</div>
	                                  <div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Author Name</label>
										<div class="col-lg-9 col-xl-9">
										<input placeholder="meta title" id="author" name="author" value="{{ (isset($page) && $page !='') ? $page->author : '' }}" type="text" class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}" required autofocus>
										@if ($errors->has('author'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('author') }}</strong>
											</span>
										@endif
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-2 col-sm-12">Meta description(En)</label>
										<div class="col-lg-9 col-md-9 col-sm-12">
										<textarea placeholder="meta desc" id="meta_desc_en" name="meta_desc_en" maxlength="500" class="form-control{{ $errors->has('meta_desc_en') ? ' is-invalid' : '' }}" rows="8">{{ (isset($page) && $page !='') ? $page->meta_desc_en : '' }}</textarea>
										<span class="form-text text-muted">Please enter description maximum length is 500.</span>
										@if ($errors->has('meta_desc_en'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('meta_desc_en') }}</strong>
											</span>
										@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-2 col-sm-12">Meta description(Ar)</label>
										<div class="col-lg-9 col-md-9 col-sm-12">
										<textarea  placeholder="meta desc"  id="meta_desc_ar" name="meta_desc_ar" maxlength="500" class="form-control{{ $errors->has('meta_desc_ar') ? ' is-invalid' : '' }}" rows="8">{{ (isset($page) && $page !='') ? $page->meta_desc_ar : '' }}</textarea>
										<span class="form-text text-muted">Please enter description maximum length is 500.</span>
										@if ($errors->has('meta_desc_ar'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('meta_desc_ar') }}</strong>
											</span>
										@endif
										</div>
									</div>

									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Meta keyword(En)</label>
										<div class="col-lg-9 col-xl-9">
										<input placeholder="meta title " id="meta_keyword_en" name="meta_keyword_en" value="{{ (isset($page) && $page !='') ? $page->meta_keyword_en : '' }}"  type="text" class="form-control{{ $errors->has('meta_keyword_en') ? ' is-invalid' : '' }}" required autofocus>
										@if ($errors->has('meta_keyword_en'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('meta_keyword_en') }}</strong>
											</span>
										@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Meta keyword(Ar)</label>
										<div class="col-lg-9 col-xl-9">
										<input placeholder="meta title" id="meta_keyword_ar" name="meta_keyword_ar" value="{{ (isset($page) && $page !='') ? $page->meta_keyword_ar : '' }}"type="text" class="form-control{{ $errors->has('meta_keyword_ar') ? ' is-invalid' : '' }}"  required autofocus>
										@if ($errors->has('meta_keyword_ar'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('meta_keyword_ar') }}</strong>
											</span>
										@endif
										</div>
									</div>

									<!--<div class="form-group row">-->
									<!--	<label class="col-xl-2 col-lg-2 col-form-label">Select Template(En)</label>-->
									<!--	<div class="col-lg-9 col-xl-9">-->
									<!--	<select onchange="selectTemplate(this, 'en');" id="template_id" name="template_id"  class="form-control{{ $errors->has('template_id') ? ' is-invalid' : '' }}">-->
									<!--	<option value="0">Select Template</option>-->
									<!--	@foreach($templates as $template)-->
									<!--		<option value="{{$template->content_en}}">{{$template->name}}</option>-->
									<!--	@endforeach-->
									<!--	</select>-->
									<!--	</div>-->
									<!--</div>-->


<div id="myRadioGroup">
    	<label class="col-xl-2 col-lg-2 col-form-label"><b>select Image</b></label>
 <input type="radio" name="cars" checked="checked" value="2"  />
	<label class="col-xl-2 col-lg-2 col-form-label"><b>select Slider</b></label><input type="radio" name="cars"  value="3" />

   
   <div id="Cars2" class="desc">
                				<div class="form-group row">
                                    <label class="col-xl-2 col-lg-2 col-form-label"> Banner Image</label>
                                    <div class="col-lg-8 col-xl-8">
                                      <input placeholder="Upload Image" id="image1" name="image1" type="text" class="form-control {{ $errors->has('image1') ? ' is-invalid' : '' }}" value="" readonly>
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

                             

                                      @if(!empty($page['image1']))
                                      <div class="form-group row">
                                        <label class="col-md-2 col-form-label"></label>
                                        <div class="col-md-8">
                                          <img id="iconPreview" width="150px" src="{{env('BASE_URL')}}images/media/{{$page['image1']}}">
                                        </div>
                                      </div>
                                      @endif

    </div>
  <div id="Cars3" class="desc" style="display: none;">
<div class="form-group row">
                  <label class="col-xl-2 col-lg-2 col-form-label">Slider(en)</label>
                  <div class="col-lg-9 col-xl-9">
                     
                  <input placeholder="slideren english" id="slideren" name="slideren" value="{{ (isset($page) && $page !='') ? $page->slideren : '' }}" type="text" class="form-control{{ $errors->has('slideren') ? ' is-invalid' : '' }}"  autofocus    {{$dis}}>											
                  @if ($errors->has('slideren'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('slideren') }}</strong>
                    </span>
                  @endif
                  </div>
                </div>
                
                    <div class="form-group row">
                  <label class="col-xl-2 col-lg-2 col-form-label">slider(Ar)</label>
                  <div class="col-lg-9 col-xl-9">
                  <input placeholder="sliderAr arabic" id="sliderAr" name="sliderAr" value="{{ (isset($page) && $page !='') ? $page->sliderAr : '' }}" type="text" class="form-control{{ $errors->has('sliderAr') ? ' is-invalid' : '' }}" autofocus {{$dis}}>											
                  @if ($errors->has('sliderAr'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('sliderAr') }}</strong>
                    </span>
                  @endif
                  </div>
                </div>

   </div>
</div>


									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Content(En)</label>
										<div class="col-lg-9 col-xl-9">
										<textarea class="form-control"  id="content_en" name="content_en" placeholder="Content" id="content_en" class="form-control{{ $errors->has('content_en') ? ' is-invalid' : '' }}">
										{{ (isset($page) && $page !='') ? $page->content_en : '' }}
										</textarea>
										@if ($errors->has('content_en'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('content_en') }}</strong>
											</span>
										@endif
										</div>
									</div>

									<!--<div class="form-group row">-->
									<!--	<label class="col-xl-2 col-lg-2 col-form-label">Select Template(Ar)</label>-->
									<!--	<div class="col-lg-9 col-xl-9">-->
									<!--	<select onchange="selectTemplate(this, 'ar');" id="template_id" name="template_id"  class="form-control{{ $errors->has('template_id') ? ' is-invalid' : '' }}">-->
									<!--	<option value="0">Select Template</option>-->
									<!--	@foreach($templates as $template)-->
									<!--		<option value="{{$template->content_ar}}">{{$template->name}}</option>-->
									<!--	@endforeach-->
									<!--	</select>-->
									<!--	</div>-->
									<!--</div>-->
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Content(Ar)</label>
										<div class="col-lg-9 col-xl-9">
										<textarea class="form-control" id="content_ar" name="content_ar" placeholder="Content" id="content_ar" class="form-control{{ $errors->has('content_ar') ? ' is-invalid' : '' }}">
										{{ (isset($page) && $page !='') ? $page->content_ar : '' }}
										</textarea>
										@if ($errors->has('content_ar'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('content_ar') }}</strong>
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

<script src="{{ env('BASE_URL')}}/assets/unisharp/laravel-ckeditor/ckeditor.js"></script>

<script>
CKEDITOR.replace('content_en', {
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


CKEDITOR.replace('content_ar', {
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

		CKEDITOR.instances['content_en'].setData(thisvalue);


	} else {

		CKEDITOR.instances['content_ar'].setData(thisvalue);
	}

}

 $("input[name$='cars']").click(function() {
        var test = $(this).val();

        $("div.desc").hide();
        $("#Cars" + test).show();
    });


</script>

@stop
