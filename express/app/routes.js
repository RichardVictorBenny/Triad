// External dependencies
const express = require('express');

const router = express.Router();
router.post('/login-request', function(req, res) {
    var username = req.body.username;
    var password = req.body.password;

    fetch('/login')

    console.log(username);



        // res.redirect('/details')
    
})
// Add your routes here - above the module.exports line

module.exports = router;
