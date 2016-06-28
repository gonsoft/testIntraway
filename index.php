<?php

if (!empty($_POST["input"]) && isset($_POST["input"])) 
{
	
	// definicion de clase
	
		class subsequencew{
			var $numbers;
			var $weights;
			var $T;
			var $N;

			// constructor
			function subsequencew(){
					$input = $_POST["input"];
					$lineas = explode("\n",$input); 
					$ic = 1;
					$first = 1;
					
					for( $i=0; $i < count($lineas); $i++ ){
					   $v = trim($lineas[$i]);
					   if(!empty($v)){
							if( $first == 1 ){
								$T = $v;
								$first++;
									echo "<h2>OUTPUT</h2>";
									echo "<br>==============";								
							}else{
								if( $ic == 1 ){
									$this->N = trim($lineas[$i]);
									$ic++;
									
								}elseif( $ic == 2 ){
									$this->numbers = explode(" ",trim($lineas[$i])); 
									$ic++;
								}elseif( $ic == 3 ){
									$this->weights = explode(" ",trim($lineas[$i])); 
									$ic = 1;
									//var_dump($this->numbers);
									//var_dump($this->weights);
									//var_dump($this->maxWeight(0,0,$this->N));
									echo "<br>".$this->maxWeight(0,0,$this->N);
									//echo "<br> FIN FIN ";
								}				
							}
					   }
					}
			} // Fin constructor
		
			// FUNCION
			function maxWeight($ref, $cur, $n){
				/*global $numbers;
				global $weights;*/
				if ($cur == ($n-1)){
					if ($this->numbers[$cur]>$this->numbers[$ref])
						return $this->weights[$cur];
					else
						return 0;
				}

				$take = $dont = 0;

				if ($ref==$cur)
					$take = $this->weights[$cur] + $this->maxWeight($cur,$cur+1,$n);
				else if ($this->numbers[$cur]>$this->numbers[$ref])
					$take = $this->weights[$cur] + $this->maxWeight($cur,$cur+1,$n);

				$dont = $this->maxWeight($ref,$cur+1,$n);

				return max($take,$dont);

			}// FIN DE FUNCION

		}// Fin definicion de clase
	
	$obj= new subsequencew;

}
?>

<html>
<title>Subsequence Weighting</title>
<br><br>
<h1>Ricardo Gonzalez exam in php</h1>
<h3>Please write your input for calculate a: Subsequence Weighting</h3>

<form name="login" method="post" action="index.php">						
	<textarea rows="10" cols="150" name="input" required   >
		<?php 
		if (!empty($_POST["input"]) && isset($_POST["input"])) 
		echo $_POST["input"]; 
		?>
	</textarea>
	<br>
<input type="submit" value="Calculate Subsequence Weighting">
</form>

</html>