#!/bin/bash
# 数组中可以存放多个值，Bash shell只支持一位数组，初始化时不需要定义数组大小，元素下标由0开始，数组用括号表示，元素用"空格"分割

# 定义数组 array_name=(value1 ... valuen)
arr=(A B "C" D)

# 或者
arr2[0]=A
arr2[1]=B
arr2[2]=C
arr2[3]=D

# 读取数组：格式 ${array_name[index]}
# output
# 第一个元素为: A
# 第一个元素为: A
# 第二个元素为: B
# 第三个元素为: C
# 第四个元素为: D
echo "第一个元素为: $arr"
echo "第一个元素为: ${arr[0]}"
echo "第二个元素为: ${arr[1]}"
echo "第三个元素为: ${arr[2]}"
echo "第四个元素为: ${arr[3]}"

# 获取数组中的所有元素：使用@或*
# output
# 数组的元素为: A B C D
# 数组的元素为: A B C D
echo "数组的元素为: ${arr[*]}"
echo "数组的元素为: ${arr[@]}"

# 获取数组的长度
# output
# 数组元素个数为: 4
# 数组元素个数为: 4
echo "数组元素个数为: ${#arr[*]}"
echo "数组元素个数为: ${#arr[@]}"

# 修改数组中某个索引位置的值
# output
# 第二个元素为: E
# 数组的元素为: A E C D
arr[1]=E
echo "第二个元素为: ${arr[1]}"
echo "数组的元素为: ${arr[*]}"

# 删除数组中的某个值
# output
# 第二个元素为: 
# 数组的元素为: A C D
# 数组元素个数为: 3
unset arr[1]
echo "第二个元素为: ${arr[1]}"
echo "数组的元素为: ${arr[*]}"
echo "数组元素个数为: ${#arr[*]}"

# 删除整个数组
# output
#
# 数组的元素为: 
# 数组元素个数为: 0
unset arr
echo ${arr[*]}
echo "数组的元素为: ${arr[*]}"
echo "数组元素个数为: ${#arr[*]}"
