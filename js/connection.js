function createXhr(){
	if(window.XMLHttpRequest){
		var xhr = new XMLHttpRequest();
		
	}else {
		var xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}
	return xhr ;
}

function post_connection(url,divid,param){
	var xhr = createXhr() ;
	xhr.open("POST",url,true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.setRequestHeader("Content-length", params.length);
	xhr.setRequestHeader("Connection", "close");
	xhr.onreadystatechange=function() {
	    if(xhr.readyState==4 && xhr.status==200) {
	        document.getElementById(divid.toString()).innerHTML = xhr.responseText;        
	    }
	}
	xhr.send(params);
}

function get_connection(url,divid,param){
	var xhr = createXhr() ;
	xhr.onreadystatechange=function() {
	    if(xhr.readyState==4 && xhr.status==200) {
	        document.getElementById(divid.toString()).innerHTML = xhr.responseText;        
	    }
	}
    xhr.open("GET",url,true);
    xhr.send(null);
}