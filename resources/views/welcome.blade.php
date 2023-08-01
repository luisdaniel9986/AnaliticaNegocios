<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Analítica de Negocios</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body style="margin:0 auto; max-width:1200px">
   <div class="container-fluid">
    {{-- <div class="row pt-5">
        <div class="col  d-flex justify-content-center">
            <h2></h2>
        </div>
    </div> --}}
    <div class="row" style="padding: 6.25rem 0" >
        <div class="col-6 imagenLogo p-0">
            <img class="img-fluid imgWelcome" id="img-welcome" src="img/logo.png" alt="logo">
        </div>
        <div class="col-5 objetivos p-0 d-flex flex-column justify-content-center">
            <div class="row">
                <div class="col pb-2">
                    <h2>LISTADO DE OBJETIVOS</h2>
                </div>
            </div>
            <div class="row" style="padding:0 12px">
                <div class="col p-0"  >
                    <button type="button" class="btn btn-primary btnObjetivo1">
                        <a href="{{ route('predecir-diabetes') }}" class="btnObjetivo1" style="text-decoration-line: none;color:#fff">
                        OBJETIVO 1
                        </a>
                    </button>
                </div>
                <div class="col p-0 "  >
                    <button type="button" class="btn btn-primary">
                        <a href="#" style="text-decoration-line: none;color:#fff">
                            OBJETIVO 2
                        </a>
                    </button>
                </div>
                <div class="col p-0 "  >
                    <button type="button" class="btn btn-primary">
                        <a href="{{ route('predecir-dengue') }}" style="text-decoration-line: none;color:#fff">
                            OBJETIVO 3
                        </a>
                    </button>
                </div>
                {{-- <div class="col p-0"  >
                    <button type="button" class="btn btn-primary">
                        <a href="#" style="text-decoration-line: none;color:#fff">
                            OBJETIVO 4
                        </a>
                    </button>
                </div> --}}
            </div>
           
        </div>
        
    </div>
   </div>

   <script src="js/welcome.js">  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
