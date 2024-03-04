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
    @foreach ($data as $key => $value)
        <div class="data">
            <p class="shop_name">{{ $value['shop_name'] }}</p>
            <p class="entry_id">{{ $value['entry_id'] }}</p>
            <p class="name">{{ $value['name'] }}</p>
            <p class="mob">{{ $value['mob'] }}</p>
            <p class="time">{{ $value['time'] }}</p>
            <p class="date">{{ $value['date'] }}</p>
            <p class="ptype">{{ $value['ptype'] }}</p>
            <p class="cname">{{ $value['cname'] }}</p>
            <p class="mno">{{ $value['mno'] }}</p>
            <p class="imei">{{ $value['imei'] }}</p>
            <p class="problem">{{ $value['problem'] }}</p>
            <p class="accessories">{{ $value['accessories'] }}</p>
            <p class="advance">{{ $value['advance'] }}</p>
            <p class="Expences">{{ $value['Expences'] }}</p>
            <p class="Sname">{{ $value['Sname'] }}</p>
            <p class="email">{{ $value['email'] }}</p>
            <p class="address">{{ $value['address'] }}</p>
        </div>
        <div class="reports"><img src="{{ public_path('/reports/BSM_REPAIR.png') }}" alt=""></div>
        @if (count($data) - 1 > $key)
            <div class="page-break"></div>
        @endif
    @endforeach
    {{-- <div class="reports"><img src="/reports/BSM_REPAIR.png" alt=""></div> --}}
</body>

</html>
