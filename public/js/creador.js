const cartasBiblio = document.querySelectorAll('.carta-a');
const VDeck = document.getElementById('verDeck');
console.log(cartasBiblio);
let VCartas;

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
                    refrescar(cartasDeck);
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

function refrescar(cartas){

    VDeck.innerHTML = '';

    cartas.forEach((carta) => {
        let Vcarta = document.createElement("div");
        Vcarta.innerHTML = `
        <div id="${carta[0]}" class="carta-en-mazo d-flex justify-content-between my-2 px-2">
        <p>${carta[0]} x${carta[1]}</p>
        <div class="d-flex">
            <img class="img-logo-carta-en-mazo" src="./img/logo-rojo.png" alt="...">
        </div>
        </div>`;
      VDeck.appendChild(Vcarta);
    });

    VCartas = document.querySelectorAll('.carta-en-mazo');

    let aux=-1;

    VCartas.forEach((vcarta) => {
        vcarta.addEventListener("click", (event) => {

            cartas.forEach((carta) => {
                if(carta[0].includes(vcarta.id)){
                    if(carta[1] > 0){
                        carta[1] = carta[1]-1;
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
}

function guardar(){

    console.log('entro');
    fetch("http://127.0.0.1:8000/createDeck", {
        headers: {
          "Content-Type": "application/json",
          "Accept": "application/json",
          "X-Requested-With": "XMLHttpRequest",
          "X-CSRF-Token": token
        },
        method: "post",
        credentials: "same-origin",
        body: JSON.stringify({
          'cartas': cartasDeck
        })
      }).then(function(response){
        res = response.json();
        console.log(res);
    })
}


