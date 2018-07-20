<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\assets\IndexAsset;


?>
<!-- <div class="site-index"> -->

    <!-- <div class="jumbotron"> -->
        <center><h1>MyThir</h1></center>

        <!-- <p class="lead">You have successfully created your Yii-powered application.</p> -->

        <!-- <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
    <!-- </div> -->

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="image/Healthcare-Jobs.jpg" style="width: 100%">
    </div>

    <div class="item">
          <img src="image/ThinkstockPhotos-961285774.jpg" style="width: 100%">

    </div>

    <div class="item">
      <img src="image/Medical-Coders.jpg" style="width: 100%">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- </div> -->
