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
      text-align: center;
    }
    #is {
      font-size: 150%
    }
    body {
      position: relative;
      height: 100%;
      overflow: hidden
    }
    #glorious {font-size: 400%}
    @media (min-width: 500px) {
      #glorious {font-size: 500%}
    }
  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div id="mainbox">
<span id="is"><?php echo $name; ?> is</span><br/>
<span id="glorious">GLORIOUS</span>
</div>
</body>
</html>
