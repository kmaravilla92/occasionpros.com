@if($status == 0)
    <div class="event-needs-verification error">
    <i class="fa fa-ban"></i>
    This event needs manual verification from you. Click <a href="{{route('frontsite.events.verify', ['event_id' => $event['id'], 'reverify' => 1])}}" style="color: #fff;"><strong>HERE</strong></a> to verify.
    </div>
@elseif($status == 1)  
    <div class="event-needs-verification warning">
    <i class="fa fa-exclamation-triangle"></i>
    This event has been verified by you, just need another verification from the Admin via a phone call.
    </div>
@else
    <div class="event-needs-verification success">
    <i class="fa fa-check"></i>
    Event verified and visible to Pros.
    </div>
@endif