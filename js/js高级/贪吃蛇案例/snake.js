//小蛇对象
(function () {
    var element = [];

    //小蛇的构造函数
    function Snake(width, height, direction) {
        this.width = width || 20;
        this.height = height || 20;
        this.direction = direction || "right";
        this.body = [
            {x: 3, y: 2, color: "red"},
            {x: 2, y: 2, color: "yellow"},
            {x: 1, y: 2, color: "yellow"}];
    }

    //初始化小蛇
    Snake.prototype.init = function (map) {
        remove();
        for (var i = 0; i < this.body.length; i++) {
            var obj = this.body[i];
            var div = document.createElement("div");
            map.appendChild(div);
            div.style.position = "absolute";
            div.style.width = this.width + "px";
            div.style.height = this.height + "px";
            div.style.backgroundColor = obj.color;
            div.style.left = obj.x * this.width + "px";
            div.style.top = obj.y * this.height + "px";
            element.push(div);
        }
    };

    //为小蛇添加原型方法，让小蛇动起来
    Snake.prototype.move = function (map, food) {
        //蛇身体动起来
        var i = this.body.length - 1;
        for (; i > 0; i--) {
            this.body[i].x = this.body[i - 1].x;
            this.body[i].y = this.body[i - 1].y;
        }
        //蛇头控制移动的方向
        switch (this.direction) {
            case "right":
                this.body[0].x += 1;
                break;
            case "left":
                this.body[0].x -= 1;
                break;
            case "top":
                this.body[0].y -= 1;
                break;
            case "bottom":
                this.body[0].y += 1;
                break;
        }
        //判断蛇是否吃到食物
        var headerX = this.body[0].x * this.width;
        var headerY = this.body[0].y * this.height;
        if (headerX === food.x && headerY === food.y) {
            var last = this.body[this.body.length - 1];
            this.body.push({
                x: last.x,
                y: last.y,
                color: last.color
            });
            food.init(map);
        }
    };

    //清除蛇原来的蛇
    function remove() {
        var i = element.length - 1;
        for (; i >= 0; i--) {
            var ele = element[i];
            ele.parentNode.removeChild(ele);
            element.splice(i, 1);
        }
    }

    window.Snake = Snake;
}());