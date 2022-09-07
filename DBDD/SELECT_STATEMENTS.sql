INSERT INTO Specializations (SpecializationID, SpecializationName) VALUES
                                                                       ('SP-000001','Urology'),
                                                                       ('SP-000002','Neurology'),
                                                                       ('SP-000003','Paediatrics'),
                                                                       ('SP-000004','Family medicine'),
                                                                       ('SP-000005','Emergency medicine'),
                                                                       ('SP-000006','Cardiology'),
                                                                       ('SP-000007','Orthopedics'),
                                                                       ('SP-000008','General Physician'),
                                                                       ('SP-000009','Ear, Nose and Throat'),
                                                                       ('SP-000010','Gynaecology'),
                                                                       ('SP-000011','Hepatobiliary');

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

INSERT INTO Days (DayID, DayName) VALUES
                                      ('Mon', 'Monday'),
                                      ('Tues', 'Tuesday'),
                                      ('Wed', 'Wednesday'),
                                      ('Thurs', 'Thursday'),
                                      ('Fri', 'Friday'),
                                      ('Sat', 'Saturday'),
                                      ('Sun', 'Sunday');

