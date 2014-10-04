<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<div>
			<p>Vaš QRLoyalty nalog je kreiran. </p>
			<p>Podaci za autentifikaciju: </p>
			<p>Email: {{$user->email}} </p>
			@if($autoCreatedUser)
				<p>Šifra: 123456 </p>
			@else
				<p>Šifra: ********* </p>
			@endif
		</div>
		@if($autoCreatedUser)
			<b>Molimo Vas da sto pre promeniti vasu sifru. </b>
		@endif
	</body>
</html>
