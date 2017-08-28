
<!DOCTYPE html>
<html lang="en">
<head>

    

    <?php
        if($currentPath == '' || $currentPath == 'home'){

            echo "
                 <link href='vendor/bootstrap/css/bootstrap.min.css' rel='stylesheet'>
                 <link href='css/agency.min.css' rel='stylesheet'>";
        }else{

            echo '
                  <link href= "assets/css/bootstrap.css" rel="stylesheet" type="text/css"/> 
                  <link href= "assets/css/material.css" rel="stylesheet" type="text/css"/> 
                  <link href= "assets/css/ripples.min.css" rel="stylesheet" type="text/css"/> 
                  <link href= "assets/css/waves.min.css" rel="stylesheet" type="text/css"/> 
                  <link href= "assets/css/animate.min.css" rel="stylesheet" type="text/css"/> 
                  <link href= "assets/css/morris.css" rel="stylesheet" type="text/css"/> 
                  <link href= "assets/css/style.css" rel="stylesheet" type="text/css"/> 
                  <link href= "assets/css/all-themes.min.css" rel="stylesheet" type="text/css"/> 
                  <link href= "assets/css/material-icons.css" rel="stylesheet" type="text/css"/>
                  <link href= "assets/css/fa.css" rel="stylesheet" type="text/css"/>
                  <link href= "assets/css/dataTables.css" rel="stylesheet" type="text/css"/>
                  <link href= "assets/css/datepicker.css" rel="stylesheet" type="text/css"/>
                  <link href= "assets/css/dataTables-bootstrap4.css" rel="stylesheet" type="text/css"/>
                  <link href= "assets/css/semantic-ui.css" rel="stylesheet" type="text/css"/>
                  <link href= "assets/css/jquery-dropdown.css" rel="stylesheet" type="text/css"/>
                  <link href= "assets/css/sweetalert.css" rel="stylesheet" type="text/css"/>
                  <link href= "assets/css/default.css" rel="stylesheet" type="text/css"/>';

        }
        
    ?>

        <link href= "assets/css/fonts.css" rel="stylesheet" type="text/css"/> 
 
    <title>Document</title>
</head>
<body class="theme-blue" id="page-top">
<?php
    
    if($currentPath != 'login'){
        
        if($currentPath != 'home'){
            
            if($currentPath != ''){
                echo '
                    <!-- Page Loader -->
                    <div class="page-loader-wrapper">
                        <div class="loader">
                            <div class="preloader">
                                <div class="spinner-layer pl-red">
                                    <div class="circle-clipper left">
                                        <div class="circle"></div>
                                    </div>
                                    <div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                </div>
                            </div>
                            <p>Please wait...</p>
                        </div>
                    </div>
                    <!-- #END# Page Loader -->
                    <!-- Overlay For Sidebars -->
                    <div class="overlay"></div>
                    <!-- #END# Overlay For Sidebars -->
                    <!-- Search Bar -->
                    <div class="search-bar">
                        <div class="search-icon">
                            <i class="material-icons">search</i>
                        </div>
                        <input type="text" placeholder="START TYPING...">
                        <div class="close-search">
                            <i class="material-icons">close</i>
                        </div>
                    </div>
                    <!-- #END# Search Bar -->
                    <!-- Top Bar -->
                    <nav class="navbar">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                                <a href="javascript:void(0);" class="bars"></a>
                                <a class="navbar-brand" href="index.html"><b>E-Checker</b></a>
                            </div>
                            <div class="collapse navbar-collapse" id="navbar-collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <!-- Call Search -->
                                    <li><a href="javascript:void(0);" class="js-search dashboard-nav-right" data-close="true"><i class="material-icons">search</i></a></li>
                                    <!-- #END# Call Search -->
                                
                                    <!-- Tasks -->
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                            <i class="material-icons">flag</i>
                                            <span class="label-count">9</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="header">TASKS</li>
                                            <li class="body">
                                                <ul class="menu tasks">
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <h4>
                                                                Answer GitHub questions
                                                                <small>92%</small>
                                                            </h4>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="footer">
                                                <a href="javascript:void(0);">View All Tasks</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- #END# Tasks -->
                                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- #Top Bar -->
                    <section>
                        <!-- Left Sidebar -->
                        <aside id="leftsidebar" class="sidebar">
                            <!-- User Info -->
                            <div class="user-info" style="background-color:red;">
                                <div class="image">
                                    <img src="assets/images/mainpage-img.jpg" width="48" height="48" alt="User" />
                                </div>
                                <div class="info-container">
                                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Fritz Barnuevo</div>
                                    <div class="email">admin</div>
                                    <div class="btn-group user-helper-dropdown">
                                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- #User Info -->
                            <!-- Menu -->
                            <div class="menu">
                                <ul class="list">
                                    
                                    
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <i class="material-icons">widgets</i>
                                            <span>Classes</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="javascript:void(0);" class="menu-toggle">
                                                    <span>Cards</span>
                                                </a>
                                                <ul class="ml-menu">
                                                    <li>
                                                        <a href="pages/widgets/cards/basic.html">Basic</a>
                                                    </li>
                                                    <li>
                                                        <a href="pages/widgets/cards/colored.html">Colored</a>
                                                    </li>
                                                    <li>
                                                        <a href="pages/widgets/cards/no-header.html">No Header</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="menu-toggle">
                                                    <span>Infobox</span>
                                                </a>
                                                <ul class="ml-menu">
                                                    <li>
                                                        <a href="pages/widgets/infobox/infobox-1.html">Infobox-1</a>
                                                    </li>
                                                    <li>
                                                        <a href="pages/widgets/infobox/infobox-2.html">Infobox-2</a>
                                                    </li>
                                                    <li>
                                                        <a href="pages/widgets/infobox/infobox-3.html">Infobox-3</a>
                                                    </li>
                                                    <li>
                                                        <a href="pages/widgets/infobox/infobox-4.html">Infobox-4</a>
                                                    </li>
                                                    <li>
                                                        <a href="pages/widgets/infobox/infobox-5.html">Infobox-5</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <i class="material-icons">assignment</i>
                                            <span>Assestment</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="pages/forms/basic-form-elements.html">Basic Form Elements</a>
                                            </li>
                                            <li>
                                                <a href="pages/forms/advanced-form-elements.html">Advanced Form Elements</a>
                                            </li>
                                            <li>
                                                <a href="pages/forms/form-examples.html">Form Examples</a>
                                            </li>
                                            <li>
                                                <a href="pages/forms/form-validation.html">Form Validation</a>
                                            </li>
                                            <li>
                                                <a href="pages/forms/form-wizard.html">Form Wizard</a>
                                            </li>
                                            <li>
                                                <a href="pages/forms/editors.html">Editors</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <i class="material-icons">view_list</i>
                                            <span>Tables</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="pages/tables/normal-tables.html">Normal Tables</a>
                                            </li>
                                            <li>
                                                <a href="pages/tables/jquery-datatable.html">Jquery Datatables</a>
                                            </li>
                                            <li>
                                                <a href="pages/tables/editable-table.html">Editable Tables</a>
                                            </li>
                                        </ul>
                                    </li>
                                
                                
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <i class="material-icons">content_copy</i>
                                            <span>Example Pages</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="pages/examples/sign-in.html">Sign In</a>
                                            </li>
                                            <li>
                                                <a href="pages/examples/sign-up.html">Sign Up</a>
                                            </li>
                                            <li>
                                                <a href="pages/examples/forgot-password.html">Forgot Password</a>
                                            </li>
                                            <li>
                                                <a href="pages/examples/blank.html">Blank Page</a>
                                            </li>
                                            <li>
                                                <a href="pages/examples/404.html">404 - Not Found</a>
                                            </li>
                                            <li>
                                                <a href="pages/examples/500.html">500 - Server Error</a>
                                            </li>
                                        </ul>
                                    </li>
                            
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <i class="material-icons">trending_down</i>
                                            <span>Statistics</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <span>Menu Item</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <span>Menu Item - 2</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="menu-toggle">
                                                    <span>Level - 2</span>
                                                </a>
                                                <ul class="ml-menu">
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <span>Menu Item</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);" class="menu-toggle">
                                                            <span>Level - 3</span>
                                                        </a>
                                                        <ul class="ml-menu">
                                                            <li>
                                                                <a href="javascript:void(0);">
                                                                    <span>Level - 4</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="pages/changelogs.html">
                                            <i class="material-icons">update</i>
                                            <span>Reports</span>
                                        </a>
                                    </li>
                                  
                                </ul>
                            </div>
                            <!-- #Menu -->
                            <!-- Footer -->
                            <div class="legal">
                                <div class="copyright">
                                    &copy; 2016 - 2017 <a href="javascript:void(0);">E - Checker</a>.
                                </div>
                                <div class="version">
                                    <b>Version: </b> 1.0.5
                                </div>
                            </div>
                            <!-- #Footer -->
                        </aside>
                        <!-- #END# Left Sidebar -->
                        <!-- Right Sidebar -->
                        <aside id="rightsidebar" class="right-sidebar">
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                                    <ul class="demo-choose-skin">
                                        <li data-theme="light-blue" class="active">
                                            <div class="light-blue"></div>
                                            <span>Light Blue</span>
                                        </li>
                                        <li data-theme="red">
                                            <div class="red"></div>
                                            <span>Red</span>
                                        </li>
                                        <li data-theme="pink">
                                            <div class="pink"></div>
                                            <span>Pink</span>
                                        </li>
                                        <li data-theme="purple">
                                            <div class="purple"></div>
                                            <span>Purple</span>
                                        </li>
                                        <li data-theme="deep-purple">
                                            <div class="deep-purple"></div>
                                            <span>Deep Purple</span>
                                        </li>
                                        <li data-theme="indigo">
                                            <div class="indigo"></div>
                                            <span>Indigo</span>
                                        </li>
                                        <li data-theme="blue">
                                            <div class="blue"></div>
                                            <span>Blue</span>
                                        </li>
                                        
                                        <li data-theme="cyan">
                                            <div class="cyan"></div>
                                            <span>Cyan</span>
                                        </li>
                                        <li data-theme="teal">
                                            <div class="teal"></div>
                                            <span>Teal</span>
                                        </li>
                                        <li data-theme="green">
                                            <div class="green"></div>
                                            <span>Green</span>
                                        </li>
                                        <li data-theme="light-green">
                                            <div class="light-green"></div>
                                            <span>Light Green</span>
                                        </li>
                                        <li data-theme="lime">
                                            <div class="lime"></div>
                                            <span>Lime</span>
                                        </li>
                                        <li data-theme="yellow">
                                            <div class="yellow"></div>
                                            <span>Yellow</span>
                                        </li>
                                        <li data-theme="amber">
                                            <div class="amber"></div>
                                            <span>Amber</span>
                                        </li>
                                        <li data-theme="orange">
                                            <div class="orange"></div>
                                            <span>Orange</span>
                                        </li>
                                        <li data-theme="deep-orange">
                                            <div class="deep-orange"></div>
                                            <span>Deep Orange</span>
                                        </li>
                                        <li data-theme="brown">
                                            <div class="brown"></div>
                                            <span>Brown</span>
                                        </li>
                                        <li data-theme="grey">
                                            <div class="grey"></div>
                                            <span>Grey</span>
                                        </li>
                                        <li data-theme="blue-grey">
                                            <div class="blue-grey"></div>
                                            <span>Blue Grey</span>
                                        </li>
                                        <li data-theme="black">
                                            <div class="black"></div>
                                            <span>Black</span>
                                        </li>
                                    </ul>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="settings">
                                    <div class="demo-settings">
                                        <p>GENERAL SETTINGS</p>
                                        <ul class="setting-list">
                                            <li>
                                                <span>Report Panel Usage</span>
                                                <div class="switch">
                                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                                </div>
                                            </li>
                                            <li>
                                                <span>Email Redirect</span>
                                                <div class="switch">
                                                    <label><input type="checkbox"><span class="lever"></span></label>
                                                </div>
                                            </li>
                                        </ul>
                                        <p>SYSTEM SETTINGS</p>
                                        <ul class="setting-list">
                                            <li>
                                                <span>Notifications</span>
                                                <div class="switch">
                                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                                </div>
                                            </li>
                                            <li>
                                                <span>Auto Updates</span>
                                                <div class="switch">
                                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                                </div>
                                            </li>
                                        </ul>
                                        <p>ACCOUNT SETTINGS</p>
                                        <ul class="setting-list">
                                            <li>
                                                <span>Offline</span>
                                                <div class="switch">
                                                    <label><input type="checkbox"><span class="lever"></span></label>
                                                </div>
                                            </li>
                                            <li>
                                                <span>Location Permission</span>
                                                <div class="switch">
                                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <!-- #END# Right Sidebar -->
                    </section>

                    <section class="content">
                        <div class="container-fluid">
                            <div class="block-header">
                                <h2>DASHBOARD</h2>
                            </div>
                    ';
            }
        }
    }
?>

