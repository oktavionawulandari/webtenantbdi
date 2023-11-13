<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID CARD</title>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .card-print img {
            width: 517px;
            height: 517px;
            float: right;
            margin-right: 75px;
            margin-top: 546px;
            border-radius: 50%;
        }

        .card-print .text-name h4 {
            font-size: 90px;
            margin-top: 890px;
            margin-left: 25px;
            color: #154D51;
            font-family: "Poppins", sans-serif;
        }

        .card-print .text-name p {
            font-size: 45px;
            margin-left: 40px;
            margin-top: 12px;
            color: white;
            font-weight: bold;
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

@if ($card)

    <body
        style="background-image: url({{ public_path('/' . $card->card) }});
    background-repeat: no-repeat; background-size: cover">
@endif

@if ($tenant_members)
    <div class="card-print">
        @if ($tenant_members->profile)
            <img src="{{ public_path('/' . $tenant_members->profile) }}" alt={{ $tenant_members->profile }}>
        @endif
        <div class="text-name">
            <h4><b>{{ $tenant_members->short_name }}</b></h4>
            <p>{{ $tenant_members->tenant->name }}</p>
        </div>
    </div>
@endif
</body>

</html>
