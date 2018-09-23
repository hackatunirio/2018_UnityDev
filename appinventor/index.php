<!DOCTYPE html>
<html>
<head>
	<title>LocaRio</title>
</head>
<body>
<div class="Container">
	<img class="ImgFront" id="IDImgFront" src="logo.png">
	<button class="ButtGrad" onclick="javascript: location.href='Home.php?Tipe=gradacao';">Graduação</button>
	<button class="ButtAft" onclick="javascript: location.href='Home.php?Tipe=PGraduacao';">Pós-Graduação</button>
	<button class="ButtMest" onclick="javascript: location.href='Home.php?Tipe=Mestrado';">Mestrado</button>
</div>

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <img class="ImgFront" src="42388901_2192155851018323_6903620342988668928_n.jpg">
    </br>
	</br>
    <h2>Equipe desenvolvedora</h2>
  </div>
</div>
</body>
<script>
	var modal = document.getElementById('myModal');
	var btn = document.getElementById("IDImgFront");
	var span = document.getElementsByClassName("close")[0];
	btn.onclick = function() {
    	modal.style.display = "block";
	}
	span.onclick = function() {
    	modal.style.display = "none";
    }
	window.onclick = function(event) {
    	if (event.target == modal) {
        	modal.style.display = "none";
    	}
	}
</script>
<style type="text/css">
body{
	margin: 0 auto;
}
	.Container{
		width: 100%;
		height: 100vh;
		background-color: black;
	}
	.ImgFront{
		float: left;
		margin-left: 20%;
		margin-top: 5vh;
		width: 60%;
		height: auto;
	}
	.ButtGrad{
		float: left;
		margin-left: 10%;
		margin-top: 10vh;
		width: 80%;
		height: 8vh;
		background-color: white;
		border-radius: 2vh 9vh 2vh 9vh;
		font-size:3.5vh;

	}
	.ButtAft{
		float: left;
		margin-left: 10%;
		margin-top: 5vh;
		width: 80%;
		height: 8vh;
		background-color: white;
		border-radius: 2vh 9vh 2vh 9vh;
		font-size:3.5vh;
	}
	.ButtMest{
		float: left;
		margin-left: 10%;
		margin-top: 5vh;
		width: 80%;
		height: 8vh;
		background-color: white;
		border-radius: 2vh 9vh 2vh 9vh;
		font-size:3.5vh;
	}
/*  modal*/
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 50vh;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
    text-align:center
}
.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    border: 1px solid #888;
    width: 80%;
    height: 50vh;
}
.close {
    color: #aaa;
    float: right;
    font-size: 6vh;
    font-weight: bold;
}
.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
} 
</style>
</html>