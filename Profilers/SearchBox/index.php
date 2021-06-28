<!DOCTYPE html>
<html>
<head>
	<title>Search Box  </title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body class="deep-purple">
	<div class="row">
		<div class="col l6 offset-l3" style="margin-top: 10%">
			<nav class="white">
    <div class="nav-wrapper">
      <form autocomplete="off" id="form">
        <div class="input-field">
          <input id="search" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons blue-text">search</i></label>
          <i class="material-icons" id="close_btn">close</i>
        </div>
      </form>
      <div class="card-panel" id="output" style="display: none;">
      </div>
    </div>
  </nav>
		</div>
	</div>
	<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script type="text/javascript">
		close_btn=document.getElementById("close_btn")
		form=document.getElementById("form")
		search_input=document.getElementById("search")
		output=document.getElementById("output")
		form.addEventListener("submit",submitnot)
		function submitnot(e)
		{
			e.preventDefault();
		}
		search_input.addEventListener("keydown",(e)=>{
			output.style.display="block"
			output.innerHTML='<div class="progress"><div class="indeterminate"></div></div>'
  			q=e.target.value
			const xhr=new XMLHttpRequest();
			xhr.open("GET","search.php?q="+q,true)
			xhr.onload=function()
			{
				if(xhr.status==200)
				{
					output.innerHTML=''
					output.innerHTML=xhr.responseText
				}
			}
			if(q.length>=2)
				xhr.send();
			if(q.length==0)
			{
				output.innerHTML=''
				output.style.display="none"
			}
		})
		close_btn.addEventListener("click", function(e){
			search_input.value=''
			output.innerHTML=''
			output.style.display="none"
		})
	</script>
</body>
</html>