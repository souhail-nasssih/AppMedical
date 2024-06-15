<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboardMedecin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboardMedecin/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboardMedecin/assets/css/style.css') }}">
    <!--[if lt IE 9]>
        <script src="{{ asset('dashboardMedecin/assets/js/html5shiv.min.js') }}"></script>
        <script src="{{ asset('dashboardMedecin/assets/js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body>
    <div class="main-wrapper error-wrapper">
        <div class="error-box">
            <h1>Attente</h1>
            <h3><i class="fa fa-hourglass-half"></i> Votre compte est en attente d'approbation</h3>
            <p>Votre demande d'inscription en tant que médecin est en cours de traitement par l'administrateur. Vous recevrez une notification une fois votre compte approuvé.</p>
            <!-- <a href="{{ route('medecin.dashboard') }}" class="btn btn-primary go-home">Retour à l'accueil</a> -->
        </div>
    </div>
    <script src="{{ asset('dashboardMedecin/assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('dashboardMedecin/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('dashboardMedecin/assets/js/bootstrap.min.js') }}"></script>
</body>

</html>
