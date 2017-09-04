
<?php
    $dashboard="";$subjects="";$users="";$reports="";$notification="";
    switch($currentPath){
        case 'dashboard':
            $dashboard='active';
            break;
        case 'examination':
            $examination='active';
            break;
        case 'users':
            $users='active';
            break;
        case 'userprofile':
            $userProfile='active';
            break;
        case 'notification':
            $notification='active';
            break;
        default:
    };
?>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

   
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="dashboard" class="simple-text">
                    Creative Tim
                </a>
            </div>

            <ul class="nav">
                <li class="<?=$dashboard?>">
                    <a href="dashboard">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                <li class="<?=$subjects?>">
                    <a href="table.html">
                        <i class="material-icons">account_circle</i>
                        <p>Subjects</p>
                    </a>
                </li>   
               
                <li class="<?=$users?>">
                    <a href="users">
                        <i class="material-icons">account_circle</i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="<?=$reports?>">
                    <a href="users">
                        <i class="ti-user"></i>
                        <p>Reports</p>
                    </a>
                </li>
                <li class="<?=$notification?>">
                    <a href="notifications.html">
                        <i class="ti-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
				<li class="active-pro">
                    <a href="upgrade.html">
                        <i class="ti-export"></i>
                        <p>Upgrade to PRO</p>
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
                                <i class="ti-panel"></i>
								<p>Stats</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
									<p>Notifications</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
						<li>
                            <a href="/echecker/logout">
								<i class="ti-arrow-right"></i>
								<p></p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">