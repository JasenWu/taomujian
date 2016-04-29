<?php
//公模块调用
$smarty->assign("server_name",SERVER_NAME);  //域名路径

//首页新闻推荐
function home_img($num){
   $sql="select news_name,id,type1 from kaisi_news where sortpath like '%0,2,%' and  viewflag=1 and type1<>'' order by add_time desc,id desc";
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
//类别信息
function sort_list($id,$data_base="kaisi_menu_sort",$ass="about_menu"){
   $sql="select id,sortname from ".$data_base." where parentid=".$id." order by px asc " ;
   $result=$GLOBALS["db"]->getAll($sql);
   $GLOBALS["smarty"]->assign($ass,$result) ;
}
//公司简介内容
function about_countent($id,$cut_word=""){
	if(is_numeric($id)){
	  $result=$GLOBALS["db"]->getOne("select content from kaisi_article where m_id=".$id);
	  if(!empty($result)){$result=str_replace("../Uploadfiles/","/Uploadfiles/",$result);}
	  if(!empty($cut_word)){
		  if($result){
		    $results=str_replace("&nbsp;","",str_replace(" ","",strip_tags($result)));
			$result=$GLOBALS["db"]->chgtitle($results,$cut_word,"utf8");
		  }
      }
	  $navi=$GLOBALS["db"]->getOne("select sortname from kaisi_menu_sort where id=".$id);
	  $GLOBALS["smarty"]->assign("about_content",$result);
	  $GLOBALS["smarty"]->assign("navi",$navi);
	}
}
//信息列表
function information_list($pageSize,$field,$data_where="",$order="add_time desc,id desc",$date_base="kaisi_news",$assign_name="info_reslut"){
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
		 $pagenav=$GLOBALS["db"]->pageft($page,$num,$pageSize,1,1,0) ;  //调用分页类
	  }else{
		 $pagenav="";$info_reslut="";
	   }
	  $GLOBALS["smarty"]->assign("showpage",$pagenav) ;       //分页信息
	  $GLOBALS["smarty"]->assign($assign_name,$info_reslut) ;  //信息列表
}
//信息类别名称
function sort_name($id){
  if(is_numeric($id)){
	 $sort_names=$GLOBALS["db"]->getOne("select sortname from kaisi_category where id=".$id);
	 return $sort_names;  
  }	
}
//信息详细页
function information_details($field,$data_base,$id,$views=""){
   $sql="select ".$field." from `".$data_base."`  where ID=".$id;
   $info_details=$GLOBALS["db"]->getAll($sql);
   if($views=="views"){
	    $GLOBALS["db"]->query("update ".$data_base." set $views=$views+1 where id=".$id);
   }
   if(@$info_details[0]["sortid"]){
      $s_name=sort_name($info_details[0]["sortid"]); //获得当前类别的名称
      $GLOBALS["smarty"]->assign("sort_name",$s_name);
   }
   $GLOBALS["smarty"]->assign("info_details",$info_details) ;       //分页信息
}
?>