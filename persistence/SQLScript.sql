CREATE TABLE Administrator (
	idAdministrator int(11) NOT NULL AUTO_INCREMENT,
	name varchar(45) NOT NULL,
	lastName varchar(45) NOT NULL,
	email varchar(45) NOT NULL,
	password varchar(45) NOT NULL,
	picture varchar(45) DEFAULT NULL,
	phone varchar(45) DEFAULT NULL,
	mobile varchar(45) DEFAULT NULL,
	state tinyint DEFAULT NULL,
	PRIMARY KEY (idAdministrator)
);

INSERT INTO Administrator (idAdministrator, name, lastName, email, password, phone, mobile, state) VALUES 
	('1', 'administrator', 'administrator', 'admin@udistrital.edu.co', md5('123'), '123', '123', '1'); 

CREATE TABLE LogAdministrator (
	idLogAdministrator int(11) NOT NULL AUTO_INCREMENT,
	action varchar(45) NOT NULL,
	information text NOT NULL,
	date date NOT NULL,
	time time NOT NULL,
	ip varchar(45) NOT NULL,
	os varchar(45) NOT NULL,
	browser varchar(45) NOT NULL,
	administrator_idAdministrator int(11) NOT NULL,
	PRIMARY KEY (idLogAdministrator)
);

CREATE TABLE Estudiante (
	idEstudiante int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	apellido varchar(45) NOT NULL,
	documento varchar(45) NOT NULL,
	fecha_nacimiento date NOT NULL,
	fecha_matricula date NOT NULL,
	sexo int NOT NULL,
	curso_idCurso int(11) NOT NULL,
	estadoEstudiante_idEstadoEstudiante int(11) NOT NULL,
	PRIMARY KEY (idEstudiante)
);

CREATE TABLE Curso (
	idCurso int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	año date NOT NULL,
	grado_idGrado int(11) NOT NULL,
	PRIMARY KEY (idCurso)
);

CREATE TABLE Grado (
	idGrado int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	PRIMARY KEY (idGrado)
);

CREATE TABLE EstadoEstudiante (
	idEstadoEstudiante int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	descripcion varchar(45) NOT NULL,
	PRIMARY KEY (idEstadoEstudiante)
);

CREATE TABLE Area (
	idArea int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	PRIMARY KEY (idArea)
);

CREATE TABLE Asignatura (
	idAsignatura int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	area_idArea int(11) NOT NULL,
	PRIMARY KEY (idAsignatura)
);

CREATE TABLE Logro (
	idLogro int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	descripcion varchar(45) NOT NULL,
	asignatura_idAsignatura int(11) NOT NULL,
	tipoLogro_idTipoLogro int(11) NOT NULL,
	periodo_idPeriodo int(11) NOT NULL,
	PRIMARY KEY (idLogro)
);

CREATE TABLE TipoLogro (
	idTipoLogro int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	descripcion varchar(45) NOT NULL,
	PRIMARY KEY (idTipoLogro)
);

CREATE TABLE LogProfesor (
	idLogProfesor int(11) NOT NULL AUTO_INCREMENT,
	action varchar(45) NOT NULL,
	information text NOT NULL,
	date date NOT NULL,
	time time NOT NULL,
	ip varchar(45) NOT NULL,
	os varchar(45) NOT NULL,
	browser varchar(45) NOT NULL,
	profesor_idProfesor int(11) NOT NULL,
	PRIMARY KEY (idLogProfesor)
);

CREATE TABLE Profesor (
	idProfesor int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	apellido varchar(45) NOT NULL,
	documento varchar(45) NOT NULL,
	correo varchar(45) NOT NULL,
	clave varchar(45) NOT NULL,
	telefono varchar(45) DEFAULT NULL,
	state tinyint NOT NULL,
	PRIMARY KEY (idProfesor)
);

CREATE TABLE CursoAsignaturaProfesor (
	idCursoAsignaturaProfesor int(11) NOT NULL AUTO_INCREMENT,
	noused varchar(45) NOT NULL,
	curso_idCurso int(11) NOT NULL,
	asignatura_idAsignatura int(11) NOT NULL,
	profesor_idProfesor int(11) NOT NULL,
	PRIMARY KEY (idCursoAsignaturaProfesor)
);

CREATE TABLE Periodo (
	idPeriodo int(11) NOT NULL AUTO_INCREMENT,
	orden varchar(45) NOT NULL,
	fecha_inicio date NOT NULL,
	fecha_fin date NOT NULL,
	anio date NOT NULL,
	PRIMARY KEY (idPeriodo)
);

CREATE TABLE Calificacion (
	idCalificacion int(11) NOT NULL AUTO_INCREMENT,
	nota int NOT NULL,
	fallas int NOT NULL,
	tipoCalificacion_idTipoCalificacion int(11) NOT NULL,
	periodo_idPeriodo int(11) NOT NULL,
	estudiante_idEstudiante int(11) NOT NULL,
	asignatura_idAsignatura int(11) NOT NULL,
	PRIMARY KEY (idCalificacion)
);

CREATE TABLE LogrosCalificacion (
	idLogrosCalificacion int(11) NOT NULL AUTO_INCREMENT,
	calificacion_idCalificacion int(11) NOT NULL,
	logro_idLogro int(11) NOT NULL,
	PRIMARY KEY (idLogrosCalificacion)
);

CREATE TABLE TipoCalificacion (
	idTipoCalificacion int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	PRIMARY KEY (idTipoCalificacion)
);

CREATE TABLE LogSecretaria (
	idLogSecretaria int(11) NOT NULL AUTO_INCREMENT,
	action varchar(45) NOT NULL,
	information text NOT NULL,
	date date NOT NULL,
	time time NOT NULL,
	ip varchar(45) NOT NULL,
	os varchar(45) NOT NULL,
	browser varchar(45) NOT NULL,
	secretaria_idSecretaria int(11) NOT NULL,
	PRIMARY KEY (idLogSecretaria)
);

CREATE TABLE Secretaria (
	idSecretaria int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	apellido varchar(45) NOT NULL,
	documento varchar(45) DEFAULT NULL,
	correo varchar(45) NOT NULL,
	clave varchar(45) NOT NULL,
	telefono varchar(45) DEFAULT NULL,
	state tinyint NOT NULL,
	PRIMARY KEY (idSecretaria)
);

ALTER TABLE LogAdministrator
 	ADD FOREIGN KEY (administrator_idAdministrator) REFERENCES Administrator (idAdministrator); 

ALTER TABLE Estudiante
 	ADD FOREIGN KEY (curso_idCurso) REFERENCES Curso (idCurso); 

ALTER TABLE Estudiante
 	ADD FOREIGN KEY (estadoestudiante_idEstadoEstudiante) REFERENCES EstadoEstudiante (idEstadoEstudiante); 

ALTER TABLE Curso
 	ADD FOREIGN KEY (grado_idGrado) REFERENCES Grado (idGrado); 

ALTER TABLE Asignatura
 	ADD FOREIGN KEY (area_idArea) REFERENCES Area (idArea); 

ALTER TABLE Logro
 	ADD FOREIGN KEY (asignatura_idAsignatura) REFERENCES Asignatura (idAsignatura); 

ALTER TABLE Logro
 	ADD FOREIGN KEY (tipologro_idTipoLogro) REFERENCES TipoLogro (idTipoLogro); 

ALTER TABLE Logro
 	ADD FOREIGN KEY (periodo_idPeriodo) REFERENCES Periodo (idPeriodo); 

ALTER TABLE LogProfesor
 	ADD FOREIGN KEY (profesor_idProfesor) REFERENCES Profesor (idProfesor); 

ALTER TABLE CursoAsignaturaProfesor
 	ADD FOREIGN KEY (curso_idCurso) REFERENCES Curso (idCurso); 

ALTER TABLE CursoAsignaturaProfesor
 	ADD FOREIGN KEY (asignatura_idAsignatura) REFERENCES Asignatura (idAsignatura); 

ALTER TABLE CursoAsignaturaProfesor
 	ADD FOREIGN KEY (profesor_idProfesor) REFERENCES Profesor (idProfesor); 

ALTER TABLE Calificacion
 	ADD FOREIGN KEY (tipocalificacion_idTipoCalificacion) REFERENCES TipoCalificacion (idTipoCalificacion); 

ALTER TABLE Calificacion
 	ADD FOREIGN KEY (periodo_idPeriodo) REFERENCES Periodo (idPeriodo); 

ALTER TABLE Calificacion
 	ADD FOREIGN KEY (estudiante_idEstudiante) REFERENCES Estudiante (idEstudiante); 

ALTER TABLE Calificacion
 	ADD FOREIGN KEY (asignatura_idAsignatura) REFERENCES Asignatura (idAsignatura); 

ALTER TABLE LogrosCalificacion
 	ADD FOREIGN KEY (calificacion_idCalificacion) REFERENCES Calificacion (idCalificacion); 

ALTER TABLE LogrosCalificacion
 	ADD FOREIGN KEY (logro_idLogro) REFERENCES Logro (idLogro); 

ALTER TABLE LogSecretaria
 	ADD FOREIGN KEY (secretaria_idSecretaria) REFERENCES Secretaria (idSecretaria); 

