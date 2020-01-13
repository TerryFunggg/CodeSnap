const foo = 'bar';
const beverage = { tea: ['chai', 'matcha', 'oolong']};


// expect
const { expect } = require('chai');
expect(foo).to.be.a('string');
expect(foo).to.equal('bar');
expect(foo).to.have.lengthOf(3);
expect(foo).to.have.lengthOf(3);
expect(beverage).to.have.property('tea').with.lengthOf(3);

// should
const should = require('chai').should();
foo.should.be.a('string');
foo.should.equal('bar');
foo.should.have.lengthOf(3);
beverage.should.have.property('tea').with.length(3);
