


class CookieHandler {

	cookiesAccepted() {         //Creates the button to accept cookies and sets a cookie to remember it has been seen
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
	cookieCheck(cookieName) {    //Checks that the cookiename sent exists
		if (document.cookie.indexOf(cookieName + "=") >= 0) {
			console.log("cookie detected");
			return true;

		} else {
			console.log("cookie NOT detected");
			return false;
		}

	}

	readCookie(cookieName) {	//Fetches info from the cookie named
		let cstring = RegExp("" + cookieName + "[^;]+").exec(document.cookie);
		let tempData = (decodeURIComponent(!!cstring ? cstring.toString().replace(/^[^=]+./, "") : ""));
		return tempData;
	}



	bakeCartCookie() {  //updates dataStorage with information from shopping cart and keeps track of totals
		let tempTotal = 0;
		let tempItems = 0;
		totalCost = 0;
		totalItem = 0;
		let stringdata = JSON.stringify(dataStorage);
		document.cookie = shopCookieName + "=" + stringdata + ";" + "expires=Thu, 01 Jan 2030 00:00:00 UTC; path=/;";
		console.log(dataStorage);
		for (let j = 0; j < dataStorage.events.length; j++) {
			tempTotal = dataStorage.events[j].tickets * dataStorage.events[j].price;
			tempItems = dataStorage.events[j].tickets;
			totalCost = tempTotal + totalCost;
			totalItem = tempItems + totalItem;
		}
		document.getElementsByClassName('totalItems')[0].innerText = totalItem;
		document.getElementsByClassName('totalCost')[0].innerText = totalCost;
		if (totalItem > 0) {
			emptyCart = false;
		}
	}

	deleteCookie(name) {
		console.log("eating cookie");
		document.cookie = shopCookieName + "=" + "" + ";" + "expires=Thu, 01 Jan 1950 00:00:00 UTC; path=/;";
	}
}