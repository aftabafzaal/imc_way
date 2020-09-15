<?php
$required = "";
?>
@include('admin.init.errors')

<ul class="nav nav-light-success nav-pills" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="about-tab-3" data-toggle="tab" href="#about">
            <span class="nav-icon">
                <i class="flaticon2-chat-1"></i>
            </span>
            <span class="nav-text">About</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="readmore-tab-3" data-toggle="tab" href="#readmore">
            <span class="nav-icon">
                <i class="flaticon2-chat-1"></i>
            </span>
            <span class="nav-text">Read More</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="media-tab-3" data-toggle="tab" href="#media">
            <span class="nav-icon">
                <i class="flaticon2-chat-1"></i>
            </span>
            <span class="nav-text">Media</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="extra-tab-3" data-toggle="tab" href="#extra">
            <span class="nav-icon">
                <i class="flaticon2-chat-1"></i>
            </span>
            <span class="nav-text">Extra</span>
        </a>
    </li>
</ul>
<div class="tab-content mt-5" id="myTabContent">
    <div class="tab-pane fade active show" id="about" role="tabpanel" aria-labelledby="about-tab-3">
        <div class="kt-wizard-v4__form">
            <div class="row">
                <div class="col-xl-12">
                    <div class="kt-section__body">

                        <div class="form-group row">
                            <label class="col-xl-2 col-lg-2 col-form-label"> Objective (En)</label>
                            <div class="col-lg-9 col-xl-9">
                                {!! Form::text('title_en', null , array('placeholder' =>'Title in english','class' => 'form-control ',$required,"") ) !!}

                                @if ($errors->has('title_en'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title_en') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-2 col-lg-2 col-form-label"> Objective (Ar)</label>
                            <div class="col-lg-9 col-xl-9">
                                {!! Form::text('title_ar', null , array('placeholder' =>'Title in Arabic','class' => 'form-control ',$required,"") ) !!}
                                @if ($errors->has('title_ar'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title_ar') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-2 col-lg-2 col-form-label"> Start Date</label>
                            <div class="col-lg-9 col-xl-9">
                                {!! Form::text('start_at', null , array('placeholder' =>'Start Date','class' => 'form-control datepicker',$required,"") ) !!}
                                @if ($errors->has('when_ar'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('when_ar') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-2 col-lg-2 col-form-label"> End Date</label>
                            <div class="col-lg-9 col-xl-9">
                                {!! Form::text('end_at', null , array('placeholder' =>'End Date','class' => 'form-control datepicker',$required,"") ) !!}
                                @if ($errors->has('end_at'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('end_at') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-2 col-lg-2 col-form-label"> Where(En)</label>
                            <div class="col-lg-9 col-xl-9">
                                {!! Form::text('where_en', null , array('placeholder' =>'Location in english','class' => 'form-control ',$required,"") ) !!}
                                @if ($errors->has('where_en'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('when_en') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-2 col-lg-2 col-form-label"> Where(Ar)</label>
                            <div class="col-lg-9 col-xl-9">
                                {!! Form::text('where_ar', null , array('placeholder' =>'Location in Arabic','class' => 'form-control ',$required,"") ) !!}
                                @if ($errors->has('where_ar'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('when_ar') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-2 col-lg-2 col-form-label"> {{ __('Department') }}</label>


                            <div class="col-lg-9 col-xl-9">

                                {!! Form::select('department_id',  $departments,$selected,array('class' => 'form-control select2',"",$required,'placeholder' => 'Please Select Department')) !!}

                                @if ($errors->has('department_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('department_id') }}</strong>
                                </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-2 col-lg-2 col-form-label"> {{ __('Business Owner') }}</label>


                            <div class="col-lg-9 col-xl-9">

                                {!! Form::select('business_owner_id',  $owners,null,array('class' => 'form-control select2',"",$required,'placeholder' => 'Please Select Business Owner')) !!}

                                @if ($errors->has('business_owner_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('business_owner_id') }}</strong>
                                </span>
                                @endif

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-2 col-lg-2 col-form-label"> {{ __('Project') }}</label>


                            <div class="col-lg-9 col-xl-9">

                                {!! Form::select('project_id',  $projects,null,array('class' => 'form-control select2 project_id"',"id"=>"project_id",$required,'placeholder' => 'Please Select Project')) !!}

                                @if ($errors->has('project_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('project_id') }}</strong>
                                </span>
                                @endif

                            </div>
                        </div>
                        <div class="form-group row categories-div"> 
                            <label class="col-xl-2 col-lg-2 col-form-label"> {{ __('Categories') }}</label>
                            <div class="col-lg-9 col-xl-9">
                                <select class="form-control select2" multiple="" name="categories[]" id="categories">

                                </select>
                                @if ($errors->has('categories'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('categories') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label"> Brief(En)</label>
                            <div class="col-lg-8 col-xl-8">

                                {!! Form::textarea('brief_en', null, ['size' => '105x25','class' => 'form-control ckeditor']) !!} 

                                @if ($errors->has('description_en'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('brief_en') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label"> Brief(Ar)</label>
                            <div class="col-lg-8 col-xl-8">
                                {!! Form::textarea('brief_ar', null, ['size' => '105x25','class' => 'form-control ckeditor']) !!} 

                                @if ($errors->has('description_ar'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('brief_ar') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-2 col-lg-2 col-form-label"> Is Active</label>
                            <div class="col-lg-8 col-xl-8">

                                <input type="checkbox" class="status" name="status" value="1" {{($model->status == 1)?"checked":""}}>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane" id="readmore" role="tabpanel" aria-labelledby="readmore-tab-3">
        <div class="form-group row">
            <label class="col-xl-2 col-lg-2 col-form-label"> Read more Title</label>
            <div class="col-lg-9 col-xl-9">
                {!! Form::text('url_title', null , array('placeholder' =>'Title of the url e.g. Download PDF','class' => 'form-control',"") ) !!}
                @if ($errors->has('url_title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('url_title') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-xl-2 col-lg-2 col-form-label">URL</label>
            <div class="col-lg-9 col-xl-9">
                {!! Form::text('url', null , array('placeholder' =>'URL','class' => 'form-control',"") ) !!}
                @if ($errors->has('url'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('url') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="extra" role="tabpanel" aria-labelledby="extra-tab-3">

        <div class="form-group row">
            <label class="col-xl-2 col-lg-2 col-form-label"> Slug (en)</label>
            <div class="col-lg-8 col-xl-8">
                {!! Form::text('slug_en', null , array('placeholder' =>'','class' => 'form-control ',"") ) !!}

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
                {!! Form::text('slug_ar', null , array('placeholder' =>'','class' => 'form-control ',"") ) !!}
                @if ($errors->has('slug_ar'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('slug_ar') }}</strong>
                </span>
                @endif
            </div>
        </div>


        <div class="form-group row">
            <label class="col-xl-3 col-lg-3 col-form-label"> Descriptions(En)</label>
            <div class="col-lg-8 col-xl-8">

                {!! Form::textarea('description_en', null, ['size' => '105x25','class' => 'form-control ckeditor',$required]) !!} 

                @if ($errors->has('description_en'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description_en') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-xl-3 col-lg-3 col-form-label"> Descriptions(Ar)</label>
            <div class="col-lg-8 col-xl-8">
                {!! Form::textarea('description_ar', null, ['size' => '105x25','class' => 'form-control ckeditor',$required]) !!} 

                @if ($errors->has('description_ar'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description_ar') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab-3">
        <div class="form-group row" id="media_data">
            <table class="table">

                <thead> <tr>
                        <th>
                            Media
                        </th>
                        <th class="last">Delete</th>
                    </tr>
                </thead>
                <tbody id="media_gallery_content_list">
                    @if(!empty($mediaModel))

                    @foreach($mediaModel as $file)
                    <tr>
                        <td>
                            <?php if ($file->type == "youtube") { ?>
                                <iframe width="200" height="200" src="https://www.youtube.com/embed/<?php echo $file->filepath ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


                                <?php
                            } else {
                                $ext = pathinfo($file->filepath, PATHINFO_EXTENSION);
                                if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
                                    ?>
                                    <img width="200" height="200" src="<?php echo env('BASE_URL') . "/images/media/" . $file->filepath ?>">
                                <?php } else { ?>
                                    <video  width="200" height="200" src="<?php echo env('BASE_URL') . "/images/media/" . $file->filepath ?>" autoplay controls>
                                        <?php
                                    }
                                }
                                ?>

                                <input type="hidden" value="<?php echo $file->filepath ?>" id="attachments"  name="attachments[{{ $loop->index }}][file]" type="text">
                                </td>
                                <td> <input type="checkbox" value="1" id="deleted"  name="attachments[{{ $loop->index }}][deleted]"> <input type="hidden" value="<?php echo $file->type ?>" id="type"  name="attachments[{{ $loop->index }}][type]"></td>
                    </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>

        </div>
        <div class="form-group row">
            <label class="col-xl-11 col-lg-11 col-form-label"> Add Images and Videos</label>
            <div class="col-lg-1 col-xl-1">



            </div>
        </div>
        <div class="form-group row">
            <label class="col-xl-4 col-lg-2 col-form-label"> Source </label>
            <div class="col-lg-8 col-xl-8">
                <select id="source" class="form-control">
                    <option value="local">Local</option>
                    <option value="youtube">Youtube</option>
                </select>    

            </div>
            <div class="col-lg-1 col-xl-1">

            </div>
        </div>

        <div class="form-group row" id="div-local">
            <label class="col-xl-2 col-lg-2 col-form-label"> Image</label>
            <div class="col-lg-8 col-xl-8" >
                <input placeholder="Upload Image" id="image1" name="image" type="text" class="form-control {{ $errors->has('image1') ? ' is-invalid' : '' }}" value="" readonly>

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
        <div class="form-group row" id="div-youtube" style="display: none;">
            <label class="col-xl-2 col-lg-2 col-form-label"> Youtube video id</label>
            <div class="col-lg-8 col-xl-8" >
                <input placeholder="Enter youtube video id e.g. a3ICNMQW7Ok" id="youtube_url" type="text" class="form-control" value="a3ICNMQW7Ok">
            </div>
        </div>
        <div class="form-group row">
            <button type="button" id="add" class="btn btn-bold btn-label-brand btn-lg">Add</button>

        </div>
    </div>
</div>
@section('script')
<script src="{{ env('BASE_URL')}}/assets/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>

var count = <?php
                                if (!empty($mediaModel)) {
                                    echo count($mediaModel);
                                } else {
                                    echo 0;
                                }
                                ?>;
var url = "<?php echo env("BASE_URL") ?>/images/media/";
$(document).ready(function () {
    $('.select2').select2();
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });

    $("#source").change(function () {
        var source = $("#source").val();

        if (source == "youtube") {
            $("#div-local").hide();
        } else {
            $("#div-youtube").hide();
        }
        $("#div-" + source).show();

    });
    $("#add").click(function () {

        var val = "";
        var source = $("#source").val();

        var emb = "";

        if (source == "youtube") {
            var youtube_url = $("#youtube_url").val();
            youtube_url = youtube_url.trim();
            val = youtube_url;
            emb = '<iframe width="200" height="200" src="https://www.youtube.com/embed/' + youtube_url
                    + '" frameborder="0"></iframe>';
        } else {
            val = $("#image1").val();
            if (val != "") {
                var ext = (/[.]/.exec(val)) ? /[^.]+$/.exec(val) : undefined;
                if (ext == "jpg" || ext == "jpeg" || ext == "png") {
                    emb = '<img width="200" height="200" src="' + url + val + '">';
                } else {
                    emb = '<video  width="200" height="200" src="' + url + val + '" autoplay>';
                }
            }
        }

        if (emb != "") {
            var html = '<tr><td>' + emb + '<input type="hidden" value="' + val + '" id="file"  name="attachments[' + count + '][file]" type="text"></td><td><input type="checkbox" value="1" id="deleted"  name="attachments[' + count + '][deleted]"><input type="hidden" value="' + source + '" id="type"  name="attachments[' + count + '][type]"></td></tr>';

            $("#image1").val("");
            $("#media_gallery_content_list").append(html);
            count++
        }
    });

    $("#project_id").change(function () {
        getCategories()
    });
    getCategories();


    CKEDITOR.replace('.ckeditor', {
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
                items: ['Scayt', 'Source']
            }
        ],
        extraAllowedContent: 'h3{clear};h2{line-height};h2 h3{margin-left,margin-top}',
        extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
        height: 260,
        removeDialogTabs: 'image:advanced;link:advanced'
    });
});




function getCategories() {
    var id = $("#project_id").val();
    $.get("<?php echo env('BASE_URL') ?>/admin/init/getcategories/" + id, function (data) {
        // Display the returned data in browser
        $("#categories").html(data);

<?php if (!empty($selected)) { ?>
            $('#categories').val(<?php echo json_encode($selected) ?>);
<?php } ?>

    });
}

function selectTemplate(obj, type) {
    var thisvalue = obj.value; //$(obj).find("option:selected").text();
    if (type == 'en') {
        CKEDITOR.instances['description_en'].setData(thisvalue);
    } else {
        CKEDITOR.instances['description_ar'].setData(thisvalue);
    }
}
</script>
@stop
