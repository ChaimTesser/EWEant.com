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
            </div>
<div class="container-fluid">
    <div class=" col-sm-9 col-md-10">
<h3>Change your password:</h3>
<script>
function validateForm() {
    var x = document.forms["pass_change"]["new_pass"].value;
    var y = document.forms["pass_change"]["confirmation"].value;
    if (x != y) {
        alert("Passwords don't match!");
        return false;
    }
}
</script>

<form name="pass_change" action="options.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="password" placeholder="Old Password" style="width:300px" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="new_pass" style="width:300px" placeholder="New Password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="confirmation" style="width:300px" placeholder="Retype New Password" type="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                Change
            </button>
        </div>
    </fieldset>
    </form>
<br/>
<h3>Change your business image:</h3>
<form action="options.php" method="POST" enctype="multipart/form-data">
    <fieldset>
    File: 
    <input type="file" name="image" size="10" /> 
    <input type="submit" value="Upload image" />
    </fieldset>
    </form>

 </div>
</div>
<br>