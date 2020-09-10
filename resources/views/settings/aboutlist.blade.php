@extends('layouts.app')

@section('title',  'About ')

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
              <?php  if(isset($slug)){
                echo strtoupper($slug);
              }?> PAGE
            </h3>

            <a href="{{ url('admin/about/section') }}" class="btn btn-label-brand btn-bold">About us Sections</a>

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
                        <?php  if(isset($slug)){
                          echo strtoupper($slug);
                        }?> CONTENT</h3>
											</div>
										</div>
										<!--begin::Form-->
                    <form class="kt-form" id="kt_apps_user_add_user_form" action="{{ url('about/create')}}" method="POST" enctype="multipart/form-data">
										@csrf
                    <input type="hidden" name="slug" value="<?php if(!empty($slug)){ echo $slug; }?>" >

										<input type="hidden" name="id" value="<?php if(!empty($editmenu->id)){ echo $editmenu->id; }?>" >
											<div class="kt-portlet__body">


                        <div class="form-group row">
                          <label class="col-xl-2 col-lg-2 col-form-label">Heading First(En)</label>
                          <div class="col-lg-9 col-xl-9">
                          <input placeholder="name" id="heading1_en" name="heading1_en" value="{{ (isset($editmenu) && $editmenu !='') ? $editmenu->heading1_en : '' }}" type="text" class="form-control{{ $errors->has('heading1_en') ? ' is-invalid' : '' }}" required autofocus>
                          @if ($errors->has('heading1_en'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('heading1_en') }}</strong>
                            </span>
                          @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-xl-2 col-lg-2 col-form-label">Heading First(Ar)</label>
                          <div class="col-lg-9 col-xl-9">
                          <input placeholder="name" id="heading1_ar" name="heading1_ar" value="{{ (isset($editmenu) && $editmenu !='') ? $editmenu->heading1_ar : '' }}" type="text" class="form-control{{ $errors->has('heading1_ar') ? ' is-invalid' : '' }}" required autofocus>
                          @if ($errors->has('heading1_ar'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('heading1_ar') }}</strong>
                            </span>
                          @endif
                          </div>
                        </div>
                          <div class="form-group row">
      										<label class="col-xl-2 col-lg-2 col-form-label"> Descriptions First (En)</label>
      										<div class="col-lg-9 col-xl-9">
      										<textarea class="form-control" id="description1_en" name="description1_en" placeholder="Content" id="description1_en" class="form-control">{!! (isset($editmenu) && $editmenu !='') ? $editmenu->description1_en : '' !!}</textarea>
      										@if ($errors->has('description1_en'))
      											<span class="invalid-feedback" role="alert">
      												<strong>{{ $errors->first('description1_en') }}</strong>
      											</span>
      										@endif
      										</div>
      									</div>
                       <div class="form-group row">
      										<label class="col-xl-2 col-lg-2 col-form-label"> Descriptions First (Ar)</label>
      										<div class="col-lg-9 col-xl-9">
      										<textarea class="form-control" id="description1_ar" name="description1_ar" placeholder="Content" id="description1_ar" class="form-control">{!! (isset($editmenu) && $editmenu !='') ? $editmenu->description1_ar : '' !!}</textarea>
      										@if ($errors->has('description1_ar'))
      											<span class="invalid-feedback" role="alert">
      												<strong>{{ $errors->first('description1_ar') }}</strong>
      											</span>
      										@endif
      										</div>
      									</div>



                         <div class="form-group row">
                          <label class="col-xl-2 col-lg-2 col-form-label">Heading Second(En)</label>
                          <div class="col-lg-9 col-xl-9">
                          <input placeholder="name" id="heading2_en" name="heading2_en" value="{{ (isset($editmenu) && $editmenu !='') ? $editmenu->heading2_en : '' }}" type="text" class="form-control{{ $errors->has('heading2_en') ? ' is-invalid' : '' }}" autofocus>
                          @if ($errors->has('heading2_en'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('heading2_en') }}</strong>
                            </span>
                          @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-xl-2 col-lg-2 col-form-label">Heading Second(Ar)</label>
                          <div class="col-lg-9 col-xl-9">
                          <input placeholder="name" id="heading2_ar" name="heading2_ar" value="{{ (isset($editmenu) && $editmenu !='') ? $editmenu->heading2_ar : '' }}" type="text" class="form-control{{ $errors->has('heading2_ar') ? ' is-invalid' : '' }}"  autofocus>
                          @if ($errors->has('heading2_ar'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('heading2_ar') }}</strong>
                            </span>
                          @endif
                          </div>
                        </div>
                          <div class="form-group row">
                          <label class="col-xl-2 col-lg-2 col-form-label"> Descriptions Second (En)</label>
                          <div class="col-lg-9 col-xl-9">
                          <textarea class="form-control" id="description2_en" name="description2_en" placeholder="Content" id="description2_en" class="form-control">{!! (isset($editmenu) && $editmenu !='') ? $editmenu->description2_en : '' !!}</textarea>
                          @if ($errors->has('description2_en'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('description2_en') }}</strong>
                            </span>
                          @endif
                          </div>
                        </div>
                       <div class="form-group row">
                          <label class="col-xl-2 col-lg-2 col-form-label"> Descriptions Second (Ar)</label>
                          <div class="col-lg-9 col-xl-9">
                          <textarea class="form-control" id="description2_ar" name="description2_ar" placeholder="Content" id="description2_ar" class="form-control">{!! (isset($editmenu) && $editmenu !='') ? $editmenu->description2_ar : '' !!}</textarea>
                          @if ($errors->has('description2_ar'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('description2_ar') }}</strong>
                            </span>
                          @endif
                          </div>
                        </div>



                        <div class="form-group row">
                          <label class="col-xl-2 col-lg-2 col-form-label">Heading Third(En)</label>
                          <div class="col-lg-9 col-xl-9">
                          <input placeholder="name" id="heading3_en" name="heading3_en" value="{{ (isset($editmenu) && $editmenu !='') ? $editmenu->heading3_en : '' }}" type="text" class="form-control{{ $errors->has('heading3_en') ? ' is-invalid' : '' }}" required autofocus>
                          @if ($errors->has('heading3_en'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('heading3_en') }}</strong>
                            </span>
                          @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-xl-2 col-lg-2 col-form-label">Heading Third(Ar)</label>
                          <div class="col-lg-9 col-xl-9">
                          <input placeholder="name" id="heading3_ar" name="heading3_ar" value="{{ (isset($editmenu) && $editmenu !='') ? $editmenu->heading3_ar : '' }}" type="text" class="form-control{{ $errors->has('heading3_ar') ? ' is-invalid' : '' }}" required autofocus>
                          @if ($errors->has('heading3_ar'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('heading3_ar') }}</strong>
                            </span>
                          @endif
                          </div>
                        </div>
                          <div class="form-group row">
                          <label class="col-xl-2 col-lg-2 col-form-label"> Descriptions Third (En)</label>
                          <div class="col-lg-9 col-xl-9">
                          <textarea class="form-control" id="description3_en" name="description3_en" placeholder="Content" id="description3_en" class="form-control">{!! (isset($editmenu) && $editmenu !='') ? $editmenu->description3_en : '' !!}</textarea>
                          @if ($errors->has('description3_en'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('description3_en') }}</strong>
                            </span>
                          @endif
                          </div>
                        </div>
                       <div class="form-group row">
                          <label class="col-xl-2 col-lg-2 col-form-label"> Descriptions Third (Ar)</label>
                          <div class="col-lg-9 col-xl-9">
                          <textarea class="form-control" id="description3_ar" name="description3_ar" placeholder="Content" id="description3_ar" class="form-control">{!! (isset($editmenu) && $editmenu !='') ? $editmenu->description3_ar : '' !!}</textarea>
                          @if ($errors->has('description3_ar'))
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('description3_ar') }}</strong>
                            </span>
                          @endif
                          </div>
                        </div>


                        <div class="form-group row">
                          <label class="col-xl-2 col-lg-2 col-form-label"> Video</label>
                          <div class="col-lg-8 col-xl-8">
                            <input placeholder="Upload Image" id="image1" name="video" type="text" class="form-control {{ $errors->has('image1') ? ' is-invalid' : '' }}" value="{{old('image1')}}" readonly>
                          </div>
                          <div class="col-lg-1 col-xl-1">
                              <button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModel" data-toggle="modal" data-target="#media-model" data-control="image1">Browse</button>
                          </div>
                        </div>



                            <?php
                            $helper = new App\Helpers();
                            ?>
                            <?php
                            $enImage= $helper->getImage($editmenu->media_id);
                            $img=env('BASE_URL').$enImage;
                            ?>
                            @if(!empty($img))
                            <video width="800" height="500" controls>
                             <source src="<?php if(empty($img)){
                                ?>
                                display:none;<?php
                              }else{
                                echo $img;
                              }
                                 ?>" type="video/mp4">
                           </video>
                            @endif

                        @if ($errors->has('video'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('video') }}</strong>
                          </span>
                        @endif



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
CKEDITOR.replace('description1_en', {
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

CKEDITOR.replace('description1_ar', {
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

CKEDITOR.replace('description2_en', {
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

CKEDITOR.replace('description2_ar', {
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

CKEDITOR.replace('description3_en', {
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

CKEDITOR.replace('description3_ar', {
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
		CKEDITOR.instances['description1_en'].setData(thisvalue);
	} else {
		CKEDITOR.instances['description1_ar'].setData(thisvalue);
	}
}
</script>
@stop
