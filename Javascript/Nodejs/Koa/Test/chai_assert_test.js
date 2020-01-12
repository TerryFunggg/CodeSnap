const { assert } = require('chai');

const foo = "bar";const beverages = { tea: ['chai','matcha','oolong']};

assert.typeOf(foo,'string');
assert.typeOf(foo,'string','foo is string') // given the message

assert.equal(foo,'bar');

assert.lengthOf(foo,3);

assert.lengthOf(beverages.tea, 3);

