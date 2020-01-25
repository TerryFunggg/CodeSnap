// Error
enum PrinterError:Error {
    case outOfPaper
    case noToner
    case onFire
}

func send(job:Int, toPrinter printerName:String)
    throws -> String {
        if printerName == "Never Throw" {
            throw PrinterError.noToner
        }
        
        return "Job sent"
}

do {
    let printerResponse = try send(job: 400, toPrinter: "connect success")

    let printError = try send(job: 200, toPrinter: "Never Throw")

    // you can appoint specific error directly
}catch PrinterError.onFire{
    print("I'm on fire!")
    
    // or set a value as a error class type
}catch let e as PrinterError{
    print("Printer error: \(e)")
}catch {
    print(error)
}

// Errors with option

let printSuccess = try? send(job: 1884, toPrinter: "Never Throw")