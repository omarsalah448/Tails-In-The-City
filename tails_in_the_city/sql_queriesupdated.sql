drop database if exists tails_in_the_city;
create database tails_in_the_city;
use tails_in_the_city;

create table pets(
    pet_id varchar(100),
    pet_name varchar(100) not null,
    pet_type varchar(100) not null,
    breed varchar(100) not null,
    gender varchar(1) not null,
    age int,
    color varchar(100) not null,
    own_status varchar(100) not null,
    breeding_status varchar(100) not null,
    photo varchar(100),
    primary key (pet_id)
);
create table parent_pet(
    user_pet_id varchar(100),
    user_id varchar(100),
    primary key (user_pet_id, user_id)
);
create table breeding_history(
    pet1_id varchar(100),
    pet2_id varchar(100),
    breeding_date datetime,
    primary key (pet1_id, pet2_id, breeding_date)
);
create table daycare(
    pet_id varchar(100),
    dropoff datetime not null,
    pickup datetime not null,
    hour_price float not null,
    user_id varchar(100),
    primary key (pet_id, dropoff)
);
create table users(
    user_id  varchar(100),
    user_name varchar(100) not null,
    user_password varchar(100) not null,
    email varchar(100) UNIQUE not null,
    phone varchar(100) UNIQUE not null,
    user_address varchar(100),
    primary key (user_id)
);

create table medical_records(
    med_rec_id varchar(100),
    pet_id  varchar(100),
    vet_id  varchar(100),
    medical_date datetime not null,
    diagnosis varchar(100) not null,
    drugs varchar(100) not null,
    primary key (med_rec_id,pet_id, vet_id, medical_date)
);

create table vet(
    vet_id  varchar(100),
    vet_name varchar(100) not null,
    email varchar(100) not null,
    phone varchar(100) not null,
    vet_address varchar(100),
    primary key (vet_id)
);


create table appointment(
    vet_id  varchar(100),
    pet_id  varchar(100),
    user_id varchar(100),
    appointment_date varchar(100) not null,
    primary key (pet_id, vet_id, appointment_date)
);

create table store(
    item_id  varchar(100),
    item_name varchar(100) not null,
    item_price float not null,
    quantity int not null,
    item_category varchar(100) not null,
    item_image varchar(100),
    primary key (item_id)
);
create table purchases(
    user_id varchar(100),
    item_id  varchar(100),
    purchase_date datetime not null,
    quantity int not null,
    primary key (user_id, item_id,purchase_date)
);

-- parent_pet table
ALTER TABLE parent_pet
ADD CONSTRAINT fk_parent_pet_pet_id
FOREIGN KEY (user_pet_id)
REFERENCES pets(pet_id)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE parent_pet
ADD CONSTRAINT fk_parent_pet_user_id
FOREIGN KEY (user_id)
REFERENCES users(user_id)
ON DELETE CASCADE
ON UPDATE CASCADE;

-- breeding_history table
ALTER TABLE breeding_history
ADD CONSTRAINT fk_breeding_history_pet1_id
FOREIGN KEY (pet1_id)
REFERENCES pets(pet_id)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE breeding_history
ADD CONSTRAINT fk_breeding_history_pet2_id
FOREIGN KEY (pet2_id)
REFERENCES pets(pet_id)
ON DELETE CASCADE
ON UPDATE CASCADE;

-- daycare table
ALTER TABLE daycare
ADD CONSTRAINT fk_daycare_pet_id
FOREIGN KEY (pet_id)
REFERENCES pets(pet_id)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE daycare
ADD CONSTRAINT fk_daycare_user_id
FOREIGN KEY (user_id)
REFERENCES users(user_id)
ON DELETE CASCADE
ON UPDATE CASCADE;

-- medical_records table
ALTER TABLE medical_records
ADD CONSTRAINT fk_medical_records_pet_id
FOREIGN KEY (pet_id)
REFERENCES pets(pet_id)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE medical_records
ADD CONSTRAINT fk_medical_records_vet_id
FOREIGN KEY (vet_id)
REFERENCES vet(vet_id)
ON DELETE CASCADE
ON UPDATE CASCADE;

-- appointment table
ALTER TABLE appointment
ADD CONSTRAINT fk_appointment_vet_id
FOREIGN KEY (vet_id)
REFERENCES vet(vet_id)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE appointment
ADD CONSTRAINT fk_appointment_pet_id
FOREIGN KEY (pet_id)
REFERENCES pets(pet_id)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE appointment
ADD CONSTRAINT fk_appointment_user_id
FOREIGN KEY (user_id)
REFERENCES users(user_id)
ON DELETE CASCADE
ON UPDATE CASCADE;

-- purchases table
ALTER TABLE purchases
ADD CONSTRAINT fk_purchases_user_id
FOREIGN KEY (user_id)
REFERENCES users(user_id)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE purchases
ADD CONSTRAINT fk_purchases_item_id
FOREIGN KEY (item_id)
REFERENCES store(item_id)
ON DELETE CASCADE
ON UPDATE CASCADE;


insert into vet values('1','Dr. John', 'john@gmail.com', '1234567890', '1234 Main St, Houston, TX 77002');

insert into store values('1','Dog Food', 20, 100,'dry food', 'https://m.media-amazon.com/images/I/71qPtyAr7KL._AC_SX679_.jpg');
insert into store values('2','Cat Food', 23, 100,'dry food', 'https://m.media-amazon.com/images/I/71RQt8m7vWL._AC_UF1000,1000_QL80_.jpg');
insert into store values('3','Dog Food', 45, 100,'dry food', 'https://m.media-amazon.com/images/I/61flPFuHbiL._AC_UF894,1000_QL80_.jpg');
insert into store values('4','Litter Box', 89, 100,'Hygiene', 'https://m.media-amazon.com/images/I/61j1HfZMgfL._AC_UF1000,1000_QL80_.jpg');
insert into store values('5','Balls', 12, 100,'Toy', 'https://m.media-amazon.com/images/W/IMAGERENDERING_521856-T1/images/I/81uK3AGyPYL._AC_SL1500_.jpg');
insert into store values('6','Leesh', 9.99, 100,'Accessories', 'https://m.media-amazon.com/images/I/71N6-ce56xL._AC_SX569_.jpg');
insert into store values('7','Dog Food', 10.50, 100,'dry food', 'https://m.media-amazon.com/images/I/818le2oZ7uL._AC_SX679_.jpg');
insert into store values('8','Cat Food', 34, 100,'dry food', 'https://m.media-amazon.com/images/I/71tgK7x8J+L._AC_SX569_.jpg');
insert into store values('9','Dog Tooth brush', 78, 100,'Hygiene', 'https://m.media-amazon.com/images/I/818ZMmFvvmL._AC_SX679_.jpg');
insert into store values('10','Pet Wipes', 67, 100,'Hygiene', 'https://m.media-amazon.com/images/I/81HNyIGf-JL._AC_SX679_.jpg');
insert into store values('11','Paw Hand Sanitizer', 99.99, 100,'Toy', 'https://m.media-amazon.com/images/I/61dC0OT6k0L._AC_SX679_.jpg');
insert into store values('12','5 Pcs Cat Spring Balls ', 56, 100,'Toy', 'https://m.media-amazon.com/images/I/81mX2mr3BNL._AC_SX679_.jpg');
insert into store values('13',' Deodorizing Spray', 120, 100,'Hygiene', 'https://m.media-amazon.com/images/I/710Myx0nd4L._AC_SX679_.jpg');
insert into store values('14','Dog Toy Box', 234, 100,'Toy', 'https://m.media-amazon.com/images/I/81mJJmHCAHL._AC_SX679_.jpg');
insert into store values('15','Cat Litter', 78, 100,'Hygiene', 'https://m.media-amazon.com/images/I/81OYA3ucCyL._AC_SX679_.jpg');
insert into store values('16','Dog Chew Toys', 90, 100,'Toy', 'https://m.media-amazon.com/images/I/71KHlJw+8TL._AC_SY300_SX300_.jpg');
insert into store values('17','Cat Scratcher', 47, 100,'Toy', 'https://m.media-amazon.com/images/I/710Pbd4i8fL._AC_SX679_.jpg');
insert into store values('18','Dog Bath Swimming Pool', 320, 100,'Accessories', 'https://m.media-amazon.com/images/I/61XtZl5hDML.__AC_SX300_SY300_QL70_FMwebp_.jpg');
insert into store values('19','Dog Grooming Brush', 90, 100,'Hygiene', 'https://m.media-amazon.com/images/I/71ogYjGCSzL.__AC_SX300_SY300_QL70_FMwebp_.jpg');
insert into store values('20','Cat Food', 26, 100,'dry food', 'https://m.media-amazon.com/images/I/81xamBMMCfL._AC_SX679_.jpg');
insert into store values('21','Dog Food', 29, 100,'dry food', 'https://m.media-amazon.com/images/I/819y0lLPQsL._AC_SX679_.jpg');



INSERT INTO pets VALUES('1','Homer','Dog','Labrador','M',9,'Black','adopt','Breeding','https://images.unsplash.com/photo-1585559700398-1385b3a8aeb6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG9');
INSERT INTO pets VALUES('2','Yelp','Dog','Labrador','F',2,'Black','adopt','Breeding','https://images.unsplash.com/photo-1552575595-38bfbd75841a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by');
INSERT INTO pets VALUES('3','Fluff','Cat','Persian','F',4,'White','adopt','Breeding','https://images.unsplash.com/photo-1585137173132-cf49e10ad27d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG9');
INSERT INTO pets VALUES('4','Brush','Cat','Persian','M',3,'White','adopt','Breeding','https://images.unsplash.com/photo-1520315342629-6ea920342047?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG9');
INSERT INTO pets VALUES('5','Balls','Dog','Labrador','M',6,'Black','adopt','Breeding','https://images.unsplash.com/photo-1614179621890-66654bae62e0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG9');
INSERT INTO pets VALUES('6','Leesh','Dog','Labrador','F',2,'Black','adopt','Breeding','https://images.unsplash.com/photo-1503256207526-0d5d80fa2f47?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG9');
INSERT INTO pets VALUES('7','max','Dog','Golden Retriever','M',5,'Black','adopt','Breeding','https://images.unsplash.com/photo-1591160690567-a6b0215b67ba?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG9');
INSERT INTO pets VALUES('8','Mia','Cat','Persian','F',1,'White','adopt','Breeding','https://images.unsplash.com/photo-1591429939960-b7d5add10b5c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG9');
INSERT INTO pets VALUES('9','Bella','Dog','Husky','F',3,'Black','adopt','Breeding','https://images.unsplash.com/photo-1613228554660-ce294bfb432a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG9');
INSERT INTO pets VALUES('10','Charlie','Cat','Persian','M',2,'White','adopt','Breeding','https://images.unsplash.com/photo-1622584985171-35cd07f0253e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG9');
INSERT INTO pets VALUES('11','Luna','Dog','Husky','F',4,'Black','adopt','Breeding','https://images.unsplash.com/photo-1658346927843-9b9a55864124?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG9');
INSERT INTO pets VALUES('12','Daisy','Dog','Beagle','F',2,'Brown','adopt','Breeding','https://images.unsplash.com/photo-1578678890094-3ddb1146ca99?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG9');
INSERT INTO pets VALUES('13','Duke','Dog','Yorkshire Terrier','F',3,'Brown','adopt','Breeding','https://images.unsplash.com/photo-1574760112346-8443c3773437?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG9');
INSERT INTO pets VALUES('14','Cooper','Dog','Dachshund','F',1,'Brown','adopt','Breeding','https://images.unsplash.com/photo-1635703705694-0da1f3b2f724?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG9');
INSERT INTO pets VALUES('15','Jack','Dog','Pug','F',2,'Balck','adopt','Breeding','https://images.unsplash.com/photo-1523626797181-8c5ae80d40c2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG9');
INSERT INTO pets VALUES('16','Rocky','Dog','German Shepherd','M',2,'Brown','adopt','Breeding','https://images.unsplash.com/photo-1575785662490-1e3ce6806ed5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG9');


