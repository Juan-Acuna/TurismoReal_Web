<?php
namespace modelos;
class Reserva{

    public $Id_reserva; //PRIMARY KEY
    public $Valor_total;
    public $Valor_pagado;
    public $Fecha;
    public $Inicio_estadia;
    public $Fin_estadia;
    public $Checkin;
    public $Confirmado;
    public $Checkout;
    public $Desc_checkin;
    public $Desc_checkout;
    public $Multa_total;
    public $Multa_pagado;
    public $Pagos;
    public $N_pago;
    public $Username;
    public $Id_depto;
    public $Id_estado;
}
?>