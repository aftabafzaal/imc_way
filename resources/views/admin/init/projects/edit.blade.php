@extends('layouts.app')
@section('title', 'Edit'.$title)
@section('content')
<?php

use App\Helpers;

$helper = new Helpers();
?>
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            Edit {{$title}}
        </h3>
        <span class="kt-subheader__separator kt-subheader__separator--v"></span>
        <div class="kt-subheader__breadcrumbs">
            <span class="kt-subheader__breadcrumbs-separator"></span>
            <a href="{{url('admin/init/'.$action)}}" class="kt-subheader__breadcrumbs-link">
                {{$title}}
            </a>
            <span class="kt-subheader__breadcrumbs-separator"></span>
            Edit {{$title}}
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

                        <div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                            <div class="kt-heading kt-heading--md">Edit {{$title}} :</div>
                            <div class="kt-section kt-section--first">
                                <!--begin: Form Wizard Form-->
                                {{ Form::model($model, array('route' => array($action.'.update', $model->id), 'method' => 'PUT')) }}

                                @include('admin.init.'.$folder.'.form')
                                <div class="kt-form__actions">
                                    <input type="submit" value="Submit" name="submit" class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
                                </div>

                                {!! Form::close() !!}
                            </div>
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
