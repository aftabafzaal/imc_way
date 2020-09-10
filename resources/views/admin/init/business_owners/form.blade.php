<?php
$required = "required";
?>
@include('admin.init.errors')
<div class="kt-wizard-v4__form">
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-section__body">
                <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Title(En)</label>
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
                    <label class="col-xl-2 col-lg-2 col-form-label"> Title(Ar)</label>
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
});

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
