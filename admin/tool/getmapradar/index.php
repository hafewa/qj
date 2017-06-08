<?php
require_once(dirname(__FILE__) . "/../../config.php");
$mydb = new MySql();
$scenesql = "SELECT * FROM `#@__pano_scene` WHERE `pid` = $pid and `rank`=$rank";
$scenerow = $mydb->getOne($scenesql);
$id = $scenerow['id'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>获取南向</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css"> 
            html {height: 100%;overflow: hidden;}
            #vrpano {height: 100%;}
            body {height: 100%;margin: 0;padding: 0;background-color: #fff;}
        </style>
        <script type="text/javascript" src="../../js/jquery.js"></script>
        <script type="text/javascript">
            function back(h,v){
                opener.getradardata(h,"<?php echo $rank; ?>");
                window.close();
            }
        </script>
    </head>
    <body>
        <div id="vrpano">
        </div>
        <script type="text/javascript" src="<?php echo $cmspath; ?>/vrpano/vrpano<?php echo $scenerow['pid']; ?>/swfkrpano.js"></script>
        <script type="text/javascript">
            embedpano({swf: "<?php echo $cmspath; ?>/vrpano/vrpano<?php echo $scenerow['pid']; ?>/krpano.swf", xml: "xml.php?id=<?php echo $id; ?>", target: "vrpano", html5: "auto", passQueryParameters: true, wmode: "transparent"});
        </script>
    </body>
</html>
