<?php
namespace Edu\Cnm\DataDesign;

require_once("autoload.php");
/*item class*/
/**
 * Create Etsy item class
 *
 * This class creates items made available for sale on etsy by sellers
 *
 * @author MartyBonacci <mbonacci@@cnm.edu>
 * @version 1.0.0
 **/
class item implements \JsonSerializable {
	use ValidateDate;
	/**
	 * id for this Item; this is the primary key
	 * @var int $itemId
	 **/
	private $itemId;
	/**
	 * id for the seller of this item; this is the foreign key
	 * @var int $sellerId
	 **/
	private $sellerId;
	/**
	 * Item Name of this Item
	 * @var string $itemName
	 **/
	private $itemName;
	/**
	 * Item Price of this Item
	 * @var float $itemPrice
	 **/
	private $itemPrice;
	/**
	 * Item Quantity of this Item
	 * @var int $itemQuantity
	 **/
	private $itemQuantity;
	/**
	 * Item Overview of this Item
	 * @var string $itemOverview
	 **/
	private $itemOverview;
	/**
	 * Item Details of this Item
	 * @var string $itemDetails
	 **/
	private $itemDetails;
	/**
	 * Item Shipping Policies of this Item
	 * @var string $itemShippingPolicies
	 **/
	private $itemShippingPolicies;


	/**
	 * constructor for this Item
	 *
	 * @param int|null $newItemId of this Item or null if a new Item
	 * @param int $newSellerId of this Item
	 * @param string $newItemName string containing Item Name
	 * @param float $newItemPrice float containing Item Price
	 * @param int $newItemQuantity int containing Item Quantity
	 * @param string $newItemOverview string containing Item Overview
	 * @param string $newItemDetails string containing Item Details
 	 * @param string $newItemShippingPolicies string containing Item Shipping Policies
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 **/
	public function __construct(?int $newItemId,int $newSellerId,string $newItemName,float $newItemPrice,int $newItemQuantity,string $newItemOverview,string $newItemDetails,string $newItemShippingPolicies){
		try {
			$this->setItemId($newItemId);
			$this->setSellerId($newSellerId);
			$this->setItemName($newItemName);
			$this->setItemPrice($newItemPrice);
			$this->setItemQuantity($newItemQuantity);
			$this->setItemOverview($newItemOverview);
			$this->setItemDetails($newItemDetails);
			$this->setItemShippingPolicies($newItemShippingPolicies);
		} catch (UnexpectedValueException $exception){
			// rethrow to the caller
			throw (new UnexpectedValueException("Unable to construct Item", 0, $exception));
		}
	}
	
	/**
	 * accessor method for Item Id
	 *
	 * @return int|null value of Item Id
	 **/
	public function getItemId():int {
		return($this->itemId);
	}
	/**
	 * mutator method for item id
	 *
	 * @param int|null $newItemId new value of item id
	 * @throws \RangeException if $newItemId is not positive
	 * @throws \TypeError if $newItemId is not an integer
	 **/
	public function setItemId (?int $newItemId) : void {
		//if seller id is null immediately return it
		if($newItemId === null) {
			$this->itemId = null;
			return;
		}
		//verify the item id is positive
		if($newItemId <= 0) {
			throw(new \RangeException("item id is not positive"));
		}
		//store the user id
		$this->itemId = $newItemId;
	}




	/**
	 * accessor method for seller id
	 *
	 * @return int value of seller id
	 **/
	public function getSellerId(): int {
		return($this->sellerId);
	}

	/**
	 * mutator method for seller id
	 *
	 * @param int $newSellerId new value of seller id
	 * @throws \RangeException if $newSellerId is not positive
	 * @throws \TypeError if $newSellerId is not an integer
	 **/
	public function setSellerId(int $newSellerId) : void {
		// verify the seller id is positive
		if($newSellerId <= 0) {
			throw(new \RangeException("seller id is not positive"));
		}
		// convert and store the seller id
		$this->sellerId = $newSellerId;
	}




	/**
	 * accessor method for item name
	 *
	 * @return string value of item name
	 **/
	public function getItemName(): string {
		return($this->itemName);
	}
	/**
	 * mutator method for item name
	 *
	 * @param string $newItemName new value of item name
	 * @throws \InvalidArgumentException if $newItemName is not a string or insecure
	 * @throws \RangeException if $newItemName is > 140 characters
	 * @throws \TypeError if $newItemName is not a string
	 **/
	public function setItemName(string $newItemName): void {
		// verify the item Name content is secure
		$newItemName = trim($newItemName);
		$newItemName = filter_var($newItemName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newItemName) === true) {
			throw(new \InvalidArgumentException("item name content is empty or insecure"));
		}
		// verify the item name content will fit in the database
		if(strlen($newItemName) > 140) {
			throw(new \RangeException("item name content too large"));
		}
		// store the item name content
		$this->itemName = $newItemName;
	}



	/**
	 * accessor method for item price
	 *
	 * @return string value of item price
	 **/
	public function getItemPrice() : float{
		return($this->itemPrice);
	}
	/**
	 * mutator method for item price
	 *
	 * @param int $newItemPrice new value of item price
	 * @throws \RangeException if $newItemPrice is not positive
	 * @throws \TypeError if $newItemPrice is not a float
	 **/
	public function setItemPrice(float $newItemPrice): void {
		// verify the item price is positive
		if($newItemPrice <= 0) {
			throw(new \RangeException("item price is not positive"));
		}
		// convert and store the item price
		$this->itemPrice = $newItemPrice;
	}


	/**
	 * accessor method for item quantity
	 *
	 * @return string value of item quantity
	 **/
	public function getItemQuantity(): int {
		return($this->itemQuantity);
	}
	/**
	 * mutator method for item quantity
	 *
	 * @param int $newItemQuantity new value of item quantity
	 * @throws \RangeException if $newItemQuantity is not positive
	 * @throws \TypeError if $newItemQuantity is not an integer
	 **/
	public function setItemQuantity(int $newItemQuantity): void {
		// verify the item quantity is positive
		if($newItemQuantity <= 0) {
			throw(new \RangeException("item quantity is not positive"));
		}
		// convert and store the item quantity
		$this->itemQuantity = $newItemQuantity;
	}

	/**
	 * accessor method for item overview
	 *
	 * @return string value of item overview
	 **/
	public function getItemOverview(): string {
		return($this->itemOverview);
	}
	/**
	 * mutator method for item Overview
	 *
	 * @param string $newItemName new value of item name
	 * @throws \InvalidArgumentException if $newItemName is not a string or insecure
	 * @throws \RangeException if $newItemName is > 255 characters
	 * @throws \TypeError if $newItemName is not a string
	 **/
	public function setItemOverview(string $newItemOverview): void {
		// verify the item overview content is secure
		$newItemOverview = trim($newItemOverview);
		$newItemOverview = filter_var($newItemOverview, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newItemOverview) === true) {
			throw(new \InvalidArgumentException("item overview content is empty or insecure"));
		}
		// verify the item overview content will fit in the database
		if(strlen($newItemOverview) > 255) {
			throw(new \RangeException("item overview content too large"));
		}
		// store the item overview content
		$this->itemOverview = $newItemOverview;
	}

	/**
	 * accessor method for item details
	 *
	 * @return string value of item details
	 **/
	public function getItemDetails(): string {
		return($this->itemDetails);
	}
	/**
	 * mutator method for item details
	 *
	 * @param string $newItemDetails new value of item details
	 * @throws \InvalidArgumentException if $newItemDetails is not a string or insecure
	 * @throws \RangeException if $newItemDetails is > 3000 characters
	 * @throws \TypeError if $newItemDetails is not a string
	 **/
	public function setItemDetails(string $newItemDetails): void {
		// verify the item details content is secure
		$newItemDetails = trim($newItemDetails);
		$newItemDetails = filter_var($newItemDetails, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newItemDetails) === true) {
			throw(new \InvalidArgumentException("item details content is empty or insecure"));
		}
		// verify the item details content will fit in the database
		if(strlen($newItemDetails) > 3000) {
			throw(new \RangeException("item details content too large"));
		}
		// store the item details content
		$this->itemDetails = $newItemDetails;
	}

	/**
	 * accessor method for item shipping policies
	 *
	 * @return string value of item shipping policies
	 **/
	public function getItemShippingPolicies(): string {
		return($this->itemShippingPolicies);
	}
	/**
	 * mutator method for item shipping policies
	 *
	 * @param string $newItemShippingPolicies new value of item shipping policies
	 * @throws \InvalidArgumentException if $newItemShippingPolicies is not a string or insecure
	 * @throws \RangeException if $newItemShippingPolicies is > 255 characters
	 * @throws \TypeError if $newItemShippingPolicies is not a string
	 **/
	public function setItemShippingPolicies(string $newItemShippingPolicies): void {
		// verify the item shipping policies content is secure
		$newItemShippingPolicies = trim($newItemShippingPolicies);
		$newItemShippingPolicies = filter_var($newItemShippingPolicies, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newItemShippingPolicies) === true) {
			throw(new \InvalidArgumentException("item shipping policies content is empty or insecure"));
		}
		// verify the item shipping policies content will fit in the database
		if(strlen($newItemShippingPolicies) > 255) {
			throw(new \RangeException("item shipping policies content too large"));
		}
		// store the item shipping policies content

		$this->itemShippingPolicies = $newItemShippingPolicies;
	}






	/**
	 * inserts this Item into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo): void {
		// enforce the itemId is null (i.e., don't insert a seller that already exists)
		if($this->sellerId !== null) {
			throw(new \PDOException("not a new seller"));
		}

		// create query template
		$query = "INSERT INTO item(sellerId, itemName, itemPrice, itemQuantity, itemOverview, itemDetails, itemShippingPolicies ) VALUES(:sellerId, :itemName, :itemPrice, :itemQuantity, :itemOverview, :itemDetails, :itemShippingPolicies )";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$parameters = ["sellerId" => $this->sellerId, "itemName" => $this->itemName, "itemPrice" => $this->itemPrice, "itemQuantity" => $this->itemQuantity, "itemOverview" => $this->itemOverview, "itemDetails" => $this->itemDetails, "itemShippingPolicies" => $this->itemShippingPolicies];
		$statement->execute($parameters);

		// update the null sellerId with what mySQL just gave us
		$this->sellerId = intval($pdo->lastInsertId());
	}

	/**
	 * deletes this Item from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function delete(\PDO $pdo): void {
		// enforce the itemId is not null (i.e., don't delete a item that hasn't been inserted)
		if($this->itemId === null) {
			throw(new \PDOException("unable to delete an item that does not exist"));
		}

		// create query template
		$query = "DELETE FROM item WHERE itemId = :itemId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holder in the template
		$parameters = ["itemId" => $this->itemId];
		$statement->execute($parameters);
	}

	/**
	 * updates this item in mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function update(\PDO $pdo): void {
		// enforce the itemId is not null (i.e., don't update an item that hasn't been inserted)
		if($this->itemId === null) {
			throw(new \PDOException("unable to update a item that does not exist"));
		}

		// create query template
		$query = "UPDATE item SET sellerId = :sellerId, itemName = :itemName, itemPrice = :itemPrice, itemQuantity = :itemQuantity, itemOverview = :itemOverview, itemDetails = :itemDetails, itemShippingPolicies = :itemShippingPolicies  WHERE itemId = :itemId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$parameters = ["sellerId" => $this->sellerId, "itemName" => $this->itemName, "itemPrice" => $this->itemPrice, "itemQuantity" => $this->itemQuantity, "itemOverview" => $this->itemOverview, "itemDetails" => $this->itemDetails, "itemShippingPolicies" => $this->itemShippingPolicies];
		$statement->execute($parameters);
	}

	/**
	 * gets the item by sellerId
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param int $itemId item id to search for
	 * @return Item|null Seller found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getItemByItemId(\PDO $pdo, int $itemId): ?Item {
		// sanitize the sellerId before searching
		if($itemId <= 0) {
			throw(new \PDOException("item id is not positive"));
		}

		// create query template
		$query = "SELECT itemId, sellerId, itemName, itemPrice, itemQuantity, itemOverview, itemDetails, itemShippingPolicies FROM item WHERE itemId = :itemId";
		$statement = $pdo->prepare($query);

		// bind the seller id to the place holder in the template
		$parameters = ["itemId" => $itemId];
		$statement->execute($parameters);

		// grab the seller from mySQL
		try {
			$item = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$seller = new Seller($row["sellerId"], $row["sellerShopOwnerName"], $row["sellerShopName"], $row["sellerLocation"], $row["sellerOnEtsySince"]);
			}
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($item);
	}





	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	public function jsonSerialize() {
		$fields = get_object_vars($this);
		//format the date so that the front end can consume it
		$fields["sellerOnEtsySince"] = round(floatval($this->sellerOnEtsySince->format("U.u")) * 1000);
		return($fields);
	}
}