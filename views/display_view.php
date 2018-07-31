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
<div id="titles" class="container-fluid" style="text-align:left">
    <img src="/img/logo.png" style="height:210px; width:200px; display: inline-block">
    <div style=" float:top; position:absolute; top:0px; left:220px">
        <h1 style="font-size:100px;"><?= $infos[0]["name"] ?></h1>
        <h4 style="position:absolute; left:20px; top:150px;"><?= $infos[0]["address"] ?> <?= $infos[0]["city"] ?>, <?= $infos[0]["state"] ?> <?= $infos[0]["zip"] ?> &middot; 
        <?= $infos[0]["phone"] ?> &middot; <?= $infos[0]["website"] ?></h4>
    </div>
</div>
<br>
    <div class="container-fluid col-12">
        <?php if ($infos[0]["pic"] != ""): ?>
        <img src="<?= "/uploads/".$infos[0]["pic"] ?>" style="height:250px; width:300px" class="col-lg-4"/ >
        <?php endif ?>
        
       <h2><span class="label label-success" style="margin-top:15px; font-size:100px; "><?= $infos[0]["rate"] ?></span> think it's GREAT!</h2>
    </div>
<?php if (!empty($good_info)): ?>
<div id="info_good" class="container-fluid" style="width:75%">
    <h1 style="margin:50px"><strong>"<?= $good_info[0]["info"] ?>"</strong></h1>
        <div class="pull-right">
        <h2 id="hi" >-<?= $good_info[0]["first"], " ", $good_info[0]["lastInt"] ?></h2>
        <h4 ><?= $good_info[0]["timeDate"] ?></h4>
        </div>
</div>
<?php endif ?>
<?php header("refresh: 180;"); ?>
