<?php
    if($_SESSION['users']['user_level'] == "99"){
        $displayUserLevel = "admin";
    }else if($_SESSION['users']['user_level'] == "1"){
        $displayUserLevel = "Student";
    } else if($_SESSION['users']['user_level'] == "2"){
        $displayUserLevel = "teacher";
    }else{
        $displayUserLevel = "unknown";
    }
?>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <div id="morning-greetings">
                                    <img src="assets/images/morning.png" style="height:150px;width:150px">
                                    <h4 class="title">Goodmorning <?=ucwords($_SESSION['users']['user']);?> !</h4>
                                    <p class="category"><?=ucwords($displayUserLevel);?></p>
                                </div>
                                <div id="afternoon-greetings">
                                    <img src="assets/images/afternoon.png" style="height:150px;width:150px">
                                    <h4 class="title">Goodafternoon <?=ucwords($_SESSION['users']['user']);?> !</h4>
                                    <p class="category"><?=ucwords($displayUserLevel);?></p>
                                </div>
                                <div id="evening-greetings">
                                    <img src="assets/images/evening.png" style="height:150px;width:150px">
                                    <h4 class="title">Goodevening <?=ucwords($_SESSION['users']['user']);?> !</h4>
                                    <p class="category"><?=ucwords($displayUserLevel);?></p>
                                </div>
                            </div>
                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div id="tb-testimonial" class="testimonial testimonial-default-filled">
                                            <div class="testimonial-section">
                                                Denim you probably haven't heard of. Lorem ipsum dolor met consectetur adipisicing sit amet, consectetur adipisicing elit, of them jean shorts sed magna aliqua. Lorem ipsum dolor met.
                                            </div>
                                            <div class="testimonial-desc">
                                                <img src="https://placeholdit.imgix.net/~text?txtsize=9&txt=100%C3%97100&w=100&h=100" alt="" />
                                                <div class="testimonial-writer">
                                                    <div class="testimonial-writer-name">Zahed Kamal</div>
                                                    <div class="testimonial-writer-designation">Front End Developer</div>
                                                    <a href="#" class="testimonial-writer-company">Touch Base Inc</a>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
           
