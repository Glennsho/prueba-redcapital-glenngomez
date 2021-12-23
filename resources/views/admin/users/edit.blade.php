@extends('layouts.datatables')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Editando a {{ $user->name }}</div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">

                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Nombre usuario') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label for="roles" class="col-md-2 col-form-label text-md-right">{{ __('Roles') }}</label>
                            <div class="col-md-6">
                                @foreach($roles as $rol)
                                    <div class="form-check">
                                        <input type="checkbox" name="roles[]" value="{{ $rol->id }}"
                                        @if ($user->roles->pluck('id')->contains($rol->id))
                                            checked
                                        @endif>
                                        <label>{{ $rol->nombre }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
