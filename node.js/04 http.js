//1 加载http模块
var http=require('http');
//2 使用http.creatServer()方法创建一个 web服务器
//返回一个web实例
var server=http.createServer();


server.on('request',function () {
    console.log('收到客户端的请求');
});


server.listen(3000,function () {
    console.log("服务器启动成功，可以通过http://127.0.0.1:3000来访问");
});