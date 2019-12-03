var fs=require('fs');
fs.writeFile('./date/你好>.md','大家好，我是node',function (error) {
    if (error){
        console.log("写入失败");
        return
    }
    console.log("文件执行成功")
});