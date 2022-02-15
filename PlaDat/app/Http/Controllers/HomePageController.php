<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{

    /*
     * Questo metodo deve chiamare una classe a livello di dominio che si deve occupare
     * di ritornare un lista di n placement che andranno mostrati successivamente.
     *
     * Ottenuti questi n elementi, andrà tornata la pagina homepage, che verrà modificata dinamicamente.
     *
     * è una POST perchè gli verranno passati dei parametri ( email + password ) per
     * il caricamento della pagina.
     *
     */
    public function loadHomePage(/* $email , $password */){

    }




}
