<!DOCTYPE html>

<html>

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=11">
        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

     <!--  <link href="/css/styles.css" rel="stylesheet"/> -->

        <?php if (isset($title)): ?>
            <title>EWEant: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>EWEant</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="/css/styles.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
     <div id="content">
        <div id="header" class="container-fluid well" style="text-right">

            <div >
                
                    <a href="/"><img alt="EWEant" src="/img/logo.png"  height="150" width="150" style="text-right"/></a>
                
                
                    <ul class="nav nav-pills pull-right"  >
                        <li><a href="/">Search</a></li>
                        <li><div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">Business
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu">
                                <li><a href="register_bus.php">Register Business</a></li>
                                <hr>
                                <li><a href="login.php">Login</a></li>
                              </ul>
                        </div></li>
                     <?php if (!empty($_SESSION["id"]) && $_SESSION["type"] == "user") {
                     
                         $name= CS50::query("SELECT firstname FROM users WHERE id =?", $_SESSION["id"]);
                         
                         $nm = [];
                         
                         foreach ($name as $n)
                         {
                             $nm = [
                             "name" => $n["firstname"]
                             ];
                         }
                        $first = ucfirst($nm["name"]);
                     }
                     else {
                         $first = "";
                     }
                    ?>
                    <?php if(!empty($_SESSION["id"])): ?>
                        <li><div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown"><strong>Hello <?= $first ?></strong>
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu pull-right">
                                  <li><a href="/user_profile.php">Profile</a></li>
                                  <hr>
                                  <li><a href="logout.php">Log Out</a></li>
                            </ul>
                            </div></li>
                    <?php endif ?>
                    <?php if (empty($_SESSION["id"])): ?>
                        <li><div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown"><strong>Log In</strong>
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu pull-right" style="width:550px">
                                <form action="login.php" method="post" class="form-inline" style="text-align:center">
                                    <fieldset>
                                        <div class="form-group ">
                                            <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text" required/>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" name="password" placeholder="Password" type="password" required/>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-default" type="submit">
                                                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                                                Log In
                                            </button>
                                        </div>
                                            <p>Or <a href="/register.php">Register</a> for an Account.</p>
                                    </fieldset>
                                </form>
                              </ul>
                              
                        </div></li>
                    </ul>
                   
                <?php endif ?>
            </div>
        </div>
        <script type="text/javascript" src="js/scripts.js"></script>
            <div id="body">
