@extends('layouts.app', ['activePage' => 'Tabla de Descuentos Pemex', 'titlePage' => __('Tabla de Descuentos Pemex')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card card-nav-tabs">
                <div class="card-header card-header-primary">
                    Editar Descuentos
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a class="btn btn-sm btn-primary" href="{{ route('pemex.index') }}">
                                {{ __('Volver a la lista') }}
                            </a>
                        </div>
                    </div>
                    <form action="{{ route('pemex.store') }}" autocomplete="off" class="form-horizontal" method="post">
                        @csrf
                        @method('post')
                        
                        <div class="row mt-5">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header card-header-text card-header-success">
                                        <div class="card-text">
                                            <h4 class="card-title">
                                                Regular
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="col">
                                            @foreach($discountsM as $discount => $discount_item)
                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">
                                                    {{ __('Nivel ') }}{{ $discount+1 }}
                                                </label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input aria-required="true" class="form-control" id="input-nivel_{{$discount+1}}" name="nivel_/{{$discount+1}}" placeholder="{{ __('Nivel ') }}{{ $discount+1 }}" required="true" type="text" value="{{ old('name', $discount_item[0].','.$discount_item[1].','.$discount_item[2] ) }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <input class="form-control" id="input-producto" name="producto/" type="hidden" value="M"/>
                                            <input class="form-control" id="input-nombre" name="nombre/" type="hidden" value="Pemex"/>
                                            <input class="form-control" id="input-vigencia_now" name="vigencia_now/" type="hidden" value="0"/>
                                            <input class="form-control" id="input-vigencia_old" name="vigencia_old/" type="hidden" value="0"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header card-header-text card-header-danger">
                                        <div class="card-text">
                                            <h4 class="card-title">
                                                Premium
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="col">
                                            @foreach($discountsP as $discount => $discount_item)
                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">
                                                    {{ __('Nivel ') }}{{ $discount+1 }}
                                                </label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input aria-required="true" class="form-control" id="input-nivel1_{{$discount+1}}" name="nivel_//{{$discount+1}}" placeholder="{{ __('Nivel ') }}{{ $discount+1 }}" required="true" type="text" value="{{ old('name', $discount_item[0].','.$discount_item[1].','.$discount_item[2] ) }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <input class="form-control" id="input-producto" name="producto//" type="hidden" value="P"/>
                                            <input class="form-control" id="input-nombre" name="nombre//" type="hidden" value="Pemex
"/>
                                            <input class="form-control" id="input-vigencia_now" name="vigencia_now//" type="hidden" value="0"/>
                                            <input class="form-control" id="input-vigencia_old" name="vigencia_old//" type="hidden" value="0"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header card-header-text card-header-warning">
                                        <div class="card-text">
                                            <h4 class="card-title">
                                                Disel
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="col">
                                            @foreach($discountsD as $discount => $discount_item)
                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">
                                                    {{ __('Nivel ') }}{{ $discount+1 }}
                                                </label>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input aria-required="true" class="form-control" id="input-nivel_{{$discount+1}}" name="nivel_1///{{$discount+1}}" placeholder="{{ __('Nivel ') }}{{ $discount+1 }}" required="true" type="text" value="{{ old('name', $discount_item[0].','.$discount_item[1].','.$discount_item[2] ) }}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <input class="form-control" id="input-producto" name="producto///" type="hidden" value="D"/>
                                            <input class="form-control" id="input-nombre" name="nombre///" type="hidden" value="Pemex
"/>
                                            <input class="form-control" id="input-vigencia_now" name="vigencia_now///" type="hidden" value="0"/>
                                            <input class="form-control" id="input-vigencia_old" name="vigencia_old///" type="hidden" value="0"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--input class="form-control" id="input-producto" name="producto" type="hidden" value=""/-->
                        <div class="card-footer ml-auto mr-auto">
                            <button class="btn btn-primary" type="submit">
                                {{ __('Actualizar Registro') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript">

init_calendar('calendar_first',now(),'2030-12-31');

  $("#calendar_first").blur(function() {
    if($("#calendar_second").val() == ""){
       destroy_calendar('calendar_second');
    }
    init_calendar('calendar_second',compare_days()+'','2030-12-31');
  });
</script>
@endpush
