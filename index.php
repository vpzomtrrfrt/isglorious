<?php
  $name = "Everyone";
  $host = $_SERVER['HTTP_HOST'];
  if($host) {
    $ind = strpos($host, ".is");
    if($ind !== false) {
      $name = substr($host, 0, $ind);
      $di = -1;
      do {
        $newname = "";
        if($di > -1) {
          $newname .= substr($name, 0, $di)." ";
        }
        $newname .= strtoupper(substr($name, $di+1, 1)).substr($name, $di+2);
        $name = $newname;
        $di = strpos($name, "-");
      } while($di > -1);
    }
  }
?>
<html>
<head>
  <title>GLORY</title>
  <style type="text/css">
    #mainbox {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
      text-align: center
    }
    body {
      position: relative;
      height: 100%;
      overflow: hidden
    }
  </style>
</head>
<body>
<div id="mainbox">
<?php echo $name; ?> is<br/>
<span style="font-size: 500%">GLORIOUS</span>
</div>
</body>
</html>
