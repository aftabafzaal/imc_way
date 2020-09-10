<?php
$required = "required";
?>

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
                    <label class="col-xl-2 col-lg-2 col-form-label"> {{ __('Parent Category') }}(En)</label>


                    <div class="col-lg-9 col-xl-9">
                        <?php
                        $categories["none"] = 'Root Category';
                        ?>
                        {!! Form::select('parent',  $categories,isset($model->parent->id)?$model->parent->id:null,array('class' => 'form-control',$required)) !!}

                        @if ($errors->has('parent'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('parent') }}</strong>
                        </span>
                        @endif

                    </div>
                </div>




                <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Descriptions(En)</label>
                    <div class="col-lg-9 col-xl-9">

                        {!! Form::textarea('description_en', null, ['size' => '105x25','class' => 'form-control ckeditor',$required]) !!} 

                        @if ($errors->has('description_en'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description_en') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label"> Descriptions(Ar)</label>
                    <div class="col-lg-9 col-xl-9">
                        {!! Form::textarea('description_ar', null, ['size' => '105x25','class' => 'form-control ckeditor',$required]) !!} 

                        @if ($errors->has('description_ar'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description_ar') }}</strong>
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
