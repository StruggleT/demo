//产生食物对象
(function () {
    //定义一个数组用来存放食物div的
    var element = [];
    //获取地图对象
    var map = document.querySelector(".map");

    //食物的构造函数
    function Food(width, height, color, x, y) {
        //设置食物的属性（包括默认值）
        this.width = width || 20;
        this.height = height || 20;
        this.color = color || "green";
        this.x = x || 0;//横坐标随机产生的
        this.y = y || 0;//纵坐标随机产生的
    }

    //初始化小方块的显示的效果及位置---显示地图上
    Food.prototype.init = function (map) {
        //清除食物
        remove();
        //创建食物的div
        var div = document.createElement("div");
        //加入到地图中
        map.appendChild(div);
        //设置食物的属性
        div.style.width = this.width + "px";//食物的宽等于当前调用这个构造函数的实例对象的宽
        div.style.height = this.height + "px";
        div.style.backgroundColor = this.color;
        div.style.position = "absolute";
        this.render(map);//构造函数的原型中的方法可以互相访问
        console.log("hh");
        div.style.left = this.x + "px";
        div.style.top = this.y + "px";
        element.push(div);
    };
    //产生随机位置(呈现)
    Food.prototype.render = function (map) {
        this.x = parseInt(Math.random() * map.offsetWidth / this.width) * this.width;
        this.y = parseInt(Math.random() * map.offsetHeight / this.height) * this.height;
    };

    //清除食物（私有函数）
    function remove() {
        for (var i = 0; i < element.length; i++) {
            var ele = element[i];
            ele.parentNode.removeChild(ele);
            element.splice(i, 1);
        }
    }

    //把Food函数和map变量暴露在外面
    window.Food = Food;
    window.map = map;
}());