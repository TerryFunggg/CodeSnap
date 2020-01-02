// OLD

function getData(data , callback){
    setTimeout(function(){
        console.log('read data from database');
        callback({data:data});
    },2000);
}

getData(5 , function(data){
    console.log(data);
});

// ES6

const p = new Promise((reslove , reject)=>{
    setTimeout(()=>{
        reslove({user:"Terry" , age:12});
        //reject(new Error("Error!"));
    },2000);
})

p.then((data)=>{
    return data.user;
})
    .then(data=>console.log(data))
    .catch(err => console.log(err));
