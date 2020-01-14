<?php

$rdata = "1995-02-18";
$dt = explode("-", $rdata);
echo $dt[1];

echo "<select name = 'perfil'>";
echo "<option value = ''>::Selecione</option>";
foreach ($perfils as $p) {
    if ($dt[1] == 1) {
        echo "<option selected value = '1'>Janeiro</option>";
    } else {
        echo "<option  value = '2'>fev</option>";
    }
}
echo "</select>";
?>  