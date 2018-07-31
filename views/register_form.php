<script>
function validateForm() {
    var x = document.forms["reg"]["password"].value;
    var y = document.forms["reg"]["confirmation"].value;
    if (x != y) {
        alert("Passwords don't match!");
        return false;
    }
}
</script>
<div class="container-fluid">
<h2>Please Register.</h2>

<form name="reg" action="register.php" method="post" onsubmit="return validateForm()">
    <fieldset>
        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text" required/>
        </div>
        <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <input class="form-control" name="password" placeholder="Password" type="password" required/>
        </div>
        <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <input class="form-control" name="confirmation" placeholder="Retype Password" type="password" required/>
        </div>
        
        <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <input class="form-control" name="firstname" placeholder="First Name" type="text" required/>
        </div>
        <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <input class="form-control" name="lastname" placeholder="Last Name" type="text" required/>
        </div>
        <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <input class="form-control" name="address" placeholder="Address" type="text" required/>
        </div>
        <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <input class="form-control" name="city" placeholder="City" type="text" required/>
        </div>
        <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <input class="form-control" name="state" placeholder="State" type="text" required/>
        </div>
        <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <input class="form-control" name="zip" placeholder="Zip" type="text" required/>
        </div>
        <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <input class="form-control" name="phone" placeholder="Phone Number" type="text" required/>
        </div>
        <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <input class="form-control" name="email" placeholder="E-Mail Address" type="text" required/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Register
            </button>
        </div>
    </fieldset>
</form>

<div>
    or <a href="login.php">log in</a>
</div>
</div>