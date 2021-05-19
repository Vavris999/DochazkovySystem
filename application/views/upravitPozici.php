<?php
if($this->session->flashdata('upraven')){
    ?><p style="color:red"><?php echo $this->session->flashdata('upraven'); ?> </p><?php
}

$hidden = array(
    'idPozice' => $pozice[0]->idPozice,
);
echo heading("Upravit zaměstnance", 1);
$atributy = array(
    'class' => 'form-horizontal'
);
echo form_open('Cadmin/upravPozici', $atributy,$hidden);
?>

<div class="formular">
    <label for="fname">Pozice</label>
    <input type="text" id="fname" value="<?php echo $pozice[0]->Nazev ?>" name="Nazev" pattern="[ĚŠČŘŽÝÁÍÉŮÚúůěščřžýáíéa-zA-Z ]+" title="Musí obsahovat pouze písmena" value="" required>

</div>	
<?php
$data = array(
    'name' => 'Upravit',
    'type' => 'submit',
    'content' => 'Upravit pozici',
    'class' => 'btn'
);
echo "<div class='form-group'>";

echo form_button($data);
echo "</div>";
echo form_close();

