<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppointmentAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
        'https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css'
    ];
    public $js = [
        'https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
        'https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js',
        'js/appointmentDataTable.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',

    ];
}
