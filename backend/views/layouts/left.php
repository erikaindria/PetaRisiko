<aside class="main-sidebar">

    <section class="sidebar">

        

        

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    // ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    // ['label' => 'MAIN NAVIGATION', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['/']],
                    ['label' => 'Data Kabupaten', 'icon' => 'circle-o', 'url' => ['/kabupaten']],
                    [
                        'label' => 'Data Kerentanan', 
                        'icon' => 'circle-o', 
                        'url' => '#',
                        'items' => [
                            ['label' => 'Kerentanan Sosial', 'icon' => 'circle-o', 'url' => ['/kerentanan-sosial'],],
                            ['label' => 'Kerentanan Ekonomi', 'icon' => 'circle-o', 'url' => ['/kerentanan-ekonomi'],],
                            ['label' => 'Kerentanan Fisik', 'icon' => 'circle-o', 'url' => ['/kerentanan-fisik'],],
                            ['label' => 'Kerentanan Lingkungan', 'icon' => 'circle-o', 'url' => ['/kerentanan-lingkungan'],],
                        ],
                    ],
                    ['label' => 'Data Indeks Kapasitas', 'icon' => 'circle-o', 'url' => ['/indeks-kapasitas']],
                    ['label' => 'Data Kejadian', 'icon' => 'circle-o', 'url' => ['/bencana']],
                    ['label' => 'Data Bencana', 'icon' => 'circle-o', 'url' => ['/tanah-longsor']],
                    ['label' => 'Data Bobot AHP', 'icon' => 'circle-o', 'url' => ['/ahp-tanah-longsor']],
                ],
            ]
        ) ?>

    </section>

</aside>
