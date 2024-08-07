USE demo_db_php;
CREATE TABLE usersregister (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
insert into usersregister (username, email, password_hash)
values();
select*from usersregister;
SELECT username, password_hash FROM usersregister