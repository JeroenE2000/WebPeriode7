@extends('layouts.admin')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>{{('errors.Whoops')}}</strong> {{('errors.errorMessage')}}<br><br>
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
                    <h3 class="card-title">{{__('shops.create')}}</h3>
                </div>
                <form action="{{ route('shops.store') }}" method="POST">
                    @csrf
                    <table class="table" id="multiForm">
                        <thead>
                            <tr>
                                <th>{{__('shops.name')}}</th>
                                <th>{{__('shops.streetname')}}</th>
                                <th>{{__('shops.streetnumber')}}</th>
                                <th>{{__('shops.postalcode')}}</th>
                                <th>{{__('shops.KVKnumber')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input type="text" name="name" class="form-control" required/></td>
                            <td><input type="text" name="streetname" class="form-control" required/></td>
                            <td><input type="text" name="streetnumber" class="form-control"required/></td>
                            <td><input type="text" name="postalcode" class="form-control" required/></td>
                            <td><input type="number" name="KVKnumber" class="form-control" required/></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="d-grid mt-3">
                      <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
                <div class="pull-right mt-3">
                    <a class="btn btn-primary" href="{{ route('shops.index') }}">{{__('shops.back')}}</a>
                </div>
            </div>
        </div>
    </section>
@endsection
