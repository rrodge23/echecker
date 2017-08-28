 
    <script src= "assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
    <?php
        if($currentPath == '' || $currentPath == 'home'){
            echo '
                 <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/popper/popper.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

                <!-- Plugin JavaScript -->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Contact form JavaScript -->
                <script src="js/jqBootstrapValidation.js"></script>
                <script src="js/contact_me.js"></script>

                <!-- Custom scripts for this template -->
                <script src="js/agency.min.js"></script>
            ';
        }else{
            echo '
            <script src= "assets/js/bootstrap.min.js" type="text/javascript"></script>
            <script src= "assets/js/highchart.js" type="text/javascript"></script>
            <script src= "assets/js/highChartTable.js" type="text/javascript"></script>
            <script src= "assets/js/jquery.slimscroll.js" type="text/javascript"></script>
            <script src= "assets/js/waves.js" type="text/javascript"></script>
            <script src= "assets/js/jquery.countTo.js" type="text/javascript"></script>
            <script src= "assets/js/raphael.min.js" type="text/javascript"></script>
            <script src= "assets/js/morris.js" type="text/javascript"></script>
            <script src= "assets/js/Chart.bundle.js" type="text/javascript"></script>
            <script src= "assets/js/jquery.flot.js" type="text/javascript"></script>
            <script src= "assets/js/jquery.flot.resize.js" type="text/javascript"></script>
            <script src= "assets/js/jquery.flot.pie.js" type="text/javascript"></script>
            <script src= "assets/js/jquery.flot.categories.js" type="text/javascript"></script>
            <script src= "assets/js/jquery.flot.time.js" type="text/javascript"></script>
            <script src= "assets/js/jquery.sparkline.js" type="text/javascript"></script>
            <script src= "assets/js/admin.js" type="text/javascript"></script>
            <script src= "assets/js/demo.js" type="text/javascript"></script>
            <script src= "assets/js/dataTables.js" type="text/javascript"></script>
            <script src= "assets/js/dataTables-bootstrap4.js" type="text/javascript"></script>
            <script src= "assets/js/material-dashboard.js" type="text/javascript"></script>
            <script src= "assets/js/material.min.js" type="text/javascript"></script>
            <script src= "assets/js/ripples.min.js" type="text/javascript"></script>
            <script src= "assets/js/moment.js" type="text/javascript"></script>
            <script src= "assets/js/datepicker.js" type="text/javascript"></script>
            <script src= "assets/js/canvas.js" type="text/javascript"></script>
            <script src= "assets/js/jquery-dropdown.js" type="text/javascript"></script>
            <script src= "assets/js/sweetalert.js" type="text/javascript"></script>
            <script src= "assets/js/sweetalert.min.js" type="text/javascript"></script>
            <script src= "assets/js/bs.js" type="text/javascript"></script>';
        }
    ?>
    

    
    


    
</body>
</html>
    