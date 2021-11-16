<script>
	var data = [2, 3, 4, 5];
	fetch('ajax_take.php', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(data),
	})
	.then(res => res.text())
	.then(data => {
		console.log(data);
	})
</script>