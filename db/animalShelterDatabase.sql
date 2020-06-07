

-- A table for all the animals from the shelter
CREATE TABLE public.animals (
	id SERIAL NOT NULL PRIMARY KEY,
	name 					varchar(20) 		NOT NULL,
	isMale 				BOOLEAN 				NOT NULL,
	species 			varchar(20) 		NOT NULL,
	breed 				varchar(20),
	ageYears 			INT 						NOT NULL,
	ageMonths 		INT 						NOT NULL,
	weight 				decimal(5, 2) 	NOT NULL,
	price 				decimal(5, 2),
	isAvailable 	BOOLEAN 				NOT NULL,
	notes					 TEXT
);

-- People associated with the Sheter: Employees, volunteers, vets, and adoptors
CREATE TABLE public.people(
	id SERIAL NOT NULL PRIMARY KEY,
	firstName 				varchar(20) 	NOT NULL,
	lastName 					varchar(20) 	NOT NULL,
	role 							varchar(20) 	NOT NULL, -- Employee, volunteer, vet, adoptor
	phoneNumber 			varchar(10),
	email 						varchar(50),
	addressStreet 		varchar(50),
	addressCity 			varchar(30),
	addressZip 				varchar(5) 		NOT NULL,
	specialization 		varchar(30), 						-- For vets with animal specialities
	weeklyHours 			varchar(10), 						-- For employees and volunteers
	currentlyWorking 	BOOLEAN 								-- For employees and volunteers
);
INSERT INTO people(firstName, lastName, role, phoneNumber, email, addressStreet, addressCity, addressZip, weeklyHours, currentlyWorking)
VALUES('Kenneth', 'Kelsey', 'Vet', 84666);
VALUES('Shaylene', 'Johnson', 'Employee', 5555555555, 'DanceTilUDrop@gmail.com', '1313 Mockingbird Lane', 'Critterville', 84666, 40, true );
VALUES('Selene', 'Jackson', 'Volunteer', 8014205555, 'SelenaGirl@yahoo.com', '123 Mulberry St', 'Animalburg', 84663, 25, true );

INSERT INTO people(firstName, lastName, role, addressZip)
VALUES('Wild', 'Oscar', 'Vet', 84559);
VALUES('Hickory', 'Greymourne', 'Vet', 84550);
VALUES('Harley', 'Dobson', 'Vet', 84555);
VALUES('Benjamin', 'Karlson', 'Vet', 84663);
VALUES('Carol', 'Barter', 'Adoptor', 84553);

-- Clinics the Shelter has information on
CREATE TABLE public.clinics(
	id SERIAL NOT NULL PRIMARY KEY,
	name 						varchar(50) 	NOT NULL,
	phoneNumber 		varchar(10) 	NOT NULL,
	addressStreet 	varchar(50) 	NOT NULL,
	addressCity 		varchar(30) 	NOT NULL,
	addressZip 			varchar(5) 		NOT NULL,
	vetId1 					INT 					NOT NULL REFERENCES public.people(id),
	vetId2 					INT          					 REFERENCES public.people(id),
	vetId3 					INT          					 REFERENCES public.people(id),
	vetId4 					INT          					 REFERENCES public.people(id),
	vetId5 					INT          					 REFERENCES public.people(id)
);

INSERT INTO clinics(name, phoneNumber, addressStreet, addressCity, addressZip, vetId1, speciality)
VALUES('Cattlesdam Cattle Doctors', '8015551240', '521 Cow Slurp Lane', 'Cattlesdam', 12351, 2, 'Large Animals');
VALUES('Animalville City Vets', '8015551239', '1234 Cattle Street', 'Animalville', 12350, 2, 'Large Animals');
VALUES('We Got Wheels For You!', '8015551236', '123 Guinea Pig Lane', 'Animalville', 12347, 2, 'Small Pets');
VALUES('Tiny Critter Care!', '8015551235', '556 Hamster Street', 'Hamsterburg', 12347, 2, 'Small Pets');
VALUES('Animal Care 4 U', '8015551222', '551 Non-Resident Street', 'Animalville', 12346, 2);
VALUES('We Heart Animals', '8015551234', '1313 Mockingbird Lane', 'Animalville', 12345, 2);
VALUES('AnimalRUs', '5555551234', '1502 Pupper Lane', 'Petstopia', 84123, 2);
UPDATE table
SET column1 = value1,
    column2 = value2 ,...
WHERE
	condition;
UPDATE clinics SET speciality = 'Cats and Dogs' WHERE id = 1;

ALTER TABLE clinics ADD COLUMN speciality varchar(80);


-- Adoptions that have taken place in the shelter
CREATE TABLE public.adoptions(
	id SERIAL NOT NULL PRIMARY KEY,
	animalId 				INT 	NOT NULL REFERENCES public.animals(id),
	adopterId 			INT 	NOT NULL REFERENCES public.people(id),
	shelterWokerId 	INT 	NOT NULL REFERENCES public.people(id),
	vetId 					INT 				 	 REFERENCES public.people(id),
	adoptionDate 		date 	NOT NULL,
	notes					  TEXT
);

-- Visits to clinics for animals in the shelter
CREATE TABLE public.vetVisits(
	id SERIAL NOT NULL PRIMARY KEY,
	animalId 				INT 					NOT NULL REFERENCES public.animals(id),
	clinicId 				INT 					NOT NULL REFERENCES public.clinics(id),
	vetId 					INT 					NOT NULL REFERENCES public.people(id),
	vetVisitDate 		date  				NOT NULL,
	notes 					TEXT 				 	NOT NULL
);

-- Creating entries for animals
INSERT INTO animals(name, isMale, species, breed, ageYears, ageMonths, weight, price, isAvailable, notes)
VALUES('Oreo', false, 'Cat', 'Tuxedo Cat', 3, 5, 10, 19.99, true, 'I am shy but very sweet. I do best when I am the only animal at a house!');


VALUES('Byrion', true, 'Dog', 'Husky', 3, 5, 85, 29.99, true, 'Big dog. Needs a yard to play in');
VALUES('Koko', false, 'Dog', 'Black Lab', 5, 8, 55, 59.99, false, 'Good pupper companion');
VALUES('Olive', false, 'Dog', 'Lab', 9, 8, 40, 59.99, false, 'Old and saggy, but a really sweet dog.');
VALUES('Sasha', false, 'Cat', 'Domestic Shorthair', 1, 2, 12, 35.65, false, 'Calico cat with very pretty coloration.');

ALTER TABLE animals
    ALTER COLUMN notes TYPE varchar(255);

ALTER TABLE animals
ALTER COLUMN price [SET DATA] TYPE 	decimal(5, 2);

UPDATE animals
SET notes = 'Biggest bamboozler ever. Has ALL the heavy armor perks and still sneaky!'
WHERE id = 2;

UPDATE people
SET phoneNumber = '801.555.8822'
WHERE id = 2;

ALTER TABLE people
    ALTER COLUMN phoneNumber TYPE varchar(13);

CREATE TABLE scripture_topic (
	id 					SERIAL NOT NULL PRIMARY KEY,
	scriptureId INT NOT NULL REFERENCES scriptures(id),
	topicId 		INT NOT NULL REFERENCES topics(id)
);
