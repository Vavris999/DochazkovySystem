
<style>
input {
  border: 1px solid black;
}
</style>
  
<?php

echo heading("Přidat docházku ".$zamestnanec[0]->jmeno." ".$zamestnanec[0]->prijmeni, 1);
$atributy = array(
    'class' => 'form-horizontal'
);
$hidden = array(
    'idOsoba' => $zamestnanec[0]->idOsoba,
);
echo form_open('Cdochazka/pridejDochazku', $atributy,$hidden);
?>

              
<div style="width:45%;float:left;margin-right:10%;">
<label style="text-align:left;"for="fname">Příchod do práce</label>
<input name="prichodDoPrace" id="datetime"  placeholder="Vyberte čas" required>
</div>  

<div style="width:45%;float:left">
<label style="text-align:left;"for="fname">Odchod z práce</label>
<input name="odchodZPrace" id="datetime2"  placeholder="Vyberte čas" required>
</div>


<div style="width:45%;float:left;margin-right:10%;">
<label style="text-align:left;"for="fname">Příchod k lékaří</label>
<input name="prichodKLekari" id="datetime3" readonly placeholder="Vyberte čas">
</div>  

<div style="width:45%;float:left">
<label style="text-align:left;"for="fname">Odchod od lékaře</label>
<input name="odchodOdLekare" id="datetime4" readonly placeholder="Vyberte čas">
</div>


<div style="width:45%;float:left;margin-right:10%;">
<label style="text-align:left;"for="fname">Příchod na oběd</label>
<input name="prichodNaObed" id="datetime5" readonly placeholder="Vyberte čas">
</div>  

<div style="width:45%;float:left">
<label style="text-align:left;"for="fname">Odchod z obědu</label>
<input name="odchodZObedu" id="datetime6" readonly placeholder="Vyberte čas">
</div>
  	
<?php
$data = array(
    'name' => 'Přidat',
    'type' => 'submit',
    'content' => 'Přidat docházku',
    'class' => 'btn'
);
echo "<div class='form-group'>";

echo form_button($data);
echo "</div>";
echo form_close();

?>

<script>
$("#datetime").datetimepicker();
$("#datetime2").datetimepicker();
$("#datetime3").datetimepicker();
$("#datetime4").datetimepicker();
$("#datetime5").datetimepicker();
$("#datetime6").datetimepicker();
</script>