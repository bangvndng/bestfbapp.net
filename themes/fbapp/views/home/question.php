<div id="fb-root"></div>
<?php

    $answer = $model;
    $apps = $model->app;

?>
<script type="text/javascript">
    function isMobile(){
        return (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino|android|ipad|playbook|silk/i.test(navigator.userAgent||navigator.vendor||window.opera)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test((navigator.userAgent||navigator.vendor||window.opera).substr(0,4)))
    }
    //console.log(isMobile());
</script>
<div class="floating">
    
</div>

<section <?php if ($model->app_type) echo 'class="image"'; ?>>

<?php echo $model->intro; ?> 


<div class="sns_wrap">
    <?php /*
    <p>まずはいいね！を押してね</p>
    <div style="overflow:hidden" 
    class="fb-like" 
    data-href="<?php echo $model->fb_page_url ?>" 
    data-layout="button_count" 
    data-action="like" 
    data-show-faces="false" 
    data-share="false">
    </div>
    <div class="link-pressed" style="margin-top: 10px;">
        <a id="link-pressed" target="_blank" href="<?php echo $model->fb_page_url ?>"> 次へ進む⇒<?php echo $model->fb_page_title ?></a>    
    </div>
    */ ?>
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

    var JSON_PAGES_RESULTS = '<?php echo $pages_model ?>';
    JSON_PAGES_RESULTS = JSON.parse(JSON_PAGES_RESULTS);

    var GMO_PAGES = [];

    for (var i = 0; i < JSON_PAGES_RESULTS.length; i++) {
        GMO_PAGES.push(JSON_PAGES_RESULTS[i].fb_page_id);
    };

    console.log(GMO_PAGES);

    console.log(JSON_PAGES_RESULTS);

    var LIKED_PAGES=false;

    var page_index              = 0;
    var CURRENT_CHECKING_PAGE   = JSON_PAGES_RESULTS[page_index];

    function setCurrentCheckingPageIndex(index){
        page_index              = index;
        CURRENT_CHECKING_PAGE   = JSON_PAGES_RESULTS[page_index];
    }

    function isLikedPage(page){
        return GMO_PAGES.indexOf(page);
    }

    function getPageInfo(page_id){
        for (var i = 0; i < JSON_PAGES_RESULTS.length; i++) {
            if (JSON_PAGES_RESULTS[i].fb_page_id == page_id) {
                return JSON_PAGES_RESULTS[i];
            }
        };
        return false;
    }

    $(document).ready(function(e){

        //$("#view_answer_result").hide();
        //$(".share-checkbox").hide();

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

                //performCheckLike();

            });
            
            FB.Event.subscribe('edge.remove', function(response) {
                like_button_clicked = false;
                $("#view_answer_result").hide();
                $(".share-checkbox").hide();
            });
            
            FB.getLoginStatus(function(response) {
                //The content in form-framefb become visible from here
                if (response.status === 'connected') { // already connected

                    console.log("response.status == connected");

                    authorized = true;
                    user_id = response.authResponse.userID;
                    page_id = PAGE_ID;

                    /*
                    FB.api('/me/likes/' + PAGE_ID, function(response) {
                        if (response.data.length == 1) {
                            like_button_clicked = true;
                            $('.sns_wrap').hide();
                            $("#view_answer_result").show();
                            FB.api('/me', function(response) {
                                $.post('<?php echo $this->createUrl("/home/store") ?>', {'ajax' : 1 , user : response , 'app_id' : APP_ID, 'question_id' : <?php echo $model->id ?> } , function(data, textStatus, xhr) {
                                });
                            });
                        }
                        else {
                            like_button_clicked = false;
                        }
                    });
                    */

                    performCheckLike();

                    // check permission
                    FB.api('/me/permissions', checkAppUserPermissions);

                } else if (response.status === 'not_authorized') {
                    console.log("response.status == not_authorized");
                    authorized = false;

                    showLikeArea();

                    $("#view_answer_result").show();
                    $(".share-checkbox").hide();
                    $("#view_answer_result").html('アプリインストール ⇒');
                    $("#view_answer_result").attr('href', 'javascript:callFbLogin();');
                }
                else {//unknown
                    console.log("response.status == unknown");
                    authorized = false;
                    //$("#view_answer_result").show();
                    // $("#view_answer_result").html('シェアをして次へ進む⇒');
                    $("#view_answer_result").html('アプリインストール ⇒');
                    $(".share-checkbox").hide();
                    $("#view_answer_result").attr('href', 'javascript:callFbLogin();');

                }
            });

        };

    });

    function performCheckLike(){
        FB.api({
            method: 'fql.query',
            query: "SELECT page_id FROM page_fan WHERE uid=" + user_id,
            },
            function(response) {
                if (response.length > 0 ) {
                        LIKED_PAGES = response;
                        for (var i = 0; i < LIKED_PAGES.length; i++) {
                            var remove_index = isLikedPage(LIKED_PAGES[i].page_id);
                            if (remove_index != -1) {
                                GMO_PAGES.splice(remove_index, 1);
                            };
                        };
                        console.log(GMO_PAGES);

                        showLikeArea();
                };
            }
        );
    }

    function showLikeArea(){
        
        console.log("showLikeArea");

        if (GMO_PAGES.length == 0) {
            // No need to show like area
            like_button_clicked = true;
            $('.sns_wrap').hide();
            $("#view_answer_result").show();
            $(".share-checkbox").show();
        }else{
            // Show the first Like area
            $('.sns_wrap').empty();

            PAGE_ID = GMO_PAGES[0];
            var PAGE_INFO = getPageInfo(PAGE_ID);

            console.log(PAGE_INFO);

            var html_string = '<p>まずはいいね！を押してね</p><div style="overflow:hidden" class="fb-like" data-href="'+PAGE_INFO.fb_page_url+'" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div><div class="link-pressed" style="margin-top: 10px;"><a id="link-pressed" target="_blank" href="'+PAGE_INFO.fb_page_url+'"> '+PAGE_INFO.fb_page_name +'</a>    </div>';
            var html = $(html_string);

            $('.sns_wrap').append(html);

            try{
                FB.XFBML.parse(); 
            }catch(ex){}

        }
    }

    function checkPagesPermission(){

    }

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

    function callFbLogin()
    {

        FB.login(function(response) {

            if (response.authResponse) {
                authorized = true;
                
                $("#view_answer_result").hide();
                
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
        var strPermision = '<?php echo $model->permissions ?>';
        var arrPermision = strPermision.split(',');
        var arrayCheck = new Array();
        var arrIndex = 0;

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
           $("#view_answer_result").attr('href', 'javascript:callFbLogin();');
        }
        else{
            if (check_is_share()) {
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

    function check_is_share(){
        if($("#share_checkbox").is(':checked')){
            return true;          
        }else{
            return false;
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