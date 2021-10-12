<div>
	<input id="in_english" type='text' name=in_english>
	<input id="in_georgian" type='text' name=in_georgian>
	<button onclick=send_data() name="insert">Insert</button>
</div>

<script>
	function send_data(){
		var data = {};
		data["in_georgian"] = document.querySelector("#in_georgian").value;
		data["in_english"] = document.querySelector("#in_english").value;
		fetch('get_data.php', {
			method: 'POST',
			headers:{
				'Content-Type': 'application/json'
			},
			body: JSON.stringify(data),
		})
		.then(res => res.text())
		.then(data => {
			console.log(data);
		})
	}
</script>
