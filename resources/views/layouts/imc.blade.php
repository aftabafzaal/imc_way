<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags  -->
	<meta charset="utf-8">
	<meta name="description" content="International Medical Center">
	<title>International Medical Center</title>
	<link rel="shortcut icon" href="assets_/images/favicon.ico" type="assets_/images/favicon.icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Hind|Lato|Montserrat|Open+Sans+Condensed:300|Poppins|Roboto&display=swap" rel="stylesheet">
	<!-- Bootstrap CSS -->
		    <!-- Styles -->
    <link href="{{ asset('assets_/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_/css/hamburgers.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_/css/hover.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_/css/owl.theme.default.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_/font/stylesheet.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
</head>

<body>
	@php
	$language = (Session::has("language"))?Session::get("language"):'en';
    @endphp
	<!-- wrapper start here-->
	<div class="wrapper">
		<div class="header-toprowin1">
			<div class="header-toprow bg-green pad-8">
				<div class="container">
					<!--this will check if the section is enabled-->
					<!--if($topmenu_section->is_enable =='1') -->

					<div class="row-flex">
						<ul class="left-ul">
							@if(!empty($topmenu_4)) <!--checks if the fourth topmenu item is empty -->
							@foreach($topmenu_4 as $topmenu_4_) <!--if not empty loop to get fourth value-->
							<li>
							 <a href="{{$topmenu_4_->link}}"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
							 	<span> {{($language == "en")?$topmenu_4_->title_en:$topmenu_4_->title_ar}}</span></a>
							</li>
						    @endforeach<!--end of fourth loop-->
						    @endif <!--End of empty check -->


						    @if(!empty ($topmenu_3))<!--checks if the third topmenu item is empty -->
						    @foreach($topmenu_3 as $topmenu_3_)<!--if not empty loop to get third value-->
							<li>
							 <a href="{{$topmenu_3_->link}}"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
							 	<span>{{($language == "en")?$topmenu_3_->title_en:$topmenu_3_->title_ar}}</span></a>
							</li>
						    @endforeach <!--end of third loop-->
						    @endif <!--End of empty check -->

						    @if(!empty ($topmenu_2 ))<!--checks if the second topmenu item is empty -->
						    @foreach($topmenu_2 as $topmenu_2_)<!--if not empty loop to get second value-->
							<li style="padding-right: 30px ">
								<a href="{{$topmenu_2_->link}}"><i class="fa fa-suitcase" aria-hidden="true"></i>
									<span>{{($language == "en")?$topmenu_2_->title_en:$topmenu_2_->title_ar}}</span></a>
							</li>
						    @endforeach<!--end of second loop-->
						    @endif <!--End of empty check -->

						    @if(!empty ($topmenu_1))<!--checks if the first topmenu item is empty -->
						    @foreach($topmenu_1 as $topmenu_1_)
							<li>
								<a href="{{$topmenu_1_->link}}"><i class="fa fa-book" aria-hidden="true"></i>
									<span> {{($language == "en")?$topmenu_1_->title_en:$topmenu_1_->title_ar}}</span></a>
							</li>
							@endforeach<!--end of first loop-->
							@endif<!--End of empty check -->

							@if(!empty ($topmenu_0))<!--checks if the first topmenu item is empty -->
						    @foreach($topmenu_0 as $topmenu_0_)
							<li>
								<a href="{{$topmenu_0_->link}}"><i class="fa fa-book" aria-hidden="true"></i>
									<span> {{($language == "en")?$topmenu_0_->title_en:$topmenu_0_->title_ar}}</span></a>
							</li>
							@endforeach<!--end of first loop-->
							@endif<!--End of empty check -->
						</ul>
						<ul class="form-inline header-social-icon right-ul">
							<!--tel number on topmenu right-->
							<li class="tel-seprater">
								<a href="tel:966 920027778"><i class="fa fa-phone" aria-hidden="true"></i><span>
										920027778</span></a>
							</li>
						</ul>
						<ul class="scroll-show-icon"> <!--this social icons shows on the topmenu right on scroll-->
							@if(!empty ($middlemenu_1)) <!--check if facebook data is set-->
							@foreach($middlemenu_1 as $middlemenu_1_) <!--if data loop to get fb data-->
							<li>
								<a href="{{$middlemenu_1_->link}}"><i class="fa fa-facebook" aria-hidden="true"></i>
								</a>
							</li>
							@endforeach<!--end of fb loop-->
							@endif <!--End of empty check-->
							@if(!empty ($middlemenu_2)) <!--check if twitter data is set-->
							@foreach($middlemenu_2 as $middlemenu_2_)<!--if data loop to get twitter data-->
							<li>
								<a href="{{$middlemenu_1_->link}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							</li>
							@endforeach<!--end of twitter loop-->
							@endif<!--End of empty check-->

							@if(!empty ($middlemenu_3)) <!--check if instagram data is set-->
							@foreach($middlemenu_3 as $middlemenu_3_)<!--if data loop to get instagram data-->
							<li>
								<a href="{{$middlemenu_3_->link}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							</li>
							@endforeach<!--end of instagram loop-->
							@endif<!--End of empty check-->

							@if(!empty ($middlemenu_4)) <!--check if linkedin data is set-->
							@foreach($middlemenu_4 as $middlemenu_4_)<!--if data loop to get linkedin data-->
							<li>
								<a href="{{$middlemenu_4_->link}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
							</li>
							@endforeach <!--end of linkedin loop-->
							@endif<!--End of empty check-->

							@if(!empty ($middlemenu_5))<!--check if youtube data is set-->
							@foreach($middlemenu_5 as $middlemenu_5_)<!--if data loop to get youtube data-->
							<li>
								<a href="{{$middlemenu_5_->link}}"><i class="fa fa-youtube" aria-hidden="true"></i></a>
							</li>
							@endforeach<!--end of youtube loop-->
							@endif<!--End of empty check-->
						</ul>
						<div class="select-header-lang">
						  <a href="#" >العربية</a>
						</div>
					</div>
					<!--endif-->

				</div>
			</div>

			<!-- header-toprow start here-->
			<div class="header-toprow">
				<div class="container">
					<div class="header-toprowin">
						<nav class="navbar navbar-expand-lg navbar-light">
							@if(!empty ($Settings)) <!--checks if settings data is set-->
							@foreach($Settings as $Settings_) <!--Setting data contain top logo data-->
							<a class="navbar-brand pr-5" href="{{route('home')}}">
								<img src="<?php echo url('/');?>/images/logo/<?php echo $Settings_->icon;?>">
							</a>
							@endforeach <!--end of Setting loop-->
							@endif <!--End of Setting check-->
							<div class="hamburger"  onclick="openNav()">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>
							</div>
							<div class="header-right">
								<div class="input-box">
								    <input class="search-box pl-5" placeholder="Search">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
								</div>
							 <!--This are the social Icons on left of search and icon-->
									@if(!empty ($middlemenu_1)) <!--check if facebook data is set-->
										<ul>
									@foreach($middlemenu_1 as $middlemenu_1_)<!--if data loop to get fb data-->
									<li>
										<a href="{{$middlemenu_1_->link}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
									</li>
									@endforeach <!--end of fb loop-->
									   </ul>
									@endif <!--End of empty check-->

									@if(!empty ($middlemenu_2)) <!--check if twitter data is set-->
									   <ul>
									@foreach($middlemenu_2 as $middlemenu_2_) <!--if data loop to get twitter data-->
									<li>
										<a href="{{$middlemenu_2_->link}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
									</li>
									@endforeach<!--end of twitter loop-->
									  </ul>
									@endif<!--End of empty check-->

									@if(!empty ($middlemenu_3)) <!--check if instagram data is set-->
									   <ul>
									@foreach($middlemenu_3 as $middlemenu_3_)<!--if data loop to get instagram data-->
									<li>
										<a href="{{$middlemenu_3_->link}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
									</li>
									@endforeach<!--end of instagram loop-->
									   </ul>
									@endif<!--End of empty check-->

									@if(!empty ($middlemenu_4)) <!--check if linkedin data is set-->
									@foreach($middlemenu_4 as $middlemenu_4_)<!--if data loop to get linkedin data-->
									<li>
										<a href="{{$middlemenu_4_->link}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
									</li>
									@endforeach<!--end of linkedin loop-->
									@endif<!--End of empty check-->



									@if(!empty ($middlemenu_5))<!--check if youtube data is set-->
									@foreach($middlemenu_5 as $middlemenu_5_)<!--if data loop to get youtube data-->
									<li>
										<a href="{{$middlemenu_5_->link}}"><i class="fa fa-youtube" aria-hidden="true"></i></a>
									</li>
									@endforeach<!--end of youtube loop-->
									@endif<!--End of empty check-->

							</div>


							<div class="row-flex">
								<ul class="left-ul">
									<li>
										<a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i><span> Patient
												Login</span></a>
									</li>
									<li>
										<a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i><span>
												Academy</span></a>
									</li>
									<li style="padding-right: 30px ">
										<a href="#"><i class="fa fa-suitcase" aria-hidden="true"></i><span>
												Careers</span></a>
									</li>
									<li>
										<a href="#"><i class="fa fa-book" aria-hidden="true"></i><span> Surveys</span></a>
									</li>
								</ul>
								<ul class="form-inline header-social-icon right-ul">

									<li class="tel-seprater">
										<a href="tel:966 920027778"><i class="fa fa-phone" aria-hidden="true"></i><span>
												920027778</span></a>
									</li>
								</ul>

								<div class="select-header-lang">
								  <a href="#">العربية</a>
								</div>
							</div>


						</nav>
					</div>

				</div>

			</div>
			<!-- header-toprow ends here-->

			<div class="menu-header">
				<div class="container">

					<nav class="navbar navbar-expand-lg navbar-light">
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto "> <!--this contains the main menu-->
								@if(!empty ($Mainmenu_1)) <!--Check if the first main menu has data-->
								@foreach($Mainmenu_1 as $Mainmenu_1_)
								<li class="nav-item">
									<a class="nav-link active" href="{{$Mainmenu_1_->link}}">
										{{($language == "en")?$Mainmenu_1_->title_en:$Mainmenu_1_->title_ar}}
									</a>
									<ul class="nav-submenu">
										<div class="row"> <!--this conatins the first main menu sub menu-->
											@if(!empty ($Mainmenu_1_sub)) <!--checks if first main menu sub menu has data-->
											@foreach($Mainmenu_1_sub as $Mainmenu_1_sub_)
											<div class="col-md-6">
												<li>
													<a href="{{$Mainmenu_1_sub_->link}}">
														<span>
															{{($language == "en")?$Mainmenu_1_sub_->title_en:$Mainmenu_1_sub_->title_ar}}
														</span>
													</a>
												</li>
											</div>
											@endforeach
											@endif <!--If no data on first main menu, sub menu then nothing shown-->
										</div>
									</ul>
								</li>
								@endforeach
								@endif<!--If no data on first main menu then sub menu is not shown for it-->


								@if(!empty ($Mainmenu_2)) <!--checks if second main menu has data-->
								@foreach($Mainmenu_2 as $Mainmenu_2_)
								<li class="nav-item ">
									<a class="nav-link " href="{{$Mainmenu_2_->link}}">
										{{($language == "en")?$Mainmenu_2_->title_en:$Mainmenu_2_->title_ar}}
									</a>
									<ul class="nav-submenu">
										<div class="row"><!--this conatins the second main menu sub menu-->
											@if(!empty ($Mainmenu_2_sub))<!--checks if second main menu sub menu has data-->
											@foreach($Mainmenu_2_sub as $Mainmenu_2_sub_)
											<div class="col-md-6">
												<li>
													<a href="{{$Mainmenu_2_sub_->link}}">
														<span>
															{{($language == "en")?$Mainmenu_2_sub_->title_en:$Mainmenu_2_sub_->title_ar}}
														</span>
													</a>
												</li>
											</div>
											@endforeach
											@endif<!--If no data on second main menu, sub menu then nothing shown-->
										</div>
									</ul>
								</li>
								@endforeach
								@endif<!--If no data on second main menu then sub menu is not shown for it-->

								@if(!empty ($Mainmenu_3))<!--checks if third main menu has data-->
								@foreach($Mainmenu_3 as $Mainmenu_3_)
								<li class="nav-item">
									<a class="nav-link" href="{{$Mainmenu_3_->link}}">
										{{($language == "en")?$Mainmenu_3_->title_en:$Mainmenu_3_->title_ar}}
									</a>
								</li>
								@endforeach <!--third main menu has no submenu-->
								@endif<!--If no data on third main menu then sub menu is not shown for it-->

								@if(!empty ($Mainmenu_4))<!--checks if the fouth menu has data-->
								@foreach($Mainmenu_4 as $Mainmenu_4_)
								<li class="nav-item">
									<a class="nav-link" href="{{$Mainmenu_4_->link}}">
										{{($language == "en")?$Mainmenu_4_->title_en:$Mainmenu_4_->title_ar}}
									</a>
								</li>
								@endforeach <!--fourth main menu has no submenu-->
								@endif <!--If no data on third main menu then sub menu is not shown for it-->

								@if(!empty ($Mainmenu_5))<!--checks if the fifth menu has data-->
								@foreach($Mainmenu_5 as $Mainmenu_5_)
								<li class="nav-item">
									<a class="nav-link" href="{{$Mainmenu_5_->link}}">{{$Mainmenu_5_->title_en}}</a>
									<ul class="nav-submenu"> <!--this contains the fifth menu sub menu-->
										@if(!empty ($Mainmenu_5_sub))<!--checks if second main menu sub menu has data-->
										@foreach($Mainmenu_5_sub as $Mainmenu_5_sub_)
										<li>
											<a href="{{$Mainmenu_5_sub_->link}}">
												<span>
													{{($language == "en")?$Mainmenu_5_sub_->title_en:$Mainmenu_5_sub_->title_ar}}
												</span>
											</a>
										</li>
										<!-- <div class="menu-img"><img src="assets/images/Pic6.jpg"></div> -->
										@endforeach
										@endif <!--If no data on second main menu, sub menu then nothing shown-->
									</ul>
								</li>
								@endforeach
								@endif<!--If no data on fifth main menu then sub menu is not shown for it-->
								@if(!empty ($Mainmenu_6))<!--checks if the six menu has data-->
								@foreach($Mainmenu_6 as $Mainmenu_6_)
								<li class="nav-item">
									<a class="nav-link" href="{{$Mainmenu_6_->link}}">
										{{($language == "en")?$Mainmenu_6_->title_en:$Mainmenu_6_->title_ar}}
									</a>
								</li>
								@endforeach<!--six main menu has no submenu-->
								@endif<!--If no data on six main menu then sub menu is not shown for it-->

							</ul>
						</div>
					</nav>

				</div>
			</div>
		</div>
		<!--header ends here-->

		<!--sidebar offcanvas start here-->
		<div id="mySidenav" class="sidenav">
			<ul class="accordion" id="accordionExample">
				<li class="sidemenu">
					<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				</li>
				<li class="sidemenu" id="sidemenu1">
					<a data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						<span>About</span>
						<i class="fa fa-caret-down" aria-hidden="true"></i>
					</a>

				</li>
				<div id="collapseOne" class="collapse sidemenu-submenu" aria-labelledby="sidemenu1" data-parent="#accordionExample">
					<ul>
						<li>
							<a href="mission-and-vision.html">
								<span>Overview, Mission &amp; Vision</span>
							</a>
						</li>
						<li>
							<a href="history-and-milestones.html">
								<span>History &amp; Milestone</span>
							</a>
						</li>
						<li>
							<a href="awards-and-accreditations.html">
								<span>Awards &amp; Accreditations</span>
							</a>
						</li>
						<li>
							<a href="leadership-message.html">
								<span>Leadership Message</span>
							</a>
						</li>
						<li>
							<a href="meet-farmer.html">
								<span>The Leadership</span>
							</a>
						</li>
						<li>
							<a href="medical-services.html">
								<span>Our Services</span>
							</a>
						</li>
					</ul>
				</div>
				<li class="sidemenu" id="sidemenu2">
					<a data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
						<span>Patient & visitors</span>
						<i class="fa fa-caret-down" aria-hidden="true"></i>
					</a>
				</li>
				<div id="collapse2" class="collapse sidemenu-submenu" aria-labelledby="sidemenu2" data-parent="#accordionExample">
					<ul>
						<li>
							<a href="Appointment-Admission.html">
								<span>Appointment &amp; Admission</span>
							</a>
						</li>
						<li>
							<a href="staying-imc.html">
								<span>Staying at IMC</span>
							</a>
						</li>
						<li>
							<a href="patient-right.html">
								<span>Patients Rights</span>
							</a>
						</li>
						<li>
							<a href="Location.html">
								<span>Location</span>
							</a>
						</li>
						<li>
							<a href="Benefites-fecilities.html">
								<span>Benefits &amp; Facilities</span>
							</a>
						</li>
						<li>
							<a href="visitors.html">
								<span>Visitors</span>
							</a>
						</li>
						<li>
							<a href="form.html">
								<span>Book an Appointment</span>
							</a>
						</li>
						<li>
							<a href="testimonials.html">
								<span>Testimonials</span>
							</a>
						</li>
						<li>
							<a href="Patients-Education-Library.html">
								<span>Patients Education Library</span>
							</a>
						</li>
					</ul>
				</div>
				<li class="sidemenu">
					<a href="find-doctors.html">Find Doctor</a>
				</li>
				<li class="sidemenu">
					<a href="departments.html">Departments</a>
				</li>
				<li class="sidemenu" id="sidemenu3">
					<a data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">			<span>Community</span>
						<i class="fa fa-caret-down" aria-hidden="true"></i>
					</a>
				</li>
				<div id="collapse3" class="collapse sidemenu-submenu" aria-labelledby="sidemenu3" data-parent="#accordionExample">
					<ul>
						<li>
							<a href="news-article.html">
								<span>News &amp; Articles</span>
							</a>
						</li>
						<li>
							<a href="">
								<span>Events</span>
							</a>
						</li>
					</ul>
				</div>
				<li class="sidemenu">
					<a href="Health-Tips.html">health tips</a>
				</li>
			</ul>
		</div>
		<!--sidebar offcanvas ends here-->
 @yield('content')
		<!-- footer start here-->
		<footer class="footer-block wow fadeInUp">
			<div class="footer-in">
				<div class="container">
					<div class="row">

						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="footerin ist-sec">
								@if(!empty ($footermenu_1))<!--Check if Footer1menu heading has data-->
								@foreach($footermenu_1 as $footermenu_1_)
								<div class="footer-title" id="Footer1">
									<h5>{{($language == "en")?$footermenu_1_->title_en:$footermenu_1_->title_ar}}</h5>
								</div>
								@endforeach
								<ul> <!--This is not shown if no heading for Footer1 menu-->
									@if(!@empty ($footermenu_1_sub))<!--check for submenu 1 footer data-->
									@foreach($footermenu_1_sub as $footermenu_1_sub_)
									<li><a href="{{$footermenu_1_sub_->link}}">
										{{($language == "en")?$footermenu_1_sub_->title_en:$footermenu_1_sub_->title_en}}
									</a></li>
									@endforeach
									@elseif (empty($footermenu_1_sub))
										<script type="text/javascript">
										document.getElementById('#Footer1').style.display='none';
										</script>
									@endif
								</ul>
								@elseif (empty($footermenu_1))
								<div class="footer-title" style="display:none">
								</div>
								@else
								<div class="footer-title" style="display:none">
								</div>
								@endif
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="footerin 2nd-sec">
								@if(!empty ($footermenu_2))<!--Check if Footer2menu heading has data-->
								@foreach($footermenu_2  as $footermenu_2_)
								<div class="footer-title" id="Footer2">
									<h5>
										{{($language == "en")?$footermenu_2_->title_en:$footermenu_2_->title_ar}}
									</h5>
								</div>
								@endforeach
								<ul><!--This is not shown if no heading for Footer2 menu-->
									@if(!empty ($footermenu_2_sub))<!--check for submenu 2 footer data-->
									@foreach($footermenu_2_sub as $footermenu_2_sub_)
									<li><a href="{{$footermenu_2_sub_->link}}">
										{{($language == "en")?$footermenu_2_sub_->title_en:$footermenu_2_sub_->title_ar}}
									</a></li>
									@endforeach
									@elseif(empty ($footermenu_2_sub))
										<script type="text/javascript">
										document.getElementById('#Footer2').style.display='none';
										</script>
									@endif
								</ul>
								@elseif(@empty ($footermenu_2))
								<div class="footer-title">
									<h5></h5>
								</div>
								@endif<!--End of Footer2menu heading check if has data-->


							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="footerin 4th-sec">
								@if(!empty ($footermenu_3))<!--Check if Footer3menu heading has data-->
								@foreach($footermenu_3  as $footermenu_3_)
								<div class="footer-title">
									<h5>
										{{($language == "en")?$footermenu_3_->title_en:$footermenu_3_->title_ar}}
									</h5>
								</div>
								@endforeach

								<ul>
								@foreach($footermenu_3_sub as $footermenu_3_sub_)
								<li><a href="{{$footermenu_3_sub_->link}}">
									{{($language == "en")?$footermenu_3_sub_->title_en:$footermenu_3_sub_->title_ar}}
								</a></li>
								@endforeach
								</ul>
								@endif
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="footerin ist-sec">
								@foreach($footerContact as $footerContact_)
								<div class="footer-title">
									<h5>
										{{($language == "en")?$footerContact_->main_title_en:$footerContact_->main_title_ar}}
									</h5>
								</div>
								<ul class="get">
									<li>
										<i class="fa fa-phone" aria-hidden="true"></i>
										<a href="tel:+ 920027778">{{$footerContact_->phone}}</a>
									</li>
									<li>
										<i class="fa fa-envelope" aria-hidden="true"></i>
										<a href="#">{{$footerContact_->email}}</a>
									</li>
									<li>
										<i class="fa fa-map-marker" aria-hidden="true"></i>
										<a href="#"><span>{{$footerContact_->address}}</span> {{$footerContact_->address}}</span></a>
									</li>
									<li>
										<i class="fa fa-clock-o" aria-hidden="true"></i>
										<a href="#"><span>{{$footerContact_->time}}</span> {{$footerContact_->time}}</a>
									</li>
								</ul>
								@endforeach
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="foot-bottom-row">
				<div class="container">
					<div class="foot-bottomin">
						<ul>
							<?php
							use App\Helpers;
							$helper = new Helpers();
							 $getfooterlinks =$helper->getfooterlinks();
							 ?>
							 @if(!empty ($getfooterlinks))
							 @foreach($getfooterlinks as $getfooterlinks_)
							 <li ><a href="<?php  echo url('/')."/".$getfooterlinks_->slug?>">
							 {{($language == "en")?$getfooterlinks_->name_en:$getfooterlinks_->name_ar}}</a>
					   	 </li>
							 @endforeach
							 @endif

						</ul>
						@if(!empty ($Bootomfooter))
						@foreach($Bootomfooter as $Bootomfooter_)
						<p class="m-0">{{($language == "en")?$Bootomfooter_->copyright_en:$Bootomfooter_->copyright_ar}}</p>
						@endforeach
						@endif
					</div>
				</div>
			</div>
			<a id="button"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
		</footer>
		<!-- footer ends here-->
		<!-- modals start here-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/81bh7W2hs98" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
		<!-- modals ends here-->
	</div>
	<!-- wrapper ends here-->
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/owl.carousel.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="assets/js/wow.js"></script>
	<script src="assets/js/jquery.hislide.js"></script>
	<script>
		$('.slide').hiSlide();
	</script>
	<script>
		new WOW().init();
	</script>
	<script>
		$(document).ready(function () {
			var owl = $('.owl-carousel');
			owl.owlCarousel({
				items: 1,
				loop: true,
				nav: false,
				dots: true,
				fluidSpeed:true,
				autoplayTimeout: 5000,
				autoplay: true
			});
		})
		$(".owl-carousel2new").owlCarousel({
			autoplay: false,
			loop: true,
			items: 2,
			nav: false,
			autoplayHoverPause: true,
			responsive:{
				0:{
					items:1,
				},
				600:{
					items:1,
					nav:false
				},
				991:{
					items:2,
				}
			}
		});
		$(".owl-carousel2").owlCarousel({
			autoplay: false,
			loop: true,
			items: 4,
			nav: false,
			autoplayHoverPause: true,
			animateOut: 'slideOutUp',
			animateIn: 'slideInUp'
		});
		$(".owl-carousel-services").owlCarousel({
			autoplay: true,
			loop: true,
			items: 5,
			nav: false,
			dots: true,
			autoplayHoverPause: true,
			animateOut: 'slideOutUp',
			animateIn: 'slideInUp'
		});
		$(".owl-carousel3").owlCarousel({
			autoplay: true,
			loop: true,
			items: 2,
			nav: false,
			autoplayHoverPause: true
		});



	</script>
</body>
</html>
