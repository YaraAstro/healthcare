-- Create doctor table
CREATE TABLE doctor (
    id VARCHAR(5) PRIMARY KEY CHECK (id LIKE 'DC%'),
    username VARCHAR(50) NOT NULL UNIQUE,
    name VARCHAR(255),
    speciality VARCHAR(255),
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL
);

-- Create patient table
CREATE TABLE patient (
    id VARCHAR(5) PRIMARY KEY CHECK (id LIKE 'PT%'),
    username VARCHAR(50) NOT NULL UNIQUE,
    name VARCHAR(255),
    mobile VARCHAR(15),
    address TEXT,
    city VARCHAR(100),
    state VARCHAR(100),
    zip_code VARCHAR(10),
    age INT,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL
);

-- Create drug table
CREATE TABLE drug (
    id VARCHAR(5) PRIMARY KEY CHECK (id LIKE 'MD%'),
    name VARCHAR(255),
    description TEXT,
    img_path VARCHAR(100),
    amount VARCHAR(10)
);

-- Create appointment table
CREATE TABLE appointment (
    id VARCHAR(5) PRIMARY KEY CHECK (id LIKE 'AP%'),
    symptoms TEXT,
    description TEXT,
    patient_id VARCHAR(5),
    doctor_id VARCHAR(5),
    date DATE,
    status ENUM('pending', 'approve', 'reject', 'done') NOT NULL,

    FOREIGN KEY (patient_id) REFERENCES patient(id),
    FOREIGN KEY (doctor_id) REFERENCES doctor(id)
);

-- Create payment table
CREATE TABLE payment (
    id VARCHAR(5) PRIMARY KEY CHECK (id LIKE 'PY%'),
    patient_id VARCHAR(5),
    name_on_card VARCHAR(100),
    cc_number VARCHAR(20),
    amount VARCHAR(10),
    status ENUM('pending', 'success', 'declined'),

    FOREIGN KEY (patient_id) REFERENCES patient(id)
);

-- Create prescription table
CREATE TABLE prescription (
    id VARCHAR(5) PRIMARY KEY CHECK (id LIKE 'PR%'),
    patient_id VARCHAR(5),
    doctor_id VARCHAR(5),
    appo_id VARCHAR(5),
    payment_id VARCHAR(5),
    drugs TEXT,  -- drug column value be like -> [MDXXX, MDXXX, ....] array of drug ids
    amount VARCHAR(10),
    status ENUM('pending', 'paid') NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (appo_id) REFERENCES appointment(id),
    FOREIGN KEY (patient_id) REFERENCES patient(id),
    FOREIGN KEY (doctor_id) REFERENCES doctor(id),
    FOREIGN KEY (payment_id) REFERENCES payment(id)
);

-- since admin panel not connected yet here are some sample medicine data
INSERT INTO drug (id, name, description, img_path, amount) VALUES
('MD001', 'Aspirin', 'Pain reliever and anti-inflammatory medication.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Aspirin_100mg.jpg/1024px-Aspirin_100mg.jpg', '50.00'),
('MD002', 'Ibuprofen', 'Nonsteroidal anti-inflammatory drug (NSAID) used to reduce fever, pain, and inflammation.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Ibuprofen_%28Alkem%29.jpg/800px-Ibuprofen_%28Alkem%29.jpg', '60.00'),
('MD003', 'Paracetamol', 'Used to treat fever and mild to moderate pain.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Paracetamol.jpg/1024px-Paracetamol.jpg', '40.00'),
('MD004', 'Amoxicillin', 'Antibiotic used to treat bacterial infections.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/47/Amoxicillin.jpg/1024px-Amoxicillin.jpg', '150.00'),
('MD005', 'Metformin', 'Medication used to manage type 2 diabetes.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2e/Metformin_tablets.jpg/1024px-Metformin_tablets.jpg', '120.00'),
('MD006', 'Lisinopril', 'Used to treat high blood pressure and heart failure.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Lisinopril_%28Primatene%29.jpg/1024px-Lisinopril_%28Primatene%29.jpg', '200.00'),
('MD007', 'Lipitor', 'Statin used to lower cholesterol levels.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4b/Lipitor_tablets.jpg/1024px-Lipitor_tablets.jpg', '250.00'),
('MD008', 'Cetirizine', 'Antihistamine used to relieve allergy symptoms.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Cetirizine.jpg/1024px-Cetirizine.jpg', '80.00'),
('MD009', 'Simvastatin', 'Used to control high cholesterol.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/Simvastatin_20mg_5_Mg%2C_Frederick_Company.jpg/1024px-Simvastatin_20mg_5_Mg%2C_Frederick_Company.jpg', '220.00'),
('MD010', 'Prednisone', 'Corticosteroid used to treat inflammatory conditions.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/Prednisone.jpg/1024px-Prednisone.jpg', '300.00'),
('MD011', 'Hydrochlorothiazide', 'Diuretic used to treat high blood pressure and fluid retention.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Hydrochlorothiazide_25mg.jpg/1024px-Hydrochlorothiazide_25mg.jpg', '90.00'),
('MD012', 'Albuterol', 'Bronchodilator used to treat asthma and chronic obstructive pulmonary disease (COPD).', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/80/Albuterol_Inhaler.jpg/1024px-Albuterol_Inhaler.jpg', '350.00');
