function counter(arr1, arr2) {
  if (arr1.length !== arr2.length) {
    return false;
  }
  let f1 = {};
  let f2 = {};
  for (let val of arr1) {
    f1[val] = (f1[val] || 0) + 1;
  }
  for (let val of arr2) {
    f2[val] = (f2[val] || 0) + 1;
  }
  for (let key in f1) {
    if (!(key ** 2 in f2)) return false;
    if (f2[key ** 2] !== f1[key]) return false;
  }
  return true;
}

console.log(counter([1, 2, 3], [4, 9, 1]));
