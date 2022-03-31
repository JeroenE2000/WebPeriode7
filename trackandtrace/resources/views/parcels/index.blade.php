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
                                    <td>deleveryservice</td>
                                    <td>Package name</td>
                                    <td>Name sender</td>
                                    <td>shop</td>
                                    <td>status</td>
                                    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                    <td>Bijwerken</td>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($package as $parcel)
                                <tr>
                                <td>{{$parcel->id}}</td>
                                <td>{{$parcel->deliveryservice}}</td>
                                    @foreach($parcel->parcel_label as $p)
                                        <td>{{$p->Package_name}}</td>
                                        <td>{{$p->Name_Sender}}</td>
                                    @endforeach
                                    @foreach($parcel->shop as $s)
                                        <td>{{$s->name}}</td>
                                    @endforeach
                                    @foreach($parcel->parcel_status as $st)
                                        <td>{{$st->state}}</td>
                                    @endforeach
                                @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                    <td><a class="btn btn-primary" href="{{ route('package.edit',$p) }}">Bijwerken</a></td>
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
                                    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                    <td>Bijwerken</td>
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
