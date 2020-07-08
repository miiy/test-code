


1. 垃圾回收
a. 内存⾃动回收，再也不需要开发⼈员管理内存
b. 开发人员专注业务实现，降低了心智负担
c. 只需要new分配内存，不需要释放
 
2. 天然并发
a. 从语⾔层面⽀持并发，⾮常简单。只需要go一下
b. goroutine，轻量级线程，创建成千上万个goroute成为可能
 
3. channel
a. 管道，类似unix/linux中的pipe
b. 多个goroute之间通过channel进行通信
c. ⽀支持任何类型
 

4. 多返回值

a. ⼀个函数返回多个值
 
5. 编译型语言

a. 性能只比C语言差10%
b. 开发效率和python、php差不多

未使用

调试工具 delve

gofmt -w

go build -o