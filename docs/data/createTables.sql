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

-- Create drug table
CREATE TABLE cart (
    patient_id VARCHAR(5),
    drug_id VARCHAR(5),
    qty INT,
    price VARCHAR(10),
    total VARCHAR(10),

    FOREIGN KEY (patient_id) REFERENCES patient(id),
    FOREIGN KEY (drug_id) REFERENCES drug(id),
);

-- Create payment table
CREATE TABLE payment (
    id VARCHAR(5) PRIMARY KEY CHECK (id LIKE 'PY%'),
    patient_id VARCHAR(5),
    appo_id VARCHAR(5),
    name_on_card VARCHAR(100),
    cc_number VARCHAR(20),
    amount VARCHAR(10),
    status ENUM('pending', 'success', 'declined'),

    FOREIGN KEY (patient_id) REFERENCES patient(id),
    FOREIGN KEY (appo_id) REFERENCES appointment(id)
);

-- Create prescription table
CREATE TABLE prescription (
    id VARCHAR(5) PRIMARY KEY CHECK (id LIKE 'PR%'),
    patient_id VARCHAR(5) NOT NULL,
    doctor_id VARCHAR(5) NOT NULL,
    appo_id VARCHAR(5) NOT NULL,
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
('MD001', 'Aspirin', 'Pain reliever and anti-inflammatory medication.', 'https://medlineplus.gov/images/Medicines_share.jpg', '50.00'),
('MD002', 'Ibuprofen', 'Nonsteroidal anti-inflammatory drug (NSAID) used to reduce fever, pain, and inflammation.', 'https://medlineplus.gov/images/Medicines_share.jpg', '60.00'),
('MD003', 'Paracetamol', 'Used to treat fever and mild to moderate pain.', 'https://medlineplus.gov/images/Medicines_share.jpg', '40.00'),
('MD004', 'Amoxicillin', 'Antibiotic used to treat bacterial infections.', 'https://medlineplus.gov/images/Medicines_share.jpg', '150.00'),
('MD005', 'Metformin', 'Medication used to manage type 2 diabetes.', 'https://medlineplus.gov/images/Medicines_share.jpg', '120.00'),
('MD006', 'Lisinopril', 'Used to treat high blood pressure and heart failure.', 'https://medlineplus.gov/images/Medicines_share.jpg', '200.00'),
('MD007', 'Lipitor', 'Statin used to lower cholesterol levels.', 'https://medlineplus.gov/images/Medicines_share.jpg', '250.00'),
('MD008', 'Cetirizine', 'Antihistamine used to relieve allergy symptoms.', 'https://medlineplus.gov/images/Medicines_share.jpg', '80.00'),
('MD009', 'Simvastatin', 'Used to control high cholesterol.', 'https://medlineplus.gov/images/Medicines_share.jpg', '220.00'),
('MD010', 'Prednisone', 'Corticosteroid used to treat inflammatory conditions.', 'https://medlineplus.gov/images/Medicines_share.jpg', '300.00'),
('MD011', 'Hydrochlorothiazide', 'Diuretic used to treat high blood pressure and fluid retention.', 'https://medlineplus.gov/images/Medicines_share.jpg', '90.00'),
('MD012', 'Albuterol', 'Bronchodilator used to treat asthma and chronic obstructive pulmonary disease (COPD).', 'https://medlineplus.gov/images/Medicines_share.jpg', '350.00');
