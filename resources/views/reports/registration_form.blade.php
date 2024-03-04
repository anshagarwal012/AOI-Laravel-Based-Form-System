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
        position: fixed;
    }

    .name_profession {
        left: 225px;
        top: 169px;
    }
    .full_name {
        left: 250px;
        top: 169px;
    }
    .address1 {
        left: 145px;
        top: 194px;
    }
    .address2 {
        left: 80px;
        top: 219px;
    }
    .name_inst_hos {
        left: 300px;
        top: 242px;
    }
    .institution_name {
        left: 370px;
        top: 242px;
    }
    .City {
        left: 170px;
        top: 266px;
    }
    .State {
        left: 260px;
        top: 266px;
    }
    .MobileNumber {
        left: 140px;
        top: 292px;
    }
    .Email {
        left: 135px;
        top: 314px;
    }
    .AOIMembershipNumber {
        left: 215px;
        top: 339px;
    }
    .AccompanyingPersonsProfession1 {
        left: 380px;
        top: 364px;
    }
    .AccompanyingPersonsProfessionname1 {
        left: 404px;
        top: 364px;
    }
    .AccompanyingPersonsProfession2 {
        left: 380px;
        top: 389px;
    }
    .AccompanyingPersonsProfessionname2 {
        left: 404px;
        top: 389px;
    }
    .DraftChequeNo {
        left: 404px;
        top: 912px;
    }
    .PaymentDate {
        left: 515px;
        top: 912px;
    }
    .BankName {
        left: 345px;
        top: 930px;
    }
    .CityName {
        left: 345px;
        top: 948px;
    }
    .Upload_Photo{
        left: 634px;
        top: 155px;
    }
    .Upload_Photo img{
        width: 140px;
        height: 155px;
    }
</style>

<body>
    {{-- {{ dd($data) }} --}}
    <div class="data">
        <p class="name_profession">{{($data['name_profession'].'.' ?? '')}}</p>
        <p class="full_name">{{($data['full_name'] ?? '')}}</p>
        <p class="address1">{{($data['address1'] ?? '')}}</p>
        <p class="address2">{{($data['address2'] ?? '')}}</p>
        <p class="name_inst_hos">{{($data['name_inst_hos']."." ?? '')}}</p>
        <p class="institution_name">{{($data['institution_name'] ?? '')}}</p>
        <p class="City">{{($data['City'] ?? '')}}/</p>
        <p class="State">{{($data['State'] ?? '')}}</p>
        <p class="MobileNumber">{{($data['MobileNumber'] ?? '')}}</p>
        <p class="Email">{{($data['Email'] ?? '')}}</p>

        <p class="AOIMembershipNumber">{{($data['AOIMembershipNumber'] ?? '')}}</p>

        <p class="AccompanyingPersonsProfession1">{{($data['AccompanyingPersonsProfession1'].'.' ?? '')}}</p>
        <p class="AccompanyingPersonsProfessionname1">{{($data['AccompanyingPersonsProfessionname1'] ?? '')}}</p>
        <p class="AccompanyingPersonsProfession2">{{($data['AccompanyingPersonsProfession2'].'.' ?? '')}}</p>
        <p class="AccompanyingPersonsProfessionname2">{{($data['AccompanyingPersonsProfessionname2'] ?? '')}}</p>
        
        {{-- <p class="payment_method">{{($data['payment_method'] ?? '')}}</p> --}}
        <p class="DraftChequeNo">{{($data['DraftChequeNo'] ?? '')}}</p>
        <p class="PaymentDate">{{($data['PaymentDate'] ?? '')}}</p>
        <p class="BankName">{{($data['BankName'] ?? '')}}</p>
        <p class="CityName">{{($data['CityName'] ?? '')}}</p>
        {{-- <p class="form_type">{{($data['form_type'] ?? '')}}</p> --}}
        <p class="Upload_Photo"><img src="data:image/jpeg;base64,{{base64_encode(file_get_contents(url('uploads/'.$data['Upload_Photo'])))}}"></p>
    </div>
    <div class="reports"><img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(url('reports/' . $type . '.jpg'))) }} "></div>
    {{-- <div class="page-break"></div> --}}
</body>
{{-- {{dd(1)}} --}}
</html>
