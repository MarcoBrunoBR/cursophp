<h5>Exercício nº 1</h5>
<?php
$total = 10 + 20 / 4;
echo $total;
?>
<hr>
<h5>Exercício nº 2</h5>
<?php
$soma = 0;
for( $i = 1; $i <= 1000; $i++){
	$soma = $soma + $i;
        }
echo $soma;
?>
<hr>
<h5>Exercício nº 3</h5>

<?php
echo 'Fatorial ';

$fatorial = 1;
$valor = 4;

for ($i = 2; $i <= $valor; $i++){
	
	$fatorial *= $i;
}
echo $fatorial.' ';
?>
<hr>
<h5>Exercício nº 4</h5>
<?php
function fibonacci($n) {
$primeiro = 0;
$segundo = 1;
	echo "Sequência Fibonacci: \n";
	echo $primeiro.' ... '.$segundo.' ... ';
		
		for ($i = 2; $i < $n; $i++) {
			
			$terceiro = $primeiro + $segundo;
			
			echo $terceiro.' ... ';
			
			$primeiro = $segundo;
			$segundo = $terceiro;
		}
}
	echo fibonacci(12);
?>