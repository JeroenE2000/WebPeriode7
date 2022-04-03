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
                    <a class="btn btn-success" href="{{ route('labels.create') }}"> {{__('labels.btnlabelcreate')}}</a>
                    <a class="btn btn-success" href="{{ route('label.csvimport') }}"> {{__('labels.csvimport')}}</a>
                @endif
                  <form method="POST" class="mt-4" action="{{ route('labels.search') }}">
                    @csrf
                    @method('put')
                    <div class="col-md-3">
                        <input value="{{ request()->get('search') }}" type="search" name="search" class="form-control">
                    </div>
                </form>

               </div>
         </div>
      </div>
      <div class="row mt-4" >
         <div class="col-12 col-sm-12">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Labels</h3>
               </div>
               <!-- /.card-header -->
               <form action="{{ route('generate.barcode') }}" method="POST">
                    @csrf
                <div class="card-body">
                        <table id="" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <th>id</th>
                                <td>{{__('labels.trackingNumber')}}</td>
                                <td>{{__('labels.packagename')}}</td>
                                <td>{{__('labels.namesender')}}</td>
                                <td>{{__('labels.addresssender')}}</td>
                                <td>{{__('labels.recievername')}}</td>
                                <td>{{__('labels.addressreciever')}}</td>
                                <td>{{__('labels.date')}}</td>
                                <td>{{__('labels.dimensions')}}</td>
                                <td>{{__('labels.weight')}}</td>
                                @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                <td>{{__('labels.update')}}</td>
                                <td>{{__('labels.pdfprint')}}</td>
                                @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($labels as $l)
                                <tr>
                                <td>{{$l->id}}</td>
                                <td>{{$l->TrackingNumber}}</td>
                                <td>{{$l->Package_name}}</td>
                                <td>{{$l->Name_Sender}}</td>
                                <td>{{$l->Address_Sender}}</td>
                                <td>{{$l->Name_Reciever}}</td>
                                <td>{{$l->Address_Reciever}}</td>
                                <td>{{$l->Date}}</td>
                                <td>{{$l->Dimensions}}</td>
                                <td>{{$l->Weight}}</td>
                                @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                    <td><a class="btn btn-primary" href="{{ route('labels.edit',$l) }}">Bijwerken</a></td>
                                    <td><input type="checkbox" name="selectedvalue[]" value="{{$l->id}}"/> </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>id</th>
                                    <td>{{__('labels.trackingNumber')}}</td>
                                    <td>{{__('labels.packagename')}}</td>
                                    <td>{{__('labels.namesender')}}</td>
                                    <td>{{__('labels.addresssender')}}</td>
                                    <td>{{__('labels.recievername')}}</td>
                                    <td>{{__('labels.addressreciever')}}</td>
                                    <td>{{__('labels.date')}}</td>
                                    <td>{{__('labels.dimensions')}}</td>
                                    <td>{{__('labels.weight')}}</td>
                                    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                    <td>{{__('labels.update')}}</td>
                                    <td>{{__('labels.pdfprint')}}</td>
                                    @endif
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                    <div class="mt-4">
                        <input type="submit" class="btn btn-primary btn-block" value="PdfExport">
                      </div>
                    @endif
                </form>

               <!-- /.card-body -->
            </div>
         </div>
      </div>
   </div>
</section>




@endsection
