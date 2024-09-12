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
