@extends('layouts.app')
@section('title', 'Add Survey')
@section('content')

<div class="kt-subheader   kt-grid__item" id="kt_subheader">
   <div class="kt-subheader__main">
      <h3 class="kt-subheader__title">
         Add Survey
      </h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>
	  <div class="kt-subheader__breadcrumbs">
			<span class="kt-subheader__breadcrumbs-separator"></span>
			<a href="{{url('admin/survey')}}" class="kt-subheader__breadcrumbs-link">
				Survey 
			</a>
			<span class="kt-subheader__breadcrumbs-separator"></span>
			Add Survey			
		</div>
   </div>
   <div class="kt-subheader__toolbar">
      <a href="{{url('admin/survey')}}" class="btn btn-default btn-bold">
      Back </a>
   </div>
</div>


<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
<div class="kt-wizard-v4" id="kt_apps_user_add_user" data-ktwizard-state="step-first">
<div class="kt-portlet">
<div class="kt-portlet__body kt-portlet__body--fit">
<div class="kt-grid">
	<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper  education">

		<!--begin: Form Wizard Form-->
		<form class="kt-form" id="kt_apps_user_add_user_form" action="{{ url('admin/survey')}}" method="POST" enctype="multipart/form-data">
          @csrf
			<!--begin: Form Wizard Step 1-->
			<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
				<div class="kt-heading kt-heading--md">Add Page :</div>
				<div class="kt-section kt-section--first">
					<div class="kt-wizard-v4__form">
						<div class="row">
							<div class="col-xl-12">
								<div class="kt-section__body">
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label"> Title(En)</label>
										<div class="col-lg-9 col-xl-9">
                                        <input placeholder="Title in english " id="title_en" name="title_en" type="text" class="form-control {{ $errors->has('title_en') ? ' is-invalid' : '' }}" value="{{old('title_en')}}" autofocus>											
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
                                            <input placeholder="Title in Arabic " id="title_ar" name="title_ar" type="text" class="form-control {{ $errors->has('title_ar') ? ' is-invalid' : '' }} " value="{{old('title_ar')}}" autofocus>											
                                            @if ($errors->has('title_ar'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('title_ar') }}</strong>
                                                </span>
                                            @endif
										</div>
									</div>


									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label"> Parent Title(En)</label>
										<div class="col-lg-9 col-xl-9">
                                            <input type="text" placeholder="Parent Title(En)"  name="question_parent" class="form-control">										
                                            
										</div>
									</div>


									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label"> Parent Title(Ar)</label>
										<div class="col-lg-9 col-xl-9">
                                            <input type="text" placeholder="Parent Title(Ar)"  name="question_parent_ar" class="form-control">										
                                            
										</div>
									</div>


							



									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label"> Image</label>
										<div class="col-lg-9 col-xl-9">
											<div class="custom-file">
												<input  accept="image/*" type="file" class="custom-file-input{{ $errors->has('image') ? ' is-invalid' : '' }}" id="iconFile"  name="image">
												<label class="custom-file-label LabeliconFile " for="iconFile">Choose image</label>
												@if ($errors->has('image'))
													<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('image') }}</strong>
													</span>
												@endif
											</div>
										</div>
									</div>



									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label"> Question Type</label>
										<div class="col-lg-9 col-xl-9">
                                          

                                            <select name="question_type" class="form-control questionType">
                                            	<option value="1" selected> Radio</option>
                                            	<option value="2">Input</option>
                                            	<option value="3">Textarea</option>
                                            	<option value="4">Date</option>
                                            	<option value="5">Time</option>
                                            	<option value="6">Date Time</option>
                                            </select>										
                                            
									</div>





                                   <div class="p_scents">
                                   	<!-- <p>
									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label"> Question (En)</label>
										<div class="col-lg-9 col-xl-9">
                                            <input placeholder="Question in english " id="title_ar" name="question_en[]" type="text" class="form-control {{ $errors->has('question_en') ? ' is-invalid' : '' }} " value="{{old('question_en')}}" autofocus>											
                                            @if ($errors->has('question_en'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('question_en') }}</strong>
                                                </span>
                                            @endif
										</div>
									</div>


									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label"> Question (Ar)</label>
										<div class="col-lg-9 col-xl-9">
                                            <input placeholder="Question in Arabic" id="title_ar" name="question_ar[]" type="text" class="form-control {{ $errors->has('title_ar') ? ' is-invalid' : '' }} " value="{{old('question_ar')}}" autofocus>											
                                            @if ($errors->has('question_ar'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('question_ar') }}</strong>
                                                </span>
                                            @endif
										</div>
									</div>

									<div class="form-group row">
										<label class="col-xl-2 col-lg-2 col-form-label"> Answer </label>
										<div class="col-lg-9 col-xl-9">

                                            <input placeholder="Answer En(1)" id="answer_en" name="answer_en[]" type="text" class="form-control" value="">

                                            <input placeholder="Answer Ar(1)" id="answer_ar" name="answer_ar[]" type="text" class="form-control" value="">

                                            <input placeholder="Answer En(2)" id="answer_en" name="answer_en2[]" type="text" class="form-control" value="">	

                                            <input placeholder="Answer Ar(2)" id="answer_ar" name="answer_ar2[]" type="text" class="form-control" value="">

                                            <input placeholder="Answer En(3)" id="answer_en" name="answer_en3[]" type="text" class="form-control" value="">	

                                            <input placeholder="Answer Ar(3)" id="answer_ar" name="answer_ar3[]" type="text" class="form-control" value="">

                                            <input placeholder="Answer En(4)" id="answer_en" name="answer_en4[]" type="text" class="form-control" value="">	

                                            <input placeholder="Answer Ar(4)" id="answer_ar" name="answer_ar4[]" type="text" class="form-control" value="">

                                             <input placeholder="Answer En(5)" id="answer_en" name=
                                             "answer_en5[]" type="text" class="form-control" value="">	

                                            <input placeholder="Answer Ar(5)" id="answer_ar" name="answer_ar5[]" type="text" class="form-control" value="">


                                            <input placeholder="Answer En(6)" id="answer_en" name="answer_en6[]" type="text" class="form-control" value="">	

                                            <input placeholder="Answer Ar(6)" id="answer_ar" name="answer_ar6[]" type="text" class="form-control" value="">


                                            
										</div>
									</div>



									</p> -->
								</div>


						<div class="row" style="margin-bottom:15px" >
						<div class="col-sm-4">
							<button class="btn btn-warning newEducation" type="button">Add New Education</button>
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



<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>


<script type="text/javascript">

	// $(".deleteNewEducations").on("click",function(){                
 //            alert('sdsds');
 //        });
   
        var scntDiv = $('.p_scents');
        var i = $('.p_scents .row').size() + 1;


			$(document).on('click', '.newEducation' ,function() {
			 
                var a =  $(".questionType").val();                  
                 
                if( a ==  1){

                $('<p><div class = "removesrow"> <div class="form-group removeenglish"> <label class="col-xl-2 col-lg-2 col-form-label"> Question (En)</label> <div class="col-lg-9 col-xl-9"> <input placeholder="Question in english " id="title_ar" name="question_en[]' + i +'" type="text" class="form-control  " value="" autofocus=""> </div></div> <div class="form-group removeAr"> <label class="col-xl-2 col-lg-2 col-form-label"> Question (Ar)</label> <div class="col-lg-9 col-xl-9"> <input placeholder="Question (Ar)" id="title_ar" name="question_ar[]' + i +'" type="text" class="form-control  " value="" autofocus=""> </div></div>  <div class="form-group row"> <label class="col-xl-2 col-lg-2 col-form-label"> Answer </label> <div class="col-lg-9 col-xl-9"> <input placeholder="Answer En(1)" id="answer_en" name="answer_en[]" type="text" class="form-control" value=""> <input placeholder="Answer Ar(1)" id="answer_ar" name="answer_ar[]" type="text" class="form-control" value=""> <input placeholder="Answer En(2)" id="answer_en" name="answer_en2[]" type="text" class="form-control" value="">  <input placeholder="Answer Ar(2)" id="answer_ar" name="answer_ar2[]" type="text" class="form-control" value=""> <input placeholder="Answer En(3)" id="answer_en" name="answer_en3[]" type="text" class="form-control" value=""> <input placeholder="Answer Ar(3)" id="answer_ar" name="answer_ar3[]" type="text" class="form-control" value=""> <input placeholder="Answer En(4)" id="answer_en" name="answer_en4[]" type="text" class="form-control" value="">  <input placeholder="Answer Ar(4)" id="answer_ar" name="answer_ar4[]" type="text" class="form-control" value=""> <input placeholder="Answer En(5)" id="answer_en" name="answer_en5[]" type="text" class="form-control" value=""> <input placeholder="Answer Ar(5)" id="answer_ar" name="answer_ar5[]" type="text" class="form-control" value=""> <input placeholder="Answer Ar(6)" id="answer_ar" name="answer_en6[]" type="text" class="form-control" value=""> <input placeholder="Answer Ar(6)" id="answer_ar" name="answer_ar6[]" type="text" class="form-control" value=""> </div></div>  <a href="javascript:void(0)" class="btn btn-danger deleteNewEducations" id ="remScnt"><i class="fa fa-trash"></i></a></p>').appendTo(scntDiv);
                i++;
                return false;
            } else if(a == 2 || a == 4 || a == 5 || a == 6){

                 $('<p><div class = "removesrow"> <div class="form-group removeenglish"> <label class="col-xl-2 col-lg-2 col-form-label"> Question (En)</label> <div class="col-lg-9 col-xl-9"> <input placeholder="Question in english " id="title_ar" name="question_en[]' + i +'" type="text" class="form-control  " value="" autofocus=""> </div></div> <div class="form-group removesrow"> <label class="col-xl-2 col-lg-2 col-form-label"> Question (Ar)</label> <div class="col-lg-9 col-xl-9"> <input placeholder="Question (Ar)" id="title_ar" name="question_ar[]' + i +'" type="text" class="form-control  " value="" autofocus=""> </div></div>   <a href="javascript:void(0)" class="btn btn-danger deleteNewEducations" id ="remScnt"><i class="fa fa-trash"></i></a></p>').appendTo(scntDiv);
            }else if(a == 3)
            {

            	$('<p><div class = "removesrow removeenglish"> <div class="form-group removeenglish"> <label class="col-xl-2 col-lg-2 col-form-label"> Question (En)</label> <div class="col-lg-9 col-xl-9"> <input placeholder="Question in english " id="title_ar" name="question_en[]' + i +'" type="text" class="form-control  " value="" autofocus=""> </div></div> <div class="form-group removesrow"> <label class="col-xl-2 col-lg-2 col-form-label"> Question (Ar)</label> <div class="col-lg-9 col-xl-9"> <input placeholder="Question (Ar)" id="title_ar" name="question_ar[]' + i +'" type="text" class="form-control  " value="" autofocus=""> </div></div> </div></div>  <a href="javascript:void(0)" class="btn btn-danger deleteNewEducations" id ="remScnt"><i class="fa fa-trash"></i></a></p>').appendTo(scntDiv);
            }
             
        
		});



		$(document).on('click', '.deleteNewEducations' ,function() {
		
			
			$(this).prev().last().remove()
			 $(this).remove();			
			 $(".removeenglish").last().remove();		 
			  $(".removeAr").last().remove();

	       
		
        });

        $(document).on('change', '.questionType', function(){  

             $(".deleteNewEducations").prev().last().remove()
			 $(".deleteNewEducations").remove();
			 $(".removesrow").last().remove();
			  $(".removeAr").last().remove();
        });




   
</script>
@stop
