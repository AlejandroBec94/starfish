create table consumers
(
	id int(10) auto_increment,
	firstName varchar(100) null,
	lastName varchar(100) null,
	age int null,
	constraint consumers_pk
		primary key (id)
);


create table addresses
(
	id int(100) auto_increment,
	address varchar(250) null,
	constraint addresses_pk
		primary key (id)
);

alter table consumers
	add constraint fk_consumer_id
		foreign key (id) references addresses (id)
			on update cascade on delete cascade;