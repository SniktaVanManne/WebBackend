CREATE TABLE public.scriptures(
  id SERIAL PRIMARY KEY,
  book varchar(30) NOT NULL,
  chapter INT NOT NULL,
  verse INT NOT NULL,
  content varchar(255) NOT NULL
);

INSERT INTO public.scriptures (book, chapter, verse, content) VALUES ('John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');
INSERT INTO public.scriptures (book, chapter, verse, content) VALUES ('Doctrine and Covenants', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.'); 
INSERT INTO public.scriptures (book, chapter, verse, content) VALUES ('Doctrine and Covenants', 93, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');
INSERT INTO public.scriptures (book, chapter, verse, content) VALUES ('Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');

CREATE TABLE public.practiceNoteUser (
  id SERIAL PRIMARY KEY,
  username varchar(25) NOT NULL UNIQUE,
  password varchar(25) NOT NULL
);


CREATE TABLE public.practiceNotes(
  id SERIAL PRIMARY KEY,
  userId int NOT NULL REFERENCES public.practiceNoteUser(id),
  note varchar(255) NOT NULL
);

INSERT INTO practiceNoteUser (username, password) VALUES ('Amber', 'Beowulf<3');
INSERT INTO practiceNoteUser (username, password) VALUES ('Grace', 't3hDr3ss');
INSERT INTO practiceNoteUser (username, password) VALUES ('William', 'boring123');
INSERT INTO practiceNoteUser (username, password) VALUES ('Doctor Greeves', 'w1llCutU');

INSERT INTO practiceNotes (userId, note) VALUES (1, 'Hello Stranger ;)');
INSERT INTO practiceNotes (userId, note) VALUES (4, 'Must cure. Must cure');
INSERT INTO practiceNotes (userId, note) VALUES (1, 'I know a little arcane mahself ;)');
INSERT INTO practiceNotes (userId, note) VALUES (1, 'Late for class');
INSERT INTO practiceNotes (userId, note) VALUES (2, 'Stuffie toy onwy fwiend :(');

SELECT * FROM practiceNoteUser AS u JOIN practiceNotes AS n ON u.id = n.userId WHERE u.username = "Amber";

try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
