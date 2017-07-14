-- this is a comment in SQL (yes, the space is needed!)
-- these statements will drop the tables and re-add them
-- this is akin to reformatting and reinstalling Windows (OS X never needs a reinstall...) ;)
-- never ever ever ever ever ever ever ever ever ever ever ever ever ever ever ever ever ever ever ever
-- do this on live data!!!!
DROP TABLE IF EXISTS item;
DROP TABLE IF EXISTS seller;


-- the CREATE TABLE function is a function that takes tons of arguments to layout the table's schema
CREATE TABLE seller (
	-- this creates the attribute for the primary key
	-- auto_increment tells mySQL to number them {1, 2, 3, ...}
	-- not null means the attribute is required!
	sellerId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	sellerShopOwnerName VARCHAR(32) NOT NULL,
	sellerShopName VARCHAR(32) NOT NULL,
	sellerLocation VARCHAR(32) NOT NULL,
	sellerOnEtsySince DATE NOT NULL ,
	-- to make sure duplicate data cannot exist, create a unique index
	-- to make something optional, exclude the not null
	UNIQUE(sellerShopName),
	-- this officiates the primary key for the entity
	PRIMARY KEY(sellerId)
);

-- create the item entity
CREATE TABLE item (
	-- this is for yet another primary key...
	itemId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	-- this is for a foreign key; auto_incremented is omitted by design
	sellerId INT UNSIGNED NOT NULL,
	itemName VARCHAR(140) NOT NULL,
	itemPrice DECIMAL (10,2) NOT NULL,
	itemQuantity INT NOT NULL,
	itemOverview VARCHAR(255) NOT NULL,
	itemDetails VARCHAR(3000) NOT NULL,
	itemShippingPolicies VARCHAR(255) NOT NULL,
	-- this creates an index before making a foreign key
	INDEX(sellerId),
	-- this creates the actual foreign key relation
	FOREIGN KEY(sellerId) REFERENCES seller(sellerId),
	-- and finally create the primary key
	PRIMARY KEY(itemId)
);
