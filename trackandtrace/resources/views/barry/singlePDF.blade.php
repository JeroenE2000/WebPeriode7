<!DOCTYPE html>
<html>
<head>
    <title>PDF print</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>

    {{$labels->TrackingNumber}}
    <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'UPCA') !!}</div>


</body>
</html>
