CREATE DATABASE IF NOT EXISTS videoslaravel;
USE videoslaravel;

CREATE TABLE users(
id       int(255) auto_increment not null,
role     varchar(20),
name     varchar(255),
surname  varchar(255),
email    varchar(255),
password varchar(255),
image   varchar(255),
create_at datetime, 
update_at datetime,
remember_toke varchar(255),
CONSTRAINt pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE videos(
id    int(255) auto_increment not null, 
user_id int(255) not null, 
title varchar(255), 
description text, 
status varchar(20),
image varchar(255),
video_path varchar(255),
create_at datetime, 
update_at datetime,
CONSTRAINt pk_videos PRIMARY KEY(id),
CONSTRAINt fk_videos FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;

CREATE TABLE comments(
id    int(255) auto_increment not null, 
user_id int(255) not null,
video_id int(255) not null,
body   text,
create_at datetime, 
update_at datetime,
CONSTRAINt pk_commen PRIMARY KEY(id),
CONSTRAINt fk_comment FOREIGN KEY(video_id) REFERENCES videos(id),
CONSTRAINt fk_user FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;

