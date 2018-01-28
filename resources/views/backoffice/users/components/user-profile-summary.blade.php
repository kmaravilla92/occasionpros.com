<div class="{{$col_md}}">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">User</h3>
        </div>
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" alt="User profile picture" src="{{ asset('backoffice/dist/img/user4-128x128.jpg') }}">

            <h3 class="profile-username text-center">{{ isset($user->id) ? $user->full_name : '' }}</h3>

            <!-- <p class="text-muted text-center">Client</p> -->

            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Events Posted</b> <a class="pull-right">{{count($userProfile['events'])}}</a>
                </li>
                <li class="list-group-item">
                    <b>Professionals Hired</b> <a class="pull-right">{{count($userProfile['hired_pros'])}}</a>
                </li>
                <!-- <li class="list-group-item">
                    <b>Connections</b> <a class="pull-right">13,287</a>
                </li> -->
            </ul>
            <!-- <a class="btn btn-primary btn-block" href="#"><b>VIEW PROFILE</b></a> -->
        </div>
    </div>
</div>