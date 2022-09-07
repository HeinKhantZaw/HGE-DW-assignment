INSERT INTO Specializations (SpecializationID, SpecializationName) VALUES
('SP-000001','Urology'),
('SP-000002','Neurology'),
('SP-000003','Paediatrics'),
('SP-000004','Family medicine'),
('SP-000005','Emergency medicine'),
('SP-000006','Cardiology'),
('SP-000007','Orthopedics'),
('SP-000008','General Phy	sician'),
('SP-000009','Ear, Nose and Throat'),
('SP-000010','Gynaecology'),
('SP-000011','Hepatobiliary');

SELECT * FROM Specializations;



INSERT INTO Doctors (DoctorID, DoctorName, DoctorQualifications, ConsultationFees, SpecializationID) VALUES
('D-000001','Prof Khin Tun','M.B,B.S ,M.Med.Sc(Surgery)', 30000, 'SP-000001'),
('D-000002','Prof Kyaw Myint','M.B,B.S , Dr.Med.Sc (Urology)', 30000, 'SP-000001'),
('D-000003','Prof Nwe Nwe Win','M.B.,B.S, M.Med.Sc (Int.Med), Dr.Med.Sc (Neurology)', 30000, 'SP-000002'),
('D-000004','Prof Kyaw Soe Tun','M.B.,B.S, M.Med.Sc (Int.Med)', 50000, 'SP-000003'),
('D-000005','Dr Naing Win Aung','M.B.,B.S, MRCP (UK), FRCP (Edin)', 35000, 'SP-000004'),
('D-000006','Dr Wai Lwin Myat','M.B.,B.S, M.Med.Sc (Int med)', 25000, 'SP-000004'),
('D-000007','Dr Moe Naing','M.B.,B.S, M.Med.Sc(Int.Med), M.Med.Sc(Surgery)', 40000, 'SP-000005'),
('D-000008','Prof Nyan Tun','M.B.,B.S, M.Med.Sc(Int.Med), Dr.Med.Sc (Cardiology)', 45000, 'SP-000006'),
('D-000009','Prof Ye Win Naing','M.B.,B.S (Ygn), M.Med.Sc. (Int Med), Dr.Med.Sc. (Cardiology), S.A.C.C. (USA)', 45000, 'SP-000006'),
('D-000010','Dr Swe Yi Tint','M.B.,B.S, Dr.Med.Sc(General Medicine)', 35000, 'SP-000007'),
('D-000011','Dr Zar Chi Lwin','M.B.,B.S, M.R.C.S(Edin)(UK)', 20000, 'SP-000008'),
('D-000012','Dr Aung Kyaw Zaw','M.B.,B.S, M.Med.Sc (Int Medicine), FCCP (USA)', 20000, 'SP-000009'),
('D-000013','Dr Htun Htun Win','M.B.,B.S, M.Med.Sc (Surgery), F.R.C.S (Ed)', 25000, 'SP-000010'),
('D-000014','Dr Aye Thida','M.B.,B.S, M.Med.Sc (Surgery), M.R.C.S (Edin)', 30000, 'SP-000011'),
('D-000015','Prof Myo Than','M.B.,B.S, M.Med.Sc (Emergency Medicine) M.R.C.S. (Edin)', 35000, 'SP-000005'),
('D-000016','Dr Lu Maw Win','M.B.,B.S, MMEDSC(OG)', 20000, 'SP-000003'),
('D-000017','Dr Win Htein','M.B.,B.S, M.Med.Sc (ENT)', 25000, 'SP-000007'),
('D-000018','Dr Khine Myat Min','M.B.,B.S, Dr.Med.Sc (Surgery), M.R.C.S (Edin)', 30000, 'SP-000005'),
('D-000019','Prof Tun Thuya','M.B.,B.S, M.Med.Sc (General Medicine)', 35000, 'SP-000009'),
('D-000020','Prof Sein Win','M.B,B.S, Dr.Med.Sc(General Medicine)', 40000, 'SP-000008');

SELECT * FROM Doctors;

INSERT INTO Days (DayID, DayName) VALUES
('Mon', 'Monday'),
('Tues', 'Tuesday'),
('Wed', 'Wednesday'),
('Thurs', 'Thursday'),
('Fri', 'Friday'),
('Sat', 'Saturday'),
('Sun', 'Sunday');

SELECT * FROM Days;

INSERT INTO Schedules (ScheduleID, DoctorID, DayID) VALUES
('SC-0001','D-000001','Mon'),
('SC-0002','D-000003','Mon'),
('SC-0003','D-000006','Mon'),
('SC-0004','D-000007','Mon'),
('SC-0005','D-000012','Mon'),
('SC-0006','D-000015','Mon'),
('SC-0007','D-000016','Mon'),
('SC-0008','D-000017','Mon'),
('SC-0009','D-000020','Mon'),
('SC-0010','D-000002','Tues'),
('SC-0011','D-000004','Tues'),
('SC-0012','D-000005','Tues'),
('SC-0013','D-000008','Tues'),
('SC-0014','D-000010','Tues'),
('SC-0015','D-000011','Tues'),
('SC-0016','D-000012','Tues'),
('SC-0017','D-000013','Tues'),
('SC-0018','D-000001','Wed'),
('SC-0019','D-000014','Wed'),
('SC-0020','D-000019','Wed'),
('SC-0021','D-000020','Wed'),
('SC-0022','D-000003','Wed'),
('SC-0023','D-000014','Wed'),
('SC-0024','D-000017','Wed'),
('SC-0025','D-000009','Wed'),
('SC-0026','D-000016','Wed'),
('SC-0027','D-000001','Thurs'),
('SC-0028','D-000004','Thurs'),
('SC-0029','D-000003','Thurs'),
('SC-0030','D-000005','Thurs'),
('SC-0031','D-000006','Thurs'),
('SC-0032','D-000007','Thurs'),
('SC-0033','D-000008','Thurs'),
('SC-0034','D-000010','Thurs'),
('SC-0035','D-000012','Thurs'),
('SC-0036','D-000013','Fri'),
('SC-0037','D-000015','Fri'),
('SC-0038','D-000017','Fri'),
('SC-0039','D-000018','Fri'),
('SC-0040','D-000011','Fri'),
('SC-0041','D-000002','Fri'),
('SC-0042','D-000019','Fri'),
('SC-0043','D-000007','Fri'),
('SC-0044','D-000009','Sat'),
('SC-0045','D-000010','Sat'),
('SC-0046','D-000011','Sat'),
('SC-0047','D-000015','Sat'),
('SC-0048','D-000018','Sat'),
('SC-0049','D-000020','Sat'),
('SC-0050','D-000018','Sun'),
('SC-0051','D-000016','Sun'),
('SC-0052','D-000019','Sun'),
('SC-0053','D-000014','Sun'),
('SC-0054','D-000009','Sun'),
('SC-0055','D-000005','Sun'),
('SC-00057','D-000008','Sun');

SELECT * FROM Schedules;


INSERT INTO Patients (PatientID, PatientName, PatientGender, PatientAge, PatientAddress) VALUES
('P-000001', 'U Min Khant', 'M', 34, '133-137 41st Street Botahtaung Tsp , Yangon,Myanmar'),
('P-000002', 'Daw Nanda Htet', 'F', 54, '10-F Dagon Tower Shwegondaing Junction Bahan Tsp , Yangon,Myanmar'),
('P-000003', 'U Win Zaw Thu', 'M', 46, '6 Kannar Street Lanmadaw Tsp , Yangon,Myanmar'),
('P-000004', 'U Zin Pyay Naing', 'M', 24, '372 Room 4  The Grand Mee Ya Hta Residences Bogyoke Aung San Rd. Pabedan Tsp , Yangon,Myanmar'),
('P-000005', 'U Bo Ag Sein', 'M', 35, '12-A Bawdi Yeiktha Street Bahan Tsp , Yangon,Myanmar'),
('P-000006', 'Daw Aeindra Myat Nwet', 'M', 37, '165-167 Room 4  35th Street Kyauktada Tsp , Yangon,Myanmar'),
('P-000007', 'Daw Zin Zin Yadanar', 'M', 58, '44-46 Room 5 1st Street Lanmadaw Tsp , Yangon,Myanmar'),
('P-000008', 'U Arkar Phone', 'M', 67, '279 Kyaikkasan Rd. Tamwe Tsp , Yangon,Myanmar'),
('P-000009', 'Daw Kay Thawda', 'M', 19, '127 Shwedagon Pagoda Rd. Latha Tsp , Yangon,Myanmar'),
('P-000010', 'U Soe Yazar', 'M', 42, 'Room 12 Bogyoka Aung San Market  Pabedan Tsp , Yangon,Myanmar'),
('P-000011', 'Daw Nilar Yin', 'M', 39, '133-137 41st Street Botahtaung Tsp , Yangon,Myanmar'),
('P-000012', 'Daw Thinzar Zaw Yu', 'M', 44, '35 Room 5 Old Yaydashay Rd. Bahan Tsp , Yangon,Myanmar'),
('P-000013', 'Daw Khin Yati', 'M', 64, '172 Anawrahta Rd. Botahtaung Tsp , Yangon,Myanmar'),
('P-000014', 'U Zaw Min', 'M', 34, '268  Mingalar Market Mill Rd. Mingalar Taung Nyunt Tsp , Yangon,Myanmar'),
('P-000015', 'Daw Hlaing Sandar Su', 'M', 35, '26 Thukha Street Hlaing Tsp , Yangon,Myanmar'),
('P-000016', 'U Ag Zaw Phone', 'M', 25, 'Bldg. 5 Lane  Hlaing Tsp , Yangon,Myanmar'),
('P-000017', 'U Htut Tun Myat Zeya', 'M', 36, '133-137 41st Street Botahtaung Tsp , Yangon,Myanmar'),
('P-000018', 'U Phone Kyaw', 'M', 48, '137  Seikkantha Street Kyauktada Tsp , Yangon,Myanmar'),
('P-000019', 'Daw Cho Cho Yee', 'M', 42, '42/24-25 Kan Thayar Street Shwepyitha Tsp , Yangon,Myanmar'),
('P-000020', 'Daw Hlaing Thinzar', 'M', 59, '75-77  Wardan Street Lanmadaw Tsp , Yangon,Myanmar');

SELECT * FROM Patients;

INSERT INTO AppointmentStatus (StatusID, StatusName) VALUES 
('AS-01', 'Booked'),
('AS-02', 'Emergency'),
('AS-03', 'Completed'),
('AS-04', 'Cancelled');

SELECT * FROM AppointmentStatus;

INSERT INTO Appointments (AppointmentID, AppointmentDate, PatientID, DoctorID, Symptoms, StatusID) VALUES
('AP-000001', '1/8/2022', 'P-000001', 'D-000001', 'Headache, exacerbated by tilting head forwards', 'AS-03'),
('AP-000002', '1/8/2022', 'P-000003', 'D-000015', 'Pain in lower limb', 'AS-04'),
('AP-000003', '1/8/2022', 'P-000002', 'D-000001', 'Sharp and stabbing stomach pain', 'AS-03'),
('AP-000004', '21/8/2022', 'P-000004', 'D-000001', 'Slow heart rate', 'AS-03'),
('AP-000005', '25/8/2022', 'P-000007', 'D-000001', 'Discomfort dizziness and fainting', 'AS-02'),
('AP-000006', '25/8/2022', 'P-000006', 'D-000001', 'Itching in crotch', 'AS-03'),
('AP-000007', '25/8/2022', 'P-000005', 'D-000001', 'Shortness of breath or difficulties in breathing', 'AS-02'),
('AP-000008', '1/9/2022', 'P-000008', 'D-000001', 'Swelling in the legs', 'AS-03'),
('AP-000009', '3/9/2022', 'P-000009', 'D-000001', 'Low Blood Pressure', 'AS-03'),
('AP-000010', '3/9/2022', 'P-000010', 'D-000001', 'Frequent Nosebleeds', 'AS-04'),
('AP-000011', '5/9/2022', 'P-000012', 'D-000001', 'Mild diarrhoea and vomiting', 'AS-01'),
('AP-000012', '8/9/2022', 'P-0000011', 'D-000001', 'Broken foot', 'AS-02'),
('AP-000013', '12/9/2022', 'P-0000013', 'D-000001', 'Sudden intense headache ', 'AS-01'),
('AP-000014', '23/9/2022', 'P-0000014', 'D-000001', 'Pain when you urinate', 'AS-01'),
('AP-000015', '21/10/2022', 'P-0000015', 'D-000001', 'Pain in the lower abdomen', 'AS-01'),
('AP-000016', '1/10/2022', 'P-000017', 'D-000001', 'Frequent Nosebleeds', 'AS-01'),
('AP-000017', '1/10/2022', 'P-000018', 'D-000001', 'Mild diarrhoea and vomiting', 'AS-01'),
('AP-000018', '2/10/2022', 'P-0000019', 'D-000001', 'Broken foot', 'AS-02'),
('AP-000019', '12/10/2022', 'P-0000012', 'D-000001', 'Sudden intense headache ', 'AS-01'),
('AP-000020', '22/10/2022', 'P-0000020', 'D-000001', 'Pain when you urinate', 'AS-01');




/*Not done yet*/ 
INSERT INTO PaymentMethods (PaymentMethodID, PaymentMethodName) VALUES 
('0001', 'Cash'),
('0002', 'Ditital Wallet'),
('0003', 'Bank Transfer');