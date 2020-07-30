@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="container-fluid mt-3">
            <div class="row">
                
                <div class="card card-nav-tabs">
                    <div class="card-header card-header-primary">
                        <div class="row">
                            <div class="col mt-3"> Gráficas de competencias</div>
                            <div class="col">
                                <select class="selectpicker float-right" data-style="btn-primary" id="fecha">
                                    <option disabled selected>Elige un Mes</option>
                                    <option value="01">Enero</option>
                                    <option value="02">Febrero</option>
                                    <option value="03">Marzo</option>
                                    <option value="04">Abril</option>
                                    <option value="05">Mayo</option>
                                    <option value="06">Junio</option>
                                    <option value="07">Julio</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center" id="content">
                            
                            <div class="col col-lg-9 col-md-9 col-sm-12">

                                <ul class="nav nav-pills nav-pills-primary mt-3 justify-content-center" role="tablist">
                                    <li class="nav-item">
                                        <a aria-expanded="true" class="nav-link" data-toggle="tab" href="#link1"
                                            role="tablist">
                                            {{$terminales[0][0]}}
                                        </a>
                                    </li>
                                    <!--li class="nav-item">
                                        <a aria-expanded="false" class="nav-link" data-toggle="tab" href="#link2"
                                            role="tablist">
                                            {{--$terminales[1][0]--}}
                                        </a>
                                    </li-->
                                    <li class="nav-item">
                                        <a aria-expanded="false" class="nav-link active" data-toggle="tab" href="#link3"
                                            role="tablist">
                                            {{$terminales[2][0]}}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a aria-expanded="false" class="nav-link" data-toggle="tab" href="#link4"
                                            role="tablist">
                                            {{$terminales[3][0]}}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a aria-expanded="false" class="nav-link" data-toggle="tab" href="#link5"
                                            role="tablist">
                                            {{$terminales[4][0]}} 
                                        </a>
                                    </li>
                                     <li class="nav-item">
                                        <a aria-expanded="false" class="nav-link" data-toggle="tab" href="#link6"
                                            role="tablist">
                                            {{$terminales[5][0]}} 
                                        </a>
                                    </li>

                                </ul>
                                <div class="tab-content tab-space">

                                    <div aria-expanded="false" class="tab-pane mt-3" id="link1">
                                        <div id="carouselExampleIndicators0" class="carousel slide" data-wrap="true">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    @include('Graphics.graphics',['color'=>'bg-success','terminal'=>$terminales[0][0],'gasolina'=>'Regular','gasolinaP'=>'Magna','fechas'=>$terminales[0][1],'vector_precio_valero'=>$terminales[0][2],'precio_pemex'=>$terminales[0][3],'precio_policon'=>$terminales[0][4], 'precio_impulsa'=>$terminales[0][5], 'id_terminal'=>'1' ])
                                                </div>
                                                <div class="carousel-item">
                                                    @include('Graphics.graphics',['color'=>'bg-dark','terminal'=>$terminales[0][0],'gasolina'=>'Diésel','gasolinaP'=>'Diésel','fechas'=>$terminales[0][1],'vector_precio_valero'=>$terminales[0][10],'precio_pemex'=>$terminales[0][11],'precio_policon'=>$terminales[0][12], 'precio_impulsa'=>$terminales[0][13], 'id_terminal'=>'1'  ])
                                                </div>
                                                <a class="carousel-control-prev mr-5" href="#carouselExampleIndicators0" role="button" data-slide="prev">
                                                    <span class="text-dark" aria-hidden="true">
                                                        <i class="material-icons" style="font-size: 50px;">keyboard_arrow_left</i>
                                                    </span>
                                                </a>
                                                <a class="carousel-control-next ml-5" href="#carouselExampleIndicators0" role="button" data-slide="next">
                                                    <span class="text-dark" aria-hidden="true">
                                                        <i class="material-icons" style="font-size: 50px;">keyboard_arrow_right</i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div aria-expanded="false" class="tab-pane mt-3" id="link2">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-wrap="true">
                                            <div class="carousel-inner">
                                                {{--<div class="carousel-item active">
                                                    @include('Graphics.graphics',['color'=>'bg-success','terminal'=>$terminales[1][0],'gasolina'=>'Regular','gasolinaP'=>'Magna','fechas'=>$terminales[1][1],'vector_precio_valero'=>$terminales[1][2],'precio_pemex'=>$terminales[1][3],'precio_policon'=>$terminales[1][4], 'precio_impulsa'=>$terminales[1][5], 'id_terminal'=>'2' ])
                                                </div>
                                                <div class="carousel-item">
                                                    @include('Graphics.graphics',['color'=>'bg-danger','terminal'=>$terminales[1][0],'gasolina'=>'Supreme 93','gasolinaP'=>'Premium','fechas'=>$terminales[1][1],'vector_precio_valero'=>$terminales[1][6],'precio_pemex'=>$terminales[1][7],'precio_policon'=>$terminales[1][8], 'precio_impulsa'=>$terminales[1][9], 'id_terminal'=>'2' ])
                                                </div>
                                                <div class="carousel-item">
                                                    @include('Graphics.graphics',['color'=>'bg-dark','terminal'=>$terminales[1][0],'gasolina'=>'Diésel','gasolinaP'=>'Diésel','fechas'=>$terminales[1][1],'vector_precio_valero'=>$terminales[1][10],'precio_pemex'=>$terminales[1][11],'precio_policon'=>$terminales[1][12], 'precio_impulsa'=>$terminales[1][13],'id_terminal'=>'2' ])
                                                </div>
                                                <a class="carousel-control-prev mr-5" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                    <span class="text-dark" aria-hidden="true">
                                                        <i class="material-icons" style="font-size: 50px;">keyboard_arrow_left</i>
                                                    </span>
                                                </a>
                                                <a class="carousel-control-next ml-5" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                    <span class="text-dark" aria-hidden="true">
                                                        <i class="material-icons" style="font-size: 50px;">keyboard_arrow_right</i>
                                                    </span>
                                                </a>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div aria-expanded="true" class="tab-pane active mt-3" id="link3">
                                        <div id="carouselExampleIndicators1" class="carousel slide" data-wrap="true">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    @include('Graphics.graphics',['color'=>'bg-success','terminal'=>$terminales[2][0],'gasolina'=>'Regular','gasolinaP'=>'Magna','fechas'=>$terminales[2][1],'vector_precio_valero'=>$terminales[2][2],'precio_pemex'=>$terminales[2][3],'precio_policon'=>$terminales[2][4] , 'precio_impulsa'=>$terminales[2][5], 'id_terminal'=>'3' ])
                                                </div>
                                                <div class="carousel-item">
                                                    @include('Graphics.graphics',['color'=>'bg-danger','terminal'=>$terminales[2][0],'gasolina'=>'Supreme 93','gasolinaP'=>'Premium','fechas'=>$terminales[2][1],'vector_precio_valero'=>$terminales[2][6],'precio_pemex'=>$terminales[2][7],'precio_policon'=>$terminales[2][8], 'precio_impulsa'=>$terminales[2][9], 'id_terminal'=>'3'  ])
                                                </div>
                                                <div class="carousel-item">
                                                    @include('Graphics.graphics',['color'=>'bg-dark','terminal'=>$terminales[2][0],'gasolina'=>'Diésel','gasolinaP'=>'Diésel','fechas'=>$terminales[2][1],'vector_precio_valero'=>$terminales[2][10],'precio_pemex'=>$terminales[2][11],'precio_policon'=>$terminales[2][12], 'precio_impulsa'=>$terminales[2][13], 'id_terminal'=>'3'  ])
                                                </div>
                                                <a class="carousel-control-prev mr-5" href="#carouselExampleIndicators1" role="button" data-slide="prev">
                                                    <span class="text-dark" aria-hidden="true">
                                                        <i class="material-icons" style="font-size: 50px;">keyboard_arrow_left</i>
                                                    </span>
                                                </a>
                                                <a class="carousel-control-next ml-5" href="#carouselExampleIndicators1" role="button" data-slide="next">
                                                    <span class="text-dark" aria-hidden="true">
                                                        <i class="material-icons" style="font-size: 50px;">keyboard_arrow_right</i>
                                                    </span>
                                                    
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div aria-expanded="false" class="tab-pane mt-3" id="link4">
                                        <div id="carouselExampleIndicators2" class="carousel slide" data-wrap="true">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    @include('Graphics.graphics',['color'=>'bg-success','terminal'=>$terminales[3][0],'gasolina'=>'Regular','gasolinaP'=>'Magna','fechas'=>$terminales[3][1],'vector_precio_valero'=>$terminales[3][2],'precio_pemex'=>$terminales[3][3],'precio_policon'=>$terminales[3][4], 'precio_impulsa'=>$terminales[3][5], 'id_terminal'=>'4' ])
                                                </div>
                                                <div class="carousel-item">
                                                    @include('Graphics.graphics',['color'=>'bg-danger','terminal'=>$terminales[3][0],'gasolina'=>'Supreme 93','gasolinaP'=>'Premium','fechas'=>$terminales[3][1],'vector_precio_valero'=>$terminales[3][6],'precio_pemex'=>$terminales[3][7],'precio_policon'=>$terminales[3][8], 'precio_impulsa'=>$terminales[3][9], 'id_terminal'=>'4' ])
                                                </div>
                                                <div class="carousel-item">
                                                    @include('Graphics.graphics',['color'=>'bg-dark','terminal'=>$terminales[3][0],'gasolina'=>'Diésel','gasolinaP'=>'Diésel','fechas'=>$terminales[3][1],'vector_precio_valero'=>$terminales[3][10],'precio_pemex'=>$terminales[3][11],'precio_policon'=>$terminales[3][12], 'precio_impulsa'=>$terminales[3][13] , 'id_terminal'=>'4' ])
                                                </div>
                                                <a class="carousel-control-prev mr-5" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                                    <span class="text-dark" aria-hidden="true">
                                                        <i class="material-icons" style="font-size: 50px;">keyboard_arrow_left</i>
                                                    </span>
                                                </a>
                                                <a class="carousel-control-next ml-5" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                                    <span class="text-dark" aria-hidden="true">
                                                        <i class="material-icons" style="font-size: 50px;">keyboard_arrow_right</i>
                                                    </span>
                                                    
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div aria-expanded="false" class="tab-pane mt-3" id="link5">
                                        <div class="card">
                                            
                                          <img class="card-img-bottom" src="{{ asset('material') }}/img/proximamente.png" rel="nofollow" alt="Card image cap">
                                        </div>
                                        {{-- @include('Graphics.graphics',['color'=>'bg-dark','terminal'=>$terminales[4][0],'gasolina'=>'Diésel','gasolinaP'=>'Diesel','fechas'=>$terminales[4][1],'vector_precio_valero'=>$terminales[4][10],'precio_pemex'=>$terminales[4][11],'precio_policon'=>$terminales[4][12], 'precio_impulsa'=>$terminales[4][13]])--}}
                                    </div>
                                    <div aria-expanded="false" class="tab-pane mt-3" id="link6">
                                        <div id="carouselExampleIndicators4" class="carousel slide" data-wrap="true">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                   @include('Graphics.graphics',['color'=>'bg-success','terminal'=>$terminales[5][0],'gasolina'=>'Regular','gasolinaP'=>'Magna','fechas'=>$terminales[5][1],'vector_precio_valero'=>$terminales[5][2],'precio_pemex'=>$terminales[5][3],'precio_policon'=>$terminales[5][4] , 'precio_impulsa'=>$terminales[5][5], 'id_terminal'=>'6' ])
                                                 </div>
                                                <div class="carousel-item">
                                                    @include('Graphics.graphics',['color'=>'bg-danger','terminal'=>$terminales[5][0],'gasolina'=>'Supreme 93','gasolinaP'=>'Premium','fechas'=>$terminales[5][1],'vector_precio_valero'=>$terminales[5][6],'precio_pemex'=>$terminales[5][7],'precio_policon'=>$terminales[5][8], 'precio_impulsa'=>$terminales[5][9], 'id_terminal'=>'6' ])
                                                </div>
                                                <div class="carousel-item">
                                                    @include('Graphics.graphics',['color'=>'bg-dark','terminal'=>$terminales[5][0],'gasolina'=>'Diésel','gasolinaP'=>'Diésel','fechas'=>$terminales[5][1],'vector_precio_valero'=>$terminales[5][10],'precio_pemex'=>$terminales[5][11],'precio_policon'=>$terminales[5][12], 'precio_impulsa'=>$terminales[5][13], 'id_terminal'=>'6' ])
                                                </div>
                                                <a class="carousel-control-prev mr-5" href="#carouselExampleIndicators4" role="button" data-slide="prev">
                                                    <span class="text-dark" aria-hidden="true">
                                                        <i class="material-icons" style="font-size: 50px;">keyboard_arrow_left</i>
                                                    </span>
                                                </a>
                                                <a class="carousel-control-next ml-5" href="#carouselExampleIndicators4" role="button" data-slide="next">
                                                    <span class="text-dark" aria-hidden="true">
                                                        <i class="material-icons" style="font-size: 50px;">keyboard_arrow_right</i>
                                                    </span>
                                                </a>
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
@endsection

