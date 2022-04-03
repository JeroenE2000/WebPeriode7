@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Your package's status</h3>
                </div>
                {{$parcel->parcel_status->state}}
            </div>
        </div>
    </section>
@endsection
