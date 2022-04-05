<!DOCTYPE html>
<html>
<head>
    <title>Packr Label</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<style>
     .table > tbody > tr > .no-line {
        border-top: none;
    }

    .table > thead > tr > .no-line {
        border-bottom: none;
    }
    .table > tbody > tr > .thick-line {
        border-top: 10px solid;
    }
    .thead > tr > .no-line {
        font-weight: bold;
        border-top: none;
    }

</style>
<body>

@foreach($labels as $label)
    <div class="container">
        <div class="row">
            <div class="col">
                <div>
                    <h2>{{__('labels.shopname')}} : {{$label->shop->name}}</h2>
                    <p>{{ $date }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'UPCA') !!}</div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-condesed">
                    <tr class="thead">
                        <td class="no-line"><strong>{{__('labels.trackingNumber')}}</strong></td>
                        <td class="text-left no-line"><strong>{{__('labels.packagename')}}</strong></td>
                        <td class="text-center no-line"><strong>{{__('labels.namesender')}}</strong></td>
                        <td class="text-center no-line"><strong>{{__('labels.addresssender')}}</strong></td>
                        <td class="text-center no-line"><strong>{{__('labels.recievername')}}</strong></td>
                    </tr>
                    <tbody>
                        <tr>
                            <td>{{$label->parcel_label->TrackingNumber}}</td>
                            <td>{{$label->parcel_label->Package_name}}</td>
                            <td>{{$label->parcel_label->Name_Sender}}</td>
                            <td>{{$label->parcel_label->Address_Sender}}</td>
                            <td>{{$label->parcel_label->Name_Reciever}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endforeach

</body>
</html>


