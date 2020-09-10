

		<style>
			.media-modal .modal-dialog {
				max-width: 1150px;
				margin: 1.75rem auto;
			}
			.media-modal .modal-content{
				border: none!important;
			}
			.media-modal .modal-header {
				display: -ms-flexbox;
				display: flex;
				-ms-flex-align: start;
				align-items: flex-start;
				-ms-flex-pack: justify;
				justify-content: space-between;
				padding: 10px;
				border-bottom: none;
				border-top-left-radius: 0;
				border-top-right-radius: 0;
				background: rgb(0, 90, 156);
				position: relative;
			}
			.media-modal .modal-header h5 {
				margin-bottom: 0;
				line-height: 1.5;
				color: #fff!IMPORTANT;
			}
			.media-modal .modal-header .close {
				padding: 0;
				margin: 0;
				color: #fff;
				opacity: 1;
			}
			.media-modal .btn-primary {
				color: #fff;
				background-color: #005a9c;
				border-color: #005a9c;
			}
			.media-modal .modal-dialog .nav-tabs {
				border-bottom: none;
				display: flex;
				align-items: center;
				justify-content: flex-start;
			}
			.media-modal .modal-dialog .nav-tabs li a {
				padding: 10px 20px;
				background: transparent;
				color: #005a9c;
				display: block;
				transition: .5s ease;
				border: 1px solid #005a9c;
				text-decoration: none!important;
			}
			.media-modal .modal-dialog .nav-tabs li a.active{
				border: 1px solid #005a9c;
				background: #005a9c;
				color: #fff;
			}
			.media-modal .allMediaContent {
				padding: 20px;
				position: relative;
			}
			.media-modal .allMediaContent img.selectFile {
				max-width: 100%;
				width: 100%;
			}
			.media-modal nav.pagenation-block {
				display: flex;
				align-items: center;
				justify-content: center;
				margin-top: 20px;
			}
			.media-modal nav.pagenation-block  .page-item.active .page-link {
				z-index: 1;
				color: #fff;
				background-color: #005a9c;
				border-color: #005a9c;
			}
			.media-modal  span.kt-header__topbar-welcome {
				font-size: 14px;
			}
			.right-side {
				background: rgba(243, 243, 243, 0.58);
				padding: 10px;
			}
			.right-side .right-side-img {
		    width: 100%;
		    height: 230px;
		}
		.right-side .right-side-img img {
		    width: 100%;
		    height: 100%;
		    object-fit: contain;
		}
		.right-side .url-bar {
		    margin-top: 10px;
		    width: 100%;
		    display: flex;
		    align-items: center;
		    justify-content: flex-start;
		}
		.right-side .url-bar label {
		    margin-bottom: 0;
		    margin-right: 10px;
		    font-size: 14px;
		    flex: 0 0 15%;
		}
		.right-side .url-bar input.url-input {
		    padding: 3px 5px;
		    width: 100%;
		}
		.media-modal .allMediaContent .col-md-3 {
		    margin-bottom: 15px!important;
		}
		</style>
<input type="hidden" class="base" value="<?php echo env('BASE_URL');?>">

				<div class="modal fade media-modal" id="media-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Media Gallery</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<!-- <ul class="nav nav-tabs">
									<li><a data-toggle="tab" href="#home" class="active">Upload Image </a></li>
									<li><a data-toggle="tab" href="#menu1" class="">Media Gallery </a></li>
								</ul> -->
										<form class="kt-form" id="fileUploadForm" action="{{url('admin/media/upload')}}" method="POST" enctype="multipart/form-data">
												@csrf
												@if(Session::has('message'))
												<div class="row">
													<div class="col-xl-12">
														<p class="alert {{ Session::get('alert-class') }} successMessage">{{ Session::get('message') }}</p>
													</div>
												</div>
												@endif
													<div class="col-xl-12">
													<div class="form-group row">
														<label class="col-xl-2 col-lg-2 col-form-label"> File Upload</label>
														<div class="custom-file">
															<input type="file" class="custom-file-input " id="file" name="file" multiple="" required="">
															<label class="custom-file-label LabeliconFile" for="file">Choose File </label>
														</div>
														<div class="kt-form__actions" style="margin-top:10px;">
															<input type="submit" value="Upload" class="btn btn-brand btn-sm btn-wide kt-font-bold kt-font-transform-u">
														</div>
													</div>
												</div>

										</form>
										<div class="progress" style="margin-bottom:15px">
											<div class="progress-bar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
											0%
											</div>
										</div>


										<div class="allMediaContent" style="width:100%;max-height: 300px;overflow-y: auto;    overflow-x: hidden;" id="mediadata">
										</div>

								</div>
								<div class="modal-footer">
                  <input type="text" class="form-control" id="selectFileName" value="" readonly/>
                  <input type="hidden" id="targetControl" value="" />
                  <button type="button" class="btn btn-primary closeFileModel" data-dismiss="modal">Submit</button>
								</div>
							</div>
						</div>
					</div>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script>
$(document).ready(function(){
  $('#menu3').hide();
  //to  get the media files
    $.ajax({
     url: "{{Config::get('variable.URL_LINK')}}getmedia",
     cache: false,
     success: function(response){
       $(document).find('#mediadata').append(response);
     }
   });


	 $(document).on('click','.mediaModel',function(event){
				 $.ajax({
					url: "{{Config::get('variable.URL_LINK')}}getmedia",
					cache: false,
					success: function(response){
							$(document).find('#mediadata').html('');
						$(document).find('#mediadata').append(response);
					}
				});
	 });
	 // $(document).on('click','.mediaModelAr',function(event){
		// 		 $.ajax({
		// 			url: "{{Config::get('variable.URL_LINK')}}getmedia",
		// 			cache: false,
		// 			success: function(response){
		// 					$(document).find('#mediadata').html('');
		// 				$(document).find('#mediadata').append(response);
		// 			}
		// 		});
	 // });
   $(document).on('click','a.page-link',function(event){
     event.preventDefault();
     var url = $(this).attr('href');
       $.ajax({
        url: url,
        cache: false,
      success: function(html){
        $("#mediadata").empty().append(html);

      }
   });
 });

 var VideoTags = ["webm","mkv","flv","vob","ogv","ogg","drc","mng","avi","mov","qt","wmv","yuv","amv","mp4","mp2","mpeg","mpe","mpv","m4v","svi","3gp","3g2","mxf","roq","nsv","flv","f4v","f4p","f4a","f4b"];
 var Pdf = ["pdf"];

  $('#fileUploadForm').ajaxForm({
    beforeSend:function(){
      $('#success').empty();
      $('.progress-bar').text('0%');
      $('.progress-bar').css('width', '0%');
      $('.uploadClose').hide();
    },
    uploadProgress:function(event, position, total, percentComplete){
      $('.progress-bar').text(percentComplete + '%');
      $('.progress-bar').css('width', percentComplete + '%');
    },
    success:function(data)
    {
			console.log(data);
      if(data.status)					{
        $('.progress-bar').text('Uploaded');
        $('.progress-bar').css('width', '100%');
        $('.uploadClose').show();
        $('#selectFileName').val(data.filepath);
        var fullFilepath = "{{asset('images/media')}}/"+data.filepath;
				if(VideoTags.indexOf(data.extention)  != "-1"){
					$newBlock ='<div class="col-md-3">'+
							  '<img  src="https://freepngimg.com/thumb/video_icon/30257-7-video-icon-image-thumb.png" class="selectFile"  width="100px" height="100px" data-file="'+data.filepath+'"/> '+
	              '<span class="kt-header__topbar-welcome" style="word-break: break-word;">'+data.fileOriginalName+'</span>'+
	              '</div>';

				}else if(Pdf.indexOf(data.extention)  != "-1"){
					$newBlock ='<div class="col-md-3">'+
							  '<img  src="https://png2.cleanpng.com/sh/05d3de0c894c5c0ed305abe990731c81/L0KzQYm3WMAzN5Z4fpH0aYP2gLBuTgBlbl5oh995dYTogn7tifxmNZRxgeI2YYL3PbfwjPUubpD3hdN9LXTyc8b0hf51NZpzjNd7bnH3ebF1gfwua5Dzftd7ZX7mdX72jr1uaaVqittqbIOwdbBskvd6NZJ1itt1LUXlRoS3UMM1a5Q6edM8Lke7RIW4VcI1OWY4S6Q6NEe6Qom6V75xdpg=/kisspng-pdf-computer-file-clip-art-file-format-document-international-conference-on-materials-energy-april-5b630034cc5aa3.784415241533214772837.png" class="selectFile"  width="100px" height="100px" data-file="'+data.filepath+'"/> '+
	              '<span class="kt-header__topbar-welcome" style="word-break: break-word;">'+data.fileOriginalName+'</span>'+
	              '</div>';

				}else{
				   	$newBlock ='<div class="col-md-3">'+
	               '<img class="selectFile" src="'+fullFilepath+'"  width="100px" height="100px" data-file="'+data.filepath+'"/> '+
	              '<span class="kt-header__topbar-welcome" style="word-break: break-word;">'+data.fileOriginalName+'</span>'+
	              '</div>';
				}

        $(".finali").prepend($newBlock);
      }else{
        $('.progress-bar').text('Upload Fail');
        $('.progress-bar').css('width', '100%');
        $('.uploadClose').show();
      }
    }
    });
  $(document).on("click",".selectFile",function(){
		console.log($(this).val());
    $(".selectFile").removeAttr('style');
    $(this).css("border","5px solid");
    $('#selectFileName').val($(this).data('file'));
    $('#menu3').show();
		var base = $(document).find('.base').val();
		  var name = base + "images/media/"+$(this).data('file');
    $('#imageurl').val(name);
    document.getElementById('selectedimage').src=$(this).attr('src');
  });
  $(document).on("click",".mediaModel",function(){
    $("#targetControl").val($(this).data('control'));
  });
	$(document).on("click",".mediaModelAr",function(){
    $("#targetControl").val($(this).data('control'));
  });


  $(document).on("click",".closeFileModel",function(){
    $("#"+$("#targetControl").val()).val($("#selectFileName").val());
  });
});
</script>
