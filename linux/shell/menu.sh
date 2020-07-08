#!/bin/bash

# 默认情况下，echo命令只显示可打印文本字符。在创建菜单项时，非可打印字符通常也很有用，比如制表符和换行符。要在echo命令中包含这些字符，必须用-e选项。
# 最后一行的-en选项会去掉末尾的换行符。这让菜单看上去更专业一些，光标会一直在行尾 等待用户的输入。
function menu {
    clear
    echo
    echo -e "\t\t\tSys Admin Menu\n"
    echo -e "\t1. Display disk space"
    echo -e "\t2. Display logged on users"
    echo -e "\t3. Display memory usage"
    echo -e "\t0. Exit program\n\n"
    echo -en "\t\tEnter option: "
    read -n 1 option
}

menu

case $option in
0)
    break;;
1)
    diskspace ;;
2)
    whoseon ;;
3)
    memusage ;;
*)
    clear
    echo "Sorry, wrong selection";;
esac