<body>
    <div id="nav-wrapper">
                <span id="nav-left">
                    <a id="nav-title" href="courses">
                        <span class="fa fa-mortar-board"></span>
                        MCQ Bank
                    </a>
                </span>
    </div>



    <div id="main">
        <div class="alert alert-danger" style="visibility: <?= $show?>;">
            <?php echo validation_errors()  ?>
        </div>

        <div class="login-panel">
            <div class="panel-title">Please Sign In</div>
            <div class="panel-body">
                <form action="login/validate" method="post">

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" name="username"/>
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" class="form-control" name="password"/>
                        </div>

                        <!-- Change this to a button or input when using this as a form -->
                        <button type="submit" class="btn btn-lg btn-success btn-block"> Login</button>
                </form>
            </div>
        </div>

    </div>








</body>
</html>