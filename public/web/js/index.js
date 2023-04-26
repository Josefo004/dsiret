import {
    ingresar,
    direccionar
 } from './script.js';

if (document.getElementById("entrar") !== null) {
    document.querySelector('#entrar').addEventListener('click', ingresar);
}


window.addEventListener('load', direccionar);

