<!DOCTYPE html>
<html>
<head>
    <title>Website Pertama</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	<style>
*{

}
body {
    font-size: 14px;
    font-family: verdana;
    margin: 0px;
    padding: 0px;
}
#heading{
    float: left;
    width: 640px;
}
#heading a {
    line-height: 65px;
    text-decoration: none;
    padding-left: 60px;
    color:#FFF;
    font-family: aardvark cafe;
    font-size: 40px;
}
#menu {
    background:#26C4C2;
    width: 100%;
    height: 65px;
    margin: 0px;
    padding: 0px;

}
#menu ul {
    list-style: none;

}
#menu ul li {
    float: left;
    line-height: 65px
}
#menu ul li a {
    float:left;
    width:100px;
    display:block;
    text-align:center;
    color:#FFF;
    text-decoration:none;
}
#menu ul ul {
    display:none;
    list-style:none;
    position:absolute;
    background-color:#26C4C2;
    float: none;
    top:65px;
    width:190px;
}
#menu ul li a:hover {
    background-color:#2E9EA2;
    display:block;
}
#menu ul li:hover ul {
    display:block;
}
#menu ul ul li a {
    display:block;
    padding-left:30px;
    text-align:left;
    width:160px;
    height: 60px;
    line-height: 60px;
}
#menu ul ul li a:hover {
    color:#fff;
}
	</style>
</head>
<body>
<nav id="menu">
     <ul>
        <div id="heading">
            <a href="#">LoanWeb</a></li>
        </div>
        <li><a href="index.html">Beranda</a></li>
        <li><a href="artikel.html">Artikel</a></li>
        <li><a href="gambar.html">gambar</a></li>
        <li><a href="#">list</a>
            <ul>
                <li> <a href="ul.html">Tips Sukses (ul)</a></li>
                <li> <a href="ol.html">Cara Masak Mie (ol)</a></li>
            </ul>
        </li>
        <li><a href="table.html">Data</a></li>
        <li><a href="form.html">Form</a></li>
        <li><a href="#">Multimedia</a>
            <ul>
                <li><a href="audio.html">Audio</a></li>
                <li><a href="video.html">Video</a></li>
            </ul>
        </li>
    </ul>
</nav>
</html>
