<?php
require_once "core/init.php";

if(isset($_POST['id']) && !empty($_POST['id'])){
$id = trim($_POST['id']);
$id = strip_tags($id);
$busyPeriods = vehiclePeriods($id);
echo "<table style='background-color:hsl(0,0%,81%);'>";
echo "<tr>";
echo "<th style='padding:1% 0%;text-align:center;border-right:1px  solid hsl(0,0%,61%);border-bottom:3px solid #0293D1'>Von:</th>";
echo "<th style='padding:1%;text-align:center;border-bottom:3px solid #0293D1'>Zu:</th>";
echo "</tr>";
foreach($busyPeriods as $period){
echo "<tr style='background-color:hsl(0,0%,89%);border-top:1px solid hsl(0,0%,71%)'>";
echo "<td style='word-wrap:none'>&nbsp;&nbsp;" . date("F d, Y", strtotime($period->date_start)) . "</td>";
echo "<td style='word-wrap:none!important'>&nbsp;&nbsp;" . date("F d, Y", strtotime($period->date_end)) . "</td>";
echo "</tr>";
}
echo "</table>";
}
