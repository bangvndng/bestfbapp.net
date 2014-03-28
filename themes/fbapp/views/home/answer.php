<div id="fb-root"></div>
<?php
$apps = $model->app;

 ?>

<section>
<?php if (!$model->app_type) { ?>
<h1><?php echo $model->title ?></h1>
<?php } ?>

<?php 
if ($model->app_type) {
    echo $model->anwser_result;
}
else
    echo  $model->currentResult ;
  ?>
<p style='margin-top: 20px' class="result"> <a id="view_answer_result"   target="_top" href="/"> アプリ一覧を見る</a></p>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 【SP】FB診断レクタングルバナー(シェア直下) -->
<ins class="adsbygoogle"
     style="display:block;width:300px;height:250px;margin:0 auto;"
     data-ad-client="ca-pub-5542247258727700"
     data-ad-slot="1914625681"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

</section>
<?php //print_r($apps); ?>
<?php //print_r($model); die;?>
<script type="text/javascript">

    $(document).ready(function(){
        $("#view_answer_result").hide();
    });

    var shared      = false;
    var is_shared   = <?php echo isset($_GET['share'])? "true" : "false"; ?>;
    var authorized  = false;
    var APP_ID      = '<?php echo $apps->fb_app_id ?>';
    var PAGE_ID     = '<?php echo $model->fb_page_id ?>';
    var user_id     = 0;
    window.fbAsyncInit = function() {
        FB.init({
            appId: APP_ID, // App ID
            status: true, // check login status
            cookie: true, // enable cookies to allow the server to access the session
            xfbml: true, // parse XFBML
            oauth: true
        });

        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') { 
                // already connected
                user_id = response.authResponse.userID;

                
                FB.api('/me/permissions', function(responsePermission){

                    var strPermision = '<?php echo $model->permissions ?>';
                    var arrPermision = strPermision.split(',');
                    var arrayCheck = new Array();
                    var arrIndex = 0;

                    console.log(arrPermision);
                    console.log(responsePermission.data);

                    // if (response.data[0].length > 0) {
                        $.each(responsePermission.data[0], function(index, value) {
                            arrayCheck[arrIndex++] = index;
                        }); 
                    // };
                    
                    

                    var isEnoughPermission = true;
                    for (var i = 0; i < arrPermision.length; i++) {
                        if ($.inArray(arrPermision[i], arrayCheck) == -1 ) {
                            isEnoughPermission = false;
                            break;
                        };
                    }

                    if (!isEnoughPermission){
                        console.log("not isEnoughPermission");
                        $("#view_answer_result").show();
                    }else{

                        FB.api('/me', function(response) {
                            $.post('<?php echo $this->createUrl("/home/store") ?>', {'ajax' : 1 , 'finish' :1, 'share' : <?php echo $share ?> , 'user' : response , 'app_id' : APP_ID, 'question_id' : <?php echo $model->id ?> } , function(data, textStatus, xhr) {
                                });
                        });
                        
                        //var url = encodeURIComponent("<?php echo $this->createAbsoluteUrl('/home/question?id='. $model->id) ?>");
                        var url = "<?php echo $this->createAbsoluteUrl('/home/question?id='. $model->id) ?>";

                        var feed = {
                            // method: 'feed',
                            link: url,
                            // picture: data.image,
                            // name: "test",
                            // caption: "test",
                            // description: "test",
                            // message: url
                        }

                        if (is_shared) {
                            FB.api('/me/feed', 'post', feed, function(res){
                                $("#view_answer_result").show();
                            }); 
                        }else{
                            $("#view_answer_result").show();
                        }
                        console.log("isEnoughPermission");
                    }

                });

                
                /*                
                var fql_query = 'SELECT permalink,action_links FROM stream WHERE source_id = me() and message ="'+url+'"';
                FB.api({
                    method: 'fql.query',
                    query: fql_query,
                }, function(res){
                    if (res && res.length > 0) {

                        $("#view_answer_result").show();

                    }else{
                        FB.api('/me/feed', 'post', feed, function(res){
                            $("#view_answer_result").show();
                        }); 
                    }
                }); 
                */  
            }
        });

    };

    (function(d, debug) {
        var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement('script');
        js.id = id;
        js.async = true;
        js.src = "//connect.facebook.net/ja_JP/all" + (debug ? "/debug" : "") + ".js";
        ref.parentNode.insertBefore(js, ref);
    }(document, /*debug*/false));

</script>