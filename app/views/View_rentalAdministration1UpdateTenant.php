<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
@author Marco Mancuso, Raphael Denz, David Hall
-->
<html>
    <head>

        <base href= "https://localhost/Web-Engineering-Project-DHM/"/>
        <link rel="stylesheet" type="text/css" href="styles/masterLayout.css" />
        <!--Head Information and meta-->
        <?php
        include 'html/headArea.inc.php';
        ?>
        <title>Mietverwaltung</title>
        
        <link rel='stylesheet' href='libs/scripts/jquery-validation-1.15.0/demo/css/screen.css' type='text/css' /> 
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
                $("#jQueryCheckRental").validate({
                    rules: {
                        forename: {
                            required: true,
                            minlenght: 2,
                            maxlenght: 50,
                        },
                        street: {
                            required: true,
                            maxlenght: 50,
                        },
                        city: {
                            required: true,
                            maxlenght: 50,
                        },
                        postalcode: {
                            required: true,
                            maxlenght: 50,
                        },
                        contract_start: {
                            required: true,
                            maxlenght: 50,
                        },
                        rentalIncome: {
                            required: true,
                            maxlenght: 50,
                        },
                        excludingIncome: {
                            required: true,
                            maxlenght: 50,
                        },
                        bond: {
                            required: true,
                            maxlenght: 50,
                        },
                        agree: "required"
                    },
                    messages: {
                        forename: {
                            required: "Bitte geben Sie einen Vornamen oder einen Firmennamen ein.",
                            minlenght: "Der Name muss aus mindestens 2 Zeichen bestehen",
                            maxlenght: "Der Name darf maximal aus 50 Zeichen bestehen"
                        },
                        street: {
                            required: "Bitte Strassennamen mit Hausnummer angeben",
                            minlength: "Das Feld muss mindestens 2 Zeichen beinhalten",
                            maxlenght: "Das Feld darf maximal 50 Zeichen enthalten",
                        },
                        city: {
                            required: "Bitte Stadt angeben",
                            minlenght: "Das Feld muss mindestens 2 Zeichen beinhalten",
                            maxlenght: "Das Feld darf maximal 50 Zeichen enthalten",
                        },
                        postalcode: {
                            required: "Bitte Postleitzahl angeben",
                            minlenght: "Das Feld muss mindestens 2 Zeichen beinhalten",
                            maxlenght: "Das Feld darf maximal 50 Zeichen enthalten",
                        },
                        contract_start: {
                            required: "Bitte Mietvertragsbeginn angeben",
                            minlenght: "Das Feld muss mindestens 2 Zeichen beinhalten",
                            maxlenght: "Das Feld darf maximal 50 Zeichen enthalten",
                        },
                        rentalIncome: {
                            required: "Bitte Mieteinahmen angeben",
                            minlenght: "Das Feld muss mindestens 2 Zeichen beinhalten",
                            maxlenght: "Das Feld darf maximal 50 Zeichen enthalten",
                        },
                        excludingIncome: {
                            required: "Bitte Nebenkosten (für den Mieter) angeben",
                            minlenght: "Das Feld muss mindestens 2 Zeichen beinhalten",
                            maxlenght: "Das Feld darf maximal 50 Zeichen enthalten",
                        },
                        bond: {
                            required: "Bitte höhe der Kaution angeben",
                            minlenght: "Das Feld muss mindestens 2 Zeichen beinhalten",
                            maxlenght: "Das Feld darf maximal 50 Zeichen enthalten",
                        },
                        text1: "Please enter a valid email address",
                        agree: "Please accept our policy"
                    }
                });
                // validate signup form on keyup and submit
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
        <header id="header" class="header">
            <!--Header-->
            <?php
            include 'html/headerRentalAdministration.inc.php';
            ?>
        </header>  
        <nav class="nav1">           
            <!--form and logout etc-->
            <?php
            include 'html/formList.inc.php';
            ?> 
        </nav>
        <section id="main">
            <nav class="nav3">
                <section id="mainMenu"> 
                    <!--the main menu-->
                    <?php
                    include 'html/mainMenu.inc.php';
                    ?> 
                </section>

            </nav>
            <div class="content">  
                <h2> Anton-Leo Haus: Mieter bearbeiten</h2>



                <!--include '../html/content_createTenant.php';-->
                <!--                <form action="../public/RentalAdministration/createTenantHouse1" method="post">
                                    <table border="0" cellspacing="2" cellpadding="2">
                                        <tbody>
                -->
