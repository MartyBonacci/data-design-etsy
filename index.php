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
		/*create seller class*/
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
				if($newSellerId <= 0 || $newSellerId % 2 != 0) {
					throw(new Exception('Cylinders must be even, except for the Audi RS2, Yugo...'));
				}
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

		$seller = new Seller(2,"Fred","Fred's Shop","Omaha, NE",7/15/2017);

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


		?>
	</body>
</html>