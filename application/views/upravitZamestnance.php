<?php
if($this->session->flashdata('upraven')){
    ?><p style="color:red"><?php echo $this->session->flashdata('upraven'); ?> </p><?php
}

$hidden = array(
    'idOsoba' => $zamestnanec[0]->idOsoba,
);
echo heading("Upravit zaměstnance", 1);
$atributy = array(
    'class' => 'form-horizontal'
);
echo form_open('Cadmin/upravZamestnance', $atributy,$hidden);
?>

<div class="formular">
    <label for="fname">Jméno</label>
    <input type="text" id="fname" value="<?php echo $zamestnanec[0]->jmeno ?>" name="jmeno" pattern="[ĚŠČŘŽÝÁÍÉŮÚúůěščřžýáíéa-zA-Z ]+" title="Musí obsahovat pouze písmena" value="" required>
    
<label for="fname">Příjmení</label>
    <input type="text" id="fname" value="<?php echo $zamestnanec[0]->prijmeni ?>" name="prijmeni" pattern="[ĚŠČŘŽÝÁÍÉŮÚúůěščřžýáíéa-zA-Z ]+" title="Musí obsahovat pouze písmena" value="" required>

   <label for="fname">Pozice</label>
	
<select name="idPozice" id="fname" required>
<option value="<?php echo $zamestnanec[0]->idPozice ?>"><?php echo $zamestnanec[0]->Nazev ?></option>
	<?php
		foreach($pozice as $row)
		{   
            if($zamestnanec[0]->idPozice != $row->idPozice){
			echo '<option value="'.$row->idPozice.'">'.$row->Nazev.'</option>';
            }
		}
	?>
</select>

    </div>


		
    <?php


$data = array(
    'name' => 'Upravit',
    'type' => 'submit',
    'content' => 'Upravit zaměstnance',
    'class' => 'btn'
);
echo "<div class='form-group'>";

echo form_button($data);
echo "</div>";
echo form_close();

