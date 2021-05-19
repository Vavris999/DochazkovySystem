<?php

echo heading("Přidat pozici", 1);
$atributy = array(
    'class' => 'form-horizontal'
);
echo form_open('Cadmin/pridejPozici', $atributy);
?>

<div class="formular">
    <label for="fname">Pozice</label>
    <input type="text" id="fname" name="pozice" pattern="[ĚŠČŘŽÝÁÍÉŮÚúůěščřžýáíéa-zA-Z ]+" title="Musí obsahovat pouze písmena" placeholder="Vložte pozici" value="" required>
</div>	
<?php

$data = array(
    'name' => 'Přidat',
    'type' => 'submit',
    'content' => 'Přidat pozici',
    'class' => 'btn'
);
echo "<div class='form-group'>";

echo form_button($data);
echo "</div>";
echo form_close();

