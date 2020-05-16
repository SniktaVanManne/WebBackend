

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
	price 				decimal(2, 2),
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
