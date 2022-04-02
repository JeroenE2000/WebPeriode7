@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
       <div class="row">
          <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                 @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                     <a class="btn btn-success" href="{{ route('shops.create') }}"> Shop maken</a>
                 @endif
                </div>
          </div>
       </div>
       <div class="row mt-4" >
          <div class="col-12 col-sm-12">
             <div class="card">
                <div class="card-header">
                   <h3 class="card-title">Shops</h3>
                </div>
                <!-- /.card-header -->
                 <div class="card-body">
                         <table id="" class="table table-bordered table-hover">
                             <thead>
                                 <tr>
                                 <th>id</th>
                                 <td>name</td>
                                 <td>streetname</td>
                                 <td>streetnumber</td>
                                 <td>postalcode</td>
                                 <td>KVKnumber</td>
                                 @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                 <td>Bijwerken</td>
                                 @endif
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
                                 @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                     <td><a class="btn btn-primary" href="{{ route('shops.edit',$s) }}">Bijwerken</a></td>
                                     @endif
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