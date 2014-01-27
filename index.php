<html>
<head>
<!-- Hopp egy Google Api -->
<script src="https://apis.google.com/js/client.js"></script>
<!-- //Hopp egy JQuery -->
<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script>
	//Gombnyomásra elkezdődik a bejelentkezési és engedélyezési folyamat
	function auth() {
		//client_id: Google Consoleban tudod regisztrálni, felhasználó illetve fejlesztő-függő
		//scope: Állandó érték, a contact api-t határozza meg
		var config = {
			'client_id' : '514440528383.apps.googleusercontent.com',
			'scope' : 'https://www.google.com/m8/feeds'
		};
		//Ha megtörtént az azonosítás, a PHP elkezdi feldolgozni a címeket, ajax folyamatban. Eredményt küldi doWithResp-nek
		gapi.auth.authorize(config, function() {
			$.get('process.php?accesstoken='
					+ gapi.auth.getToken().access_token, function(resp) {
				doWithResp(resp);
			}, "json");
		});
	}
	function doWithResp(resp) {
		//Csináljamit akarsz a végeredménnyel, a resp az egy JSON objektum. Konzolba logoltam alapból, F12-vel meg tudod nézni
		var szoveg="";
		console.log('Ennyi:');
		console.log(resp);
		for(i=1;i<resp.length;i++){
			szoveg=szoveg+resp[i]+'\n';
		}
		$("#aroma").val(szoveg);
	}
</script>
</head>

<body>
	<button onclick="auth();">Csapasd neki!</button>
	<textarea id="aroma"></textarea>
</body>
</html>
