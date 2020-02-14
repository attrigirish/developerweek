create table Login
(
	id int PRIMARY KEY AUTO_INCREMENT,
 	username varchar(50) NOT NULL,
	password varchar(250) NOT NULL,
	usertype int NOT NULL
);


create table Admin
(
	id int PRIMARY KEY AUTO_INCREMENT,
	loginid int NOT NULL,
	name varchar(50) NOT NULL,
	address varchar(50) NOT NULL,
    FOREIGN KEY (loginid) REFERENCES Login (id)
);


create table Doctor
(
	id int PRIMARY KEY AUTO_INCREMENT,
	loginid int NOT NULL,
	name varchar(50) NOT NULL,
	gender varchar(10) NOT NULL,
	adress varchar(500) NOT NULL,
	phone varchar(15) NOT NULL UNIQUE,
	email varchar(50) NOT NULL UNIQUE,
	experience varchar(500) NOT NULL,
	photo varchar(500),
	qualification varchar(500) NOT NULL,
	specilization varchar(2000) NOT NULL,
    FOREIGN KEY (loginid) REFERENCES Login (id)
);

create table Operator
(
	id int PRIMARY KEY AUTO_INCREMENT,
	loginid int NOT NULL,
	name varchar(50) NOT NULL,
	gender varchar(10) NOT NULL,
	address varchar(500) NOT NULL,
	phone varchar(15) NOT NULL UNIQUE,
	email varchar(50) NOT NULL UNIQUE,
	photo varchar(200),
    FOREIGN KEY (loginid) REFERENCES Login (id)
);

create table Rooms
(
	id int PRIMARY KEY AUTO_INCREMENT,
	roomno int NOT NULL,
	type int NOT NULL,
	charges decimal(12,2) NOT NULL,
	beds int NOT NULL
);

create table Patient
(
	id int PRIMARY KEY AUTO_INCREMENT,
	name varchar(50) NOT NULL,
	gender varchar(10) NOT NULL,
	address varchar(50) NOT NULL,
	phone varchar(15) NOT NULL UNIQUE,
	email varchar(50)
);

create table Admission
(
	id int PRIMARY KEY AUTO_INCREMENT,
	pid int NOT NULL,
	did int  NOT NULL,
	rid int NOT NULL,
	symptom varchar(500) NOT NULL,
	datein datetime NOT NULL,
    FOREIGN KEY (pid) REFERENCES Patient (id),
    FOREIGN KEY (did) REFERENCES Doctor (id),
    FOREIGN KEY (rid) REFERENCES Rooms (id)
);

create table Diagnosis
(
	id int PRIMARY KEY AUTO_INCREMENT,
	aid int NOT NULL,
	diagnosistime datetime NOT NULL,
	summary varchar(5000) NOT NULL,
    FOREIGN KEY (aid) REFERENCES Admission (id)
);

create table Discharge
(
	id int PRIMARY KEY AUTO_INCREMENT,
	aid int NOT NULL,
	summary varchar(5000) NOT NULL,
	dateout datetime NOT NULL,
    FOREIGN KEY (aid) REFERENCES Admission (id)
);