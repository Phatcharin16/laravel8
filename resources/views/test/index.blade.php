<html>

<body>
    <h1>Gallery of Phatcharin 64222420016</h1>
    {{--<a href="http://127.0.0.1:8000/gallery/ant"> ant <img src="{{ $ant }}" style="height:120px;margin:2px;">
    <a href="http://127.0.0.1:8000/gallery/bird"> bird <img src="{{ $bird }}" style="height:120px;margin:2px;">
        <a href="http://127.0.0.1:8000/gallery/cat"> cat <img src="{{ $cat }}" style="height:120px;margin:2px;"> --}}

            <a href="{{ url('/newgallery/ant') }}">ant<img src="{{$ant}}" style="height:120px;margin:2px;">
                <a href="{{ url('/newgallery/bird') }}">bird<img src="{{$bird}}" style="height:120px;margin:2px;">
                    <a href="{{ url('/newgallery/cat') }}">cat<img src="{{$cat}}" style="height:120px;margin:2px;">
</body>

</html>