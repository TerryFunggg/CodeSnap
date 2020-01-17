const request = require('supertest');
//get request
request
    .get('some url')
    .query({foo:'bar'})
    .end((err,res) => {
       
    })

// post request
request
    .post('some url')
    .send({foo:'bar'})
    .set('accept','json')
    .end((err,res) => {
       
    })
