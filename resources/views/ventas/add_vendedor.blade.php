@extends('layouts.app', ['activePage' => 'Ventas', 'titlePage' => __('Ventas')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="container-title-first">
                                    <i class="material-icons icon-edificio-azul"></i>
                                    <h1>Vendedor</h1>
                                </div>
                            </div>

                            <div class="col-12 text-left">
                                @if (session('status'))
                                    <div class="alert {{ session('status_alert') }}" role="alert" id="status-alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>

                            <form method="POST" action="{{ route('ventas.guardar_vendedor_nuevo') }}" style="display: contents;">
                                @csrf

                                <div class="col-lg-6 col-12">

                                    <div class="content-information">
                                        <i class="material-icons icon-vendedores-gris"></i>
                                        <input type="text" placeholder="Nombre" name="name" required>
                                    </div>

                                    <div class="content-information">
                                        <i class="material-icons"></i>
                                        <input type="text" placeholder="Apellido paterno" name="app_name" required>
                                    </div>

                                    <div class="content-information">
                                        <i class="material-icons"></i>
                                        <input type="text" placeholder="Apellido materno" name="apm_name" required>
                                    </div>

                                    <div class="content-information">
                                        <i class="material-icons icon-mail-gris"></i>
                                        <input type="text" placeholder="Correo" name="email" required>
                                    </div>

                                </div>
                                <div class="col-lg-6 col-12">

                                    <div class="content-information">
                                        <i class="material-icons icon-candado-gris"></i>
                                        <input type="password" placeholder="Contraseña" name="password" required>
                                    </div>

                                    <div class="content-information">
                                        <i class="material-icons icon-telefono-gris"></i>
                                        <input type="text" placeholder="Telefono" name="phone" required>
                                    </div>

                                    <div class="content--center">
                                        <div class="select">
                                            <i class="material-icons icon-udn-gris"></i>
                                            <select style="text-align-last: auto;" id="unidad-negocio">
                                                <option selected disabled>Unidad de negocio</option>
                                                @foreach ( $estados as $estado)
                                                    <option value="{{ $estado }}">{{ $estado }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="container p-0 mt-2 mb-2" id="estados_seleccionados">

                                    </div>

                                    <input type="text" name="unidades_negocio" id="unidades_negocio" style="display: none;">

                                </div>

                                <div class="container">
                                    <div class="options--footer">
                                        <button type="submit" class="btn-option">Guardar</button>
                                        <a href="{{ route('ventas.index') }}" class="btn-option">Cancelar</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('js/ventas.js') }}"></script>
    <script>
        add_unidades_input();
    </script>
@endpush
