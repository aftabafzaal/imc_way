
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
