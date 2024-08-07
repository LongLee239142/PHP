CREATE DATABASE demo_db_php;
USE demo_db_php;
CREATE TABLE product(
   produc_id INT AUTO_INCREMENT PRIMARY KEY,
   name_ VARCHAR(255) NOT NULL,
   description_ TEXT,
   price DECIMAL (10,2) NOT NULL,
   stock_quantity INT DEFAULT 0,
   manufacturer VARCHAR(255),
   create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   is_active BOOLEAN DEFAULT TRUE
);

insert into product(name_, description_, price, stock_quantity, manufacturer, is_active)
values('iphone','this is iphone',100,100,'Van A',true);
select *from product