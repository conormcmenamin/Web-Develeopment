CREATE TABLE eBook_Metadata(
	id int(5) AUTO_INCREMENT PRIMARY KEYnot null,
	creator text not null,
	title text not null,
	type text not null,
	identifier text not null,
	date date not null,
	language text not null, 
	description text not null
);

	
