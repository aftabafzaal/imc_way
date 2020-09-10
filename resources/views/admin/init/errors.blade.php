@if (count($errors) > 0)
<div class="">
    <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <div class="cont">

            <ul>
                <li><strong>Whoops!</strong> There were some problems with your input.</li>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <div class="alert__icon"><span></span></div>

        </div>
    </div>
</div>
@endif