


{{'test'}}

<?php
var_dump($art[0])



?>

<p>url corrige: {{ $str }}</p>

@foreach ($art as $art)
    <p>id: {{ $art->id }}</p>
    <p>titre: {{ $art->titre }}</p>
    <p>date: {{ $art->dateEcrit }}</p>
    <p>url de img_url: {{ $art->img_url }}</p>
    <img src="{{ URL::to('/') }}{{ $turl[$art->id] }}"></img>

@endforeach


    <!-- @foreach ($turl as $turl)
    <img src="{{ URL::to('/') }}{{ $turl[$art->id-1] }}"></img>
    @endforeach -->

   