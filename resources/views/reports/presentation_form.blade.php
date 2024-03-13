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

    .tittle {
        left top
    }

    .Model {
        left top
    }

    .Name_author {
        left top
    }

    .AOIMembershipNumber {
        left top
    }

    .Designation {
        left top
    }

    .name_inst_hos {
        left top
    }

    .Email {
        left top
    }

    .MobileNumber {
        left top
    }

    .address1 {
        left top
    }

    .City {
        left top
    }

    .C0_authors {
        left top
    }

    .name_inst {
        left top
    }

    .State {
        left top
    }

    .Upload_Photo {
        left: 634px;
        top: 155px;
    }

    .Upload_Photo img {
        width: 140px;
        height: 155px;
    }
</style>

<body>
    {{-- {{ dd($data) }} --}}
    <div class="data">
        {{-- <p class="name_profession">{{ $data['name_profession'] . '.' ?? '' }}</p> --}}
        <p class="title">{{ $data['Tittle_Presentation'] ?? '' }}</p>
        <p class="Model">{{ $data['model'] ?? '' }}</p>
        <p class="Name_author">{{ $data['Name_author'] ?? '' }}</p>
        <p class="AOIMembershipNumber">{{ $data['AOIMembershipNumber'] ?? '' }}</p>
        <p class="Designation">{{ $data['Designation'] ?? '' }}</p>
        <p class="name_inst_hos">{{ $data['name_inst_hos'] ?? '' }}</p>
        <p class="Email">{{ $data['Email'] ?? '' }}</p>
        <p class="MobileNumber">{{ $data['MobileNumber'] ?? '' }}</p>
        <p class="address1">{{ $data['address1 '] ?? '' }}</p>
        <p class="City">{{ $data['City'] ?? '' }}</p>
        <p class="C0_authors">{{ $data['C0_authors'] ?? '' }}</p>
        <p class="name_inst">{{ $data['name_inst'] ?? '' }}</p>
        <p class="State">{{ $data['State'] ?? '' }}</p>

        <p class="Upload_Photo"><img
                src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(url('uploads/' . $data['Upload_Photo']))) }}">
        </p>
    </div>
    <div class="reports"><img
            src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(url('reports/' . $type . '.jpg'))) }} ">
    </div>
    {{-- <div class="page-break"></div> --}}
</body>
{{-- {{dd(1)}} --}}

</html>
