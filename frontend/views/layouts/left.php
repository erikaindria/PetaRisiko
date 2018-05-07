<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Erika Indria S.</p>

                <a href="#"><i class="fa fa-circle text-success"></i> 2103151014</a>
            </div>
        </div>

        

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    // ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'MAIN NAVIGATION', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['/']],
                    [
                        'label' => 'Data', 
                        'icon' => 'share', 
                        'url' => '#',
                        'items' => [
                            ['label' => 'Daftar Bencana', 'icon' => 'circle-o', 'url' => ['/bencana'],],
                            [
                                'label' => 'Kerentanan', 
                                'icon' => 'circle-o', 
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Kerentanan Ekonomi', 'icon' => 'circle-o', 'url' => ['/kerentanan-ekonomi'],],
                                    ['label' => 'Kerentanan Fisik', 'icon' => 'circle-o', 'url' => ['/kerentanan-fisik'],],
                                    ['label' => 'Kerentanan Lingkungan', 'icon' => 'circle-o', 'url' => ['/kerentanan-lingkungan'],],
                                    ['label' => 'Kerentanan Sosial', 'icon' => 'circle-o', 'url' => ['/kerentanan-sosial'],],
                                ],
                            ],
                            ['label' => 'Indeks Kapasitas', 'icon' => 'circle-o', 'url' => ['/'],],
                        ],
                    ],
                    [
                        'label' => 'Process', 
                        'icon' => 'share', 
                        'url' => '#',
                        'items' => [
                            ['label' => 'Hazard', 'icon' => 'circle-o', 'url' => ['/'],],
                            ['label' => 'Kerentanan', 'icon' => 'circle-o', 'url' => ['/'],],
                            ['label' => 'Indeks Kapasitas', 'icon' => 'circle-o', 'url' => ['/'],],
                            ['label' => 'Nilai Risiko Bencana', 'icon' => 'circle-o', 'url' => ['/'],],
                        ],
                    ],
                    ['label' => 'AHP', 'icon' => 'circle-o', 'url' => ['/']],
                    ['label' => 'PRB - Map', 'icon' => 'circle-o', 'url' => ['/']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
