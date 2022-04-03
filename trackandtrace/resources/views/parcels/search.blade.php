@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="col-12 w-50 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Find your package</h3>
                </div>
                <form action="{{ route('parcels.status') }}" method="POST">
                    @csrf
                    @method('put')
                    <input type="number" name="TrackingNumber" class="form-control w-75 mx-auto m-2" placeholder="Tracking Number..." required/></td>
                    <div class="d-grid mt-3">
                      <input type="submit" class="btn btn-success w-20 mx-auto m-2" value="Check">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
