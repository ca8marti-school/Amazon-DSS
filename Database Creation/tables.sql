CREATE TABLE customer (
    customerID int,
    customerName VARCHAR (30),
    customerAddress VARCHAR (30),
    customerNumber INT,
    PRIMARY KEY (customerID)
);

CREATE TABLE product (
    productID int,
    productName VARCHAR (30),
    bestReview VARCHAR (30),
    worstReview VARCHAR (30),
    price float(2),
    deliveryTime VARCHAR(30),
    os VARCHAR(10),
    RAM VARCHAR(10),
    itemWeight float (2),
    itemDimensions VARCHAR(30),
    colour VARCHAR(10),
    img VARCHAR(100)
    PRIMARY KEY (productID)
);

CREATE TABLE warehouse (
    productSourceID int,
    warehouseName VARCHAR (30),
    warehouseAddress VARCHAR (30),
    warehouseNumber INT,
    PRIMARY KEY (productSourceID)
);

CREATE TABLE search (
    customerID int,
    productID int, 
    keyword VARCHAR(20),
    PRIMARY KEY (customerID, productID),
    FOREIGN KEY (customerID) REFERENCES customer(customerID),
    FOREIGN KEY (productID) REFERENCES product(productID)
    on UPDATE CASCADE 
);

CREATE TABLE supplier (
    productSourceID int,
    productID int, 
    supplierCompany VARCHAR(20),
    PRIMARY KEY (productSourceID, productID),
    FOREIGN KEY (productSourceID) REFERENCES warehouse(productSourceID),
    FOREIGN KEY (productID) REFERENCES product(productID)
    on UPDATE CASCADE 
);

CREATE TABLE comparisonList (
    listNumber int,
    customerID int,
    productID int, 
    lastUpdatedDate date,
    PRIMARY KEY(listNumber, customerID),
    FOREIGN KEY(customerID) REFERENCES customer(customerID),
    FOREIGN KEY(productID) REFERENCES product(productID)
);