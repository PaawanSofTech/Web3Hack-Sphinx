// Import required modules
const express = require('express');
const mysql = require('mysql2');
const bodyParser = require('body-parser');
const cors = require('cors');

const app = express();
const port = process.env.PORT || 3001;

// Create a MySQL connection
const db = mysql.createConnection({
  host: 'localhost', // Change to your MySQL host
  user: 'root', // Change to your MySQL username
  database: 'vote', // Change to your database name
});

// Middleware setup
app.use(cors()); // Enable CORS for all routes
app.use(bodyParser.json());

// Your route for storing vote data
// This route should handle the incoming vote data and insert it into the database
app.post('/store-vote', (req, res) => {
  const { address, vote } = req.body;

  // Insert vote data into the database
  db.query('INSERT INTO vote_table (address, vote) VALUES (?, ?)', [address, vote], (err, result) => {
    if (err) {
      console.error('Error storing vote data:', err);
      res.status(500).json({ error: 'An error occurred while storing vote data.' });
    } else {
      res.status(200).json({ message: 'Vote data stored successfully.' });
    }
  });
});

// Start the server
app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
