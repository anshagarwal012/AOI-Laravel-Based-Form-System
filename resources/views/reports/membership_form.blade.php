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
        left: 642px;
        top: 240px;
    }

    .Upload_Photo img {
        width: 95px;
        height: 111px;
    }
</style>
@php
    $da = [
        'images' => $data['Upload_Photo'],
        'form_data' => [
            [
                'spacing' => '9.9px',
                'top' => '239px',
                'left' => '187px',
                'data' => $data['Membership'] ?? '',
                'type' => 'text',
            ],
            [
                'spacing' => '9.8px',
                'top' => '263px',
                'left' => '203px',
                'data' => $data['AccompanyingPersonsProfession1'] ?? '',
                'type' => 'text',
            ],
            [
                'spacing' => '9.5px',
                'top' => '263px',
                'left' => '255px',
                'data' => $data['AccompanyingPersonsProfessionname1'] ?? '',
                'type' => 'text',
            ],
            [
                'spacing' => 'normal',
                'top' => '317px',
                'left' => '520px',
                'data' => $data['datebirth'] ?? '',
                'type' => 'text',
            ],
            [
                'spacing' => 'normal',
                'top' => '346px',
                'left' => '250px',
                'data' => $data['address1'] ?? '',
                'type' => 'text',
            ],
            [
                'spacing' => 'normal',
                'top' => '373px',
                'left' => '270px',
                'data' => $data['address2'] ?? '',
                'type' => 'text',
            ],
            [
                'spacing' => 'normal',
                'top' => '455px',
                'left' => '320px',
                'data' => $data['institution_name'] ?? '',
                'type' => 'text',
            ],
            [
                'spacing' => 'normal',
                'top' => '455px',
                'left' => '148px',
                'data' => $data['courses'] ?? '',
                'type' => 'text',
            ],
            [
                'spacing' => 'normal',
                'top' => '402px',
                'left' => '155px',
                'data' => $data['Sno'] ?? '',
                'type' => 'text',
            ],
            [
                'spacing' => 'normal',
                'top' => '486px',
                'left' => '330px',
                'data' => $data['State'] ?? '',
                'type' => 'text',
            ],
            [
                'spacing' => 'normal',
                'top' => '518px',
                'left' => '289px',
                'data' => $data['others'] ?? '',
                'type' => 'text',
            ],
            [
                'spacing' => 'normal',
                'top' => '486px',
                'left' => '330px',
                'data' => $data['Telephone'] ?? '',
                'type' => 'text',
            ],
            [
                'spacing' => 'normal',
                'top' => '486px',
                'left' => '330px',
                'data' => $data['city'] ?? '',
                'type' => 'text',
            ],
            [
                'spacing' => 'normal',
                'top' => '486px',
                'left' => '330px',
                'data' => $data['State2'] ?? '',
                'type' => 'text',
            ],
            [
                'spacing' => 'normal',
                'top' => '486px',
                'left' => '330px',
                'data' => $data['MobileNumber'] ?? '',
                'type' => 'text',
            ],
            [
                'spacing' => 'normal',
                'top' => '518px',
                'left' => '289px',
                'data' => $data['Email'] ?? '',
                'type' => 'text',
            ],
            [
                'spacing' => 'normal',
                'top' => '486px',
                'left' => '330px',
                'data' => $data['AOIMembershipNumber'] ?? '',
                'type' => 'text',
            ],
            [
                'spacing' => 'normal',
                'top' => '486px',
                'left' => '330px',
                'data' => $data['AccompanyingPersonsProfession1'] ?? '',
                'type' => 'text',
            ],
            [
                'spacing' => 'normal',
                'top' => '518px',
                'left' => '289px',
                'data' => $data['Accompanying_1'] ?? '',
                'type' => 'text',
            ],
            [
                'spacing' => 'normal',
                'top' => '518px',
                'left' => '289px',
                'data' => $data['AccompanyingPersonsProfession2'] ?? '',
                'type' => 'text',
            ],
            [
                'spacing' => 'normal',
                'top' => '518px',
                'left' => '289px',
                'data' => $data['Accompanying_2'] ?? '',
                'type' => 'text',
            ],
        ],
    ];
@endphp

<body>
    <div class="data">
        @foreach ($da['form_data'] as $item)
            <p style="top:{{ $item['top'] }};left:{{ $item['left'] }};letter-spacing:{{ $item['spacing'] }}">
                {{ $item['data'] }}</p>
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
