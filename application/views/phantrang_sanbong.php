<!DOCTYPE html>
<html lang ="">
<head>
    <title>QUẢN LÝ SÂN BÓNG ĐÁ</title>
    <meta charset = "UTF-8">
    <!-- Bootstrap CSS -->
    <link href= "<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script type= "text/javascript" language="javascript" src="<?php echo base_url();?>javascripts/tienich.js"></script>
    <script src= "<?php echo base_url();?>jquery/jquery-3.1.0.js"></script>
    <script src= "<?php echo base_url();?>jquery/js.cookie.js"></script>
    <style>
        .row{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<?php
    require_once 'header.php';
    require_once 'modal_sanbong.php';
    echo $links;
    echo $recs;
?>   
    <script src= "<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
</body>
</html>