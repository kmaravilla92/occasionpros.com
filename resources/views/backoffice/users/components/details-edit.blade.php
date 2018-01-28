<div class="tab-pane active" id="details">
  <div class="form-group">
      <label for="first_name" class="col-sm-2 control-label">First Name</label>

      <div class="col-sm-10">
        {!! 
          Form::text(
            'first_name',
            isset($user) ? $user->first_name : '',
            [
              'class' => 'form-control',
              'placeholder' => 'First Name'
            ]
          )  
        !!}
      </div>
    </div>
    <div class="form-group">
      <label for="text" class="col-sm-2 control-label">Last Name</label>

      <div class="col-sm-10">
        {!! 
          Form::text(
            'last_name',
            isset($user) ? $user->last_name : '',
            [
              'class' => 'form-control',
              'placeholder' => 'Last Name'
            ]
          )  
        !!}
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-sm-2 control-label">E-mail</label>

      <div class="col-sm-10">
        {!! 
          Form::text(
            'email',
            isset($user) ? $user->email : '',
            [
              'class' => 'form-control',
              'placeholder' => 'E-mail'
            ]
          )  
        !!}
      </div>
    </div>
    <div class="pull-right">
        <button type="submit" class="btn btn-primary">SAVE</button>
    </div>
    <div class="clearfix"></div>
</div>