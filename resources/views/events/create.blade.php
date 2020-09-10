@extends('layouts.app')
@section('title', 'Add')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
         {{(isset($page) && $page !='' ? 'Edit' : 'Add')}} Tips
      </h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>
	  <div class="kt-subheader__breadcrumbs">
			<span class="kt-subheader__breadcrumbs-separator"></span>
			<a href="{{url('events/listing')}}" class="kt-subheader__breadcrumbs-link">
				Tips
			</a>
			<span class="kt-subheader__breadcrumbs-separator"></span>
			{{(isset($page) && $page !='' ? 'Edit' : 'Add')}} Tips
		</div>
   </div>
   <div class="kt-subheader__toolbar">
      <a href="{{url('events/listing')}}" class="btn btn-default btn-bold">
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
		{{-- Tab layout start --}}
		<div class="kt-portlet__body" style="width:100%">
			<ul class="nav nav-tabs nav-fill" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#kt_tabs_1_1">Event Basic</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_tabs_1_2">Content</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_tabs_1_3">Who Should Attend</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_tabs_1_4">For Registration</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_tabs_1_5">Contact us</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_tabs_1_6">Speakers</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_tabs_1_7">Banners</a>
				</li>
			</ul>
			<form class="kt-form" id="kt_apps_user_add_user_form" action="{{ url('events/store')}}" method="POST" enctype="multipart/form-data" style="width:100%">
			@csrf
			<div class="tab-content">
				<div class="tab-pane active" id="kt_tabs_1_1" role="tabpanel">
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
													<input placeholder="name " id="title_en" name="title_en" value="{{ (isset($page) && $page !='') ? $page->title_en : old('title_en') }}" type="text" class="form-control {{ $errors->has('title_en') ? ' is-invalid' : '' }}" autofocus>
													@if ($errors->has('title_en'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('title_en') }}</strong>
														</span>
													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-2 col-lg-2 col-form-label">Title(Ar)</label>
													<div class="col-lg-9 col-xl-9">
													<input placeholder="name" id="title_ar" name="title_ar" value="{{ (isset($page) && $page !='') ? $page->title_ar : old('title_ar') }}" type="text" class="form-control{{ $errors->has('title_ar') ? ' is-invalid' : '' }}" autofocus>
													@if ($errors->has('title_ar'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('title_ar') }}</strong>
														</span>
													@endif
													</div>
												</div>

                        <div class="form-group row">
                          <label class="col-xl-2 col-lg-2 col-form-label"> Slug (en)</label>
                           <div class="col-lg-8 col-xl-8">
                            <input placeholder="DR" id="title" name="slug_en" type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ (isset($page) && $page !='') ? $page->slug_en : old('slug_en') }}">
                            @if ($errors->has('slug_en'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('slug_en') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>


                        <div class="form-group row">
                          <label class="col-xl-2 col-lg-2 col-form-label"> Slug (ar)</label>
                          <div class="col-lg-8 col-xl-8">
                            <input placeholder="DR" id="title" name="slug_ar" type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ (isset($page) && $page !='') ? $page->slug_ar : old('slug_ar') }}">
                            @if ($errors->has('slug_ar'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('slug_ar') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>



												<div class="form-group row">
													<label class="col-form-label col-lg-2 col-sm-12"> Description(En)</label>
													<div class="col-lg-9 col-md-9 col-sm-12">
													<textarea placeholder="meta desc" id="description_en" name="description_en" class="form-control{{ $errors->has('description_en') ? ' is-invalid' : '' }}" rows="8" >{{ (isset($page) && $page !='') ? $page->description_en : old('description_en') }}</textarea>

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
													<textarea  placeholder="meta desc"  id="description_ar" name="description_ar"  class="form-control {{ $errors->has('description_ar') ? ' is-invalid' : '' }}" rows="8" >{{ (isset($page) && $page !='') ? $page->description_ar : old('description_en') }}</textarea>

													@if ($errors->has('description_ar'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('description_ar') }}</strong>
														</span>
													@endif
													</div>
												</div>
															<div class="form-group row">
													<label class="col-xl-2 col-lg-2 col-form-label">Address(En)</label>
													<div class="col-lg-9 col-xl-9">

								<textarea  placeholder="Address in english"  id="address_en" name="address_en"  class="form-control {{ $errors->has('address_en') ? ' is-invalid' : '' }}" rows="8" >{{ (isset($page) && $page !='') ? $page->address_en : old('address_en') }}</textarea>
													@if ($errors->has('address_en'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('address_en') }}</strong>
														</span>
													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-2 col-lg-2 col-form-label">Address(Ar)</label>
													<div class="col-lg-9 col-xl-9">
								<textarea  placeholder="Address in arabic"  id="address_ar" name="address_ar"  class="form-control {{ $errors->has('address_ar') ? ' is-invalid' : '' }}" rows="8" >{{ (isset($page) && $page !='') ? $page->address_ar : old('address_ar') }}</textarea>
													@if ($errors->has('address_ar'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('address_ar') }}</strong>
														</span>
													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-2 col-lg-2 col-form-label">Email</label>
													<div class="col-lg-9 col-xl-9">
													<input placeholder="Email" id="email" name="email" value="{{ (isset($page) && $page !='') ? $page->email : old('email') }}" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" autofocus>
													@if ($errors->has('email'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('email') }}</strong>
														</span>
													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-xl-2 col-lg-2 col-form-label">Phone</label>
													<div class="col-lg-9 col-xl-9">
													<input placeholder="phone" id="phone" name="phone" value="{{ (isset($page) && $page !='') ? $page->phone : old('phone') }}" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" autofocus>
													@if ($errors->has('phone'))
														<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('phone') }}</strong>
														</span>
													@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label col-lg-2 col-sm-12"> Event Start Date</label>
													<div class="col-lg-2">
														<input class="form-control {{ $errors->has('event_start_date') ? ' is-invalid' : '' }}" type="date" name="event_start_date" value="{{ (isset($page) && $page !='') ? date("Y-m-d",strtotime($page->event_start_date)) : date('Y-m-d') }}">
														@if ($errors->has('event_start_date'))
															<span class="invalid-feedback" role="alert">
																<strong>{{ $errors->first('event_start_date') }}</strong>
															</span>
														@endif
													</div>
													<div class="col-lg-2">
														<input class="form-control {{ $errors->has('event_start_time') ? ' is-invalid' : '' }}" type="time" name="event_start_time" value="{{ (isset($page) && $page !='') ? date("H:i:s",strtotime($page->event_start_time)) : date('H:i:s') }}">
														@if ($errors->has('event_start_time'))
															<span class="invalid-feedback" role="alert">
																<strong>{{ $errors->first('event_start_time') }}</strong>
															</span>
														@endif
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label col-lg-2 col-sm-12"> Event End Date</label>
													<div class="col-lg-2">
														<input class="form-control {{ $errors->has('event_end_date') ? ' is-invalid' : '' }}" type="date" name="event_end_date" value="{{ (isset($page) && $page !='') ? date("Y-m-d",strtotime($page->event_end_date)) : date('Y-m-d') }}">
														@if ($errors->has('event_end_date'))
															<span class="invalid-feedback" role="alert">
																<strong>{{ $errors->first('event_end_date') }}</strong>
															</span>
														@endif
													</div>
													<div class="col-lg-2">
														<input class="form-control {{ $errors->has('event_end_time') ? ' is-invalid' : '' }}" type="time" name="event_end_time" value="{{ (isset($page) && $page !='') ? date("H:i:s",strtotime($page->event_end_time)) : date('H:i:s') }}">
														@if ($errors->has('event_end_time'))
															<span class="invalid-feedback" role="alert">
																<strong>{{ $errors->first('event_end_time') }}</strong>
															</span>
														@endif
													</div>
												</div>


												<!-- pdf -->
                                                  <div class="form-group row">
													<label class="col-md-2 col-form-label"> Pdf</label>
													<div class="col-lg-8 col-xl-8">
														<input placeholder="Upload pdf" id="" name="pdf" type="file" class="form-control {{ $errors->has('pdf') ? ' is-invalid' : '' }}" value="" accept="application/pdf, application/vnd.ms-excel">
														@if ($errors->has('pdf'))
															<span class="invalid-feedback" role="alert">
																<strong>{{ $errors->first('pdf') }}</strong>
															</span>
														@endif
													</div>
												</div>

												@if(!empty($page->pdf))
												<div class="form-group row">
													<label class="col-md-2 col-form-label"></label>
													<div class="col-md-8">
														<i class="fa fa-file-pdf-o" style="font-size:24px"></i>
													</div>
												</div>
												@endif

												<!-- Closepdf -->





												<div class="form-group row">
													<label class="col-md-2 col-form-label"> Image</label>
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
                        <?php
                        $helper = new App\Helpers();
                        ?>
                        <?php
                        if(!empty($page->media_id_en)){
                         $enImage= $helper->getImage($page->media_id_en);
                         $img=env('BASE_URL').$enImage;
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
													<label class="col-md-2 col-form-label"> Image (Ar)</label>
													<div class="col-lg-8 col-xl-8">
														<input placeholder="Upload Image" id="image1Ar" name="image1Ar" type="text" class="form-control {{ $errors->has('image1Ar') ? ' is-invalid' : '' }}" value="" readonly>
														@if ($errors->has('image1Ar'))
															<span class="invalid-feedback" role="alert">
																<strong>{{ $errors->first('image1Ar') }}</strong>
															</span>
														@endif
													</div>
													<div class="col-lg-1 col-xl-1">
															<button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModel" data-toggle="modal" data-target="#media-model" data-control="image1Ar">Browse</button>
													</div>
												</div>
                        <?php
                        if(!empty($page->media_id_ar)){
                         $enImage= $helper->getImage($page->media_id_ar);
                         $img=env('BASE_URL').$enImage;
                        }
                        ?>
												@if(!empty($page->image1Ar))
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

				</div>
				<div class="tab-pane" id="kt_tabs_1_2" role="tabpanel">
					<div class="form-group row">
						<label class="col-form-label col-lg-2 col-sm-12"> Content(En)</label>
						<div class="col-lg-9 col-md-9 col-sm-12">
						<textarea placeholder="meta desc" id="content_en" name="content_en"  class="form-control{{ $errors->has('content_en') ? ' is-invalid' : '' }}" rows="8" required>{{ (isset($page) && $page !='') ? $page->content_en : old('content_en') }}</textarea>

						@if ($errors->has('content_en'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('content_en') }}</strong>
							</span>
						@endif
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-lg-2 col-sm-12"> Content(Ar)</label>
						<div class="col-lg-9 col-md-9 col-sm-12">
						<textarea  placeholder="meta desc"  id="content_ar" name="content_ar"  class="form-control{{ $errors->has('content_ar') ? ' is-invalid' : '' }}" rows="8" required>{{ (isset($page) && $page !='') ? $page->content_ar : old('content_ar') }}</textarea>

						@if ($errors->has('content_ar'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('content_ar') }}</strong>
							</span>
						@endif
						</div>
					</div>
				</div>
				<div class="tab-pane" id="kt_tabs_1_3" role="tabpanel">
					<div class="form-group row">
						<label class="col-form-label col-lg-2 col-sm-12"> Attend(En)</label>
						<div class="col-lg-9 col-md-9 col-sm-12">
						<textarea placeholder="meta desc" id="attend_en" name="attend_en"  class="form-control{{ $errors->has('attend_en') ? ' is-invalid' : '' }}" rows="8" required>{{ (isset($page) && $page !='') ? $page->attend_en : old('attend_en') }}</textarea>

						@if ($errors->has('attend_en'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('attend_en') }}</strong>
							</span>
						@endif
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-lg-2 col-sm-12"> Attend(Ar)</label>
						<div class="col-lg-9 col-md-9 col-sm-12">
						<textarea  placeholder="meta desc"  id="attend_ar" name="attend_ar"  class="form-control{{ $errors->has('attend_ar') ? ' is-invalid' : '' }}" rows="8" required>{{ (isset($page) && $page !='') ? $page->attend_ar : old('attend_ar') }}</textarea>

						@if ($errors->has('attend_ar'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('attend_ar') }}</strong>
							</span>
						@endif
						</div>
					</div>
				</div>
				<div class="tab-pane" id="kt_tabs_1_4" role="tabpanel">
					<div class="form-group row">
						<label class="col-form-label col-lg-2 col-sm-12"> Register(En)</label>
						<div class="col-lg-9 col-md-9 col-sm-12">
						<input type="text" placeholder="Registration Link" id="register_link" name="register_link"  class="form-control{{ $errors->has('register_en') ? ' is-invalid' : '' }}" value="{{ (isset($page) && $page !='') ? $page->register_link : old('register_link') }}">
						@if ($errors->has('register_link'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('register_link') }}</strong>
							</span>
						@endif
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-lg-2 col-sm-12"> Course Fee</label>
						<div class="col-md-1">
							<button type="button" class="addCourse btn btn-sm btn-primary">Add Course</button>
						</div>
					</div>
					<div class="courses">
						@if (isset($page) && $page->eventcourses != null && count($page->eventcourses) > 0)
							@foreach ($page->eventcourses as $key => $item)
								<div class="form-group row">
									<label class="col-form-label col-lg-2"></label>
									<div class="col-md-3">
									<input type="text" name="courses[{{$key}}][name_en]" placeholder="Enter course name in english" 	class="form-control" value="{{$item->name_en}}">
									</div>
									<div class="col-md-3">
										<input type="text" name="courses[{{$key}}][name_ar]" placeholder="Enter course name in arabic" class="form-control" value="{{$item->name_ar}}">
									</div>
									<div class="col-md-1">
										<input type="text" name="courses[{{$key}}][amount]" placeholder="Amount" class="form-control" value="{{$item->amount}}">
									</div>
									<div class="col-md-1">
										<input type="text" name="courses[{{$key}}][vat]" placeholder="VAT%"  class="form-control" value="{{$item->vat}}">
									</div>
									@if($key > 0)
											<div class="col-md-1">
												<a class="btn btn-danger removeCourse" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
											</div>
									@endif
								</div>
							@endforeach
						@else
							<div class="form-group row">
								<label class="col-form-label col-lg-2"></label>
								<div class="col-md-3">
									<input type="text" name="courses[0][name_en]" placeholder="Enter course name in english" class="form-control" value="">
								</div>
								<div class="col-md-3">
									<input type="text" name="courses[0][name_ar]" placeholder="Enter course name in arabic" class="form-control" value="">
								</div>
								<div class="col-md-1">
									<input type="text" name="courses[0][amount]" placeholder="Amount" class="form-control" value="">
								</div>
								<div class="col-md-1">
									<input type="text" name="courses[0][vat]" placeholder="VAT%"  class="form-control" value="">
								</div>
							</div>
						@endif
					</div>
				</div>
				<div class="tab-pane" id="kt_tabs_1_5" role="tabpanel">
					<div class="form-group row">
						<label class="col-form-label col-lg-2 col-sm-12"> Contact(En)</label>
						<div class="col-lg-9 col-md-9 col-sm-12">
						<textarea placeholder="meta desc" id="contact_en" name="contact_en"  class="form-control{{ $errors->has('contact_en') ? ' is-invalid' : '' }}" rows="8">{{ (isset($page) && $page !='') ? $page->contact_en : old('contact_en') }}</textarea>
						@if ($errors->has('contact_en'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('contact_en') }}</strong>
							</span>
						@endif
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-lg-2 col-sm-12"> Contact(Ar)</label>
						<div class="col-lg-9 col-md-9 col-sm-12">
						<textarea  placeholder="meta desc"  id="contact_ar" name="contact_ar"  class="form-control{{ $errors->has('contact_ar') ? ' is-invalid' : '' }}" rows="8">{{(isset($page) && $page !='') ? $page->contact_ar : old('contact_ar') }}</textarea>
						@if ($errors->has('contact_ar'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('contact_ar') }}</strong>
							</span>
						@endif
						</div>
					</div>
				</div>
				<div class="tab-pane" id="kt_tabs_1_6" role="tabpanel">
					<button type="button" class="addSpeaker btn btn-sm btn-primary" style="float:right">Add Speaker</button>
					<div class="speakers" style="clear:both">
						@if (isset($page) && $page->eventspeakers != null && count($page->eventspeakers)>0)
							@foreach ($page->eventspeakers as $key => $item)
								<div class="speaker">
									<label class="col-lg-2" style="font-weight: bold;padding:0">Speaker {{$key+1}}</label>
									<div class="form-group row">
										<label class="col-form-label col-lg-2">Name</label>
										<div class="col-md-3">
											<input type="text" name="speakers[{{$key}}][name_en]" placeholder="Enter name english" class="form-control" value="{{$item->name_en}}">
										</div>
										<div class="col-md-3">
											<input type="text" name="speakers[{{$key}}][name_ar]" placeholder="Enter name in arabic" class="form-control" value="{{$item->name_ar}}">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-2">Title</label>
										<div class="col-md-3">
											<input type="text" name="speakers[{{$key}}][title_en]" placeholder="Enter title english" class="form-control" value="{{$item->title_en}}">
										</div>
										<div class="col-md-3">
											<input type="text" name="speakers[{{$key}}][title_ar]" placeholder="Enter title in arabic" class="form-control" value="{{$item->title_ar}}">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-2">Bio</label>
										<div class="col-md-3">
											<input type="text" name="speakers[{{$key}}][bio_en]" placeholder="Enter bio english" class="form-control" value="{{$item->bio_en}}">
										</div>
										<div class="col-md-3">
											<input type="text" name="speakers[{{$key}}][bio_ar]" placeholder="Enter bio in arabic" class="form-control" value="{{$item->bio_ar}}">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-2">Links</label>
										<div class="col-md-2">
											<input type="text" name="speakers[{{$key}}][facebook]" placeholder="Facebook" class="form-control" value="{{$item->facebook}}">
										</div>
										<div class="col-md-2">
											<input type="text" name="speakers[{{$key}}][twitter]" placeholder="Twitter" class="form-control" value="{{$item->twitter}}">
										</div>
										<div class="col-md-2">
											<input type="text" name="speakers[{{$key}}][instagram]" placeholder="Instagram" class="form-control" value="{{$item->instagram}}">
										</div>
										<div class="col-md-2">
											<input type="text" name="speakers[{{$key}}][youtube]" placeholder="Youtube" class="form-control" value="{{$item->youtube}}">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-2">Image</label>
										<div class="col-lg-5 col-xl-5">
										<input placeholder="Upload Image" id="speakers_image_{{$key}}" name="speakers[{{$key}}][image]" 		type="text" class="form-control" value="" readonly>
										</div>
										<div class="col-lg-1 col-xl-1">
												<button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModel" data-toggle="modal" data-target="#media-model" data-control="speakers_image_{{$key}}">Browse</button>
										</div>
                                                    <?php
                                                    $helper = new App\Helpers();
                                                    ?>
                                                    <?php
                                                    if(!empty($item->media_id_en)){
                                                     $enImage= $helper->getImage($item->media_id_en);
                                                     $img=env('BASE_URL').$enImage;
                                                    }
                                                    ?>
											<img src="{{$img}}" height="50px" width="100px"></img>

									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-2">Image (Ar)</label>
										<div class="col-lg-5 col-xl-5">
										<input placeholder="Upload Image" id="speakers_imageAr_{{$key}}" name="speakers[{{$key}}][imageAr]" 	type="text" class="form-control" value="" readonly>
										</div>
										<div class="col-lg-1 col-xl-1">
												<button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModelAr" data-toggle="modal" data-target="#media-model" data-control="speakers_imageAr_{{$key}}">Browse</button>
										</div>
                                            <?php
                                            $helper = new App\Helpers();
                                            ?>
                                            <?php
                                            if(!empty($item->media_id_ar)){
                                             $enImage= $helper->getImage($item->media_id_ar);
                                             $img=env('BASE_URL').$enImage;
                                            }
                                            ?>
											<img src="{{$img}}" height="50px" width="100px"></img>
										@if($key > 0)
											<div class="col-md-1">
												<a class="btn btn-danger removeSpeaker" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
											</div>
										@endif
									</div>
								</div>
							@endforeach
						@else
							<div class="speaker">
							<label class="col-lg-2" style="font-weight: bold;padding:0">Speaker 1</label>
							<div class="form-group row">
								<label class="col-form-label col-lg-2">Name</label>
								<div class="col-md-3">
									<input type="text" name="speakers[0][name_en]" placeholder="Enter name english" class="form-control" value="">
								</div>
								<div class="col-md-3">
									<input type="text" name="speakers[0][name_ar]" placeholder="Enter name in arabic" class="form-control" value="">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-lg-2">Title</label>
								<div class="col-md-3">
									<input type="text" name="speakers[0][title_en]" placeholder="Enter title english" class="form-control" value="">
								</div>
								<div class="col-md-3">
									<input type="text" name="speakers[0][title_ar]" placeholder="Enter title in arabic" class="form-control" value="">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-lg-2">Bio</label>
								<div class="col-md-3">
									<input type="text" name="speakers[0][bio_en]" placeholder="Enter bio english" class="form-control" value="">
								</div>
								<div class="col-md-3">
									<input type="text" name="speakers[0][bio_ar]" placeholder="Enter bio in arabic" class="form-control" value="">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-lg-2">Links</label>
								<div class="col-md-2">
									<input type="text" name="speakers[0][facebook]" placeholder="Facebook" class="form-control" value="">
								</div>
								<div class="col-md-2">
									<input type="text" name="speakers[0][twitter]" placeholder="Twitter" class="form-control" value="">
								</div>
								<div class="col-md-2">
									<input type="text" name="speakers[0][instagram]" placeholder="Instagram" class="form-control" value="">
								</div>
								<div class="col-md-2">
									<input type="text" name="speakers[0][youtube]" placeholder="Youtube" class="form-control" value="">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-lg-2">Image</label>
								<div class="col-lg-5 col-xl-5">
									<input placeholder="Upload Image" id="speakers_image_0" name="speakers[0][image]" type="text" class="form-control" readonly >
								</div>
								<div class="col-lg-1 col-xl-1">
										<button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModel" data-toggle="modal" data-target="#media-model" data-control="speakers_image_0">Browse</button>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-form-label col-lg-2">Image (Ar)</label>
								<div class="col-lg-5 col-xl-5">
									<input placeholder="Upload Image" id="speakers_imageAr_0" name="speakers[0][imageAr]" type="text" class="form-control" readonly >
								</div>
								<div class="col-lg-1 col-xl-1">
										<button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModelAr" data-toggle="modal" data-target="#media-model" data-control="speakers_imageAr_0">Browse</button>
								</div>
							</div>
						</div>
						@endif
					</div>
				</div>
				<div class="tab-pane" id="kt_tabs_1_7" role="tabpanel">
					<div class="form-group row">
						<label class="col-form-label col-lg-1 col-sm-12"> Banners</label>
						<div class="col-md-1">
							<button type="button" class="addBanner btn btn-sm btn-primary">Add Banner</button>
						</div>
					</div>
					<div class="banners">

						@if (isset($page) && $page->eventbanner != null && count($page->eventbanner)>0)
							@foreach ($page->eventbanner as $key => $item)

								<div class="form-group row">
									<label class="col-form-label col-lg-1 bannerLabel">Banner {{$key+1}}</label>
									<div class="col-lg-2 col-xl-2">
										<input placeholder="Title" name="banners[{{$key}}][title]" type="text" class="form-control" value="{{$item->title}}">
									</div>
									<div class="col-lg-2 col-xl-2">
										<input placeholder="link" name="banners[{{$key}}][link]" type="text" class="form-control" value="{{$item->link}}">
									</div>
									<div class="col-lg-2 col-xl-2">
										<input placeholder="Upload Image" id="banner_image_{{$key}}" name="banners[{{$key}}][image]" 		type="text" class="form-control" value="{{$item->image}}" readonly>
									</div>
									<div class="col-lg-1 col-xl-1">
											<button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModel" data-toggle="modal" data-target="#media-model" data-control="banner_image_{{$key}}">Browse</button>
									</div>
                  <?php
                  $helper = new App\Helpers();
                  ?>
                  <?php
                  if(!empty($item->media_id_en)){
                   $enImage= $helper->getImage($item->media_id_en);
                   $img=env('BASE_URL').$enImage;
                  }
                  ?>
									<img src="{{$img}}" height="50px" width="100px"></img>
									<div class="col-lg-2 col-xl-2">
										<input placeholder="Upload Image Arabic" id="banner_imageAr_{{$key}}" name="banners[{{$key}}][imageAr]" type="text" class="form-control" value="{{$item->imageAr}}" readonly>
									</div>
									<div class="col-lg-1 col-xl-1">
											<button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModelAr" data-toggle="modal" data-target="#media-model" data-control="banner_imageAr_{{$key}}">Browse</button>
									</div>
                  <?php
                  $helper = new App\Helpers();
                  ?>
                  <?php
                  if(!empty($item->media_id_ar)){
                   $enImage= $helper->getImage($item->media_id_ar);
                   $img=env('BASE_URL').$enImage;
                  }
                  ?>
									<img src="{{$img}}" height="50px" width="100px"></img>

									@if($key > 0)
										<div class="col-md-1">
											<a class="btn btn-danger removeBanner" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
										</div>
									@endif
								</div>
							@endforeach
						@else
							<div class="form-group row">
								<label class="col-form-label col-lg-1 bannerLabel">Banner 1</label>
								<div class="col-lg-2 col-xl-2">
									<input placeholder="Title" name="banners[0][title]" type="text" class="form-control" value="">
								</div>
								<div class="col-lg-2 col-xl-2">
									<input placeholder="link" name="banners[0][link]" type="text" class="form-control" value="">
								</div>
								<div class="col-lg-2 col-xl-2">
									<input placeholder="Upload Image" id="banner_image_0" name="banners[0][image]" type="text" class="form-control" value="" readonly>
								</div>
								<div class="col-lg-1 col-xl-1">
										<button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModel" data-toggle="modal" data-target="#media-model" data-control="banner_image_0">Browse</button>
								</div>
								<div class="col-lg-2 col-xl-2">
									<input placeholder="Upload Image Arabic" id="banner_imageAr_0" name="banners[0][imageAr]" type="text" class="form-control" value="" readonly>
								</div>
								<div class="col-lg-1 col-xl-1">
										<button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModelAr" data-toggle="modal" data-target="#media-model" data-control="banner_imageAr_0">Browse</button>
								</div>
							</div>
						@endif
					</div>
				</div>
			</div>
			<hr>
			<div class="kt-form__actions">
				<input type="submit" value="Submit" name="submit" class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
				</div>
				<!--end: Form Actions -->
			</form>
		</div>
		{{-- Tab layout end --}}
	</div>
</div>
</div>
</div>
</div>
</div>
<div class="form-group row newBanner" style="display:none">
	<label class="col-form-label col-lg-1 bannerLabel">Banner 1</label>
	<div class="col-lg-2 col-xl-2">
		<input placeholder="Title" type="text" class="form-control title" value="">
	</div>
	<div class="col-lg-2 col-xl-2">
		<input placeholder="link" type="text" class="form-control link" value="">
	</div>
	<div class="col-lg-2 col-xl-2">
		<input placeholder="Upload Image" type="text" class="form-control image" value="" readonly>
	</div>
	<div class="col-lg-1 col-xl-1">
			<button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModel" data-toggle="modal" data-target="#media-model" >Browse</button>
	</div>
	<div class="col-lg-2 col-xl-2">
		<input placeholder="Upload Image Arabic" type="text" class="form-control imageAr" value="" readonly>
	</div>
	<div class="col-lg-1 col-xl-1">
			<button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModelAr" data-toggle="modal" data-target="#media-model" >Browse</button>
	</div>
	<div class="col-md-1">
		<a class="btn btn-danger removeBanner" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
	</div>
</div>
<div class="form-group row newCourse" style="display: none">
	<label class="col-form-label col-lg-2"></label>
	<div class="col-md-3">
		<input type="text" name="courses[0][name_en]" placeholder="Enter course name in english" class="form-control name_en" value="">
	</div>
	<div class="col-md-3">
		<input type="text" name="courses[0][name_ar]" placeholder="Enter course name in arabic" class="form-control name_ar" value="">
	</div>
	<div class="col-md-1">
		<input type="text" name="courses[0][amount]" placeholder="Amount" class="form-control amount" value="">
	</div>
	<div class="col-md-1">
		<input type="text" name="courses[0][vat]" placeholder="VAT%"  class="form-control vat" value="">
	</div>
	<div class="col-md-1">
		<a class="btn btn-danger removeCourse" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
	</div>
</div>
<div id="speaker" class="speaker" style="display: none">
	<label class="col-lg-2 speakerLabel" style="font-weight: bold;padding:0"></label>
	<div class="form-group row">
		<label class="col-form-label col-lg-2">Name</label>
		<div class="col-md-3">
			<input type="text" placeholder="Enter name english" class="form-control name_en" value="">
		</div>
		<div class="col-md-3">
			<input type="text" placeholder="Enter name in arabic" class="form-control name_ar" value="">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-form-label col-lg-2">Title</label>
		<div class="col-md-3">
			<input type="text" placeholder="Enter title english" class="form-control title_en" value="">
		</div>
		<div class="col-md-3">
			<input type="text" placeholder="Enter title in arabic" class="form-control title_ar" value="">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-form-label col-lg-2">Bio</label>
		<div class="col-md-3">
			<input type="text" placeholder="Enter bio english" class="form-control bio_en" value="">
		</div>
		<div class="col-md-3">
			<input type="text" placeholder="Enter bio in arabic" class="form-control bio_ar" value="">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-form-label col-lg-2">Links</label>
		<div class="col-md-2">
			<input type="text" placeholder="Facebook" class="form-control facebook" value="">
		</div>
		<div class="col-md-2">
			<input type="text" placeholder="Twitter" class="form-control twitter" value="">
		</div>
		<div class="col-md-2">
			<input type="text" placeholder="Instagram" class="form-control instagram" value="">
		</div>
		<div class="col-md-2">
			<input type="text" placeholder="Youtube" class="form-control youtube" value="">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-form-label col-lg-2">Image</label>
		<div class="col-lg-5 col-xl-5">
			<input placeholder="Upload Image" id="" type="text" class="form-control image" readonly>
		</div>
		<div class="col-lg-1 col-xl-1">
				<button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModel" data-toggle="modal" data-target="#media-model" data-control="">Browse</button>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-form-label col-lg-2">Image (Ar)</label>
		<div class="col-lg-5 col-xl-5">
			<input placeholder="Upload Image" id="" type="text" class="form-control imageAr" readonly>
		</div>
		<div class="col-lg-1 col-xl-1">
				<button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModelAr" data-toggle="modal" data-target="#media-model" data-control="">Browse</button>
		</div>
		<div class="col-md-1">
			<a class="btn btn-danger removeSpeaker" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
		</div>
	</div>
</div>
@stop
@section('script')

<script src="{{env('BASE_URL')}}assets/unisharp/laravel-ckeditor/ckeditor.js"></script>

<script>



CKEDITOR.replace('contact_en', {
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
  height: 200,
  removeDialogTabs: 'image:advanced;link:advanced'
});

CKEDITOR.replace('contact_ar', {
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
  height: 200,
  removeDialogTabs: 'image:advanced;link:advanced'
});



$(document).on("click",".addCourse",function(){
	$totalCourse = $(".courses").find(".row").length;
	$course = $(".newCourse").clone();
	$course.removeClass("newCourse");
	$course.removeAttr("style");
	$course.find(".name_en").attr("name","courses["+$totalCourse+"][name_en]");
	$course.find(".name_ar").attr("name","courses["+$totalCourse+"][name_ar]");
	$course.find(".amount").attr("name","courses["+$totalCourse+"][amount]");
	$course.find(".vat").attr("name","courses["+$totalCourse+"][vat]");
	$(".courses").append($course);
});

$(document).on("click",".addSpeaker",function(){
	$totalSpeaker = $(".speakers").find(".speaker").length;
	console.log($totalSpeaker);
	$speaker = $("#speaker").clone();
	$speaker.removeAttr("id");
	$speaker.removeAttr("style");
	$speaker.find(".speakerLabel").text("speaker "+($totalSpeaker+1));
	$speaker.find(".name_en").attr("name","speakers["+$totalSpeaker+"][name_en]");
	$speaker.find(".name_ar").attr("name","speakers["+$totalSpeaker+"][name_ar]");
	$speaker.find(".title_en").attr("name","speakers["+$totalSpeaker+"][title_en]");
	$speaker.find(".title_ar").attr("name","speakers["+$totalSpeaker+"][title_ar]");
	$speaker.find(".bio_en").attr("name","speakers["+$totalSpeaker+"][bio_en]");
	$speaker.find(".bio_ar").attr("name","speakers["+$totalSpeaker+"][bio_ar]");
	$speaker.find(".facebook").attr("name","speakers["+$totalSpeaker+"][facebook]");
	$speaker.find(".twitter").attr("name","speakers["+$totalSpeaker+"][twitter]");
	$speaker.find(".instagram").attr("name","speakers["+$totalSpeaker+"][instagram]");
	$speaker.find(".youtube").attr("name","speakers["+$totalSpeaker+"][youtube]");
	$speaker.find(".image").attr("name","speakers["+$totalSpeaker+"][image]");
	$speaker.find(".image").attr("id","speaker_image_"+$totalSpeaker);
	$speaker.find(".mediaModel").attr("data-control","speaker_image_"+$totalSpeaker);
	$speaker.find(".imageAr").attr("name","speakers["+$totalSpeaker+"][imageAr]");
	$speaker.find(".imageAr").attr("id","speaker_imageAr_"+$totalSpeaker);
	$speaker.find(".mediaModelAr").attr("data-control","speaker_imageAr_"+$totalSpeaker);
	$(".speakers").append($speaker);
});

$(document).on("click",".addBanner",function(){
	$totalBanner = $(".banners").find(".row").length;
	$banner = $(".newBanner").clone();
	$banner.removeClass("newBanner");
	$banner.removeAttr("style");
	$banner.find(".bannerLabel").text("Banner "+($totalBanner+1));
	$banner.find(".title").attr("name","banners["+$totalBanner+"][title]");
	$banner.find(".link").attr("name","banners["+$totalBanner+"][link]");
	$banner.find(".image").attr("name","banners["+$totalBanner+"][image]");
	$banner.find(".image").attr("id","banner_image_"+$totalBanner);
	$banner.find(".mediaModel").attr("data-control","banner_image_"+$totalBanner);
	$banner.find(".imageAr").attr("name","banners["+$totalBanner+"][imageAr]");
	$banner.find(".imageAr").attr("id","banner_imageAr_"+$totalBanner);
	$banner.find(".mediaModelAr").attr("data-control","banner_imageAr_"+$totalBanner);
	$(".banners").append($banner);
});

$(document).on("click",".removeCourse",function(){
	$(this).closest(".row").remove();
});

$(document).on("click",".removeSpeaker",function(){
	$(this).closest(".speaker").remove();
});

$(document).on("click",".removeBanner",function(){
	$(this).closest(".row").remove();
});

CKEDITOR.replace( 'description_en', { height: 200,width: 800 });
CKEDITOR.replace( 'description_ar', { height: 200,width: 800 });
CKEDITOR.replace( 'address_en', { height: 200,width: 800 });
CKEDITOR.replace( 'address_ar', { height: 200,width: 800 });
CKEDITOR.replace( 'content_en', { height: 200,width: 800 });
CKEDITOR.replace( 'content_ar', { height: 200,width: 800 });
CKEDITOR.replace( 'attend_en', { height: 200,width: 800 });
CKEDITOR.replace( 'attend_ar', { height: 200,width: 800 });
CKEDITOR.replace( 'register_en', { height: 200,width: 800 });
CKEDITOR.replace( 'register_ar', { height: 200,width: 800 });
CKEDITOR.replace( 'contact_en', { height: 200,width: 800 });
CKEDITOR.replace( 'contact_ar', { height: 200,width: 800 });


</script>
@stop
