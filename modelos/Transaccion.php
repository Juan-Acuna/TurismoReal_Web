<?php
//namespace modelos;
class Transaccion{

    public $Id_pago = ''; //PRIMARY KEY
    public $Monto = 0;
    public $Fecha = '';
    public $Listo = '0';
    public $Token = '';
    public $Comentario = '';
    public $Id_tipo = 0;
    public $Id_medio = 0;
    public $Username = '';
    public $Id_reserva = 0;
}
?>