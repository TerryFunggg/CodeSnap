function dispalyInfo(args){
    let output = "";

    if(typeof args.name == "string"){
        output += "Name:" + args.name + "\n";
    }
    if(typeof args.age == "number"){
        output += "Age: " + args.age + "\n";
    }
    console.log(( output ));
}

dispalyInfo({
    name:"Terry",
    age:29
});

dispalyInfo({
    name:"Greg"
});

