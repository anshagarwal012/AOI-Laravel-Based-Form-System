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
        left: 642px;
        top: 240px;
    }

    .Upload_Photo img {
        width: 95px;
        height: 111px;
    }

    .tick img {
        width: 50px;
        height: 50px;
        z-index: 69;
    }
</style>
@php
    $da = [
        'images' => $data['Upload_Photo'],
        'form_data' => [
            ['top' => '242px', 'left' => '191px', 'data' => $data['Membership'] ?? '', 'type' => 'text'],
            [
                'top' => '265px',
                'left' => '203px',
                'data' => $data['AccompanyingPersonsProfession1'] ?? '',
                'type' => 'text',
            ],
            [
                'top' => '265px',
                'left' => '228px',
                'data' => $data['AccompanyingPersonsProfessionname1'] ?? '',
                'type' => 'text',
            ],
            [
                'top' => '166px',
                'left' => '648px',
                'data' => $data['model'] ?? '',
                'type' => 'logical',
                'logical' => [
                    'office' => [
                        'top' => '384px',
                        'left' => '648px',
                    ],
                    'Residency' => [
                        'top' => '384px',
                        'left' => '698px',
                    ],
                ],
            ],
            ['top' => '288px', 'left' => '197px', 'data' => $data['Date'] ?? '', 'type' => 'text'],
            ['top' => '288px', 'left' => '262px', 'data' => $data['Month'] ?? '', 'type' => 'text'],
            ['top' => '288px', 'left' => '328px', 'data' => $data['Year'] ?? '', 'type' => 'text'],
            ['top' => '311px', 'left' => '182px', 'data' => $data['address1'] ?? '', 'type' => 'text'],
            ['top' => '354px', 'left' => '180px', 'data' => $data['address2'] ?? '', 'type' => 'text'],
            ['top' => '403px', 'left' => '243px', 'data' => $data['institution_name'] ?? '', 'type' => 'text'],
            ['top' => '549px', 'left' => '232px', 'data' => $data['courses'] ?? '', 'type' => 'text'],
            ['top' => '577px', 'left' => '256px', 'data' => $data['Sno'] ?? '', 'type' => 'text'],
            ['top' => '576px', 'left' => '356px', 'data' => $data['State'] ?? '', 'type' => 'text'],
            ['top' => '601px', 'left' => '219px', 'data' => $data['others'] ?? '', 'type' => 'text'],
            ['top' => '430px', 'left' => '183px', 'data' => $data['Telephone'] ?? '', 'type' => 'text'],
            ['top' => '287px', 'left' => '483px', 'data' => $data['City'] ?? '', 'type' => 'text'],
            ['top' => '287px', 'left' => '582px', 'data' => $data['State2'] ?? '', 'type' => 'text'],
            ['top' => '454px', 'left' => '141px', 'data' => $data['MobileNumber'] ?? '', 'type' => 'text'],
            ['top' => '453px', 'left' => '429px', 'data' => $data['Email'] ?? '', 'type' => 'text'],
            ['top' => '507px', 'left' => '210px', 'data' => $data['year1'] ?? '', 'type' => 'text'],
            ['top' => '506px', 'left' => '364px', 'data' => $data['college1'] ?? '', 'type' => 'text'],
            ['top' => '532px', 'left' => '209px', 'data' => $data['year2'] ?? '', 'type' => 'text'],
            ['top' => '532px', 'left' => '363px', 'data' => $data['college2'] ?? '', 'type' => 'text'],
            ['top' => '834px', 'left' => '445px', 'data' => $data['DraftChequeNo'] ?? '', 'type' => 'text'],
            ['top' => '834px', 'left' => '558px', 'data' => $data['PaymentDate'] ?? '', 'type' => 'text'],
            ['top' => '851px', 'left' => '393px', 'data' => $data['BankName'] ?? '', 'type' => 'text'],
            ['top' => '867px', 'left' => '384px', 'data' => $data['CityName'] ?? '', 'type' => 'text'],
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
            <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(url('uploads/' . $da['images']))) }}">
        </p>
    </div>
    <div class="reports">
        <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(url('reports/' . $type . '.jpg'))) }} ">
    </div>
</body>

</html>
