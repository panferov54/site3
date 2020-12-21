<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Laravel</title>
</head>
<body>
<div class="container">
    <div class="content">
        <div style="color: blue;font-size: 5rem">Laravel From testcontroller@index</div>
    <p style="color: red;font-size: 5rem">Случайное значение : {{$data1}}</p>
        @if($data1>500)
            <p>случайное число больше 500</p>
        @else <p>случайное число меньше  500</p>
            @endif
        <ul>
        @foreach($data2 as $elem)
            <li style="color: darkblue;list-style-type: none;">{{$elem}}</li>
        @endforeach
        </ul>
    </div>
</div>
</body>
</html>
try{
DB::connection()->getPdo();
}catch (\Exception $e){
die("Could not connect to the database.  Please check your configuration. error:" . $e );
}