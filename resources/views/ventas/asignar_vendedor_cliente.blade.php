@extends('layouts.app', ['activePage' => 'Bienvenido', 'titlePage' => __('')])
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
                            {{ __('Asigna un vendedor para ') }} {{ $data[0]->nombre }}
                        </p>
                    </div>
                    <div class="card-body">

                        <div class="row justify-content-center">

                            <div class="col-lg-4 mb-4">

                                @if (session('status'))
                                    <div class="alert {{ session('status_alert') }}" role="alert" id="alert-view">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-8">
                                <form method="POST" action="{{ route('ventas.asignarvendedorguardar') }}">
                                    @csrf
                                    <input type="text" name="cliente_id" value="{{ $data[0]->id }}" style="display: none;">

                                    <div class="form-group">
                                        <label for="vendedor">Selecciona al vendedor:</label>
                                        <select class="form-control" id="vendedor" name="user_id" style="top: 25px;">
                                            @foreach ($data[1] as $vendedor )
                                                <option value="{{ $vendedor->id }}">{{ $vendedor->name }} {{ $vendedor->app_name }} {{ $vendedor->apm_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-5">Asignar vendedor</button>
                                </form>

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
        $(document).ready(function() {

            setTimeout(function(){
                $('#alert-view').hide();
            }, 3000);

        } );


    </script>

@endpush


@endsection
