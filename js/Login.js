/*FIXA LOGIN SÄKERHET


let thanks = document.getElementsById('thankYou')
let registerDone = document.getElementById('logInSection')
thanks.style.display = block;
registerDone.style.display = none;
/*

$loginCookie = "TicketSlammers";

if (!isset($_COOKIE[$loginCookie])) { }
//if ($_SESSION['sessionID'])
setcookie($loginCookie, "penis", time() + (24 * 60 * 60 * 1000), "/");

if (!isset($_COOKIE[$loginCookie])) {
	echo "Cookie named '".$loginCookie. "' is not set!";
} else {
	echo "Cookie '".$loginCookie. "' is set!<br>";
	echo "Value is: ".$_COOKIE[$loginCookie];
}



function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
	var expires = "expires=" + d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}
*/
