<style>

</style>
<?php

echo heading("Přidat zaměstnance", 1);
$atributy = array(
    'class' => 'form-horizontal'
);
echo form_open('Cadmin/pridejZamestnance', $atributy);
?>

<div class="formular">
    <label for="fname">Jméno</label>
    <input type="text" id="fname" name="jmeno" pattern="[ĚŠČŘŽÝÁÍÉŮÚúůěščřžýáíéa-zA-Z ]+" title="Musí obsahovat pouze písmena" placeholder="Vložte jméno" value="" required>
    
<label for="fname">Příjmení</label>
    <input type="text" id="fname" name="prijmeni" pattern="[ĚŠČŘŽÝÁÍÉŮÚúůěščřžýáíéa-zA-Z ]+" title="Musí obsahovat pouze písmena" placeholder="Vložte příjmení"value="" required>

   <label for="fname">Pozice</label>
	
<select name="idPozice" id="fname" required>
<option value=""> Vyberte pozici </option>
	<?php
		foreach($pozice as $row)
		{
			echo '<option value="'.$row->idPozice.'">'.$row->Nazev.'</option>';
		}
	?>
</select>

    </div>
	
    <?php
$data = array(
    'name' => 'Přidat',
    'type' => 'submit',
    'content' => 'Přidat zaměstnance',
    'class' => 'btn'
);
echo "<div class='form-group'>";

echo form_button($data);
echo "</div>";
echo form_close();

