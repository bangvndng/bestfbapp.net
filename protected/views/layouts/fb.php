<!doctype html>
<html lang="en">
<head>
<meta name=”viewport” content=”width=device-width, initial-scale=1.0,
user-scalable=yes, maximum-scale=2.0, minimum-scale=1.0, “>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
  Yii::app()->clientScript->registerCSSFile(Yii::app()->baseUrl."/assets/css/normalize.css");
  Yii::app()->clientScript->registerCSSFile(Yii::app()->baseUrl."/assets/css/reset.css");
  Yii::app()->clientScript->registerCSSFile(Yii::app()->baseUrl."/assets/css/style.css");

 ?>

<!--[if lt IE 9]>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ie9.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/html5shiv.js"></script>
<![endif]-->
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery-1.10.2.min.js"></script>

</head>

<body>
<div class="page">

<header>
<h1 class="logo"><a href="/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/logo.png" alt="ただいま診断中"></a></h1>

<?php if (Yii::app()->controller->id == 'home' && ( Yii::app()->controller->action->id == 'index' || Yii::app()->controller->action->id == 'favorite') ) { ?>

<div class="menu clearfix">
<?php if (Yii::app()->controller->action->id == 'index') { ?>
	<p>新着順</p>
	<p class="link"><a href="<?php echo $this->createUrl('/home/favorite') ?>">人気順</a></p>
<?php } else { ?>
	<p class="link"><a href="<?php echo $this->createUrl('/home') ?>">新着順</a></p>
	<p >人気順</p>
<?php } ?>
</div>

<?php } ?>


<div style="margin:0 auto; width: 300px;">

  <!-- i-mobile for PC client script -->
  <script type="text/javascript">
      imobile_pid = "27475"; 
      imobile_asid = "208736"; 
      imobile_width = 300; 
      imobile_height = 250;
  </script>
  <script type="text/javascript" src="http://spdeliver.i-mobile.co.jp/script/ads.js?20101001"></script>

</div>



<?php /*
<script type="text/javascript">
var nend_params = {"media":14389,"site":67198,"spot":150460,"type":2,"oriented":1};
</script>
<script type="text/javascript" src="http://js1.nend.net/js/nendAdLoader.js"></script>

<script type="text/javascript">
var nend_params = {"media":14389,"site":67198,"spot":153545,"type":2,"oriented":1,"sp":0};
</script>
<script type="text/javascript" src="http://js1.nend.net/js/nendAdLoader.js"></script>
*/ ?>

<?php /*
<div class="floating">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> 
    <!-- 【SP】FB診断バナー(320×50) --> 
    <ins class="adsbygoogle" style="display:inline-block;width:320px;height:50px" data-ad-client="ca-pub-5542247258727700" data-ad-slot="7289848089"></ins> 
    <script> (adsbygoogle = window.adsbygoogle || []).push({}); </script>
</div>
*/ ?>

<?php 
//echo getcwd();

/*
include '/Mobile_Detect.php';
$detect = new Mobile_Detect();

// Check for any mobile device.
if ($detect->isMobile()){
  print_r("is mobile");
}else{
  print_r("is not mobile");
}
*/
$detect = Yii::app()->mobileDetect;
// call methods
//$detect->isMobile();

$isMobile = $detect->isMobile();

?>

<?php if($isMobile):?>
  <style type="text/css">
    .floating{
      position: fixed;
      bottom: 0px;
      margin: 0 auto;
      width: 100%;
      z-index: 999;
    }
  </style>
  <div class="floating">
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> 
      <!-- 【SP】FB診断バナー(320×50) --> 
      <ins class="adsbygoogle" style="display:block;width:320px;height:50px;margin: 0 auto;" data-ad-client="ca-pub-5542247258727700" data-ad-slot="7289848089"></ins> 
      <script> (adsbygoogle = window.adsbygoogle || []).push({}); </script>
  </div>
<?php endif;?>

  <script type="text/javascript">
    $(window).scroll(function() {
      if($(window).scrollTop() + $(window).height() == $(document).height()) {
        console.log("bottom");
        $('.floating').attr('style','top:0px !important;');
      }else{
        console.log("moving up");
        $('.floating').attr('style','bottom:0px !important;');
      }
    });
  </script>

</header>

<?php echo $content; ?>

<div class="recommend">
  <h1><img src="/assets/img/reco.png" alt="オススメ"></h1>
  <ul class=>
  <?php 
  $criteria = new CDbCriteria();
  $criteria->condition = 'is_publish = 1';
  $criteria->order = 'count_today,count_month, count DESC';
  $criteria->limit = 3;
  $recommend = Questions::model()->findAll($criteria); ?>
  <?php foreach ($recommend as $key => $item) { ?>

  <li><a href="<?php echo $this->createUrl('/home/question',array('id' => $item->id)) ?>"><?php echo $item->title ?></a></li>

  <?php } ?>

  </ul>
</div>
</div>
  
<?php if($isMobile):?>
<script type="text/javascript">
  var nend_params = {"media":14389,"site":67198,"spot":156550,"type":1,"oriented":1,"ad_num":4,"space":1,"align":1,"tdisplay":2,"tcolor":"%23000000","width":57,"height":57};
</script>
<script type="text/javascript" src="http://js1.nend.net/js/nendAdLoader.js"></script>
<?php endif; ?>

<footer>

<!-- i-mobile for PC client script -->
<script type="text/javascript">
    imobile_pid = "27475"; 
    imobile_asid = "208736"; 
    imobile_width = 300; 
    imobile_height = 250;
</script>
<script type="text/javascript" src="http://spdeliver.i-mobile.co.jp/script/ads.js?20101001"></script>


<p><a href="<?php echo $this->createUrl('/privacy') ?>">プライバシーポリシーはこちら</a></p>
<p><small>Copyright © ただいま診断中！おもしろアプリ All Rights Reserved.</small></p>
</footer>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47261439-3', 'bestfbapp.net');
  ga('send', 'pageview');

</script>

</body>
</html>