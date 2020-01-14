const should = require('chai').should();
const foo = 'bar';

describe('String', ()=>{
    it('foo should be a string', () => {
        foo.should.be.a('string');
    })
})

describe('Asychronous', ()=>{
    it('Done should be executed after 200ms', done =>{
        const fn = () =>{
            foo.should.be.a('string');
            done();
        };
        setTimeout(fn,200);
    })
})

describe('Promise Test in mocha', ()=>{
    it('promis', ()=>{
        return new Promise(resolve => {
            foo.should.be.a('string');
            resolve();
        })
    })
})
