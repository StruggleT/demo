//游戏对象
(function () {
    var that = null;

    function Game(map) {
        this.map = map;
        this.food = new Food();
        this.snake = new Snake();
        that = this;
    }

    Game.prototype.init = function () {
        this.food.init(this.map);
        this.snake.init(this.map);
        this.runSnake(this.food,this.map);
        this.bindKey();
    };
    Game.prototype.runSnake = function (food, map) {
        var timeId = setInterval(function () {
            this.snake.move(map, food);
            this.snake.init(map);
            var maxX = map.offsetWidth / this.snake.width;
            var maxY = map.offsetHeight / this.snake.height;
            var headX = this.snake.body[0].x;
            var headY = this.snake.body[0].y;
            if (headX < 0 || headX >= maxX || headY < 0 || headY >= maxY) {
                clearInterval(timeId);
                alert("game over");
            }
        }.bind(that), 300);
    };
    Game.prototype.bindKey = function () {
        document.onkeydown = function (e) {
            switch (e.keyCode) {
                case 39:
                    this.snake.direction = "right";
                    break;
                case 37:
                    this.snake.direction = "left";
                    break;
                case 38:
                    this.snake.direction = "top";
                    break;
                case 40:
                    this.snake.direction = "bottom";
                    break;
            }
        }.bind(that);
    };
    window.Game = Game;
}());