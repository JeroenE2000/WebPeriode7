@extends('layouts.admin')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <strong>{{('errors.Whoops')}}</strong> {{('errors.errorMessage')}}<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<section class="content">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title ">{{$user->name}}</h3>
                <br>
                <h3 class="card-title">{{$user->email}}</h3>
                <br>
                <h3 class="card-title">{{__('users.edit')}}</h3>
            </div>
            <form action="{{route ('users.update' , $user->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <select type="text" name="role" class="form-control">
                            <option>{{__('users.select')}}</option>
                            @foreach($roles as $r)
                                <option value="{{$r->id}}" {{$r->id == $user->role_id ? 'selected' : ''}}>{{$r->name}}</option>
                            @endforeach
                        </select>
                        <select type="text" name="shopID" class="form-control">
                            <option>Geen shop</option>
                            @foreach($shops as $s)
                                <option value="{{$s->id}}" {{$s->id == $user->shop_id ? 'selected' : ''}}>{{$s->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">{{__('users.submit')}}</button>
                </div>
            </form>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('labels.index') }}">{{__('users.back')}}</a>
            </div>
        </div>
    </div>
</section>

@endsection
