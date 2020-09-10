
			<?php


              if(!empty($result) and sizeof($result) > 0)
			  foreach($result as $key=>$v){
				   ?>
					 <div class="col-md-3">
						 <div class="admission-blocknew mb-2">
							<h2 class="text-main">{{$key}}</h2>
							 <?php
							    foreach($v as $append){
									 ?>
									 <a href="{{Config::get('variable.URL_LINK')}}department/{{($language == "en")?$append->slug_en:$append->slug_ar}}" onmouseover="this.style.color='green'" onmouseout="this.style.color='#005a9c'" style="color: rgb(0, 90, 156);">{!!($language == "en")?$append->title_en:$append->title_ar!!}</a></p>
									 <?php
								  }
							 ?>
						 </div>
					 </div>
					 <?php

			} else {
				?>
				<h2 class="text-main text-center"> <?php if($language == 'ar'){ echo " لاتوجد بيانات
 "; }else{ echo " No Data Found ";} ?> </h2>
		<?php	}

			?>
