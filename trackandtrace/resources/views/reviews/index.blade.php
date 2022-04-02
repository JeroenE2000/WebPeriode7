@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="row">
            @foreach($reviews as $r)
            <div class="col-md-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{$r->user->name}}</h3>
                </div>
                <div class="card-body">
                    {{$r->stars}} <br>
                    {{$r->description}} <br>
                    {{$r->shop->name}}
                    <br>
                </div>
                </div>
            </div>
     @endforeach
        </div>
 </section>
@endsection
