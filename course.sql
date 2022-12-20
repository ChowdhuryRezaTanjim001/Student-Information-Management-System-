
CREATE TABLE course
(
c_code varchar(40) primary key,
c_name varchar(20),
attendence boolean,f_name varchar(90)
);
 
 

insert into course(
c_code  ,
c_name ,
attendence,
f_name)

 values( 'cse3111', 'database management system', true,'rih'),
 ( 'eee111', 'Analog electronics', false,'azd');
 