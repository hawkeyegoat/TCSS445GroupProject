-- Script: PatientDatabase
-- A database for group 5 project for 445
SET SESSION sql_mode = 'STRICT_ALL_TABLES';

-- PATIENTS table
CREATE TABLE patients (
  PatientID VARCHAR(10) NOT NULL,
  First_name VARCHAR(20) DEFAULT 'John',
  Last_name VARCHAR(20) DEFAULT 'Doe',
  High_Blood_Pressure CHAR(1) DEFAULT 'F' CHECK (High_Blood_Pressure IN ('T', 'F')),
  Diabetes CHAR(1) DEFAULT 'F' CHECK (Diabetes IN ('T', 'F')),
  Weight_gain CHAR(1) DEFAULT 'F' CHECK (Weight_gain IN ('T', 'F')),
  Heart_conditions CHAR(1) DEFAULT 'F' CHECK (Heart_conditions IN ('T', 'F')),
  COPD CHAR(1) DEFAULT 'F' CHECK (COPD IN ('T', 'F')),
  Sleep_apnea CHAR(1) DEFAULT 'F' CHECK (Sleep_apnea IN ('T', 'F')),
  Asthma CHAR(1) DEFAULT 'F' CHECK (Asthma IN ('T', 'F')),
  PRIMARY KEY (PatientID)
);

INSERT INTO patients (PatientID, First_name, Last_name, High_Blood_Pressure, Diabetes, Weight_gain, Heart_conditions, COPD, Sleep_apnea, Asthma) VALUES 
('BCN36i8k5h', 'Frances', 'Gibbs', 'F', 'T', 'F', 'F', 'T', 'T', 'F'),
('BUF83e3o8q', 'Sade', 'Hobbs', 'T', 'T', 'T', 'T', 'T', 'F', 'T'),
('CAM06n1a2s', 'Aileen', 'Hayden', 'T', 'T', 'T', 'F', 'F', 'T', 'T'),
('CCW05o6s6x', 'Eaton', 'Mcfadden', 'F', 'F', 'T', 'T', 'F', 'F', 'T'),
('CEY48p3o1d', 'Alden', 'Cobb', 'F', 'F', 'F', 'T', 'F', 'F', 'F'),
('CIC76k0p7t', 'Risa', 'Bruce', 'T', 'T', 'F', 'T', 'T', 'F', 'F'),
('CJI97w0x6y', 'Daniel', 'Chen', 'F', 'T', 'F', 'T', 'T', 'F', 'F'),
('CJZ03n1a6y', 'Nell', 'Sweeney', 'F', 'F', 'T', 'F', 'T', 'T', 'F'),
('CLS26e9o4w', 'Allegra', 'Doyle', 'F', 'F', 'F', 'F', 'F', 'F', 'T'),
('CNR43r5h8p', 'Whilemina', 'Lyons', 'F', 'F', 'F', 'F', 'T', 'F', 'F'),
('CUE64v5p3c', 'Candice', 'Wilkerson', 'T', 'T', 'F', 'F', 'F', 'T', 'F'),
('CYY31v9f1w', 'Brittany', 'Mann', 'F', 'F', 'F', 'T', 'T', 'T', 'F'),
('DJP98t8y7e', 'Callie', 'Allen', 'F', 'T', 'T', 'T', 'T', 'F', 'F'),
('DJW02l0a6t', 'Robert', 'Clemons', 'F', 'T', 'T', 'F', 'F', 'F', 'F'),
('DQZ94b1n7r', 'Lee', 'Marsh', 'T', 'F', 'T', 'T', 'T', 'F', 'T'),
('DXX68n8e6d', 'Virginia', 'Vaughn', 'F', 'T', 'F', 'F', 'T', 'T', 'T'),
('EOX24l5f1h', 'Irma', 'Malone', 'F', 'T', 'T', 'T', 'F', 'F', 'T'),
('EPB87i4u8f', 'Cora', 'Pickett', 'T', 'F', 'F', 'T', 'T', 'T', 'T'),
('EVK71w6q6p', 'MacKenzie', 'Wilson', 'T', 'F', 'F', 'T', 'T', 'T', 'T'),
('FFL35u6y2s', 'Harlan', 'Hunt', 'T', 'F', 'F', 'T', 'F', 'T', 'T'),
('FFW08i7l6t', 'Tallulah', 'Cross', 'T', 'T', 'T', 'T', 'T', 'F', 'T'),
('FLJ71w7f3m', 'Porter', 'Richmond', 'F', 'T', 'F', 'T', 'T', 'T', 'T'),
('FMH54i9s6i', 'Burton', 'Macdonald', 'F', 'T', 'F', 'F', 'F', 'F', 'T'),
('FPF57p0y5f', 'Guy', 'Bryan', 'T', 'T', 'F', 'T', 'T', 'T', 'T');

-- PATIENTS_SIGNIN table
CREATE TABLE patients_signin (
  Patient_Username VARCHAR(255) NOT NULL PRIMARY KEY,
  Patient_Password VARCHAR(255) NOT NULL
);

INSERT INTO patients_signin (Patient_Username, Patient_Password) VALUES 
('BCN36i8k5h', 'password123'),
('BUF83e3o8q', 'password123'),
('CAM06n1a2s', 'password123'),
('CCW05o6s6x', 'password123'),
('CEY48p3o1d', 'password123'),
('CIC76k0p7t', 'password123'),
('CJI97w0x6y', 'password123'),
('CJZ03n1a6y', 'password123'),
('CLS26e9o4w', 'password123'),
('CNR43r5h8p', 'password123'),
('CUE64v5p3c', 'password123'),
('CYY31v9f1w', 'password123'),
('DJP98t8y7e', 'password123'),
('DJW02l0a6t', 'password123'),
('DQZ94b1n7r', 'password123'),
('DXX68n8e6d', 'password123'),
('EOX24l5f1h', 'password123'),
('EPB87i4u8f', 'password123'),
('EVK71w6q6p', 'password123'),
('FFL35u6y2s', 'password123'),
('FFW08i7l6t', 'password123'),
('FLJ71w7f3m', 'password123'),
('FMH54i9s6i', 'password123'),
('FPF57p0y5f', 'password123');

-- ADMIN_SIGNIN table
CREATE TABLE admin_signin (
  admin_Username VARCHAR(255) NOT NULL PRIMARY KEY,
  admin_Password VARCHAR(255) NOT NULL
);

INSERT INTO admin_signin (admin_Username, admin_Password) VALUES 
('RootUser', 'RootPassword'),
('Admin', 'Admin'),
('Logan', 'Atkinson'),
('David', 'Hohn'),
('Gabriel', 'Stupart');

-- MONITORINGDATA table
CREATE TABLE MonitoringData (
  DataID INT AUTO_INCREMENT PRIMARY KEY,
  PatientID VARCHAR(255),
  RecordDateTime DATETIME,
  HeartRate INT CHECK (HeartRate > 0),
  BloodPressure VARCHAR(20),
  Temperature DECIMAL(5,2) CHECK (Temperature > 0),
  OxygenSaturation DECIMAL(5,2) CHECK (OxygenSaturation BETWEEN 0 AND 100),
  BloodSugar DECIMAL(3,1) CHECK (BloodSugar > 0), 
  Weight INT CHECK (Weight > 0), 
  ArrythmiaEvent CHAR(1) CHECK (ArrythmiaEvent IN ('T', 'F')),
  FOREIGN KEY (PatientID) REFERENCES patients(PatientID) ON DELETE CASCADE
);

INSERT INTO MonitoringData (PatientID, RecordDateTime, HeartRate, BloodPressure, Temperature, OxygenSaturation, BloodSugar, Weight, ArrythmiaEvent) VALUES 
('BCN36i8k5h', '2024-04-20 10:00:00', 72, '120/80', 90, 98.0, 5.4, 190, 'F'),
('BUF83e3o8q', '2024-04-21 11:00:00', 80, '130/85', 93, 96.0, 7.2, 215, 'T'),
('CAM06n1a2s', '2024-04-22 09:00:00', 88, '140/90', 98, 95.0, 6.1, 177, 'F'),
('CCW05o6s6x', '2024-04-23 08:30:00', 65, '115/75', 94, 97.5, 5.8, 203, 'F'),
('CEY48p3o1d', '2024-04-24 14:00:00', 77, '125/80', 90, 99.0, 5.5, 155, 'F'),
('CIC76k0p7t', '2024-04-25 16:00:00', 85, '118/76', 91, 98.5, 6.3, 198, 'F'),
('CJI97w0x6y', '2024-04-26 07:00:00', 90, '132/88', 88, 95.5, 7.0, 168, 'T'),
('CJZ03n1a6y', '2024-04-27 12:00:00', 74, '120/82', 92, 98.2, 5.2, 240, 'F'),
('CLS26e9o4w', '2024-04-28 10:30:00', 68, '110/70', 93, 99.5, 5.6, 226, 'F'),
('CNR43r5h8p', '2024-04-29 11:30:00', 76, '128/84', 94, 97.0, 6.8, 183, 'T');

-- HEALTHCAREPROVIDERS table
CREATE TABLE HealthcareProviders (
  ProviderID VARCHAR(255) PRIMARY KEY,
  FirstName VARCHAR(50),
  LastName VARCHAR(50),
  Specialization VARCHAR(100),
  PhoneNumber VARCHAR(15),
  Email VARCHAR(100)
);

INSERT INTO HealthcareProviders (ProviderID, FirstName, LastName, Specialization, PhoneNumber, Email) VALUES 
('PRV001', 'Alice', 'Martin', 'Cardiology', '(253) 555-0101', 'alice.martin@gmail.com'),
('PRV002', 'Bob', 'Rivers', 'Endocrinology', '(253) 555-0102', 'bob.rivers@gmail.com'),
('PRV003', 'Carol', 'Jeffry', 'General Practice', '(253) 555-0103', 'carol.jeffry@gmail.com'),
('PRV004', 'David', 'Brown', 'Pediatrics', '(253) 555-0104', 'david.brown@gmail.com'),
('PRV005', 'Emma', 'Davis', 'Geriatrics', '(253) 555-0105', 'emma.davis@gmail.com'),
('PRV006', 'Fiona', 'Shrek', 'Neurology', '(253) 555-0106', 'fiona.shrek@gmail.com'),
('PRV007', 'Hank', 'Hill', 'Dermatology', '(253) 555-0107', 'hank.hill@gmail.com'),
('PRV008', 'Hannah', 'Montana', 'Oncology', '(253) 555-0108', 'hannah.montana@gmail.com'),
('PRV009', 'Lewis', 'Clark', 'Orthopedics', '(253) 555-0109', 'lewis.clark@gmail.com'),
('PRV010', 'Homer', 'Simpson', 'Psychiatry', '(253) 555-0110', 'homer.simpson@gmail.com');

-- APPOINTMENTS table
CREATE TABLE Appointments (
  PatientID VARCHAR(255),
  ProviderID VARCHAR(255),
  AppointmentDateTime DATETIME,
  AppointmentType VARCHAR(50),
  Notes VARCHAR(4000) DEFAULT 'No Notes for Appointment',
  PRIMARY KEY (PatientID, ProviderID, AppointmentDateTime),
  FOREIGN KEY (PatientID) REFERENCES patients(PatientID) ON DELETE CASCADE,
  FOREIGN KEY (ProviderID) REFERENCES HealthcareProviders(ProviderID) ON DELETE CASCADE
);

INSERT INTO Appointments (PatientID, ProviderID, AppointmentDateTime, AppointmentType, Notes) VALUES 
('BCN36i8k5h', 'PRV001', '2024-05-15 09:00:00', 'Check-up', 'Review medication'),
('BUF83e3o8q', 'PRV002', '2024-05-16 10:00:00', 'Consultation', 'Discuss diet changes'),
('CAM06n1a2s', 'PRV003', '2024-05-17 11:00:00', 'Follow-up', 'Check blood pressure results'),
('CCW05o6s6x', 'PRV004', '2024-05-18 14:00:00', 'Routine Check', 'Annual health review'),
('CEY48p3o1d', 'PRV005', '2024-05-19 08:00:00', 'Emergency', 'Urgent care for respiratory issue'),
('CIC76k0p7t', 'PRV006', '2024-05-20 13:00:00', 'Routine Check', 'Neurological evaluation'),
('CJI97w0x6y', 'PRV007', '2024-05-21 09:00:00', 'Dermatological', 'Skin checkup'),
('CJZ03n1a6y', 'PRV008', '2024-05-22 11:00:00', 'Follow-up', 'Oncology follow-up'),
('CLS26e9o4w', 'PRV009', '2024-05-23 15:00:00', 'Orthopedic', 'Post-surgery follow-up'),
('CNR43r5h8p', 'PRV010', '2024-05-24 10:00:00', 'Follow-up', 'Medication adjustment');



