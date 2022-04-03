@extends('layouts.admin')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>{{__('errors.Whoops')}}</strong> {{__('errors.errorMessage')}}<br><br>
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
                    <h3 class="card-title">{{__('labels.createlabelsheader')}}</h3>
                </div>
                <form action="{{ route('labels.store') }}" method="POST">
                    @csrf
                    <table class="table" id="multiForm">
                        <thead>
                            <tr>
                                <th>{{__('labels.trackingNumber')}}</th>
                                <th>{{__('labels.packagename')}}</th>
                                <th>{{__('labels.namesender')}}</th>
                                <th>{{__('labels.addresssender')}}</th>
                                <th>{{__('labels.recievername')}}</th>
                                <th>{{__('labels.addressreciever')}}</th>
                                <th>{{__('labels.date')}}</th>
                                <th>{{__('labels.dimensions')}}</th>
                                <th>{{__('labels.weight')}}</th>
                                @if(auth()->user()->role_id == 1)
                                <th>shopID</th>
                                @endif
                                <th>Toevoegen</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input type="number" name="multiInput[0][TrackingNumber]" class="form-control" required/></td>
                            <td><input type="text" name="multiInput[0][Package_name]" class="form-control" required/></td>
                            <td><input type="text" name="multiInput[0][Name_Sender]" class="form-control"required/></td>
                            <td><input type="text" name="multiInput[0][Address_Sender]" class="form-control" required/></td>
                            <td><input type="text" name="multiInput[0][Name_Reciever]" class="form-control" required/></td>
                            <td><input type="text" name="multiInput[0][Address_Reciever]" class="form-control" required/></td>
                            <td><input type="date" name="multiInput[0][Date]" class="form-control" required/></td>
                            <td><input type="text" name="multiInput[0][Dimensions]" class="form-control" required/></td>
                            <td><input type="number" name="multiInput[0][Weight]" class="form-control" required/></td>
                            @if(auth()->user()->role_id !== 1)
                            <td><input type="number" name="multiInput[0][shop_id]" class="form-control" hidden value="{{$shop}}"/></td>
                            @endif
                            @if(auth()->user()->role_id === 1)
                            <td><input type="number" name="multiInput[0][shop_id]" class="form-control"/></td>
                            @endif
                            <td><input type="button" name="add" value="Add" id="addRemoveIp" class="btn btn-outline-dark" required></td>
                        </tr>
                        </tbody>

                    </table>
                    <div class="d-grid mt-3">
                      <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
                <div class="pull-right mt-3">
                    <a class="btn btn-primary" href="{{ route('labels.index') }}"> {{__('pagination.previous')}}</a>
                </div>
            </div>
        </div>
    </section>
    <script>
        var i = 0;
        $("#addRemoveIp").click(function () {
            ++i;
            $("#multiForm").append('<tr><td><input type="number" name="multiInput['+i+'][TrackingNumber]" class="form-control" required/></td><td><input type="text" name="multiInput['+i+'][Package_name]" class="form-control" required /></td><td><input type="text" name="multiInput['+i+'][Name_Sender]" class="form-control" required/> </td><td><input type="text" name="multiInput['+i+'][Address_Sender]" class="form-control" required/></td><td><input type="text" name="multiInput['+i+'][Name_Reciever]" class="form-control" required/></td> <td><input type="text" name="multiInput['+i+'][Address_Reciever]" class="form-control" required/></td><td><input type="date" name="multiInput['+i+'][Date]" class="form-control" required/></td><td><input type="text" name="multiInput['+i+'][Dimensions]" class="form-control" required/></td><td><input type="number" name="multiInput['+i+'][Weight]" class="form-control" required/></td> @if(auth()->user()->role_id !== 1)<td><input type="number" name="multiInput['+i+'][shop_id]" class="form-control" hidden value="{{$shop}}"/></td> @endif @if(auth()->user()->role_id === 1)<td><input type="number" name="multiInput['+i+'][shop_id]" class="form-control"/></td>@endif<td><button type="button" class="remove-item btn btn-danger">Delete</button></td></tr>');
        });
        $(document).on('click', '.remove-item', function () {
            $(this).parents('tr').remove();
        });
    </script>

@endsection
