<?php
global $wpdb;
$table_name = $wpdb->prefix ."fplike";
global $wpdb;
$draft = $wpdb->get_row("SELECT * FROM $table_name WHERE id = 1");
$urlone = $draft->url;

$cvalue = 'set';
setcookie("cookie_fplike", $cvalue, time()+86400);  /* expire in 1 hour */
?>

<style>
.overlay{
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 10;
  background-color: rgba(0,0,0,0.5); /*dim the background*/
}

.addauth {
    min-width: 300px;
    min-height: 200px;
    position: fixed;
    top: 50%; 
    left: 50%;
    margin-top: -100px;
    margin-left: -150px;
    background-color: #fff;
    border-radius: 5px;
    text-align: center;
    z-index: 11; /* 1px higher than the overlay layer */
}
.close
{
float: right;
margin-right: 5px;
}
.top5
{
margin-top: 5px;
}

</style>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="overlay" id="slider">
<div class="addauth">
  <a href="#" class="close top5" onclick="closeregnew()"><img src="<?php echo plugins_url(); ?>/facebook_like_popup/images/close.png" alt="close"></a>
<!--<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fidilibrain&amp;width&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:258px;" allowTransparency="true"></iframe> -->
<div class="fb-like-box" data-href="<?php echo $urlone; ?>" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
</div>
</div>
<script>
function closeregnew()
    {
    document.getElementById('slider').style.display = "none";
    }
</script>