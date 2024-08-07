CREATE TABLE users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  full_name VARCHAR(255) NOT NULL,
  dob DATE NOT NULL,
  is_male BOOLEAN NOT NULL,
  registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
insert into users (username, email, password_hash, full_name, dob, is_male)
values('username','email@gmail.com','11111111','full_name','2023-01-01',1),
      ('username1','email1@gmail.com','22222222','full_name1','2023-01-02',0),
      ('username2','email2@gmail.com','333333333','full_name2','2023-01-03',1),
      ('username3','email3@gmail.com','4444444444','full_name3','2023-01-04',0),
      ('username4','email4@gmail.com','11113333','full_name4','2023-01-05',1);
select *from users