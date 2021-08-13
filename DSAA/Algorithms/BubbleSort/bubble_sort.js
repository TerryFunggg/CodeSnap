var array = [100,12,22,1,3,5]

for(let i = 0; i < array.length - 1; i++){
  let pointer = 0;
  for(let j = 1; j < array.length - i; j++){
    if(array[j] < array[pointer]){
      let value = array[pointer]
      array[pointer] = array[j]
      array[j] = value
    }
    pointer++;
  }
}

console.log(array)
