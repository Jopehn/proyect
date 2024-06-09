const api="../src/data.json";
const respuesta=document.getElementById("respuesta");
const resultado=document.getElementById("resultado");
const btn_carga=document.getElementById("btn_carga");

onload=()=>{
    carga_lista();
}

btn_carga.onclick=()=>{
    respuesta.innerHTML='';
    carga_lista();
}

function carga_lista() {
    fetch(api)
    .then(res=>res.json())
    .then(el=>{
        crear_lista(el);
        console.log(el);
    })
    .catch(err=>{
        console.log(err.message);
    });
}

function crear_lista(data) {
    let lista=`<table class="table table-striped">
    <thead>
    <tr>
    <th scope="col">Codigo</th>
    <th scope="col">Descripción</th>
    </thead>
    <tbody>`;
    data.forEach((element, i) => {
        // console.log(data[i]);
        lista+=`<tr onclick="datos_enviados(${i})">
        <td>${element.codigo}</td>
        <td>${element.descripcion}</td>
        </tr>`;
        // console.log(element);
    });
    lista+=`</tbody>
    </table>`;
    resultado.innerHTML=lista;
}

function datos_enviados(ind) {
    fetch(api)
    .then(res=>res.json())
    .then(el=>{
        ficha_dato(el[ind]);
        console.log(el[ind]);
    }).catch(err=>{
        console.log(err.message);
    });
    resultado.innerHTML='';
}

function ficha_dato(dato) {
    let d=`<div class="card">
    <div class="card-header">${dato.descripcion}</div>
    <div class="card-body">
    <h5 class="card-title">Codigo ${dato.codigo}</h5>
    <h6 class="card-subtitle mb-2 text-muted">Peso por kg: ${dato.peso_kg}</h6>
    <p class="card-text">Kg: ${dato.peso}</p>
    <p>$: ${dato.precio}</p>
    </div>
    </div>`;
    respuesta.innerHTML=d;
}