

@foreach ($art as $art)
    <p>id: {{ $art->id }}</p>
    <p>titre: {{ $art->titre }}</p>
    <p>date: {{ $art->dateEcrit }}</p>
    <img src="{{ URL::to('/') }}{{ $turl[$art->id] }}"></img>

@endforeach


    <!-- @foreach ($turl as $turl)
    <img src="{{ URL::to('/') }}{{ $turl[$art->id-1] }}"></img>
    @endforeach -->

   