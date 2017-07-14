-- this is a comment in SQL (yes, the space is needed!)
-- these statements will drop the tables and re-add them
-- this is akin to reformatting and reinstalling Windows (OS X never needs a reinstall...) ;)
-- never ever ever ever ever ever ever ever ever ever ever ever ever ever ever ever ever ever ever ever
-- do this on live data!!!!
DROP TABLE IF EXISTS seller;
DROP TABLE IF EXISTS item;


-- the CREATE TABLE function is a function that takes tons of arguments to layout the table's schema
CREATE TABLE seller (
	-- this creates the attribute for the primary key
	-- auto_increment tells mySQL to number them {1, 2, 3, ...}
	-- not null means the attribute is required!
	sellerId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileActivationToken CHAR(32),
	sellerShopOwnerName VARCHAR(32) NOT NULL,
	sellerShopName VARCHAR(32) NOT NULL,
	sellerLocation VARCHAR(32) NOT NULL,
	sellerOnEtsySince DATE
	-- to make sure duplicate data cannot exist, create a unique index
	profileEmail VARCHAR(128) NOT NULL,
	profileHash	CHAR(128) NOT NULL,
	-- to make something optional, exclude the not null
	profilePhone VARCHAR(32),
	profileSalt CHAR(64) NOT NULL,
	UNIQUE(sellerShopName),
	UNIQUE(sellerShopOwnerName),
	-- this officiates the primary key for the entity
	PRIMARY KEY(sellerId)
);

-- create the tweet entity
CREATE TABLE tweet (
	-- this is for yet another primary key...
	tweetId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	-- this is for a foreign key; auto_incremented is omitted by design
	tweetProfileId INT UNSIGNED NOT NULL,
	tweetContent VARCHAR(140) NOT NULL,
	tweetDate DATETIME(6) NOT NULL,
	-- this creates an index before making a foreign key
	INDEX(tweetProfileId),
	-- this creates the actual foreign key relation
	FOREIGN KEY(tweetProfileId) REFERENCES profile(profileId),
	-- and finally create the primary key
	PRIMARY KEY(tweetId)
);

-- create the like entity (a weak entity from an m-to-n for profile --> tweet)
CREATE TABLE `like` (
	-- these are not auto_increment because they're still foreign keys
	likeProfileId INT UNSIGNED NOT NULL,
	likeTweetId INT UNSIGNED NOT NULL,
	likeDate DATETIME(6) NOT NULL,
	-- index the foreign keys
	INDEX(likeProfileId),
	INDEX(likeTweetId),
	-- create the foreign key relations
	FOREIGN KEY(likeProfileId) REFERENCES profile(profileId),
	FOREIGN KEY(likeTweetId) REFERENCES tweet(tweetId),
	-- finally, create a composite foreign key with the two foreign keys
	PRIMARY KEY(likeProfileId, likeTweetId)