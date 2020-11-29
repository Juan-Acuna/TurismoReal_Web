<?php
namespace modelos;
class Multa{

    public $Id_multa; //PRIMARY KEY
    public $Valor;
    public $Descripcion;
    public $Pagado;
    public $Id_tipo;
    public $Id_reserva;
}
?>