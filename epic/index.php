<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="author" content="Marty Bonacci">
		<meta name="description" content="data design assignment based on etsy product page">
		<title>data design etsy</title>
	</head>
	<body>
		<h1>Data Design Assignment Based on Etsy Product Page</h1>
		<h2>Persona</h2>
		<p>Marty Bonacci sells western belt an Native American style moccasins on ebay, Amazon and a stand alone website, NativeLeather.com. The products are made in Gallup, NM by Marty's friend, Tony Bonaguiti. This friend/business relationship has positioned Marty as the exclusive online seller that Tony will drop ship product for. Marty has observed that the more venues he offers product on, the more product sells.</p>
		<h2>Use Case</h2>
		<p>To start selling on Etsy, Marty will need to first setup a seller account, then list items for sale.</p>
		<h2>Interaction Flow</h2>
		<ol>
			<li>The user will navigate to the "create a seller account" page on Etsy.</li>
			<li>The user will enter the seller attributes, sellerShopName, sellerLocation, sellerOnEtsySince, sellerShopOwnerName to create a seller account</li>
			<li>The user/seller will navigate to the "list an item for sale" page.</li>
			<li>The user will enter the item attributes, itemName, itemPrice, itemDetails, itemOverview, itemShippingPolicies, itemQuantity</li>
		</ol>

		<h2>Entity Relationship Diagram</h2>
		<img src="images/data-design-etsy2.svg" alt="data diagram">
		<h2>Conceptual Model</h2>
		<h3>Entities and Attributes</h3>
		<p><strong>seller</strong></p>
		<ul>
			<li>sellerShopName (primary key)</li>
			<li>sellerLocation</li>
			<li>sellerOnEtsySince</li>
			<li>sellerShopOwnerName</li>
			<li>sellerId (primary key)</li>
		</ul>
		<p><strong>item</strong></p>
		<ul>
			<li>sellerId (foreign key)</li>
			<li>itemId</li>
			<li>itemName</li>
			<li>itemPrice</li>
			<li>itemDetails</li>
			<li>itemOverview</li>
			<li>itemShippingPolicies</li>
			<li>itemQuantity</li>
		</ul>
		<h3>Relations</h3>
		<p>Each individual seller can have multiple items for sale. To maintain this relationship the seller table's primary key of sellerShopName is used by the item table as a foreign key.</p>


	</body>
</html>