INSERT INTO users (name, email, password, email_verified_at, remember_token, created_at, updated_at) VALUES
('alice', 'alice@example.com', '$2y$12$e4QPNokuCemLi.3184XtxO6tQNq6FhpDF0Vca42rBmuBd8zmxfs9.', NULL, NULL, NOW(), NOW()),  -- Hashed password: "password123"
('bob', 'bob@example.com', '$2y$12$mUUjg6eEAQMUHPHDB1SkneueIQipYEBoxUxyZYQPc.4H.JraMn6ly', NULL, NULL, NOW(), NOW()),   -- Hashed password: "123456789"
('carol', 'carol@example.com', '$2y$12$2cJYILlUb6xeERDfwq3b3.mi0PDooEqfbhLickikyNCIi7MA6If/S', NULL, NULL, NOW(), NOW()), -- Hashed password: "qwerty"
('dave', 'dave@example.com', '$2y$12$WSXLFxHjcHzof2mLpMZzB.OB48XgKURrLZUxK7lB5E2FvsnPdrpaG', NULL, NULL, NOW(), NOW()), -- Hashed password: "davepassword"
('eve', 'eve@example.com', '$2y$12$VdL.dbbqBeBMuf2y2vh.neMGkzbQV4bFWk/3e29jTdW/stDy5Recm{', NULL, NULL, NOW(), NOW()); -- Hashed password: "letmein"
