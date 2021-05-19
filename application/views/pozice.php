<?php 
if($this->session->flashdata('pridano')){
    ?><p style="color:red"><?php echo $this->session->flashdata('pridano'); ?> </p><?php
}
if($this->session->flashdata('smazan')){
    ?><p style="color:red"><?php echo $this->session->flashdata('smazan'); ?> </p><?php
}
if($this->session->flashdata('upraven')){
    ?><p style="color:red"><?php echo $this->session->flashdata('upraven'); ?> </p><?php
}
?>
<H1>Výpis pozic</H1>

<?php

$pole = array(
    "Pozice",
    "Upravit",
    "Smazat"
);

$this->table->set_heading($pole);


foreach($pozice as $row) {
    $pole = array(
    $row->Nazev,
    anchor('/upravitPozici/' . $row->idPozice, 'Upravit pozici'),
    anchor('/smazatPozici/' . $row->idPozice, 'Smazat pozici')
    );
    $this->table->add_row($pole);
};
$template = array(
        'table_open'            => '<table class="table">',

        'thead_open'            => '<thead>',
        'thead_close'           => '</thead>',

        'heading_row_start'     => '<tr>',
        'heading_row_end'       => '</tr>',
        'heading_cell_start'    => '<th>',
        'heading_cell_end'      => '</th>',

        'tbody_open'            => '<tbody>',
        'tbody_close'           => '</tbody>',

        'row_start'             => '<tr>',
        'row_end'               => '</tr>',
        'cell_start'            => '<td>',
        'cell_end'              => '</td>',

        'row_alt_start'         => '<tr>',
        'row_alt_end'           => '</tr>',
        'cell_alt_start'        => '<td>',
        'cell_alt_end'          => '</td>',

        'table_close'           => '</table>'
);

$this->table->set_template($template);
echo $this->table->generate();