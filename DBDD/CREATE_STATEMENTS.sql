CREATE TABLE Specializations (
	SpecializationID VARCHAR(10) NOT NULL PRIMARY KEY,
	SpecializationName VARCHAR(50) NOT NULL
);

CREATE TABLE Doctors(
	DoctorID VARCHAR(10) NOT NULL PRIMARY KEY,
	DoctorName VARCHAR(50) NOT NULL,
	DoctorQualifications VARCHAR(50),
	ConsultationFees INT,
	CHECK (ConsultationFees > 0),
	SpecializationID VARCHAR(10) NOT NULL,
	FOREIGN KEY(SpecializationID) REFERENCES Specializations(SpecializationID)
);

CREATE TABLE Days(
	DayID VARCHAR(10) NOT NULL PRIMARY KEY,
	CHECK(DayID in ('Mon', 'Tues', 'Wed', 'Thurs', 'Fri', 'Sat', 'Sun')),
	DayName VARCHAR(10) NOT NULL
);

CREATE TABLE Schedules(
	ScheduleID VARCHAR(10) NOT NULL PRIMARY KEY,
	DoctorID VARCHAR(10) NOT NULL,
	DayID VARCHAR(10) NOT NULL,
	FOREIGN KEY(DoctorID) REFERENCES Doctors(DoctorID) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY(DayID) REFERENCES Days(DayID)
);

CREATE TABLE Patients(
	PatientID VARCHAR(10) NOT NULL PRIMARY KEY,
	PatientName VARCHAR(50) NOT NULL,
	PatientGender VARCHAR(50) NOT NULL,
	CHECK (PatientGender in ('M', 'F')),
	PatientAge INT,
	CHECK (PatientAge > 0),
	PatientAddress VARCHAR(150)
);

/* Start from here */
CREATE TABLE AppointStatus(
	StatusID VARCHAR(5) NOT NULL PRIMARY KEY,
	StatusName VARCHAR(10) NOT NULL
);

CREATE TABLE Appointments(
	AppointmentID VARCHAR(10) NOT NULL PRIMARY KEY,
	AppointmentDate DATE,
	PatientID VARCHAR(10) NOT NULL,
	FOREIGN KEY (PatientID) REFERENCES Patients(PatientID)
		ON UPDATE CASCADE
		ON DELETE NO ACTION,
	DoctorID VARCHAR(10),
	FOREIGN KEY (DoctorID) REFERENCES Doctors(DoctorID)



);
