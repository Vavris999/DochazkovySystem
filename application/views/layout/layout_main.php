<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<title><?php echo $title ?></title>
    <link href=<?php echo base_url('assets/style.css'); ?> rel="stylesheet" type="text/css"/>
    <link href=<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?> rel="stylesheet" type="text/css"/>
    <link href=<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?> rel="stylesheet" type="text/css"/>
    <link href=<?php echo base_url('assets/bootstrap/css/bootstrap-datetimepicker.min.css'); ?> rel="stylesheet" type="text/css"/>
    <script src=<?php echo base_url('assets/jquery/jquery-3.6.0.min.js'); ?>></script>
    <script src=<?php echo base_url('assets/bootstrap/js/bootstrap.min.js');?>></script>
    <script src=<?php echo base_url('assets/bootstrap/js/bootstrap-datetimepicker.min.js');?>></script>
</head>
<body>
<ul>
  <li><a href="<?php echo base_url('/vypisZamestnancu'); ?>">Zaměstnanci</a></li>
  <li style="float:right;"><a href="<?php echo base_url('/vypisZamestnancuAdmin'); ?>">Admin</a></li>
</ul>
<article>
    <div style="margin-left:10%;margin-right:10%">
        <?php
           echo $content;
        ?>  
    </div>
</article>
</body>
</html>