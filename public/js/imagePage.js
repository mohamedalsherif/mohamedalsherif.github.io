document.onkeydown = function(event) {
	var key_press = String.fromCharCode(event.keyCode);
	var key_code = event.keyCode;
	console.log(key_code);
	if(key_code==37)
	{
		//left button pressed
		var prev = document.getElementById("previousIndex");
		var prevWebPage = prev.href;
		window.location.assign(prevWebPage);
		event.preventDefault();
	}
	else if(key_code==39)
	{
		//right button pressed
		var next = document.getElementById("nextIndex");
		var nextWebPage = next.href;
		window.location.assign(nextWebPage);
		event.preventDefault();
	}
}
