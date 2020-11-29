<?php
namespace modelos;
class Transaccion{

    public $Id_pago; //PRIMARY KEY
    public $Monto;
    public $Fecha;
    public $Listo;
    public $Token;
    public $Comentario;
    public $Id_tipo;
    public $Id_medio;
    public $Username;
    public $Id_reserva;
}
?>