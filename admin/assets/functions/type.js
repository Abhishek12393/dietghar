var xmlHttp
function showtype(str)
{ 
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
{alert ("Your browser does not support AJAX!");return;} 
if(xmlHttp.readyState==0 || xmlHttp.readyState==4)
{xmlHttp.open("GET",'https://dietghar.in/diet/admin/assets/functions/type.php?q='+str,true);}
xmlHttp.onreadystatechange=stateChanged;
xmlHttp.send(null);
}
function stateChanged() 
{
xmlHttp.onreadystatechange=function()
{if (xmlHttp.readyState==4)
{document.getElementById("Type").innerHTML=xmlHttp.responseText;}
}
}
function GetXmlHttpObject()
{var xmlHttp=null;
try{xmlHttp=new XMLHttpRequest();}
catch (e){
try{xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");}
catch (e)
{xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");}
}
return xmlHttp;
}