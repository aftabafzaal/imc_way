<!DOCTYPE html>

<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 7
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

    <!-- begin::Head -->
    <head>

        <!--begin::Base Path (base relative path for assets of this page) -->
        <base href="../../../../">

        <!--end::Base Path -->
        <meta charset="utf-8" />
        <title> @yield('title') - {{ config('variable.SITE_NAME') }}</title>
        <meta name="description" content="User datatable listing">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--begin::Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
WebFont.load({
google: {
"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
},
active: function () {
sessionStorage.fonts = true;
}
});
        </script>

        <!--end::Fonts -->

        <!--begin:: Global Mandatory Vendors -->

        <link href="{{ asset('assets/vendors/general/tether/dist/css/tether.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/nouislider/distribute/nouislider.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/summernote/dist/summernote.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/animate.css/animate.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/socicon/css/socicon.css') }}/" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/custom/vendors/line-awesome/css/line-awesome.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/custom/vendors/flaticon/flaticon.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/custom/vendors/flaticon2/flaticon.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />

        <!--end:: Global Optional Vendors -->

        <!--begin::Global Theme Styles(used by all pages) -->
        <link href="{{ asset('assets/css/demo1/style.bundle.css') }}" rel="stylesheet" type="text/css" />

        <!--end::Global Theme Styles -->

        <!--begin::Layout Skins(used by all pages) -->
        <link href="{{ asset('assets/css/demo1/skins/header/base/light.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/demo1/skins/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/demo1/skins/brand/dark.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/demo1/skins/aside/dark.css') }}" rel="stylesheet" type="text/css" />

        <!--end::Layout Skins -->
        <!-- <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" /> -->
        <link rel="shortcut icon" href="{{ url('/images/logo.png') }}" />
        <style>
            .pageloader {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url('./assets/media/loader.gif') 50% 50% no-repeat rgb(249, 249, 249);
                opacity: .8;
                display:none
            }
        </style>

    </head>

    <!-- end::Head -->
    <!-- begin::Body -->
    <body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

        <!-- begin:: Page -->
        <div class="pageloader"></div>

        @if (!Auth::user())
        <link href="{{ asset('assets/css/demo1/pages/general/login/login-1.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />
        @endif
        @if (Auth::user())
        <link href="{{ asset('assets/css/demo1/pages/general/wizard/wizard-4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />
        @endif
        @php
        use App\Media;
        $allmedia = Media::orderby('id','desc')->paginate(5);
        $videoFormat = array("webm","mkv","flv","vob","ogv","ogg","drc","mng","avi","mov","qt","wmv","yuv","amv","mp4","mp2","mpeg","mpe","mpv","m4v","svi","3gp","3g2","mxf","roq","nsv","flv","f4v","f4p","f4a","f4b");
        @endphp
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="{{asset('assets/js/jquery.form.js')}}"></script>
        <!-- begin:: Header Mobile -->
        @if (Auth::user())
        <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
            <div class="kt-header-mobile__logo">
                <a href="{{url('/')}}" style="font-size:20px;">
                        <!-- <img alt="Logo" src="{{asset('assets/media/logos/logo-light.png')}}" /> -->
                    IMC
                </a>
            </div>
            <div class="kt-header-mobile__toolbar">
                <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
                <!-- <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button> -->
                <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
            </div>
        </div>
        <!-- end:: Header Mobile -->
        <div class="kt-grid kt-grid--hor kt-grid--root">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
                <!-- begin:: Aside -->
                @include('layouts.sidebar')
                <!-- end:: Aside -->
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                    <!--begin:: Header -->
                    @include('layouts.header')
                    <!-- end:: Header -->
                    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
                        <!-- begin:: Content -->
                        @yield('content')
                        @yield('script')
                        <!-- end:: Content -->
                    </div>
                    <!-- begin:: Footer -->
                    @include('layouts.footer')
                    <!-- end:: Footer -->
                </div>
            </div>
        </div>

        @else
        @yield('content')
        @endif

        <!--begin::Modal-->
        <!-- <div class="modal fade" id="media-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Media Gallery</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                                <form class="kt-form" id="fileUploadForm" style="width: 95%;padding-top: 5px;padding-bottom: 5px" action="{{url('admin/media/upload')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @if(Session::has('message'))
                                                        <div class="row">
                                                                <div class="col-xl-12">
                                                                        <p class="alert {{ Session::get('alert-class') }} successMessage">{{ Session::get('message') }}</p>
                                                                </div>
                                                        </div>
                                                        @endif
                                                        <div class="row">
                                                                <div class="col-xl-12">
                                                                        <div class="form-group row">
                                                                                <label class="col-xl-2 col-lg-2 col-form-label"> File Upload</label>
                                                                                <div class="custom-file">
                                                                                        <input type="file" class="custom-file-input {{ $errors->has('file') ? ' is-invalid' : '' }}" id="file"  name="file" multiple required>
                                                                                        <label class="custom-file-label LabeliconFile" for="file">Choose File </label>
                                                                                        @if ($errors->has('file'))
                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                        <strong>{{ $errors->first('file') }}</strong>
                                                                                                </span>
                                                                                        @endif
                                                                                </div>
                                                                                <div class="kt-form__actions" style="margin-top:10px;">
                                                                                        <input type="submit" value="Upload" class="btn btn-brand btn-sm btn-wide kt-font-bold kt-font-transform-u">
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </form>
                                                <div class="progress" style="margin-bottom:15px">
                                                        <div class="progress-bar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                                                0%
                                                        </div>
                                                </div>
                                                <div class="row allMediaContent" style="width:97%;max-height: 300px;overflow: auto;">
                                                        @isset($allmedia)
                                                                @foreach ($allmedia as $item)
                                                                <div class="col-md-2" style="padding:5px" >
                                                                        <div class="container">
                                                                                @php
                                                                                        if(in_array($item->type,$videoFormat)){
                                                                                                $imageUrl = asset('/media/video.png');
                                                                                        }else{
                                                                                                $imageUrl = asset('/media/'.$item->filepath);
                                                                                        }
                                                                                        $position = strpos($item->filepath, '_');
                                                                                        $original_filename = substr($item->filepath,$position+1,strlen($item->filepath));
                                                                                @endphp
                                                                                <img class="selectFile" src="{{$imageUrl}}" data-file="{{$item->filepath}}"  width="100px" height="100px"/>
                                                                                <span class="kt-header__topbar-welcome" style="word-break: break-word;">{{$original_filename}}</span>
                                                                        </div>
                                                                </div>
                                                                @endforeach
                                                        @endisset
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                                <input type="text" class="form-control" id="selectFileName" value="" readonly/>
                                                <input type="hidden" id="targetControl" value="" />
                                                <button type="button" class="btn btn-primary closeFileModel" data-dismiss="modal">Submit</button>
                                        </div>
                                </div>
                        </div>
                </div> -->
        <!--end::Modal-->

        @include('layouts.media')
        <!-- begin::Scrolltop -->
        <div id="kt_scrolltop" class="kt-scrolltop">
            <i class="fa fa-arrow-up"></i>
        </div>

        <script>
var KTAppOptions = {
"colors": {
"state": {
    "brand": "#5d78ff",
    "dark": "#282a3c",
    "light": "#ffffff",
    "primary": "#5867dd",
    "success": "#34bfa3",
    "info": "#36a3f7",
    "warning": "#ffb822",
    "danger": "#fd3995"
},
"base": {
    "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
    "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
}
}
};
        </script>

        <!-- end::Global Config -->

        <!--begin:: Global Mandatory Vendors -->
        <script src="{{ asset('assets/vendors/general/jquery/dist/jquery.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/popper.js/dist/umd/popper.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/js-cookie/src/js.cookie.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/moment/min/moment.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/sticky-js/dist/sticky.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/wnumb/wNumb.js') }}" type="text/javascript"></script>

        <!--end:: Global Mandatory Vendors -->

        <!--begin:: Global Optional Vendors -->

        <script src="{{ asset('assets/vendors/general/jquery-form/dist/jquery.form.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/block-ui/jquery.blockUI.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/custom/js/vendors/bootstrap-timepicker.init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/custom/js/vendors/bootstrap-switch.init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/select2/dist/js/select2.full.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/typeahead.js/dist/typeahead.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/handlebars/dist/handlebars.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/nouislider/distribute/nouislider.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/owl.carousel/dist/owl.carousel.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/autosize/dist/autosize.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/clipboard/dist/clipboard.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/dropzone/dist/dropzone.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/summernote/dist/summernote.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/markdown/lib/markdown.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/custom/js/vendors/bootstrap-markdown.init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/custom/js/vendors/bootstrap-notify.init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/jquery-validation/dist/jquery.validate.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/jquery-validation/dist/additional-methods.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/custom/js/vendors/jquery-validation.init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/toastr/build/toastr.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/raphael/raphael.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/morris.js/morris.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/chart.js/dist/Chart.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/waypoints/lib/jquery.waypoints.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/counterup/jquery.counterup.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/es6-promise-polyfill/promise.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/custom/js/vendors/sweetalert2.init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/jquery.repeater/src/lib.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/jquery.repeater/src/jquery.input.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/jquery.repeater/src/repeater.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/vendors/general/dompurify/dist/purify.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/demo1/scripts.bundle.js') }}" type="text/javascript"></script>

        <script>
// $(document).ready(function(){
// 	$('#fileUploadForm').ajaxForm({
// 		beforeSend:function(){
// 			$('#success').empty();
// 			$('.progress-bar').text('0%');
// 			$('.progress-bar').css('width', '0%');
// 			$('.uploadClose').hide();
// 		},
// 		uploadProgress:function(event, position, total, percentComplete){
// 			$('.progress-bar').text(percentComplete + '%');
// 			$('.progress-bar').css('width', percentComplete + '%');
// 		},
// 		success:function(data)
// 		{
// 			if(data.status)					{
// 				$('.progress-bar').text('Uploaded');
// 				$('.progress-bar').css('width', '100%');
// 				$('.uploadClose').show();
// 				$('#selectFileName').val(data.filepath);
//
// 				var fullFilepath = "{{asset('/media')}}/"+data.filepath;
//
// 				$newBlock = '<div class="col-md-2" style="padding:5px">'+
// 							'<div class="container">'+
// 							'<img class="selectFile" src="'+fullFilepath+'"  width="100px" height="100px" data-file="'+data.filepath+'"/> '+
// 							'<span class="kt-header__topbar-welcome" style="word-break: break-word;">'+data.fileOriginalName+'</span>'+
// 							'</div></div>';
//
// 				$(".allMediaContent").append($newBlock);
//
// 			}else{
// 				$('.progress-bar').text('Upload Fail');
// 				$('.progress-bar').css('width', '100%');
// 				$('.uploadClose').show();
// 			}
// 		}
// 		});
//
// 	$(document).on("click",".selectFile",function(){
// 		$(".selectFile").removeAttr('style');
// 		$(this).css("border","5px solid");
// 		$('#selectFileName').val($(this).data('file'));
// 	});
//
// 	$(document).on("click",".mediaModel",function(){
// 		$("#targetControl").val($(this).data('control'));
// 	});
//
// 	$(document).on("click",".mediaModelAr",function(){
// 		$("#targetControl").val($(this).data('control'));
// 	});
//
// 	$(document).on("click",".closeFileModel",function(){
// 		$("#"+$("#targetControl").val()).val($("#selectFileName").val());
// 	});
// });
$(document).on('click', 'a.page-link', function (event) {
//event.preventDefault();
var url = $(this).attr('href');
window.location.href = url;

});
        </script>
    </body>

    <!-- end::Body -->
</html>
