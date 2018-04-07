<nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>

                    <a class="navbar-brand" href="index.php"><b>ITOValley</b></a>
                </div>

                <div class="collapse navbar-collapse" id="myNavbar">

                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="search.php">Search</a></li>
                        <li><a href="create_job.php">Create Job</a></li>
                        <li>
                            <a href="job.php" data-toggle="popover" title="Find a Job"
                            data-content='
                            <!-- <h4 class="title">Find a Job</h4> -->
                            <ul>
                            <li><a href="#">Jobs By Location</a></li>
                            <li><a href="#">Jobs By Category</a></li>
                            <li><a href="#">Jobs By Top Employers</a></li>
                            <li><a href="#">Jobs With My Skills</a></li>
                            <li><a href="#">Local Jobs</a></li>
                            </ul>'
                            >Jobs</a>
                        </li>

                    </ul>

                    <form class="navbar-form navbar-left">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                            </div>
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                <?php
                if(!$auth){
                ?>
                <li>
                    <a href="register.php">
                        <button class="btn btn-primary btn-xs">Signup</button>
                    </a>
                </li>
                <li>
                    <a href="login.php">
                        <button class="btn btn-primary btn-xs">Login</button>
                    </a>
                </li>
                <?php }else{ ?>
                <li><a href="#" data-toggle="popover" title="notifications"
                data-content='
                <!-- <h4 class="title">notifications</h4><ul> -->
                <li><a href="#"><span class="fa fa-bolt"></span> recommended jobs</a></li>
                <li><a href="#"><span class="fa fa-eye"></span> who viewed my profile</a></li>
                </ul>'>
                <span class="fa fa-bell-o" style="font-size:1.35em;"></span></a></li>
                <li><a href="#" class="messages" style="font-size:1.7em;" title="Messages" data-toggle="popover"
                data-content='<ul>
                    <li>
                        <a href="#">
                            <img src="public/images/default-profile.jpg" alt="profile" class="img-circle" width="30px">
                            <p>yara tarek</p>
                            <p class="msg">Hello there, did you receive my specifications .. </p>
                        </a>
                    </li>

                </ul>'>
                <span class="counter">5</span>
                    <span class="fa fa-comment-o"></span></a></li>
                <li>
                    <a href="#" data-toggle="popover" style="padding:10px" title="<?php echo $auth['first_name']; ?> profile" data-content='
                    <!-- <h4 class="title"><?php echo $auth['first_name']; ?> profile</h4><ul> -->
                    <li><a href="#"><span class="fa fa-lock"></span> Change Password</a></li>
                    <li><a href="#"><span class="fa fa-user"></span> Edit Profile</a></li>
                    <li><a href="#"><span class="fa fa-gear"></span> Settings</a></li>
                    <li><a href="logout.php"><span class="fa fa-power-off"></span> Logout</a></li>
                    </ul>'>
                    <img src="public/images/default-profile.jpg" alt="profile" class="img-circle" width="30px">
                    </a>
                </li>
                <?php }?>
            </ul>
                </div>
            </div>
        </nav>