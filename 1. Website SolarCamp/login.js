// server.js (Node.js with Express)
const express = require('express');
const bodyParser = require('body-parser');
const bcrypt = require('bcrypt');
const app = express();
const port = 3000;

// Dummy database (replace with a real database like MongoDB or MySQL)
const users = [];

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static('public'));

app.post('/register', async (req, res) => {
    const { username, password } = req.body;

    // Hash the password before storing it
    const hashedPassword = await bcrypt.hash(password, 10);

    // Store the user data in the database (dummy array in this case)
    users.push({ username, password: hashedPassword });

    res.send('Registration successful!');
});

app.post('/login', async (req, res) => {
    const { username, password } = req.body;

    // Check if the user exists in the database
    const user = users.find((user) => user.username === username);

    if (user) {
        // Compare the hashed password
        const passwordMatch = await bcrypt.compare(password, user.password);

        if (passwordMatch) {
            res.send('Login successful!');
        } else {
            res.status(401).send('Invalid password');
        }
    } else {
        res.status(404).send('User not found');
    }
});

app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});
