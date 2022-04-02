@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/review.css') }}">
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
    <form action="{{ route('review.store') }}" method="POST">
        @csrf
        <input type="number" name="user_id" class="form-control" hidden value="{{$user->id}}"/>
        <input type="text" name="shop_id" class="form-control" hidden value="{{$package->shop_id}}"/>
            <p>Stars</p>
            <input type="number" step="0.1" name="stars" class="form-control" required/>
            <p>Description</p>
            <input type="text" name="description" class="form-control" required/>
            <div class="d-grid mt-3">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
    </form>
</section>
@endsection
