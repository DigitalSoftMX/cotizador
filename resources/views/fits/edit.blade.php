@extends('layouts.app', ['activePage' => 'Fee', 'titlePage' => __('Fee')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">
                            {{ __('Fee') }}
                        </h4>
                        <p class="card-category">
                            {{ __('Aquí puedes editar los valores de los Fee.') }}
                        </p>
                    </div>
                    <div class="card-body">
                        <form action="{{route('fits.update',$fits)}}" autocomplete="off" class="form-horizontal" method="post">
                            @csrf
                            @method('post')
                            
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="policom">
                                        Policom
                                    </label>
                                    <input class="form-control" id="policom" name="policom" placeholder="0" type="text" value="{{ $fits->policom }}"/>
                                </div>
                                <div class="form-group col">
                                    <label for="impulsa">
                                        Impulsa
                                    </label>
                                    <input class="form-control" id="impulsa" name="impulsa" placeholder="0" type="text" value="{{ $fits->impulsa }}"/>
                                </div>
                                <div class="form-group col">
                                    <label for="comision">
                                        Comision
                                    </label>
                                    <input class="form-control" id="impulsa" name="impulsa" placeholder="0" type="text" value="{{ $fits->impulsa }}"/>
                                </div>
                                <div class="form-group col">
                                    <label for="regular_fit">
                                        Regular Fee
                                    </label>
                                    <input class="form-control" id="regular_fit" name="regular_fit" placeholder="0" type="text" value="{{ $fits->regular_fit }}"/>
                                </div>
                                <div class="form-group col">
                                    <label for="premium_fit">
                                        Premium Fee
                                    </label>
                                    <input class="form-control" id="premium_fit" name="premium_fit" placeholder="0" type="text" value="{{ $fits->premium_fit }}"/>
                                </div>
                                <div class="form-group col">
                                    <label for="disel_fitt">
                                        Disel Fee
                                    </label>
                                    <input class="form-control" id="disel_fit" name="disel_fit" placeholder="0" type="text" value="{{ $fits->disel_fit }}"/>
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
