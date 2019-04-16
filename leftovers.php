.eventViewer{
width: 1024px;
display: grid;
grid-template-columns: repeat(6, 1fr);
grid-template-rows: auto;
justify-items: center;
margin: auto;
background: grey;
}
.shopHeader{
background-color: purple;
color: white;
width: 100%;
height: 50px;
line-height: 50px;
text-align: center;
font-family: "Metal Mania";
font-size: 48px;
}
.eventImg{
height: 150px;
width: 150px;
object-fit: contain;
grid-column-start:1;
grid-column-end:2;
grid-row-start:2;
grid-row-end:5;
padding: 10px;
}
.eventName{
grid-column-start:1;
grid-column-end: 4;
}
.eventTime{
grid-column-start:5;
grid-column-end: 7;
}
.eventDesc{
grid-column-start: 2;
grid-column-end: 6;
grid-row-start: 2;
grid-row-end: 5;
}
.eventPriceLabel{
grid-column-start: 6;
grid-column-end: 7;
grid-row-start: 2;
width: 100%;
background-color: pink;
text-align: center;
}
.eventMaxTicketsLabel{
grid-column-start: 6;
grid-column-end: 7;
grid-row-start: 3;
}
.eventCurrentTicketsLabel{
grid-column-start: 6;
grid-column-end: 7;
grid-row-start: 4;
}
.eventPrice{
grid-column-start: 7;
grid-row-start: 2;
}
.eventMaxTickets{
grid-column-start: 7;
grid-row-start: 3;
}
.eventCurrentTickets{
grid-column-start: 7;
grid-row-start: 4;
}
.BuyBtn{
grid-column-start: 7;
grid-row-start: 5;
padding: 10px;
margin: 10px;
}


<!---	<form class="eventViewer" method="post">
		<img class="eventImg" src=" <?php
									?>">
									<h3 class="eventName"><?php
															?></h3>
									<h3 class="eventTime">2019-01-01</h3>
									<p class="eventDesc"><?php
															?></p>
									<p class="eventPriceLabel">Price:</p>
									<p class="eventPrice"><?php
															?></p>
									<p class="eventMaxTicketsLabel">Maximum tickets:</p>
									<p class="eventMaxTickets">1500</p>
									<p class="eventCurrentTicketsLabel">Available tickets:</p>
									<p class="eventCurrentTickets">991</p>
									<button class="BuyBtn">Buy now!</button>
							</form>
								<div class="eventViewer">
									<img class="eventImg" src="img/placeholder.jpg">
									<h3 class="eventName">Placeholder Name</h3>
									<h3 class="eventTime">2019-01-01</h3>
									<p class="eventDesc">Placeholder Description.
										Williamsburg pour-over banh mi direct trade retro scenester normcore mustache tote bag street art
										Vice yr asymmetrical mumblecore shabby chic wayfarers Carles synth XOXO banjo forage authentic small batch
										roof party craft beer gastropub semiotics chambray Truffaut single-origin coffee bespoke Intelligentsia tousled
										narwhal sriracha letterpress Tonx Pitchfork cray ethical drinking vinegar stumptown cardigan keytar literally
										squid Wes Anderson chia aesthetic Marfa Blue Bottle lomo mixtape Neutra salvia Austin keffiyeh gluten-free kogi readymade
										typewriter</p>
									<p class="eventPriceLabel">Price:</p>
									<p class="eventPrice">$352</p>
									<p class="eventMaxTicketsLabel">Maximum tickets:</p>
									<p class="eventMaxTickets">1500</p>
									<p class="eventCurrentTicketsLabel">Available tickets:</p>
									<p class="eventCurrentTickets">991</p>
									<button class="BuyBtn">Buy now!</button>
							
								</div>---->