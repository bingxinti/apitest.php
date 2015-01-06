<?php
    // by wanyaxing@gmail.com
    // version: 150106.2
    date_default_timezone_set("Asia/shanghai");
    if( ($_SERVER['SERVER_ADDR'] != $_SERVER['REMOTE_ADDR']) &&
            (!array_key_exists('PHP_AUTH_USER', $_SERVER) || !array_key_exists('PHP_AUTH_PW', $_SERVER) || $_SERVER['PHP_AUTH_USER']!='12345679' || $_SERVER['PHP_AUTH_PW']!='12345679') ) {
        header('WWW-Authenticate: Basic realm=\'\'');
        header('HTTP/1.0 401');
        exit;
    }
    if (count($_GET)>0 || count($_POST)>0)
    {
      header('Content-Type:text/javascript; charset=utf-8');
      print(json_encode(array('$_GET'=>$_GET,'$_POST'=>$_POST,'getallheaders()'=>getallheaders(),'$_FILES'=>$_FILES,'$_SERVER'=>$_SERVER)));
      exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> API：测试工具 </title>
  <link href="http://7u2f1w.com1.z0.glb.clouddn.com/apitest/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="http://7u2f1w.com1.z0.glb.clouddn.com/apitest/pretty-json/css/pretty-json.css" rel="stylesheet">
  <link href="http://7u2f1w.com1.z0.glb.clouddn.com/apitest.css?v=150106.4" rel="stylesheet">
  <!-- <link href="apitest.css" rel="stylesheet"> -->
</head>
<body>
  <div id="main">
  <div id="div_switchgroup">
    <div class="btn-group navbar-btn" id="switch_examples">
    </div>
  </div>
  <div>
    <div  class="col-sm-4">
      <div id="div_apilist">
        <div id="list_api_btns" class="panel-group" >
        </div>
      </div>
    </div>
    <div id="div_form" class="container-fluid main-content col-sm-4">
      <form role="form" class="form-horizontal">
         <div>
            <a class="navbar-brand" href="javascript:;">API URL</a>
            <div class="btn-group navbar-btn pull-right" id="switch_method">
              <button type="button" class="btn btn-default">get</button>
              <button type="button" class="btn btn-default btn-primary">post</button>
            </div>
        </div>
         <div class="form-group">
           <div class="col-sm-12">
            <input type="email" class="form-control" id="link_api_url" placeholder="Enter the url" value="">
            </div>
          </div>
          <div id="div_headerfield">
            <div class="form-group">
              <a class="navbar-brand" href="javascript:;">Headers</a><button type="button" class="btn btn-default navbar-btn pull-right" id="btn_add_header">+</button>
            </div>
            <div>
              <div class="form-group" style="display:none;">
                  <div class="col-sm-4">
                    <input class="form-control" form-type="header" placeholder="header key" value="">
                  </div>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <input class="form-control"  placeholder="Enter the value" value="">
                      <div class="input-group-addon" style="display: none;">reload</div>
                    </div>
                  </div>
              </div>
            </div>

            <div class="form-group">
              <a class="navbar-brand" href="javascript:;">Payload</a><button type="button" class="btn btn-default navbar-btn pull-right" id="btn_add_field">+</button>
            </div>
            <div>
              <div class="form-group" style="display:none;">
                  <div class="col-sm-4">
                    <input class="form-control" form-type="field"   placeholder="field key" value="">
                  </div>
                  <div class="col-sm-8">
                    <input class="form-control"  placeholder="Enter the value" value="">
                  </div>
              </div>
            </div>
          </div>
          <div>
            <button type="button" class="btn btn-success pull-right" id="btn_test_url">test</button>
          </div>
      </form>
      </div>
      <div class="col-sm-4">
      <div id="div_frames" class="row">
          <ul class="nav nav-tabs">
            <li class="active"><a id="btn_userresume" href="#div_json_view" data-toggle="tab" is-user-page = true><i class="icon-left-indent"></i>view</a></li>
            <li><a href="#result_txt" data-toggle="tab"><i class="icon-edit"></i>text</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="div_json_view"></div>
            <div class="tab-pane" id="result_txt"><textarea id="textarea_results"></textarea></div>
          </div>
      </div>
      </div>
  </div>
  </div>
</body>
<script src="http://7u2f1w.com1.z0.glb.clouddn.com/apitest/bootstrap/js/jquery.min.js"></script>
<script src="http://7u2f1w.com1.z0.glb.clouddn.com/apitest/bootstrap/js/bootstrap.js"></script>
<script src="http://7u2f1w.com1.z0.glb.clouddn.com/apitest/md5.js"></script>
<script type="text/javascript" src="http://7u2f1w.com1.z0.glb.clouddn.com/apitest/pretty-json/libs/underscore-min.js" ></script>
<script type="text/javascript" src="http://7u2f1w.com1.z0.glb.clouddn.com/apitest/pretty-json/libs/backbone-min.js" ></script>
<script type="text/javascript" src="http://7u2f1w.com1.z0.glb.clouddn.com/apitest/pretty-json/libs/pretty-json-min.js" ></script>
<script type="text/javascript" src="http://7u2f1w.com1.z0.glb.clouddn.com/apitest.js?v=150106.10" ></script>
<!-- <script type="text/javascript" src="apitest.js" ></script> -->
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
</html>
