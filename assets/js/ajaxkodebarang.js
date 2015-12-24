var xmlHttp

function showCustomer(str){
	xmlHttp=GetXmlHttpObject()
	if(xmlHttp==null){
		alert("Browser anda tidak support")
		return
}
var url="http://localhost/inventorict/index.php/barang/ajaxbarang/"

url=url+str
xmlHttp.onreadystatechange=stateChanged
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function stateChanged(){
	if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
		//document.getElementById("txtHint").innerHTML=xmlHttp.responseText
		document.getElementById('txtHint').value=xmlHttp.responseText
		document.getElementById('txtHint').defaultValue=xmlHttp.responseText
	}
}

function GetXmlHttpObject(){
	var xmlHttp=null;
	
	try{
		xmlHttp=new XMLHttpRequest();
	}catch(e){
		xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	return xmlHttp;
}