<?php foreach ($infos as $info): ?>
<script src="/js/scripts.js"></script>
<div class="container">
    <div class="container-fluid">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id="bus_pic" class="col-xs-12 col-sm-6 col-md-6 col-lg-4 container ">
            <span id="pic_info"><?= $info["pic"] ?></span>
           <img src=<?= "/uploads/".$info["pic"] ?> height="300px" width="350px" " />
        
        </div>
        <script>
               document.getElementById('pic_info').style.visibility='hidden';
            if (document.getElementById('pic_info').innerHTML == "")
            {
                document.getElementById('bus_pic').style.display='none';
            }
            else
            {
                 document.getElementById('bus_pic').style.visibility='visible';
            }
        </script>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 container-fluid">
            <div>
                <h1><?= $info["name"] ?></h1>
                <h3><?= $info["type"] ?></h3>
                <h4 id="add"><?= $info["address"] ?></h4>
                <h4 id="city"><?= ucfirst($info["city"]) ?>, <?= strtoupper($info["state"]) ?> <?= $info["zip"] ?></h4>
                <h4><?= $info["phone"] ?></h4>
                <h4><?= $info["email"] ?></h4>
                <h4><a href="<?= $info["website"] ?>"><?= $info["website"] ?></a></h4>
                <br/>
                <h4><?= $info["desc"] ?></h4>
                
            
            </div>
         
        </div>
        
        <style>
              #map {
                height: 300px;
                width: 300px;
              }
        
        </style>
        <div id ="map" class="col-xs-12 col-sm-12 col-md-12 col-lg-4 container-fluid"></div>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
        <script>
             var geocoder;
          var map;
          function initialize() {
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(-34.397, 150.644);
            var mapOptions = {
              zoom: 16,
              center: latlng
            }
            map = new google.maps.Map(document.getElementById('map'), mapOptions);
          }
        
          function codeAddress() {
            var address = document.getElementById('add').innerHTML + " " + document.getElementById('city').innerHTML;
            //alert(address);
            geocoder.geocode( { 'address': address}, function(results, status) {
              if (status == 'OK') {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
              } else {
                alert('Geocode was not successful for the following reason: ' + status);
              }
            });
          }
         initialize();
         codeAddress();
            
                        function modal(){
        			        document.getElementById('good').style.display='none';
                            document.getElementById('bad').style.display='none';
                             document.getElementById('preview').style.display='none';}
                        
                        function buttonChoice(){
                            
        			        document.getElementById('good').style.display='none';
        			        document.getElementById('preview').style.display='none';
                            document.getElementById('bad').style.display='none'; 
                            document.getElementById('buttonChoice').style.display='block';}
            </script>
    </div>

            <div id="rate_info" class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
                <div id="rate_box" class="text-center">
                    <h2 id="rateNum"><span class="label label-success"><?= $info["rate"] ?></span> think it's GREAT!</h2>
                 <?php endforeach ?>                   
                </div> 
                <hr>
                    <!-- ul class="list-group" --> 
                    <?php foreach ($good_info as $good): ?>
                    
                         <li class="list-group-item" style="overflow:hidden; height:1%;">
                           <b class="pull-left"><em>"<?= wordwrap($good["info"],75,"-<br>\n",TRUE) ?>"</em></b>
                           
                         <span class="pull-right"> - <?= $good["first"] ?> <?= $good["lastInt"] ?></span>
                         <br>
                         <span class="pull-right">  <small><?= $good["timeDate"] ?></small> </span>
                        </li>
                    
                            
                            <?php endforeach ?>
                    
                
                <!-- ?php foreach ($good_info as $good): ? -->
            </div>
                <!-- ?php endforeach ? -->
           
            <div id='buttons' class="col-xs-12 col-sm-12 col-md-12 col-lg-4 text-center">
                <a href="#" class="btn btn-info btn-lg" role="button"  data-toggle="modal" data-target="#rate" onclick="modal()">What Do EWE Think?</a>
            </div>
                </div>
    </div> 
            <!-- Modal -->
            <div class="modal fade" id="rate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            	<div class="modal-dialog modal-lg">
            		<div class="modal-content">
            			<div class="modal-header">
            				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            				    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            				</button>
            				<h4 class="modal-title" id="myModalLabel">Great or Concerned?</h4>
            			</div>
            			<div class="modal-body text-center" >
            			
            			    <?php if (empty($_SESSION["id"])): ?>
            			    
            			    <h2>Please Log In to Review</h2>
            			 
            			    <form action="login.php" method="post" class="form-inline" style="">
                                <fieldset>
                                    <div class="form-group">
                                        <input autocomplete="off" style="width:250px;" autofocus class="form-control" name="username" placeholder="Username" type="text" required/>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" style="width:250px;" name="password" placeholder="Password" type="password" required/>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-default" type="submit">
                                            <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                                            Log In
                                        </button>
                                    </div>
                                </fieldset>
                            </form>
            			    <h4>Or <a href="register.php">Register</a> for an Account.</h4>
            			    <?php endif ?>
            			    <?php if (!empty($_SESSION["id"])): ?>
            			    <div class="container-fluid" id="buttonChoice">
                				<button type="button" style="width:175px" class="btn btn-success btn-lg col-centered"  onclick="good()">
                				    <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Great!
                				    </button>
                				    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                				<button type="button" style="width:175px" class=" btn btn-danger btn-lg col-centered"  onclick="bad()">
                				     <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> Concerned</button>
                			</div>
            			<script>
            			        
            			        function good(){
                                   document.getElementById('buttonChoice').style.display='none';
                                   document.getElementById('bad').style.display='none';
                                   document.getElementById('preview').style.display='none';
                                   document.getElementById('good').style.display='block';
            
            			        }
            			        function bad(){
                                   document.getElementById('buttonChoice').style.display='none';
                                   document.getElementById('good').style.display='none';
                                   document.getElementById('preview').style.display='none';
                                   document.getElementById('bad').style.display='block';
            
            			        }
            			        
                        </script>
            			</div>
            			<div class="container-fluid" id="good">
                		    <fieldset>	    
                			    <form action="good.php" method="post">
                			        <div class="form-group">
                			            <h3>What was great?  <small>Up to 160 characters</small></h3>
            				            <input type="text" name="good_info" id="good_info" class="center-block form-control input-lg" autofocus required>
            			                <input type="hidden" name="bus" value="<?= $info["bus_id"]?>"/>
            			             </div>
            			            
            			            <div class="form-group">
            			                <button class="btn-lg btn-primary pull-right">1UP & Submit</button>
            			            </div>
                			    </form>
                			    <div class="form-group"> 
            			                <button class="btn-lg" onclick="buttonChoice(); return false;">Back</button>
            			            </div>
                			</fieldset>    
            			</div>
            			<div class="container-fluid" id="bad">
                		    <fieldset>	    
                			    <form action="bad.php" method="post">
                			        <div class="form-group">
                			            <h3>What was the problem?</h3>
            				            <textarea rows="3" name="message" id="message" class="center-block form-control input-lg" ></textarea>
            			            </div>
            			            
            			            <div class="form-group">
            			                <button type="button" class="btn-lg btn-secondary pull-right" onclick="preview();">Preview</button>
            			            </div>
            			             <div class="form-group"> 
            			                <button class="btn-lg" onclick="buttonChoice(); return false;">Back</button>
            			            </div>
            			 </div>
            			            <div class="container-fluid" id="preview">
            			                 <div class="container-fluid">           
            			                    <h2>Preview Complaint</h2>
            			                    <p id="prevMes"></p>
            			                    <?php foreach ($firstLast as $first): ?>
            			                    <p class="pull-right">Username: <?= $first["username"] ?><br>
            			                    <?= $first["first"] ?> <?= substr($first["last"], 0, 1) ?>.<br>
            			                    <?= $first["email"] ?></p>
            			                    <?php endforeach ?>
            			                 </div>   
                    			             <div class="form-group">
                    			                <button type="submit" class="btn-lg btn-primary pull-right">Let us help!</button>
                    			            </div>
            			                <div class="form-group"> 
            			                <button class="btn-lg" onclick="buttonChoice(); return false;">Back</button>
            			            </div>
            			            </div>
            			            <script>
            			                        function preview() {
            			                            document.getElementById("prevMes").innerHTML = document.getElementById("message").value;
            			                          
                                                    document.getElementById('bad').style.display='none';
                                                   document.getElementById('good').style.display='none';
                                                   document.getElementById('buttonChoice').style.display='none';
                                                    document.getElementById('preview').style.display='block';
            			                           
            			                        }
            			                    </script>
            			            
                			    </form>
                			    
                			 <?php endif ?>
                			</fieldset>    
            			</div>
            		
            			
            			
            		</div><!-- /.modal-content -->
            	</div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            </div>


