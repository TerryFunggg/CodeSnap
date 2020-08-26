


let result = text.trim().replace(/\-|\_/g , '');
if(result.length > 6 ){
    // do somthing
}
    

let text = " _Hello Wor-ld! ";

const trim = (text) => text.trim();
const normalize = (text) => text.replace(/\-|\_/g , '');

const validLength = (param, text) => text.length > param;
const checkNameLength = _.partial(validLength , 6);

const cleanInput = R.compose(normalize , trim);
console.log(cleanInput(text));

const isVaildName = R.compose(checkNameLength , cleanInput);
console.log(isVaildName(text));

