var http=require('http');

var server=http.createServer();

server.on("request",function (req,res) {
     res.setHeader('Content-Type','text/plain;charset=utf-8');
    res.end("hello 世界");
});
server.listen(3000,function () {
    console.log("server is running,可以通过http://127.0.0.1:3000来访问");
});