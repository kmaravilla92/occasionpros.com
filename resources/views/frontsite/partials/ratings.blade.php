@foreach(range(1,5) as $i)
    <i class="fa fa-star{{$i <= $rating ? '' : '-o'}}" aria-hidden="true"></i>
@endforeach