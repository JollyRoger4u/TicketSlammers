
if (document.readyState == "loading") {
	document.addEventListener('DOMContentLoaded', ready)
} else {
	ready();

}
let emptyCart = true;
let uniqueCartItem = document.getElementsByClassName('selectedItemWrap');
let shoppingCart = document.getElementById('shoppingCartWrap');
let storedData;
let shopCookie = [{ "event": "2" },
{ "event": "1" }];
function ready() {
	//Checks to see if the user have seen and clicked accept on the use of cookies
	cookieSeen();

	//Listens for clicks on any of the add-to-cart buttons "buyBtns" 
	let buybuttons = document.getElementsByClassName('buyBtn');
	for (let i = 0; i < buybuttons.length; i++) {
		let button = buybuttons[i];
		button.addEventListener('click', addItem);
	}

	/***** 		Listens for clicks on the main purchase button */
	let purchase = document.getElementsByClassName('buyBtnFinal')[0];
	purchase.addEventListener('click', purchaseClick);
	function purchaseClick() {
		if (!emptyCart) {
			alert('PURCHASE REGISTERED');
		} else {
			alert('there was a problem with your purchase, is the shopcart empty?')
		}

	}
	// Cookie Testing area

	//let cookArr = [{ "event": "15" }, { "event": "2" }, { "event": "1" }, { "event": "WOOT" }];
	bake_cookie(shopCookie);
	function bake_cookie(shopCookieData) {
		let stringedObj = JSON.stringify(shopCookieData);
		document.cookie = "shopCookie" + "=" + stringedObj + "; ";
	}
	/*for (var i = 0; i < cookArr.length; i++) {
		var object = cookArr[i];
		for (var property in object) {
			var cookie = [name, '=', JSON.stringify(value), '; domain=.', window.location.host.toString(), '; path=/;'].join('');
			//console.log('item ' + i + ': ' + property + '=' + object[property]);
			//let c = [name, '=', name["event"], '; path=/;'].join('');
			//console.log(object[i]);
			document.cookie = cookie;
		}
	}*/
	/*function readCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') c = c.substring(1, c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
		}
		return null;
	}*/

	//document.cookie = c;

	eat_cookie("shopCookie");

}
function eat_cookie(name) {
	let result = document.cookie.match(new RegExp(name + '=([^;]+)'));
	result && (result = JSON.parse(result[1]));
	console.log(result)
	document.getElementsByClassName("shopHeader")[0].innerHTML = result[0].event;
}

function updateShopCookie(title, quantity) {
	alert(title + "number: " + quantity);
}
///////////*/


function cookieSeen() {
	let buttonExists = document.getElementById('okToCookiesBtn');
	if (buttonExists != null) {
		getRidOfWarning = document.getElementById('okToCookiesBtn');
		getRidOfWarning.addEventListener('click', setSeenCookie);
		function setSeenCookie() {
			document.cookie = 'cookiesAccepted="yes"; expires=Thu, 01 Jan 2030 00:00:00 UTC; path=/;';
			document.location.reload(true)
		}
	}
}


/********   Throws json-errors that I have not gotten sorted out yet */
/*function getCookie() {
	let cartCookie = document.cookie.split("=");
	
	let cartObject = JSON.parse(cartCookie[1]);
	console.log(cartCookie);
	
}
	
function createCookie(shopObject) {
	
	let days = 7;
	let date = new Date();
	let jsonCookie = JSON.stringify(shopObject);
	date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
	document.cookie = "shopCookie=" + jsonCookie;
	
}
	
/**** handles clicks on the shopping cart items and calls on the required function */
function clickEvent(e) {

	if (event.target.classList.contains('buyQuantity')) {
		let quantity = document.getElementsByClassName('buyQuantity')[0];
		let event = parentElement.parentElement['']
		if (quantity.value > 0) {
			itemTotals();
			//updateCookie(quantity.value);
		} else {
			quantity.value == 1;
			updateCookie(quantity.value);
		}
	} else if (event.target.classList.contains('destroyerOfTickets')) {
		let destroy = event.target;
		destroy.parentElement.parentElement.remove();
		itemTotals();
	}

	else { console.log("johnny noButton") }
}

function itemTotals() {
	let totalItem = 0;
	let totalCost = 0;
	singleCartItem = document.getElementsByClassName('selectedItemWrap');
	for (let i = 0; i < singleCartItem.length; i++) {
		let specificItemCost = singleCartItem[i].getElementsByClassName('ticketPrice')[0];
		let specificItemAmount = singleCartItem[i].getElementsByClassName('buyQuantity')[0];
		if (specificItemAmount < 1) {
			specificItemAmount.value = 1;
		}
		let specificEventName = singleCartItem[i].getElementsByClassName('ticketName')[0].innerText;
		tempTotal = parseInt(specificItemAmount.value) * parseFloat(specificItemCost.innerText);
		tempItems = parseInt(specificItemAmount.value);
		//shopObject.name = specificEventName;
		//shopObject.nr = specificItemAmount.value;

		//console.log(shopObject)
		totalCost += tempTotal;
		totalItem += tempItems;

	};
	//createCookie();   //shopObject
	/*getCookie()            -----Another source of json troubles  */
	document.getElementsByClassName('totalItems')[0].innerText = totalItem;
	document.getElementsByClassName('totalCost')[0].innerText = totalCost;
	if (totalItem > 0) {
		emptyCart = false;
	}

}

function activateButtons() {
	for (let i = 0; i < uniqueCartItem.length; i++) {
		uniqueCartItem[i].addEventListener('click', clickEvent);
	}
}

/*****     Grabs data from the event and gives it to "newCartItem" to make a shopping cart item */
function addItem(event) {
	let button = event.target
	let shopItem = button.parentElement.parentElement
	let title = shopItem.getElementsByClassName('eventName')[0].innerText;
	let price = shopItem.getElementsByClassName('eventPrice')[0].innerText;
	let image = shopItem.getElementsByClassName('eventImg')[0].src;
	newCartItem(title, price, image);
	updateShopCookie(title, 1);
}

function newCartItem(title, price, image) {
	//let cookie = getCookie;
	let cartRow = document.createElement('div');
	let doublechk = shoppingCart.getElementsByClassName('ticketName');
	for (let i = 0; i < doublechk.length; i++) {
		if (doublechk[i].innerText == title) {
			alert('already in the cart');
			return
		}
	}
	/***  Creates the UI representation of the ticket in the cart with information from the addItems function */

	let shoppingCartContents = `<div class="selectedItemWrap">
	<img class="ticketImg" src="${image}">
	<p class="ticketName">${title}</p>
	<p class="ticketPrice">${price}</p>
	<input class="buyQuantity" type="number" value="1" min=1 oninput="validity.valid||(value='');">
	<button class="destroyerOfTickets">Remove ticket</button>           
	</div>`
	cartRow.innerHTML = shoppingCartContents
	shoppingCart.append(cartRow);
	activateButtons();
	itemTotals();
}