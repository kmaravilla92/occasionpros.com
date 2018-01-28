<div class="tab-pane" id="password">
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password</label>

        <div class="col-sm-10">
            {!!
                Form::password(
                    'password',
                    [
                        'class' => 'form-control',
                        'placeholder' => 'Password'
                    ]
                )
            !!}
        </div>
    </div>
    
    <div class="form-group">
        <label for="password_confirmation" class="col-sm-2 control-label">Confirm Password</label>

        <div class="col-sm-10">
            {!!
                Form::password(
                    'password_confirmation',
                    [
                        'class' => 'form-control',
                        'placeholder' => 'Password Confirmation'
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