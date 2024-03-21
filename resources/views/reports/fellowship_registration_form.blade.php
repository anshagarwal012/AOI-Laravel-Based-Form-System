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
        left: 630px;
        top: 253px;
    }

    .Upload_Photo img {
        width: 140px;
        height: 171px;
    }
</style>
@php
    $da = [
        'images' => $data['Upload_Photo'],
        'form_data' => [
            [
                'top' => '337px',
                'left' => '232px',
                'data' => $data['AccompanyingPersonsProfession1'] ?? '',
                'type' => 'text',
            ],
            ['top' => '337px', 'left' => '257px', 'data' => $data['Profession_name1'] ?? '', 'type' => 'text'],
            ['top' => '370px', 'left' => '147px', 'data' => $data['address1'] ?? '', 'type' => 'text'],
            ['top' => '438px', 'left' => '297px', 'data' => $data['institution_name'] ?? '', 'type' => 'text'],
            ['top' => '472px', 'left' => '162px', 'data' => $data['City'] ?? '', 'type' => 'text'],
            ['top' => '472px', 'left' => '544px', 'data' => $data['State'] ?? '', 'type' => 'text'],
            ['top' => '506px', 'left' => '143px', 'data' => $data['MobileNumber'] ?? '', 'type' => 'text'],
            ['top' => '540px', 'left' => '138px', 'data' => $data['Email'] ?? '', 'type' => 'text'],
            ['top' => '574px', 'left' => '236px', 'data' => $data['AOIMembershipNumber'] ?? '', 'type' => 'text'],
            ['top' => '767px', 'left' => '460px', 'data' => $data['DraftChequeNo'] ?? '', 'type' => 'text'],
            ['top' => '767px', 'left' => '588px', 'data' => $data['PaymentDate'] ?? '', 'type' => 'text'],
            ['top' => '805px', 'left' => '432px', 'data' => $data['BankName'] ?? '', 'type' => 'text'],
            ['top' => '824px', 'left' => '416px', 'data' => $data['CityName'] ?? '', 'type' => 'text'],
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
    <div class="page-break"></div>
    <div class="reports">
        <img
            src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(url('reports/' . $type . '_back.jpg'))) }} ">
    </div>
</body>

</html>
