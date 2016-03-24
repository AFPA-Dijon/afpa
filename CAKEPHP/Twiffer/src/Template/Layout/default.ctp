<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Twiffer';
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
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('custom.css') ?>
    
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><?= $this->Html->link('Twiffer', '/') ?></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <?php if($currentUser): ?>
                <li>
                    <strong class="username"><?= $this->Html->link('Salut '. $currentUser['username'], ['controller' => 'Users', 'action' => 'view']) ?></strong>
                </li>
                <li>
                    <?= $this->Html->link('Editer le profil' , ['controller' => 'AccountParameters', 'action' => 'form']) ?>
                </li>
                <li>
                    <?= $this->Html->link('Deconnexion', ['controller' => 'Users', 'action' => 'logout']) ?>
                </li>
                <?php else: ?>
                <li>
                    <?= $this->Html->link('Connexion', ['controller' => 'Users', 'action' => 'login']) ?>
                </li>
                <li>
                    <?= $this->Html->link('Inscription', ['controller' => 'Users', 'action' => 'signin']) ?>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
