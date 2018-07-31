
<div class="container-fluid">
    <?php foreach ($busSearch as $search): ?>
        <form action="business.php" method="get" id="form<?= $search["name"] ?>" class="list-group">
            
            <a href="javascript:{}" onclick="document.getElementById('form<?= $search["name"] ?>').submit(); return false;" class="list-group-item list-group-item-action">
            <h3 class="list-group-item-heading"><span id="name"><?= $search["name"] ?></span></h3>
            <p class="list-group-item-text"> <h4><i><?= $search["bus_type"] ?></i></h4>
            <br/>
            <?= $search["address"] ?><br/><?= $search["city"] ?>, 
            <?= $search["state"] ?> <?= $search["zip"] ?></p>
            </a>
            
            
            <input type="hidden" id="input" name="bus_id" value="<?= $search["bus_id"] ?>"/>
            
           
        </form>
<?php endforeach ?>
</div>
