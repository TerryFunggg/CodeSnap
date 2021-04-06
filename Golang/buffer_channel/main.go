package main

import (
	"fmt"
)

func main() {
	// given a capacity, when we create a channel
	// that is help us save the channel when channel waiting recevier
	// and other code can going on, otherwise will deadlock
	c := make(chan string, 2)

	// cuz the code will wait until someone revice this message
	c <- "Apple"
	c <- "Orange"

	msg := <-c
	fmt.Println(msg)

	msg = <-c
	fmt.Println(msg)

}
