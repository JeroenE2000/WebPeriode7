<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    @foreach($labels as $label)
    <p>{{$label->TrackingNumber}}</p>
    <div class="mb-3">{!! DNS1D::getBarcodeHTML($label->TrackingNumber, 'UPCA') !!}</div>
    @endforeach

</body>
</html>
