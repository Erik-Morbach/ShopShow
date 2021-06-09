create database if not exists shopShow;

use shopShow;

create table if not exists employee(
	employeeId bigint primary key auto_increment unique not null,
    passCode varchar(6) unique not null,
    name varchar(20) not null,
    type enum("admin","searcher","stock")
);

create table if not exists product(
	productId bigint primary key auto_increment unique not null,
    description varchar(50) not null,
    unitPrice Decimal(10,2)
);
