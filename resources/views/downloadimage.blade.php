<h3>Загрузите ваше изображение</h3>

<form id="form" enctype="multipart/form-data" action="{{ route('downloadfile') }}" method="post">

    <input id="img-name" class="btn btn-default btn-lg" type="file" name="img" />
    <input class="" type="submit" name="saveNew" value="Загрузить"/>

</form>

<div id="content"></div>

<div id="images">
    @if($images_user != '')
        @foreach($images_user as $img)

            <div style="height: 100px; width: auto; float: left; margin: 3px;"><img style="height: 100px; width: auto" src="/path/{{ $img['name_image'] }}" alt="" /></div>
        @endforeach
    @endif

</div>
<div style="clear: both"></div>
<div>
    @if($errors->all())
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
</div>

<script>
  /*  (function () {

        window.onload = function() {

            var form = document.getElementById('form');
            form.onsubmit = function(e){

                e.preventDefault();
                var data = "img=" + encodeURIComponent(document.getElementById('img-name').value);

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send(data);

                xhr.onreadystatechange = function(){
                    //alert(xhr.responseText);
                    //console.log( xhr.responseText );
                    document.getElementById('content').innerHTML = xhr.responseText;
                    //document.getElementsByClassName('commentsBlock')[0].innerHTML = xhr.responseText;
                }

            }
        }
    })();*/
</script>
