<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar" style="color:blue">
            <ul class="nav nav-sidebar navbar-dark bg-light">
                <li class="nav-item ">
                    <a href="/messages.php">Messages</a>
                </li>
                <li class="nav-item">
                    <a href="options.php">Options</a>
                </li>
                <li class="nav-item">
                    <a href="/reviews.php">Reviews</a>
                </li>
                <li class="nav-item">
                    <a href="/bus_profile.php">Profile</a>
                </li>
            </div>
            <div class="col-sm-9 col-md-10">
                <h2>Dashboard</h2>
                <hr>
                <h3><?= $bus["name"] ?></h3>
                <br>
                <h2>Currently <span class="label label-success"><?= $bus["rate"] ?></span> think your great!</h2>
                <h3><a href="messages.php" style="color:black;">You have 
                <?php if($unreadCount == 0){
                    echo($unreadCount);
                }
                else
                {
                    echo("<strong>$unreadCount</strong>");
                }
                ?> new messages.</a></h3>
            <input type="button" class="btn-lg btn-primary" value="Launch Display Screen" onclick=window.open("/display.php")>
            </div>
        </div>    
    </div>
</div>
