<?php
    /*
    $show=$_GET['show'];
    $hidden=$_GET['hidden'];
    $state=$_GET['state'];
    $state2=$_GET['state2'];
    */
    $show = isset($_GET['show']) ? $_GET['show'] : 0;
    $hidden = isset($_GET['hidden']) ? $_GET['hidden'] : '';
    $state = isset($_GET['state']) ? $_GET['state'] : '';
    $state2 = isset($_GET['state2']) ? $_GET['state2'] : '';
    function numberpress($number)
    {
        global $show,$state,$state2,$hidden;
        
        if($show==0 || ($state !="" && $state2!="1"))
        {
            $show=$number;
            if($state !="")
            {
                $state2="1";
            }
        }
        else
        {
            $show=$show.$number;
        }
    
    } 
    if(isset($_GET['0']))
    {
        numberpress("0");
    }
    else if(isset($_GET['1']))
    {
        numberpress("1");
    }
    else if(isset($_GET['2']))
    {
        numberpress("2");
    }
    else if(isset($_GET['3']))
    {
        numberpress("3");
    }
    else if(isset($_GET['4']))
    {
        numberpress("4");
    }
    else if(isset($_GET['5']))
    {
        numberpress("5");
    }
    else if(isset($_GET['6']))
    {
        numberpress("6");
    }
    else if(isset($_GET['7']))
    {
        numberpress("7");
    }
    else if(isset($_GET['8']))
    {
        numberpress("8");
    }
    else if(isset($_GET['9']))
    {
        numberpress("9");
    }
    else if(isset($_GET['+']))
    {
        $state="+";
        $state2="";
        $hidden=$show;
    }
    else if(isset($_GET['-']))
    {
        $state="-";
        $state2="";
        $hidden=$show;
    }
    else if(isset($_GET['*']))
    {
        $state="*";
        $state2="";
        $hidden=$show;
    }
    else if(isset($_GET['/']))
    {
        $state="/";
        $state2="";
        $hidden=$show;
    }
    else if(isset($_GET['=']))
    {
       if($state=="+")
       {
         $show=$hidden+$show;
       }
       else if($state=="-")
       {
         $show=$hidden-$show;
       }
       else if($state=="*")
       {
         $show=$hidden*$show;
       }
       else if($state=="/")
       {
         $show=$hidden/$show;
       }
    }

    else if (isset($_GET['reset']))
    {
        // รีเซ็ตค่าให้กลับไปเป็นค่าเริ่มต้น
        $show = 0;
        $state = "";
        $state2 = "";
        $hidden = "";

        // กลับไปที่หน้าเริ่มต้น
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
    
    else if (isset($_GET['backspace']))
    {
        // ลบตัวอักษรสุดท้ายออกจากค่าที่แสดงผล
        $show = substr($show, 0, -1);
        if ($show == '' || $show == '0')
        {
            $show = "0";
        }
    }

    else
    {
        $show=0;
        $state="";
        $state2="";
        $hidden="";
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image:url("img/1.jpg");
        }
        .calculator {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color:burlywood;
        }
        .calculator input {
            font-size: 25pt;
            width: 100%;
            text-align: center;
            margin-bottom: 10px;
            background-color: darkgray;
        }
        .calculator table {
            width: 100%;
            border-collapse: collapse;
        }
        .calculator table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
            cursor: pointer;
            background-color:darkorange;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <form action="" method="get">
            <input type="text" name="show" value="<?php echo $show;?>" style="text-align:right;" readonly>
            <input type="hidden" name="hidden" value="<?php echo $hidden;?>">
            <input type="hidden" name="state" value="<?php echo $state;?>">
            <input type="hidden" name="state2" value="<?php echo $state2;?>">
            <table>
                <tr>
                    <td><input type="submit" value="7" name="7"></td>
                    <td><input type="submit" value="8" name='8'></td>
                    <td><input type="submit" value="9" name='9'></td>
                    <td><input type="submit" value="/" name='/'></td>
                </tr>
                <tr>
                    <td><input type="submit" value="4" name='4'></td>
                    <td><input type="submit" value="5" name='5'></td>
                    <td><input type="submit" value="6" name='6'></td>
                    <td><input type="submit" value="*" name='*'></td>                     
                </tr>
                <tr>
                    <td><input type="submit" value="1" name='1'></td>
                    <td><input type="submit" value="2" name='2'></td>
                    <td><input type="submit" value="3" name='3'></td>
                    <td><input type="submit" value="-" name='-'></td>            
                </tr>
                <tr>
                    <td><input type="submit" value="0" name='0'></td>
                    <td colspan="2"><input type="submit" value="=" class="kub" name="=" style="padding-left: 20px;"></td>
                    <td><input type="submit" value="+" name='+'></td>   
                </tr>
                <tr>
                    <td colspan="3"><input type="submit" value="Backspace" name="backspace" style="width: 100%;"></td>              
                    <td><input type="submit" value="reset" name="reset"></td>      
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
