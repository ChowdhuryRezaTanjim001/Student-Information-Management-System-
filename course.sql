es (18 sloc)  467 Bytes

CREATE TABLE course
(
course_id char(4) primary key,
course_name varchar(40),
course_category varchar(20),
course_fees  decimal(10,2),
course_duration int 
)
 
insert into course(course_id  ,
course_name ,
course_category ,
course_fees  ,
course_duration)
 values('c001','sql server','compsc',1000,40),
   ('c002','compmat','civileng',3000,120),
('c003','biomaths','biotech',4000,160),
('c004','word','compsc',500,8),
('c005','photo','ece',800,8);