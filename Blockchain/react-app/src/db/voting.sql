-- Create a new database (if it doesn't already exist)
CREATE DATABASE IF NOT EXISTS voting_db;

-- Use the newly created database
USE voting_db;

-- Create a table to store vote data
CREATE TABLE IF NOT EXISTS vote_table (
  id INT AUTO_INCREMENT PRIMARY KEY,
  address VARCHAR(255) NOT NULL UNIQUE, -- Add UNIQUE constraint to address column
  vote VARCHAR(255) NOT NULL,
  timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
