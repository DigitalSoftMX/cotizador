@extends('layouts.app', ['activePage' => 'Bienvenido', 'titlePage' => __('Ventas')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">
                            {{ __('') }}
                        </h4>
                        <p class="card-category">
                            {{ __(' ') }}
                        </p>
                    </div>
                    <div class="card-body">

                        <div class="row ">

                            <div class="col-lg-6 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Archivos subidos</h4>

                                        @foreach ( $data['archivos-subidos'] as $index => $documento)
                                            <a href="{{ route('ventas.download', $data['archivos_descarga'][$index] ) }}" target="_blank">
                                            <div class="card bg-success">
                                                <div class="card-body text-center">
                                                    {{ strtoupper(str_replace('_',' ', $documento)) }}
                                                </div>
                                            </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Archivos restantes</h4>
                                        @foreach ($data['archivos-restantes'] as $documento)
                                            <div class="card bg-warning">
                                                <div class="card-body text-center">{{ strtoupper(str_replace('_',' ', $documento)) }}</div>
                                            </div>
                                        @endforeach
                                    </div>
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
