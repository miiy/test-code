使用PHP来简单的创建一个RPC服务

RPC全称为Remote Procedure Call，翻译过来为"远程过程调用"。主要应用于不同的系统之间的远程通信和相互调用。

比如有两个系统，一个是PHP写的，一个是JAVA写的，而PHP想要调用JAVA中的某个类的某个方法，这时候就需要用到RPC了。

怎么调？直接调是不可能，只能是PHP通过某种自定义协议请求JAVA的服务，JAVA解析该协议，在本地实例化类并调用方法，然后把结果返回给PHP。

 

这里我们用PHP的socket扩展来创建一个服务端和客户端，演示调用过程。

上面我们自定义的协议，可以随意修改，只要是客户端和服务端两边能够统一并能解析。

客户端通过请求服务端，把要调用的类，方法和参数传递给服务端，服务端去通过实例化调用方法返回结果。


结果如下：

```bash
$ php RpcServer.php 

```

```bash
$ php RpcClient.php 
hehe
[{"name":"Test","age":27}]
```





对原文中代码的修改：

```php
// $realPath = realpath(__DIR__ . $path);
$realPath = realpath($path);

// $classRet = preg_match('/Rpc-Class:\s(.*);\r\n/i', $buf, $class);
// $methodRet = preg_match('/Rpc-Method:\s(.*);\r\n/i', $buf, $method);
// $paramsRet = preg_match('/Rpc-Params:\s(.*);\r\n/i', $buf, $params);

$classRet = preg_match('/Rpc-Class:\s(.*);/i', $buf, $class);
$methodRet = preg_match('/Rpc-Method:\s(.*);/i', $buf, $method);
$paramsRet = preg_match('/Rpc-Params:\s(.*);/i', $buf, $params);


// $data = $obj->$method[1](json_decode($params[1], true));
$data = $obj->{$method[1]}(json_decode($params[1], true));
```

原文：[使用PHP来简单的创建一个RPC服务](https://www.cnblogs.com/jkko123/p/6574808.html)