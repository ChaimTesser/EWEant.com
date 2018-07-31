<div class="container-fluid">
    <h2>Reviews</h2>
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
        <form action="reviews.php" method="post">
        <?php foreach ($rev as $revs): ?>
             <li class="list-group-item" style="overflow:hidden; width:100%; height:1%;">
                <?php 
                    if ($revs["flag"] != NULL)
                    {
                        echo("<p style=\"color:red\"> This review was flagged and cannot be seen by users.</p>");
                    }
                    ?>
               <b class="pull-left"><em>"<?= wordwrap($revs["info"],75,"-<br>\n",TRUE) ?>"</em></b>
             <span class="pull-right"> - <?= $revs["first"] ?> <?= $revs["lastInt"] ?></span>
             <br>
             <span class="pull-right">  <small><?= $revs["timeDate"] ?></small> </span>
                <div class="checkbox">
                    <?php
                        if ($revs["flag"] == NULL): ?>
                        
                            <label style="color:red;"><input type="checkbox" name="flag[]" value="<?= $revs["reviewId"] ?>" >Flag</label>
                        <?php else: ?>
                             <label ><input type="checkbox" name="flag[]" value="<?= $revs["reviewId"] ?>" >Unflag</label>
                        <?php endif ?>
                </div>
            
            </li>
        <?php endforeach ?>
    </div>
    <div class="col-lg-4">
        <button class="btn-lg btn-primary">Flag/Unflag Reviews</button>
        <p>Flagging reviews will make them unseen to users but will not affect rating.</p>
        <p>Flagged reviews will be sent to EWEant Administrator for further review.</p>
    </div>
    </form>
</div>
