const cartasBiblio = document.querySelectorAll('.carta-a');
const VDeck = document.getElementById('verDeck');
const VContador = document.getElementById('contador');
const boton = document.getElementById('guardar');

let VCartas;
let contador;

let cartasDeck = [];
let inDeck;

var token = document.getElementsByName("_token")[0].value;

console.log(token);

console.log(sessionStorage.getItem('deck'));

if(sessionStorage.getItem('deck')){
    cartasDeck = sessionStorage.getItem('deck');
    cartasDeck = JSON.parse(cartasDeck);

    refrescar(cartasDeck);

}

cartasBiblio.forEach((cartaA) => {
    cartaA.addEventListener("click", (event) => {
        inDeck = false;
        cartasDeck.forEach((carta) => {
            if(carta[0].includes(cartaA.id)){
                if(carta[1] < 4){
                    carta[1]++;
                    contador++;
                    refrescar(cartasDeck, contador);
                }
                inDeck = true;
            }
        });

        if(!inDeck){
            cartasDeck.push([cartaA.id,1]);
            refrescar(cartasDeck);
        }

        sessionStorage.setItem('deck', JSON.stringify(cartasDeck));

        console.log(sessionStorage.getItem('deck'));
      });
});

function refrescar(cartas, contador){

    VDeck.innerHTML = '';

    contador = contar(cartas, contador);

    let idCartas = [];
    let dataCartas = [];


    if (cartas.length > 0){
        //Junto las ID de las cartas
        cartas.forEach(carta => {
            idCartas.push(carta[0]);
        });

        //Traigo informacion de las cartas por ID
        $.ajax({
        url: 'getCartas',
        method: "GET",
            data: {
                '_token': token,
                'ids': idCartas,
        },
        dataType: "json",
        success: function (data) {
            console.log(data);
            dataCartas = data.response.cartas;

            dataCartas.forEach((dataCarta) => {
                cartas.forEach((carta) => {
                    if(carta[0] == dataCarta.id){
                        dataCarta.cantidad = carta[1];
                    }
                });
            });

            //crea los contenedores de cartas en mazo
                dataCartas.forEach((carta) => {
                    let Ccolor = carta.color.split(' ');

                    console.log(Ccolor);

                    let Vcolor = "";

                    Ccolor.forEach((color) => {
                        switch (color) {
                            case 'A':
                                Vcolor = Vcolor + '<img class="img-logo-carta-en-mazo" src="./img/logo-azul.png" alt="...">'
                              break;
                              case 'B':
                                Vcolor = Vcolor + '<img class="img-logo-carta-en-mazo" src="./img/logo-blanco.png" alt="...">'
                              break;
                              case 'N':
                                Vcolor = Vcolor + '<img class="img-logo-carta-en-mazo" src="./img/logo-negro.png" alt="...">'
                              break;
                              case 'R':
                                Vcolor = Vcolor + '<img class="img-logo-carta-en-mazo" src="./img/logo-rojo.png" alt="...">'
                              break;
                              case 'V':
                                Vcolor = Vcolor + '<img class="img-logo-carta-en-mazo" src="./img/logo-verde.png" alt="...">'
                              break;
                              case 'I':
                                Vcolor = Vcolor + '<img class="img-logo-carta-en-mazo" src="./img/logo-incoloro.png" alt="...">'
                              break;
                            default:
                              break;
                          }
                    });

                    let Vcarta = document.createElement("div");
                    Vcarta.innerHTML = `
                    <div style="border-radius: 12px;background-image: url('${carta.img_sola}');background-size:cover;height:50px">
                    <div id="${carta.id}" class="carta-en-mazo d-flex justify-content-between px-2" style="background-color:rgba(0, 0, 0, 0.38);align-items:center;height:50px" >
                    <div class="d-flex">
                        ${Vcolor}
                    </div>
                    ${carta.nombre}
                    <span class="badge text-bg-secondary" style="height:35px;font-size:20px">x${carta.cantidad}</span>
                    </div></div>`;
                VDeck.appendChild(Vcarta);
                });

                //Selecciona contenedores
                VCartas = document.querySelectorAll('.carta-en-mazo');

                let aux=-1;

                //Programa comportamiento para quitar carta del mazo en todos los contenedores
                VCartas.forEach((vcarta) => {
                    vcarta.addEventListener("click", (event) => {

                        cartas.forEach((carta) => {
                            if(carta[0].includes(vcarta.id)){
                                if(carta[1] > 0){
                                    carta[1] = carta[1]-1;
                                    contador = contador-1;
                                }
                                if(carta[1] == 0){
                                    aux = cartas.indexOf(carta);
                                }
                            }
                        });

                        if(aux > -1){
                            cartas.splice(aux, 1);
                        }

                        refrescar(cartas);

                        sessionStorage.setItem('deck', JSON.stringify(cartas));

                        console.log(sessionStorage.getItem('deck'));
                    });
                });
        },
        error: function(e)
        {
            console.log('Rompio al cargar cartas del deck xd');
        }
    });
}
}

function contar(cartas, contador){
    contador = 0;

    cartas.forEach((carta)=>{
        contador = contador+carta[1];
    });

    VContador.innerHTML = `Total: ${contador}/30`;

    if(contador == 30){
        boton.disabled = false;
    }else{
        boton.disabled = true;
    }

}

function guardar(){

    let nombre = document.getElementById("nombre").value;
    let descripcion = document.getElementById("descripcion").value;

    console.log(cartasDeck);

    $.ajax({
        url: 'createDeck',
        method: "POST",
            data: {
                '_token': token,
                'cartas': cartasDeck,
                'nombre': nombre,
                'descripcion': descripcion,
        },
        dataType: "json",
        success: function (data) {
            console.log(data);
        },
        error: function(e)
        {
            console.log(e);
        }
    });
}


