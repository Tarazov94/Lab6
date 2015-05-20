<?php
class News{
    private $_id;
    private $_name;
    private $_url;
    private $_comm;
    private $_img;
    private $_content;
    
    function  News($dat){
        $this->_id = $dat[4];
        $this->_name = $dat[0];
        $this->_url = $dat[3];
        $this->_comm = $dat[1];
        $this->_img = $dat[2];
        $this->_content = $dat[5];
    }
        function construct($id, $name, $url, $comm, $img){
            $this->_id=$name;
            $this->_name = $name;
            $this->_url = $url;
            $this->_comm = $comm;
            $this->_img = $img;
            $this->_content = $img;
    }
    function getNews(){
        $data = array($this->name,$this->url,$this->comm,$this->img,$this->content);
        return $data;
    }
    function name(){
        return $this->_name;
    }
    function url(){
        return $this->_url;
    }
    function comm(){
        return $this->_comm;
    }
    function img(){
        return $this->_img;
    }
    function id(){
        return $this->_id;
    }
    function content(){
        return $this->_content;
    }
}
class Comments{
    public $_id;
    private $_id_writer;
    private $_id_news;
    private $_comment;
    private $_Likee;
    private $_datatime;
    
    function  Comments($dat){
        $this->_id = $dat[0];
        $this->_id_writer = $dat[1];
        $this->_id_news = $dat[2];
        $this->_comment = $dat[3];
        $this->_Likee = $dat[4];
        $this->_datatime = $dat[5];
    }
    function  Comments2($dat){
        $this->_id = $dat->id();
        $this->_id_writer = $dat->id_writer();
        $this->_id_news = $dat->id_news();
        $this->_comment = $dat->comment();
        $this->_Likee = $dat->Likee();
        $this->_datatime = $dat->datatime();
    }
    function id(){
        return $this->_id;
    }
    function id_writer(){
        return $this->_id_writer;
    }
    function id_news(){
        return $this->_id_news;
    }
    function comment(){
        return $this->_comment;
    }
    function Likee(){
        return $this->_Likee;
    }
    function datatime(){
        return $this->_datatime;
    }
}
class User{
    private $_id_user;
    private $_name;
    private $_access;
    function  User($dat){
        $this->_id_user = $dat[0];
        $this->_name = $dat[1];
        $this->_url = $dat[2];
    }
    function id(){
        return $this->_id_user;
    }
    function name(){
        return $this->_name;
    }
    function access(){
        return $this->_access;
    }
}
class Comments_on_User extends Comments {
   private $_name;
   private $_access;
   
   function  Comments_on_User($dat,$dat2){
       parent::Comments2($dat);
        $this->_name = $dat2[0];
        $this->_access = $dat2[1];
    }
   function name(){
        return $this->_name;
    }
    function access(){
        return $this->_access;
    }
}
class Model{
private $i;
   function Model(){
        
    }
function news()
{
$query_results= mysql_query('select name, comment, foto, url, id, content from NEWS');
$data = array();
while ($row = mysql_fetch_array($query_results)) {
    $temp = new News($row);
    $data[] = $temp;
    
}
return $data;
}

function comment($id_news){
    $query_results= mysql_query('select * from comment Where id_news='.$id_news);
    $data = array();
    while ($row = mysql_fetch_array($query_results)) {
    $temp = new Comments($row);
    $data[] = $temp;
    }
    return $data;
}
function Com_plus_User($temp_com){
    $data = array();
    $dbconn4 = pg_connect("host=localhost port=5432 dbname=Производство user=postgres password=abs123");
    foreach($temp_com as $row)
        {  
        $qr_result = pg_query($dbconn4, "select name, type From login Where id=".$row->id_writer());
        $data2 = pg_fetch_array($qr_result);
        $data2[0]=str_replace(" ","",$data2[0]);
        $data2[1]=str_replace(" ","",$data2[1]);
        $temp = new Comments_on_User($row,$data2);
        $data[] = $temp;
        }
    return $data;
}

function get_cat($id)
{
	$res=mysql_query('SELECT name, comment, foto, url, id, content FROM NEWS WHERE id ='.$id);
	$brand_name = array();
	$row = mysql_fetch_array($res);
		$temp = new News($row);
                $brand_name[] = $temp;
                
	
	return $brand_name;
}
function content_page($id)
{
	$query1 = "SELECT `content` FROM content WHERE `id`='$id'";
	$res1 = mysql_query($query1);
	while($row = mysql_fetch_array($res1))
	{
		$content[] = $row;
	}
	return $content;
}
}
?>

