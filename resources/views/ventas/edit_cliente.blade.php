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
                                    <i class="material-icons">perm_identity</i>
                                    <h1>Agregar clientes</h1>
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">

                                <div class="content-information">
                                    <i class="material-icons">home_work</i>
                                    <input type="text" placeholder="Nombre empresa">
                                </div>

                                <div class="content-information">
                                    <i class="material-icons">perm_identity</i>
                                    <input type="text" placeholder="Contacto">
                                </div>

                                <div class="content--center mb-2em">
                                    <div class="select">
                                        <i class="material-icons">home_work</i>
                                        <select style="text-align-last: auto;">
                                            <option selected disabled>Estado</option>
                                            <option value="1">Pure CSS</option>
                                            <option value="2">No JS</option>
                                            <option value="3">Nice!</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="content-information">
                                    <i class="material-icons">perm_identity</i>
                                    <input type="text" placeholder="Telefono">
                                </div>


                                <div class="content-information">
                                    <i class="material-icons">email</i>
                                    <input type="text" placeholder="Página web">
                                </div>

                            </div>

                            <div class="col-lg-6 col-12">

                                <div class="content-information">
                                    <i class="material-icons">perm_identity</i>
                                    <input type="text" placeholder="RFC">
                                </div>

                                <div class="content-information">
                                    <i class="material-icons">perm_identity</i>
                                    <input type="text" placeholder="Dirección">
                                </div>

                                <div class="content--center mb-2em">
                                    <div class="select">
                                        <i class="material-icons">home_work</i>
                                        <select style="text-align-last: auto;">
                                            <option selected disabled>Tipo</option>
                                            <option value="1">Pure CSS</option>
                                            <option value="2">No JS</option>
                                            <option value="3">Nice!</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="content-information">
                                    <i class="material-icons">email</i>
                                    <input type="text" placeholder="Correo">
                                </div>

                                <div class="content--center mb-2em">
                                    <div class="select">
                                        <i class="material-icons">perm_identity</i>
                                        <select style="text-align-last: auto;">
                                            <option selected disabled>Vendedor</option>
                                            <option value="1">Pure CSS</option>
                                            <option value="2">No JS</option>
                                            <option value="3">Nice!</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="container">
                                <div class="options--footer">
                                    <button class="btn-option">Editar</button>
                                    <a href="{{ route('ventas.index') }}" class="btn-option">Cancelar</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection