// External dependencies
const express = require('express');

const router = express.Router();
router.post('/magical-powers-answer', function(req, res) {
    var magicPowers = req.session.data['magical-powers']

    if(magicPowers == "yes"){
        res.redirect('/details')
    } else{
        res.redirect('/ineligible')
    }
})

router.post('/login-request', function(req, res) {
    username = req.session.data['username'];
    password = req.session.data['password'];

    if(username === 'Jenny' && password === 'jenny'){
        res.redirect('/patient/booking');
    }
    if(username === 'Daria' && password === 'daria'){
        res.redirect('/doctor/dashboard');
    }
    if(username === 'admin' && password === 'admin'){
        res.redirect('/admin/dashboard');
    }
})



// Add your routes here - above the module.exports line

module.exports = router;
