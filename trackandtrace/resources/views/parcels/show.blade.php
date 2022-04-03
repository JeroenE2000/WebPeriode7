@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Your package's status</h3>
                </div>
               @foreach($parcel as $p)
                    {{$p->parcel_status->state}}
               @endforeach
            </div>
        </div>
    </section>
@endsection
