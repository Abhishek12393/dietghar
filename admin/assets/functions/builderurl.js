var xmlHttpzxcv
function showcities(str)
{
xmlHttpzxcv=GetXmlHttpObject1();
if (xmlHttpzxcv==null)
{alert ("Your browser does not support AJAX!");return;}
if(xmlHttpzxcv.readyState==0 || xmlHttpzxcv.readyState==4)
{xmlHttpzxcv.open("GET",'functions/builderurl.php?q='+str,true);}
xmlHttpzxcv.onreadystatechange=stateChanged3;
xmlHttpzxcv.send(null);
}
function stateChanged3() 
{
xmlHttpzxcv.onreadystatechange=function()
{if (xmlHttpzxcv.readyState==4)
{document.getElementById("xDetails").innerHTML=xmlHttpzxcv.responseText;}
}
}
function GetXmlHttpObject1()
{var xmlHttpzxcv=null;
try{xmlHttpzxcv=new XMLHttpRequest();}
catch (e){
try{xmlHttpzxcv=new ActiveXObject("Msxml2.XMLHTTP");}
catch (e)
{xmlHttpzxcv=new ActiveXObject("Microsoft.XMLHTTP");}
}
return xmlHttpzxcv;
}