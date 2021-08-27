<!DOCTYPE html>
<html>
<body>
<style>
ul.vertical {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 200px;
    background-color: #f1f1f1;
    list-style-type: none;
}
ul .ex {
  width: 90%;
}
ul.vertical li a {
    display: block;
    color: #000;
    padding: 8px 0 8px 16px;
    text-decoration: none;
}
ul.vertical a.active {
    background-color: #4CAF50;
    color: white;
}
ul.vertical a:hover {
    background-color: #c0bcbc;
}


</style>
<ul class="vertical ex">
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
</ul>


</body>
</html>