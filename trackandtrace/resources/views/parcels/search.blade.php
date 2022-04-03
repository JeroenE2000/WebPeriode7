@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Find your package</h3>
                </div>
                <form action="{{ route('parcels.status') }}" method="POST">
                    @csrf
                    @method('put')
                    <input type="number" name="TrackingNumber" class="form-control" required/></td>
                    <div class="d-grid mt-3">
                      <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
                {{-- <div class="pull-right mt-3">
                    <a class="btn btn-primary" href="{{ route('parcels.status') }}"> Back</a>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
