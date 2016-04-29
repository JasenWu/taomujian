<?php
class db
{
    private $host;   
    private $name;
    private $pass;
    private $table;
    private $ut;
    function __construct($host,$name,$pass,$table,$ut){  
	    $this->host=$host;
     	$this->name=$name;
     	$this->pass=$pass;
     	$this->table=$table;
     	$this->ut=$ut;
     	$this->connect();
     }
     function connect(){
      $link=mysql_connect($this->host,$this->name,$this->pass) or die ($this->error());
      mysql_select_db($this->table,$link) or die("没该数据库：".$this->table);
      mysql_query("SET NAMES '$this->ut'");
     }
     
	 function content_replace($result){
		if($result){ return str_replace("../Uploadfiles/","Uploadfiles/",$result); }
	 }
	 //********************截取字符窜:1需要截取的字符，2长度，3编码
	 function chgtitle($title,$length,$encoding){
		if(mb_strlen($title,$encoding)>$length){
		   $title=mb_substr($title,0,$length,$encoding).'...';}
		   return $title;
	  }
     //================ 常用
     function num_rows($query){return @mysql_num_rows($query);}
     function query($sql){return @mysql_query($sql);}
     function num_fields($query){return @mysql_num_fields($query);}
     function free_result($query){return @mysql_free_result($query);}
     function insert_id(){return @mysql_insert_id();}
     function fetch_assoc($query){return @mysql_fetch_assoc($query);}
	 function fetch_array($query){return @mysql_fetch_array($query);}
     function fetch_fields($query){return @mysql_fetch_field($query);} 
     //=================
     function getAll($sql){   //取得所有符合的信息
        $res = $this->query($sql);
        if ($res !== false){
            $arr = array();
            while ($row = mysql_fetch_assoc($res)){$arr[] = $row;}
            return $arr;
        }else{return false;}
     }
	 function getOne($sql, $limited = false){   //取得第一条,第一个字段的信息
        if ($limited == true){$sql = trim($sql . ' LIMIT 1');}
        $res = $this->query($sql);
        if ($res !== false){
			$row = mysql_fetch_row($res);
            if ($row !== false){return $row[0];}else{ return '';}
        }else{return false;}
     }
   
     function inject_check($str){  //检测字符	   
		 $yz="select|insert|update|delete|'|union"; // 进行过滤
		 $yz=explode("|",$yz);
		 foreach($yz as $v){
			 $result=strpos(strtolower($str),$v);
			 if(!empty($result)||$result===0){echo "输入非法注入内容！,<a href='javascript:history.back();'>返回</a>";exit();}
		 }
		 return trim($str);
	  }
	  
	  function get_client_ip(){  //获取ip
         if(isset($_SERVER["HTTP_X_FORWARDED_FOR"])){ 
               $realip = $_SERVER["HTTP_X_FORWARDED_FOR"]; 
         }elseif(isset($_SERVER["HTTP_CLIENT_IP"])){ 
               $realip = $_SERVER["HTTP_CLIENT_IP"]; 
         }else{ 
               $realip = $_SERVER["REMOTE_ADDR"]; 
         } 
         return $realip; 
       } 

}
?>