#SQL
```
CREATE DATABASE blog CHARACTER SET utf8mb4

CREATE TABLE posts (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  title TEXT,
  description TEXT,
  category_id INT,
  created_at TIMESTAMP
);


CREATE TABLE categories (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name TEXT
);

CREATE TABLE tags (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name TEXT
);

CREATE TABLE posts_tags (
  post_id INT,
  tag_id INT
);


CREATE TABLE users (
user_id INT( 5 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
username VARCHAR( 25 ) NOT NULL ,
email VARCHAR( 35 ) NOT NULL ,
password VARCHAR( 60 ) NOT NULL ,
UNIQUE (email)
);
```
