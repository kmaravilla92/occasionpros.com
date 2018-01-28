@section('css_head')
@parent
@endsection

@section('js_bottom')
@parent
<script src="//www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>
<script>
    var config = {
        apiKey: "AIzaSyCYQn1vlI9mhXOZ9VModh2QGmUK4wxCU2M",
        authDomain: "occasions-pros-1492933753153.firebaseapp.com",
        databaseURL: "https://occasions-pros-1492933753153.firebaseio.com",
        projectId: "occasions-pros-1492933753153",
        storageBucket: "occasions-pros-1492933753153.appspot.com",
        messagingSenderId: "1035786149712"
    };

    firebase.initializeApp(config);
</script>
@endsection