@extends('layouts.app')
@section('title', 'Add Category')
@section('content')

<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            Add Category
        </h3>
        <span class="kt-subheader__separator kt-subheader__separator--v"></span>
        <div class="kt-subheader__breadcrumbs">
            <span class="kt-subheader__breadcrumbs-separator"></span>
            <a href="{{url('admin/init/categories')}}" class="kt-subheader__breadcrumbs-link">
                Categories
            </a>
            <span class="kt-subheader__breadcrumbs-separator"></span>
            Add Category
        </div>
    </div>
    <div class="kt-subheader__toolbar">
        <a href="{{url('admin/init/categories')}}" class="btn btn-default btn-bold">
            Back </a>
    </div>
</div>


<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="kt-wizard-v4" id="kt_apps_user_add_user" data-ktwizard-state="step-first">
        <div class="kt-portlet">
            <div class="kt-portlet__body kt-portlet__body--fit">
                <div class="kt-grid">
                    <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">

                        <!--begin: Form Wizard Form-->
                        <form class="kt-form" id="kt_apps_user_add_user_form" action="{{ url('admin/init/categories')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @include('admin.init.categories.form')
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
<script src="{{ env('BASE_URL')}}/assets/unisharp/laravel-ckeditor/ckeditor.js"></script>

<script>
CKEDITOR.replace('description_en', {
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
    height: 560,
    removeDialogTabs: 'image:advanced;link:advanced'
});

CKEDITOR.replace('description_ar', {
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
    height: 560,
    removeDialogTabs: 'image:advanced;link:advanced'
});

CKEDITOR.replace('service_en', {
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
    height: 560,
    removeDialogTabs: 'image:advanced;link:advanced'
});

CKEDITOR.replace('service_ar', {
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
    height: 560,
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
