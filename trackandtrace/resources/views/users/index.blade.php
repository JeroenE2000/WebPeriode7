@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
       <div class="row">
          <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                 @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                     <a class="btn btn-success" href="{{ route('shops.create') }}">{{__('users.create')}}</a>
                 @endif
                </div>
          </div>
       </div>
       <div class="row mt-4" >
          <div class="col-12 col-sm-12">
             <div class="card">
                <div class="card-header">
                   <h3 class="card-title">{{__('users.title')}}</h3>
                </div>
                <!-- /.card-header -->
                 <div class="card-body">
                         <table id="" class="table table-bordered table-hover">
                             <thead>
                                 <tr>
                                    <td>{{__('users.roles')}}</td>
                                    <td>{{__('users.name')}}</td>
                                    <td>{{__('users.email')}}</td>
                                    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                    <td>{{__('users.edit')}}</td>
                                    @endif
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach($users as $u)
                                 <tr>
                                    <td>{{$u->roles->name}}</td>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                        <td><a class="btn btn-primary" href="{{ route('users.edit',$u) }}">{{__('users.edit')}}</a></td>
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
