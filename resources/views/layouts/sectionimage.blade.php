
              <div class="form-group row">
                <label class="col-xl-2 col-lg-2 col-form-label"> Title(En)</label>
                <div class="col-lg-9 col-xl-9">
                    <input placeholder="Title in english " id="title_en" name="title_en" type="text" class="form-control" value="<?php if(isset($content->title_en)){
                      echo $content->title_en;
                    }?>" autofocus>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-xl-2 col-lg-2 col-form-label"> Title(Ar)</label>
                <div class="col-lg-9 col-xl-9">
                                        <input placeholder="Title in Arabic " id="title_ar" name="title_ar" type="text" class="form-control" value="<?php if(isset($content->title_ar)){
                                          echo $content->title_ar;
                                        }?>" autofocus>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-xl-2 col-lg-2 col-form-label"> Descriptions(En)</label>
                <div class="col-lg-9 col-xl-9">
                  <textarea class="form-control" id="description_en" name="description_en" placeholder="Content" id="description_en" class="form-control"><?php if(isset($content->description_en)){
                    echo $content->description_en;
                  }?></textarea>
                </div>
              </div>
                                <div class="form-group row">
                <label class="col-xl-2 col-lg-2 col-form-label"> Descriptions(Ar)</label>
                <div class="col-lg-9 col-xl-9">
                  <textarea class="form-control" id="description_ar" name="description_ar" placeholder="Content" id="description_ar" class="form-control"><?php if(isset($content->description_ar)){
                    echo $content->description_ar;
                  }?></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-xl-2 col-lg-2 col-form-label"> Image</label>
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
            <script src="{{ env('BASE_URL')}}assets/unisharp/laravel-ckeditor/ckeditor.js"></script>
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
                  items: ['Scayt','Source']
                }
              ],
              allowedContent : true,
              format_tags : "p;h1;h2;h3;pre",
              extraAllowedContent : "*(*);*{*}",
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
                  items: ['Scayt','Source']
                }
              ],
              allowedContent : true,
  format_tags : "p;h1;h2;h3;pre",
  extraAllowedContent : "*(*);*{*}",
              extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
              height: 560,
              removeDialogTabs: 'image:advanced;link:advanced'
            });

            /* select template */

            function selectTemplate(obj, type) {
            	var thisvalue = obj.value; //$(obj).find("option:selected").text();
            	if(type == 'en') {
            		CKEDITOR.instances['description_en'].setData(thisvalue);
            	} else {
            		CKEDITOR.instances['description_ar'].setData(thisvalue);
            	}
            }
            </script>
