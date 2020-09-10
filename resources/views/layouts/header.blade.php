<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

	<!-- begin:: Header Menu -->
	<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
	<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
		<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
			<ul class="kt-menu__nav ">

			</ul>
		</div>
	</div>

	<!-- end:: Header Menu -->

	<!-- begin:: Header Topbar -->
	<div class="kt-header__topbar">

		<!--begin: Notifications -->
		<div class="kt-header__topbar-item dropdown">

			<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-lg">

			</div>
		</div>

		<!--end: Notifications -->

		<!--begin: Quick Actions -->

		<!--end: Quick Actions -->

		<!--begin: My Cart -->

		<!--end: My Cart -->

		<!--begin: Quick panel toggler -->

		<!--end: Quick panel toggler -->

		<!--begin: Language bar -->
		<div class="kt-header__topbar-item kt-header__topbar-item--langs">
			<!-- <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
				<span class="kt-header__topbar-icon">
					<img class="" src=" {{ asset('assets/media/flags/020-flag.svg') }}" alt="" />
				</span>
			</div>
			<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
				<ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
					<li class="kt-nav__item kt-nav__item--active">
						<a href="#" class="kt-nav__link">
							<span class="kt-nav__link-icon"><img src=" {{ asset('assets/media/flags/020-flag.svg') }} " alt="" /></span>
							<span class="kt-nav__link-text">English</span>
						</a>
					</li>
					<li class="kt-nav__item">
						<a href="#" class="kt-nav__link">
							<span class="kt-nav__link-icon"><img src="{{ asset('assets/media/flags/016-spain.svg') }}" alt="" /></span>
							<span class="kt-nav__link-text">Spanish</span>
						</a>
					</li>
				</ul>
			</div> -->
		</div>

		<!--end: Language bar -->

		<!--begin: User Bar -->
		<div class="kt-header__topbar-item kt-header__topbar-item--user">
			<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
				<div class="kt-header__topbar-user">
					<span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
					<span class="kt-header__topbar-username kt-hidden-mobile">{{ucfirst(substr(Auth::user()->name, 0, 5))}}</span>
					<!-- <img class="kt-hidden" alt="Pic" src="./assets/media/users/300_25.jpg" /> -->

					<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
					<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">{{ucfirst(substr(Auth::user()->name, 0, 1))}}</span>
				</div>
			</div>
			<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

				<!--begin: Head -->
				<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url({{ URL::asset('/assets/media/misc/bg-1.jpg')}})">
					<div class="kt-user-card__avatar">
						<img class="kt-hidden" alt="Pic" src="{{asset('/asset/media/users/300_25.jpg')}}"  />

						<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
						<span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">{{ucfirst(substr(Auth::user()->name, 0, 1))}}</span>
					</div>
					<div class="kt-user-card__name">
					{{ucfirst(Auth::user()->name)}}
					</div>
				</div>

				<!--end: Head -->

				<!--begin: Navigation -->
				<div class="kt-notification">
					<a class="kt-notification__item" href="{{url('users/change-profile')}}">
						<div class="kt-notification__item-icon">
							<i class="flaticon2-calendar-3 kt-font-success"></i>
						</div>
						<div class="kt-notification__item-details">
							<div class="kt-notification__item-title kt-font-bold">
								Edit Profile
							</div>
						</div>
					</a>

					<a class="kt-notification__item" href="{{url('users/change-password')}}">
						<div class="kt-notification__item-icon">
							<i class="flaticon2-gear"></i>
						</div>
						<div class="kt-notification__item-details">
							<div class="kt-notification__item-title kt-font-bold">
								Change password
							</div>
						</div>
					</a>
					<div class="kt-notification__custom kt-space-between">
					<a href="{{ url('users/logout') }}" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
						<form id="logout-form" action="{{ url('users/logout') }}" method="POST" style="display: none;">
												@csrf
											</form>
					</div>
				</div>

				<!--end: Navigation -->
			</div>
		</div>

		<!--end: User Bar -->
	</div>

	<!-- end:: Header Topbar -->
</div>
