@php
  $videoFormat = array("webm","mkv","flv","vob","ogv","ogg","drc","mng","avi","mov","qt","wmv","yuv","amv","mp4","mp2","mpeg","mpe","mpv","m4v","svi","3gp","3g2","mxf","roq","nsv","flv","f4v","f4p","f4a","f4b");
  $pdf = array("pdf");

@endphp
<div class="row">
  <div class="col-md-8">
    <div class="row finali" >
      @isset($allmedia)
        @foreach ($allmedia as $item)

        <?php
          if(in_array($item->type,$videoFormat) == "true"){
            $imageUrl = asset('images/media/'.$item->filepath);
            $position = strpos($item->filepath, '_');
            $original_filename = substr($item->filepath,$position+1,strlen($item->filepath));
            ?>
            <div class="col-md-3">
              <img class="selectFile" src="https://freepngimg.com/thumb/video_icon/30257-7-video-icon-image-thumb.png" data-file="{{$item->filepath}}"  width="100px" height="100px"/ >
              <span class="kt-header__topbar-welcome" style="word-break: break-word;">{{$original_filename}}</span>
            </div>
            <?php
          }else if(in_array($item->type,$pdf) == "true"){
            $imageUrl = asset('images/media/'.$item->filepath);
            $position = strpos($item->filepath, '_');
            $original_filename = substr($item->filepath,$position+1,strlen($item->filepath));
            ?>
            <div class="col-md-3">
              <img class="selectFile" src="https://png2.cleanpng.com/sh/05d3de0c894c5c0ed305abe990731c81/L0KzQYm3WMAzN5Z4fpH0aYP2gLBuTgBlbl5oh995dYTogn7tifxmNZRxgeI2YYL3PbfwjPUubpD3hdN9LXTyc8b0hf51NZpzjNd7bnH3ebF1gfwua5Dzftd7ZX7mdX72jr1uaaVqittqbIOwdbBskvd6NZJ1itt1LUXlRoS3UMM1a5Q6edM8Lke7RIW4VcI1OWY4S6Q6NEe6Qom6V75xdpg=/kisspng-pdf-computer-file-clip-art-file-format-document-international-conference-on-materials-energy-april-5b630034cc5aa3.784415241533214772837.png"
              data-file="{{$item->filepath}}"  width="100px" height="100px"/ >
              <span class="kt-header__topbar-welcome" style="word-break: break-word;">{{$original_filename}}</span>
            </div>
            <?php
          }else{
            $imageUrl = asset('images/media/'.$item->filepath);
            $position = strpos($item->filepath, '_');
            $original_filename = substr($item->filepath,$position+1,strlen($item->filepath));
            ?>
            <div class="col-md-3">
              <img class="selectFile" src="{{$imageUrl}}" data-file="{{$item->filepath}}"  width="100px" height="100px"/ >
              <span class="kt-header__topbar-welcome" style="word-break: break-word;">{{$original_filename}}</span>
            </div>
            <?php
          }
        ?>
        @endforeach
      @endisset
    </div>
  </div>
  <div class="col-md-4" id="menu3" style="display:none;">
    <div class="right-side">
      <div class="right-side-img">
        <img class="selectFile" src="" id="selectedimage">
      </div>
      <div class="url-bar">
        <label>URL :</label>
        <input class="url-input" type="text" value="" id="imageurl">
      </div>
    </div>
  </div>
</div>

<nav class="pagenation-block" aria-label="Page navigation example">
  <ul class="pagination">
    @if(!empty($allmedia) and sizeof($allmedia))
      {{ $allmedia->appends(Request::except('page'))->links() }}
    @endif
  </ul>
</nav>
