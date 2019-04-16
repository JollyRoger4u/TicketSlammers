if (document.readyState == "loading") {
	document.addEventListener('DOMContentLoaded', ready)
} else {
	ready()
}



function ready() {

	var buybuttons = document.getElementsByClassName('buyBtn')
	console.log(buybuttons)
	for (var i = 0; i < buybuttons.length; i++) {
		var button = buybuttons[i]
		button.addEventListener('click', addItem)
	}


	function addItem(event) {
		var button = event.target
		var cartItem = button.parentElement.parentElement
		var title = cartItem.getElementsByClassName('eventName')[0].innerText
		var price = cartItem.getElementsByClassName('eventPrice')[0].innerText
		var image = cartItem.getElementsByClassName('eventImg')[0].src
		console.log(title)
		console.log(price)
		console.log(image)
	}













}
