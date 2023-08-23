<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <style>
        /* Add your desired CSS styling here */
        p {
            display: inline-block;
            /* margin-left: 14px; */
            margin-right: 0px;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p><span style="font-weight: 500">Masjid: </span>{{ $nameMosque }}</p>
    <p><span style="font-weight: 500; margin-left:14px">Date: </span>{{ $date }}</p>
    {!! $content !!}
    <div class="page-break"></div>
</body>

</html>
