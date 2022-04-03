@extends('layouts.admin')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <strong>{{__('errors.Whoops')}}</strong> {{__('errors.errorMessage')}}<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<section class="content">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{__('labels.updatelabelheader')}} {{$label->Package_name}} </h3>
            </div>
            <form action="{{route ('labels.update' , $label->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" for="title">{{__('labels.trackingNumber')}}</label>
                        <input type="number" name="TrackingNumber" value="{{$label->TrackingNumber}}" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="Package_name">{{__('labels.packagename')}}</label>
                        <input type="text" name="Package_name" value="{{$label->Package_name}}" class="form-control" required></input>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="Name_Sender">{{__('labels.namesender')}}</label>
                        <input type="text" name="Name_Sender"  value="{{$label->Name_Sender}}"class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="Address_Sender">{{__('labels.addresssender')}}</label>
                        <input type="text" name="Address_Sender" value="{{$label->Address_Sender}}" class="form-control" required></input>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="Name_Reciever">{{__('labels.recievername')}}</label>
                        <input type="text" name="Name_Reciever" value="{{$label->Name_Reciever}}" class="form-control" required></input>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="Address_Reciever">{{__('labels.addressreciever')}}</label>
                        <input type="text" name="Address_Reciever" value="{{$label->Address_Reciever}}" class="form-control" required></input>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="Date">{{__('labels.date')}}</label>
                        <input type="date" name="Date" value="{{$label->Date}}"class="form-control" required></input>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="Dimensions">{{__('labels.dimensions')}}</label>
                        <input type="text" name="Dimensions" value="{{$label->Dimensions}}" class="form-control" required></input>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="Weight">{{__('labels.weight')}}</label>
                        <input type="number" name="Weight" value="{{$label->Weight}}" class="form-control" required></input>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('labels.index') }}"> Back</a>
            </div>
        </div>
    </div>
</section>

@endsection
