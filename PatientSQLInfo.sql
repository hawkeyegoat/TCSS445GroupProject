REM   Script: PatientDatabase;
REM   A database for group 5 project for 445;

REM Script: PatientDatabase;


REM A database for group 5 project for 445;


ALTER SESSION SET NLS_DATE_FORMAT = 'YYYY-MM-DD';


REM: PATIENTS table;


CREATE TABLE patients 
(
  PatientID varchar(10) NOT NULL,
  First_name varchar(20) DEFAULT NULL,
  Last_name varchar(20) DEFAULT NULL,
  High_Blood_Pressure varchar(1) DEFAULT 'F' CHECK(High_Blood_Pressure = 'T' OR High_Blood_Pressure = 'F'),
  Diabetes varchar(1) DEFAULT 'F' CHECK(Diabetes = 'T' OR Diabetes = 'F'),
  Weight_gain varchar(1) DEFAULT 'F' CHECK(Weight_gain = 'T' OR Weight_gain = 'F'),
  Heart_conditions varchar(1) DEFAULT 'F' CHECK(Heart_conditions = 'T' OR Heart_conditions = 'F'),
  COPD varchar(1) DEFAULT 'F' CHECK( COPD = 'T' OR  COPD = 'F'),
  Sleep_apnea varchar(1) DEFAULT 'F' CHECK(Sleep_apnea = 'T' OR Sleep_apnea = 'F'),
  Asthma varchar(1) DEFAULT 'F' CHECK(Asthma = 'T' OR Asthma = 'F')
);

INSERT ALL 
INTO patients VALUES ('BCN36i8k5h', 'Frances', 'Gibbs', 'F', 'T', 'F', 'F', 'T', 'T', 'F') 
INTO patients VALUES ('BUF83e3o8q', 'Sade', 'Hobbs', 'T', 'T', 'T', 'T', 'T', 'F', 'T') 
INTO patients VALUES ('CAM06n1a2s', 'Aileen', 'Hayden', 'T', 'T', 'T', 'F', 'F', 'T', 'T') 
INTO patients VALUES ('CCW05o6s6x', 'Eaton', 'Mcfadden', 'F', 'F', 'T', 'T', 'F', 'F', 'T') 
INTO patients VALUES ('CEY48p3o1d', 'Alden', 'Cobb', 'F', 'F', 'F', 'T', 'F', 'F', 'F') 
INTO patients VALUES ('CIC76k0p7t', 'Risa', 'Bruce', 'T', 'T', 'F', 'T', 'T', 'F', 'F') 
INTO patients VALUES ('CJI97w0x6y', 'Daniel', 'Chen', 'F', 'T', 'F', 'T', 'T', 'F', 'F') 
INTO patients VALUES ('CJZ03n1a6y', 'Nell', 'Sweeney', 'F', 'F', 'T', 'F', 'T', 'T', 'F') 
INTO patients VALUES ('CLS26e9o4w', 'Allegra', 'Doyle', 'F', 'F', 'F', 'F', 'F', 'F', 'T') 
INTO patients VALUES ('CNR43r5h8p', 'Whilemina', 'Lyons', 'F', 'F', 'F', 'F', 'T', 'F', 'F') 
INTO patients VALUES ('CUE64v5p3c', 'Candice', 'Wilkerson', 'T', 'T', 'F', 'F', 'F', 'T', 'F') 
INTO patients VALUES ('CYY31v9f1w', 'Brittany', 'Mann', 'F', 'F', 'F', 'T', 'T', 'T', 'F') 
INTO patients VALUES ('DJP98t8y7e', 'Callie', 'Allen', 'F', 'T', 'T', 'T', 'T', 'F', 'F') 
INTO patients VALUES ('DJW02l0a6t', 'Robert', 'Clemons', 'F', 'T', 'T', 'F', 'F', 'F', 'F') 
INTO patients VALUES ('DQZ94b1n7r', 'Lee', 'Marsh', 'T', 'F', 'T', 'T', 'T', 'F', 'T') 
INTO patients VALUES ('DXX68n8e6d', 'Virginia', 'Vaughn', 'F', 'T', 'F', 'F', 'T', 'T', 'T') 
INTO patients VALUES ('EOX24l5f1h', 'Irma', 'Malone', 'F', 'T', 'T', 'T', 'F', 'F', 'T') 
INTO patients VALUES ('EPB87i4u8f', 'Cora', 'Pickett', 'T', 'F', 'F', 'T', 'T', 'T', 'T') 
INTO patients VALUES ('EVK71w6q6p', 'MacKenzie', 'Wilson', 'T', 'F', 'F', 'T', 'T', 'T', 'T') 
INTO patients VALUES ('FFL35u6y2s', 'Harlan', 'Hunt', 'T', 'F', 'F', 'T', 'F', 'T', 'T') 
INTO patients VALUES ('FFW08i7l6t', 'Tallulah', 'Cross', 'T', 'T', 'T', 'T', 'T', 'F', 'T') 
INTO patients VALUES ('FLJ71w7f3m', 'Porter', 'Richmond', 'F', 'T', 'F', 'T', 'T', 'T', 'T') 
INTO patients VALUES ('FMH54i9s6i', 'Burton', 'Macdonald', 'F', 'T', 'F', 'F', 'F', 'F', 'T') 
INTO patients VALUES ('FPF57p0y5f', 'Guy', 'Bryan', 'T', 'T', 'F', 'T', 'T', 'T', 'T')
SELECT * FROM dual;

ALTER TABLE patients
  ADD PRIMARY KEY (PatientID);

CREATE TABLE patients_signin
(
      Patient_Username varchar(255) NOT NULL PRIMARY KEY,
      Patient_Password varchar(255) DEFAULT NULL
)


INSERT ALL
INTO patients_signin VALUES ('BCN36i8k5h', 'password123')
INTO patients_signin VALUES ('BUF83e3o8q', 'password123')
INTO patients_signin VALUES ('CAM06n1a2s', 'password123')
INTO patients_signin VALUES ('CCW05o6s6x', 'password123')
INTO patients_signin VALUES ('CEY48p3o1d', 'password123')
INTO patients_signin VALUES ('CIC76k0p7t', 'password123')
INTO patients_signin VALUES ('CJI97w0x6y', 'password123')
INTO patients_signin VALUES ('CJZ03n1a6y', 'password123')
INTO patients_signin VALUES ('CLS26e9o4w', 'password123')
INTO patients_signin VALUES ('CNR43r5h8p', 'password123')
INTO patients_signin VALUES ('CUE64v5p3c', 'password123')
INTO patients_signin VALUES ('CYY31v9f1w', 'password123')
INTO patients_signin VALUES ('DJP98t8y7e', 'password123')
INTO patients_signin VALUES ('DJW02l0a6t', 'password123')
INTO patients_signin VALUES ('DQZ94b1n7r', 'password123')
INTO patients_signin VALUES ('DXX68n8e6d', 'password123')
INTO patients_signin VALUES ('EOX24l5f1h', 'password123')
INTO patients_signin VALUES ('EPB87i4u8f', 'password123')
INTO patients_signin VALUES ('EVK71w6q6p', 'password123')
INTO patients_signin VALUES ('FFL35u6y2s', 'password123')
INTO patients_signin VALUES ('FFW08i7l6t', 'password123')
INTO patients_signin VALUES ('FLJ71w7f3m', 'password123')
INTO patients_signin VALUES ('FMH54i9s6i', 'password123')
INTO patients_signin VALUES ('FPF57p0y5f', 'password123')
SELECT * FROM dual


CREATE TABLE admin_signin
(
      admin_Username varchar(255) NOT NULL PRIMARY KEY,
      admin_Password varchar(255) DEFAULT NULL
)


INSERT ALL
INTO admin_signin VALUES ('RootUser', 'RootPassword')
INTO admin_signin VALUES ('Admin', 'Admin')
INTO admin_signin VALUES ('Logan', 'Atkinson')
INTO admin_signin VALUES ('David', 'Hohn')
INTO admin_signin VALUES ('Gabriel', 'Stupart')
SELECT * FROM dual


CREATE SEQUENCE dataID_seq
    START WITH 1
    INCREMENT BY 1
    NOCACHE
    NOCYCLE;


CREATE TABLE MonitoringData (
    DataID int DEFAULT dataID_seq.NEXTVAL PRIMARY KEY,
    PatientID varchar(255),
    RecordDateTime DATE,
    HeartRate INT CHECK(HeartRate > 0),
    BloodPressure VARCHAR(20),
    Temperature DECIMAL(5,2) CHECK(Temperature > 0),
    OxygenSaturation DECIMAL(5,2) CHECK(OxygenSaturation BETWEEN 0 AND 100),
    BloodSugar DECIMAL(3,1) CHECK(BloodSugar > 0), 
    Weight NUMBER(3) CHECK(Weight > 0), 
    ArrythmiaEvent CHAR CHECK(ArrythmiaEvent = 'T' OR ArrythmiaEvent = 'F'),
    FOREIGN KEY (PatientID) REFERENCES Patients(PatientID)
);


CREATE TABLE HealthcareProviders (
    ProviderID VARCHAR2(255) PRIMARY KEY,
    FirstName VARCHAR2(50),
    LastName VARCHAR2(50),
    Specialization VARCHAR2(100),
    PhoneNumber VARCHAR2(15),
    Email VARCHAR2(100)
);


CREATE TABLE Appointments (
    AppointmentID INT PRIMARY KEY,
    PatientID VARCHAR(255),
    ProviderID VARCHAR(255),
    AppointmentDateTime DATE,
    AppointmentType VARCHAR2(50),
    Notes VARCHAR2(4000),
    FOREIGN KEY (PatientID) REFERENCES Patients(PatientID),
    FOREIGN KEY (ProviderID) REFERENCES HealthcareProviders(ProviderID)
);


