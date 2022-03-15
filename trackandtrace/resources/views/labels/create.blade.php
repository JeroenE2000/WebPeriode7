@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
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
                <h3 class="card-title">Labels aanmaken</h3>
            </div>
            <form action="{{ route('labels.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="title">TrackingNumber:&#42;</label>
                    <input type="text" name="TrackingNumber" class="form-control" required></input>
                </div>
                <div class="form-group">
                    <label class="form-label" for="Package_name">Package name:&#42;</label>
                    <input type="text" name="Package_name" class="form-control" required></input>
                </div>
                <div class="form-group">
                    <label class="form-label" for="Name_Sender">Name sender:</label>
                    <input type="text" name="Name_Sender" class="form-control"></input>
                </div>
                <div class="form-group">
                    <label class="form-label" for="Address_Sender">Address Sender:&#42;</label>
                    <input type="text" name="Address_Sender" class="form-control" required></input>
                </div>
                <div class="form-group">
                    <label class="form-label" for="Name_Reciever">Name Receiver:&#42;</label>
                    <input type="text" name="Name_Reciever" class="form-control" required></input>
                </div>
                <div class="form-group">
                    <label class="form-label" for="Address_Reciever">Adress Receiver:&#42;</label>
                    <input type="text" name="Address_Reciever" class="form-control" required></input>
                </div>
                <div class="form-group">
                    <label class="form-label" for="Date">Date:&#42;</label>
                    <input type="date" name="Date" class="form-control" required></input>
                </div>
                <div class="form-group">
                    <label class="form-label" for="Dimensions">Dimisions:&#42;</label>
                    <input type="text" name="Dimensions" class="form-control" required></input>
                </div>
                <div class="form-group">
                    <label class="form-label" for="Weight">Weight:&#42;</label>
                    <input type="number" name="Weight" class="form-control" required></input>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('labels.index') }}"> Back</a>
            </div>
        </div>
    </div>
</section>

@endsection
