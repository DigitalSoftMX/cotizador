@extends('layouts.app', ['activePage' => 'Captura de precios pemex', 'titlePage' => __('Captura de Precios Pemex')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">
                            {{ __('Competencia') }}
                        </h4>
                        <p class="card-category">
                            {{ __('Aquí puedes editar los valores de lacompetencia.') }}
                        </p>
                    </div>
                    <div class="card-body">
                        <form action="{{route('competencia.update',$competicions)}}" autocomplete="off"
                            class="form-horizontal" method="post">
                            @csrf
                            @method('post')
                            <div class="form-group col-md-3">
                                <label for="input-razon_social">
                                    Terminal
                                </label>
                                <h3>{{$competicions->nombre}} - {{$competicions->terminal_id}}</h3>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="regular_sin">
                                        Regular
                                    </label>
                                    <input class="form-control" id="regular_sin" name="precio_regular" placeholder="0"
                                        type="text"
                                        value="{{$competicions->prices[(count($competicions->prices)) - 1]->precio_regular}}" />
                                </div>
                                <div class="form-group col">
                                    <label for="premium_sin">
                                        Premium
                                    </label>
                                    <input class="form-control" id="regular_sin" name="precio_premium" placeholder="0"
                                        type="text"
                                        value="{{$competicions->prices[(count($competicions->prices)) - 1]->precio_premium}}" />
                                </div>
                                <div class="form-group col">
                                    <label for="disel_sin">
                                        Diesel
                                    </label>
                                    <input class="form-control" id="disel_sin" name="precio_disel" placeholder="0"
                                        type="text"
                                        value="{{$competicions->prices[(count($competicions->prices)) - 1]->precio_disel}}" />
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button class="btn btn-primary" type="submit">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
