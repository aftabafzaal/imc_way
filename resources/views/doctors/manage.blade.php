@extends('layouts.app')
@section('title', 'Add Doctor')
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
         Add Doctor
      </h3>
      <span class="kt-subheader__separator kt-subheader__separator--v"></span>
	  <div class="kt-subheader__breadcrumbs">
			<span class="kt-subheader__breadcrumbs-separator"></span>
			<a href="{{url('admin/doctors')}}" class="kt-subheader__breadcrumbs-link">
				Doctor 
			</a>
			<span class="kt-subheader__breadcrumbs-separator"></span>
			Add Doctor			
		</div>
   </div>
   <div class="kt-subheader__toolbar">
      <a href="{{url('admin/doctors')}}" class="btn btn-default btn-bold">
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
		<form class="kt-form" id="addDoctorForm" action="#" method="POST" enctype="multipart/form-data" style="width:100%">
		@csrf
		<div class="kt-portlet__body" style="width:100%">
			<ul class="nav nav-tabs nav-fill" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#kt_tabs_1_1">Basic</a>
				</li>
				<!-- <li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_tabs_1_2">Education</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_tabs_1_3">Experience</a>
				</li> -->	
			</ul> 
			<div class="tab-content">
				<div class="tab-pane active" id="kt_tabs_1_1" role="tabpanel">
					<div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
						<div class="kt-heading kt-heading--md">Add Doctor :</div>
						<div class="kt-section kt-section--first">
							<div class="kt-wizard-v4__form">
								<div class="row">
									<div class="col-xl-12">
										<div class="kt-section__body">
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Doctor Code</label>
												<div class="col-lg-8 col-xl-8">
													<input placeholder="Doctor code" id="docCode" name="docCode" type="text" class="form-control" required autofocus>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Title</label>
												<div class="col-lg-1 col-xl-1">
													<input placeholder="DR" id="title" name="title" type="text" class="form-control" required >
												</div>
											</div>									
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Name</label>
												<div class="col-lg-4 col-xl-4">
													<input placeholder="Name in english " id="givenName" name="givenName" type="text" class="form-control" >	
												</div>
												<div class="col-lg-4 col-xl-4">
													<input placeholder="Name in arabic " id="givenNameAr" name="givenNameAr" type="text" class="form-control">
												</div>
											</div>	
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label">Father Name</label>
												<div class="col-lg-4 col-xl-4">
													<input placeholder="Father Name in english " id="fathersName" name="fathersName" type="text" class="form-control" >	
												</div>
												<div class="col-lg-4 col-xl-4">
													<input placeholder="Father Name in arabic " id="fathersNameAr" name="fathersNameAr" type="text" class="form-control">
												</div>
											</div>									
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label">Family Name</label>
												<div class="col-lg-4 col-xl-4">
													<input placeholder="Family Name in english " id="familyName" name="familyName" type="text" class="form-control" >	
												</div>
												<div class="col-lg-4 col-xl-4">
													<input placeholder="Family Name in arabic " id="familyNameAr" name="familyNameAr" type="text" class="form-control">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label">Title Description</label>
												<div class="col-lg-4 col-xl-4">
													<textarea placeholder="Description in english " id="titleDesc" name="titleDesc" type="text" class="form-control" ></textarea>	
												</div>
												<div class="col-lg-4 col-xl-4">
													<textarea placeholder="Description in arabic " id="titleDescAr" name="titleDescAr" type="text" class="form-control"></textarea>
												</div>
											</div>		
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label">Department</label>
												<input type="hidden" id="department" name="department" value="1">
												<input type="hidden" id="departmentAr" name="departmentAr" value="1">
												<div class="col-lg-8 col-xl-8">
													<select id="deptCode" name="deptCode"  class="form-control">
																
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label">Category</label>
												<div class="col-lg-8 col-xl-8">
													<select id="category" name="category"  class="form-control">
														<option value="">Select category </option>
														<option value="1">Registrar</option>
														<option value="2">Eye Center / Consultant</option>
														<option value="3">OB/Gyne</option>												
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label">Gender</label>
												<div class="col-lg-8 col-xl-8">
													<select id="gender" name="gender"  class="form-control">
														<option value="M">Male</option>
														<option value="F">Female</option>
														<option value="O">Others</option>												
													</select>
												</div>
											</div>							
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Specialist(En)</label>
												<div class="col-lg-8 col-xl-8">
													<input placeholder="Specialist in english " id="specialitiesTxt" name="specialitiesTxt" type="text" class="form-control">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Specialist(Ar)</label>
												<div class="col-lg-8 col-xl-8">
													<input placeholder="Specialist in arabic " id="specialitiesTxtAr" name="specialitiesTxtAr" type="text" class="form-control">
												</div>
											</div>																		
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Education(En)</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="educationTxt" name="educationTxt" placeholder="Education in english"  class="form-control"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Education(Ar)</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="educationTxtAr" name="educationTxtAr" placeholder="Education in arabic"  class="form-control"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Affilations(En)</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="affilationsTxt" name="affilationsTxt" placeholder="Affilations in english"  class="form-control"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Affilations(Ar)</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="affilationsTxtAr" name="affilationsTxtAr" placeholder="Affilations in arabic" class="form-control"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Research(En)</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="researchTxt" name="researchTxt" placeholder="Research in english"  class="form-control"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Research(Ar)</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="researchTxtAr" name="researchTxtAr" placeholder="Research in arabic" class="form-control"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Publications</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="publications" name="publications" placeholder="Publications" class="form-control"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Achievements & Career Highlights</label>
												<div class="col-lg-8 col-xl-8">
													<textarea id="a_c_highlights" name="a_c_highlights" placeholder="Achievements & Career Highlights" class="form-control"></textarea>
												</div>
											</div>
											<div class="form-group row">
												<input type="hidden" name="languagesTxtAr" value=""/>
												<label class="col-xl-2 col-lg-2 col-form-label">Languages</label>
												<div class="col-lg-8 col-xl-8">
													<select id="languages" name="languages[]"  class="form-control" multiple>
														
													</select>
												</div>
											</div>	
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Doctor Rating</label>
												<div class="col-lg-8 col-xl-8">
													<input placeholder="Doctor rating" id="docRating" name="docRating" type="text" class="form-control" required autofocus>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Doctor Total Experience</label>
												<div class="col-lg-8 col-xl-8">
													<input placeholder="Doctor experiency in years" id="expYears" name="expYears" type="text" class="form-control" required autofocus>
												</div>
											</div>								
											<div class="form-group row">
												<label class="col-xl-2 col-lg-2 col-form-label"> Image</label>
												<div class="col-lg-8 col-xl-8">											
													<input placeholder="Upload Image" id="imgUrl" name="imgUrl" type="text" class="form-control" value="" readonly>											
												</div>
												<div class="col-lg-1 col-xl-1">
														<button type="button" class="btn btn-bold btn-label-brand btn-sm mediaModel" data-toggle="modal" data-target="#media-model" data-control="imgUrl">Browse</button>
												</div>																				
											</div>
											<div class="educations">
												<div class="row" style="margin-bottom:10px">
													<input type="hidden"  name="education[0][id]" value="">
													<input type="hidden" class="docCode" name="education[0][docCode]" value="">
													<div class="col-md-1">
														<input class="form-control fromDate" name="education[0][fromDate]" placeholder="From Date">
													</div>			
													<div class="col-md-1">
														<input class="form-control toDate" name="education[0][toDate]" placeholder="To Date">
													</div>
													<div class="col-md-1 customTitle">
														<input class="form-control title" name="education[0][title]" placeholder="Title English">
													</div>
													<div class="col-md-1 customTitle">
														<input class="form-control titleAr" name="education[0][titleAr]" placeholder="Title Arabic">
													</div>
													<div class="col-md-1 customTitle">
														<input class="form-control title2" name="education[0][title2]" placeholder="Title2 English">
													</div>
													<div class="col-md-1 customTitle">
														<input class="form-control titleAr2" name="education[0][titleAr2]" placeholder="Title2 Arabic">
													</div>
													<div class="col-md-1 customTitle">
														<input class="form-control subTitle" name="education[0][subTitle]" placeholder="Subtitle English">
													</div>
													<div class="col-md-1 customTitle">
														<input class="form-control subTitleAr" name="education[0][subTitleAr]" placeholder="SubTitle Arabic">
													</div>
													<div class="col-md-1 check">
														<label>Residency</label>
														<input type="checkbox" class="isResidency" name="education[0][isResidency]" value="1">
													</div>							
												</div>																
											</div>

											<div class="experiences">
												<input type="hidden"  name="experience[0][id]" value="">
												<input type="hidden"  class="docCode" name="experience[0][docCode]" value="">
												<div class="row" style="margin-bottom:10px">
													<div class="col-md-1">
														<input class="form-control fromDate" name="experience[0][fromDate]" placeholder="From Date">
													</div>			
													<div class="col-md-1">
														<input class="form-control toDate" name="experience[0][toDate]" placeholder="To Date">
													</div>
													<div class="col-md-1 customTitle">
														<input class="form-control title" name="experience[0][title]" placeholder="Title English">
													</div>
													<div class="col-md-1 customTitle">
														<input class="form-control titleAr" name="experience[0][titleAr]" placeholder="Title Arabic">
													</div>
													<div class="col-md-1 customTitle">
														<input class="form-control title2" name="experience[0][title2]" placeholder="Title2 English">
													</div>
													<div class="col-md-1 customTitle">
														<input class="form-control titleAr2" name="experience[0][titleAr2]" placeholder="Title2 Arabic">
													</div>
													<div class="col-md-1 customTitle">
														<input class="form-control subTitle" name="experience[0][subTitle]" placeholder="Subtitle English">
													</div>
													<div class="col-md-1 customTitle">
														<input class="form-control subTitleAr" name="experience[0][subTitleAr]" placeholder="SubTitle Arabic">
													</div>													
												</div>																
											</div>

											<input type="hidden" name="isactive" value="1"/>									
											<input type="hidden" name="dispOnPortal" value="1"/>									
											<input type="hidden" name="dispOnWeb" value="1"/>									
											<input type="hidden" name="certificate" value="-"/>									
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
				<div class="tab-pane" id="kt_tabs_1_2" role="tabpanel">
					<div class="row" style="margin-bottom:15px" >							
						<div class="col-sm-4">
							<button class="btn btn-warning newEducation" type="button">Add New Education</button>
						</div>
					</div>
					<!-- <div class="educations">
						<div class="row" style="margin-bottom:10px">
							<input type="hidden"  name="education[0][id]" value="">
							<input type="hidden" class="docCode" name="education[0][docCode]" value="">
							<div class="col-md-1">
								<input class="form-control fromDate" name="education[0][fromDate]" placeholder="From Date">
							</div>			
							<div class="col-md-1">
								<input class="form-control toDate" name="education[0][toDate]" placeholder="To Date">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control title" name="education[0][title]" placeholder="Title English">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control titleAr" name="education[0][titleAr]" placeholder="Title Arabic">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control title2" name="education[0][title2]" placeholder="Title2 English">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control titleAr2" name="education[0][titleAr2]" placeholder="Title2 Arabic">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control subTitle" name="education[0][subTitle]" placeholder="Subtitle English">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control subTitleAr" name="education[0][subTitleAr]" placeholder="SubTitle Arabic">
							</div>
							<div class="col-md-1 check">
								<label>Residency</label>
								<input type="checkbox" class="isResidency" name="education[0][isResidency]" value="1">
							</div>							
						</div>																
					</div> -->
				</div>
				<div class="tab-pane" id="kt_tabs_1_3" role="tabpanel">
					<div class="row" style="margin-bottom:15px" >							
						<div class="col-sm-4">
							<button class="btn btn-warning newExperience" type="button">Add New Experience</button>
						</div>
					</div>
					<!-- <div class="experiences">
						<input type="hidden"  name="experience[0][id]" value="">
						<input type="hidden"  class="docCode" name="experience[0][docCode]" value="">
						<div class="row" style="margin-bottom:10px">
							<div class="col-md-1">
								<input class="form-control fromDate" name="experience[0][fromDate]" placeholder="From Date">
							</div>			
							<div class="col-md-1">
								<input class="form-control toDate" name="experience[0][toDate]" placeholder="To Date">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control title" name="experience[0][title]" placeholder="Title English">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control titleAr" name="experience[0][titleAr]" placeholder="Title Arabic">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control title2" name="experience[0][title2]" placeholder="Title2 English">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control titleAr2" name="experience[0][titleAr2]" placeholder="Title2 Arabic">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control subTitle" name="experience[0][subTitle]" placeholder="Subtitle English">
							</div>
							<div class="col-md-1 customTitle">
								<input class="form-control subTitleAr" name="experience[0][subTitleAr]" placeholder="SubTitle Arabic">
							</div>													
						</div>																
					</div> -->
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
	<div class="education" style="display:none">
		<div class="row" style="margin-bottom:10px">
			<input type="hidden" class="id"  name="" value="">
			<input type="hidden" class="docCode" name="" value="">
			<div class="col-md-1">
				<input class="form-control fromDate" name="" placeholder="From Date">
			</div>			
			<div class="col-md-1">
				<input class="form-control toDate" name="" placeholder="To Date">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control title" name="" placeholder="Title English">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control titleAr" name="" placeholder="Title Arabic">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control title2" name="" placeholder="Title2 English">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control titleAr2" name="" placeholder="Title2 Arabic">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control subTitle" name="" placeholder="Subtitle English">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control subTitleAr" name="" placeholder="SubTitle Arabic">
			</div>
			<div class="col-md-1 check">
				<label>Residency</label>
				<input type="checkbox" class="isResidency" name="" value="1">
			</div>
			<div class="col-md-1 check">
				<a class="btn btn-danger deleteNewEducations" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
			</div>
		</div>		
	</div>
	<div class="experience" style="display:none">
		<div class="row" style="margin-bottom:10px">
			<input type="hidden" class="id"  name="" value="">
			<input type="hidden" class="docCode" name="" value="">
			<div class="col-md-1">
				<input class="form-control fromDate" name="" placeholder="From Date">
			</div>			
			<div class="col-md-1">
				<input class="form-control toDate" name="" placeholder="To Date">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control title" name="" placeholder="Title English">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control titleAr" name="" placeholder="Title Arabic">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control title2" name="" placeholder="Title2 English">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control titleAr2" name="" placeholder="Title2 Arabic">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control subTitle" name="" placeholder="Subtitle English">
			</div>
			<div class="col-md-1 customTitle">
				<input class="form-control subTitleAr" name="" placeholder="SubTitle Arabic">
			</div>	
			<div class="col-md-1 check">
				<a class="btn btn-danger deleteNewExperience" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
			</div>												
		</div>		
	</div>
</div>
</div>
</div>
</div>
</div>
@stop
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		
		getLanguages();
		getDepartment();

		$(".newEducation").on("click",function(){
			var count = $(".educations .row").length;
			var education	= $(".education .row").clone();			
			education.find(".id").attr("name","education["+count+"][id]");
			education.find(".docCode").attr("name","education["+count+"][docCode]");
			education.find(".fromDate").attr("name","education["+count+"][fromDate]");
			education.find(".toDate").attr("name","education["+count+"][toDate]");
			education.find(".title").attr("name","education["+count+"][title]");
			education.find(".titleAr").attr("name","education["+count+"][titleAr]");
			education.find(".title2").attr("name","education["+count+"][title2]");
			education.find(".title2Ar").attr("name","education["+count+"][title2Ar]");
			education.find(".subTitle").attr("name","education["+count+"][subTitle]");
			education.find(".subTitleAr").attr("name","education["+count+"][subTitleAr]");
			education.find(".isResidency").attr("name","education["+count+"][isResidency]");
			$(".educations").append(education);
		});

		$(".newExperience").on("click",function(){
			var count = $(".experience .row").length;
			var experience	= $(".experience .row").clone();			
			experience.find(".id").attr("name","experience["+count+"][id]");
			experience.find(".docCode").attr("name","experience["+count+"][docCode]");
			experience.find(".fromDate").attr("name","experience["+count+"][fromDate]");
			experience.find(".toDate").attr("name","experience["+count+"][toDate]");
			experience.find(".title").attr("name","experience["+count+"][title]");
			experience.find(".titleAr").attr("name","experience["+count+"][titleAr]");
			experience.find(".title2").attr("name","experience["+count+"][title2]");
			experience.find(".title2Ar").attr("name","experience["+count+"][title2Ar]");
			experience.find(".subTitle").attr("name","experience["+count+"][subTitle]");
			experience.find(".subTitleAr").attr("name","experience["+count+"][subTitleAr]");
			experience.find(".isResidency").attr("name","experience["+count+"][isResidency]");
			$(".experiences").append(experience);
		});

		$(document).on("click",".deleteNewEducations",function(){
			$(this).closest(".row").remove();			
		});

		$(document).on("click",".deleteNewExperience",function(){
			$(this).closest(".row").remove();			
		});

		$(document).on("change","#deptCode",function(){	
			var dept = $("#deptCode option:selected").text();
			var deptAr = $("#deptCode option:selected").data("arabic");
			$("#department").val(dept);		
			$("#departmentAr").val(deptAr);		
		});

		$(document).on("submit","#addDoctorForm",function(e){
			e.preventDefault();	

			// Need to update docCode in Education and experience data.
			$(".docCode").val($("#docCode").val());

			$.ajax({
				url:"{{url('/admin/doctors/convertData')}}",
				type:"POST",
				data:$(this).serialize(),				
				success:function(response){
					console.log(response);
					$.ajax({
						url:"http://192.168.1.49:8080/imc_portal/web/add-doc",
						type:"POST",
						data:response,
						headers: {"Content-Type": "application/json","Authorization":"Bearer imc_123_789_***_###"},
						success:function(responseData){
							console.log(responseData);
							alert(responseData.message);
							window.location.href = "{{url('/admin/doctors')}}";
						}		
					});
				}		
			});			
			return false;
		});

		function getLanguages(){

			$.ajax({
				url:"http://192.168.1.49:8080/imc_portal/web/fetchlanguages",
				type:"GET",
				headers: {"Content-Type": "application/json","Authorization":"Bearer imc_123_789_***_###"},
				success:function(response){
					$("#languages").html("");
					$.each(response.languages,function(index,language){
						$("#languages").append("<option value='"+language.descEn.substr(0,2).toUpperCase()+"'>"+language.descEn+"</option>");
					});					
				}		
			});
		}	

		function getDepartment(){

			$.ajax({
				url:"http://192.168.1.49:8080/imc_portal/web/find-depts",
				type:"POST",
				data:JSON.stringify({"search_txt":"","item_count":"100","page":"0"}),
				headers: {"Content-Type": "application/json","Authorization":"Bearer imc_123_789_***_###"},
				success:function(response){
					$("#deptCode").html("<option value=''>Select Department</option>");
					$.each(response.data,function(index,department){
						$("#deptCode").append("<option data-arabic='"+department.descAr+"' value='"+department.id+"'>"+department.descEn+"</option>");
					});					
				}		
			});
		}	
				
	});
</script>
@stop
