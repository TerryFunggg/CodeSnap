package main

import (
	"fmt"
)

func main() {
	defer func() {
		if r := recover(); r != nil {
			fmt.Println("Recovered in main")
		}
	}()

	loop(0)
}

func loop(num int) {
	if num > 3 {
		fmt.Println("Panicking")
		// There should print the error at the end,
		// but we define a recover in main
		panic("Panic in loop() Eroooooor")
	}

	defer fmt.Println("Defer in loop: ")

	loop(num + 1)
}
