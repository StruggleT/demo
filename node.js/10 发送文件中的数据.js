var http = require('http');

var fs = require('fs');


var server = http.createServer();

server.on('request', function (req, res) {
    var url = req.url;

    if (url === '/') {
        fs.readFile('./resource/index.html', function (err, data) {
            if (err) {
                res.setHeader('Content-Type', 'text/plain;charset=utf-8');
                res.end("文件加载失败，请重新加载");
            } else {
                res.setHeader("Content-Type", 'text/html;charset=utf-8');
                res.end(data);
            }
        });
    }
    else  if (url==='/css'){
        fs.readFile('./resource/index.css', function (err, data) {
            if (err) {
                res.setHeader('Content-Type', 'text/plain;charset=utf-8');
                res.end("文件加载失败，请重新加载");
            } else {
                res.setHeader("Content-Type", 'text/html;charset=utf-8');
                res.end(data);
            }
        });
    }
    else  if (url==='/ad'){
        fs.readFile('./resource/banner.jpg', function (err, data) {
            if (err) {
                res.setHeader('Content-Type', 'text/plain;charset=utf-8');
                res.end("文件加载失败，请重新加载");
            } else {
                res.setHeader("Content-Type", 'image/jpeg');
                res.end(data);
            }
        });
    }
});

server.listen(3000, function () {
    console.log("server is running,可以通过http://127.0.0.1:3000来访问");
});