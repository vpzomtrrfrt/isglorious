var http = require('http');
var fs = require('fs');

var filedata = "Try again later";
fs.readFile("./index.html", function(err, data) {
	if(err) {
		console.error(err);
		process.exit(-1);
		return;
	}
	filedata = data.toString();
});

http.createServer(function(req, res) {
	var name = "Everyone";
	if(req.headers.host) {
		var ind = req.headers.host.lastIndexOf(".is");
		if(ind > -1) {
			name = req.headers.host.substring(0, ind);
			var di = -1;
			while(true) {
				var newname = "";
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
	res.writeHead(200, {"Content-type": "text/html"});
	res.write(filedata.replace("{{NAME}}", name));
	res.end();
}).listen(process.env.PORT || 4444);
