let person = new Object();
person.name = "Terry";
console.log(person.name);

/**
   The new keyword VS Primitive literal form
*/
let name = "Tom"; // string
let name2 = new String("Matt"); // create an Object type
name.age = 12;
name2.age = 20;
console.log(name.age); // undefined;
console.log(name2.age);// 26

console.log(typeof name) // string
console.log(typeof name2); // object

function setName(obj){
    obj.name = "Marry";
    obj = new Object();
    obj.name = "Greg";
}
 person = new Object();
setName(person);
console.log(person.name);

let s = "terry"
let b = true;
let i = 22;
let u;
let n = null;
let o = new Object();

console.log(typeof s);
console.log(s instanceof String);

var color = "blue";
function changeColor(){
    let anotherColor = 'red';

    function swapColors(){
        let tempColor = anotherColor;
        anotherColor = color;
        color = tempColor;
    }
    swapColors();
}
changeColor();
console.log(color);


