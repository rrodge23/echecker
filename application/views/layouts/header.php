
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <base href="<?=base_url();?>">
    <?php
        
        if($currentPath == '' || $currentPath == 'home'){

            echo "
                 <link href='vendor/bootstrap/css/bootstrap.min.css' rel='stylesheet'>
                 <link href='assets/css/agency.min.css' rel='stylesheet'>
                 ";
        }else{

            echo '
                  <link href= "assets/css/bootstrap.css" rel="stylesheet" type="text/css"/> 
                  <link href= "assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/> 
                  <link href= "assets/css/ripples.min.css" rel="stylesheet" type="text/css"/> 
                  <link href= "assets/css/waves.min.css" rel="stylesheet" type="text/css"/> 
                  <link href= "assets/css/animate.min.css" rel="stylesheet" type="text/css"/> 
                  <link href= "assets/css/morris.css" rel="stylesheet" type="text/css"/> 
                  <link href= "assets/css/style.css" rel="stylesheet" type="text/css"/> 
                  <link href= "assets/css/all-themes.min.css" rel="stylesheet" type="text/css"/> 
                  <link href= "assets/css/material-icons.css" rel="stylesheet" type="text/css"/>
                  <link href= "assets/css/fa.css" rel="stylesheet" type="text/css"/>
                  <link href= "assets/css/datepicker.css" rel="stylesheet" type="text/css"/>
                  <link href= "assets/css/dataTables-bootstrap4.css" rel="stylesheet" type="text/css"/>
                  <link href= "assets/css/semantic-ui.css" rel="stylesheet" type="text/css"/>
                  <link href= "assets/css/jquery-dropdown.css" rel="stylesheet" type="text/css"/>
                  <link href= "assets/css/sweetalert.css" rel="stylesheet" type="text/css"/>
                  <link href= "assets/css/fileinput.min.css" rel="stylesheet" type="text/css"/> 
                  <link href= "assets/css/fileinput-rtl.min.css" rel="stylesheet" type="text/css"/> 
                  ';

        }
        
    ?>

        <link href= "assets/css/default.css" rel="stylesheet" type="text/css"/>
        <link href= "assets/css/fonts.css" rel="stylesheet" type="text/css"/> 
 
    <title>Document</title>
</head>
<body class="theme-blue" id="page-top">


