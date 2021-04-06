package main

import (
	"fmt"
	"sync"
	"time"
)

func solution1() {
	// crate a goroutine for "apple" make it synchronously
	// Keep in mind that the main function also is a goroutine
	// so if we run this solution1, thare're two goroutine in program
	go count("apple")
	count("orange")
}

func solution2() {
	// Well, you may think that "Why not just both using goroutine?"
	// In fact, we can but in this program, we had nothing to do after two count function
	// that mean, the main goroutine will noting to do, and that equals to finish the program.
	go count("apple")
	go count("orange")

	// This is the one solution to fix this problem, make main goroutine keep scan the keyboard until
	// user type the key. It makes above count goroutines alive.
	fmt.Scanln()
}

func solution3() {
	// The other solution is use a counter to help us to handle our goroutine state.
	var waitGroup sync.WaitGroup
	// just say how many goroutine you have
	waitGroup.Add(2)

	go func() {
		count("Apple")
		// it just count--
		waitGroup.Done()
	}()

	go func() {
		count("orange")
		waitGroup.Done()
	}()

	fmt.Println("Yoooooo~")
	// wait until count = 0
	waitGroup.Wait()
}

func main() {
	// synchronous program
	// It will wait the count("apple") function until it finish,
	// but the count function is infinity loop,
	// so it just keep printing "apple " on the screen
	count("apple")
	count("orange")

	// there're some migic solution here :)
	//solution1()
	//solution2()
	//solution3()

}

// continue looping
func count(msg string) {
	for i := 1; true; i++ {
		fmt.Println(i, msg)
		time.Sleep(time.Millisecond * 500)
	}
}
