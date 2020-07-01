package main

import "fmt"

func main() {
	const LENGTH int = 10
	const WIDTH int = 5
	const a, b, c = 1, false, "str"

	var area int
	area = LENGTH * WIDTH
	fmt.Printf("area is: %d", area)
	fmt.Println(a, b, c)
}