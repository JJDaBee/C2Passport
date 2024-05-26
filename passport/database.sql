drop database if exists dbs_hack;

create database dbs_hack;
use dbs_hack;

CREATE TABLE if not exists useraccount (
  username varchar(20) NOT NULL,
  password_hash varchar(64) NOT NULL,
  role ENUM('user', 'admin') DEFAULT 'user',
  constraint useraccount_pk PRIMARY KEY username
);

-- INSERT INTO useraccount (username, password_hash) VALUES
-- ('zack', '$2y$10$EKPRz0VyZPumX63D7Z768ORzQMPNO4wg00AChOMUwKi/wOp1f7SlK', 'admin'),
-- ('yew', '$2y$10$bs3aXFCJyYfP7jWljcRjxukiVbhRBLWNSJgTOD/CHWQVgV7hCd0t.', 'user'),
-- ('wong', '$2y$10$wD9/9pDxg3/JSavLqszwxuGZ1odhUBCGos8LOlYu0Y4NVuIQEmq1e', 'user'),
-- ('tan', '$2y$10$ys8PC5qrBElBGtkU3wwrMOiIQdBkgyQibOzDZRQv1EQrJ6H1YtnYy', 'user');

-- CREATE TABLE if not exists volunteer (
--   username varchar(20) NOT NULL,

-- )
  
  
