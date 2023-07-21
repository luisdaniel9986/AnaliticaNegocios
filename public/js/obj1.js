
const btnConsultar= document.querySelector('#btnConsultar');
const inputGlucemia=document.querySelector('#glucemia');
const inputSistolica=document.querySelector('#sistolica');
const inputDiastolica=document.querySelector('#diastolica');
const inputInsulina=document.querySelector('#insulina');
const inputImc=document.querySelector('#imc');
const inputCetonas=document.querySelector('#cetonas');
const inputEdad=document.querySelector('#edad');
const checkPolidipsia=document.querySelector('.polidipsia');
const checkPoliuria=document.querySelector('.poliuria');
const checkPolifagia=document.querySelector('.polifagia');
const checkBeta=document.querySelector('.beta');
const checkAntecedentes=document.querySelector('.antecedentes');


document.addEventListener('DOMContentLoaded',()=>{
   
    events();
})

function events(){
    btnConsultar.addEventListener('click',()=>{
      consulta = {
        glucemia: parseFloat(inputGlucemia.value),
        sistolica: parseFloat(inputSistolica.value),
        diastolica: parseFloat(inputDiastolica.value),
        insulina: parseFloat(inputInsulina.value),
        imc: parseFloat(inputImc.value),
        cetonas: parseFloat(inputCetonas.value),
        edad: parseInt(inputEdad.value),
        polidipsia: checkPolidipsia.checked ? 1 : 0,
        poliuria: checkPoliuria.checked ? 1 : 0,
        polifagia: checkPolifagia.checked ? 1 : 0,
        beta: checkBeta.checked ? 1 : 0,
        antecedentes: checkAntecedentes.checked ? 1 : 0
      };
    
        console.log(consulta);
        //predecir();
        
    })    
}



function fetchGetProductsId(){

// Obtener el token CSRF desde la etiqueta meta en la vista
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const data=1;
const url = `http://localhost:4000/getProducts/${data}`;

// Configuración de la solicitud POST con el token CSRF como encabezado
const requestOptions = {
method: 'GET',
headers: {
  'Content-Type': 'application/json',
  'X-CSRF-TOKEN': csrfToken // Agregar el token CSRF como encabezado
},
};

// Realizar la solicitud POST utilizando Fetch API
fetch(url, requestOptions)
.then(response => {
  // Verificar si la solicitud fue exitosa (código de estado 200 a 299)
  if (!response.ok) {
    throw new Error('Error en la solicitud.');
  }
  return response.json(); // Devuelve los datos de respuesta en formato JSON
})
.then(data => {
  // Manejar los datos de respuesta aquí
  console.log('Respuesta del servidor:', data);
})
.catch(error => {
  // Capturar y manejar errores
  console.error('Error:', error);
});
}


function predecir(){

// Obtener el token CSRF desde la etiqueta meta en la vista
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
let anticuerposBetaPancreas;

if(inputAnticuerposBetaPancreas.value === 'SI'){
anticuerposBetaPancreas=1
}else if(inputAnticuerposBetaPancreas.value === 'NO'){
anticuerposBetaPancreas=0
}

//datos a enviar en JSON
const data = { 
'glucemia': inputGlucemia.value,
'anticuerposBetaPancreas' : anticuerposBetaPancreas,   
}; 

// ruta
const url = `http://localhost:4000/predecir`;

// Configuración de la solicitud POST con el token CSRF como encabezado
const requestOptions = {
method: 'POST',
headers: {
  'Content-Type': 'application/json',
  'X-CSRF-TOKEN': csrfToken // Agregar el token CSRF como encabezado
},
body: JSON.stringify(data)
};

// Realizar la solicitud POST utilizando Fetch API
fetch(url, requestOptions)
.then(response => {
  // Verificar si la solicitud fue exitosa (código de estado 200 a 299)
  if (!response.ok) {
    throw new Error('Error en la solicitud.');
  }
  return response.json(); // Devuelve los datos de respuesta en formato JSON
})
.then(data => {
  // Manejar los datos de respuesta aquí
  console.log('Respuesta del servidor:', data);
})
.catch(error => {
  // Capturar y manejar errores
  console.error('Error:', error);
});
}

