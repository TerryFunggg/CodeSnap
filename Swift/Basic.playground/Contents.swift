import UIKit

print("Hello World")



/**
 Simple Values
**/
var myVariable = 42
myVariable = 50
let myConstant = 42
// specify type
let explicitDouble: Double = 70

// String
let label = "The width is "
let width = 94
let widthLabel = label + String(width)
let apple = 3
let summary = "I have \(apple) apples."
//strings take up multiple lines
let quotation = """
I said "I have \(apple)"
And than I said "the wall width is \(apple + width)
    test indenttaion."
"""

/**
 * Array
**/
//let emptyArray = []
let emptyStrings = [String]()
var shoppingList = ["catfis" , "water" , "tulips"]
print(shoppingList[1])
shoppingList[1] = "bottle of water"
//Dictionary
var occupations = [
    "Malcolm" : "Captain",
    "Kaylee" : "Mechanic",
]
//add element in dictionary
occupations["Jayne"] = "Public Relation"
// or add element in array
shoppingList.append("blue paint")

/**
    Control Flow
**/
let individualScores = [75,43,103,87,12]
var teamScore = 0
for score in individualScores{
    if score > 50{
        teamScore += 3
    }else{
        teamScore += 1
    }
}
print(teamScore)

// if with optional
var optionalName:String? = "John Appleseed"
var greeting = "Hello!"
if let name = optionalName {
    greeting = "Hello, \(name)"
}
// Another way to handle optional values
let nickName : String? = nil
let fullName : String = "John Applessed"
let informanlGreeting = "Hi \(nickName ?? fullName)"
// switch
let vegetable = "red pepper"
switch vegetable {
case "celery":
    print("Add some raisins and make ants on a log.")
case "cucumber","watercress":
    print("That would make a good tea sandwich.")
case let x where x.hasSuffix("pepper"):
    print("Is it a spicy? \(x)?")
default:
    print("Everything tastes good in soup")
}


















