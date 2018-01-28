<div class="tab-pane" id="groups">
    @if(count($roles))
        @foreach($roles as $role)
            <div class="col-md-3">
                {!!
					Form::checkbox(
                        'roles['.$role->id.']',
                        $role->id,
                        isset($user) && $user->role ? in_array($role->name, explode(',', $user->role)) : null,
                        [
                            'id' => $role->name
                        ]
                    )
                !!}
                <label for="{{$role->name}}" class="control-label">{{$role->name}}</label>
            </div>
        @endforeach
    @endif
    <br>
    <div class="pull-right">
        <button type="submit" class="btn btn-primary">SAVE</button>
    </div>
    <div class="clearfix"></div>
</div>