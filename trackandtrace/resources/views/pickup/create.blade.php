@extends('layouts.admin')

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
    <form action="{{ route('pickup.store' , $packageId) }}" method="POST">
        @csrf
        @method('post')
        <input type="datetime-local" name="time" class="form-control" />
        <div class="d-grid mt-3">
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>
    </form>
</section>
@endsection
