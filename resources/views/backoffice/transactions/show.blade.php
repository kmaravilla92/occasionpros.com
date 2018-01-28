@extends('backoffice.master')
@section('content')
@include('backoffice.includes.errors')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a aria-expanded="true" href="#event-details" data-toggle="tab">Details</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="event-details">
                            <div class="box-body">
                                <strong>
                                    <i class="fa fa-slack margin-r-5"></i>
                                    Code
                                </strong>
                                <p class="text-muter">
                                    {{ $transaction->code }}
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-user margin-r-5"></i>
                                    Paid To
                                </strong>
                                <p class="text-muter">
                                    <?php 
                                        $paidFor = $transaction->paidFor()->first();
                                    ?>
                                    {{ $paidFor->full_name }} ( {{$paidFor->email}} )
                                    <a href="{{route('backoffice.users.edit',[$paidFor->id])}}" class="label bg-blue" target="_blank">
                                        <i class="fa fa-eye"></i>&nbsp;View Details
                                    </a>
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-user margin-r-5"></i>
                                    Paid By
                                </strong>
                                <p class="text-muter">
                                    <?php 
                                        $paidBy = $transaction->paidBy()->first();
                                    ?>
                                    {{ $paidBy->full_name }} ( {{$paidBy->email}} )
                                    <a href="{{route('backoffice.users.edit',[$paidBy->id])}}" class="label bg-blue" target="_blank">
                                        <i class="fa fa-eye"></i>&nbsp;View Details
                                    </a>
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-calendar margin-r-5"></i>
                                    Event
                                </strong>
                                <p class="text-muter">
                                    <?php 
                                        $event = $transaction->event()->first();
                                    ?>
                                    {{ $event->title }}
                                    <a href="{{route('backoffice.event-posts.show',[$event->id])}}" class="label bg-blue" target="_blank">
                                        <i class="fa fa-eye"></i>&nbsp;View Details
                                    </a>
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-usd margin-r-5"></i>
                                    Amount
                                </strong>
                                <p class="text-muter">
                                    $ {{ $transaction->amount }}
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-usd margin-r-5"></i>
                                    Amount ( 5% Fee applied )
                                </strong>
                                <p class="text-muter">
                                    $ {{ $transaction->feed_amount }}
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-gear margin-r-5"></i>
                                    Status
                                </strong>
                                <p class="text-muter">
                                    {{ $transaction->status_text }}
                                </p>
                                <hr>

                                <?php
                                    $hasActions = false;
                                    if(isset($transaction->status) && in_array($transaction->status,['0','1'])){
                                        $hasActions = true;
                                    }
                                ?>
                                @if($hasActions)
                                    <strong>
                                        <i class="fa fa-gear margin-r-5"></i>
                                        Actions
                                    </strong>
                                    <br><br>
                                @endif
                                {!!
                                     Form::open([
                                        'url' => route('backoffice.transactions.release-fund',[$transaction->id]),
                                        'method' => 'POST'
                                     ])
                                !!}
                                    <div class="row">
                                        @if(isset($transaction->status) && in_array($transaction->status,['0','1']))
                                            <div class="col-md-12">
                                                <input id="transaction_actions[release_fund]" name="transaction_actions[release_fund]" type="checkbox" value="1">
                                                <label for="transaction_actions[release_fund]" class="control-label">Release Fund</label>
                                            </div>
                                        @endif
                                    </div>
                                    @if($hasActions)
                                        <br>
                                        <button type="submit" class="btn btn-primary">Apply Selected Actions</button>
                                    @endif
                                {!!
                                    Form::close()
                                !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
