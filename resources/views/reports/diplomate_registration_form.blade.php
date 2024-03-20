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
        text-wrap: nowrap;
    }

    .Upload_Photo {
        left: 633px;
        top: 257px;
    }

    .Upload_Photo img {
        width: 137px;
        height: 170px;
    }
</style>
@php
    $da = [
        'images' => $data['Upload_Photo'],
        'form_data' => [
            [
                'top' => '341px',
                'left' => '237px',
                'data' => $data['AccompanyingPersonsProfession1'] ?? '',
                'type' => 'text',
            ],
            ['top' => '341px', 'left' => '262px', 'data' => $data['Profession_name1'] ?? '', 'type' => 'text'],
            ['top' => '374px', 'left' => '152px', 'data' => $data['address1'] ?? '', 'type' => 'text'],
            ['top' => '441px', 'left' => '302px', 'data' => $data['institution_name'] ?? '', 'type' => 'text'],
            ['top' => '475px', 'left' => '167px', 'data' => $data['City'] ?? '', 'type' => 'text'],
            ['top' => '474px', 'left' => '395px', 'data' => $data['State'] ?? '', 'type' => 'text'],
            ['top' => '509px', 'left' => '148px', 'data' => $data['MobileNumber'] ?? '', 'type' => 'text'],
            ['top' => '542px', 'left' => '143px', 'data' => $data['Email'] ?? '', 'type' => 'text'],
            ['top' => '577px', 'left' => '241px', 'data' => $data['AOIMembershipNumber'] ?? '', 'type' => 'text'],
            ['top' => '767px', 'left' => '484px', 'data' => $data['DraftChequeNo'] ?? '', 'type' => 'text'],
            ['top' => '767px', 'left' => '607px', 'data' => $data['PaymentDate'] ?? '', 'type' => 'text'],
            ['top' => '805px', 'left' => '456px', 'data' => $data['BankName'] ?? '', 'type' => 'text'],
            ['top' => '824px', 'left' => '438px', 'data' => $data['CityName'] ?? '', 'type' => 'text'],
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
    {{-- <div class="page-break"></div> --}}
</body>

</html>
