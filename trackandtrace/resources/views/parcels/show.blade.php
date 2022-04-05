
@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="col-12 w-50 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{__('parcels.searchpackage')}}</h3>
                </div>
               @foreach($parcel as $p)
                    <div class="w-75 mx-auto m-2">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{$p->parcel_label->Package_name}}</h3>
                            </div>
                            <div class="card-body">
                                {{$p->parcel_label->Dimensions}} cm<br>
                                {{$p->parcel_label->Weight}} KG<br>
                                Address: {{$p->parcel_label->Address_Reciever}}<br>
                                <input class="form-control" value="{{$p->parcel_status->state}}" disabled>
                            </div>
                        </div>
                    </div>
               @endforeach
               <div class="pull-right mt-3 mx-auto m-2">
                <a class="btn btn-primary" href="{{ route('parcels.search') }}"> Back</a>
            </div>
            </div>
        </div>
    </section>
@endsection
