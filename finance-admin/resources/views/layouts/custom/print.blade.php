<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.min.js"></script>

    <style>
        body {
            font-family: 'arial';
            font-size: '12px';
        }

        .page-break {
            page-break-after: always;
        }
    </style>

</head>


<body>
    <nav class=" sticky-top">
        <div class="container-fluid">
            <x-button name="Print" class="btn-primary w-100" onclick="printer()" />
        </div>
    </nav>
    @yield('content')
    <x-generate-pdf :fileName="$fileName" />

</body>

</html>
