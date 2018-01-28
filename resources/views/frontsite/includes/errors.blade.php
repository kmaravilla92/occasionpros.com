@if(count($errors->all()) > 0 || count(session('customErrors')) > 0))
    <br>
    <div class="alert alert-danger alert-dismissible" style="margin: 0 15px;">
        <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
        <?php $errors = session('customErrors') ? session('customErrors') : $errors->all() ?>
        @foreach($errors as $error)
            {{ $error}} <br/>
        @endforeach
    </div>
@endif

@if(session('form.success'))
    <br>
    <div class="alert alert-success alert-dismissible" style="margin: 0 15px;">
        <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
        <h4><i class="icon fa fa-ban"></i> Success!</h4>
        {{ session('form.success') }}
    </div>
@endif
