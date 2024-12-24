CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    hashed_password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, hashed_password) VALUES
('alice', '$2b$12$KIXI7cW3zQsk4oDGe4dMHe9uTSIaKh7J6.Y8PBaQb70Gg8zCCn6dS'), -- Hashed password: "password123"
('bob', '$2b$12$2I9wYqke8R60z2He/9B5IeJXPR9TzVAtXgYrDJi1kQgbmjz6kFONy'),   -- Hashed password: "123456789"
('carol', '$2b$12$6f2DPLzD6Y1A41lHnnZXp5yW2fSo7ir6oETIm5AwhGi3GVLq0oFe2'), -- Hashed password: "qwerty"
('dave', '$2b$12$6QVVNmIEyGSX3q5L8CmjD1pI1WaUvbckQp9DymOoZb5hKj4t9ya8q'), -- Hashed password: "davepassword"
('eve', '$2b$12$V4U9dvcH7gm4wkvXJ7j1P47xlyTeqdbsH4OV8u/OD4yFh5hjY9Q.6'); -- Hashed password: "letmein"
