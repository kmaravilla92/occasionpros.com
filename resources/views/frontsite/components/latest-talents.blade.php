@inject('images', '\App\Services\File\Images')
<div class="section latest-talent">
    <div class="title-holder">
        <h3>
            <span>Featured</span>
            LATEST TALENTS
        </h3>
        <hr>
    </div>
    @forelse($latest_talents as $latest_talent)
        <div class="talent-holder">
            <div class="img-holder">
                <img src="{{$images->getImage('users/'.$latest_talent['id'].'/original.jpg')}}" alt="">
            </div>
            <div class="text-holder box">
                <a href="{{route('frontsite.professionals.profile',[$latest_talent['id']])}}">{{$latest_talent['full_name']}}</a>
                <p>
                    {{
                        collect($latest_talent['profile_information']['selected_categories'])->map(function($c){
                            return $c['professional_category'][0]['title'];
                        })->implode('/')
                    }}
                </p>
                <p>{{$latest_talent['profile_information']['location']}}</p>
                <p>11 miles from location</p>
            </div>
        </div>
    @empty
    @endforelse
    <!-- <div class="talent-holder">
    
        <div class="img-holder">
    
            <img src="/frontsite/images/talent1.jpg" alt="">
    
        </div>
    
        <div class="text-holder box">
    
            <h3>Persons name goes here</h3>
    
            <p>Stand-Up Comedian / Actor</p>
    
            <p>Ca,</p>
    
            <p>11 miles from location</p>
    
        </div>
    
    </div>
    
    <div class="talent-holder">
    
        <div class="img-holder">
    
            <img src="/frontsite/images/talent2.jpg" alt="">
    
        </div>
    
        <div class="text-holder box">
    
            <h3>Persons name goes here</h3>
    
            <p>Stand-Up Comedian / Actor</p>
    
            <p>Ca,</p>
    
            <p>11 miles from location</p>
    
        </div>
    
    </div>
    
    <div class="talent-holder">
    
        <div class="img-holder">
    
            <img src="/frontsite/images/talent3.jpg" alt="">
    
        </div>
    
        <div class="text-holder box">
    
            <h3>Persons name goes here</h3>
    
            <p>Stand-Up Comedian / Actor</p>
    
            <p>Ca,</p>
    
            <p>11 miles from location</p>
    
        </div>
    
    </div>
    
    <div class="talent-holder">
    
        <div class="img-holder">
    
            <img src="/frontsite/images/talent4.jpg" alt="">
    
        </div>
    
        <div class="text-holder box">
    
            <h3>Persons name goes here</h3>
    
            <p>Stand-Up Comedian / Actor</p>
    
            <p>Ca,</p>
    
            <p>11 miles from location</p>
    
        </div>
    
    </div> -->
</div>