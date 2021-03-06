#########################
# RUHungry Database Script
#########################
DROP DATABASE IF EXISTS ruhungry;
CREATE DATABASE ruhungry;
 
USE ruhungry;
 
#############
# Create Tables
#############
 
#Create customer_info table
DROP TABLE  IF EXISTS customer_info;
CREATE TABLE customer_info (
  Username VARCHAR(50) NOT NULL,
  First_Name VARCHAR(30) NULL,
  Last_Name VARCHAR(30) NULL,
  Email VARCHAR(50) NULL,
  Password VARCHAR(50) NULL,
  PRIMARY KEY (Username));
 
#Create administrator_users table
DROP TABLE IF EXISTS administrator_users;
CREATE TABLE administrator_users (
  Admin_ID INT NOT NULL AUTO_INCREMENT,
  Username VARCHAR(50) NULL,
  First_Name VARCHAR(30) NULL,
  Last_Name VARCHAR(30) NULL,
  Email VARCHAR(50) NULL,
  Password VARCHAR(50) NULL,
  PRIMARY KEY (Admin_ID));
 
#Create restaurant_info table
DROP TABLE IF EXISTS restaurant_info;
CREATE TABLE restaurant_info (
  Restrt_ID INT NOT NULL AUTO_INCREMENT,
  Restrt_Name VARCHAR(50) NOT NULL,
  Area VARCHAR(50) NULL,
  Ship_Hours VARCHAR(50) NULL,
  Address VARCHAR(100) NULL,
  Restrt_Type VARCHAR(50) NULL,
  Description VARCHAR(200) NULL,
  Img VARCHAR(200) NULL,
  PRIMARY KEY (Restrt_ID));
 
#Create inventory_info table
DROP TABLE IF EXISTS inventory_info;
CREATE TABLE inventory_info (
  Item_ID INT NOT NULL AUTO_INCREMENT,
  Restrt_ID INT NOT NULL,
  Item_Name VARCHAR(50) NOT NULL,
  Item_Description VARCHAR(200) NULL,
  Price FLOAT NULL,
  Date_Added DATETIME NULL,
  Category VARCHAR(50) NULL,
  
  PRIMARY KEY (Item_ID),
  FOREIGN key (Restrt_ID) references restaurant_info(Restrt_ID));
 
#Create item_reviews table
DROP TABLE IF EXISTS item_reviews;
CREATE TABLE item_reviews (
  Review_ID INT NOT NULL AUTO_INCREMENT,
  Username VARCHAR(50) NULL,
  Restrt_ID INT NOT NULL,
  Review_Date DATETIME NULL,
  Rate INT NULL,
  Description VARCHAR(1200) NULL,
  PRIMARY KEY (Review_ID),
  FOREIGN key (Username) references customer_info(Username),
  FOREIGN key (Restrt_ID) references restaurant_info(Restrt_ID));
 
#Create shopping_cart_info table
DROP TABLE IF EXISTS shopping_cart_info;
CREATE TABLE shopping_cart_info (
  Cart_ID INT NOT NULL AUTO_INCREMENT,
  Username VARCHAR(50) NOT NULL,
  Item_ID INT NOT NULL,
  Restrt_ID INT NOT NULL,
  Quantity INT NULL,
  PRIMARY KEY (Cart_ID),
  FOREIGN key (Item_ID) references inventory_info(Item_ID),
  FOREIGN key (Restrt_ID) references restaurant_info(Restrt_ID));
 
#Create credit_card_info table
DROP TABLE IF EXISTS credit_card_info;
CREATE TABLE credit_card_info (
  Card_ID INT NOT NULL AUTO_INCREMENT,
  Username VARCHAR(50) NULL,
  Card_Account VARCHAR(50) NULL,
  Card_Type VARCHAR(15) NULL,
  Card_Holder VARCHAR(50) NULL,
  Card_Expire VARCHAR(50) NULL,
  First_Name VARCHAR(50) NOT NULL,
  Last_Name VARCHAR(50) NOT NULL,
  Address1 VARCHAR(100) NOT NULL,
  Address2 VARCHAR(100) NULL,
  City VARCHAR(50) NOT NULL,
  State_USA VARCHAR(50) NOT NULL,
  Zip VARCHAR(50) NOT NULL,
  PRIMARY KEY (Card_ID),
  FOREIGN key (Username) references customer_info (Username));

#Create credit_card_hotlist table
DROP TABLE IF EXISTS credit_card_hotlist;
CREATE TABLE credit_card_hotlist (
  Hotlist_ID INT NOT NULL AUTO_INCREMENT,
  Username VARCHAR(50) NULL,
  Card_Account VARCHAR(50) NULL,
  Card_Type VARCHAR(15) NULL,
  Card_Holder VARCHAR(50) NULL,
  Card_Expire VARCHAR(50) NULL,
  Bill_Address VARCHAR(150) NULL,
  PRIMARY KEY (Hotlist_ID),
  FOREIGN key (Username) references customer_info (Username));
  
#Create checkout_info table
DROP TABLE IF EXISTS checkout_info;
CREATE TABLE checkout_info (
  Order_ID INT NOT NULL AUTO_INCREMENT,
  OrderNO VARCHAR(50) NULL,
  Username VARCHAR(50) NULL,
  Item_ID INT NOT NULL,
  Restrt_ID INT NOT NULL,
  Card_Account VARCHAR(50) NOT NULL,
  Shipping_Address VARCHAR(150) NULL,
  Checkout_Date DATETIME NULL,
  Price FLOAT NULL,
  PRIMARY KEY (Order_ID),
  FOREIGN key (Username) references customer_info (Username),
  FOREIGN key (Item_ID) references inventory_info (Item_ID),
  FOREIGN key (Restrt_ID) references restaurant_info (Restrt_ID));
 
#Create purchase_alerts table
DROP TABLE IF EXISTS purchase_alerts;
CREATE TABLE purchase_alerts (
  Alert_ID INT NOT NULL AUTO_INCREMENT,
  Username VARCHAR(50) NOT NULL,
  Alert_Info VARCHAR(150) NULL,
  Alert_Time DATETIME NULL,
  IP_Record VARCHAR(50) NULL,
  First_Name VARCHAR(30) NULL,
  Last_Name VARCHAR(30) NULL,
  Email VARCHAR(50) NULL,
  shipping_address VARCHAR(200) NULL,
  Card_Account VARCHAR(50) NULL,
  Card_Holder VARCHAR(50) NULL,  
  PRIMARY KEY (Alert_ID),
  FOREIGN key (Username) references customer_info (Username));

  
#Create shipping_address table
DROP TABLE IF EXISTS shipping_address;
CREATE TABLE shipping_address (
  shipping_ID INT NOT NULL AUTO_INCREMENT,
  First_Name VARCHAR(50) NOT NULL,
  Last_Name VARCHAR(50) NOT NULL,
  Address1 VARCHAR(100) NOT NULL,
  Address2 VARCHAR(100) NULL,
  City VARCHAR(50) NOT NULL,
  State_USA VARCHAR(50) NOT NULL,
  Zip VARCHAR(50) NOT NULL,
  Username VARCHAR(50) NOT NULL,
  PRIMARY KEY (shipping_ID),
  FOREIGN KEY (Username) references customer_info (Username));
  



#######################
# Insert Test Data
#######################

# customer_info test data
INSERT INTO customer_info (Username, First_Name, Last_Name, Email, Password) VALUES ('lintianlang', 'Tianlang', 'Lin', 'terrylin@gwu.edu', 'test123');
INSERT INTO customer_info (Username, First_Name, Last_Name, Email, Password) VALUES ('chenlongjiu', 'Longjiu', 'Chen', 'stanley_chen@gwu.edu', 'test123');
INSERT INTO customer_info (Username, First_Name, Last_Name, Email, Password) VALUES ('daierzheng', 'Erzheng', 'Dai', 'daierzheng@gwu.edu', 'test123');
INSERT INTO customer_info (Username, First_Name, Last_Name, Email, Password) VALUES ('zhangzhenlin', 'Zhenlin', 'Zhang', 'Zarek@gwu.edu', 'test123');

# administrator_users test data
INSERT INTO administrator_users (Username, First_Name, Last_Name, Email, Password) VALUES ('admin', 'Tianlang', 'Lin', 'terrylin@gwu.edu', 'admin');

# restaurant_info test data
INSERT INTO restaurant_info (Restrt_Name, Area, Ship_Hours, Address, Restrt_Type, Description, Img) VALUES ('XOTaste', 'Arlington', '1', '12451 Army Navy Drive, Arlington, VA', 'Chinese', 'Szechwan cuisine', 'images/product-details/ls.jpg');
INSERT INTO restaurant_info (Restrt_Name, Area, Ship_Hours, Address, Restrt_Type, Description, Img) VALUES ('YoungChow', 'Arlington', '1', '1251 28th, Arlington, VA', 'Chinese', 'Shanghai cuisine', 'images/product-details/youngchow.jpg');
INSERT INTO restaurant_info (Restrt_Name, Area, Ship_Hours, Address, Restrt_Type, Description, Img) VALUES ('Sakura', 'Arlington', '1', '2321 13th, Arlington, VA', 'Japanese', 'Sushi', 'images/product-details/Sakura.jpg');

# inventory_info test data
INSERT INTO inventory_info (Restrt_ID, Item_Name, Item_Description, Price, Date_Added, Category) VALUES (1, 'KongBaoChicken', 'ChickenwithPepper', '12.00', '2014-10-05 00:00:00', 'Chinese');
INSERT INTO inventory_info (Restrt_ID, Item_Name, Item_Description, Price, Date_Added, Category) VALUES (2, 'BeijingBeef', 'BeefwithMushroom', '12.00', '2014-10-05 00:00:00', 'Chinese');
INSERT INTO inventory_info (Restrt_ID, Item_Name, Item_Description, Price, Date_Added, Category) VALUES (3, 'Hunanpork', 'SautePork', '12.00', '2014-10-05 00:00:00', 'Chinese');

# item_reviews test data
INSERT item_reviews (Username, Restrt_ID, Review_Date, Rate, Description) VALUES ('zhangzhenlin', 1, '2014-10-5 12:00:00', '4', 'SPICY enough!!!');
INSERT item_reviews (Username, Restrt_ID, Review_Date, Rate, Description) VALUES ('zhangzhenlin', 2, '2014-10-5 12:00:00', '5', 'Yumme!!!');
INSERT item_reviews (Username, Restrt_ID, Review_Date, Rate, Description) VALUES ('zhangzhenlin', 3, '2014-10-5 12:00:00', '4', 'So delicious!');

#shopping_cart_info test data
INSERT INTO shopping_cart_info (Username , Item_ID , Restrt_ID , Quantity) VALUES ('lintianlang', 2, 1, 1);

INSERT INTO shopping_cart_info (Username , Item_ID , Restrt_ID , Quantity) VALUES ('chenlongjiu', 3, 1, 1);
INSERT INTO shopping_cart_info (Username , Item_ID , Restrt_ID , Quantity) VALUES ('daierzheng', 1, 1, 1);

# credit_card_info test data
INSERT INTO credit_card_info (Username, Card_Account, Card_Type, Card_Holder, Card_Expire, First_Name, Last_Name, Address1, Address2, City, State_USA, Zip) VALUES ('lintianlang', '0000012345678901', 'visa', 'Tianlang Lin', '2018-10-05 00:00:00', 'Tianlang', 'Lin', '1100 S Joyce St', 'Apt 123', 'Arlington', 'VA', '22202');
INSERT INTO credit_card_info (Username, Card_Account, Card_Type, Card_Holder, Card_Expire, First_Name, Last_Name, Address1, Address2, City, State_USA, Zip) VALUES ('chenlongjiu', '0000012345678902', 'visa', 'Longjiu Chen', '2018-09-05 00:00:00', 'Longjiu', 'Chen', '1500 S Joyce St', 'Apt 253', 'Arlington', 'VA', '22202');
INSERT INTO credit_card_info (Username, Card_Account, Card_Type, Card_Holder, Card_Expire, First_Name, Last_Name, Address1, Address2, City, State_USA, Zip) VALUES ('daierzheng', '0000012345678903', 'visa', 'Erzheng Dai', '2018-07-05 00:00:00', 'Erzheng', 'Dai', '1700 S Eads St', 'Apt 1142', 'Arlington', 'VA', '22202');
INSERT INTO credit_card_info (Username, Card_Account, Card_Type, Card_Holder, Card_Expire, First_Name, Last_Name, Address1, Address2, City, State_USA, Zip) VALUES ('zhangzhenlin', '0000012345678904', 'visa', 'Zhenlin Zhang', '2018-06-05 00:00:00', 'Zhenlin', 'Zhang', '1900 S Eads St', 'Apt 825', 'Arlington', 'VA', '22202');

# credit_card_hotlist test data
INSERT INTO credit_card_hotlist (Username, Card_Account, Card_Type, Card_Holder, Card_Expire, Bill_Address) VALUES ('lintianlang', '0000012345678901', 'visa', 'Tianlang Lin', '2018-10-05 00:00:00', '1400 S Joyce St, Arlington, VA 22202');
INSERT INTO credit_card_hotlist (Username, Card_Account, Card_Type, Card_Holder, Card_Expire, Bill_Address) VALUES ('chenlongjiu', '0000012345678902', 'visa', 'Longjiu Chen', '2018-09-05 00:00:00', '1500 S Joyce St, Arlington, VA 22202');
INSERT INTO credit_card_hotlist (Username, Card_Account, Card_Type, Card_Holder, Card_Expire, Bill_Address) VALUES ('daierzheng', '0000012345678903', 'visa', 'Erzheng Dai', '2018-07-05 00:00:00', '1700 S Eads St, Arlington, VA 22202');
INSERT INTO credit_card_hotlist (Username, Card_Account, Card_Type, Card_Holder, Card_Expire, Bill_Address) VALUES ('zhangzhenlin', '0000012345678904', 'visa', 'Zhenlin Zhang', '2018-06-05 00:00:00', '1900 S Eads St, Arlington, VA 22202');

#checkout_info test data


#purchase_alerts test data
INSERT INTO purchase_alerts (Alert_Info, Alert_Time, IP_Record, Username) VALUES('Verification Failed', '2014-10-04 13:09:00', '122.21.10.76', 'lintianlang');
INSERT INTO purchase_alerts (Alert_Info, Alert_Time, IP_Record, Username) VALUES('Transfer Failed', '2014-10-05 11:45:00', '112.17.102.19', 'lintianlang');
INSERT INTO purchase_alerts (Alert_Info, Alert_Time, IP_Record, Username) VALUES('Transfer Failed', '2014-10-05 21:12:00', '107.54.12.87', 'daierzheng');

#shipping_address test data
INSERT INTO shipping_address (First_Name, Last_Name, Address1, Address2, City, State_USA, Zip, Username) VALUES('Tianlang', 'Lin', '1100 S Joyce St', 'Apt 123', 'Arlington', 'VA', '22202', 'lintianlang');
INSERT INTO shipping_address (First_Name, Last_Name, Address1, Address2, City, State_USA, Zip, Username) VALUES('Longjiu', 'Chen', '1500 S Joyce St', 'Apt 253', 'Arlington', 'VA', '22202', 'chenlongjiu');
INSERT INTO shipping_address (First_Name, Last_Name, Address1, Address2, City, State_USA, Zip, Username) VALUES('Erzheng', 'Dai', '1700 S Eads St', 'Apt 1142', 'Arlington', 'VA', '22202', 'daierzheng');
INSERT INTO shipping_address (First_Name, Last_Name, Address1, Address2, City, State_USA, Zip, Username) VALUES('Zhenlin', 'Zhang', '1900 S Eads St', 'Apt 825', 'Arlington', 'VA', '22202', 'zhangzhenlin');
