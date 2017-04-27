# Nick Cavallaro database
# CSCI-2412

#Drop database if it exists
drop database if exists cavallarocsci2412;

#create database if it idoes not exist
create database if not exists cavallarocsci2412;

#use the database that was created
use cavallarocsci2412;

#create users table
create table users(
	user_id int unsigned auto_increment, 
    user_name nvarchar(255) not null,
	pass nchar(60) not null,
    first_name nvarchar(255) not null, 
	last_name nvarchar(255) not null, 
	email nvarchar(255)not null,
    phone nchar(10),
    join_date datetime default current_timestamp,
    profile_pic int unsigned,
    
	primary key (user_id),
    foreign key (profile_pic) references images (image_id) on delete cascade,
	unique (email),
	unique (user_name),
    index full_name (last_name, first_name)
);

create table forums(
	forum_id int unsigned auto_increment,
	forum_name nvarchar(255) not null,
	unique (forum_name),
    primary key (forum_id)
);

create table threads(
	thread_id int unsigned auto_increment,
    forum_id int unsigned not null,
    primary key (thread_id),
    foreign key (forum_id) references forums (forum_id) on delete cascade
);
    
create table posts(
	post_id int unsigned auto_increment,
    thread_id int unsigned not null,
    post_author int unsigned not null,
    post_date datetime default current_timestamp,
    edit_date timestamp,
    edited_by int unsigned,
    post_subject tinytext not null,
    post_body longtext not null,
    primary key (post_id),
    foreign key (thread_id) references threads (thread_id) on delete cascade,
    foreign key (post_author) references users (user_id) on delete cascade,
    foreign key (edited_by) references users (user_id) on delete cascade,
    fulltext (post_body, post_subject)
);    

create table images(
	image_id int unsigned not null auto_increment primary key,
    filename varchar(255),
    image_type varchar(100),
    image_data longblob
);