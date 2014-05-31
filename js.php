<html>
<head>
<title>Span to Text Box - Demo</title>
<style type="text/css">
.replace {
display:none;
}
</style>
<script type="text/javascript">
function exchange(id){
var ie=document.all&&!window.opera? document.all : 0
var frmObj=ie? ie[id] : document.getElementById(id)
var toObj=ie? ie[id+'b'] : document.getElementById(id+'b')
toObj.style.width=frmObj.offsetWidth+7+'px'
frmObj.style.display='none';
toObj.style.display='inline';
toObj.value=frmObj.innerHTML
}
</script>
</head>
<body>
<span id="itm1" onclick="exchange(this.id)">House</span><input id="itm1b" class="replace" type="text" value="">
</body>
</html>
