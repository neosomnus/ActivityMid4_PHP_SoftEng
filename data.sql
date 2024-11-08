CREATE TABLE accountant (
    accountant_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR (50),
    first_name VARCHAR (50),
    last_name VARCHAR (50),
    date_of_birth VARCHAR (50),
    field_specialty TEXT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE client (
    client_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR (50),
    last_name VARCHAR (50),
    service_requested TEXT,
    accountant_id INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);