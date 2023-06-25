var xmlHttpzxcat
function showtypesub(str)
{
xmlHttpzxcat=GetXmlHttpObject1();
if (xmlHttpzxcat==null)
{alert ("Your browser does not support AJAX!");return;}
if(xmlHttpzxcat.readyState==0 || xmlHttpzxcat.readyState==4)
{xmlHttpzxcat.open("GET",'functions/typesub.php?q='+str,true);}
xmlHttpzxcat.onreadystatechange=stateChanged01;
xmlHttpzxcat.send(null);
}
function stateChanged01() 
{
xmlHttpzxcat.onreadystatechange=function()
{if (xmlHttpzxcat.readyState==4)
{document.getElementById("xCategory").innerHTML=xmlHttpzxcat.responseText;}
}
}
function GetXmlHttpObject1()
{var xmlHttpzxcat=null;
try{xmlHttpzxcat=new XMLHttpRequest();}
catch (e){
try{xmlHttpzxcat=new ActiveXObject("Msxml2.XMLHTTP");}
catch (e)
{xmlHttpzxcat=new ActiveXObject("Microsoft.XMLHTTP");}
}
return xmlHttpzxcat;
}