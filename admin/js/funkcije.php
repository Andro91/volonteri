<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script>
var meni=0;
function skrol(){
	if($(document).scrollTop()>170 && meni===0)
	{
		var menij=document.getElementById("menij").style;
		menij.position="fixed";
		menij.top="0px";
		
		meni=1;
	}else
	if($(document).scrollTop()<170 && meni===1){
		var menij=document.getElementById("menij").style;
		menij.position="relative";
		menij.top="";
		
		meni=0;
	}
}
window.addEventListener('scroll', skrol);
function prijavaa(kako){
	document.getElementById("sveobuhvatni").style.display=kako;
}

function showApplication(str)
{
if (str==="")
  {
  document.getElementById("vest").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status===200)
    {
    document.getElementById("vest").innerHTML=xmlhttp.responseText;
    }
  };
xmlhttp.open("GET","getapplication.php?idd="+str,true);
xmlhttp.send();
}
function submit(){
    document.getElementById("submitovanje").submit();
}
function showEvent(str)
{
if (str==="")
  {
  document.getElementById("glavniSadrzaj").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState===4 && xmlhttp.status===200)
    {
    document.getElementById("glavniSadrzaj").innerHTML=xmlhttp.responseText;
    }
  };
xmlhttp.open("GET","getevents.php?q="+str,true);
xmlhttp.send();
}
function page(c){
    var p=0;
    if(c==='+'){
    p = parseInt(document.getElementById("textinputer").innerHTML)+1;
    if(p>0){document.getElementById("textinputer").innerHTML=p;}
    if(p===0){return 1;}
    return p;}
    if(c==='-'){
    p = parseInt(document.getElementById("textinputer").innerHTML)-1;
    if(p>0){document.getElementById("textinputer").innerHTML=p;}
    if(p===0){return 1;}
    return p;}
}
function registracija(){
	location.assign("index.php?str=registracija");
}
function samoBrojevi(evt, name, _max) {
	  var theEvent = evt || window.event;
	  var key = theEvent.keyCode || theEvent.which;
	  key = String.fromCharCode( key );
	  var regex = /[0-9\b\t]/;
	  var sv=document.getElementsByName(name)[0];
	  
	  if( !regex.test(key) || (sv.value.length>_max && key!='\b') ) {
		theEvent.returnValue = false;
		if(theEvent.preventDefault) theEvent.preventDefault();
	  }
	}
function samoSlova(evt, name, _max) {
	  var theEvent = evt || window.event;
	  var key = theEvent.keyCode || theEvent.which;
	  key = String.fromCharCode( key );
	  var regex = /[A-Za-z\b\t]/;
	  var sv=document.getElementsByName(name)[0];
	  
	  if( !regex.test(key) || (sv.value.length>_max && key!='\b') ) {
		theEvent.returnValue = false;
		if(theEvent.preventDefault) theEvent.preventDefault();
	  }
	}
function ograniciUnos(evt, name, nameERROR, _max) {
	  var theEvent = evt || window.event;
	  var key = theEvent.keyCode || theEvent.which;
	  key = String.fromCharCode( key );
	  var sv=document.getElementsByName(name)[0];
	  var err = document.getElementById(nameERROR);
	  
	  if( sv.value.length>_max && key!='\b' && key!='\t') {
		err.innerHTML = "Maksimalan broj karaktera je "+_max;
		theEvent.returnValue = false;
		if(theEvent.preventDefault) theEvent.preventDefault();
	  }else if(key!='\t')err.innerHTML = 300-sv.value.length;
	}
</script>
<script src="dodaci/ckeditor/ckeditor.js"></script>
<script>
var editor = new Array(5), html = '';

function createEditor(id, num) {
	if ( editor[num] )
	return;
	var config = {};
	editor[num] = CKEDITOR.appendTo( id, config, html );
}

function removeEditor(num, editorcontents, contents) {
	if ( !editor[num] )
	return;
	document.getElementById( editorcontents ).innerHTML = html = editor[num].getData();

	editor[num].destroy();
	editor[num] = null;
}
window.onload = function(){
	createEditor('editor1', 1);
	createEditor('editor2', 2);
}
function submitujDodavanjeClanka(){
	removeEditor(1, 'editorcontents1','contents1');
	removeEditor(2, 'editorcontents2','contents2');
	document.getElementById("kratakopis").value = document.getElementById("editorcontents1").innerHTML;
	document.getElementById("opis").value = document.getElementById("editorcontents2").innerHTML;
	document.getElementById("kratakopis").style.display="block";
	document.getElementById("opis").style.display="block";
}
<?php global $i; ?>
function dodajJezik(){
	var jezik = document.getElementById("govorniJezik");
	var novi = document.createElement('p');
		novi.innerHTML="<?php
		if(!$conn = mysqli_connect("localhost","root","","volonteri"))die("GRESKA_FJE1");
                mysqli_query($conn,"SET NAMES utf8");
		if(!$query = mysqli_query($conn, "select * from jezik"))die("GRESKA_FJE2!");
		echo"<select name='jezik[{$i}]' class='inputKontrole'>";
                
		while($f=mysqli_fetch_array($query))
		echo"<option value='{$f["id"]}'>{$f["naziv"]}</option>";
                echo"</select>";
		?>";
		jezik.appendChild(novi);
                <?php $i++; ?>
}
</script>