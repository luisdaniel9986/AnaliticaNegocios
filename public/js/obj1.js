
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
const answerTitle= document.querySelector('.respuesta_titulo');
const answer= document.querySelector('.respuesta p');
const spinner= document.querySelector('#load');
const divGrafGlucemia= document.querySelector('#grafGlucemia');
const pGrafGlucemia= document.querySelector('.grafGlucemia_desc');
let consulta={};

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
    
        //console.log(consulta);
        predecir(consulta);
        
    })    
}




function predecir(data){

// Obtener el token CSRF desde la etiqueta meta en la vista
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


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
  answerTitle.textContent="Consultando...";
  spinner.hidden=false;
  answer.textContent="";
  divGrafGlucemia.innerHTML=``;
  pGrafGlucemia.textContent="";
  setTimeout(() => {
    spinner.hidden=true;
    answer.textContent=data;
    answerTitle.textContent="Diagnóstico";
    graf("grafGlucemia",consulta.glucemia);
    pGrafGlucemia.textContent="Niveles de glucemia"
  }, 3000);

})
.catch(error => {
  // Capturar y manejar errores
  console.error('Error:', error);
});
}

const graf=(tipo,indice)=>{
  Highcharts.chart(tipo, {

    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false,
        height: '80%'
    },
    
    title: {
        text: 'Glucemia'
    },
    
    pane: {
        startAngle: -90,
        endAngle: 89.9,
        background: null,
        center: ['50%', '75%'],
        size: '110%'
    },
    
    // the value axis
    yAxis: {
        min: 0,
        max: 300,
        tickPixelInterval: 72,
        tickPosition: 'inside',
        tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
        tickLength: 20,
        tickWidth: 2,
        minorTickInterval: null,
        labels: {
            distance: 20,
            style: {
                fontSize: '14px'
            }
        },
        lineWidth: 0,
        plotBands: [{
            from: 70,
            to: 115,
            color: '#55BF3B', // green
            thickness: 20
        }, {
            from: 0,
            to: 70,
            color: '#DDDF0D', // yellow
            thickness: 20
        }, {
            from: 115,
            to: 300,
            color: '#DF5353', // red
            thickness: 20
        }]
    },
    
    series: [{
        name: 'Glucemia(mg/dL)',
        data: [indice],
        tooltip: {
            valueSuffix: 'mg/dL'
        },
        dataLabels: {
            format: '{y} %',
            borderWidth: 0,
            color: (
                Highcharts.defaultOptions.title &&
                Highcharts.defaultOptions.title.style &&
                Highcharts.defaultOptions.title.style.color
            ) || '#333333',
            style: {
                fontSize: '16px'
            }
        },
        dial: {
            radius: '80%',
            backgroundColor: 'gray',
            baseWidth: 12,
            baseLength: '0%',
            rearLength: '0%'
        },
        pivot: {
            backgroundColor: 'gray',
            radius: 6
        }
    
    }]
    
    });
}