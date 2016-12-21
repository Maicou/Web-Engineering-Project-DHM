
<html>
    <head>
        <base href="https://localhost/Web-Engineering-Project-DHM/" />
        <link rel="stylesheet" type="text/css" href="styles/masterLayout.css" />
        <!--Head Information and meta-->
        <title>Login</title>
        
        <!--<link rel='stylesheet' href='libs/scripts/jquery-validation-1.15.0/demo/css/screen.css' type='text/css' /> -->
        <script src="libs/scripts/jquery-2.2.1.min.js"></script>
        <script src="libs/scripts/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
        <script>    
            $.validator.setDefaults({
                submitHandler: function () {
                    return true; // braucht man nicht zwingend, wenn validierung korrekt ist es okay
                }
            });
            $.validator.methods.email = function (value, element) {
                return this.optional(element) || /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value);
            };
            $().ready(function () {
                // validate signup form on keyup and submit
                $("#jQueryCheck").validate({
                    rules: {
                        email: {
                            required: true,
                            minlength: 2,
                            email: true
                        },
                        user: {
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
                        email: {
                            required: "Bitte geben Sie eine Email-Adresse an",
                            minlength: "Die Email-Adresse muss aus mehr als 2 Zeichen bestehen",
                            email: "Bitte geben Sie eine gültige Email-Adresse an"
                        },
                        user: {
                            required: "Bite geben Sie eine Email-Adresse/User-Namen an",
                            minlength: "Die Eingabe muss aus mehr wie 2 Zeichen bestehen"
                        },
                        password: {
                            required: "Bitte geben Sie ein Passwort an"
                        },
                        text1: "Please enter a valid email address",
                        agree: "Please accept our policy"
                    }
                });
                // validate signup form on keyup and submit
                $("#jQueryCheck2").validate({
                    rules: {
                        email: {
                            required: true,
                            minlength: 2,
                            email: true

                        },
                        user: {
                            required: true,
                            minlength: 2,
                            email: true

                        },
                        agree: "required"
                    },
                    messages: {
                        email: {
                            required: "Bitte geben Sie eine Email-Adresse an",
                            minlength: "Die Email-Adresse muss aus mehr als 2 Zeichen bestehen",
                            email: "Bitte geben Sie eine gültige Email-Adresse an"
                        },
                        user: {
                            required: "Bite geben Sie eine Email-Adresse/User-Namen an",
                            minlength: "Die Eingabe muss aus mehr wie 2 Zeichen bestehen"
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
                    newsletter.click(function () {
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
            include 'html/menubarTOP.inc.php';
            ?>
        </section>
        <h1 style="text-align: left; margin-left: 20px">Login</h1>
        <nav class="nav0"> 
            <form id="jQueryCheck" action="Login/valideUser" method="post">

                <!--Cookies for email AND pw-->

                <input type ="email" name ="email" style="margin-bottom: 20px" value="<?php
                if (isset($_COOKIE['mail'])) {
                    echo $_COOKIE['mail'];
                }
                ?>"> E-Mail<br/>
                <input type ="password" name ="password" style="margin-bottom: 20px" value="<?php
                if (isset($_COOKIE['passw'])) {
                    echo $_COOKIE['passw'];
                }
                ?>"> Passwort<br/>
                <input type ="submit" class="login" value="Einloggen">  
                <input type ="reset" class="logout" value="Reset"> <br/>
            </form>
            <form id="jQueryCheck2" method="post" action="Login/refresher">

                <input type="email" name="user" style="margin-bottom: 20px"> E-Mail
                <input type="submit" class="login" value="Passwort vergessen" style="margin-bottom: 20px"/>
            </form>
        </nav>    
    </body>



