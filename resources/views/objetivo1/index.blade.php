<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
      <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Agregar la etiqueta meta para el token CSRF -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="css/styles.css">
        
            
       
</head>
<body>
    
    <div class="container-fluid">
        <div class="row d-flex justify-content-center" style="padding:250px 0">
            <div class="col-10">
                <div class="row d-flex justify-content-center">
                    <div class="col-5">
                        <div class="row">
                            
                            <div class="col-6">
                                <div class="input-group input-group-sm mb-3">
                                    <input type="number" required id="glucemia" class="form-control" placeholder="Nivel de glucemia" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-sm mb-3">
                                    <input type="number" id="sistolica" class="form-control" placeholder="Presión sistólica" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-sm mb-3">
                                    <input type="number" id="diastolica" class="form-control" placeholder="Presión diastólica" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-sm mb-3">
                                    <input type="number"    id="insulina" class="form-control" placeholder="Nivel de insulina" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-sm mb-3">
                                    <input type="number"    id="imc" class="form-control" placeholder="Índice de masa corporal" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-sm mb-3">
                                    <input type="number"    id="cetonas" class="form-control" placeholder="Nivel de cetonas" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-sm mb-3">
                                    <input type="number"    id="edad" class="form-control" placeholder="Edad" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>
                            <div class="col-12">
                                
                                    <div class="card">
                                        <div class="card-body p-4">
                                            <div class="row">
                                                <div class="col-6 form-check">
                                                    <input class="form-check-input polidipsia" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Polidipsia
                                                    </label>
                                                </div>
                                                <div class="col-6 form-check">
                                                    <input class="form-check-input poliuria" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Poliuria
                                                    </label>
                                                </div>
                                                <div class="col-6 form-check">
                                                    <input class="form-check-input polifagia" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                    Polifagia
                                                    </label>
                                                </div>
                                                <div class="col-6 form-check">
                                                    <input class="form-check-input beta" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                    Anticuerpos beta
                                                    </label>
                                                </div>
                                                <div class="col-6 form-check">
                                                    <input class="form-check-input antecedentes" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                    Antecedentes familiares
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                          
                            <div class="col-12">
                                <button type="submit" id="btnConsultar" class="btn btn-primary mt-3">Consultar</button>
                            </div>
                        </div>
                            
                        
                    </div>
                    <div class="col-5">

                        <div class="card p-4 card-respuesta">
                            <div class="card-body d-flex flex-column justify-content-center">
                              
                                <div class="col d-flex justify-content-center">
                                    <h5 class="card-title mb-5 respuesta_titulo" >Resultado</h5>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <div class="breeding-rhombus-spinner" hidden id="load">
                                        <div class="rhombus child-1"></div>
                                        <div class="rhombus child-2"></div>
                                        <div class="rhombus child-3"></div>
                                        <div class="rhombus child-4"></div>
                                        <div class="rhombus child-5"></div>
                                        <div class="rhombus child-6"></div>
                                        <div class="rhombus child-7"></div>
                                        <div class="rhombus child-8"></div>
                                        <div class="rhombus big"></div>
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-center respuesta">
                                    <p></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
               
            </div>  
        </div>
    </div>
    
    
   
      
        
   


    <script src="js/obj1.js"></script>
   <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>
</html>