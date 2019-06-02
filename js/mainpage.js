
if (document.readyState == "loading") {
	document.addEventListener('DOMContentLoaded', ready)
} else {
	ready();

}

//Initializes variables needed by several functions
let dataStorage = {
	"events": [

	]
};

let totalCost = 0;
let totalItem = 0;
let uniqueCartItem = document.getElementsByClassName('selectedItemWrap');
let shoppingCart = document.getElementById('shoppingCartWrap');
let emptyCart = true;
let shopCookieName = "shopCookie";
let shopCookie = {
	'events': [
		{ 'eventID': '', "tickets": '', "title": "", "image": "", "price": "" }
	]
}

function ready() {

	let cookieHandler = new CookieHandler;
	//Checks to see if the user have a cookie present,
	//otherwise shows "this site uses cookies" disclaimer
	cookieHandler.cookiesAccepted();
	let currentUser = cookieHandler.readCookie("TSUser");
	cExists = cookieHandler.cookieCheck(shopCookieName);
	if (cExists) {
		let data = cookieHandler.readCookie(shopCookieName);
		let jsonData = JSON.parse(data);
		console.log(jsonData)
		console.log("cartCookie detected, populating cart");
		for (let i = 0; i < jsonData.events.length; i++) {
			newCartItem(jsonData.events[i].eventID,
				jsonData.events[i].title,
				jsonData.events[i].price,
				jsonData.events[i].image,
				jsonData.events[i].tickets)
		}
	} else {
		console.log("where cookie");
	}
	itemTotals();
	//Listens for clicks on any of the add-to-cart buttons "buyBtns"
	let buybuttons = document.getElementsByClassName('buyBtn');
	for (let i = 0; i < buybuttons.length; i++) {
		let button = buybuttons[i];
		button.addEventListener('click', addItem);
	}

	// 		Listens for clicks on the main purchase button
	let purchase = document.getElementsByClassName('buyBtnFinal')[0];
	purchase.addEventListener('click', purchaseClick);

	function purchaseClick() {
		if (!emptyCart) {
			if (currentUser > 0) {
				let messageString = " You have purchased: " + "\r\n";
				for (let i = 0; i < dataStorage.events.length; i++) {
					messageString = messageString + "a total of " + dataStorage.events[i].tickets + " tickets for the event: " + dataStorage.events[i].title + "\r\n";
					tempEvent = dataStorage.events[i].eventID;
					tempAmount = dataStorage.events[i].tickets;

					//Sends ajax request to create tickets for the bought items
					$.ajax({
						type: "POST",
						url: 'includes/boughtTicket.php',
						data: { eventID: tempEvent, amount: tempAmount, userID: currentUser },
						success: function (data) {
							console.log(data);
						}

					});

				}
				messageString = messageString + "for a total cost of: " + totalCost + "\r\n" + "Thank you very much and welcome back!";
				alert(messageString);

				dataStorage = "";
				shopCookie = "";
				cookieHandler.deleteCookie(shopCookieName);
				location.reload();
			} else {
				alert("please log in to complete purchase, your cart will be saved")
			}

		} else {
			alert('there was a problem with your purchase, is the shopcart empty?')
		}

	}

	// handles clicks on the shopping cart items and calls on the required function
	function clickEvent(e) {
		if (event.target.classList.contains('buyQuantity')) {
			let quantity = document.getElementsByClassName('buyQuantity')[0];
			if (quantity.value > 0) {
				itemTotals();
			} else {
				quantity.value == 1;
				updateCookie(quantity.value);
			}
		} else if (event.target.classList.contains('destroyerOfTickets')) {
			let destroy = event.target;
			destroy.parentElement.parentElement.remove();
			itemTotals();

		}
	}


	//adds the shopping cart items together and produces a summary, then sends request to update shopping cart cookie
	function itemTotals() {
		dataStorage = {
			"events": [
			]
		};

		singleCartItem = document.getElementsByClassName('selectedItemWrap');
		for (let i = 0; i < singleCartItem.length; i++) {
			let itemCost = parseFloat(singleCartItem[i].getElementsByClassName('ticketPrice')[0].innerText);
			let itemAmount = parseInt(singleCartItem[i].getElementsByClassName('buyQuantity')[0].value);
			let itemID = parseInt(singleCartItem[i].getElementsByClassName('eventID')[0].innerText);
			let itemTitle = singleCartItem[i].getElementsByClassName('ticketName')[0].innerText;
			let itemImage = singleCartItem[i].getElementsByClassName('ticketImg')[0].src;
			if (itemAmount < 1) {
				itemAmount.value = 1;
			}
			let tempData = { "eventID": itemID, "tickets": itemAmount, "title": itemTitle, "image": itemImage, "price": itemCost };
			dataStorage.events.push(tempData);
			for (var j = 0; j < dataStorage.events.length; j++) {
				if (dataStorage.events[j].eventID == tempData.eventID) {
					dataStorage.events[j].tickets = tempData.tickets;
				}

			}
		}


		cookieHandler.bakeCartCookie(dataStorage);
	}
	//adds eventlistener to the shopping cart items
	function activateButtons() {
		for (let i = 0; i < uniqueCartItem.length; i++) {
			uniqueCartItem[i].addEventListener('click', clickEvent);
		}
	}

	// Grabs data from the event and gives it to "newCartItem" to make a shopping cart item
	function addItem(event) {
		let button = event.target
		let shopItem = button.parentElement.parentElement
		let eventID = shopItem.getElementsByClassName('eventID')[0].innerText;
		let title = shopItem.getElementsByClassName('eventName')[0].innerText;
		let price = shopItem.getElementsByClassName('eventPrice')[0].innerText;
		let image = shopItem.getElementsByClassName('eventImg')[0].src;
		let soldOut = shopItem.getElementsByClassName('eventCurrentTickets')[0].innerText;
		if (soldOut > 0) {
			newCartItem(eventID, title, price, image);
		} else {
			alert("sorry, that concert is sold out!")
		}
	}
	//creates the actual UI-item and sends a request to update to total items
	function newCartItem(eventID, title, price, image, amount) {
		let cartRow = document.createElement('div');
		let doublechk = shoppingCart.getElementsByClassName('ticketName');
		for (let i = 0; i < doublechk.length; i++) {
			if (doublechk[i].innerText == title) {
				alert('already in the cart');
				return
			}
		}
		//  Creates the UI representation of the ticket in the cart with information from the addItems function

		let shoppingCartContents = `<div class="selectedItemWrap">
	<h1 class="eventID" style="display: none;">${eventID}</h1>
	<img class="ticketImg" src="${image}">
	<p class="ticketName">${title}</p>
	<p class="ticketPrice">${price}</p>
	<input class="buyQuantity" type="number" value="1" min=1 oninput="validity.valid||(value='');">
	<button class="destroyerOfTickets">Remove ticket</button>
	</div>`

		cartRow.innerHTML = shoppingCartContents
		shoppingCart.append(cartRow);
		if (amount > 0) {
			let valBtn = cartRow.getElementsByClassName("buyQuantity")[0];
			valBtn.value = amount;
		}
		activateButtons();
		itemTotals();
	}

}