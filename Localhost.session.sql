CREATE TABLE noticias (
    id int(11) NOT NULL,
    título varchar(255) NOT NULL,
    cuerpo text(65536) NOT NULL,
    fecha date NOT NULL,
    autor varchar(255) NOT NULL,
);

