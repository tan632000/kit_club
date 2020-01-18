
<?php
session_start();
?>


<?php


  
	
  require_once('config/database.php');
  require('app/models/user.php');
  Database::connect();
$url = isset($_GET['url'])? $_GET['url'] :NULL;
if($url!=NULL)
{
  $url = rtrim($url,'/');
  $url = explode("/", $url);
  $controller =isset($url[0]) ? $url[0] : 'home';
  $method=isset($url[1]) ? $url[1] : 'index';
  $param=isset($url[2]) ? $url[2] : null;

}
else
{
  unset($url);
}
if(isset($controller))
{
    if(file_exists('app/controllers/'.$controller.'.php'))
    {
      include_once('app/controllers/'.$controller.'.php');
      $className = ucfirst($controller).'Controller';
        $object= new $className;
      if(isset($param))
      {
        $object->$method($param);
      }
      else 
      {
        if(method_exists($className,$method))
        {
          $object->$method();
        }
        else
        {
          #code..
        }
      }
    }
}
else
{
  $method = 'index';
  include('app/controllers/home.php');
  $className = 'HomeController';
        $object= new $className;
      if(isset($param))
      {
        $object->$method($param);
      }
      else 
      {
        if(isset($method))
        {
          $object->$method();
        }
        else
        {
          #code..
        }
      }
}
  
?>
</body>
</html>