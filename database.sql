CREATE DATABASE IF NOT EXISTS videoslaravel;
USE videoslaravel;

CREATE TABLE users(
id 		int(255) auto_increment not null,
role	varchar(20),
name	varchar(255),
surname	varchar(255),
email	varchar(255),
password varchar(255),
image	varchar(255),
created_at datetime,
updated_at datetime,
remember_token varchar(255),
CONSTRAINT pk_users primary key(id)
)ENGINE=InnoDb;

CREATE TABLE videos(
id 		int(255) auto_increment not null,
user_id	int(255) not null,
title 	varchar(255),
description	text,
status 	varchar(20),
image	varchar(255),
video_path varchar(255),
created_at datetime,
updated_at datetime,
CONSTRAINT pk_videos primary key(id),
CONSTRAINT fk_videos_users foreign key(user_id) references users(id)
)ENGINE=InnoDb;

CREATE TABLE comments(
id 		int(255) auto_increment not null,
user_id	int(255) not null,
video_id int(255) not null,
body	text,
created_at datetime,
updated_at datetime,
CONSTRAINT pk_comment primary key(id),
CONSTRAINT fk_comment_video foreign key(video_id) references videos(id),
CONSTRAINT fk_comment_user foreign key(user_id) references users(id)
)ENGINE=InnoDb;