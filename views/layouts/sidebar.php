<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>
<aside class="main-sidebar sidebar-dark-danger elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link navbar-danger logo-switch text-white text-center">
        <!-- <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text"><b>AHR</b>Fact</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php //echo Yii::$app->user->identity->name." ".Yii::$app->user->identity->firstname ?></a>
            </div>
        </div> -->



        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            $items   = [];
            $items[] = ['label' => 'Dashboard', 'icon' => 'fas fa-tachometer-alt', 'url' => [Url::to('/site/index')], 'target' => ''];
            $items[] = ['label' => 'AJUSTES GENERALES', 'header' => true];
            $items[] = ['label' => 'Mi Cuenta', 'icon' => 'fas fa-user-circle', 'url' => [Url::to('/site/profile')], 'target' => ''];
            $items[] = ['label' => 'Configuración', 'icon' => 'fas fa-cog', 'url' => [Url::to('/site/empresa')], 'target' => ''];
            $items[] = ['label' => 'CATÁLOGOS', 'header' => true];
            $items[] = [
                        'label' => 'Clientes',  'icon' => 'fas fa-address-book',
                        'items' => [
                            ['label' => 'Clientes', 'icon' => 'fas fa-user-plus', 'url' => [Url::to('/customers/index')], 'target' => ''],
                            ['label' => 'Importar Clientes', 'icon' => 'far fa-id-card','url' => [Url::to('/customers/import')], 'target' => '']
                        ]
                    ];
            //$items[] = ['label' => 'Clientes', 'icon' => 'fas fa-address-book', 'url' => [Url::to('/customers/index')], 'target' => ''];
            $items[] = ['label' => 'Productos', 'icon' => 'fas fa-tag', 'url' => [Url::to('/products/index')], 'target' => ''];
            /*$items[] = ['label' => 'Configuración', 'icon' => 'fas fa-cog', 'url' => [Url::to('/site/empresa')], 'target' => ''];*/
            /*$items[] = ['label' => 'Rifas', 'icon' => 'fa fa-bolt', 'url' => [Url::to('/rifas/index')], 'target' => ''];
            $items[] = ['label' => 'Boletos Activos', 'icon' => 'fas fa-ticket-alt', 'url' => [Url::to('/tickets/index')], 'target' => ''];
            $items[] = ['label' => 'Boletos Vencidos', 'icon' => 'far fa-calendar-times', 'url' => [Url::to('/tickets/expirate')], 'target' => ''];
            $items[] = ['label' => 'Despreciados', 'icon' => 'fa fa-ban', 'url' => [Url::to('/ticketstorage/index')], 'target' => ''];
            $items[] = ['label' => 'Punto de Venta', 'icon' => 'fas fa-cart-arrow-down', 'url' => [Url::to('/tickets/sales')], 'target' => ''];*/
            
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => $items, //[
                    /*[
                        'label' => 'Starter Pages',
                        'icon' => 'tachometer-alt',
                        'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
                            ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                        ]
                    ],
                    ['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
                    ['label' => 'Yii2 PROVIDED', 'header' => true],
                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                    ['label' => 'MULTI LEVEL EXAMPLE', 'header' => true],
                    ['label' => 'Level1'],
                    [
                        'label' => 'Level1',
                        'items' => [
                            ['label' => 'Level2', 'iconStyle' => 'far'],
                            [
                                'label' => 'Level2',
                                'iconStyle' => 'far',
                                'items' => [
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                                ]
                            ],
                            ['label' => 'Level2', 'iconStyle' => 'far']
                        ]
                    ],
                    ['label' => 'Level1'],
                    ['label' => 'LABELS', 'header' => true],
                    ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                    ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                    ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                ],*/
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>