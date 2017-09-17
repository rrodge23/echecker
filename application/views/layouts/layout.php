
<?php
    $dashboard="";$subjects="";$users="";$reports="";$departments="";$imports="";$courses="";
    switch($currentPath){
        case 'dashboard':
            $dashboard='active';
            break;
        case 'subjects':
            $subjects='active';
            break;
        case 'users':
            $users='active';
            break;
        case 'reports':
            $reports='active';
            break;
        case 'departments':
            $departments='active';
            break;  
        case 'courses':
            $courses='active';
            break;    
        case 'imports':
            $imports='active';
            break;
        default:
    };
?>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="dashboard" class="simple-text">
                    e Checker
                </a>
            </div>

            <ul class="nav">
                <li class="<?=$dashboard?>">
                    <a href="dashboard">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                <li class="<?=$subjects?>">
                    <a href="subjects">
                        <i class="material-icons">subject</i>
                        <p>Subjects</p>
                    </a>
                </li>
                <li class="<?=$departments?>">
                    <a href="departments">
                        <i class="material-icons">view_quilt</i>
                        <p>Department</p>
                    </a>
                </li>
                <li class="<?=$courses?>">
                    <a href="courses">
                        <i class="material-icons">book</i>
                        <p>Course</p>
                    </a>
                </li>
                <li class="<?=$users?>">
                    <a href="users">
                        <i class="material-icons">account_box</i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="<?=$reports?>">
                    <a href="reports">
                        <i class="material-icons">history</i>
                        <p>Reports</p>
                    </a>
                </li>
                <li class="<?=$imports?>">
                    <a href="imports">
                        <i class="material-icons">file_download</i>
                        <p>Import Record</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?=ucwords($currentPath);?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">person_pin</i>
								<p><?=$_SESSION['users']['user'];?></p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">settings</i>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="logout/changepassword"><i class="material-icons">autorenew</i>ChangePassword</a></li>
                                <li><a href="logout"><i class="material-icons">exit_to_app</i>Logout</a></li>
                              </ul>
                        </li>
				
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">