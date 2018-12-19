<?php
require_once "core/init.php";
if(isset($_POST['id']) && !empty($_POST['id'])){
$id = trim($_POST['id']);
$id = strip_tags($id);
$busyPeriods = vehiclePeriods($id);
static $num = 0;
echo "<br><table style='background-color:hsl(0,0%,81%);'>";
echo "<tr>";
echo "<th style='padding:3% 0%;text-align:center;border-right:1px  solid hsl(0,0%,61%);border-bottom:3px solid #0293D1'>Num</th>";
echo "<th style='padding:3% 0%;text-align:center;border-right:1px  solid hsl(0,0%,61%);border-bottom:3px solid #0293D1'>Klient</th>";
echo "<th style='padding:3% 0%;text-align:center;border-right:1px  solid hsl(0,0%,61%);border-bottom:3px solid #0293D1'>E-mail</th>";
echo "<th style='padding:3% 0%;text-align:center;border-right:1px  solid hsl(0,0%,61%);border-bottom:3px solid #0293D1'>Telefon</th>";
echo "<th style='padding:3% 0%;text-align:center;border-right:1px  solid hsl(0,0%,61%);border-bottom:3px solid #0293D1'>Fahrzeug</th>";
echo "<th style='padding:3% 0%;text-align:center;border-right:1px  solid hsl(0,0%,61%);border-bottom:3px solid #0293D1'>Anfangsdatum</th>";
echo "<th style='padding:3%;text-align:center;border-right:1px solid hsl(0,0%,61%);border-bottom:3px solid #0293D1'>Endtermin</th>";
echo "<th style='padding:3% 0%;text-align:center;border-right:1px solid hsl(0,0%,61%);border-bottom:3px solid #0293D1'>aktualisieren</th>";
echo "<th style='padding:3% 0%;text-align:center;border-right:1px  solid hsl(0,0%,61%);border-bottom:3px solid #0293D1'>löschen</th>";
echo "</tr>";
foreach($busyPeriods as $period){
$num ++;
echo "<tr style='background-color:hsl(0,0%,89%);border-top:1px solid hsl(0,0%,71%)'>";
echo "<td style='padding:1%;border-right:1px solid hsl(0,0%,71%);word-wrap:break-word;width:215px;'>&nbsp;&nbsp;" . $num . "</td>";
echo "<td style='padding:1%;border-right:1px solid hsl(0,0%,71%);word-wrap:break-word;width:215px;'>&nbsp;&nbsp;" . $period->first_name . " " . $period->last_name . "</td>";
echo "<td style='padding:1%;border-right:1px solid hsl(0,0%,71%);word-wrap:break-word;width:215px;'>&nbsp;&nbsp;" . $period->email . "</td>";
echo "<td style='padding:1%;border-right:1px solid hsl(0,0%,71%);word-wrap:break-word;width:215px;'>&nbsp;&nbsp;" . $period->phone . "</td>";
echo "<td style='padding:1%;border-right:1px solid hsl(0,0%,71%);word-wrap:break-word;width:215px;'>&nbsp;&nbsp;" . $period->vehicle . "</td>";
echo "<td style='padding:1%;border-right:1px solid hsl(0,0%,71%);word-wrap:break-word;width:215px;'>&nbsp;&nbsp;" . date("d.m.Y", strtotime($period->date_start)) . "</td>";
echo "<td style='padding:1%;border-right:1px solid hsl(0,0% 71%);word-wrap:break-word;width:215px;'>&nbsp;&nbsp;" . date("d.m.Y", strtotime($period->date_end)) . "</td>";
echo "<td style='padding:1%;border-right:1px solid hsl(0,0%,71%);word-wrap:break-word;width:215px;'>&nbsp;&nbsp;<a href=\"updateReservation.php?id=$period->reservation_id\">Aktualisieren</a> </td>";
echo "<td style='padding:1%;border-right:1px solid hsl(0,0%,71%);word-wrap:break-word;width:215px;'>&nbsp;&nbsp;<a href=\"deleteReservation.php?id=$period->reservation_id\" onclick=\"return confirm(question);\">Döschen</a> </td>";
echo "</tr>";
}
echo "</table>";
}