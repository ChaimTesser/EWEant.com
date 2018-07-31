<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar" style="color:blue">
            <ul class="nav nav-sidebar navbar-dark ">
                <li class="nav-item active">
                    <a href="/messages.php">Messages <?= $unread ?> Unread </a>
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
            <div class="col-sm-9 col-md-10">
                <h2>Messages:</h2>
                <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Message</th>
                    <th>Replied</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($msg as $mes): ?>
                      <form action="message.php" method="post" id="form<?= $mes["id"] ?>" class="table active">

                      <tr a href="javascript:{}" onclick="document.getElementById('form<?= $mes["id"] ?>').submit(); return false;"class="table <?php if ($mes["red"] == NULL) {echo("danger");} ?>">
                         

                          <td><?= $mes["name"] ?></td>
                          <td><?= $mes["email"] ?></td>
                          <td><?= $mes["timeDate"] ?></td>
                          <td><?= $mes["message"] ?></td>
                          <td><?php if ($mes["replied"] == NULL) { echo("&#9744;"); } else { echo("&#9745;"); } ?></td>
                        </tr>
                        <input type="hidden" id="input" name="id" value="<?= $mes["id"] ?>" />
                        <input type="hidden" id="input" name="bus_id" value="<?= $mes["bus_id"] ?>" />
                        </form>
                        <?php endforeach ?>    
                    </table>        
                        </div>
                    </div>    
                </div>
            </div>