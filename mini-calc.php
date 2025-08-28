<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mini-Calculator</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>



<?php
$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = floatval($_POST["num1"]);
    $num2 = floatval($_POST["num2"]);
    $operation = $_POST["operation"];

    // Check which operation button was clicked
    if ($operation == "add") {
        $result = $num1 + $num2;
    } elseif ($operation == "subtract") {
        $result = $num1 - $num2;
    } elseif ($operation == "multiply") {
        $result = $num1 * $num2;
    } elseif ($operation == "divide") {
        if ($num2 != 0) {
            $result = $num1 / $num2;
        } else {
            $result = "❌ Error: Division by zero!";
        }
    } else {
        $result = "⚠️ Invalid operation";
    }

    // If result is a number, round it
    if (is_numeric($result)) {
        $result = round($result, 2);
    }
} 
?>



<body class="bg-gray-900 py-10 flex items-center justify-center px-4">
  <div class="bg-blue-200 rounded-lg shadow-lg p-6 w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center text-red-600">
      Mini Calculator
    </h2>
    
    <form method="post" class="space-y-3">
      <!-- First Number -->
      <div class="mb-4">
        <label class="block font-semibold text-gray-700 mb-1">Input First Number</label>
        <input type="number" id="num1" name="num1"
          class="w-full p-3 py-2 border rounded focus:outline-none focus:ring focus:ring-indigo-300" required />
        
      </div>

      <!-- Second Number -->
      <div class="mb-4">
        <label class="block font-semibold text-gray-700 mb-1">Input Second Number</label>
        <input type="number" id="num2" name="num2"
          class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-indigo-300" required />
        
      </div>

      
      <div class="grid grid-cols-2 gap-3 mt-3">

          
          <!-- Addition  Button -->
          <button type="submit" name="operation" value="add" class="bg-orange-500 hover:bg-orange-600 p-3 rounded-lg font-bold">
              Addition (+)
      </button>

     

      <!-- Subtraction  Button -->
      <button type="submit" name="operation" value="subtract" class="bg-blue-500 hover:bg-blue-600 p-3 rounded-lg font-bold">
        Subtraction (-)
      </button>
      
      

      <!-- Division  Button -->
      <button type="submit" name="operation" value="divide" class="bg-green-500 hover:bg-green-600 p-3 rounded-lg font-bold">
        Division (/)
    </button>
    
   
    
    <!-- Multiplication  Button -->
    <button type="submit" name="operation" value="multiply" class="bg-red-500 hover:bg-red-600 p-3 rounded-lg font-bold">
        Multiplication (x)
    </button>
    
</div>
    
</form>


 <!-- Show Result -->
<div class="mt-5 p-3 bg-gray-200 rounded-lg text-center">
      <span class="font-semibold">Result: </span>
      
      
      <?php

    //   if($result){
    //     echo round($result);
    //   }    
      
      echo $result !== "" ? $result : "Enter numbers and select a button."; 

      ?>

    </div>


  </div>


</body>

</html>