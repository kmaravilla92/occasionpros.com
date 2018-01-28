<div class="event-status">
    @if($status == '0')
        <p>Application Status<br><span style="color:#e5a037;"><i class="fa fa-exclamation" aria-hidden="true" style="color:#e5a037;"></i>Pending</span></p>
    @endif
    @if($status == '1')
        <p>Application Status<br><span style="color:#32871c;"><i class="fa fa-check" aria-hidden="true" style="color:#32871c;"></i>Hired</span></p>
    @endif
    @if(in_array($status, ['2','4']))
        <p>Application Status<br>
            <span style="color:#e5a637;">
                Event Successfully Ended <br>
                @if($status == '4')
                    <em>* Payment was released by the client ready for you to request a fund transfer from OP.</em>
                @else
                    <em>* Waiting for client to release payment.</em>
                @endif
            </span>
        </p>
    @endif
    @if($status == '3')
        <p>Application Status<br><span style="color:#a93f30;"><i class="fa fa-times" aria-hidden="true" style="color:#a93f30;"></i>Not Hired</span></p>
    @endif

</div>