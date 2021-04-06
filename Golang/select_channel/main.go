package main

import (
	"fmt"
	"time"
)

func story2() {
	c1 := make(chan string)
	c2 := make(chan string)

	go func() {
		for {
			c1 <- "Every 500ms"
			time.Sleep(time.Millisecond * 500)
		}
	}()

	go func() {
		for {
			c2 <- "Every two seconds"
			time.Sleep(time.Second * 2)
		}
	}()

	for {
		//  very simple just use select like switch case
		//  select can help us decided to run which channel already
		//  that increase the process of different channel
		select {
		case m1 := <-c1:
			fmt.Println(m1)
		case m2 := <-c2:
			fmt.Println(m2)
		}
	}
}

func story1() {
	c1 := make(chan string)
	c2 := make(chan string)

	go func() {
		for {
			c1 <- "Every 500ms"
			time.Sleep(time.Millisecond * 500)
		}
	}()

	go func() {
		for {
			c2 <- "Every two seconds"
			time.Sleep(time.Second * 2)
		}
	}()

	for {
		// If you run this program, you will see the prgram not very effectively
		// cuz remember that receiver in main goroutine will wait until recive the message
		// the print method with c2 need to wait the print method c1 to recive the message
		// that not like goroutine right? Let see story2 how to fix it
		fmt.Println(<-c1)
		fmt.Println(<-c2)
	}
}

func main() {
	story1()
	//story2()

}
