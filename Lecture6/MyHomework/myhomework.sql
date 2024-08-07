use demo_db_php ;
create table student(
id int auto_increment primary key,
user_name varchar(100),
first_name varchar(100),
last_name varchar(100),
dob timestamp,
gender boolean,
address varchar(255),
phone varchar(100),
email varchar(100)
);
insert into student(user_name, first_name, last_name, dob,
 gender, address, phone, email)
 values('user_name 1','first_name 1','last_name1','20010820', '1', 'address 1', '0123456789' , 'email1@gmail.com'),
       ('user_name 2','first_name 2','last_name2','20010921', '0', 'address 2', '0223456789' , 'email2@gmail.com'),
       ('user_name 3','first_name 3','last_name3','20011022', '0', 'address 3', '0323456789' , 'email3@gmail.com'),
       ('user_name 4','first_name 4','last_name4','20011123', '1', 'address 4', '0423456789' , 'email4@gmail.com'),
       ('user_name 5','first_name 5','last_name5','20011224', '1', 'address 5', '0523456789' , 'email5@gmail.com'),
       ('user_name 6','first_name 6','last_name6','20010125', '0', 'address 6', '0623456789' , 'email6@gmail.com'),
       ('user_name 7','first_name 7','last_name7','20010226', '1', 'address 7', '0723456789' , 'email7@gmail.com');
select*from student;
