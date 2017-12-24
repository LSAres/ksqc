$(function () {
    /*点击返回上一层*/
    $('.backButton').click(function(){
        history.back();
    });
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
    function touchMove (event){
        var e = event || window.event;
        var touchedPoint = e.touches[0];        //获取噗屏幕点击的坐标
        clickPoint_X = touchedPoint.pageX;      //提取 点击X坐标
        clickPoint_Y = touchedPoint.pageY;      //提取点击Y坐标
        // var clickCreat;
        // clickCreat = document.createElement('div');     //声明要创建的节点
        // var elmentWidthAndHeight = 1;
        // clickCreat.className = 'cteatElement';                          //指定样式类
        // clickCreat.style.width = elmentWidthAndHeight + 'px';
        // clickCreat.style.height = elmentWidthAndHeight + 'px';
        // clickCreat.style.top = clickPoint_Y + 'px';
        // clickCreat.style.left = clickPoint_X + 'px';
        // clickCreat.style.zIndex = '1000000';
        // var elmentChange = setInterval(function () {                     //循环增加宽高
        //     elmentWidthAndHeight++;
        //     clickCreat.style.width = elmentWidthAndHeight + 'px';
        //     clickCreat.style.height = elmentWidthAndHeight + 'px';
        // }, 20);
        //
        // document.getElementsByTagName('body')[0].appendChild(clickCreat);       //为body添加生成的节点
        // setTimeout(function () {
        //     clearInterval(elmentChange);
        //     document.getElementsByTagName('body')[0].removeChild(clickCreat);   //500毫秒后移除生成的节点
        // }, 500)
    }
    /*手指抬起时 生成光圈*/
    function touchEndAppend(event) {
       setTimeout(function(){
           var clickCreat;
           clickCreat = document.createElement('div');     //声明要创建的节点
           var elmentWidthAndHeight = 10;                   //节点的初始宽高
           var elmentOpcity = .9;                           //节点的初始透明度
           clickCreat.className = 'cteatElement';                          //指定样式类
           clickCreat.style.width = elmentWidthAndHeight + 'px';
           clickCreat.style.height = elmentWidthAndHeight + 'px';
           clickCreat.style.boxShadow = '0 0 25px  rgb(168, 176, 181) 0px 0px 25px';
           clickCreat.style.background = 'radial-gradient(rgb(141, 185, 214), rgb(76, 165, 210), rgb(22, 116, 165))';
           clickCreat.style.opacity = elmentOpcity;
           clickCreat.style.top = clickPoint_Y + 'px';
           clickCreat.style.left = clickPoint_X + 'px';
           clickCreat.style.zIndex = '1000000';
           var elmentChange = setInterval(function () {                     //循环增加宽高
               elmentWidthAndHeight++;
               elmentOpcity -= 0.02;
               clickCreat.style.opacity = elmentOpcity;
               clickCreat.style.width = elmentWidthAndHeight + 'px';
               clickCreat.style.height = elmentWidthAndHeight + 'px';
           }, 20);

           document.getElementsByTagName('body')[0].appendChild(clickCreat);       //为body添加生成的节点
           setTimeout(function () {
               clearInterval(elmentChange);
               document.getElementsByTagName('body')[0].removeChild(clickCreat);   //500毫秒后移除生成的节点
           }, 800);
       },500);
    }

    window.addEventListener('touchstart', get_touchStartPoint);      //添加屏幕触摸方法
    window.addEventListener('touchmove', touchMove);      //添加屏幕触摸方法
    window.addEventListener('touchend', touchEndAppend);             //添加手指抬起方法

    /**飘动云彩*/

    function createCloud_1 (){
        var cloud_1 = new Image();
        var leftNum = 800;
        cloud_1.src = document.getElementById('cloud_1').getAttribute('src');
        cloud_1.className = 'cloud';
        cloud_1.style.left = leftNum + 'px';
        document.getElementsByClassName('mapDiv')[0].appendChild(cloud_1);
        var cloud_1_Move = setInterval(function(){
            cloud_1.style.left = (leftNum--)  + 'px';
            if( leftNum <= -200 ){
                leftNum = 800;
            }
        },50);
    }
    function createCloud_2 (){
        var cloud_1 = new Image();
        var leftNum = 800;
        cloud_1.src = document.getElementById('cloud_2').getAttribute('src');
        cloud_1.className = 'cloud';
        cloud_1.style.left = leftNum + 'px';
        cloud_1.style.top = 25 + '%';
        document.getElementsByClassName('mapDiv')[0].appendChild(cloud_1);
        var cloud_2_Move = setInterval(function(){
            cloud_1.style.left = (leftNum--)  + 'px';
            if( leftNum <= -200 ){
                leftNum = 800;
            }
        },60);
    }
    function createCloud_3 (){
        var cloud_1 = new Image();
        var leftNum = 800;
        cloud_1.src = document.getElementById('cloud_3').getAttribute('src');
        cloud_1.className = 'cloud';
        cloud_1.style.left = leftNum + 'px';
        cloud_1.style.top = 55 + '%';
        document.getElementsByClassName('mapDiv')[0].appendChild(cloud_1);
        var cloud_3_Move = setInterval(function(){
            cloud_1.style.left = (leftNum--)  + 'px';
            if( leftNum <= -200 ){
                leftNum = 800;
            }
        },20);
    }
    function createCloud_4 (){
        var cloud_1 = new Image();
        var leftNum = 800;
        cloud_1.src = document.getElementById('cloud_1').getAttribute('src');
        cloud_1.className = 'cloud';
        cloud_1.style.left = leftNum + 'px';
        cloud_1.style.top = 90 + '%';
        document.getElementsByClassName('mapDiv')[0].appendChild(cloud_1);
        var cloud_4_Move = setInterval(function(){
            cloud_1.style.left = (leftNum--)  + 'px';
            if( leftNum <= -200 ){
                leftNum = 800;
            }
        },40);
    }
    createCloud_1();
    createCloud_2();
    createCloud_3();
    createCloud_4();




});
