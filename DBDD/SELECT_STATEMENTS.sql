USE DBDD;
/* Doctor list with their Specialization */
SELECT d.DoctorID, d.DoctorName, s.SpecializationName 
FROM Doctors d, Specializations s
WHERE d.SpecializationID=s.SpecializationID;

/* Doctor list with Specialization and their Schedule days */
SELECT d.DoctorID, d.DoctorName, da.DayName, sp.SpecializationName 
FROM Doctors d, Schedules s, Days da, Specializations sp
WHERE d.DoctorID=s.DoctorID 
		AND d.SpecializationID=sp.SpecializationID 
		AND s.DayID=da.DayID 
		AND da.DayName='Monday'
ORDER BY d.DoctorID;

SELECT * FROM PaymentMethods;
SELECT * FROM InvoicePayments;

/* List of Finished Appointments */
SELECT a.AppointmentID, a.AppointmentDate, p.PatientName, d.DoctorName, a.Symptoms, s.StatusName 
FROM Patients p, Doctors d, Appointments a, AppointmentStatus s 
WHERE p.PatientID=a.PatientID 
		AND d.DoctorID=a.DoctorID 
		AND a.StatusID = s.StatusID 
		AND s.StatusName ='Completed' 
ORDER BY AppointmentID;

SELECT * FROM Patients;
/* treatment detail of an appointment */
SELECT t.TreatmentID, d.DoctorName, t.TreatmentDate, p.PatientName, t.Diagnosis, m.TypeName as Medicine, td.Prescription, td.Remark
FROM TreatmentDetails td, Treatments t, Appointments a, Patients p, MedicineTypes m, Doctors d
WHERE t.AppointmentID = a.AppointmentID 
		AND t.TreatmentID = td.TreatmentID
		AND a.PatientID = p.PatientID
		AND a.DoctorID = d.DoctorID
		AND m.TypeID = td.MedicineTypeID
		AND p.PatientName = 'Daw Thinzar Zaw Yu'
		
SELECT * FROM InvoiceDetails;

/* Invoice Info searched by date*/
SELECT i.InvoiceID, i.InvoiceDate, p.PatientName, p.PatientAge, p.PatientAddress, i.TotalCost
FROM Invoices i, Patients p
WHERE i.PatientID = p.PatientID
		AND i.InvoiceDate = '2022-08-01'

/* 5 most expensive medicine brands */
SELECT b.BrandName, b.Price, t.TypeName 
FROM MedicineBrands b, MedicineTypes t
WHERE b.TypeID = t.TypeID
ORDER BY b.Price DESC
OFFSET 0 ROWS FETCH NEXT 5 ROWS ONLY

/* Invoice Payments from the patients */
SELECT i.InvoiceDate, p.PatientName, i.TotalCost, ip.AmountPaid, ip.Refund, pm.PaymentMethodName 
FROM InvoicePayments ip, PaymentMethods pm, Invoices i, Patients p
WHERE ip.InvoiceID = i.InvoiceID
		AND ip.PaymentMethodID = pm.PaymentMethodID
		AND i.PatientID = p.PatientID;

/* Doctors with the more than one completed Appointments*/
SELECT d.DoctorName, d.DoctorID FROM Doctors d, Appointments a
WHERE d.DoctorID = a.DoctorID
		AND d.DoctorID in (
			SELECT DoctorID from Appointments ap, AppointmentStatus s
			WHERE ap.StatusID = s.StatusID
				AND s.StatusName = 'Completed'
			GROUP BY DoctorID
			HAVING COUNT(*) > 1)
		GROUP BY d.DoctorID, d.DoctorName

SELECT * FROM Doctors d, Schedules s
WHERE d.DoctorID = s.DoctorID
		AND d.DoctorID in (
			SELECT MAX(counter) FROM (
				SELECT COUNT(DoctorID) as counter FROM Schedules
				GROUP BY DoctorID
			)
		);

SELECT * FROM Doctors d, Schedules s
WHERE d.DoctorID = s.DoctorID

/*Doctors whose consultation fees are more than average*/
SELECT d.DoctorName, d.DoctorQualifications, d.ConsultationFees, s.SpecializationName 
FROM Doctors d, Specializations s
WHERE d.SpecializationID = s.SpecializationID
		AND ConsultationFees > (SELECT AVG(ConsultationFees) FROM Doctors)

/* Total Income of the month */
SELECT FORMAT(SUM(TotalCost), 'C0', 'my-MM') AS Total_Income FROM Invoices 
WHERE DateName(m,InvoiceDate) = 'August' 