@extends('layouts.app')

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
                    <a class="btn btn-success" href="{{ route('package.create') }}"> Nieuwe label aanmaken</a>
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
                                    <td>label</td>
                                    <td>shop</td>
                                    <td>status</td>
                                    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                    <td>Bijwerken</td>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($parcels as $p)
                                <tr>
                                <td>{{$l->id}}</td>
                                <td>{{$l->deliveryservice}}</td>
                                <td>{{$l->Package_name}}</td>
                                <td>{{$l->Name_Sender}}</td>
                                <td>{{$l->Address_Sender}}</td>
                                <td>{{$l->Name_Reciever}}</td>
                                <td>{{$l->Address_Reciever}}</td>
                                <td>{{$l->Date}}</td>
                                <td>{{$l->Dimensions}}</td>
                                <td>{{$l->Weight}}</td>
                                @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                    <td><a class="btn btn-primary" href="{{ route('package.edit',$l) }}">Bijwerken</a></td>
                                @endif
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <td>deleveryservice</td>
                                    <td>label</td>
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
