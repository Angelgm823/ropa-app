<?php

//devuelve el id del usuario autenticado
function userId(){
    return auth()->user()->id;
}

//devuelve a formato moneda
function money($number){
    return number_format( $number,2,',','.');
}

//convertir numeros a letras

function numLetras($number){
    return App\Models\NumerosEnLetras::convertir($number,'Pesos',false,'Centavos');
}
