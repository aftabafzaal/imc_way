@extends('layouts.app')
@section('title', 'Add')
@section('content')
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
         {{(isset($page) && $page !='' ? 'Edit' : 'Add')}} Testimonials
      </h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>
	  <div class="kt-subheader__breadcrumbs">
			<span class="kt-subheader__breadcrumbs-separator"></span>
			<a href="{{url('testimonials/listing')}}" class="kt-subheader__breadcrumbs-link">
				Testimonial
			</a>
			<span class="kt-subheader__breadcrumbs-separator"></span>
			{{(isset($page) && $page !='' ? 'Edit' : 'Add')}} Testimonials
		</div>
   </div>
   <div class="kt-subheader__toolbar">
      <a href="{{url('testimonials/listing')}}" class="btn btn-default btn-bold">
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
		<form class="kt-form" id="kt_apps_user_add_user_form" action="{{ url('testimonials/store')}}" method="POST" enctype="multipart/form-data">
          @csrf
			<!--begin: Form Wizard Step 1-->
			<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
				<div class="kt-heading kt-heading--md">{{ (isset($page) && $page !='') ? 'Edit' : 'Add' }} Tips :</div>
				<div class="kt-section kt-section--first">
					<div class="kt-wizard-v4__form">
						<div class="row">
							<div class="col-xl-12">
								<div class="kt-section__body">

									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label">Title(En)</label>
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
										<label class="col-xl-2 col-lg-2 col-form-label">Title(Ar)</label>
										<div class="col-lg-9 col-xl-9">
										<input placeholder="name" id="name_ar" name="name_ar" value="{{ (isset($page) && $page !='') ? $page->name_ar : '' }}" type="text" class="form-control{{ $errors->has('name_ar') ? ' is-invalid' : '' }}" required autofocus>
										@if ($errors->has('name_ar'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('name_ar') }}</strong>
											</span>
										@endif
										</div>
									</div>


                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label">Testimony(En)</label>
                    <div class="col-lg-9 col-xl-9">
                    <input style="display:none" name="id" value="{{ (isset($page) && $page !='') ? $page->id : '' }}">
                    <input placeholder="name " id="testimony_en" name="testimony_en" value="{{ (isset($page) && $page !='') ? $page->testimony_en : '' }}" type="text" class="form-control{{ $errors->has('testimony_en') ? ' is-invalid' : '' }}" required autofocus>
                    @if ($errors->has('testimony_en'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('testimony_en') }}</strong>
                      </span>
                    @endif
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label">Testimony(Ar)</label>
                    <div class="col-lg-9 col-xl-9">
                    <input placeholder="name" id="testimony_ar" name="testimony_ar" value="{{ (isset($page) && $page !='') ? $page->testimony_ar : '' }}" type="text" class="form-control{{ $errors->has('testimony_ar') ? ' is-invalid' : '' }}" required autofocus>
                    @if ($errors->has('testimony_ar'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('testimony_ar') }}</strong>
                      </span>
                    @endif
                    </div>
                  </div>



                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Descriptions(En)</label>
                    <div class="col-lg-9 col-xl-9">
                    <textarea class="form-control" id="description_en" name="description_en" placeholder="Content" id="description_en" class="form-control">
                      <?php if(empty($editmenu->description_en)){

                      } else{
                        ?>
                        {{$editmenu->description_en}}
                        <?php
                      }
                        ?></textarea>
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
                    <textarea class="form-control" id="description_ar" name="description_ar" placeholder="Content" id="description_ar" class="form-control">

                      <?php if(empty($editmenu->description_ar)){

                      } else{
                        ?>
                        {{$editmenu->description_ar}}
                        <?php
                      }
                        ?>
                    </textarea>
                    @if ($errors->has('description_ar'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('description_ar') }}</strong>
                      </span>
                    @endif
                    </div>
                  </div>




                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label">Sequence</label>
                    <div class="col-lg-9 col-xl-9">
                    <select class="custom-select form-control" name="is_order">
                      <option value="" >Select</option>
                      <?php
                        if(!empty($order)){
                          for($i=1;$i<=$order;$i++){
                            ?>
                        <option <?php if(!empty($page->is_order) && $page->is_order==$i){ echo "selected"; }?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                      <?php
                          }
                        }
                      ?>
                    </select>
                    <?php
                    if(isset($errors)){
                      ?>
                      <span class="invalid-feed" role="alert">
                        <strong>{{ $errors->getBag('default')->first('is_order') }}</strong>
                      </span>
                    <?php
                    }
                     ?>
                     </div>
                   </div>

                  <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label">Youtube Url</label>
                    <div class="col-lg-9 col-xl-9">
                    <input placeholder="youtube_url" id="youtube_url" name="youtube_url" value="@php if(isset($page->youtube_url)) echo $page->youtube_url; @endphp" type="text" class="form-control" >
                    </div>
                  </div>
                      <?php
                        if(!empty($page->youtube_url)) { ?>
                          <iframe width="32" height="32"  src="@if(isset($page->youtube_url)) {{$page->youtube_url}} @endif">
                      </iframe>
                      <?php } ?>


                      <div class="form-group row">
                        <label class="col-xl-2 col-lg-2 col-form-label"> Video</label>
                        <div class="col-lg-8 col-xl-8">
                          <input placeholder="Upload Image" id="video1" name="video1" type="text" class="form-control" value="" readonly>
                        </div>
                        <div class="col-lg-1 col-xl-1">
                            <button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModel" data-toggle="modal" data-target="#media-model" data-control="video1">Browse</button>
                        </div>
                      </div>
                      <?php
                      $helper = new App\Helpers;
                        if(!empty($page->media_id)){
                        $enImage= $helper->getImage($page->media_id);
                        $imgVideo=env('BASE_URL').$enImage;
                      }else{
                        $imgVideo="";
                      }
                      ?>
                            <?php if(!empty($imgVideo)){
                            ?>
                            <video width="100" height="100" controls>
                             <source src="<?php if(empty($imgVideo)){
                                ?>
                                display:none;<?php
                              }else{
                                echo $imgVideo;
                              }
                                 ?>" type="video/mp4">
                           </video>
                            <?php
                            }?>



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


                  <div class="form-group row">
                    <label class="col-form-label col-lg-2 col-sm-12"> Will Show on Home page</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                      <div class="kt-radio-inline">
                        <label class="kt-radio">
                          <input type="radio" value="1" name="is_active_home" <?php if(empty($editmenu->id)){ echo "checked"; }?> <?php if(!empty($editmenu->is_active_home) && $editmenu->is_active_home=="1"){ echo "checked"; }?>>Active
                          <span></span>
                        </label>
                        <label class="kt-radio">
                          <input type="radio" value="2" name="is_active_home" <?php if(!empty($editmenu->is_active_home) && $editmenu->is_active_home=="2"){ echo "checked"; }?>> Inactive
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
