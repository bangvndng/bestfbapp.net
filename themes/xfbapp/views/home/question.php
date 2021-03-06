<div id="fb-root"></div>
<?php

    $answer = $model;
    $apps = $model->app;
 ?>

<section <?php if ($model->app_type) echo 'class="image"'; ?>>

<?php echo $model->intro; ?> 


<div class="sns_wrap">
    <p>まずはいいね！を押してね</p>
        <div style='overflow:hidden' class="fb-like" data-href="<?php echo $model->fb_page_url ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
    <div class="link-pressed" style='margin-top: 10px;'>
        <a id="link-pressed" target="_blank" href="<?php echo $model->fb_page_url ?>"> <?php echo $model->fb_page_title ?></a>    
    </div>

</div>
<p class="result"> <a id="view_answer_result"   target="_top" href="#"> <?php if ($model->app_type) echo '次へ進む⇒'; else echo '次へ進む⇒';?></a></p>
<div class="share-checkbox" id="share_div" style="display: block;"><input type="checkbox" checked="true" id="share_checkbox"> <label for="share_checkbox"><span class="my-checkbox my-checkbox-active"></span> 結果をシェアする</label></div>

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

<script type="text/javascript">
    var like_button_clicked     = false;
    var is_share                = true;
    var authorized              = false;
    var APP_ID                  = '<?php echo $apps->fb_app_id ?>';
    var PAGE_ID                 = '<?php echo $model->fb_page_id ?>';
    var user_id                 = 0;

    $(document).ready(function(e){

        $("#view_answer_result").hide();
        $(".share-checkbox").hide();

        window.fbAsyncInit = function() {
            FB.init({
                appId: APP_ID, // App ID
                status: true, // check login status
                cookie: true, // enable cookies to allow the server to access the session
                xfbml: true, // parse XFBML
                oauth: true
            });

            FB.Event.subscribe('edge.create', function(response1) {
                like_button_clicked = true;
                $("#view_answer_result").show();
                $(".share-checkbox").show();
                FB.api('/me', function(response) {
                    $.post('<?php echo $this->createUrl("/home/store") ?>', {'ajax' : 1 , user : response , 'app_id' : APP_ID, 'question_id' : <?php echo $model->id ?> } , function(data, textStatus, xhr) {
                    });
                });
            });
            
            FB.Event.subscribe('edge.remove', function(response) {
                like_button_clicked = false;
                $("#view_answer_result").hide();
                $(".share-checkbox").hide();
            });
            
            FB.getLoginStatus(function(response) {
                //The content in form-framefb become visible from here
                if (response.status === 'connected') { // already connected

                    authorized = true;
                    user_id = response.authResponse.userID;
                    page_id = PAGE_ID;

                    FB.api('/me/likes/' + PAGE_ID, function(response) {
                        if (response.data.length == 1) {
                            like_button_clicked = true;
                            $('.sns_wrap').hide();
                            $("#view_answer_result").show();
                            $(".share-checkbox").show();
                            FB.api('/me', function(response) {
                                $.post('<?php echo $this->createUrl("/home/store") ?>', {'ajax' : 1 , user : response , 'app_id' : APP_ID, 'question_id' : <?php echo $model->id ?> } , function(data, textStatus, xhr) {
                                });
                            });
                        }
                        else {
                            like_button_clicked = false;
                        }
                    });

                    // check permission
                    FB.api('/me/permissions', checkAppUserPermissions);

                } else if (response.status === 'not_authorized') {
                    authorized = false;
                    $("#view_answer_result").show();
                    $(".share-checkbox").show();
                    $("#view_answer_result").html('アプリインストール ⇒');
                    $("#view_answer_result").attr('href', 'javascript:callFbLogin();');
                }
                else {//unknown
                    authorized = false;
                    //$("#view_answer_result").show();
                    // $("#view_answer_result").html('シェアをして次へ進む⇒');
                    $("#view_answer_result").html('アプリインストール ⇒');
                    $("#view_answer_result").attr('href', 'javascript:callFbLogin();');

                }
            });

        };

    });

    

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

    }(document, false));

    function check_is_share(){
        if($("#share_checkbox").is(':checked')){
            return true;          
        }else{
            return false;
        }
    }

    function callFbLogin()
    {

        FB.login(function(response) {

            if (response.authResponse) {
                authorized = true;
                
                $("#view_answer_result").hide();
                $(".share-checkbox").hide();
                
                FB.api('/me/likes/' + PAGE_ID, function(response) {
                    $("#view_answer_result").show();
                    $(".share-checkbox").show();

                    if (response.data.length == 1) {
                        like_button_clicked = true;

                        if (check_is_share()) {
                            $("#view_answer_result").attr('href', '<?php echo $this->createUrl("/home/answer?id=" . $answer->id . "&share=1") ?>');
                        }else{
                            $("#view_answer_result").attr('href', '<?php echo $this->createUrl("/home/answer?id=" . $answer->id ) ?>');
                        }

                        FB.api('/me', function(response) {
                            $.post('<?php echo $this->createUrl("/home/store") ?>', {'ajax' : 1 , user : response , 'app_id' : APP_ID, 'question_id' : <?php echo $model->id ?> } , function(data, textStatus, xhr) {
                            });
                        });

                    }else {
                        $("#view_answer_result").attr('href', 'javascript:checkLikePage();');
                        like_button_clicked = false;
                    }

                });

                /*
                FB.api('/me', function(response) {
                    $.post('<?php echo $this->createUrl("/home/store") ?>', {'ajax' : 1 , user : response , 'app_id' : APP_ID, 'question_id' : <?php echo $model->id ?> } , function(data, textStatus, xhr) {
                    });
                });
                */

           } else {
           }
        }, {scope: '<?php echo $model->permissions ?>'});
    }

    function checkAppUserPermissions(response) {

        console.log("checkAppUserPermissions");

        var strPermision = '<?php echo $model->permissions ?>';
        var arrPermision = strPermision.split(',');
        var arrayCheck = new Array();
        var arrIndex = 0;

        console.log(arrPermision);
        console.log(response.data);

        // if (response.data[0].length > 0) {
            $.each(response.data[0], function(index, value) {
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
            $("#view_answer_result").attr('href', 'javascript:callFbLogin();');
        }
        else{
            console.log("isEnoughPermission");
            if (check_is_share()){
                $("#view_answer_result").attr('href', '<?php echo $this->createUrl("/home/answer?id=" . $answer->id . "&share=1") ?>');
            }else{
                $("#view_answer_result").attr('href', '<?php echo $this->createUrl("/home/answer?id=" . $answer->id ) ?>');
            }
        }

        return false;
    };

    function checkLikePage()
    {
        if (authorized) {
            if (!like_button_clicked) {
                alert("いいね！を押してください");
                return false;
            }else{
                if (check_is_share()) {
                     window.location.href = '<?php echo $this->createUrl("/home/answer?id=" . $answer->id . "&share=1") ?>';
                }else{
                     window.location.href = '<?php echo $this->createUrl("/home/answer?id=" . $answer->id ) ?>';
                }
            }
        }
    }

    $(function() {
        $("#share_checkbox").change(function(){
            if($("#share_checkbox").is(':checked')){
                if (authorized && like_button_clicked) {
                    $("#view_answer_result").attr('href', '<?php echo $this->createUrl("/home/answer?id=" . $answer->id . "&share=1") ?>');
                }
            }else{
                if (authorized && like_button_clicked) {
                    $("#view_answer_result").attr('href', '<?php echo $this->createUrl("/home/answer?id=" . $answer->id ) ?>');
                }
            }
        });

        $('#view_answer_result').click(function(event) {
            if (authorized && !like_button_clicked) {
                alert("いいね！を押してください");
                return false;
            } 
        });
    });

</script>