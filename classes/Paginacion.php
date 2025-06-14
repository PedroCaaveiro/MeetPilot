<?php

namespace Classes;


class Paginacion{

    public $pagina_actual;
    public $registros_X_pagina;
    public $total_registros;


public function __construct($pagina_actual = 1,$registros_X_pagina = 10,$total_registros = 0){

    $this->pagina_actual = (int) $pagina_actual;
    $this->registros_X_pagina = (int) $registros_X_pagina; 
    $this->total_registros = (int) $total_registros; 

}

}