import UIKit

// function
func greet(person:String, day:String) -> String{
    return "Hello \(person), today is \(day)"
}

greet(person: "Terry", day: "Monday")


// function with multiple values return
func calculateAllInteger(scores:[Int]) -> (min: Int, max: Int , sum: Int){
    
    var min = scores[0]
    var max = scores[0]
    var sum = 0
    
    for score in scores {
        if score > max {
            max = score
        }else if score < min {
            min = score
        }
        
        sum += score
    }
    
    return (min,max,sum)
}

let statistics = calculateAllInteger(scores: [1,10,2,5,15,40])

print(statistics.sum);

// Nested Function
func returnFifteen() -> Int{
    var y = 10
    func add(){
        y += 5
    }
    
    add()
    return y
}

returnFifteen()

// Nested Function with return
//Not recommended, just fun :)
func makeIncrementer() -> ([(Int)->Int]){
    func addOne(number:Int) -> Int{
        return 1 + number
    }
    func addTwo(number:Int) -> Int{
        return 2 + number
    }
    
    return [addOne , addTwo];
}

var increment = makeIncrementer()

var add = increment[1]
add(1)

// call back
func hasAnyMatches(list:[Int], condition:(Int) -> Bool) -> Bool {
    for item in list {
        if condition(item){
            return true
        }
    }
    return false
}

func lessThanTen(number:Int) -> Bool {
    return number < 10
}

var numbers = [22,23,5,2,45]
hasAnyMatches(list: numbers, condition: lessThanTen)

// map
numbers.map({ (number:Int) -> Int in
    let result = 10 * number
    return result
})
// OR
var newNumbers = numbers.map({number in 10 * number})
print(newNumbers)
// Experiment
numbers.map({ (number:Int) -> Int in
    let result = number % 2
    return (result == 0 ? number:0)
})
// OR
newNumbers = numbers.map({number in (number % 2 == 0 ? number : 0)})
print(newNumbers)



