#!/bin/bash

# 创建函数：两种格式
function func1 {
    echo "func1"
}

func2() {
    echo "func2"
}

# 使用函数：在行中指定函数名就可以了
# output
# func1
# func2
func1
func2


# 在函数被定义前使用函数
# output
# ./function.sh: line 15: func3: command not found
func3
func3() {
    echo "func3"
}

# 重新定义函数
# output
# func4
# repeat func4
func4() {
    echo "func4"
}

func4

func4() {
    echo "repeat func4"
}

func4

# 返回值
# shell会把函数当做一个小型的脚本，运行结束会返回一个退出状态码。有3种不同的方法来为来为函数生成退出状态码
# 默认情况下，函数的退出状态码是函数总最后一条命令返回的退出状态码。在函数执行结束后，可以用标准变量$?来确定函数的退出状态码。
# 退出状态码必须是0~255，超过255则从0开始计算
# output
# ls: badfile: No such file or directory
# The exit status is: 1
# ls: badfile: No such file or directory
# This was a test of a bad command
# The exit status is: 0

func5()
{
    ls -l badfile
}

func5
echo "The exit status is: $?"

func6()
{
    ls -l badfile
    echo "This was a test of a bad command"
}

func6
echo "The exit status is: $?"

# 使用 return 命令
# output
# The exit status is: 255
# The exit status is: 2

func7()
{
    return 255
}

func7
echo "The exit status is: $?"

func8()
{
    return 258
}

func8
echo "The exit status is: $?"

# 使用函数输出
# output
# The result is: 257
func9() {
    echo 257
}

result=$(func9)

echo "The result is: $result"

# 向函数传递参数
# bash shell会将函数当作小型脚本来对待，可以像普通脚本那样向函数传递参数
# output
# $0 is: ./function.sh
# $1 is: 1
# $2 is: 2
# $3 is: 3
# $4 is: 4
# $5 is: 5
# $6 is: 6
# $7 is: 7
# $8 is: 8
# $9 is: 9
# $10 is: 10
# ${10} is: 100
# ${11} is: 110
# $# is: 11
func10() {
    echo "\$0 is: $0"
    echo "\$1 is: $1"
    echo "\$2 is: $2"
    echo "\$3 is: $3"
    echo "\$4 is: $4"
    echo "\$5 is: $5"
    echo "\$6 is: $6"
    echo "\$7 is: $7"
    echo "\$8 is: $8"
    echo "\$9 is: $9"
    echo "\$10 is: $10"
    echo "\${10} is: ${10}"
    echo "\${11} is: ${11}"
    echo "\$# is: $#"
}

func10 1 2 3 4 5 6 7 8 9 100 110

# 全局变量

func11 () {
    value=$[ $value * 2 ]
}

value=1
echo "value is: $value"
func11
echo "value is: $value"

# 局部变量

func12() {
    local temp=$[ $value + 5 ]
    result=$[ $temp * 2 ]
}

temp=4
value=6
func12
echo "The result is $result"
echo "The temp is:$temp"
echo "The value is:$value"

# 向函数传递数组
# 函数只会取数组变量的第1个值
# output
# The original array is: 1 2 3 4 5
# The parameters are: 1
# The received array is 1
func13() {
    echo "The parameters are: $@"
    thisarray=$1
    echo "The received array is ${thisarray[*]}"
}

myarray=(1 2 3 4 5)
echo "The original array is: ${myarray[*]}"
func13 $myarray

# The original array is: 1 2 3 4 5
# The result is 15
function addarray {
    local sum=0
    local newarray
    newarray=($(echo "$@"))
    for value in ${newarray[*]}
    do
        sum=$[ $sum + $value ]
    done
    echo $sum
}

myarray=(1 2 3 4 5)
echo "The original array is: ${myarray[*]}"
arg1=$(echo ${myarray[*]})
result=$(addarray $arg1)
echo "The result is $result"

# 从函数返回数组
# output
# The original array is: 1 2 3 4 5
# The new array is: 2 4 6 8 10

function arraydblr {
    local origarray
    local newarray
    local elements
    local i
    origarray=($(echo "$@"))
    newarray=($(echo "$@"))
    elements=$[ $# - 1 ]
    for (( i = 0; i <= $elements; i++ ))
    {
        newarray[$i]=$[ ${origarray[$i]} * 2 ]
    }
    echo ${newarray[*]}
}
myarray=(1 2 3 4 5)
echo "The original array is: ${myarray[*]}"
arg1=$(echo ${myarray[*]})
result=($(arraydblr $arg1))
echo "The new array is: ${result[*]}"

# 函数递归
#

# 文件包含
# source命令会在当前shell上下文中执行命令，而不是 创建一个新shell。可以用source命令来在shell脚本中运行库文件脚本。这样脚本就可以使用库 中的函数了。
# source命令有个快捷的别名，称作点操作符(dot operator)
# . filename 或者 source filename
# output
#./function.sh: line 233: myfunc: command not found
# myfunc
./myfuncs

myfunc

. ./myfuncs

myfunc
