<?php 
if($this->session->flashdata('pridano')){
    ?><p style="color:red"><?php echo $this->session->flashdata('pridano'); ?> </p><?php
}
if($this->session->flashdata('smazan')){
    ?><p style="color:red"><?php echo $this->session->flashdata('smazan'); ?> </p><?php
}
?>
<H1>Výpis zaměstnanců</H1>

<?php


$pole = array(
    "Jméno",
    "Příjmení",
    "Pozice",
    "Zobrazit docházku",
    "Přidat docházku",
);

$this->table->set_heading($pole);


foreach($udajeZamestnanec as $row) {
    $pole = array(
    $row->jmeno,
    $row->prijmeni,
    $row->Nazev,
    anchor('/zobrazitDochazku/' . $row->idOsoba, 'Zobrazit docházku'),
    anchor('/pridatDochazku/' . $row->idOsoba, 'Přidat docházku'),
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