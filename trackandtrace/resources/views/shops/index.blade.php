@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
       <div class="row">
          <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                 @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                     <a class="btn btn-success" href="{{ route('shops.create') }}">{{__('shops.create')}}</a>
                 @endif
                </div>
          </div>
       </div>
       <div class="row mt-4" >
          <div class="col-12 col-sm-12">
             <div class="card">
                <div class="card-header">
                   <h3 class="card-title">{{__('shops.title')}}</h3>
                </div>
                <!-- /.card-header -->
                 <div class="card-body">
                         <table id="" class="table table-bordered table-hover">
                             <thead>
                                 <tr>
                                 <th>{{__('shops.id')}}</th>
                                 <td>{{__('shops.name')}}</td>
                                 <td>{{__('shops.streetname')}}</td>
                                 <td>{{__('shops.streetnumber')}}</td>
                                 <td>{{__('shops.postalcode')}}</td>
                                 <td>{{__('shops.KVKnumber')}}</td>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach($shops as $s)
                                 <tr>
                                 <td>{{$s->id}}</td>
                                 <td>{{$s->name}}</td>
                                 <td>{{$s->streetname}}</td>
                                 <td>{{$s->streetnumber}}</td>
                                 <td>{{$s->postalcode}}</td>
                                 <td>{{$s->KVKnumber}}</td>
                                 </tr>
                                 @endforeach
                             </tbody>
                         </table>
                     </div>
                <!-- /.card-body -->
             </div>
          </div>
       </div>
    </div>
 </section>
@endsection
