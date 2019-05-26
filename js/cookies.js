


class CookieHandler {

	/*	constructor(cookieName) {
	
			this.cookieExists = this.cookieCheck(cookieName);
			if (this.cookieExists == true) {
				console.log("cartCookie detected, populating cart");
				this.popData.events = readCookie(cookieName);
				for (let i = 0; i < this.popData.length; i++) {
					alert("whoop")
				}else (alert("where cookie"))
		}
}*/
	cookiesAccepted() {
		let buttonExists = document.getElementById('okToCookiesBtn');
		if (buttonExists != null) {
			let getRidOfWarning = document.getElementById('okToCookiesBtn');
			getRidOfWarning.addEventListener('click', setSeenCookie);
			function setSeenCookie() {
				document.cookie = 'cookiesAccepted="yes"; expires=Thu, 01 Jan 2030 00:00:00 UTC; path=/;';
				document.location.reload(true)
			}
		}
	}
	cookieCheck(cookieName) {
		if (document.cookie.indexOf(cookieName + "=") >= 0) {
			console.log("cookie detected");
			return true;

		} else {
			console.log("cookie NOT detected");
			return false;
		}

	}

	readCookie(cookieName) {
		let cstring = RegExp("" + cookieName + "[^;]+").exec(document.cookie);
		let tempData = (decodeURIComponent(!!cstring ? cstring.toString().replace(/^[^=]+./, "") : ""));
		return tempData;
	}

	

	bakeCartCookie(id, nr, title, img, cost) {
		let tempData = { "eventID": id, "tickets": nr, "title": title, "image": img, "price": cost };
		dataStorage.events.push(tempData);

	}
	serveCookie(data) {      //TODO REMOVE COOKIE IF EMPTY!!
		let stringdata = JSON.stringify(data);
		document.cookie = shopCookieName + "=" + stringdata + ";" + "expires=Thu, 01 Jan 2030 00:00:00 UTC; path=/;";
	}


	//cookieData = readCookie(cookieName);
	//console.log(JSON.parse(cookieData));
}