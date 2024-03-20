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
        width:500px;
    }

    .Upload_Photo {
        left: 633px;
        top: 150px;
    }

    .Upload_Photo img {
        width: 140px;
        height: 155px;
    }
</style>

@php
    $da = [
        'images' => $data['Upload_Photo'],
        'form_data' => [
            ['top' => '166px', 'left' => '225px', 'data' => $data['name_profession'] ?? '', 'type' => 'text'],
            ['top' => '166px', 'left' => '250px', 'data' => $data['full_name'] ?? '', 'type' => 'text'],
            ['top' => '190px', 'left' => '145px', 'data' => $data['address1'] ?? '', 'type' => 'text'],
            ['top' => '214px', 'left' => '80px', 'data' => $data['address2'] ?? '', 'type' => 'text'],
            ['top' => '237px', 'left' => '300px', 'data' => $data['name_inst_hos'] ?? '', 'type' => 'text'],
            ['top' => '237px', 'left' => '360px', 'data' => $data['institution_name'] ?? '', 'type' => 'text'],
            ['top' => '262px', 'left' => '161px', 'data' => $data['City'] ?? '', 'type' => 'text'],
            ['top' => '262px', 'left' => '255px', 'data' => $data['State'] ?? '', 'type' => 'text'],
            ['top' => '288px', 'left' => '133px', 'data' => $data['MobileNumber'] ?? '', 'type' => 'text'],
            ['top' => '310px', 'left' => '130px', 'data' => $data['Email'] ?? '', 'type' => 'text'],
            ['top' => '335px', 'left' => '220px', 'data' => $data['AOIMembershipNumber'] ?? '', 'type' => 'text'],
            [
                'top' => '359px',
                'left' => '378px',
                'data' => $data['AccompanyingPersonsProfession1'] ?? '',
                'type' => 'text',
            ],
            [
                'top' => '359px',
                'left' => '401px',
                'data' => $data['AccompanyingPersonsProfessionname1'] ?? '',
                'type' => 'text',
            ],
            [
                'top' => '384px',
                'left' => '380px',
                'data' => $data['AccompanyingPersonsProfession2'] ?? '',
                'type' => 'text',
            ],
            [
                'top' => '384px',
                'left' => '404px',
                'data' => $data['AccompanyingPersonsProfessionname2'] ?? '',
                'type' => 'text',
            ],
            ['top' => '898px', 'left' => '404px', 'data' => $data['DraftChequeNo'] ?? '', 'type' => 'text'],
            ['top' => '898px', 'left' => '515px', 'data' => $data['PaymentDate'] ?? '', 'type' => 'text'],
            ['top' => '916px', 'left' => '339px', 'data' => $data['BankName'] ?? '', 'type' => 'text'],
            ['top' => '933px', 'left' => '333px', 'data' => $data['CityName'] ?? '', 'type' => 'text'],
        ],
    ];
@endphp

<body>
    <div class="data">
        @foreach ($da['form_data'] as $item)
            <p style="top:{{ $item['top'] }};left:{{ $item['left'] }}">{{ $item['data'] }}</p>
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
