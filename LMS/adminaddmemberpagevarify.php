<?php
    

    if(isset($_POST['uname']) && isset($_POST['uemail']) && isset($_POST['upass']) &&
    isset($_POST['udate'])&&
    isset($_POST['uphone']) &&
    isset($_POST['uaddress']) &&
       !empty($_POST['uname']) && !empty($_POST['uemail']) && !empty($_POST['upass']) &&
       !empty($_POST['udate']) &&
       !empty($_POST['uphone']) &&
       !empty($_POST['uaddress'])){
        
        $var1=$_POST['uname'];
        $var2=$_POST['uemail'];
        $var3=md5($_POST['upass']);
        $var4=$_POST['udate'];
        $var5=$_POST['uphone'];
        $var6=$_POST['uaddress'];
        $var7=$_POST['uprofession'];
        $var8='';
        try{
            
            $dbcon = new PDO("mysql:host=localhost:3306;dbname=lms;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query="INSERT INTO member VALUES('$var1',NULL,'$var3','$var5','$var2','$var6','$var4','$var7','$var8')";  
            
            try{
                
                $dbcon->exec($query);
                
                
                ?>
                    <script>window.location.assign('adminaddmember.php')</script>
                <?php
            }
            catch(PDOException $ex){
                
                ?>
                    <script>window.location.assign('invalidadminaddmemberpage.php')</script>
                <?php
            }
            
        }
        catch(PDOException $ex){
            ?>
                <script>window.location.assign('invalidadminaddmemberpage.php')</script>
            <?php
        }
    }
    else{
        ?>
            <script>window.location.assign('adminaddmemberpage.php')</script>
    
        <?php
        
    }
?>