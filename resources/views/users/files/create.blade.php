@extends('layouts.datatables')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Carga de archivos</div>
                <div class="card-body">
                    <form action="{{ route('users.files.store', $archivo) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="file" class="col-md-2 col-form-label text-md-right">{{ __('Archivo') }}</label>

                            <div class="col-md-6">
                                <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" required autofocus>

                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Cargar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
