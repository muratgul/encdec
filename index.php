<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Encrypte - Decrypte</title>
</head>
<body>

	<style type="text/css">
	.yenile a {
	color:white;	
}

body{
background-color:#333;
/*
 background: url(xassets/img/bg.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
 * */
  color:#fff;
 text-shadow:1px 1px 2px #000;
}

	.metin-alani{
		min-height: 160px;
		border:solid 1px #ccc;
		border-radius: 7px;
		background-color: #fff;
		color:#000;
		padding:8px;
		 white-space: pre-wrap;      /* CSS3 */   
   		white-space: -moz-pre-wrap; /* Firefox */    
   		white-space: -pre-wrap;     /* Opera <7 */   
   		white-space: -o-pre-wrap;   /* Opera 7 */    
   		word-wrap: break-word;      /* IE */
    	 text-shadow:0px 0px 0px #fff;
	}
#author h1 {
  font:bold 32px 'Showcard Gothic','Century Gothic',Arial,Sans-Serif;
  xmargin:0 10px;
  color:#fff;
  text-shadow:2px 2px #000;
  position:relative;
  -webkit-animation:slow 5s;
  -moz-animation:slow 5s;
  -ms-animation:slow 5s;
  animation:slow 5s;
}
.gizli{
	display: none;
}

.loading {
  position: absolute;
  left: 50%;
  top: 60%;
  margin-left: -32px; /* -1 * image width / 2 */
  margin-top: -32px; /* -1 * image height / 2 */
}
.alert{
text-shadow:0px 0px 0px #fff;
}

	</style>
<?php
   
    function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890-/*_?=()&%+$#^!][';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 13; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
    
    ?>
	
<div class="gizli"><img src="assets/img/5.gif"></div>
<div class="mt-2"></div>
<div class="container">
	
	<div id="author">
		<h1>ENCODE - DECODE</h1>
	</div>
    
    

	
		<label for="metin">Özel Anahtar: (Bu anahtarı kaybetmeyiniz) </label>

        
        <div class="input-group mb-3">
  		<div class="input-group-prepend">
    		<button class="btn btn-warning" type="button" onclick="generate()"><i class="fa fa-refresh"></i></button>
  		</div>
  	<input type="text" class="form-control" id="sifre" name="sifre" onkeyup="sifre()" placeholder="" aria-label="" aria-describedby="basic-addon1" value="<?php echo randomPassword() ?>">
	</div>
        
	<div class="alert alert-danger" role="danger">
 		<button class="btn btn-danger btn-sm" data-clipboard-target="#sifrelimetin" onclick="alert('Şifreli metin kopyalandı')">Copy</button>  Şifrele
	</div>   
        
        
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="metin">Metin:</label>
				<textarea class="form-control border-danger" id="e_metin" onkeyup="encode()" rows="6"></textarea>
			</div>
		</div>
		<div class="col-md-6">
			<label for="metin">Şifrelenmiş Metin:</label>
			<div class="esifreli-metin metin-alani border-danger" id="sifrelimetin"></div><br>
            
            
		</div>
	</div>
            <div class="mt-1"></div>
            <center><button class="btn btn-info btn-sm" onclick="exchange()"><i class="fa fa-exchange"></i> Doğrula</button></center><br>
	<div class="mt-1"></div>
	<div class="alert alert-success" role="success">
 		 <button class="btn btn-success btn-sm" data-clipboard-target="#sifresizmetin" onclick="alert('Şifresiz metin kopyalandı')">Copy</button>  Şifreyi Çöz
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="metin">Şifrelenmiş Metin:</label>
				<textarea class="form-control border-success" id="d_metin" onkeyup="decode()" rows="6" ></textarea>
			</div>
		</div>
		<div class="col-md-6">
			<label for="metin">Metin:</label>
			
            <textarea class="form-control border-success"  onkeyup="decode()" rows="6" id="sifresizmetin"></textarea>
           
		</div>
	</div>

</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/clipboard@1/dist/clipboard.min.js"></script>


<script type="text/javascript">
$(document).ready(function(){
new Clipboard('.btn');
});



var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

function exchange()
{
    var sifrelimetin = $( "#sifrelimetin" ).text();	
	//alert(sifrelimetin);
	$("#d_metin").val(sifrelimetin);
decode();
//$(".dsifreli-metin").html('<center><button onclick="decode()" class="yenile2 btn btn-primary"><i class="fa fa-refresh"></i></button></center>');
}


function generate()
{

$.ajax({url: "random.php", success: function(result){
        $("#sifre").val(result);
$(".esifreli-metin").html('<center><button onclick="encode()" class="yenile1 btn btn-primary"><i class="fa fa-refresh"></i></button></center>');
	$(".dsifreli-metin").html('<center><button onclick="decode()" class="yenile2 btn btn-primary"><i class="fa fa-refresh"></i></button></center>');
    }});
decode();

}

function sifre()
{
	$(".esifreli-metin").html('<center><button onclick="encode()" class="yenile1 btn btn-primary"><i class="fa fa-refresh"></i></button></center>');
	$(".dsifreli-metin").html('<center><button onclick="decode()" class="yenile2 btn btn-primary"><i class="fa fa-refresh"></i></button></center>');
	

}

function encode()
	{
		$(".esifreli-metin").html('<div class="loading"><img src="assets/img/5.gif"></div>');
		$(".yenile2").attr("disabled",true);

		
		delay(function(){
	     
			$.post("process.php",
		    {
		        sifre: $("#sifre").val(),
		        islem: 'encode',
		        emetin: $("#e_metin").val()
		    },
		    function(data, status){
		       $(".esifreli-metin").html(data);
		       $(".yenile2").attr("disabled",false);
            	
		    });
        

	    }, 1000 );



	}

function decode()
	{
		$("#sifresizmetin").val('bekleyin...');
		$(".yenile1").attr("disabled",true);

		delay(function(){
		$.post("process.php",
		    {
		        sifre: $("#sifre").val(),
		        islem: 'decode',
		        dmetin: $("#d_metin").val()
		    },
		    function(data, status){
		      $("#sifresizmetin").val(data);
		      //$(".yenile1").attr("disabled",false);
		    });

		}, 1000 );
	}


function CopyToClipboard(containerid) {
if (document.selection) { 
    var range = document.body.createTextRange();
    range.moveToElementText(document.getElementById(containerid));
    range.select().createTextRange();
    document.execCommand("copy"); 

} else if (window.getSelection) {
    var range = document.createRange();
     range.selectNode(document.getElementById(containerid));
     window.getSelection().addRange(range);
     document.execCommand("copy");
     alert("text copied") 
}}
	

</script>
</body>
</html>
