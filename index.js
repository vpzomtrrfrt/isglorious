const filedata = `<html>
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
{{NAME}} is<br/>
<span style="font-size: 500%">GLORIOUS</span>
</div>
</body>
</html>
`;

addEventListener("fetch", evt => {
	const req = evt.request;

	let name = "Everyone";
	let host = req.headers.get("host");
	if(host) {
		const ind = host.lastIndexOf(".is");
		if(ind > -1) {
			name = host.substring(0, ind);
			let di = -1;
			while(true) {
				let newname = "";
				if(di > -1) {
					newname = name.substring(0, di)+" ";
				}
				newname += name[di+1].toUpperCase()+name.substring(di+2);
				name = newname;
				di = name.indexOf("-");
				if(di < 0) {
					break;
				}
			}
		}
	}

	evt.respondWith(new Response(
		filedata.replace("{{NAME}}", name),
		{headers: {"Content-type": "text/html"}},
	));
});
