CREATE DATABASE barbershop_management;

use barbershop_management;

CREATE TABLE admins (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    contact_number VARCHAR(20),
    email VARCHAR(100),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(100),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE barbers (
    barber_id INT AUTO_INCREMENT PRIMARY KEY,
    barber_name VARCHAR(100) NOT NULL,
    status ENUM('Available','Busy') DEFAULT 'Available',
    image VARCHAR(255) NULL
);

CREATE TABLE services (
    service_id INT AUTO_INCREMENT PRIMARY KEY,
    service_name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    duration_minutes INT NOT NULL
);

CREATE TABLE hairstyles (
    hairstyle_id INT AUTO_INCREMENT PRIMARY KEY,
    hairstyle_name VARCHAR(100) NOT NULL,
    description VARCHAR(255),
    image VARCHAR(255) NULL
);

CREATE TABLE queue (
    queue_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    service_id INT NOT NULL,
    barber_id INT NOT NULL,
    hairstyle_id INT,
    queue_number INT NOT NULL,
    status ENUM('Waiting','Ongoing','Done','Cancelled') DEFAULT 'Waiting',
    time_in DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id),
    FOREIGN KEY (service_id) REFERENCES services(service_id),
    FOREIGN KEY (barber_id) REFERENCES barbers(barber_id),
    FOREIGN KEY (hairstyle_id) REFERENCES hairstyles(hairstyle_id)
);

CREATE TABLE ratings (
    rating_id INT AUTO_INCREMENT PRIMARY KEY,
    queue_id INT NOT NULL,
    rating INT NOT NULL,
    comment TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (queue_id) REFERENCES queue(queue_id)
);

INSERT INTO barbers (barber_name, status, image) VALUES
('Kyle', 'Available', 'images/kyle.jpg'),
('Jay', 'Available', 'images/frias.jpg'),
('Christian', 'Available', 'images/cj.jpg'),
('Keith', 'Available', 'images/keith.jpg'),
('Justin', 'Available', 'images/justin.jpg');

INSERT INTO services (service_name, price, duration_minutes) VALUES
('Haircut', 100.00, 20),
('Haircut + Shave', 150.00, 30),
('Haircut + Wash', 150.00, 30),
('Haircut + Wash + Shave', 200.00, 40);

INSERT INTO hairstyles (hairstyle_name, description, image) VALUES
('Wolf Cut', 'Layered and textured style', 'images/wolfcut.jpg'),
('Mullet', 'Short front and sides, longer back', 'images/mullet.jpg'),
('Burst Fade', 'Fade around the ear area', 'images/burstfade.jpg'),
('Buzz Cut', 'Very short all around', 'images/buzzcut.jpg'),
('Crew Cut', 'Classic short haircut', 'images/crewcut.jpg'),
('Custom', 'Customer specific choice', 'images/custom.jpg');

INSERT INTO admins (username, password) VALUES
('admin', 'admin123');