@extends('backoffice.master')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a aria-expanded="true" href="#event-details" data-toggle="tab">Details</a></li>
                        <li><a aria-expanded="true" href="#event-bids" data-toggle="tab">Bids</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="event-details">
                            <div class="box-body">
                                <strong>
                                    <i class="fa fa-book margin-r-5"></i>
                                    Title
                                </strong>
                                <p class="text-muter">
                                    {{ $ad_post->title }}
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-file-text margin-r-5"></i>
                                    Description
                                </strong>
                                <p class="text-muter">
                                    {{ $ad_post->description }}
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-file margin-r-5"></i>
                                    Event Type
                                </strong>
                                <p class="text-muter">
                                    {{ $ad_post->type->title }}
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-usd margin-r-5"></i>
                                    Event Budget
                                </strong>
                                <p class="text-muter">
                                    {{ $ad_post->budget }}
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-envelope margin-r-5"></i>
                                    Contact E-mail
                                </strong>
                                <p class="text-muter">
                                    {{ $ad_post->email }} &nbsp;
                                    <a href="mailto:{{$ad_post->email}}" class="label bg-blue" target="_blank">
                                        <i class="fa fa-envelope"></i>&nbsp; Send mail
                                    </a>
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-phone-square margin-r-5"></i>
                                    Contact Number
                                </strong>
                                <p class="text-muter">
                                    {{ $ad_post->contact_number }}&nbsp;
                                    <a href="mailto:{{$ad_post->email}}" class="label bg-blue" target="_blank">
                                        <i class="fa fa-phone"></i>&nbsp; Call
                                    </a>
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-calendar margin-r-5"></i>
                                    Event Date
                                </strong>
                                <p class="text-muter">
                                    {{ $ad_post->date }}
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-map-marker margin-r-5"></i>
                                    Event Location
                                </strong>
                                <p class="text-muter">
                                    {{ $ad_post->location }}
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-gear margin-r-5"></i>
                                    Status
                                </strong>
                                <p class="text-muter">
                                    {{ $ad_post->status_text }}
                                </p>
                                <hr>
                                <strong>
                                    <i class="fa fa-gear margin-r-5"></i>
                                    Actions
                                </strong>
                                <br><br>
                                {!!
                                     Form::open([
                                        'url' => route('backoffice.event-posts.apply-actions',[$ad_post->id])
                                     ])
                                 !!}
                                    <div class="row">
                                        @if(isset($ad_post->status) && $ad_post->status  != '2')
                                            <div class="col-md-12">
                                                <input id="event_actions[mark_as_confirmed]" name="event_actions[mark_as_confirmed]" type="checkbox" value="1">
                                                <label for="event_actions[mark_as_confirmed]" class="control-label">Mark as Confirmed</label>
                                            </div>
                                            {{--<div class="col-md-12">
                                                <input id="event_actions[mark_as_unconfirmed]" name="event_actions[mark_as_unconfirmed]" type="checkbox" value="1">
                                                <label for="event_actions[mark_as_unconfirmed]" class="control-label">Mark as Unconfirmed</label>
                                            </div>--}}
                                        @else
                                            {{--<div class="col-md-12">
                                                <input id="event_actions[mark_as_confirmed]" name="event_actions[mark_as_confirmed]" type="checkbox" value="1">
                                                <label for="event_actions[mark_as_confirmed]" class="control-label">Mark as Confirmed</label>
                                            </div>--}}
                                        @endif
                                        
                                        <div class="col-md-12">
                                            <input id="event_actions[notify_matched_professionals]" name="event_actions[notify_matched_professionals]" type="checkbox" value="1">
                                            <label for="event_actions[notify_matched_professionals]" class="control-label">Notify Matched Professionals</label>
                                        </div>
                                        
                                    </div>
                                    <br>
                                    <button type="submit" href="#" class="btn btn-primary">Apply Selected Actions</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="tab-pane" id="event-bids">

                                <table class="table" id="event-bids-table">
                                    <thead>
                                        <tr>
                                            <!-- <th>Actions</th> -->
                                            <th>From</th>
                                            <th>Created At</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($event_bids as $event_bid)
                                            <tr>
                                                <!-- <td>
                                                    <div class="btn-group">
                                                      <button type="button" class="btn btn-default">Actions</button>
                                                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                      </button>
                                                      <ul class="dropdown-menu" role="menu">
                                                        <li><a href="{{ route('event-posts.edit',$ad_post->id) }}"><i class="fa fa-pencil-square-o"></i>Edit</a></li>
                                                        <li>
                                                            <form class="item-delete-form {{ $ad_post->id }}" action="{{ route('event-posts.destroy',$ad_post) }}" method="POST">
                                                                {{ method_field('DELETE') }}
                                                                {{ csrf_field() }}
                                                            </form>
                                                            <a href="#" class="delete-item" data-id="{{ $ad_post->id }}"><i class="fa fa-trash-o"></i>Remove</a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li><a href="{{ route('event-posts.show',$ad_post->id) }}"><i class="fa fa-eye"></i>View Details</a></li>
                                                      </ul>
                                                    </div>
                                                </td> -->
                                                <td>{{ $event_bid->bidder()->first()->email }}</td>
                                                <td>{{ $event_bid->created_at }}</td>
                                                <td>{{ $event_bid->details }}</td>
                                            </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Owner</h3>
                    </div>
                    <div class="box-body box-profile">
                      <img class="profile-user-img img-responsive img-circle" alt="User profile picture" src="{{ asset('backoffice/dist/img/user4-128x128.jpg') }}">

                      <h3 class="profile-username text-center">{{ $ad_post->owner->email }}</h3>

                      <p class="text-muted text-center">Client</p>

                      <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                          <b>Events Posted</b> <a class="pull-right">{{$ad_post->owner->events()->count()}}</a>
                        </li>
                        <li class="list-group-item">
                          <b>Professionals Hired</b> <a class="pull-right">543</a>
                        </li>
                        <li class="list-group-item">
                          <b>Connections</b> <a class="pull-right">13,287</a>
                        </li>
                      </ul>

                      <a class="btn btn-primary btn-block" href="{{route('backoffice.users.edit',['id'=>$ad_post->owner->id])}}"><b>VIEW PROFILE</b></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('tail')
<script type="text/javascript">
    $(function(){
        $('#event-bids-table').DataTable();
    });
</script>
@endsection
