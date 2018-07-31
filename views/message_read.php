<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar" style="color:blue">
            <ul class="nav nav-sidebar navbar-dark ">
                <li class="nav-item active">
                    <a href="/messages.php">Messages</a>
                </li>
                <li class="nav-item">
                    <a href="/options.php">Options</a>
                </li>
                <li class="nav-item">
                    <a href="/reviews.php">Reviews</a>
                </li>
                <li class="nav-item">
                    <a href="profile.php">Profile</a>
                </li>
            </ul>    
        </div>
        <div class="col-sm-9 col-md-10 main-content-wrap" style=" outline: 1px solid black" >
            <div class="container-fluid">
                <div >
                    <h3>Message from user: <?= $message["user_name"] ?></h3>
                    <h4 id="mes1"><?= $message["timeDate"] ?></h4>
                    <br>
                    <p id="mes2"><?= wordwrap($message["message"],150," <br>\n",TRUE) ?></p>
                    <p id="mes3"><?= $message["name"]?></p>
                </div>
                <div id="reply" class="container" style="width:100%">
                    <form action="mailto:<?= $message["email"] ?>"  method="post">
                        <b>Reply</b><br>
                        <textarea id="text" rows="6" style="width:100%" name="reply" value=""></textarea>
                        <script>document.getElementById("text").innerHTML = "\n\n" + document.getElementById("mes1").innerHTML + "\n\n" +
                        document.getElementById("mes2").innerHTML + "\n\n" + document.getElementById("mes3").innerHTML;</script>
                        <button type="submit" class="pull-right btn-lg btn-primary style="margin-bottom:10px;">Submit</button>
                    </form>
                    
                </div>
            </div>
    </div>        
</div>