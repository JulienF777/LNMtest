<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css" rel="stylesheet">
    <title>La Nuit MMI</title>
</head>
<body>
    <div class="centre">
        <div class="article">
@foreach ($art as $art)
    <div class="cock">
    <p>id: {{ $art->id }}</p>
    <p>titre: {{ $art->titre }}</p>
    <p>date: {{ $art->dateEcrit }}</p>
    <img src="{{ URL::to('/') }}{{ $turl[$art->id] }}"></img>
    </div>
@endforeach

    <!-- @foreach ($turl as $turl)
    <img src="{{ URL::to('/') }}{{ $turl[$art->id-1] }}"></img>
    @endforeach -->
     </div>
    </div>
</body>
</html>

