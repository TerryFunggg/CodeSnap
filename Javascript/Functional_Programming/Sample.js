class Person {
    constructor(firstname , lastname, ssn){
        this._firstname = firstname;
        this._lastname = lastname;
        this._ssn = ssn;
        this._address = null;
        this._birthYear = null;
    }

    get ssn(){
        return this._ssn;
    }

    get firstname(){
        return this._firstname;
    }

    get lastnamem(){
        return this._lastname;
    }

    get address(){
        return this._address;
    }

    get birthYear(){
        return this._birthYear;
    }

    set birthYear(year){
        this._birthYear = year;
    }

    set address(addr){
        this._address = addr;
    }

    peopleInSameCountry(friends){
        var result = [];
        for(let idx in friends){
            var friend = friends[idx];
            if(this.address.country === friend.address.country){
                result.push(friend);
            }
        }
        return result;
    }

    toString(){
        return `Person(${this._firstname}, ${this._lastname})`;
    }
}


class Student extends Person {
    constructor (firstname,lastname,ssn,school){
        super(firstname,lastname,ssn);
        this._school = school;
    }

    get school(){
        return this._school;
    }

    studentsInSameCountryAndSchool(friends){
        var closeFriends = super.peopleInSameCountry(friends);
        var result = [];
        for(let idx in closeFriends){
            var friend = closeFriends[idx];
            if(friend.school === this.school){
                result.push(friend);
            }
        }
        return result;
    }
}

var curry = new Student('Haskell','Curry','111-11-1111','Penn State');
curry.address = new Address