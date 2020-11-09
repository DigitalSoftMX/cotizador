<!DOCTYPE html>
<html lang="en">
<head>
<title>News Info</title>
</head>
<body>
    <h1>El vendedor(a) {{ $vendedor }} ha subido documentación que forma parte de tu seguimiento, puedes ver y descargar los archivos en los siguientes enlaces:</h1>
    @foreach ( $pdfs as $pdf )
        <a href="{{ route('clientes.downloadclient',$pdf) }}">{{ route('clientes.downloadclient',$pdf) }}</a>
        <br>
    @endforeach
</body>
</html>
