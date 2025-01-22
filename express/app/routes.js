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
// Add your routes here - above the module.exports line

module.exports = router;
