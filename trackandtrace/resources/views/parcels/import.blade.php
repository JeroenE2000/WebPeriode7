@extends('layouts.admin')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>{{__('errors.Whoops')}}</strong> {{__('errors.errorMessage')}}<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container mt-5 text-center">
        <form action="{{ route('package.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <div class="custom-file text-left">
                    <input type="file" name="file" accept=".csv" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" id="file-name" for="customFile"></label>
                </div>
            </div>
            <button class="btn btn-primary">Import data</button>
        </form>
    </div>
    <script>
        document.querySelector("#customFile").onchange = function(){
        document.querySelector("#file-name").textContent = this.files[0].name;
        }
    </script>
@endsection
