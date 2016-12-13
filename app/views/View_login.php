
<html>
    <head>
        <base href="https://localhost/Web-Engineering-Project-DHM/public/" />
        <link rel="stylesheet" type="text/css" href="../public/styles/masterLayout.css" />
        <!--Head Information and meta-->

        <title>Login</title>
        
        <link rel='stylesheet' href='../libs/scripts/jquery-validation-1.15.0/demo/css/screen.css' type='text/css' /> 
        <script src="../libs/scripts/jquery-2.2.1.min.js"></script>
        <script src="../libs/scripts/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
        <script>
	$.validator.setDefaults({
		submitHandler: function() {
			alert("submitted!"); // braucht man nicht zwingend, wenn validierung korrekt ist es okay
		}
	});
        
        $.validator.methods.email = function( value, element ) {
        return this.optional( element ) || /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test( value );
        };

	$().ready(function() {
		// validate signup form on keyup and submit
		$("#jQueryCheck").validate({
			rules: {
				emailCheck: {
					required: true,
					minlength: 2,
                                        email: true
                                        
				},
                                password: {
					required: true,
                                        
				},
				agree: "required"
			},
			messages: {
				emailcheck: {
					required: "Please enter a email",
					minlength: "Your username must consist of at least 2 characters"
				},
                                password: {
					required: "Please enter a password"
				},
				text1: "Please enter a valid email address",
				agree: "Please accept our policy"
			}
		});
                
                // validate signup form on keyup and submit
		$("#jQueryCheck2").validate({
			rules: {
				emailCheck: {
					required: true,
					minlength: 2,
                                        email: true
                                        
				},
				agree: "required"
			},
			messages: {
				emailcheck: {
					required: "Please enter a email",
					minlength: "Your username must consist of at least 2 characters"
				},
				text1: "Please enter a valid email address",
				agree: "Please accept our policy"
			}
		});

		//code to hide topic selection, disable for demo
		var newsletter = $("#newsletter");
		// newsletter topics are optional, hide at first
		var inital = newsletter.is(":checked");
		var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
		var topicInputs = topics.find("input").attr("disabled", !inital);
		// show when newsletter is checked
		newsletter.click(function() {
			topics[this.checked ? "removeClass" : "addClass"]("gray");
			topicInputs.attr("disabled", !this.checked);
		});
	});

</script>
        
    </head>

    

    <body>
     
        <section id="menubar">
            <!--Top menu button bar-->
            <?php
            include '../html/menubarTOP.inc.php';
            ?>
        </section>
           <h1 style="text-align: left; margin-left: 20px">Login</h1>
        <nav class="nav0"> 
            <form id="jQueryCheck" action="../public/Login/valideUser" method="post">
                <input type ="email" name ="emailCheck" style="margin-bottom: 20px"> E-Mail<br/>
                <input type ="password" name ="password" style="margin-bottom: 20px"> Passwort<br/>
                <input type ="submit" class="login" value="Einloggen">  
                <input type ="reset" class="interrupt" value="Reset"> <br/>
            </form>
            <form id="jQueryCheck2" method="post" action="../public/Login/refresher">
                
                <input type="email" name="emailCheck" style="margin-bottom: 20px"> E-Mail
                <input type="submit" class="login" value="Passwort vergessen" style="margin-bottom: 20px"/>
            </form>
<!--            <button onclick="window.location.href = '../public/Login/refresher'">Passwort vergessen</button> -->
        </nav>    

    </body>



