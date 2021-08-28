const form = document.querySelector(".wrapper form"),
fullURL = form.querySelector("input"),
shortenBtn = form.querySelector("button");
shortURLBox = document.querySelector(".shortURL-box");
shortenURL = shortURLBox.querySelector("input");

form.onsubmit = (e) => {
	e.preventDefault();
}

shortenBtn.onclick = () => {
	//console.log("Clicked");
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "php/url_generator.php", true);
	xhr.onload = () => {
		if(xhr.readyState == 4 && xhr.status == 200) { //AJAX - запрос успешен
			let data = xhr.response;
			if (data.length <= 5) {
				let domain = "localhost/test_quest?u=";
				shortenURL.value = domain + data;
			} else {
				alert(data);
			}
		}
	}
	let formData = new FormData(form);
	xhr.send(formData);
}