@extends('layouts.admin')

@section('content')
<section class="content">
    @foreach($reviews as $r)
    {{$r->user->name}}
    {{$r->stars}}
    {{$r->description}}
    {{$r->shop->name}}
    @endforeach
 </section>
@endsection
