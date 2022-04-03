@extends('layouts.admin')

@section('content')

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12 margin-tb">
               <div class="pull-right">
                @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                    <a class="btn btn-success" href="{{ route('package.create') }}"> Nieuwe pakket aanmaken</a>
                    <a class="btn btn-success" href="{{ route('package.csvimport') }}"> Csv Import</a>
                @endif
               </div>
         </div>
      </div>
      <div class="row">
         <div class="col-12 col-sm-12">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Packages</h3>
               </div>
               <!-- /.card-header -->
                    @csrf
                <div class="card-body">
                        <table id="" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <td>@sortablelink('deleveryservice' , 'deleveryservice')</td>
                                    <td>@sortablelink('parcel_label.Package_name' , 'package name')</td>
                                    <td>@sortablelink('parcel_label.Name_sender' , 'name sender')</td>
                                    <td>@sortablelink('shop.name' , 'shop')</td>
                                    <td>@sortablelink('parcel_status.state' , 'status')</td>
                                    <td>@sortablelink('receiver.name' , 'customer name')</td>
                                    @if(auth()->user()->role_id == 4)
                                    <td>Review geven</td>
                                    @endif
                                    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                    <td>deliverty time</td>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($packages as $package)
                                <tr>
                                <td>{{$package->id}}</td>
                                <td><i class="nav-icon fas fa-truck"></i> {{$package->deliveryservice}}</td>
                                <td><i class="nav-icon fas fa-box"></i> {{$package->parcel_label->Package_name}}</td>
                                <td><i class="nav-icon fas fa-user"></i> {{$package->parcel_label->Name_Sender}}</td>
                                <td><i class="nav-icon fas fa-store"></i> {{$package->shop->name}}</td>
                                <td>{{$package->parcel_status->state}}</td>
                                <td>{{$package->receiver->name}}</td>
                                @if(auth()->user()->role_id == 4)
                                <td><a class="btn btn-primary" href="{{ route('review.create',$package) }}">add Review</a></td>
                                @endif
                                @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                <td><a class="btn btn-primary" href="{{ route('pickup.create',$package) }}">add delivery time</a></td>
                                @endif
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <td>deleveryservice</td>
                                    <td>Package name</td>
                                    <td>Name sender</td>
                                    <td>shop</td>
                                    <td>status</td>
                                    @if(auth()->user()->role_id == 4)
                                    <td>Review geven</td>
                                    @endif
                                    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                    <td>deliverty time</td>
                                    @endif
                                </tr>
                            </tfoot>
                        </table>
                    </div>
               <!-- /.card-body -->
            </div>
         </div>
      </div>
   </div>
</section>

@endsection
