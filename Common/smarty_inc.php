<?php
include("Common/conn.php");                                          //引入数据库实例文件
include_once("Smarty/Smarty.class.php");                             //包含smarty类文件
$smarty = new Smarty();                                              //建立smarty实例对象$smarty
//$smarty->config_dir="Smarty/Config_File.class.php";                // 目录变量
$smarty->caching=false;                                              //是否使用缓存，项目在调试期间，不建议启用缓存
$smarty->use_sub_dirs = true ;                                       //自动分级目录保存缓存
$smarty->template_dir = FILE_PATH."/templates";                      //设置模板目录
$smarty->compile_dir = FILE_PATH."/templates_c";                     //设置编译目录
$smarty->cache_dir = FILE_PATH."/cache";                             //缓存文件夹
$smarty->cache_lifetime =-1;                                         //缓存时间设置
$smarty->left_delimiter = "{#";                                      //左边界符
$smarty->right_delimiter = "#}";                                     //右边界符


//******************************************************************
//公模块调用

/*services_list(2,"about_list","and id not in(44,45)"); //关于我们类别
services_list(5,"adv_list","and id not in(21)");      //产品优势类别
services_list(6,"bus_list","and id not in(42)");      //产品优势类别
services_list(7,"sev_list","and id not in(23)");      //产品优势类别
services_list(8,"con_list","and id not in(17)");      //联系我们类别
news_menu(6);  //新闻类别

about_countent(35,"","foots");//底部信息
contents(40);
home_links();*/
services_list(1,"about_list"); //关于我们类别
services_list(4,"netword_list"); //营销网络
services_list(5,"s_list"," and id<>13 "); //营销网络
services_list(4,"sc_list"); //生产工厂类别
services_list(6,"c_list"); //联系我们类别
services_list(3,"rd_list"); //关于我们类别
news_menu(1);  //新闻类别
product_lists(); //产品类别
keywords(25);   //首页关键字
about_countent(26,"","foots");//底部信息

function contents($types){
	$sql="select * from jp_article where m_id=$types";
	$result=$GLOBALS["db"]->getAll($sql);
	$GLOBALS["smarty"]->assign("contents",$result);
}

function product_lists($types=1){ //下来显示信息的类别
  $sql="select sortname,id,contentsi from jp_category where parentid=$types  order by px asc,id asc  " ;
  $result=$GLOBALS["db"]->getAll($sql);
  $GLOBALS["smarty"]->assign("product_lists",$result);
}

function show_banner($sid,$types=0){
	$sql="select type1 from jp_news where sortid=".$sid." and type2 like '%$types%' limit 1 " ;
	$result=$GLOBALS["db"]->getOne($sql);
    $isswf=is_numeric(strpos($result,".swf"))?1:"";
    $GLOBALS["smarty"]->assign("banner_pic",$result);
	$GLOBALS["smarty"]->assign("isswf",$isswf);
}

//设置cookie及时生效
function cookie($var, $value='', $time=0, $path='/', $domain=''){ 
	$_COOKIE[$var] = $value; 
	if(is_array($value)){ 
		foreach($value as $k=>$v){ 
			setcookie($var.'['.$k.']', $v, $time, $path, $domain); 
		} 
	}else{ 
		setcookie($var, $value, $time, $path, $domain); 
	} 
} 


function nei_banner($type=22)
{
	$sql="select type1,author,news_name from jp_news where type2 like '%0,%' and sortid='".$type."'  order by views asc ,id desc ";
	$results=$GLOBALS["db"]->getAll($sql);
	$GLOBALS["smarty"]->assign("nei_banner",$results);
}

$smarty->assign("server_name",SERVER_NAME);  //域名路径


function keywords($id){
   $sql="select * from jp_article where m_id='".$id."' ";
   $keywords=$GLOBALS["db"]->getAll($sql);
   $GLOBALS["smarty"]->assign("keywords",$keywords);	
}


function tj_news()
{
	$sql="select news_name,id from jp_news where viewflag=1 and sortpath like '%0,1,2,%' order by add_time desc,id desc";
	$results=$GLOBALS["db"]->getAll($sql);
	$GLOBALS["smarty"]->assign("tj_news",$results);
}

function services_list($id,$ass="services_list",$dataother="")
{
    $sql="select sortname,id from jp_menu_sort where parentid='".$id."' ". $dataother ." order by px asc ,id desc ";
    $services_list=$GLOBALS["db"]->getAll($sql);
	$GLOBALS["smarty"]->assign($ass,$services_list);
}

function news_menu($id=2,$ass="news_menu") //新闻类别
{
	 $sql="select sortname,id  from jp_category where parentid='".$id."' order by px asc,id asc  ";
	 $result=$GLOBALS["db"]->getAll($sql);
	 $GLOBALS["smarty"]->assign($ass,$result) ;       //分页信息
}





//首页新闻推荐
function home_img($num){
   $sql="select news_name,id,type1 from jp_news where sortpath like '%0,2,%' and  viewflag=1 and type1<>'' order by add_time desc,id desc";
   $result=$GLOBALS["db"]->query($sql);
   $i=1;
   while($rs=$GLOBALS["db"]->fetch_assoc($result)){
	   extract($rs);
	   
	   $news_name=$GLOBALS["db"]->chgtitle($news_name,$num,"utf8");
	   
	   $i==1?$title=$news_name:$title.="|".$news_name;
	   $i==1?$url="/home/News/show.php?id=".$id:$url.="|/home/News/show.php?id=".$id;
	   $i==1?$pic="http://".$_SERVER['HTTP_HOST'].$type1:$pic.="|http://".$_SERVER['HTTP_HOST'].$type1;   
	   $i++;
   } 
   $GLOBALS["smarty"]->assign("title",$title);
   $GLOBALS["smarty"]->assign("url",$url);
   $GLOBALS["smarty"]->assign("pic",$pic);
}

//推荐信息
function info_tj($s_names,$filds,$database,$datawhere,$dataorder,$limits=7){
  $sql="select $filds from $database where 1=1 $datawhere order by $dataorder  limit $limits ";
  $result=$GLOBALS["db"]->getAll($sql);
  $GLOBALS["smarty"]->assign($s_names,$result) ;       //分页信息
}

//banner图片
function banner_pic($id){
  $sql="select type1 from jp_news where sortid=".$id." and type2 like '%0%' limit 1 ";
  $result=$GLOBALS["db"]->getAll($sql) ;
  $GLOBALS["smarty"]->assign("pic",$result) ;       //banner图片	
}

//新闻信息
function  news_show($id,$data_base="jp_category"){
	$sql="select id,sortname from ".$data_base." where parentid=".$id." order by px asc " ;
	$result=$GLOBALS["db"]->getAll($sql);
	$i=0;
	foreach($result as $value){
		 $lists[$i]["info_id"]=$value["id"];
		 $lists[$i]["info_name"]=$value["sortname"];
		 $result_small=$GLOBALS["db"]->getAll("select news_name,id,add_time from jp_news where sortid=".$value["id"]." order by add_time desc,id desc limit 5 ");
		 $j=0;
		 if($result_small){
			 foreach($result_small as $va){
				$lists[$i]["posts"][$j]["news_id"]=$va["id"];
				$lists[$i]["posts"][$j]["news_name"]=$va["news_name"];
				$lists[$i]["posts"][$j]["news_time"]=$va["add_time"];
				$j++;
			 }
		 }else{
			 $lists[$i]["posts"]="";
		 }
		 $i++;
	}
	$GLOBALS["smarty"]->assign("news_show",$lists);
}
//类别信息
function sort_list($id,$data_base="jp_menu_sort",$ass="about_menu"){
   $ass=="services"?$datewhere=" and id<>20":$datewhere="";
   $ass=="join"?$datewhere=" and id not in(26,27,40)":$datewhere="";
   $sql="select id,sortname_en as sortname from ".$data_base." where parentid=".$id."  ".$datewhere." order by px asc " ;
   $result=$GLOBALS["db"]->getAll($sql);
   $GLOBALS["smarty"]->assign($ass,$result) ;
}

function sort_list_news($id,$data_base="jp_menu_sort",$ass="about_menu"){
   $ass=="services"?$datewhere=" and id<>20":$datewhere="";
   $ass=="join"?$datewhere=" and id not in(26,27,40)":$datewhere="";
   $sql="select id,sortname from ".$data_base." where parentid=".$id."  ".$datewhere." order by px asc " ;
   $result=$GLOBALS["db"]->getAll($sql);
   $GLOBALS["smarty"]->assign($ass,$result) ;
}



function sort_list_en($id,$data_base="jp_menu_sort",$ass="about_menu"){
   $ass=="services"?$datewhere=" and id<>20":$datewhere="";
   $ass=="join"?$datewhere=" and a.id not in(26,27,40)":$datewhere="";
   $sql="select a.id,b.sortname from ".$data_base." as a ,jp_article as b where parentid=".$id."  ".$datewhere." and a.id=b.m_id order by px asc " ;
   $result=$GLOBALS["db"]->getAll($sql);
   $GLOBALS["smarty"]->assign($ass,$result) ;
}

//单一信息类别名称
function sort_name($id,$fileds="sortname"){
  if(is_numeric($id)){
	 $sort_names=$GLOBALS["db"]->getOne("select ".$fileds." from jp_category where id=".$id);
	 return $sort_names;  
  }	
}
//多信息类别名称
function sort_name_more($id,$files="sortname,sortname_en",$find_id="id"){
  if(is_numeric($id)){
	 $sort_names=$GLOBALS["db"]->getAll("select ".$files." from jp_category where ".$find_id."=".$id);
	 return $sort_names;  
  }	
}



//信息列表(带分页)
function information_list($url,$pageSize,$field,$data_where="",$order="add_time desc,id desc",$date_base="jp_news",$assign_name="info_reslut"){
	  $sql="select id from `".$date_base."` where 1=1 ".$data_where ;
	  $result=$GLOBALS["db"]->query($sql) ;
	  @$num=$GLOBALS["db"]->num_rows($result);
	  if($num>0){
		 $pageSize=$pageSize;
		 $lastpg=ceil($num/$pageSize);
		 @$page=$_GET["page"]; 
		 if((!$page)|| $page<1) $page=1;
		 if((!$page)|| $page>$lastpg) $page=$lastpg;
		 $firstcount = ($page -1) * $pageSize;
		 $sql="select $field from `".$date_base."` where 1=1 ".$data_where."  order by ".$order." limit $firstcount,$pageSize  " ;
		 $info_reslut=$GLOBALS["db"]->getAll($sql);
		 if($url=="normal"){
		    $pagenav=$GLOBALS["db"]->pageft($page,$num,$pageSize,1,1,0,7) ;  //调用分页类
		 }else{
		    $pagenav=$GLOBALS["db"]->pageft_html($page,$num,$pageSize,1,1,0,7,$url) ;  //调用分页类
		 }
	  }else{
		 $pagenav="";$info_reslut="";
	   }
	  $GLOBALS["smarty"]->assign("showpage",$pagenav) ;       //分页信息
	  $GLOBALS["smarty"]->assign($assign_name,$info_reslut) ;  //信息列表
}

//信息详细页
function information_details($field,$data_base,$id,$views="",$names=""){
   $sql="select ".$field." from `".$data_base."`  where ID=".$id;
   $info_details=$GLOBALS["db"]->getAll($sql);
   if($views=="views"){$GLOBALS["db"]->query("update ".$data_base." set $views=$views+1 where id=".$id);}
   $s_name=sort_name($info_details[0]["sortid"]); //获得当前类别的名称
   $GLOBALS["smarty"]->assign("abso_nid",$info_details[0]["sortid"]); 
   $GLOBALS["smarty"]->assign("abso_nsid",$info_details[0]["sortid"]); 
   $GLOBALS["smarty"]->assign("abso_pid",$info_details[0]["sortid"]);
   $GLOBALS["smarty"]->assign("abso_tid",$info_details[0]["sortid"]); 
   $GLOBALS["smarty"]->assign("abso_supportid",$info_details[0]["sortid"]);
   $GLOBALS["smarty"]->assign("sort_name",$s_name);
   $GLOBALS["smarty"]->assign("info_details",$info_details) ;       //分页信息
   if($names=="show"){
	   $names_show=sort_name_more($info_details[0]["sortid"]);
	   $GLOBALS["smarty"]->assign("names_show",$names_show) ;
   }
}

//******************************************
//查询相信页信息
//smarty实例,db实例,查询的字段,数据库,信息ID
//******************************************
function get_pre_next_info($field,$data_base,$id,$order="add_time desc,id desc",$datewhere="")
{
  $SortID=$GLOBALS["db"]->getOne("select sortid from `".$data_base."` where id=".$id); //获取该类别的ID 
  $id1=""; $NewsNameSi="";$pre_id="";$pre_name="";$nex_id="";$nex_name="";
  if($SortID){
	    $sql1="select ".$field." from  `".$data_base."` where sortid=$SortID ".$datewhere." order by ".$order ;  //查找该类别的所有新闻的id
		$rs1=$GLOBALS["db"]->query($sql1);
		$num=$GLOBALS["db"]->num_rows($rs1);
		if($num>0){
		    while($result=$GLOBALS["db"]->fetch_array($rs1)){$id1.=$result[0]."," ;$NewsNameSi.=$result[1]."|" ;}
			$id2=explode(",",$id1)  ;//把所有该类别的id拆分成数组
			$NewsNameSi2=explode("|",$NewsNameSi)  ;//把所有该类别的名称拆分成数组
			for($i=0;$i<=$num-1;$i++){ if ($id2[$i]==$id) $page=$i ;  } //判断当前传递过来的id与数组中的位置做比较
			if($page>0){$pre_id=$id2[$page-1];$pre_name=$NewsNameSi2[$page-1];}  //获得上一页的id号
			if($page<$num-1){$nex_id=$id2[$page+1]; ;$nex_name=$NewsNameSi2[$page+1];}//获得下一页的id号
			$pre_info[]=$pre_id;$pre_info[]=$pre_name;
            $nex_info[]=$nex_id;$nex_info[]=$nex_name;}
			$GLOBALS["smarty"]->assign("pre_info",$pre_info);  //上一页
            $GLOBALS["smarty"]->assign("nex_info",$nex_info);  //下一页
   }
} 

function case_countent($id){
	if(is_numeric($id)){
	  $result=$GLOBALS["db"]->getOne("select news_content from jp_news where id=".$id);
	  if(!empty($result)){$result=str_replace("../Uploadfiles/","/Uploadfiles/",$result);}
	  $navi=$GLOBALS["db"]->getOne("select news_name from jp_news where id=".$id);
	  $GLOBALS["smarty"]->assign("case_content",$result);
	  $GLOBALS["smarty"]->assign("navi",$navi);
	}
}

//公司简介内容
function about_countent($id,$cut_word="",$ass="about_content",$navis="navi"){
	if(is_numeric($id)){
	  $result=$GLOBALS["db"]->getOne("select  content from jp_article where m_id=".$id);
	  if(!empty($result)){$result=str_replace("../Uploadfiles/",SERVER_NAME."/jp/Uploadfiles/",$result);}
	  if(!empty($cut_word)){
		  if($result){
		    $results=str_replace("&nbsp;","",str_replace(" ","",strip_tags($result)));
			$result=$GLOBALS["db"]->chgtitle($results,$cut_word,"utf8");
		  }
      }
	  $navi=$GLOBALS["db"]->getAll("select a.sortname,a.keyword,a.description,a.content ,b.sortname as  sortname_en from jp_article as a,jp_menu_sort as b where a.m_id=b.id and a.m_id=".$id);
	  
	  //print_r($navi);
	  //exit();
	  $GLOBALS["smarty"]->assign($ass,$result);
	  $GLOBALS["smarty"]->assign($navis,$navi);
	}
}

//产品类别信息
function product_list_info(){
	$sql="select sortname_en as sortname,id from jp_category where parentid=27 order by px asc ";
	$result=$GLOBALS["db"]->getAll($sql);
	$i=0;
	foreach($result as $value)
	{
		 $lists[$i]["info_id"]=$value["id"];
		 $lists[$i]["info_name"]=$value["sortname"];
		 $result_small=$GLOBALS["db"]->getAll("select sortname_en as sortname,id from jp_category where parentid=".$value["id"]." order by px asc ");
		 $j=0;
		 if($result_small)
		 {
			 foreach($result_small as $va){
				$lists[$i]["posts"][$j]["s_info_id"]=$va["id"];
				$lists[$i]["posts"][$j]["s_info_name"]=$va["sortname"];
				$result_details=$GLOBALS["db"]->getAll("select type2 as product_name,id from jp_product where sortid=".$va["id"]."  order by px asc,id desc");
				$k=0;
				if($result_details){
					 foreach($result_details as $v){
					     $lists[$i]["posts"][$j]["details"][$k]["d_info_id"]=$v["id"];
				         $lists[$i]["posts"][$j]["details"][$k]["d_info_name"]=$v["product_name"];
						 $k++;
					 }
					 
				 }else{
				    $lists[$i]["posts"][$j]["details"]="";	 
				 }
				$j++;
			 }
		 }else{
			 $lists[$i]["posts"]="";
			 $result_d=$GLOBALS["db"]->getAll("select type2 as product_name,id from jp_product where sortid=".$value["id"]."  order by px asc,id desc");
			 $x=0;
			 if($result_d){
				 foreach($result_d as $d){
					 $lists[$i]["p_d"][$x]["id"]=$d["id"]; 
					 $lists[$i]["p_d"][$x]["product_name"]=$d["product_name"]; 
					 $x++;
				 }
			  }else{
				  $lists[$i]["p_d"]="";  
			 }
		 }
		 $i++;
	}
	$GLOBALS["smarty"]->assign("product_list",$lists);
}

function sort_info($id){
	$sid=$GLOBALS["db"]->getOne("select sortid from jp_product where id=".$id);
	$result_s=$GLOBALS["db"]->getAll("select sortname_en as sortname,id,	parentid from jp_category where id=".$sid);
	$result_s[0]["url"]="products_one.php";
    if($result_s){
	    if($result_s[0]["parentid"]!=27){
		  $result_b=$GLOBALS["db"]->getAll("select sortname_en as sortname,id,parentid from jp_category where id=".$result_s[0]["parentid"]);
		  $result_s[0]["url"]="products_two.php";
		  $result_b[0]["url"]="products_one.php";
		  $result[0]=$result_b[0];
		  $result[1]=$result_s[0]; 
		}else{
		  $result[0]=$result_s[0]; 	
		}	
	} 
	return $result;
}
function home_news($types,$pic_news,$other_news){
	$sql="select news_name,id,news_content,type1 from jp_news where sortid=".$types." and type1<>''  and viewflag=1 order by viewflag desc,add_time desc limit 1 ";
    $pic_result=$GLOBALS["db"]->getAll($sql);
	@$f_id=$pic_result[0]["id"];
	if(is_numeric($f_id)){
		$sql1="select news_name,id,add_time from jp_news where sortid=".$types." and id<>".$f_id." order by viewflag desc,add_time desc limit 5 ";
	}else{
	    $sql1="select news_name,id,add_time from jp_news where sortid=".$types." order by viewflag desc,add_time desc limit 9 ";
		$pic_result="";
	}
	//echo $sql1."<br>";
	$other_result=$GLOBALS["db"]->getAll($sql1);
    $GLOBALS["smarty"]->assign($pic_news,$pic_result);
    $GLOBALS["smarty"]->assign($other_news,$other_result);
}
function home_tj_product(){
   $sql="select type2,id from jp_product order by viewflag desc ,px asc,id desc limit 6 " ;
   $result=$GLOBALS["db"]->getAll($sql);
   $GLOBALS["smarty"]->assign("tj_pro",$result);
}

function show_select($types){ //下来显示信息的类别
  $sql="select sortname,id from jp_category where parentid=$types and isDel=1 order by px asc,id asc  " ;
  $result=$GLOBALS["db"]->getAll($sql);
  $lists="";
  foreach($result as $v){
	  extract($v);
	  $lists.= '<LI><SPAN class=folder><a href="products_'.$id.'.html">'.$sortname.'</a></SPAN> ';
	  $lists.=child_sort($id);
	  $lists.= '</li>';
  }
  return  $lists;
}

function child_sort($p_id){
	$listss="";
	$sql="select sortname,id from jp_category where parentid=$p_id  order by px asc,id asc  " ;
	$result=$GLOBALS["db"]->getAll($sql);
	if(!empty($result)){
		$listss.= "<ul>";
		foreach($result as $v){
			extract($v);
			$listss.='<LI><SPAN class=file><a href="products_'.$id.'.html">'.$sortname.'</a></SPAN> ';
			$listss.=child_sort($id);
		}
		$listss.= "</ul>";
	}
	return $listss;
}
?>