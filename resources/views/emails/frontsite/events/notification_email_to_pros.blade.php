<p>
    Hi {{$data['professional']['first_name']}} {{$data['professional']['last_name']}}, <br/>
    A new event has been posted in OP <br/>
    Please click <a href="{{route('frontsite.professionals.events.details',[$data['event']['id']])}}" target="_blank">here</a> to view the details. <br/>
    Thank you,<br/>
    OP
</p>
