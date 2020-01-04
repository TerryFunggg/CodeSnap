// Fill Array
const users = Array(10).fill(5);
/* Result:
 [
   5, 5, 5, 5, 5,
   5, 5, 5, 5, 5
 ]
*/

// Unique Array
const words = [
    'aaa' ,
    'bbb',
    'ccc',
    'aaa',
    'ddd'
];

const unique = Array.from(new Set(words));
/* Result
[ 'aaa', 'bbb', 'ccc', 'ddd' ]
*/

// Dynamic Object
const fill = "email";

const user = {
    name : 'Terry',
    [fill]: 'terryyessfung@gmail.com'
};
/* Result
{ name: 'Terry', email: 'terryyessfung@gmail.com' }
*/

// Array/object to object/array
const names = ["Terry","Peter","Marry"];

const nameObj = {...names}
/* Result
{ '0': 'Terry', '1': 'Peter', '2': 'Marry' }
*/

const nameArray = Object.values(nameObj);
/* Result
 * [ 'Terry', 'Peter', 'Marry' ]
 */





