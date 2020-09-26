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
