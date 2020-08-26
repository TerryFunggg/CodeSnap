//sample 1
let message = 
    name =>
        greeting =>
            greeting + " ! " + name
            + ",how are you?"
let text = message("terry")('Hi')
console.log(text);


// Curry Sample 2
let users = [
    {name:"terry",gender:"m"},
    {name:"marry",gender:"f"},
    {name:"sam",gender:"m"},
    {name:"lily",gender:"f"},
    {name:"tom",gender:"m"},
    {name:"peter",gender:"m"}
];

//let removeM = user => user.gender != "m"
//let removeF = user => user.gender != "f"

let removeGender = _.curry((gender,user) => user.gender != gender);

 let result = users.filter(removeGender('m'));

 console.log(result);