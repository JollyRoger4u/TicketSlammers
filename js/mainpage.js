
if (document.readyState == "loading") {
	document.addEventListener('DOMContentLoaded', ready)
} else {
	ready();

}
let emptyCart = true;
let shopObject = {};
let uniqueCartItem = document.getElementsByClassName('selectedItemWrap');
let shoppingCart = document.getElementById('shoppingCartWrap');
let storedData
function ready() {


	/****     Listens for clicks on any of the add-to-cart buttons "buyBtns" */
	cookieSeen();
	let buybuttons = document.getElementsByClassName('buyBtn');
	for (let i = 0; i < buybuttons.length; i++) {
		let button = buybuttons[i];
		button.addEventListener('click', addItem);
	}

	/***** 		Listens for clicks on the main purchase button */
	let purchase = document.getElementsByClassName('buyBtnFinal')[0];
	purchase.addEventListener('click', purchaseClick);
	function purchaseClick(event) {
		if (!emptyCart) {
			alert('PURCHASE REGISTERED');
			//createCookie();

		}

	}
}

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

}*/

/**** handles clicks on the shopping cart items and calls on the required function */
function clickEvent(e) {
	if (event.target.classList.contains('buyQuantity')) {
		if (document.getElementsByClassName('buyQuantity')[0].value > 0) {
			itemTotals();
		} else {
			document.getElementsByClassName('buyQuantity')[0].value == 1;
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