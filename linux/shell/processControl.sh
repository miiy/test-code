#!/bin/bash

# if-then 语句
# 格式：
# if command
# then
#     commands
# fi
# if语句运行if后面的那个命令，如果该命令的退出状态码是0，执行then部分的命令，如果该命令的退出状态码是其他值，then部分的命令不被执行

# output
# /data/shell
# It worked
# ./processControl.sh: line 19: IamNotaCommand: command not found
if pwd
then
    echo "It worked"
fi

if IamNotaCommand
then
   echo "It worked"
fi

# if-then-else 语句
# 格式：
# if command
# then
#     commands
# else
#     commands
# fi

# output
# The user NoSuchUser does not exist
testuser=NoSuchUser
if grep $testuser /etc/passwd
then
    echo "The user $testuser exists"
else
    echo "The user $testuser does not exist"
fi

# 嵌套 if
# The user NoSuchUser does not exist on this system.
# ls: /home/NoSuchUser/: No such file or directory
testuser=NoSuchUser
if grep $testuser /etc/passwd
then
    echo "The user $testuser exists on this system."
else
    echo "The user $testuser does not exist on this system."
    if ls -d /home/$testuser/
    then
        echo "However, $testuser has a directory."
    fi
fi

# test命令
# test命令提供了在if-then语句中测试不同条件的途径。如果test命令中列出的条件成立，test命令就会退出并返回退出状态码0。如果条件不成立，test命令就会退出并返回非零的退出状态码。
# 格式
# test condition
#
# 当用在 if-then 语句中时
# if test condition
# then
#     commands
# fi

# 如果不写test命令的condition部分，它会以非零的退出状态码退出，并执行else语句块。
# output
# No expression returns a False
if test
then
   echo "No expression returns a True"
else
   echo "No expression returns a False"
fi

# output
# The Full expression returns a True
my_variable="Full"
if test $my_variable
then
   echo "The $my_variable expression returns a True"
else
   echo "The $my_variable expression returns a False"
fi

# output
# The  expression returns a False
my_variable=""
if test $my_variable
then
   echo "The $my_variable expression returns a True"
else
   echo "The $my_variable expression returns a False"
fi

# bash shell提供了另一种条件测试方法，无需在if-then语句中声明test命令。
# 格式：
# if [ condition ]
# then
#     commands
# fi
# 方括号定义了测试条件，两个方括号与条件之间必须有空格。
# test 命令可以判断三类条件：数值比较，字符串比较，文件比较


# 数值比较
# test命令的数值比较功能
# n1 -eq n2 检查n1是否与n2相等
# n1 -ge n2 检查n1是否大于或等于n2
# n1 -gt n2 检查n1是否大于n2
# n1 -le n2 检查n1是否小于或等于n2
# n1 -lt n2 检查n1是否小于n2
# n1 -ne n2 检查n1是否不等于n2


# 字符串比较
# str1 = str2  检查str1是否和str2相同
# str1 != str2 检查str1是否和str2不同
# str1 < str2  检查str1是否比str2小
# str1 > str2  检查str1是否比str2大
# -n str1      检查str1的长度是否非0
# -z str1      检查str1的长度是否为0


# 文件比较

# -d file         检查file是否存在并是一个目录
# -e file         检查file是否存在
# -f file         检查file是否存在并是一个文件
# -r file         检查file是否存在并可读
# -s file         检查file是否存在并非空
# -w file         检查file是否存在并可写 
# -x file         检查file是否存在并可执行
# -O file         检查file是否存在并属当前用户所有
# -G file         检查file是否存在并且默认组与当前用户相同
# file1 -nt file2 检查file1是否比file2新
# file1 -ot file2 检查file1是否比file2旧
