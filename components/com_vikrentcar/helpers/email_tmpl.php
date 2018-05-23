<?php
/**
 * Copyright (c) Extensionsforjoomla.com - E4J - Alessio <tech@extensionsforjoomla.com>
 *
 * You should have received a copy of the License
 * along with this program.  If not, see <http://www.extensionsforjoomla.com/>.
 *
 * For any bug, error please contact <tech@extensionsforjoomla.com>
 * We will try to fix it.
 *
 * Extensionsforjoomla.com - All Rights Reserved
 *
 */

defined('_JEXEC') OR die('Restricted Area');

defined('_VIKRENTCAREXEC') OR die('Restricted Area');

?>

<style type="text/css">
<!--
.clearfix:after {
	content: ".";
	display: block;
	clear: both;
	visibility: hidden;
	line-height: 0;
	height: 0;
}

.clearfix {
	display: inline-block;
}
.clearfix  {
	display /*\**/: block\9;
}
.container {
	width:70%;
	font-family: "Century Gothic", Tahoma, Arial;
}
.statusorder {
	width:100%;
	float:none;
	clear:both;
}
.boxstatusorder {
	background:#d9f1ff;
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border:1px solid #c4dbdd;
	padding:10px;
	float:left;
	margin:0 5px 10px 0;
	height:25px;
	line-height:25px;
}
.boxstatusorder p {
	margin:0;
	padding:0;
}
.boxstatusorder:last-child {
	margin:0 0 10px 0;
}
.persdetail {
	width:95.8%;
	clear:both;
	float:none;
	padding:10px;
	border:1px solid #eee;
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	line-height:1.6em;
}
.persdetail h3 {
	margin:0 0 10px 0;
	padding:0;
}
.hiremainbox {
	background:#fbfbfb;
	border:1px solid #eee;
	-moz-border:1px solid #eee;
	-webkit-border:1px solid #eee;
	border-radius:4px;
	padding:10px;
	width:95.8%;
	margin:10px 0 0 0;
}
.hirecar {
	float:none;
	clear:both;
}
.hirecar .hiredate {
	float:left;
	border:1px solid #C9E9FC;
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	padding:10px;
	margin:0 10px 0 0;
	background:#f6f6f6;
}
.hirecar .hiredate:last-child {
	margin:0;
}
.hirecar .hiredate p {
	padding:0;
	margin:0px 0 5px;
}
.hirecar .hiredate p span {
	display:block;
}
.hireordata {
	margin:0 0 5px 0;
}
.hireordata div {
	float:right;
}
.hiretotal {
	margin:10px 0 0 0;
	color:#144D5C;
	border-top:1px solid #ddd;
	padding:10px 0 0 0;
}
.smalltext {
	font-size:12px;
}
.Stile1 {
	font-size: 18px;
	font-weight: bold;
}
.Stile2 {
	font-size: 18px;
}
.Stile7 {color: #009900;}
.confirmed {color: #009900;}
.standby {color: #ff0000;}
.Stile9 {font-size: 14px; }
.Stile10 {font-size: 14px;font-weight: bold;}
.Stile12 {font-size: 14px;font-weight: bold; }
.Stile16 {font-size: 16px;}
-->
</style>
<p>{logo}</p>

<div class="container">
<p class="Stile1">{company_name}</p>
	<div class="statusorder">
    	<div class="boxstatusorder"><span class="Stile1"><?php echo JText::_('VRCORDERNUMBER'); ?>: {order_id}</span></div>
    	{confirmnumb_delimiter}<div class="boxstatusorder"><span class="Stile1"><?php echo JText::_('VRCCONFIRMATIONNUMBER'); ?>: {confirmnumb}</span></div>{/confirmnumb_delimiter}
        <div class="boxstatusorder"><span class="Stile1"><?php echo JText :: _('VRLIBSEVEN'); ?>: <span class="{order_status_class}">{order_status}</span></span></div>
        <div class="boxstatusorder"><strong><?php echo JText::_('VRLIBEIGHT'); ?>:</strong>{order_date}</div>
    </div>
    <div class="persdetail">
    	<h3 class="Stile1"><?php echo JText::_('VRLIBNINE'); ?>:</h3>
        {customer_info}
    </div>
    <div class="hiremainbox">
        <div class="hirecar clearfix">
            <p><span class="Stile1"><?php echo JText::_('VRLIBTEN'); ?>: {item_name}</span></p>
            <div class="hiredate">
                <p><span class="Stile12"><?php echo JText::_('VRLIBELEVEN'); ?>:</span>
                <span class="Stile9">{pickup_date}</span></p>
                <p><span class="Stile12"><?php echo JText::_('VRRITIROCAR'); ?>: </span>
                <span class="Stile9">{pickup_location}</span></p>
            </div>
            <div class="hiredate">
                <p><span class="Stile12"><?php echo JText::_('VRLIBTWELVE'); ?>: </span>
                <span class="Stile9">{dropoff_date}</span></p>
                <p><span class="Stile12"><?php echo JText::_('VRRETURNCARORD'); ?>:</span>
                <span class="Stile9">{dropoff_location}</span></p>
            </div>
        </div>
        <div class="hireorderdetail">
        	<p><span class="Stile1"><?php echo JText::_('VRCORDERDETAILS'); ?>:</span></p>
            {order_details}
            <div class="hireordata hiretotal"><span class="Stile10"><?php echo JText :: _('VRLIBSIX'); ?></span><div align="right"><strong>{order_total}</strong></div></div>
            {texto-confirmacion}
<p>Hemos recibido su formulario correctamente. Recuerde que esto no es la reserva, en breve nos pondremos en contacto con usted para la CONFIRMACION o ANULACION de la reserva mediante email o telefono. Las reservas realizadas con tarjeta de crédito será devuelto en caso de NO haber disponibilidad en un plazo máximo de 48horas. Si usted no recibiera ningun mail posiblemente esté en la bandeja de correo no deseado</p>
						<p>NOTA: El conductor ha de tener más de 12 meses de antigüedad de carnet y ser mayor de 25 años. Si el conductor tiene entre 21 y 25 años se podrá alquilar pero tendrá un recargo adicional por ser conductor jóven.</p>
						<p>Al recoger el vehículo en la oficina deberá presentar: DNI o Pasaporte, Carnet de Conducir y Tarjeta de Crédito o Débito (dependiendo de la opción que haya solicitado)</p>
            <p>
Politica de Cancelación:<br>

El vehículo alquilado se podrá cancelar en cualquier momento procediendo a la devolución del importe cobrado hasta 2 horas antes de la hora y el dia de recogida del vehículo alquilado. Una vez transcurrido ese tiempo de 2 horas antes de la hora y dia de recogida si se quiere cancelar el vehículo tendrá un coste de 50 € más IVA.

Una vez recogido el vehículo el usuario podrá ampliar la duración del alquiler, pero nunca recortar. En caso de que el usuario decida devolver el vehículo antes de la fecha establecida, se seguirá considerando el alquiler por el periodo inicialmente contratado</p>
        </div>
        <br/>
        <p><br/>
		<span class="smalltext">
		<strong><?php echo JText :: _('VRLIBTENTHREE'); ?>:</strong><br/>
		{order_link}
		</span><br/>
		</p>
		<span class="smalltext">{footer_emailtext}</span>
    </div>
</div>
