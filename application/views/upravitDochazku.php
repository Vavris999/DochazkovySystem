<style>
input {
  border: 1px solid black;
}
.formular {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  width:100%;
}
</style>
  
<?php

echo heading("Upravit docházku", 1);
$atributy = array(
    'class' => 'form-horizontal'
);
$hidden = array(
    'idDochazka' => $dochazka[0]->idDochazka,
    'idOsoba' => $dochazka[0]->idOsoba
);
echo form_open('Cdochazka/upravDochazku', $atributy,$hidden);
?>
   
              
<div style="width:45%;float:left;margin-right:10%;">
<label style="text-align:left;"for="fname">Příchod do práce</label>
<input name="prichodDoPrace" id="datetime"  value="<?php echo $dochazka[0]->prichodDoPrace ?>" required>
</div>  

<div style="width:45%;float:left">
<label style="text-align:left;"for="fname">Odchod z práce</label>
<input name="odchodZPrace" id="datetime2"  value="<?php echo $dochazka[0]->odchodZPrace ?>" required>
</div>


<div style="width:45%;float:left;margin-right:10%;">
<label style="text-align:left;"for="fname">Příchod k lékaří</label>
<input name="prichodKLekari" id="datetime3" readonly value="<?php echo $dochazka[0]->prichodKLekari ?>">
</div>  

<div style="width:45%;float:left">
<label style="text-align:left;"for="fname">Odchod od lékaře</label>
<input name="odchodOdLekare" id="datetime4" readonly value="<?php echo $dochazka[0]->odchodOdLekare ?>">
</div>


<div style="width:45%;float:left;margin-right:10%;">
<label style="text-align:left;"for="fname">Příchod na oběd</label>
<input name="prichodNaObed" id="datetime5" readonly value="<?php echo $dochazka[0]->prichodNaObed ?>">
</div>  

<div style="width:45%;float:left">
<label style="text-align:left;"for="fname">Odchod z obědu</label>
<input name="odchodZObedu" id="datetime6" readonly value="<?php echo $dochazka[0]->odchodZObedu ?>">
</div>
  	
<?php
$data = array(
    'name' => 'Upravit',
    'type' => 'submit',
    'content' => 'Upravit docházku',
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