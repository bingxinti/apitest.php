apitest.php
===========

The simple api tool for test.

这是一个简单却非常实用的api接口测试调试工具，让开发者远离枯燥的API文档，直观而方便的进行接口调试。

使用方法：

拷贝apitest.php到API同域名目录下，在浏览器中访问即可。

API配置方案：

	*参考下面的配置代码，你可以指定API接口的Headers 和  Payload 规范。

	*type类型里，支持md5、file类型哦

=======
The example of api doc in below:
```html
<script type="text/javascript">
var headerList =[
  {
    "key":'apiVersion'
    ,"type":'string'
    ,"title":'版本号'
    ,"desc":''
    ,"required":true
    ,"test-value":"1.2"
    ,"click":null
  }
  ,{
    "key":'userID'
    ,"type":'int'
    ,"title":'userID'
    ,"desc":''
    ,"required":true
    ,"test-value":"43756"
    ,"click":null
  }
  ,{
    "key":'time'
    ,"type":'string'
    ,"title":'time'
    ,"desc":''
    ,"required":true
    ,"test-value":""
    ,"click":function(){
      $(this).siblings("input").val((new Date()).getTime());
    }
  }
];
var apiList = [
      {
        "title":'example:test'
        ,"desc":''
        ,"action":'apitest.php'
        ,"method":"post"
        ,"request":[
          {
            "key":'name'
            ,"type":'string'
            ,"title":'name'
            ,"desc":''
            ,"required":true
            ,"test-value":"wanyaxing"
          }
          ,{
            "key":'password'
            ,"type":'md5'
            ,"title":'password'
            ,"desc":''
            ,"required":true
            ,"test-value":"123456"
          }
          ,{
            "key":'avatar'
            ,"type":'file'
            ,"title":'avatar'
            ,"desc":''
            ,"required":true
            ,"test-value":""
          }
          ,{
            "key":'age'
            ,"type":'int'
            ,"title":'age'
            ,"desc":''
            ,"required":true
            ,"test-value":"29"
          }
          ,{
            "key":'content'
            ,"type":'string'
            ,"title":'content'
            ,"desc":''
            ,"required":true
            ,"test-value":"see more detail , https://github.com/wanyaxing/apitest.php"
          }
        ]
      }
    ];

</script>


```

#apitest.php适合有一定基础的开发者

*本工具只以提高开发效率为目标，

（QQ:340014824  mail:wanyaxing@gmail.com）

