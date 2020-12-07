<?php
//namespace modelos;
class Viaje{

    public $Id_viaje = 0; //PRIMARY KEY
    public $Fecha = '';
    public $Origen = '';
    public $Destino = '';
    public $Ida = '\0';
    public $Id_chofer = null;
    public $Confirmado = '\0';
    public $Salida = '\0';
    public $Hora_salida = '';
    public $Llegada = '\0';
    public $Hora_llegada = '';
    public $Patente = '';
    public $Id_reserva = 0;
}
?>