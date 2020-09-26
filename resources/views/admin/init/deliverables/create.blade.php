@extends('layouts.app')
@section('title', 'Add '.$title)
@section('content')


<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            Add {{$title}}
        </h3>
        <span class="kt-subheader__separator kt-subheader__separator--v"></span>
        <div class="kt-subheader__breadcrumbs">
            <span class="kt-subheader__breadcrumbs-separator"></span>
            <a href="{{url('admin/init/'.$action)}}" class="kt-subheader__breadcrumbs-link">
                {{$action}}
            </a>
            <span class="kt-subheader__breadcrumbs-separator"></span>
            Add {{$title}}
        </div>
    </div>
    <div class="kt-subheader__toolbar">
        <a href="{{url('admin/init/'.$action)}}" class="btn btn-default btn-bold">
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
                            
                            {{ Form::model($model, array('url' => url('admin/init/'.$action),'class' => 'kt-form','id' => 'kt_apps_user_add_user_form' ,'method' => 'POST')) }}

                           
                            @include('admin.init.'.$folder.'.form')
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