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

body {
	font-size: 12px;
}
p {
	font-size: 12px;
}
h3 {
	font-size: 16px;
	font-weight: bold;
}
h4 {
	font-size: 14px;
	font-weight: bold;
}
span.confirmed {
	color: #009900;
}
span.standby {
	color: #ff0000;
}

-->
</style>

<body>

<table>
	<tr>
		<td>{logo}</td><td><h3>Contrato de Alquiler</h3></td>
	</tr>
</table>

    <table>
        <tr>
            <td><p>Carflet Rent a Car S.L<br>C/Canarias 40 Local 2<br>28045 MADRID<br>SPAIN<br>Tel. (34) 609 36 53 24<br><br>N.I.F: B-87129219<br>RM Madrid, T-2552, Sec 8°, F68, Hoja M-44527</p></td>
            <td align="right"><p>{customer_info}</p></td>
        </tr>
    </table>
    <br>
<table>
	<tr>
		<td align="center"><strong>Número de Reserva</strong></td>
		<td align="center"><strong><?php echo JText::_('VRCCONFIRMATIONNUMBER'); ?></strong></td>
		<td align="center"><strong><?php echo JText :: _('VRLIBSEVEN'); ?></strong></td>
		<td align="center"><strong><?php echo JText::_('VRLIBEIGHT'); ?></strong></td>
        <td align="center"><strong>Forma de pago</strong></td>
	</tr>
	<tr>
		<td align="center">{order_id}</td>
		<td align="center">{confirmnumb}</td>
		<td align="center"><span style="color: {order_status_class};">{order_status}</span></td>
		<td align="center">{order_date}</td>
        <td align="center">Tarjeta Crédito</td>
	</tr>
</table>

<p><strong><?php echo JText::_('VRLIBTEN'); ?>:</strong> {item_name}</p>

<table>
	<tr>
		<td align="center"><strong><?php echo JText::_('VRLIBELEVEN'); ?></strong></td>
		<td align="center"><strong><?php echo JText::_('VRRITIROCAR'); ?></strong></td>
		<td> </td>
		<td align="center"><strong><?php echo JText::_('VRLIBTWELVE'); ?></strong></td>
		<td align="center"><strong><?php echo JText::_('VRRETURNCARORD'); ?></strong></td>
	</tr>
	<tr>
		<td align="center">{pickup_date}</td>
		<td align="center">{pickup_location}</td>
		<td> </td>
		<td align="center">{dropoff_date}</td>
		<td align="center">{dropoff_location}</td>
	</tr>
</table>

<p> <br/><br/></p>

<h4><?php echo JText::_('VRCORDERDETAILS'); ?>:</h4>
<br/>
<table width="100%" align="left" style="border: 1px solid #DDDDDD;">
<tr><td bgcolor="#C9E9FC" width="30%" style="border: 1px solid #DDDDDD;"></td><td bgcolor="#C9E9FC" width="10%" align="center" style="border: 1px solid #DDDDDD;"><?php echo JText::_('VRCPDFDAYS'); ?></td><td bgcolor="#C9E9FC" width="20%" style="border: 1px solid #DDDDDD;"><?php echo JText::_('VRCPDFNETPRICE'); ?></td><td bgcolor="#C9E9FC" width="20%" style="border: 1px solid #DDDDDD;"><?php echo JText::_('VRCPDFTAX'); ?></td><td bgcolor="#C9E9FC" width="20%" style="border: 1px solid #DDDDDD;"><?php echo JText::_('VRCPDFTOTALPRICE'); ?></td></tr>
{order_details}
{order_total}
</table>

<p> <br/><br/></p>

<p>
	<br/>
	<small>
		<strong>{customfield 2} {customfield 3}, <?php echo JText :: _('VRLIBTENTHREE'); ?>:</strong>
		<br/>
		{order_link}
	</small>
	<br/>
</p>
<small>{footer_emailtext}</small>

<?php
//BEGIN: Contract/Agreement Sample Code
?>
{vrc_add_pdf_page}
<?php
//with the line above we add a new page to the PDF
?>
<h3><?php echo JText::_('VRCAGREEMENTTITLE'); ?></h3>
<?php echo JText::sprintf('VRCAGREEMENTSAMPLETEXT', '{customfield 2}', '{customfield 3}', '{company_name}', '{order_date}', '{dropoff_date}'); ?>
<?php
//the line above will print the following sample text:
//"This agreement between %s %s and %s was made on the %s and is valid until the %s."
//The wildcards "%s" will be replaced with all the parameters of the function sprintf so in the example above, the text will become:
//"This agreement between {customfield 2} {customfield 3} and {company_name} was made on the {order_date} and is valid until the {dropoff_date}."
//The system will replace the values in {} with the real values
?>
<p> <br/><br/></p>
<?php echo JText::_('VRCAGREEMENTSAMPLETEXTMORE'); ?>
<?php
//END: Contract/Agreement Sample Code
?>

</body>
