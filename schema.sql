CREATE DATABASE readme
	DEFAULT CHARACTER SET utf8
	DEFAULT COLLATE utf8_general_ci;

use readme

CREATE TABLE 	users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	rg_date DATETIME DEFAULT CURRENT_TIMESTAMP,
	email VARCHAR(128) UNIQUE NOT NULL,
	login VARCHAR(128) NOT NULL,
	password VARCHAR(128) NOT NULL,
	avatar TEXT

);

CREATE TABLE post_types (
	id INT AUTO_INCREMENT PRIMARY KEY,
	post_type VARCHAR(32),
	class VARCHAR(32) 
);

CREATE TABLE hashtags (
	id INT AUTO_INCREMENT PRIMARY KEY,
	hashtag VARCHAR(128)
);

CREATE INDEX hashtags_idx ON hashtags(hashtag);

CREATE TABLE posts (
	id INT AUTO_INCREMENT PRIMARY KEY,
	cr_date DATETIME DEFAULT CURRENT_TIMESTAMP,
	title CHAR(128),
  content TEXT,
  author CHAR(128),
  image CHAR(128),
  video CHAR(128),
  link CHAR(128),
  view_count INT DEFAULT 0,
  user_id INT,
  post_type INT,
  hashtag_id INT,
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (post_type) REFERENCES post_types(id),
	FOREIGN KEY (hashtag_id) REFERENCES hashtags(id)	
);

CREATE INDEX title_idx ON posts(title);
CREATE FULLTEXT INDEX content_idx ON posts(content);


CREATE TABLE comments (
	id INT AUTO_INCREMENT PRIMARY KEY,
	content TEXT,
	user_id INT,
	post_id INT,
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (post_id) REFERENCES posts(id)

CREATE TABLE likes (
	id INT AUTO_INCREMENT PRIMARY KEY,
	user_id INT,
	post_id INT,
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (post_id) REFERENCES posts(id)
);

CREATE TABLE subscriptions (
	id INT AUTO_INCREMENT PRIMARY KEY,
	user_id INT,
	sub INT,
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (sub) REFERENCES users(id)
);
	
CREATE TABLE messages (
	id INT AUTO_INCREMENT PRIMARY KEY,
	date DATETIME,
	content TEXT,
	user_id INT,
	recipient INT,
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (recipient) REFERENCES users(id)
);






