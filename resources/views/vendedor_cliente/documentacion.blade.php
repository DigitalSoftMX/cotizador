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
                            {{ __('Sube la documentación de tu cliente.') }}
                            <span>NOTA: Los archivos deben estar en formato .pdf</span>
                        </p>
                    </div>
                    <div class="card-body">

                        <div class="row ">

                            <div class="col-12">

                                @if (session('status'))
                                    <div class="alert {{ session('status_alert') }}" id="alert-view">
                                        {{-- <strong>Success!</strong> {{ session('status') }} --}}
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="accordion" id="accordionExample">

                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Carta de intención
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <form action="{{ route('clientes.subirarchivo') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                                    @csrf
                                                    {{-- --}}
                                                    <button type="submit" class="btn btn-primary">Subir archivo</button>
                                                    <input type="text" name="id_cliente" value="{{ $data['id'] }}" style="display: none;">
                                                    <input type="text" name="contrato" value="carta_intencion" style="display: none;">
                                                    <input @if($data['documentos']->carta_intencion != NULL) data-default-file="{{ \Storage::url($data['documentos']->carta_intencion) }}" @endif
                                                    name="file" type="file" class="dropify" data-min-width="400" data-allowed-file-extensions="pdf" data-max-file-size="25M" required/>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                Convenio de confidencialidad
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <form action="{{ route('clientes.subirarchivo') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                                    @csrf
                                                    {{--  --}}
                                                    <button type="submit" class="btn btn-primary">Subir archivo</button>
                                                    <input type="text" name="id_cliente" value="{{ $data['id'] }}" style="display: none;">
                                                    <input type="text" name="contrato" value="convenio_confidencialidad" style="display: none;">
                                                    <input @if($data['documentos']->convenio_confidencialidad != NULL) data-default-file="{{ \Storage::url($data['documentos']->convenio_confidencialidad) }}" @endif
                                                     type="file" name="file" class="dropify" data-min-width="400" data-allowed-file-extensions="pdf" data-max-file-size="25M" required/>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                Margen garantizado
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <form action="{{ route('clientes.subirarchivo') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                                    @csrf
                                                    {{-- data-default-file="url_of_your_file" --}}
                                                    <button type="submit" class="btn btn-primary">Subir archivo</button>
                                                    <input type="text" name="id_cliente" value="{{ $data['id'] }}" style="display: none;">
                                                    <input type="text" name="contrato" value="margen_garantizado" style="display: none;">
                                                    <input @if($data['documentos']->margen_garantizado != NULL) data-default-file="{{ \Storage::url($data['documentos']->margen_garantizado) }}" @endif
                                                    type="file" name="file" class="dropify" data-min-width="400" data-allowed-file-extensions="pdf" data-max-file-size="25M" required/>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingFour">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                Solicitud de documentos
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">

                                            <div class="card-body">
                                                <form action="{{ route('clientes.subirsolicituddocumentos') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                                    @csrf
                                                    {{-- data-default-file="url_of_your_file" --}}
                                                    <button type="submit" class="btn btn-primary">Subir archivo</button>

                                                    <div class="row">

                                                        <div class="col-lg-6 col-12">

                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Solicitud de documentos</h4>
                                                                    @csrf
                                                                    <input type="text" name="id_cliente" value="{{ $data['id'] }}" style="display: none;">
                                                                    <input type="text" name="documento0" value="solicitud_documento" style="display: none;">
                                                                    <input type="file" name="file0" class="dropify" data-min-width="400" data-allowed-file-extensions="pdf" data-max-file-size="25M" required required/>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </form>
                                            </div>

                                            <div class="card-body">
                                                <form action="{{ route('clientes.subirsolicituddocumentos') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                                    @csrf
                                                    {{-- data-default-file="url_of_your_file" --}}
                                                    <button type="submit" class="btn btn-primary">Subir archivos</button>
                                                    <input type="text" name="id_cliente" value="{{ $data['id'] }}" style="display: none;">

                                                    <div class="row">

                                                        <div class="col-lg-6 col-12">

                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">INE (Representante Legal)</h4>
                                                                    <input type="text" name="documento0" value="ine" style="display: none;">
                                                                    <input type="file" name="file0" class="dropify" data-min-width="400" data-allowed-file-extensions="pdf" data-max-file-size="25M"/>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6 col-12">

                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Acta constitutiva</h4>
                                                                    <input type="text" name="documento1" value="acta_constitutiva" style="display: none;">
                                                                    <input type="file" name="file1" class="dropify" data-min-width="400" data-allowed-file-extensions="pdf" data-max-file-size="25M"/>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6 col-12">

                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Poder Notarial</h4>
                                                                    <input type="text" name="documento2" value="poder_notarial" style="display: none;">
                                                                    <input type="file" name="file2" class="dropify" data-min-width="400" data-allowed-file-extensions="pdf" data-max-file-size="25M"/>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6 col-12">

                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">RFC</h4>
                                                                    <input type="text" name="documento3" value="rfc" style="display: none;">
                                                                    <input type="file" name="file3" class="dropify" data-min-width="400" data-allowed-file-extensions="pdf" data-max-file-size="25M"/>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6 col-12">

                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Constancia de situación físcal. (No mayor a 3 meses)</h4>
                                                                    <input type="text" name="documento4" value="constancia_situacion_fiscal" style="display: none;">
                                                                    <input type="file" name="file4" class="dropify" data-min-width="400" data-allowed-file-extensions="pdf" data-max-file-size="25M"/>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6 col-12">

                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">Comprobante de domicilio. (Vigente)</h4>
                                                                    <input type="text" name="documento5" value="comprobante_domicilio" style="display: none;">
                                                                    <input type="file" name="file5" class="dropify" data-min-width="400" data-allowed-file-extensions="pdf" data-max-file-size="25M"/>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingFive">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                                Propuesta
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                            <div class="card-body">


                                                @if($data['documentos']->propuestas != NULL)
                                                    <p>Mis propuestas</p>
                                                    <p class="card-text">
                                                        @foreach( json_decode($data['documentos']->propuestas, true) as $propuesta)
                                                            <span class="badge badge-primary">{{ $propuesta }}</span>
                                                        @endforeach
                                                    </p>
                                                @endif

                                                <form action="{{ route('clientes.subirarchivopropuesta') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                                    @csrf
                                                    {{-- data-default-file="url_of_your_file" --}}
                                                    <button type="submit" class="btn btn-primary">Subir archivo</button>
                                                    <input type="text" name="id_cliente" value="{{ $data['id'] }}" style="display: none;">
                                                    <input type="file" name="file" class="dropify" data-min-width="400" data-allowed-file-extensions="pdf" data-max-file-size="25M" required/>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingSix">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                                Contrato comodato
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <form action="{{ route('clientes.subirarchivo') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                                    @csrf
                                                    {{--  --}}
                                                    <button type="submit" class="btn btn-primary">Subir archivo</button>
                                                    <input type="text" name="id_cliente" value="{{ $data['id'] }}" style="display: none;">
                                                    <input type="text" name="contrato" value="contrato_comodato" style="display: none;">
                                                    <input @if($data['documentos']->contrato_comodato != NULL) data-default-file="{{ \Storage::url($data['documentos']->contrato_comodato) }}" @endif
                                                    type="file" name="file" class="dropify" data-min-width="400" data-allowed-file-extensions="pdf" data-max-file-size="25M" required/>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingSeven">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                                Contrato suministros
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <form action="{{ route('clientes.subirarchivo') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                                    @csrf
                                                    {{--  --}}
                                                    <button type="submit" class="btn btn-primary">Subir archivo</button>
                                                    <input type="text" name="id_cliente" value="{{ $data['id'] }}" style="display: none;">
                                                    <input type="text" name="contrato" value="contrato_suministro" style="display: none;">
                                                    <input @if($data['documentos']->contrato_suministro != NULL) data-default-file="{{ \Storage::url($data['documentos']->contrato_suministro) }}" @endif
                                                    type="file" name="file" class="dropify" data-min-width="400" data-allowed-file-extensions="pdf" data-max-file-size="25M" required/>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingEight">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                                                Carta bienvenida
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <form action="{{ route('clientes.subirarchivo') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                                    @csrf
                                                    {{--  --}}
                                                    <button type="submit" class="btn btn-primary">Subir archivo</button>
                                                    <input type="text" name="id_cliente" value="{{ $data['id'] }}" style="display: none;">
                                                    <input type="text" name="contrato" value="carta_bienvenida" style="display: none;">
                                                    <input @if($data['documentos']->carta_bienvenida != NULL) data-default-file="{{ \Storage::url($data['documentos']->carta_bienvenida) }}" @endif
                                                    type="file" name="file" class="dropify" data-min-width="400" data-allowed-file-extensions="pdf" data-max-file-size="25M" required/>
                                                </form>
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
    </div>
</div>

</div>

@push('js')
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Arrastra tu archivo aquí <br> o <br> <button class="btn btn-primary text-with">Da click aquí</button>',
                'replace': 'Arrastra tu archivo aquí <br> o <br> <button class="btn btn-primary text-with">Da click aquí</button>',
                'remove':  'Remover',
                'error':   'Ooops, ocurrio un error.'
            },
            error: {
            }
        });

        setTimeout(function(){
            $('#alert-view').hide();
        }, 3000);

    </script>
@endpush

@endsection
