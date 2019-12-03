var fs=require('fs');
fs.readFile('./date/a.txt',function (error,data) {
    if (error){
        console.log("读取文件错误");
        return;
    }
    console.log(data.toString());
});
