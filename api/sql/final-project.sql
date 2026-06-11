-- 1. Users Table (Secure)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    gender ENUM('Male', 'Female', 'Other'),
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. Products Table
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(100),
    stock INT DEFAULT 0,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. Express Services
CREATE TABLE express_services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    delivery_time VARCHAR(50)
);

-- 4. Payment Methods
CREATE TABLE payment_methods (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    provider VARCHAR(100)
);

-- 5. Orders Table (Main)
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    status ENUM('Pending Payment', 'Payment Verified', 'Preparing Order', 'Shipping', 'Delivered', 'Cancelled') DEFAULT 'Pending Payment',
    express_service_id INT,
    payment_method_id INT,
    shipping_address TEXT,
    payment_slip VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (express_service_id) REFERENCES express_services(id),
    FOREIGN KEY (payment_method_id) REFERENCES payment_methods(id)
);

-- 6. Order Items
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price_at_purchase DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Seed Data for Express & Banks
INSERT INTO express_services (name, delivery_time) VALUES 
('Anousith Express', '1-2 Days'),
('Haltech Express', '1-3 Days'),
('Mixay Express', '1-2 Days');

INSERT INTO payment_methods (name, provider) VALUES 
('BCEL One', 'BCEL Bank'),
('LDB Bank', 'Lao Development Bank'),
('LPMB', 'Laos Popular Mobile Banking');

-- Seed Products
INSERT INTO products (name, price, category, stock, image_url) VALUES
('How to Focus', 250.00, 'Books', 10, 'how to focus.jpg'),
('Mindset', 320.00, 'Books', 12, 'mindset.jpg'),
('Rich Dad Poor Dad', 390.00, 'Books', 15, 'rich dad poor dad.jpg');
