<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>浏览相册</title>
</head>

<body>
    <h2>浏览相册</h2>

    <?php $dir = "images/"; $images = scandir($dir);?>
    <ul>
        @foreach($images as $eachImage)
            @if($eachImage=="." || $eachImage=="..")
                @continue;
            @endif

            <li>
                <a href="{{$dir . $eachImage}}" title="{{basename($eachImage, '.png')}}" onclick="showPicture(this); return false;" >{{basename($eachImage, '.png')}}</a>
            </li>
        @endforeach
    </ul>



    <div class="picture">
        <img src="images/我的图片.png" id="display"/>
        <div class="description">
            <p>数目</p>
            <p>选择图片</p>
        </div>
    </div>
</body>

<script>
    //两个地方都需要return false才能阻止a的默认行为,而且一旦发生异常，仍会触发默认行为
    //firstChild和lastChild和childNodes会包含多种元素，如p text等
    function showPicture(selectedPicObj) {
        //换图片
        var seletedSrc = selectedPicObj.getAttribute('href');
        var display = document.getElementById("display");
        display.setAttribute("src", seletedSrc);

        //换文字内容
        var selectedTitle = selectedPicObj.getAttribute("title");
        var displayElements = document.getElementsByClassName("description")[0].childNodes;
        var text = [];
        var index = 0;
        displayElements.forEach(function (one) {
            if (one.nodeType == 1) {//元素节点
                text[index] = one;
                ++index;
            }
        });

        text[1].innerText = selectedTitle;


        return false;
    }
</script>

</html>