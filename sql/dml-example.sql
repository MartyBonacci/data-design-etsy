INSERT INTO seller(sellerShopOwnerName, sellerShopName, sellerLocation, sellerOnEtsySince)
VALUES ("Fred","Fred's Shop","SLC, UT","2015-02-12");

SET @lastSellerId = LAST_INSERT_ID();

INSERT INTO item(sellerId, itemName, itemPrice, itemQuantity, itemOverview, itemDetails, itemShippingPolicies)
VALUES (@lastSellerId,"Widget 1",49.95,1,"Wicked Awesome Widget","This widget bla bla bla blabla.","We will ship this widget the slowest way posible.");


INSERT INTO seller(sellerShopOwnerName, sellerShopName, sellerLocation, sellerOnEtsySince)
VALUES ("Susan","Sussn's Shop","Boston, MA","2012-10-22");

INSERT INTO item(sellerId, itemName, itemPrice, itemQuantity, itemOverview, itemDetails, itemShippingPolicies)
VALUES ((SELECT max(sellerId) FROM seller),"Fidget 1",11.99,2,"Fidget for hours","This fidget will make you twitch for hours","We will ship your new fidget within one hour");

INSERT INTO item(sellerId, itemName, itemPrice, itemQuantity, itemOverview, itemDetails, itemShippingPolicies)
VALUES ((SELECT max(sellerId) FROM seller),"Stupid Item",99999996,6,"Junk","This item shouldn't be here","We won't ship this item");


INSERT INTO seller(sellerShopOwnerName, sellerShopName, sellerLocation, sellerOnEtsySince)
VALUES ("Bob","Bob's Shop","Seatle, WA","2016-10-04");

INSERT INTO item(sellerId, itemName, itemPrice, itemQuantity, itemOverview, itemDetails, itemShippingPolicies)
VALUES ((SELECT max(sellerId) FROM seller),"Smidgen 1",99.91,6,"just a smidgen","it may be small but its the best","It's so small we can just throw it to you");


SELECT sellerId,sellerShopOwnerName,sellerShopName,sellerLocation,sellerOnEtsySince
FROM seller WHERE sellerShopOwnerName="Fred";

SELECT sellerId,sellerShopOwnerName,sellerShopName,sellerLocation,sellerOnEtsySince
FROM seller WHERE sellerShopOwnerName="Susan";

SELECT sellerId,sellerShopOwnerName,sellerShopName,sellerLocation,sellerOnEtsySince
FROM seller WHERE sellerShopOwnerName="Bob";

SELECT sellerId,itemId,itemName,itemPrice,itemQuantity,itemOverview,itemDetails,itemShippingPolicies
FROM item WHERE sellerId = (SELECT min(sellerId)FROM seller);

SELECT sellerId,itemId,itemName,itemPrice,itemQuantity,itemOverview,itemDetails,itemShippingPolicies
FROM item WHERE sellerId = 1+ (SELECT min(sellerId)FROM seller);

SELECT sellerId,itemId,itemName,itemPrice,itemQuantity,itemOverview,itemDetails,itemShippingPolicies
FROM item WHERE sellerId = (SELECT max(sellerId)FROM seller);


UPDATE seller SET sellerShopName="Susan's Shop"
WHERE sellerShopOwnerName="Susan";

DELETE FROM item WHERE itemOverview LIKE "%Jun%";

SELECT sellerId,sellerShopOwnerName,sellerShopName,sellerLocation,sellerOnEtsySince
FROM seller WHERE sellerShopOwnerName="Susan";

SELECT sellerId,itemId,itemName,itemPrice,itemQuantity,itemOverview,itemDetails,itemShippingPolicies
FROM item WHERE sellerId = 1+ (SELECT min(sellerId)FROM seller);
