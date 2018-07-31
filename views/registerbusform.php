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
<h2>Please Register Your Business</h2><small> Be seen.</small>
<div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form name="reg" role="form" action="register_bus.php" method="post" onsubmit="validateForm()">
			
			<hr class="colorgraph">
			
				
			<div class="form-group">
                <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Business Name" tabindex="1" required>
			</div>
			<div class="form-group">
                <input type="text" name="type" id="type" class="form-control input-lg" placeholder="Business Type" tabindex="2" required>
			</div>
			<div class="form-group">
                <input type="text" name="desc" id="desc" class="form-control input-lg" placeholder="Description" tabindex="3" required>
			</div>
			<div class="form-group">
				<input type="text" name="address" id="address" class="form-control input-lg" placeholder="Street Address" tabindex="4">
			</div>
			<div class="form-group">
				<input type="text" name="city" id="city" class="form-control input-lg" placeholder="City" tabindex="5" required>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
				<div class="form-group" class="col-xs-12 col-sm-6 col-md-6">
					<input type="text" name="state" id="state" class="form-control input-lg" placeholder="State" tabindex="6" required>
				</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
				<div class="form-group" class="col-xs-12 col-sm-6 col-md-6">
					<input type="text" name="zip" id="zip" class="form-control input-lg" placeholder="Zip" tabindex="7" required>
				</div>
				</div>
			</div>
			<div class="form-group">
				<input type="tel" name="phone" placeholder="Phone Number" class="form-control bfh-phone input-lg" data-format="(ddd) ddd-dddd" tabindex="8">
			</div>
			<div class="form-group">
				<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="9">
			</div>
			<div class="form-group">
				<input type="text" name="website" id="website" class="form-control input-lg" placeholder="Website" tabindex="10">
			</div>
		
			<div class="form-group">
				<input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username" tabindex="11" required>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="12" required>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password_confirmation" id="confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="13" required>
					</div>
				</div>
			</div>
			<div class="row">
				
				<div class="col-xs-8 col-sm-9 col-md-9">
					 By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
				</div>
			</div>
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
				<div class="col-xs-12 col-md-6"><a href="/login.php" class="btn btn-success btn-block btn-lg">Sign In</a></div>
			</div>
		</form>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
			</div>
			<div class="modal-body">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>