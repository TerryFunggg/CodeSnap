// Protocols

protocol ExampleProtocol {
    var simpleDesc: String {get}
    mutating func adjust()
}

class SimpleClass : ExampleProtocol {
    var simpleDesc: String = "A very simple class"
    var anotherProperty: Int = 69105
    func adjust() {
        simpleDesc += " Now 100% adjusted."
    }
}

var a = SimpleClass()
a.adjust()
let aDesc = a.simpleDesc

// Extension
extension Int : ExampleProtocol {
    var simpleDesc: String {
        return "The number \(self)"
    }
    mutating func adjust() {
        self += 42
    }
}

