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
                    <a class="btn btn-success" href="{{ route('labels.create') }}"> Nieuwe label aanmaken</a>
                @endif
                  <form method="POST" action="{{ route('labels.search') }}">
                    @csrf
                    @method('put')
                    <div class="col-md-6">
                        <label for="search" class="col-md-4 col-form-label text-md-end">{{ __('Search function') }}</label>
                        <input value="{{ request()->get('search') }}" type="search" name="search" class="form-control"></input>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

               </div>
         </div>
      </div>
      <div class="row">
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
                                <td>trackingNumber</td>
                                <td>Package_name</td>
                                <td>Name_Sender</td>
                                <td>Address_Sender</td>
                                <td>Name_Reciever</td>
                                <td>Address_Reciever</td>
                                <td>Date</td>
                                <td>Dimensions</td>
                                <td>Weight</td>
                                @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                <td>Bijwerken</td>
                                <td>Pdfprint</td>
                                <td>Checkbox</td>
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
                                    <td><a class="btn btn-primary" href="{{ route('singlePDF.barcode',$l) }}">Labelprint</a></td>
                                    <td><input type="checkbox" name="selectedvalue[{{$l->id}}]pdf"/> </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>id</th>
                                <td>trackingNumber</td>
                                <td>Package_name</td>
                                <td>Name_Sender</td>
                                <td>Address_Sender</td>
                                <td>Name_Reciever</td>
                                <td>Address_Reciever</td>
                                <td>Date</td>
                                <td>Dimensions</td>
                                <td>Weight</td>
                                @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                <td>Bijwerken</td>
                                <td>Pdfprint</td>
                                    @endif
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="">
                        <input type="submit" class="btn btn-primary btn-block" value="PdfExport">
                      </div>
                </form>
               <!-- /.card-body -->
            </div>
         </div>
      </div>
   </div>
</section>




@endsection
