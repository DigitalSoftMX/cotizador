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
                                                <form>
                                                    @csrf
                                                    {{-- data-default-file="url_of_your_file" --}}
                                                    <button type="button" class="btn btn-primary">Subir archivo</button>
                                                    <input type="file" class="dropify" data-min-width="400" data-allowed-file-extensions="pdf" data-max-file-size="300K"/>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Contrato de confidencialidad
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <form>
                                                    @csrf
                                                    {{-- data-default-file="url_of_your_file" --}}
                                                    <button type="button" class="btn btn-primary">Subir archivo</button>
                                                    <input type="file" class="dropify" data-min-width="400" data-allowed-file-extensions="pdf" data-max-file-size="300K"/>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Propuesta
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <form>
                                                    @csrf
                                                    {{-- data-default-file="url_of_your_file" --}}
                                                    <button type="button" class="btn btn-primary">Subir archivo</button>
                                                    <input type="file" class="dropify" data-min-width="400" data-allowed-file-extensions="pdf" data-max-file-size="300K"/>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingFour">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                                Contrato formal
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <form>
                                                    @csrf
                                                    {{-- data-default-file="url_of_your_file" --}}
                                                    <button type="button" class="btn btn-primary">Subir archivo</button>
                                                    <input type="file" class="dropify" data-min-width="400" data-allowed-file-extensions="pdf" data-max-file-size="300K"/>
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
    </script>
@endpush

@endsection
