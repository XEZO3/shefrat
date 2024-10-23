<?php
$keys = [
    "أ"=>"أ.png",
    "ا"=>"أ.png",
    "ء"=>"ء.png",
    "ب"=>"ب.png",
    "ت"=>"ت.png",
    "ث"=>"ث.png",
    "ج"=>"ج.png",
    "ح"=>"ح.png",
    "خ"=>"خ.png",
    "د"=>"د.png",
    "ذ"=>"ذ.png",
    "ر"=>"ر.png",
    "ز"=>"ز.png",
    "س"=>"س.png",
    "ش"=>"ش.png",
    "ص"=>"ص.png",
    "ض"=>"ض.png",
    "ط"=>"ط.png",
    "ظ"=>"ظ.png",
    "ع"=>"ع.png",
    "غ"=>"غ.png",
    "ف"=>"ف.png",
    "ق"=>"ق.png",
    "ك"=>"ك.png",
    "ل"=>"ل.png",
    "م"=>"م.png",
    "ن"=>"ن.png",
    "ه"=>"ه.png",
    "و"=>"و.png",
    "ي"=>"ي.png",
    "ى"=>"ي.png",
    "ة"=>"ي.png",
    "ئ"=>"ي.png",
];
$numkeys = [
    "أ"=>"1",
    "ا"=>"2",
    "ء"=>"3",
    "ب"=>"4",
    "ت"=>"5",
    "ث"=>"6",
    "ج"=>"7",
    "ح"=>"8",
    "خ"=>"9",
    "د"=>"10",
    "ذ"=>"11",
    "ر"=>"12",
    "ز"=>"13",
    "س"=>"14",
    "ش"=>"15",
    "ص"=>"16",
    "ض"=>"17",
    "ط"=>"18",
    "ظ"=>"19",
    "ع"=>"20",
    "غ"=>"21",
    "ف"=>"22",
    "ق"=>"23",
    "ك"=>"24",
    "ل"=>"25",
    "م"=>"26",
    "ن"=>"27",
    "ه"=>"28",
    "و"=>"29",
    "ي"=>"30",
    "ى"=>"31",
    "ة"=>"32",
    "ئ"=>"33",
];
$message = "";
$chars = null;
$type = null;

if(isset($_POST['submit'])){
    $message = $_POST['message'];
    $type = $_POST['type'];
    $chars = mb_str_split($message);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        form {
            width: 80%;
            margin: 20px 0;
        }
        input[type="text"] {
            width: 50%;
            padding: 10px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus {
            border-color: #333;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        .output-container {
            border: 2px solid #333;
            border-radius: 10px;
            min-height: 400px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
            background-color: #fff;
            width: 80%;
            margin: 20px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        img {
            margin: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
            border-radius: 5px;
        }
    </style>
</head>
<body>
 <div style="display:flex;justify-content:center;width:100%;margin:auto">
    <form action="" method="post" style="width:90%;text-align:center">
        <input type="text" name="message" placeholder="أدخل النص هنا..." style="width: 50%;" >
        
        <br>
        <input type="radio" id="html" name="type" required value="num">
        <label for="html">ارقام</label><br>
        <input type="radio" id="html" name="type" value="square">
        <label for="html">مربعة</label><br>
        <button type="submit" name="submit">شفرني</button>
        </form>
 </div>   
<br>
<div class="output-container" id="printable" dir="rtl">
    <?php
    if($chars != null){
        if($type == "square"){
            foreach ($chars as $char) {
                if ($char == " ") {
                    // Using flex-basis to force a new line on space
                    echo "<div style='flex-basis: 100%; height: 0;'></div>";
                } else {
                    echo "<img height='80px' width='80px' src=\"" . $keys[$char] . "\">
                    ";
                }
            }
        }else{
            foreach ($chars as $char) {
                if ($char == " ") {
                    // Using flex-basis to force a new line on space
                    echo "<div style='flex-basis: 100%; height: 0;'></div>";
                } else {
                    echo "($numkeys[$char])";
                }
            } 
        }
    }
    ?>
</div>

<!-- Add a button to trigger the print -->
<button onclick="printDiv('printable')" style="margin-top: 20px;">Print Content</button>

<script>
function printDiv(divId) {
    // Get the div content
    var divContent = document.getElementById(divId).innerHTML;

    // Open a new window to print
    var newWin = window.open('', '', 'width=800,height=600');

    // Write the content to the new window
    newWin.document.write('<html><head><title>Print</title>');

    // Add custom styles for printing, including RTL and alignment adjustments
    newWin.document.write('<style>');
    newWin.document.write('body { font-family: Arial, sans-serif; text-align: right; direction: rtl; }');
    newWin.document.write('img { margin: 10px; display: inline-block; vertical-align: middle; }');
    newWin.document.write('.output-container { display: flex; flex-wrap: wrap; justify-content: center; align-items: center; }');
    newWin.document.write('</style>');

    // Close the head and start the body with the content
    newWin.document.write('</head><body>');
    newWin.document.write(divContent);
    newWin.document.write('</body></html>');

    // Close the document for printing
    newWin.document.close();

    // Wait for the content to load and print the window
    newWin.focus();
    newWin.print();

    // Close the window after printing
    newWin.close();
}
</script>
</body>
</html>