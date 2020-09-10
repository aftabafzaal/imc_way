<div class="form-group row">
  <label class="col-xl-2 col-lg-2 col-form-label"> Image/Video</label>
  <div class="col-lg-8 col-xl-8">
    <input placeholder="Upload Image" id="image1" name="image1" type="text" class="form-control {{ $errors->has('image1') ? ' is-invalid' : '' }}" value="{{old('image1')}}" readonly>
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
<?php
$helper = new App\Helpers();
?>
<?php
if(!empty($content->media_id_en)){
  $enImage= $helper->getImage($content->media_id_en);
  $img=env('BASE_URL').$enImage;
}else{
  $img="";
}
?>
@if(!empty($img))
<div class="form-group row">
  <label class="col-md-2 col-form-label"></label>
  <div class="col-md-8">
    <img id="iconPreview" width="150px" src="{{$img}}">
  </div>
</div>
@endif
