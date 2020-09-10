@foreach($model as $row)
<option value="<?php echo $row->id;?>"><?php echo $row->title;?></option>
@endforeach

