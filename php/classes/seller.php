<?php
namespace Edu\Cnm\DataDesign;

require_once("autoload.php");
/*seller class*/

/**
 * Create Etsy seller class
 *
 * seller class which defines the seller Id, ShopOwnerName, ShopName, Location, and OnEtsySince date
 *
 * @author MartyBonacci <mbonacci@@cnm.edu>
 * @version 1.0.0
 **/
class seller implements \JsonSerializable {
	use ValidateDate;
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

	/**
	 * inserts this Seller into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo): void {
		// enforce the sellerId is null (i.e., don't insert a seller that already exists)
		if($this->sellerId !== null) {
			throw(new \PDOException("not a new seller"));
		}

		// create query template
		$query = "INSERT INTO item(sellerShopOwnerName, sellerShopName, sellerLocation, sellerOnEtsySince) VALUES(:sellerShopOwnerName, :sellerShopName, :sellerLocation, :sellerOnEtsySince)";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$parameters = ["sellerShopOwnerName" => $this->sellerShopOwnerName, "sellerShopName" => $this->sellerShopName, "sellerLocation" => $this->sellerLocation, "sellerOnEtsySince" => $this->sellerOnEtsySince];
		$statement->execute($parameters);

		// update the null sellerId with what mySQL just gave us
		$this->sellerId = intval($pdo->lastInsertId());
	}

	/**
	 * deletes this Seller from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function delete(\PDO $pdo): void {
		// enforce the sellerId is not null (i.e., don't delete a seller that hasn't been inserted)
		if($this->sellerId === null) {
			throw(new \PDOException("unable to delete a seller that does not exist"));
		}

		// create query template
		$query = "DELETE FROM seller WHERE sellerId = :sellerId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holder in the template
		$parameters = ["sellerId" => $this->sellerId];
		$statement->execute($parameters);
	}

	/**
	 * updates this seller in mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function update(\PDO $pdo): void {
		// enforce the sellerId is not null (i.e., don't update a seller that hasn't been inserted)
		if($this->sellerId === null) {
			throw(new \PDOException("unable to update a seller that does not exist"));
		}

		// create query template
		$query = "UPDATE seller SET sellerShopOwnerName = :sellerShopOwnerName, sellerShopName = :sellerShopName, sellerLocation = :sellerLocation, sellerOnEtsySince = :sellerOnEtsySince WHERE sellerId = :sellerId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$parameters = ["sellerShopOwnerName" => $this->sellerShopOwnerName, "sellerShopName" => $this->sellerShopName, "sellerLocation" => $this->sellerLocation, "sellerOnEtsySince" => $this->sellerOnEtsySince];
		$statement->execute($parameters);
	}

	/**
	 * gets the seller by sellerId
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param int $sellerId seller id to search for
	 * @return Seller|null Seller found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getSellerBySellerId(\PDO $pdo, int $sellerId): ?Seller {
		// sanitize the sellerId before searching
		if($sellerId <= 0) {
			throw(new \PDOException("seller id is not positive"));
		}

		// create query template
		$query = "SELECT sellerId, sellerShopOwnerName, sellerShopName, sellerLocation, sellerOnEtsySince FROM seller WHERE sellerId = :sellerId";
		$statement = $pdo->prepare($query);

		// bind the seller id to the place holder in the template
		$parameters = ["sellerId" => $sellerId];
		$statement->execute($parameters);

		// grab the seller from mySQL
		try {
			$seller = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$seller = new Seller($row["sellerId"], $row["sellerShopOwnerName"], $row["sellerShopName"], $row["sellerLocation"], $row["sellerOnEtsySince"]);
			}
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($seller);
	}

	/**
	 * gets the Seller by seller Shop Owner Name
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string $sellerShopOwnerName seller Shop Owner Name to search for
	 * @return \SplFixedArray SplFixedArray of Sellers found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getSellerBySellerShopOwnerName(\PDO $pdo, string $sellerShopOwnerName): \SPLFixedArray {
		// sanitize the seller shop owner name before searching
		$sellerShopOwnerName = trim($sellerShopOwnerName);
		$sellerShopOwnerName = filter_var($sellerShopOwnerName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($sellerShopOwnerName) === true) {
			throw(new \PDOException("seller shop owner name is invalid"));
		}

		// escape any mySQL wild cards
		$sellerShopOwnerName = str_replace("_", "\\_", str_replace("%", "\\%", $sellerShopOwnerName));

		// create query template
		$query = "SELECT sellerId, sellerShopOwnerName, sellerShopName, sellerLocation, sellerOnEtsySince FROM seller WHERE sellerShopOwnerName LIKE :sellerShopOwnerName";
		$statement = $pdo->prepare($query);

		// bind the seller content to the place holder in the template
		$sellerShopOwnerName = "%$sellerShopOwnerName%";
		$parameters = ["sellerShopOwnerName" => $sellerShopOwnerName];
		$statement->execute($parameters);

		// build an array of sellers
		$sellers = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$seller = new Seller($row["sellerId"], $row["sellerShopOwnerName"], $row["sellerShopName"], $row["sellerLocation"], $row["sellerOnEtsySince"]);
				$sellers[$sellers->key()] = $seller;
				$sellers->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($sellers);
	}


	/**
	 * gets the Seller by seller Location
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string $sellerLocation seller location to search for
	 * @return \SplFixedArray SplFixedArray of Sellers found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getSellerBySellerLocation(\PDO $pdo, string $sellerLocation): \SPLFixedArray {
		// sanitize the seller location before searching
		$sellerLocation = trim($sellerLocation);
		$sellerLocation = filter_var($sellerLocation, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($sellerLocation) === true) {
			throw(new \PDOException("seller shop owner name is invalid"));
		}

		// escape any mySQL wild cards
		$sellerLocation = str_replace("_", "\\_", str_replace("%", "\\%", $sellerLocation));

		// create query template
		$query = "SELECT sellerId, sellerShopOwnerName, sellerShopName, sellerLocation, sellerOnEtsySince FROM seller WHERE sellerLocation LIKE :sellerLocation";
		$statement = $pdo->prepare($query);

		// bind the seller content to the place holder in the template
		$sellerLocation = "%$sellerLocation%";
		$parameters = ["sellerLocation" => $sellerLocation];
		$statement->execute($parameters);

		// build an array of sellers
		$sellers = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$seller = new Seller($row["sellerId"], $row["sellerShopOwnerName"], $row["sellerShopName"], $row["sellerLocation"], $row["sellerOnEtsySince"]);
				$sellers[$sellers->key()] = $seller;
				$sellers->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($sellers);
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
