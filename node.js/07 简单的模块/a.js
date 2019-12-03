var fs=require('fs');
fs.readFile('./a.js',function (error,data) {
    if (error){
        console.log('读取文件错误');
    }
    else {
        console.log(data.toString());
    }
});
console.log("start a");
var aExports=require('./b.js');
console.log(aExports.add(10,30));

console.log("end a");
