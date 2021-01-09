package main

import (
	"bufio"
	"log"
	"net"
	"strings"
	"fmt"
)

func main() {
	listener, err := net.Listen("tcp",":8080")
	if err != nil {
		log.Fatalln(err.Error())
	}
	defer listener.Close()

	for {
		scanner,err := listener.Accept()
		if err != nil {
			log.Println(err.Error())
			continue
		}
		go handle(scanner)
	}
}

func handle(conn net.Conn){
	defer conn.Close()

	request(conn)
}

func request(conn net.Conn){
	i := 0
	scanner := bufio.NewScanner(conn)
	for scanner.Scan() {
		newLine := scanner.Text()
		fmt.Println(newLine)
		if i == 0{
			method := strings.Fields(newLine)[0] // Get Method
			url := strings.Fields(newLine)[1] // Get url
			mux(conn,method, url)
		}
		if newLine == ""{
			break
		}
		i++
	}
}

func mux(conn net.Conn, method string, url string){
	if method == "GET" && url == "/" {
		respond(conn, "Hello World")
	}

	if method == "GET" && url == "/about" {
		respond(conn, "Just a sample for mux using net package")
	}

	if method == "GET" && url == "/login" {
		respond(conn, "Login here!")
	}

	if method == "POST" && url == "/register" {
		respond(conn, "Login here!")
	}
}

func respond(conn net.Conn, msg string) {

	body := `<!DOCTYPE html><html lang="en">
<head><meta charset="UTF-8">
	<title></title>
</head>
<body>
	<p><strong>`+msg+`</strong></p> <br>
<a href="/">Home</a><br>
<a href="/about">About</a><br>
<a href="/login">login</a><br>
<a href="/reguster">register</a><br>
</body>
</html>`

	fmt.Fprint(conn, "HTTP/1.1 200 OK\r\n")
	fmt.Fprintf(conn, "Content-Length: %d\r\n", len(body))
	fmt.Fprint(conn, "Content-Type: text/html\r\n")
	fmt.Fprint(conn, "\r\n")
	fmt.Fprint(conn, body)
}
