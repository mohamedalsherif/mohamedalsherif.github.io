<?php include_once 'php/data.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<?php include_once 'php/header.php';?>
<body margin: 0pt;>
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



  <?php include_once 'php/photoSwipe.php';?>
  <?php include_once 'php/socialNetworks.php';?>

  <?php include 'pages/titleInHome.php';?>
  <div style="text-align: center;
vertical-align: middle;line-height: 90px; font-size:0.8em;font-weight: lighter;
    letter-spacing: 0.1em;     font-family: 'Open Sans', sans-serif;" id="tempPage">
    <p> We are currently in maintenance and will be running again very soon.</p>
    <p> You can see the <a style="float: none;" href="https://www.facebook.com/Nourine-Hammad-1413192872293705/">Facebook</a>
      page and follow me on <a style="float: none;" href="https://www.instagram.com/nourinehammadart/">Instagram</a>
  </div>
</body>
</html>
