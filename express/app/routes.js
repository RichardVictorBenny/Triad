const express = require('express');
const axios = require('axios'); // For making HTTP requests

const router = express.Router();

router.post('/login-request', async (req, res) => {
    const username = req.body.username;
    const password = req.body.password;

    try {
        if (username && password) {
            // Send data to the PHP API
            const response = await axios.post('http://localhost:8000/insert.php', {
                username,
                password,
            });

            // Log PHP API response
            console.log('PHP API Response:', response.data);

            if (response.data.success) {
                res.redirect('/details'); // Redirect on success
            } else {
                res.send('Error: ' + response.data.message); // Show error message from PHP
            }
        } else {
            res.send('Username and password are required');
        }
    } catch (error) {
        console.error('Error sending data to PHP API:', error.message);
        res.status(500).send('An error occurred');
    }
});

module.exports = router;
