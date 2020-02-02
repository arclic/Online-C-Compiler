<link rel="stylesheet" type="text/css" href="css/main.css" />
<?php

	function ErrorMsg($error_message){
		echo '<p class="error">Error!</p>';
		echo '<pre class="error">'.$error_message."</pre>";	
	}

	function OuputMSG($output){
		echo '<p class="error">Output!</p>';
		echo '<pre class="error">'.$output."</pre>";	
	}

	$Source_code = $_POST['code'];
	$Input = $_POST['input'];
	$Output = "output.txt";
	
	$main_file = fopen("main.c", "w") or die("Unable to open file!");
	fwrite($main_file, $Source_code);
	fclose($main_file);

	shell_exec("gcc main.c 2> error.txt");
	$error_message = file_get_contents("error.txt");
	
	if(!empty($error_message)){
		ErrorMsg($error_message);
	}

	else{

		if(!empty($Input)){
			//echo "Input is not empty!";
			$input_file = fopen("input.txt", "w") or die("Unable to open file!");
			fwrite($input_file, $Input);
			fclose($input_file);
			
			shell_exec("timeout 1s ./a.out < input.txt 2> error.txt");
			$error_message = file_get_contents("error.txt");
			
			if(!empty($error_message)){
				ErrorMsg($error_message);
			}
			
			else{
				$output=shell_exec("timeout 1s ./a.out < input.txt");
				OuputMSG($output);
			}
		}

		else{
			//echo "None Input";
			shell_exec("timeout 1s ./a.out 2> error.txt");
			$error_message = file_get_contents("error.txt");
			
			if(!empty($error_message)){
				ErrorMsg($error_message);
			}
			
			else{
				$output=shell_exec("timeout 1s ./a.out");
				OuputMSG($output);
			}

		}
	}
	
	exec("rm main.c");
	exec("rm a.out");
	exec("rm *.txt");
?>