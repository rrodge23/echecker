


                <div class="row">
                    
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <div id="morning-greetings">
                                    <img src="assets/images/morning.png" style="height:150px;width:150px">
                                    <h4 class="title">Goodmorning <?=ucwords($_SESSION['users']['user']);?> !</h4>
                                    <p class="category"><?=$_SESSION['users']['user_level'];?></p>
                                </div>
                                <div id="afternoon-greetings">
                                    <img src="assets/images/afternoon.png" style="height:150px;width:150px">
                                    <h4 class="title">Goodafternoon <?=ucwords($_SESSION['users']['user']);?> !</h4>
                                    <p class="category"><?=$_SESSION['users']['user_level'];?></p>
                                </div>
                                <div id="evening-greetings">
                                    <img src="assets/images/evening.png" style="height:150px;width:150px">
                                    <h4 class="title">Goodevening <?=ucwords($_SESSION['users']['user']);?> !</h4>
                                    <p class="category"><?=$_SESSION['users']['user_level'];?></p>
                                </div>
                            </div>
                            <div class="content">
                                <div id="chartHours" class="ct-chart"></div>
                                <div class="footer">
                                    <div class="chart-legend">
                                       <select class="form-control">
                                        <option value="one">One</option>
                                        <option value="two">Two</option>
                                        <option value="three">Three</option>
                                        <option value="four">Four</option>
                                        <option value="five">Five</option>
                                       </select>
 
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Email Statistics</h4>
                                <p class="category">Last Campaign Performance</p>
                            </div>
                            <div class="content">
                                <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                                <div class="footer">
                                    <div class="chart-legend">
                                        <i class="fa fa-circle text-info"></i> Open
                                        <i class="fa fa-circle text-danger"></i> Bounce
                                        <i class="fa fa-circle text-warning"></i> Unsubscribe
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-timer"></i> Campaign sent 2 days ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">2015 Sales</h4>
                                <p class="category">All products including Taxes</p>
                            </div>
                            <div class="content">
                                <div id="chartActivity" class="ct-chart"></div>

                                <div class="footer">
                                    <div class="chart-legend">
                                        <i class="fa fa-circle text-info"></i> Tesla Model S
                                        <i class="fa fa-circle text-warning"></i> BMW 5 Series
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-check"></i> Data information certified
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
