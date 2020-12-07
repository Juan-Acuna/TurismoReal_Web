<?php
//namespace modelos;
class Reserva{

    public $Id_reserva = 0; //PRIMARY KEY
    public $Valor_total = 0;
    public $Valor_pagado = 0;
    public $Inicio_estadia = '';
    public $Fin_estadia = '';
    public $Checkin = '0';
    public $Confirmado = '0';
    public $Checkout = '0';
    public $Desc_checkin = '';
    public $Desc_checkout = '';
    public $Multa_total = 0;
    public $Multa_pagado = 0;
    public $Pagos = 0;
    public $N_pago = 0;
    public $Username = '';
    public $Id_depto = 0;
    public $Id_estado = 0;
}
?>