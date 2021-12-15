let iconos = []
let selecciones = []
let intentos = 0
var nivel = document.getElementById('nivel').innerHTML
let acertadas=0
let nt=4 + ( parseFloat(4) * parseFloat($("#nivel").text()))




generarTablero()

function cargarIconos() {
    iconos=[
        '<i class="fab fa-angellist"></i>',
        '<i class="fas fa-anchor"></i>',
        '<i class="fas fa-apple-alt"></i>',
        '<i class="fas fa-american-sign-language-interpreting"></i>',
        '<i class="fas fa-bicycle"></i>',
        '<i class="fas fa-chess-king"></i>',
        '<i class="fas fa-chess-knight"></i>',
        '<i class="fas fa-chess-pawn"></i>',
        '<i class="fas fa-chess-queen"></i>',
        '<i class="fas fa-chess-rook"></i>',
        '<i class="fas fa-cubes"></i>',
        '<i class="fas fa-dharmachakra"></i>',
        '<i class="fas fa-bullhorn"></i>',
        '<i class="fas fa-bus"></i>',
        '<i class="fas fa-candy-cane"></i>',
        '<i class="fas fa-car-side"></i>',
        '<i class="fas fa-certificate"></i>',
        '<i class="fas fa-coffee"></i>',
        '<i class="fas fa-concierge-bell"></i>',
        '<i class="fas fa-dice-five"></i>',
        '<i class="fas fa-dice-four"></i>'
    ]
    
}
function generarTablero() {
    
    
    
    intentos=0
    acertadas=0
    document.getElementById("intentos").innerHTML="Intentos "+intentos
    cargarIconos()
    let tablero = document.getElementById("tablero")
    let tarjetas = []
    for (let i = 0; i < nt; i++) {
        tarjetas.push(`
        <div class="area-tarjeta" onclick="seleccionarTarjeta(${i})">
        <div class="tarjeta" id="tarjeta${i}">
            <div class="cara trasera" id="trasera${i}">
                ${iconos[0]}

            </div>
            <div class="cara superior">
                <i class="far fa-question-circle"></i>

            </div>

        </div>
        
    </div>
    `)
    if(i%2==1){
        iconos.splice(0,1)
    }
        
        
    }
    tarjetas.sort(()=> Math.random() -0.5)
    tablero.innerHTML = tarjetas.join(" ")
    
}


function seleccionarTarjeta(i) {
    
    let tarjeta = document.getElementById("tarjeta"+i)
    if(tarjeta.style.transform != "rotateY(180deg)"){
        tarjeta.style.transform = "rotateY(180deg)"
      
        selecciones.push(i)
    }
   if(selecciones.length == 2){
       deseleccionar(selecciones)
       selecciones=[]
       intentos++
       document.getElementById("intentos").innerHTML="Intentos "+intentos
    
      
   }
   //console.log (selecciones)
    
}

function deseleccionar(selecciones) {
    setTimeout(() => {
       
        let tr1 = document.getElementById("trasera"+selecciones[0])
        let tr2 = document.getElementById("trasera"+selecciones[1])

        if(tr1.innerHTML != tr2.innerHTML){
           //Tarjetas no coinciden
            let t1 = document.getElementById("tarjeta"+selecciones[0])
            let t2 = document.getElementById("tarjeta"+selecciones[1])
            t1.style.transform="rotateY(0deg)"
            t2.style.transform="rotateY(0deg)"


            
            progress(nivel,acertadas,intentos,nt)
        }else{
            tr1.style.background="var(--success)"
            tr2.style.background="var(--success)"

            tr1.style.animation="parpadeo 0.7s"
            tr2.style.animation="parpadeo 0.7s"

            tr1.style.animationIterationCount="2"
            tr2.style.animationIterationCount="2"


            acertadas++

            progress(nivel,acertadas,intentos,nt)

            if(acertadas==nt/2){

                //INSERTAMOS EL PROGRESO ACTUAL
                progress(nivel,acertadas,intentos,nt)
              

                nivel=parseFloat(nivel)+parseFloat(1)
                document.getElementById('nivel').innerHTML=nivel
                
                nt=parseFloat(nt) + parseFloat(4)

                

                



        
    
                generarTablero()
            }

        }

    }, 1000);
    
}



function progress(nivelp,acertadasp,intentosp,ntp){


//INSERTAMOS EN BASE DE DATOS LOS VALORES
$.ajax({
    type:"POST",
    url:"includes/progress.php",
    data:"nivel="+nivelp+"&intentos="+intentosp+"&acertadas="+acertadasp+"&nt="+ntp
})


}