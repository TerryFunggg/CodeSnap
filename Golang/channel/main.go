package main

import (
	"fmt"
	"time"
)

func story3() {
	c := make(chan string)

	go count2("Apple", c)

	// syntax sugar using range to keep tracking the channel
	for msg := range c {
		fmt.Println(msg)
	}

}

func story2() {
	c := make(chan string)

	// 1. we add "close()" function in the end of count2,
	// 	  it help us to close the channel
	go count2("Apple", c)

	for {
		// 2. There also have second value that tell us channel is open or not
		// we can use this value to break our loop
		msg, open := <-c
		if !open {
			break
		}
		fmt.Println(msg)
	}

	// plz see story3 that help you handle channel more pro

}

func story1() {
	c := make(chan string)

	go count("Apple", c)

	// That's easy right? Just continue loop to recive the message
	for {
		msg := <-c
		fmt.Println(msg)
	}

	// Run this function, 5...4...3...2...1...Error - deadlock!
	// cuz the count function finished, there're no message send by channel from count function
	// Let see story2 how to fix it
}

func main() {
	// channel is somthing that help goroutine communicate each other
	c := make(chan string)

	go count("Apple", c)

	// recive the message from channel
	msg := <-c
	fmt.Println(msg)

	// But we just can saw one message on screen,
	// cuz the main goroutine have no jobs to do then exit the program
	// go to story1 see how to fix
	//story1()
	//story2()
	//story3()

}

// continue looping
func count(msg string, c chan string) {
	for i := 1; i < 5; i++ {
		fmt.Println(i, msg)
		c <- msg
		time.Sleep(time.Millisecond * 500)
	}
}

func count2(msg string, c chan string) {
	for i := 1; i < 5; i++ {
		fmt.Println(i, msg)
		c <- msg
		time.Sleep(time.Millisecond * 500)
	}

	close(c)
}
