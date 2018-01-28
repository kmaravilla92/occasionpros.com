<p>
    Hi {{$data['event']['owner']['first_name']}} {{$data['event']['owner']['last_name']}}, <br/>
    You are almost done in posting your event. <br/>
    Please click <a href="{{route('frontsite.events.verify',[$data['event']['id']])}}" target="_blank">here</a> to confirm your event. <br/>
    Once you verified your event, an OP support will contact you via phone for another verification.<br/>
    Thank you, <br/>
    OP
</p>