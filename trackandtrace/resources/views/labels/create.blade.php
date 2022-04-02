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
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Labels aanmaken</h3>
                </div>
                <form action="{{ route('labels.store') }}" method="POST">
                    @csrf
                    <table class="table" id="multiForm">
                        <thead>
                            <tr>
                                <th>TrackingNumber</th>
                                <th>Package_name</th>
                                <th>Name_Sender</th>
                                <th>Address_Sender</th>
                                <th>Name_Reciever</th>
                                <th>Address_Reciever</th>
                                <th>Date</th>
                                <th>Dimensions</th>
                                <th>Weight</th>
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
                    <a class="btn btn-primary" href="{{ route('labels.index') }}"> Back</a>
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
