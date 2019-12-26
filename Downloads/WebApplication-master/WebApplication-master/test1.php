<?php 
    $host = "localhost";
    $user = "root";
    $passwd = "";
    $dbname = "practice";
    $con  = mysqli_connect($host,$user,$passwd,$dbname);
    if(!$con){

        die("Connection falied".mysqli_connect_error());
    }
    echo "Connection successfully";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Web App Demo</title>
</head>
<body>
    <h1>ตารางพนักงาน</h1>
    <table border="1">
        <tr>
           <th>รหัสพนักงาน</th>
           <th>ชื่อ</th>
           <th>ตำแหน่ง</th>
           <th>รหัสหัวหน้า</th>
           <th>วันที่จ้าง</th>
           <th>งินเดือน</th>
           <th>คอมมิชชั่น</th>
           <th>แผนก</th>
        </tr>
        <?php
        $sql = "select emp.EMPNO,emp.ENAME,emp.JOB,emp.MGR,emp.HIREDATE,emp.SAL,emp.COMM,dept.DNAME 
                from emp,dept
                where emp.DEPTNO = dept.DEPTNO
                 order by emp.EMPNO ASC";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row["EMPNO"]?></td>
            <td><?php echo $row["ENAME"]?></td>
            <td><?php echo $row["JOB"]?></td>
            <td><?php echo $row["MGR"]?></td>
            <td><?php echo $row["HIREDATE"]?></td>
            <td><?php echo $row["SAL"]?></td>
            <td><?php echo $row["COMM"]?></td>
            <td><?php echo $row["DNAME"]?></td>
        </tr>
                <?php } 
            } ?>
    </table>
</body>
</html>