// External dependencies
const express = require('express');

const router = express.Router();
router.post('/login-request', async (req, res) => {
    const username = req.body.username;
    const password = req.body.password;
    console.log("inside");

    try {
        if (username && password) {
            // Send data to the PHP API
            const response = await axios.post('http://localhost:8000/api/login/validate.php', {
                username: username,
                password: password
            });

            if(response.data.success) {
                localStorage.setItem('user', JSON.stringify(response.data.user))
                switch(response.data.user['role']){
                    case 'patient':
                        res.redirect('/patient/book-appointment-start');
                        break;
                    case 'doctor':
                        res.redirect('/doctor/dashboard');
                        break;
                    case 'admin':
                        res.redirect('/admin/dashboard');
                        break;
                }
            }

        }
    } catch (error) {
        console.log('Error sending data to PHP API:', error.message);
        res.status(500).send('An error occurred');
    }
});
// Add your routes here - above the module.exports line

module.exports = router;
