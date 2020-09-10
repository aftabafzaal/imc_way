<?php
$required = "required";
?>
@include('admin.init.errors')
<div class="kt-wizard-v4__form">
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-section__body">




                <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Image</label>
                    <div class="col-lg-8 col-xl-8">
                        <input placeholder="Upload Image" id="image1" name="image[]" type="text" class="form-control {{ $errors->has('image1') ? ' is-invalid' : '' }}" value="" readonly>
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
                <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Objective (En)</label>
                    <div class="col-lg-9 col-xl-9">
                        {!! Form::text('title_en', null , array('placeholder' =>'Title in english','class' => 'form-control ',$required,"autofocus") ) !!}

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
                        {!! Form::text('title_ar', null , array('placeholder' =>'Title in Arabic','class' => 'form-control ',$required,"autofocus") ) !!}
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
                        {!! Form::text('slug_en', null , array('placeholder' =>'','class' => 'form-control ',"autofocus") ) !!}

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
                        {!! Form::text('slug_ar', null , array('placeholder' =>'','class' => 'form-control ',"autofocus") ) !!}
                        @if ($errors->has('slug_ar'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('slug_ar') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Where(En)</label>
                    <div class="col-lg-9 col-xl-9">
                        {!! Form::text('where_en', null , array('placeholder' =>'Location in english','class' => 'form-control ',$required,"autofocus") ) !!}
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
                        {!! Form::text('where_ar', null , array('placeholder' =>'Location in Arabic','class' => 'form-control ',$required,"autofocus") ) !!}
                        @if ($errors->has('where_ar'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('when_ar') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Start Date</label>
                    <div class="col-lg-9 col-xl-9">
                        {!! Form::text('start_at', null , array('placeholder' =>'Start Date','class' => 'form-control datepicker',$required,"autofocus") ) !!}
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
                        {!! Form::text('end_at', null , array('placeholder' =>'End Date','class' => 'form-control datepicker',$required,"autofocus") ) !!}
                        @if ($errors->has('end_at'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('end_at') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> {{ __('Department') }}</label>


                    <div class="col-lg-9 col-xl-9">

                        {!! Form::select('department_id',  $departments,$selected,array('class' => 'form-control select2',"",$required)) !!}

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

                        {!! Form::select('business_owner_id',  $owners,null,array('class' => 'form-control select2',"",$required)) !!}

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

                        {!! Form::select('project_id',  $projects,null,array('class' => 'form-control select2 project_id"',"id"=>"project_id",$required)) !!}

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

@section('script')
<script src="{{ env('BASE_URL')}}/assets/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>

$(document).ready(function () {
    $('.select2').select2();
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
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


/* select template */

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
