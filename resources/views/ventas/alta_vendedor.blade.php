@extends('layouts.app', ['activePage' => 'Ventas', 'titlePage' => __('Ventas')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">
                            {{ __('Ingresa los datos del vendedor') }}
                        </h4>
                        <p class="card-category">
                            {{ __('') }}
                        </p>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-6 col-12">

                                @if (session('status'))
                                    <div class="alert {{ session('status_alert') }}" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form action="{{ route('guardarvendedor') }}" method="post">

                                    @csrf

                                    <div class="form-group">
                                        <label for="usr">Nombre:</label>
                                        <input type="text" class="form-control" name="usuario" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="usr">Apellido paterno:</label>
                                        <input type="text" class="form-control" name="app-pat" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="usr">Apellido materno:</label>
                                        <input type="text" class="form-control" name="app-mat" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="usr">Correo:</label>
                                        <input type="text" class="form-control" name="mail" required>
                                    </div>

                                    @if(session()->has('message.vendedor_add'))
                                        <p>{{ session('message.vendedor_add') }}</p>
                                    @endif

                                    <div class="form-group">
                                        <label for="pwd">Contraseña:</label>
                                        <input type="password" class="form-control" name="contrasenia" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Dar de alta</button>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
