<?php
/*seller class*/
/**
 * Create Etsy seller class
 *
 * seller class which defines the seller Id, ShopOwnerName, ShopName, Location, and OnEtsySince date
 *
 * @author MartyBonacci <mbonacci@@cnm.edu>
 * @version 1.0.0
 **/
class seller {
	/**
	 * id for this Seller; this is the primary key
	 * @var int $sellerId
	 **/
	private $sellerId;
	/**
	 * Shop Owner Name of this Seller
	 * @var string $sellerShopOwnerName
	 **/
	private $sellerShopOwnerName;
	/**
	 * Shop Name of this Seller
	 * @var string $sellerShopName
	 **/
	private $sellerShopName;
	/**
	 * Location of this Seller
	 * @var string $sellerLocation
	 **/
	private $sellerLocation;
	/**
	 * On Etsy Since date of this Seller
	 * @var \Date $sellerOnEtsySince
	 **/
	private $sellerOnEtsySince;


	/**
	 * constructor for this Seller
	 *
	 * @param int|null $newSellerId id of this Seller or null if a new Seller
	 * @param string $newSellerShopOwnerName string containing Seller Shop Owner Name
	 * @param string $newSellerShopName string containing Seller Shop Name
	 * @param string $newSellerLocation string containing Seller Location
	 * @param \Date|string $newSellerOnEtsySince date seller has been on etsy since
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 **/
	public function __construct(?int $newSellerId, string $newSellerShopOwnerName, string $newSellerShopName, string $newSellerLocation, string $newSellerOnEtsySince) {
		try {
			$this->setSellerId($newSellerId);
			$this->setSellerShopOwnerName($newSellerShopOwnerName);
			$this->setSellerShopName($newSellerShopName);
			$this->setSellerLocation($newSellerLocation);
			$this->setSellerOnEtsySince($newSellerOnEtsySince);
		} //determine what exception type was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}


	/**
	 * accessor method for seller id
	 *
	 * @return int|null value of seller id
	 **/
	public function getSellerId(): int {
		return ($this->sellerId);
	}

	/**
	 * mutator method for seller id
	 *
	 * @param int|null $newSellerId new value of seller id
	 * @throws \RangeException if $newSellerId is not positive
	 * @throws \TypeError if $newSellerId is not an integer
	 **/
	public function setSellerId(?int $newSellerId): void {
		//if seller id is null immediately return it
		if(newSellerId === null) {
			$this->sellerId = null;
			return;
		}
		//verify the seller id is positive
		if($newSellerId <= 0) {
			throw(new \RangeException("seller id is not positive"));
		}
		//store the user id
		$this->sellerId = $newSellerId;
	}

	/**
	 * accessor method for seller shop owner name
	 *
	 * @return string value of seller shop owner name
	 **/
	public function getSellerShopOwnerName(): string {
		return ($this->sellerShopOwnerName);
	}

	/**
	 * mutator method for seller shop owner name
	 *
	 * @param string $newSellerShopOwnerName new value of seller shop owner name
	 * @throws \InvalidArgumentException if $newSellerShopOwnerName is not a string or insecure
	 * @throws \RangeException if $newSellerShopOwnerName is > 32 characters
	 * @throws \TypeError if $newSellerShopOwnerName is not a string
	 **/
	public function setSellerShopOwnerName(string $newSellerShopOwnerName): void {
		// verify the Seller Shop Owner Name content is secure
		$newSellerShopOwnerName = trim($newSellerShopOwnerName);
		$newSellerShopOwnerName = filter_var($newSellerShopOwnerName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newSellerShopOwnerName) === true) {
			throw(new \InvalidArgumentException("seller shop owner name content is empty or insecure"));
		}
		// verify the seller shop owner name content will fit in the database
		if(strlen($newSellerShopOwnerName) > 32) {
			throw(new \RangeException("seller shop owner name content too large"));
		}
		// store the seller shop owner name content
		$this->sellerShopOwnerName = $newSellerShopOwnerName;
	}

	/**
	 * accessor method for seller shop name
	 *
	 * @return string value of seller shop name
	 **/
	public function getSellerShopName(): string {
		return ($this->sellerShopName);
	}

	/**
	 * mutator method for seller shop name
	 *
	 * @param string $newSellerShopName new value of seller shop name
	 * @throws \InvalidArgumentException if $newSellerShopName is not a string or insecure
	 * @throws \RangeException if $newSellerShopName is > 32 characters
	 * @throws \TypeError if $newSellerShopName is not a string
	 **/
	public function setSellerShopName(string $newSellerShopName): void {
		// verify the Seller Shop Name content is secure
		$newSellerShopName = trim($newSellerShopName);
		$newSellerShopName = filter_var($newSellerShopName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newSellerShopName) === true) {
			throw(new \InvalidArgumentException("seller shop name content is empty or insecure"));
		}
		// verify the seller shop name content will fit in the database
		if(strlen($newSellerShopName) > 32) {
			throw(new \RangeException("seller shop name content too large"));
		}
		// store the seller shop name content
		$this->sellerShopName = $newSellerShopName;
	}

	/**
	 * accessor method for seller location
	 *
	 * @return string value of seller location
	 **/
	public function getSellerLocation(): string {
		return ($this->sellerLocation);
	}

	/**
	 * mutator method for seller location
	 *
	 * @param string $newSellerLocation new value of seller location
	 * @throws \InvalidArgumentException if $newSellerLocation is not a string or insecure
	 * @throws \RangeException if $newSellerLocation is > 32 characters
	 * @throws \TypeError if $newSellerLocation is not a string
	 **/
	public function setSellerLocation(string $newSellerLocation): void {
		// verify the Seller location content is secure
		$newSellerLocation = trim($newSellerLocation);
		$newSellerLocation = filter_var($newSellerLocation, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newSellerLocation) === true) {
			throw(new \InvalidArgumentException("seller location content is empty or insecure"));
		}
		// verify the seller location content will fit in the database
		if(strlen($newSellerLocation) > 32) {
			throw(new \RangeException("seller location content too large"));
		}
		// store the seller location content
		$this->sellerLocation = $newSellerLocation;
	}


	/**
	 * accessor method for seller on etsy since
	 *
	 * @return string value of seller on etsy since
	 **/
	public function getSellerOnEtsySince(): string {
		return ($this->sellerOnEtsySince);
	}

	/**
	 * mutator method for seller on etsy since
	 *
	 * @param string $newSellerOnEtsySince new value of seller  on etsy since
	 * @throws \InvalidArgumentException if $newSellerOnEtsySince is not a string or insecure
	 * @throws \RangeException if $newSellerOnEtsySince is a date that does not exist
	 * @throws \TypeError if $newSellerOnEtsySince is not a string
	 **/
	public function setSellerOnEtsySince(string $newSellerOnEtsySince): void {
		// verify the Seller on etsy since content is secure
		$newSellerSellerOnEtsySince = trim($newSellerOnEtsySince);
		$newSellerSellerOnEtsySince = filter_var($newSellerOnEtsySince, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newSellerOnEtsySince) === true) {
			throw(new \InvalidArgumentException("seller on etsy since date content is empty or insecure"));
		}
		// store the like date using the ValidateDate trait
		try {
			$newSellerOnEtsySince = self::validateDate($newSellerOnEtsySince);
		} catch(\InvalidArgumentException | \RangeException $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// store the seller on etsy since content
		$this->sellerOnEtsySince = $newSellerOnEtsySince;
	}
}