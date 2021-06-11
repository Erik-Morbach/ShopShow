create database if not exists shopShow;

use shopShow;

create table if not exists employee(
	id bigint primary key auto_increment unique not null,
    code varchar(6) unique not null,
    name varchar(20) not null,
    type enum("ADMIN","SEARCH","STOCK")
);

create table if not exists product(
	id bigint primary key auto_increment unique not null,
    description varchar(50) not null,
    price Decimal(10,2)
);
