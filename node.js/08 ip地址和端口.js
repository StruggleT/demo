var http=require('http');
//2 使用http.creatServer()方法创建一个 web服务器
//返回一个web实例
var server=http.createServer();

server.on('request',function (request,response) {

    // console.log('收到客户端的请求,请求路径是：'+request.url);
    var url=request.url;
    if (url==='/'){
        response.end("index page");
    }
    else if (url==='/login'){
        response.end("login page");
    }

    else {
        response.end("404 NOT Found");
    }

});


server.listen(3000,function () {
    console.log("服务器启动成功，可以通过http://127.0.0.1:3000来访问");
});