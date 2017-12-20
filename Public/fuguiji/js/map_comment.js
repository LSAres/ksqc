$(function () {
    /**
     *
     * 点击屏幕生成光圈*/
    var clickPoint_X;       //接受点击的X坐标
    var clickPoint_Y;       //接受点击的Y坐标
    /*点击时 记录点击坐标*/
    function get_touchStartPoint(event) {
        var e = event || window.event;
        var touchedPoint = e.touches[0];        //获取噗屏幕点击的坐标
        clickPoint_X = touchedPoint.pageX;      //提取 点击X坐标
        clickPoint_Y = touchedPoint.pageY;      //提取点击Y坐标
    }

    /*手指抬起时 生成光圈*/
    function touchEndAppend(event) {
        var clickCreat;
        clickCreat = document.createElement('div');     //声明要创建的节点
        var elmentWidthAndHeight = 1;
        clickCreat.className = 'cteatElement';                          //指定样式类
        clickCreat.style.width = elmentWidthAndHeight + 'px';
        clickCreat.style.height = elmentWidthAndHeight + 'px';
        clickCreat.style.top = clickPoint_Y + 'px';
        clickCreat.style.left = clickPoint_X + 'px';
        clickCreat.style.zIndex = '1000000';
        var elmentChange = setInterval(function () {                     //循环增加宽高
            elmentWidthAndHeight++;
            clickCreat.style.width = elmentWidthAndHeight + 'px';
            clickCreat.style.height = elmentWidthAndHeight + 'px';
        }, 20);

        document.getElementsByTagName('body')[0].appendChild(clickCreat);       //为body添加生成的节点
        setTimeout(function () {
            clearInterval(elmentChange);
            document.getElementsByTagName('body')[0].removeChild(clickCreat);   //500毫秒后移除生成的节点
        }, 500)
    }

    window.addEventListener('touchstart', get_touchStartPoint);      //添加屏幕触摸方法
    window.addEventListener('touchend', touchEndAppend);             //添加手指抬起方法
    /**飘动云彩*/
    var cloud_1 = new Image();


});
