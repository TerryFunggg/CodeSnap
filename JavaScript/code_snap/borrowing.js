let obj = {
  0: 'Hello',
  1: 'World',
  length: 2
}

obj.join = Array.prototype.join;

console.log(obj.join(","));
