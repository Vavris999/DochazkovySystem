<?php
if($this->session->flashdata('upraveno')){
    ?><p style="color:red"><?php echo $this->session->flashdata('upraveno'); ?> </p><?php
}
?>
<H1>Docházka <?php echo $dochazka[0]->jmeno." ".$dochazka[0]->prijmeni?></H1>

</select> 

<table id="myTable" class="table">
  <tr class="header">
    <th>Příchod do práce</th>
    <th>Odchod z práce</th>
    <th>Příchod k lékaři</th>
    <th>Odchod od lékaře</th>
    <th>Příchod na oběd</th>
    <th>Odchod z obědu</th>
    <th>Upravit</th>
    <th>Smazat</th>
  </tr>
    <?php
foreach($dochazka as $row){
    ?>
    <tr>
    <td style="display:none;"><?php echo $row->monthPrichod."-".$row->yearPrichod?></td>
    <td><?php echo $row->prichodDoPrace ?></td>
    <td><?php echo $row->odchodZPrace ?></td>
    <?php
    if($row->prichodKLekari=="0000-00-00 00:00:00"){
    echo "<td>Nebylo uvedeno</td>";
    }else{
    echo "<td>$row->prichodKLekari</td>";
    }
     if($row->odchodOdLekare=="0000-00-00 00:00:00"){
    echo "<td>Nebylo uvedeno</td>";
    }else{
    echo "<td>$row->odchodOdLekare</td>";
    }
     if($row->prichodNaObed=="0000-00-00 00:00:00"){
    echo "<td>Nebylo uvedeno</td>";
    }else{
    echo "<td>$row->prichodNaObed</td>";
    }
    if($row->odchodZObedu=="0000-00-00 00:00:00"){
    echo "<td>Nebylo uvedeno</td>";
    }else{
    echo "<td>$row->odchodZObedu</td>";
    }
  
    echo "<td>".anchor('/upravitDochazku/' .$row->idDochazka, 'Upravit')."</td>";
    echo "<td>".anchor('/smazatDochazku/' .$row->idDochazka, 'Smazat')."</td>";
    ?>
    
  </tr>
  <?php
}
?>
