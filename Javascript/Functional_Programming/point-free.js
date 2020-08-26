const runProgram = R.pipe(
    R.map(R.toLower()),
    R.uniq,
    R.sortBy(R.identity)
);
runProgram(["Here", "THE", "Some","the","any","tiny","ANY"]);
// Result :  ["any", "here", "some", "the", "tiny"]

console.log(result);