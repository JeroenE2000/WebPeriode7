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
    <div class="rating">
        <input>
    </div>
</section>
@endsection
