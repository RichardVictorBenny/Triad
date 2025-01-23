// External dependencies
const express = require('express');

const router = express.Router();

router.post('/login-request', async (req, res) => {
    const username = req.body.username;
    const password = req.body.password;
    console.log("inside");

    try {
        if (username && password) {
            // Send data to the PHP API using fetch
            const response = await fetch('http://localhost:8000/api/login/validate.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',  // Set content type to JSON
                },
                body: JSON.stringify({
                    username: username,
                    password: password
                })
            });
    
            // Check if the response was successful
            if (response.ok) {
                const data = await response.json();  // Parse the JSON response
    
                if (data.success) {
                    switch (data.user['role']) {
                        case 'patient':
                            res.redirect('/patient/book-appointment-start');
                            break;
                        case 'doctor':
                            res.redirect('/doctor/dashboard');
                            break;
                        case 'admin':
                            res.redirect('/admin/dashboard');
                            break;
                        default:
                            res.status(400).send('Invalid user role');
                            break;
                    }
                } else {
                    res.status(401).send('Invalid credentials');
                }
            } else {
                res.status(500).send('Failed to authenticate with the server');
            }
        } else {
            res.status(400).send('Username and password are required');
        }
    } catch (error) {
        console.log('Error sending data to PHP API:', error);
        res.status(500).send(error);
    }
    
});

// Run this code when a form is submitted to 'magical-powers-answer'
router.post('/magical-powers-answer', function (req, res) {

    // Make a variable and give it the value from 'magical-powers'
    var magicPowers = req.session.data['magical-powers']
    
    // Check whether the variable matches a condition
    if (magicPowers == "yes"){
    // Send user to next page
    res.redirect('/details')
    } else {
    // Send user to ineligible page
    res.redirect('/ineligible')
    }
    
    })

module.exports = router;