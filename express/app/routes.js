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
        res.redirect('/patient/dashboard');
    }
    if(username === 'Daria' && password === 'daria'){
        res.redirect('/doctor/dashboard');
    }
    if(username === 'admin' && password === 'admin'){
        res.redirect('/admin/dashboard');
    }
})

router.post('/slots', function(req, res) {
    console.log(req.params.time);
    res.redirect('/patient/describesymtoms');
  })


module.exports = router;
