<html><head>
    <title>Morality.gg</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
    $("a:nth-child(1)").mouseover(function() {                     $("#selector").animate({"left":"5%"},200);
});
$("a:nth-child(2)").mouseover(function() {                     $("#selector").animate({"left":"22.1%"},200);
});
$("a:nth-child(3)").mouseover(function() {                     $("#selector").animate({"left":"39%"},200);
});
$("a:nth-child(4)").mouseover(function() {                     $("#selector").animate({"left":"54.5%"},200);
});
$("a:nth-child(5)").mouseover(function() {                     $("#selector").animate({"left":"69%"},200);
});
$("a:nth-child(6)").mouseover(function() {                     $("#selector").animate({"left":"83.7%"},200);
});});</script>
    <style type="text/css">
    body
{

    font: sans-serif;
    text-align: center;
    color: white;    
  background-color:#2c3e50;
}
#nav_container
{
    position: fixed;
    left: 34%;
    top: 0%:;
  width:600px;
  height:70px;
  background:#2980b9;
  margin:0 auto;
  border-radius:10px;
  text-align:center;
  box-shadow:0px 3px 0px #1F5A87, 0px 0px 7px black;
}
nav span
{
  margin-left:40px;
  font-size:20px;
  color:white;
  font-family:sans-serif;
  position:relative;top:22px;left:-15px;
  z-index:1;
  padding:50px 0px 50px 0px;
  cursor:pointer;
}
nav span:active
{
  opacity:0.3;
}
#selector
{
  height:100%;
  width:80px;
  background:#8e44ad;
  position:relative;top:-40%;left:5%;
  z-index:0;
}
#shape
{
    border-bottom: 20px solid #5B2B6D;
    border-left: 15px solid transparent;
    border-right: 15px solid transparent;
    height: 10%;
    width: 100%;
  -webkit-transform:rotate(180deg);
  position:relative;top:70px;
}
#shape_two
{
  width:50px;
  height:50px;
  margin:0 auto;
  position:relative;top:70px;
  background: rgb(70,33,84); 
background: -moz-linear-gradient(top,  rgba(70,33,84,1) 0%, rgba(70,33,84,1) 14%, rgba(44,62,80,1) 100%); 
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(70,33,84,1)), color-stop(14%,rgba(70,33,84,1)), color-stop(100%,rgba(44,62,80,1))); 
background: -webkit-linear-gradient(top,  rgba(70,33,84,1) 0%,rgba(70,33,84,1) 14%,rgba(44,62,80,1) 100%);  
background: -o-linear-gradient(top,  rgba(70,33,84,1) 0%,rgba(70,33,84,1) 14%,rgba(44,62,80,1) 100%); 
background: -ms-linear-gradient(top,  rgba(70,33,84,1) 0%,rgba(70,33,84,1) 14%,rgba(44,62,80,1) 100%); 
background: linear-gradient(to bottom,  rgba(70,33,84,1) 0%,rgba(70,33,84,1) 14%,rgba(44,62,80,1) 100%); 
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#462154', endColorstr='#2c3e50',GradientType=0 ); 

}
#Welcome
{
    width: 40%;
    height: 30%;
    position: relative;
    top: 20%;
    left: 30%;    
    background-color:#2980b9;
      box-shadow:0px 3px 0px #1F5A87, 0px 0px 7px black;
      border-radius: 10px;

}
#Welcomemsg
{
    position: relative;
    top: 10%
}
#buttonOne
{
    background-color: #8e44ad;
    border-radius: 10px;
    box-shadow: 0px 3px 0px #1F5A87, 0px 0px 7px black;
   margin-top: 10%;
}
a:hover
{
  text-decoration: none;
  text-decoration-line: none; 
}
.container
{
  position: relative;
  top: 30%;

}


</style>
</head>
<body>
<div id="nav_container">
  <nav>
    <a href=""><span>Home</span></a>
    <a href=""><span>Signup</span></a>
    <a href=""><span>Login</span></a>
    <a href=""><span>About</span></a>
    <a href=""><span>Cart</span></a>
    <a href=""><span>Store</span></a>
  </nav>
  <div id="selector" style="left: 5%;">
    <div id="shape"></div>
    <div id="shape_two"></div>
  </div>
</div>
<div id='Welcome'>
        <h1 id='Welcomemsg'>Welcome to Morality.gg</h1><br>
            <h4 id='welcomemsg'>Keep track of all your favorite E-sports teams & events</h4>
                <button id='buttonOne' style='position:relative;top:20%;' class='btn btn-info'>Join Now!</button>

</div>
</body>
</html>