<!DOCTYPE HTML> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Hytera��ҵ��������鼨Чͳ����ҳ</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php
// ���������Ĭ������Ϊ��ֵ
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["name"]))
    {
        $nameErr = "�����Ǳ����";
		$name = "empty";
    }
    else
    {
        $name = test_input($_POST["name"]);
		
		$name = $_POST["name"];
        // ��������Ƿ�ֻ������ĸ���ո�
        if (!preg_match("/^[a-zA-Z ]*$/",$name))
        {
            $nameErr = "ֻ������ĸ�Ϳո�"; 
        }
    }
    


    
    if (empty($_POST["gender"]))
    {
        $genderErr = "���Ӻ�ɾ����ѡ��һ";
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

<h2>Hytera ��ҵ���������  ��Чͳ����վdemo ������ </h2>
<p><span class="error">* �����ֶΡ�</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   ����: <input type="text" name="name" value="<?php echo $name;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>

   ���ӻ���ɾ��:
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Add") echo "checked";?>  value="Add">����
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Delete") echo "checked";?>  value="Delete">ɾ��
   <span class="error">* <?php echo $genderErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>

<p>


<?php
echo "<h2>�������������:</h2>";
echo $name;
echo "<br>";

echo $gender;
?>
</p>
<p>&nbsp;</p>
<p>I believe </p>


</body>
</html>