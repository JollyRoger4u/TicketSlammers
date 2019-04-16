if (document.readyState == "loading") {
	document.addEventListener('DOMContentLoaded', ready)
} else {
	ready()
}

function ready() {

	/****     Listens for clicks on any of the "buyBtns" */

	var buybuttons = document.getElementsByClassName('buyBtn')
	console.log(buybuttons)
	for (var i = 0; i < buybuttons.length; i++) {
		var button = buybuttons[i]
		button.addEventListener('click', addItem)
	}

	/*****     Grabs data from the event and gives it to "newCartItem" to make a shopping cart item */

	function addItem(event) {
		var button = event.target
		var shopItem = button.parentElement.parentElement
		var title = shopItem.getElementsByClassName('eventName')[0].innerText
		var price = shopItem.getElementsByClassName('eventPrice')[0].innerText
		var image = shopItem.getElementsByClassName('eventImg')[0].src
		newCartItem(title, price, image)
	}


	/*****    Adds the passed in data to HTML and puts it in the shopping cart   */
	function newCartItem(title, price, image) {
		var cartRow = document.createElement('div')
		var shoppingCartPlacement = document.getElementsByClassName('selectedItemWrap')[0]
		var doublechk = shoppingCartPlacement.getElementsByClassName('ticketName')
		for (var i = 0; i < doublechk.length; i++) {
			if (doublechk[i].innerText == title) {
				alert('already in the cart, dufus!')
				return
			}
		}
		var shoppingCartContents = `<div class="selectedItemWrap">
		<img class="ticketImg" src="${image}">
		<p class="ticketName">${title}</p>
		<p class="ticketPrice">${price}</p>
		<input class="buyQuantity" type="number">
		<button class="destroyerOfTickets">Remove ticket</button>           
		</div>`
		cartRow.innerHTML = shoppingCartContents
		shoppingCartPlacement.append(cartRow)
		activateDestroy()
	}


	/***      Listens for clicks on any of the destroyer buttons */
	function activateDestroy() {
		var destroyBtn = document.getElementsByClassName('destroyerOfTickets')
		console.log(destroyBtn)
		for (var i = 0; i < destroyBtn.length; i++) {
			var button = destroyBtn[i]
			button.addEventListener('click', function (event) {
				var destroy = event.target
				destroy.parentElement.parentElement.remove()

			})
		}
	}




}
