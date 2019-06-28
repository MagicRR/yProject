<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Neon default';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>

    <link href="img/favicon.png" type="image/png" rel="icon"/>

    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('neon-core.css') ?>
    <?= $this->Html->css('jquery.selectBoxIt.css') ?>
    <?= $this->Html->css('neon-forms.css') ?>
    <?= $this->Html->css('neon-theme.css') ?>
    <?= $this->Html->css('wysihtml5-color.css') ?>

    <?= $this->Html->css('font-icons/entypo/css/entypo.css') ?>
    <?= $this->Html->css('font-icons/font-awesome/css/font-awesome.css') ?>
    <?= $this->Html->css('bootstrap-datetimepicker.min.css') ?>

    <?= $this->Html->css('fullcalendar.css') ?>

    <link rel="stylesheet" href="/js/datatables/datatables.min.css">
    <link rel="stylesheet" href="/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="/js/select2/select2.css">

    <?= $this->Html->script('jquery-1.11.3.min.js'); ?>

    <!-- FileInput -->
    <?= $this->Html->css('fileinput.min.css') ?>
    <?= $this->Html->script('fileinput/fileinput.min.js'); ?>
    <?= $this->Html->script('fileinput/locales/fr.js'); ?>

    <!-- Commenté -->
    <!-- <?= $this->Html->css('style.css') ?> -->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <!-- Style custom ! -->
    <?= $this->Html->css('custom.css') ?>

</head>

    <body class="page-body loaded">

        <div class="page-container">

            <div class="sidebar-menu">

                <div class="sidebar-menu-inner">

                    <header class="logo-env">

                        <div class="logo">
                            <a href="https://demo.neontheme.com/dashboard/main/">
                                <img src="https://demo.neontheme.com/assets/images/logo@2x.png" width="120" alt="">
                            </a>
                        </div>

                        <div class="sidebar-collapse">
                            <a href="#" class="sidebar-collapse-icon">
                                <i class="entypo-menu"></i>
                            </a>
                        </div>

                        <div class="sidebar-mobile-menu visible-xs">
                            <a href="#" class="with-animation">
                                <i class="entypo-menu"></i>
                            </a>
                         </div>

                    </header>

                    <ul id="main-menu" class="main-menu">
                        <li class="root-level">
                            <a href="/jeux">
                                <i class="entypo-chart-bar"></i>
                                <span class="title">Jeux</span>
                            </a>
                        </li>
                    </ul>

                </div>

            </div>

            <?= $this->Flash->render() ?>
            <div class="clearfix">
                <?= $this->fetch('content') ?>
            </div>

        </div>

    </body>

    <?= $this->Html->script('bootstrap.js'); ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js'); ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js'); ?>

    <?= $this->Html->script('datatables/datatables.min.js'); ?>

    <?= $this->Html->script('gsap/TweenMax.min.js'); ?>
    <?= $this->Html->script('jquery-ui/js/jquery-ui-1.10.3.minimal.min.js'); ?>
    <?= $this->Html->script('joinable.js'); ?>
    <?= $this->Html->script('resizeable.js'); ?>
    <?= $this->Html->script('neon-api.js'); ?>
    <?= $this->Html->script('jquery.validate.min.js'); ?>
    <?= $this->Html->script('neon-register.js'); ?>
    <?= $this->Html->script('neon-login.js'); ?>
    <?= $this->Html->script('jquery.inputmask.bundle.js'); ?>
    <?= $this->Html->script('moment.min.js'); ?>
    <?= $this->Html->script('jquery.bootstrap.wizard.min.js'); ?>
    <?= $this->Html->script('bootstrap-switch.min.js'); ?>

    <?= $this->Html->script('select2/select2.min.js'); ?>
    <?= $this->Html->script('icheck/icheck.min.js'); ?>

    <!-- ColorPicker-->
    <?= $this->Html->script('bootstrap-colorpicker.min.js'); ?>
    <?= $this->Html->css('bootstrap-colorpicker.min.css'); ?>

    <!-- ToolTip -->
    <?= $this->Html->script('https://unpkg.com/popper.js/dist/umd/popper.min.js'); ?>
    <?= $this->Html->script('https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'); ?>

    <!-- Calendar-->
    <?= $this->Html->script('fullcalendar.min.js'); ?>
    <?= $this->Html->script('neon-chat.js'); ?>

    <?= $this->Html->script('custom.js'); ?>
    <?= $this->Html->script('neon-custom.js'); ?>
    <?= $this->Html->script('neon-demo.js'); ?>
    <?= $this->Html->script('bootstrap-datetimepicker.min.js'); ?>
    <?= $this->Html->script('bootstrap-datetimepicker.fr.js'); ?>



</html>
