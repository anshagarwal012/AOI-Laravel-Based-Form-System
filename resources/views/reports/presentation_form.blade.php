<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
</head>
<style>
    .page-break {
        page-break-after: always;
    }

    .reports img {
        width: 210mm;
        height: 297mm;
        position: absolute;
    }

    html,
    body {
        margin: 0px;
        font-family: 'Open Sans' !important;
    }

    .data {
        position: absolute;
    }

    p {
        position: absolute;
        z-index: 69;
        width: 500px;
    }

    .Upload_Photo {
        left: 646px;
        top: 225px;
    }

    .Upload_Photo img {
        width: 105px;
        height: 145px;
    }

    .tick img {
        width: 50px;
        height: 50px;
        z-index: 69;
    }
</style>
@php
    // dd($data);
    $da = [
        'images' => $data['Upload_Photo'],
        'form_data' => [
            [
                'top' => '166px',
                'left' => '648px',
                'data' => $data['model'] ?? '',
                'type' => 'logical',
                'logical' => [
                    'Oral' => [
                        'top' => '289px',
                        'left' => '276px',
                    ],
                    'Poster' => [
                        'top' => '289px',
                        'left' => '427px',
                    ],
                ],
            ],
            ['top' => '260px', 'left' => '220px', 'data' => $data['Tittle_Presentation'] ?? '', 'type' => 'text'],
            ['top' => '313px', 'left' => '199px', 'data' => $data['Name_author'] ?? '', 'type' => 'text'],
            ['top' => '311px', 'left' => '520px', 'data' => $data['AOIMembershipNumber'] ?? '', 'type' => 'text'],
            ['top' => '340px', 'left' => '245px', 'data' => $data['Designation'] ?? '', 'type' => 'text'],
            ['top' => '368px', 'left' => '265px', 'data' => $data['institution_name'] ?? '', 'type' => 'text'],
            ['top' => '449px', 'left' => '303px', 'data' => $data['Email'] ?? '', 'type' => 'text'],
            ['top' => '449px', 'left' => '144px', 'data' => $data['MobileNumber'] ?? '', 'type' => 'text'],
            ['top' => '396px', 'left' => '141px', 'data' => $data['address1'] ?? '', 'type' => 'text'],
            ['top' => '478px', 'left' => '324px', 'data' => $data['C0_authors'] ?? '', 'type' => 'text'],
            ['top' => '510px', 'left' => '279px', 'data' => $data['hos_name'] ?? '', 'type' => 'text'],
        ],
    ];
    $svg = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
                        viewBox="0 0 30 30">
                        <path
                            d="M 26.980469 5.9902344 A 1.0001 1.0001 0 0 0 26.292969 6.2929688 L 11 21.585938 L 4.7070312 15.292969 A 1.0001 1.0001 0 1 0 3.2929688 16.707031 L 10.292969 23.707031 A 1.0001 1.0001 0 0 0 11.707031 23.707031 L 27.707031 7.7070312 A 1.0001 1.0001 0 0 0 26.980469 5.9902344 z">
                        </path>
                    </svg>';
@endphp

<body>
    <div class="data">
        @foreach ($da['form_data'] as $item)
            @if ($item['type'] == 'text')
                <p style="top:{{ $item['top'] }};left:{{ $item['left'] }}">{{ $item['data'] }}</p>
            @else
                <p class='tick'
                    style="top:{{ $item['logical'][$item['data']]['top'] }};left:{{ $item['logical'][$item['data']]['left'] }}">
                    <img src="data:image/jpeg;base64,{{ base64_encode($svg) }}">
                </p>
            @endif
        @endforeach
        <p class="Upload_Photo">
            <img src="{{ $da['images'] }}">
        </p>
    </div>
    <div class="reports">
        <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(url('reports/' . $type . '.jpg'))) }} ">
    </div>
    <div class="page-break"></div>
    <div class="reports">
        <img
            src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(url('reports/' . $type . '_back.jpg'))) }} ">
    </div>
</body>
{{-- {{ dd(1) }} --}}

</html>
