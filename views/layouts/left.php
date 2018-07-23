<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/image/dokter1.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>
                    <?= Yii::$app->user->identity->nama_pegawai ?>
                </p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->
        <?php 
        $items = [['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'jadwal',  'url' => ['/tabel-jadwal']],
                    ['label' => 'hasil pemeriksaan',  'url' => ['/tabel-hasil-pemeriksaan']],
                    ['label' => 'appointment',  'url' => ['/tabel-appointment']],
                    ['label' => 'artikel',  'url' => ['/tabel-artikel']],
                    ['label' => 'catatan medis pasien',  'url' => ['/tabel-catatan-medis-pasien']],
                    ['label' => 'jenis pemeriksaan',  'url' => ['/tabel-jenis-pemeriksaan']],
                    ['label' => 'jadwal pemeriksaan',  'url' => ['/tabel-jadwal-pemeriksaan']],
                    ['label' => 'pasien',  'url' => ['/tabel-pasien']],
                    ['label' => 'pegawai',  'url' => ['/tabel-pegawai']],
                    ['label' => 'penyakit',  'url' => ['/tabel-penyakit']],
                    ['label' => 'prediksi',  'url' => ['/tabel-prediksi']],
                    ['label' => 'decision tree',  'url' => ['/decision-tree']],
                    ['label' => 'rule',  'url' => ['/tabel-rule']],];
        if(Yii::$app->user->identity->id_role_pegawai == 1){
            $items = [['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'jadwal',  'url' => ['/tabel-jadwal']],
                    ['label' => 'hasil pemeriksaan',  'url' => ['/tabel-hasil-pemeriksaan']]];
        }
                    ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => $items
                    
                    // ['label' => 'notifikasi',  'url' => ['/tabel-notifikasi']],
                    // ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    // [
                    //     'label' => 'Same tools',
                    //     'icon' => 'share',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                    //         ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                    //         [
                    //             'label' => 'Level One',
                    //             'icon' => 'circle-o',
                    //             'url' => '#',
                    //             'items' => [
                    //                 ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                    //                 [
                    //                     'label' => 'Level Two',
                    //                     'icon' => 'circle-o',
                    //                     'url' => '#',
                    //                     'items' => [
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                     ],
                    //                 ],
                    //             ],
                    //         ],
                    //     ],
                    // ],
                ,
            ]
        ) ?>

    </section>

</aside>
