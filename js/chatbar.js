function open_window(player,id){
	document.getElementById('light').style.display = 'block';
	document.getElementById('fade').style.display = 'block';
}
function close_window(){
	document.getElementById('light').style.display = 'none';
	document.getElementById('fade').style.display='none';
}
function enter(event) {
	if(event.keyCode == 13){
		alert('a');
	}
}