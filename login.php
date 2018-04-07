        <?php
        require 'includes/helper.php';
        require 'includes/header.php';
        require 'includes/nav.php';
        ?>

        <div class="container" style="padding-top: 30px">    
            <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <div class="panel panel-info" >
                        <div class="panel-heading">
                            <div class="panel-title">Sign In</div>
                            <div style="float:right; font-size: 80%; position: relative; top:-10px"></div>
                        </div>     

                        <div style="padding-top:30px" class="panel-body" >

                            <?php
                            require 'includes/alerts.php';
                            ?>   
                                                            
                            <form action="login_process.php" method="POST" id="loginform" class="form-horizontal" role="form">
                                        
                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">                                        
                                </div>
                                    
                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                </div>
                                        




                                    <div style="margin-top:10px" class="form-group">

                                        <div class="col-sm-12 controls">
                                          <a id="btn-login" href="#" class="btn btn-success">Login  </a>
                                          <a id="btn-fblogin" href="#" class="btn btn-primary" onClick="$('#loginbox').hide(); $('#signupbox').show()">Sign Up</a>

                                        </div>
                                    </div>



                                </form>     



                            </div>                     
                        </div>  
            </div>
            <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="panel-title">Sign Up</div>
                            </div>  
                            <div class="panel-body" >
                                <form id="signupform" class="form-horizontal" role="form">
                                    
                                    <div class="alert alert-danger">
                                        <p>Show errors here</p>
                                    </div>
                                                                              
                                    <div class="form-group">
                                        <label for="email" class="col-md-3 control-label">Email</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="email" placeholder="Email Address">
                                        </div>
                                    </div>
                                        
                                    <div class="form-group">
                                        <label for="firstname" class="col-md-3 control-label">First Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-md-3 control-label">Password</label>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                        
                                    <div class="form-group">
                                        <!-- Button -->                                        
                                        <div class="col-md-offset-3 col-md-9">
                                            <button id="btn-signup" type="button" class="btn btn-primary"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                                            <button id="btn-signup" type="button" class="btn btn-success" onclick="$('#signupbox').hide(); $('#loginbox').show()"><i class="icon-hand-right"></i>Login</button>
                                        </div>
                                    </div>

                                    
                                    
                                    
                                </form>
                             </div>
                        </div>

                   
                   
                    
             </div> 
        </div>
        