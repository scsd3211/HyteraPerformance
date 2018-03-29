<!DOCTYPE HTML> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Hytera行业解决方案组绩效统计网页</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php
// 定义变量并默认设置为空值
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["name"]))
    {
        $nameErr = "名字是必需的";
		$name = "empty";
    }
    else
    {
        $name = test_input($_POST["name"]);
		
		$name = $_POST["name"];
        // 检测名字是否只包含字母跟空格
        if (!preg_match("/^[a-zA-Z ]*$/",$name))
        {
            $nameErr = "只允许字母和空格"; 
        }
    }
    


    
    if (empty($_POST["gender"]))
    {
        $genderErr = "增加和删减必选其一";
    }
    else
    {
        $gender = test_input($_POST["gender"]);
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>Hytera 行业解决方案组  绩效统计网站demo 制作中 </h2>
<p><span class="error">* 必需字段。</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   名字: <input type="text" name="name" value="<?php echo $name;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>

   增加还是删减:
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Add") echo "checked";?>  value="Add">增加
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Delete") echo "checked";?>  value="Delete">删减
   <span class="error">* <?php echo $genderErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>

<p>


<?php
echo "<h2>您输入的内容是:</h2>";
echo $name;
echo "<br>";

echo $gender;
?>
</p>
<p>&nbsp;</p>
<p>I believe </p>


</body>
</html>