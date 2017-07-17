<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="author" content="Marty Bonacci">
		<meta name="description" content="data design assignment based on etsy product page">
		<title>Data Design Etsy</title>
	</head>
	<body>
		<?php
		settype($sellerId,"string");
		$sellerId = strip_tags($_POST["sellerId"]);
		echo $sellerId;
		?>
		<!--input new seller info-->
		<form action="index.php" method="post" name="newSeller" id="newSeller">
			<input title="Seller ID" type="text" name="sellerId" id="sellerId"/>
			<input type="submit" name="send" id="send" value="send"/>
		</form>


		<?php
		/*seller class*/
		class seller {
			private $sellerId;
			private $sellerShopOwnerName;
			private $sellerShopName;
			private $sellerLocation;
			private $sellerOnEtsySince;

			public function getSellerId() {
				return($this->sellerId);
			}
			public function getSellerShopOwnerName() {
				return($this->sellerShopOwnerName);
			}
			public function getSellerShopName() {
				return($this->sellerShopName);
			}
			public function getSellerLocation() {
				return($this->sellerLocation);
			}
			public function getSellerOnEtsySince() {
				return($this->sellerOnEtsySince);
			}

			public function setSellerId ($newSellerId) {
				$this->sellerId = $newSellerId;
			}
			public function setSellerShopOwnerName($newSellerShopOwnerName) {
				$this->sellerShopOwnerName = $newSellerShopOwnerName;
			}
			public function setSellerShopName($newSellerShopName) {
				$this->sellerShopName = $newSellerShopName;
			}
			public function setSellerLocation($newSellerLocation) {
				$this->sellerLocation = $newSellerLocation;
			}
			public function setSellerOnEtsySince($newSellerOnEtsySince) {
				$this->sellerOnEtsySince = $newSellerOnEtsySince;
			}

			public function __construct($newSellerId, $newSellerShopOwnerName, $newSellerShopName, $newSellerLocation, $newSellerOnEtsySince){
				$this->setSellerId($newSellerId);
				$this->setSellerShopOwnerName($newSellerShopOwnerName);
				$this->setSellerShopName($newSellerShopName);
				$this->setSellerLocation($newSellerLocation);
				$this->setSellerOnEtsySince($newSellerOnEtsySince);
			}
		}

		/*item class*/
		class item {
			private $itemId;
			private $sellerId;
			private $itemName;
			private $itemPrice;
			private $itemQuantity;
			private $itemOverview;
			private $itemDetails;
			private $itemShippingPolicies;


			public function getItemId() {
				return($this->itemId);
			}
			public function getSellerId() {
				return($this->sellerId);
			}
			public function getItemName() {
				return($this->itemName);
			}
			public function getItemPrice() {
				return($this->itemPrice);
			}
			public function getItemQuantity() {
				return($this->itemQuantity);
			}
			public function getItemOverview() {
				return($this->itemOverview);
			}
			public function getItemDetails() {
				return($this->itemDetails);
			}
			public function getItemShippingPolicies() {
				return($this->itemShippingPolicies);
			}


			public function setItemId ($newItemId) {
				$this->itemId = $newItemId;
			}
			public function setSellerId($newSellerId) {
				$this->sellerId = $newSellerId;
			}
			public function setItemName($newItemName) {
				$this->itemName = $newItemName;
			}
			public function setItemPrice($newItemPrice) {
				$this->itemPrice = $newItemPrice;
			}
			public function setItemQuantity($newItemQuantity) {
				$this->itemQuantity = $newItemQuantity;
			}
			public function setItemOverview($newItemOverview) {
				$this->itemOverview = $newItemOverview;
			}
			public function setItemDetails($newItemDetails) {
				$this->itemDetails = $newItemDetails;
			}
			public function setItemShippingPolicies($newItemShippingPolicies) {
				$this->itemShippingPolicies = $newItemShippingPolicies;
			}


			public function __construct($newItemId, $newSellerId, $newItemName, $newItemPrice, $newItemQuantity, $newItemOverview, $newItemDetails, $newItemShippingPolicies){
				$this->setItemId($newItemId);
				$this->setSellerId($newSellerId);
				$this->setItemName($newItemName);
				$this->setItemPrice($newItemPrice);
				$this->setItemQuantity($newItemQuantity);
				$this->setItemOverview($newItemOverview);
				$this->setItemDetails($newItemDetails);
				$this->setItemShippingPolicies($newItemShippingPolicies);
			}
		}

		$seller = new Seller(1,"Fred","Fred's Shop","Omaha, NE",7/15/2017);

		echo $seller->getSellerId()."<br />";
		echo $seller->getSellerShopOwnerName()."<br />";
		echo $seller->getSellerShopName()."<br/>";
		echo $seller->getSellerLocation()."<br/>";
		echo $seller->getSellerOnEtsySince()."<br/>";

		$seller->setSellerShopOwnerName("Freddie");

		echo $seller->getSellerId()."<br />";
		echo $seller->getSellerShopOwnerName()."<br />";
		echo $seller->getSellerShopName()."<br/>";
		echo $seller->getSellerLocation()."<br/>";
		echo $seller->getSellerOnEtsySince()."<br/>";


		$item = new item (1,1,"book",34.95,2,"new,200pgs","details bla bla bla","We'll ship your order within 1 busines day");
		echo $item->getItemId()."<br/>";
		echo $item->getSellerId()."<br/>";
		echo $item->getItemName()."<br/>";
		echo $item->getItemPrice()."<br/>";
		echo $item->getItemQuantity()."<br/>";
		echo $item->getItemOverview()."<br/>";
		echo $item->getItemDetails()."<br/>";
		echo $item->getItemShippingPolicies()."<br/>";

		$item = new item (2,1,"hammer",19.95,1,"new,framing hammer","details bla bitty bla bla","We'll ship your order within 2 busines days");
		echo $item->getItemId()."<br/>";
		echo $item->getSellerId()."<br/>";
		echo $item->getItemName()."<br/>";
		echo $item->getItemPrice()."<br/>";
		echo $item->getItemQuantity()."<br/>";
		echo $item->getItemOverview()."<br/>";
		echo $item->getItemDetails()."<br/>";
		echo $item->getItemShippingPolicies()."<br/>";
		?>
	</body>
</html>