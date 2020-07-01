package main

import "fmt"

func main() {
	// 声明变量
	// var identifier type
	var str string = "Hello"
	fmt.Println(str)

	// 声明多个变量
	// var identifier1, identifier2 type
	var num1, num2 int = 1, 2
	fmt.Println(num1, num2)

	var str1 string
	str1 = "string"
	str2 := "string"

	fmt.Println(str1)
	fmt.Println(str2)
}

/*
$ go run variables.go 
Hello
1 2
*/