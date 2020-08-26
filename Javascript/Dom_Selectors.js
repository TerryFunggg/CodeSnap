// getElementById()
console.log(document.getElementById("task-title"));

// Get things from the element
console.log(document.getElementById("task-title").id);
console.log(document.getElementById("task-title").className);

// Change styling
document.getElementById("task-title").style.background = "#333";
document.getElementById("task-title").style.color = "#fff";
document.getElementById("task-title").style.padding = "5px";

// Change content
document.getElementById("task-title").textContent = "Task List";
document.getElementById("task-title").innerText = "My Tasks";
document.getElementById("task-title").innerHTML = "<p> Hi </p>";

// querySelector()

console.log(document.querySelector("#task-title")); // get by id
console.log(document.querySelector(".card-title")); // get by class
console.log(document.querySelector("h5")); // get by attr

//  just impact the first element which is selected.
document.querySelector("li").style.color = "red";
document.querySelector("ul li").style.color = "blue";
document.querySelector("li:last-child").style.color = "yellow";
document.querySelector("ul li:nth-child(3)").style.color = "orange";
document.querySelector("li:nth-child(odd)").style.background = "gray";

/**
 * ====================================
 *  DOM Selector fro multiple elements
 * ====================================
 */
const items = document.getElementsByClassName("collection-item");
console.log(items);

const listItems = document
  .querySelector("ul")
  .getElementsByClassName("collection-item");
console.log(listItems);

const tag = document.getElementsByTagName("li");
console.log(tag);

// Conver HTML Collection into array
let lis = [...tag];
lis.re;
lis.forEach(item => {
  item.textContent = "Hello";
});

// querySelectorAll
const list = document.querySelectorAll("ul.collection li.collection-item");
console.log(list);

const liOdd = document.querySelectorAll("li:nth-child(odd)");
const liEven = document.querySelectorAll("li:nth-child(even");

liOdd.forEach(item => {
  item.style.background = "#ccc";
});
