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

    @font-face {
        font-family: 'Open Sans';
        src: url({{ storage_path('fonts/OpenSans-Bold.ttf') }}) format("truetype");
        font-weight: 400;
        font-style: normal;
    }

    .reports img {
        width: 100%;
        min-height: 100vh;
    }

    html,
    body {
        margin: 0px;
        font-family: 'Open Sans';
    }

    .data {
        position: absolute;
    }

    p {
        position: relative;
    }

    .shop_name {
        left: 480px;
        top: 80px;
        font-size: 30px;
        text-align: center;
    }

    .entry_id {
        left: 480px;
        top: 50px;
        font-size: 24px;
        text-align: center;
    }

    .name {
        left: 130px;
        top: 54px;
    }

    .mob {
        left: 190px;
        top: 45px;
    }

    .time {
        left: 190px;
        top: 30px;
    }

    .date {
        left: 600px;
        top: 105px;
    }

    .ptype {
        left: 400px;
        top: 140px;
    }

    .cname {
        left: 400px;
        top: 130px;
    }

    .mno {
        left: 400px;
        top: 122px;
    }

    .imei {
        left: 400px;
        top: 112px;
    }

    .problem {
        left: 400px;
        top: 105px;
    }

    .accessories {
        left: 400px;
        top: 95px;
    }

    .advance {
        left: 600px;
        top: 120px;
    }

    .Expences {
        left: 600px;
        top: 110px;
    }

    .Sname {
        left: 220px;
        top: 215px;
    }

    .email {
        left: 220px;
        top: 195px;
    }

    .address {
        left: 220px;
        top: 175px;
    }
</style>

<body>
    {{-- {{ dd($data) }} --}}
    <div class="data">
        <p class="name_profession">{{($data['name_profession'] ?? '')}}</p>
        <p class="full_name">{{($data['full_name'] ?? '')}}</p>
        <p class="address1">{{($data['address1'] ?? '')}}</p>
        <p class="address2">{{($data['address2'] ?? '')}}</p>
        <p class="name_inst_hos">{{($data['name_inst_hos'] ?? '')}}</p>
        <p class="institution_name">{{($data['institution_name'] ?? '')}}</p>
        <p class="City">{{($data['City'] ?? '')}}</p>
        <p class="State">{{($data['State'] ?? '')}}</p>
        <p class="MobileNumber">{{($data['MobileNumber'] ?? '')}}</p>
        <p class="Email">{{($data['Email'] ?? '')}}</p>
        <p class="AOIMembershipNumber">{{($data['AOIMembershipNumber'] ?? '')}}</p>
        <p class="AccompanyingPersonsProfession1">{{($data['AccompanyingPersonsProfession1'] ?? '')}}</p>
        <p class="AccompanyingPersonsProfessionname1">{{($data['AccompanyingPersonsProfessionname1'] ?? '')}}</p>
        <p class="AccompanyingPersonsProfession2">{{($data['AccompanyingPersonsProfession2'] ?? '')}}</p>
        <p class="payment_method">{{($data['payment_method'] ?? '')}}</p>
        <p class="DraftChequeNo">{{($data['DraftChequeNo'] ?? '')}}</p>
        <p class="PaymentDate">{{($data['PaymentDate'] ?? '')}}</p>
        <p class="BankName">{{($data['BankName'] ?? '')}}</p>
        <p class="CityName">{{($data['CityName'] ?? '')}}</p>
        <p class="form_type">{{($data['form_type'] ?? '')}}</p>
        <p class="Upload_Photo">{{($data['Upload_Photo'] ?? '')}}</p>
    </div>
    <div class="reports"><img src="{{ public_path('reports/' . $type . '.jpg') }}"></div>
    {{-- <div class="page-break"></div> --}}
</body>
{{-- {{dd(1)}} --}}
</html>
