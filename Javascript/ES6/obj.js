// OLD

function People(name,age) {
    this.name = name;
    this.age = age;
}

People.prototype.sayName = function(){
    console.log('My name is ' + this.name);
}

var p = new People("Terry" , 12);
p.sayName();

function Man(sex , name , age){
    People.call(this,name , age);
    this.sex = sex;
}

Man.prototype = Object.create(People.prototype);

var m = new Man('m' , 'Peter', 21);
m.sayName();


// ES6

class Car {
    constructor(name,color){
        this.name = name;
        this.color = color;
    }

    getColor(){
        console.log(this.color);
    }
}

const c = new Car("bentan", 'red');
c.getColor();


class ElCar extends Car{
    constructor(v, name , color){
        super(name , color);
        this.v = v;
    }
}

var e = new ElCar(100 , "Benchi" , 'white');

e.getColor();

