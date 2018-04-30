<?php echo doctype('html5'); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible " content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--
        echo meta("UTF-8", "", 'charset');
        echo meta("X-UA-Compatible", "IE=edge", 'http-equiv');
        echo meta("viewport", "width=device-width, initial-scale=1");
        -->
        <title><?= $title ?> </title>
        <?php
        echo link_tag("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");
        echo link_tag("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css")
        ?>

        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        Optional theme 
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        -->
    </head>

    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toogle="collapse" data-target="#main_nav" aria-expanded="false">
                        <span class="sr-only">Toogle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"> Celine</a>
                </div>
                <div class="collapse navbar-collapse" id="main-nav">
                    <ul class="nav navbar-nav">
                        <!--<li><a href="/index.html"> Accueil</a></li>-->
                        <li><?php echo anchor('index', "Accueil"); ?> </li><!--en premier le nom du controller en 2eme le nom a afficher-->
                        <li><?php echo anchor('presentation', "Présentation"); ?></li><!--page de presentation-->
                        <li><?php echo anchor('contact', "Contact") ?> </li><!--lien vers la page contact-->
                        <?php if ($this->auth_user->is_connected): ?>
                            <li><?php echo anchor('panneau', "Panneau de contrôle"); ?></li><!-- panneau de controle visible en cas de connexion-->
                            <li><?php echo anchor('blog/index', "Blog"); ?><!--accès au blog après connexion-->
                            <?php endif ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if ($this->auth_user->is_connected): ?>
                            <li><?php echo anchor('deconnexion', "Déconnexion"); ?></li><!--lien vers déconnexion-->
                        <?php else: ?>
                            <li><?php echo anchor('connexion', "Connexion"); ?></li><!--lien vers connexion-->
                        <?php endif ?>
                    </ul>
                    <?php if ($this->auth_user->is_connected): ?>
                        <ul class="nav navbar-nav navbar-right">
                            <p class="navbar-text navbar-right">|</p>
                            <p class="navbar-text navbar-right">Bienvenue <strong> <?= $this->auth_user->username ?></strong></p>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
