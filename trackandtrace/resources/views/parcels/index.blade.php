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
                    <a class="btn btn-success" href="{{ route('package.csvimport') }}"> Csv Import</a>
                @endif
               </div>
         </div>
      </div>
      <div class="row">
         <div class="col-12 col-sm-12">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">{{__('parcels.packages')}}</h3>
               </div>
               <!-- /.card-header -->
                    @csrf
                <div class="card-body">
                        <table id="" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <td id="deliveryservice">@sortablelink('deliveryservice')</td>
                                    <td id="package_name">@sortablelink('parcel_label.Package_name' , 'package name')</td>
                                    <td id="name_sender">@sortablelink('parcel_label.Name_sender' , 'name sender')</td>
                                    <td id="shop">@sortablelink('shop.name' , 'shop')</td>
                                    <td id="status">@sortablelink('parcel_status.state' , 'status')</td>
                                    <td id="customer_name">@sortablelink('receiver.name' , 'customer name')</td>
                                    @if(auth()->user()->role_id == 4)
                                    <td>Review geven</td>
                                    @endif
                                    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                        <td id="pickup_time">@sortablelink('pickup.time' , 'pickup time')</td>
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
                                    @if($package->pickup !== null)
                                    <td>{{$package->pickup->time}}</td>
                                    @endif
                                    @if($package->pickup == null)
                                    <td><a id="time{{$package->id}}" class="btn btn-primary" href="{{ route('pickup.create',$package) }}">add delivery time</a></td>
                                    @endif
                                @endif
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <td>{{__('parcels.deliveryserivce')}}</td>
                                    <td>{{__('parcels.packagename')}}</td>
                                    <td>{{__('parcels.sendername')}}</td>
                                    <td>{{__('parcels.shop')}}</td>
                                    <td>{{__('parcels.status')}}</td>
                                    <td>{{__('parcels.customername')}}</td>
                                    @if(auth()->user()->role_id == 4)
                                    <td>{{__('parcels.review')}}</td>
                                    @endif
                                    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                    <td>{{__('parcels.pickuptime')}}</td>
                                    @endif
                                </tr>
                            </tfoot>
                        </table>
                        <div class="mt-4">
                            {!! $packages->links('pagination::bootstrap-4')!!}
                        </div>
                    </div>
               <!-- /.card-body -->
            </div>
         </div>
      </div>
   </div>
</section>

@endsection
