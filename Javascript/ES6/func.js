

// ES6

const shopList = ['Milk' , 'Cow', 'Eggs','Bananas'];

const newList = shopList.map(item => "The " + item );

console.log(newList)

// filter

const filterList = shopList.filter(item => item !== 'Eggs');

console.log(filterList);

