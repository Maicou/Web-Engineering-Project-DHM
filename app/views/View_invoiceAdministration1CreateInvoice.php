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
        <title>Rechnungsverwaltung</title>
        
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
                $("#jQueryCheck").validate({
                    rules: {
                        expense_description: {
                            required: false,
                            minlength: 2,
                        },
                        expense_received: {
                            required: true,
                        },
                        payment_date: {
                            required: true,
                        },
                        expensetypes: {
                            required: true,
                        },
                        Betrag: {
                            required: true,
                            maxlength: 50,
                        },
                        agree: "required"
                    },
                    messages: {
                        expense_description: {
                            required: "Bitte eine Rechnungs-Beschreibung angeben",
                            minlength: "Die Rechnungs-Beschreibung muss aus mindestens 2 Zeichen bestehen",
                            maxlength: "Die Rechnungs-Beschreibung darf nicht mehr wie 45 Zeichen enhalten"
                        },
                        expense_received: {
                            required: "Bitte Eingangsdatum angeben",
                        },
                        payment_date: {
                            required: "Bitte Datum der F&auml;lligkeit angeben",
                        },
                        expensetypes: {
                            required: "Bitte einen Rechnungstyp auswählen",
                        },
                        Betrag: {
                            maxlength: "Der Betrag darf 50 Stellen nicht überschreiten",
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
            include 'html/headerInvoiceAdministration.inc.php';
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
                <h2> Anton-Leo-Gebäude: Rechnung hinzufügen </h2>

                <!--             include '../html/content_createTenant.php';-->
                <form id="jQueryCheck" action="InvoiceAdministration/writeInvoiceHouse1" method="post">
                    <table border="0" cellspacing="2" cellpadding="2">
                        <tbody>
                      <!--    <tr>
                            <td align="right">Anrede:</td>
                            <td>
                              <select name="gender">
                                <option value="default">Bitte wählen</option>
                                <option value="male">Herr</option>
                                <option value="fimale">Frau</option>
                              </select>
                            </td>-->
                            </tr>
                            <tr>
                                <td align="right">Bezeichnung:*</td>
                                <td>
                                    <input maxlength="50" placeholder="Unternehmen & Rechnungsbeschreibung" name="expense_description" size="45" type="text" />
                                </td>
                            </tr>
                            <tr>
                                <td align="right">Eingangsdatum:*</td>
                                <td>
                                    <input maxlength="50" name="expense_received" size="45" type="date" />
                                </td>
                            </tr>
                            <tr>
                                <td align="right">Zahlungsdatum:*</td>
                                <td>
                                    <input maxlength="50" name="payment_date" size="45" type="date" />
                                </td>
                            </tr>
                            <tr>
                                <td align="right">Rechnungstyp:*</td>
                                <td>
                                    <select name="expensetypes">
                                         <option value="0" hidden>Bitte auswählen</option>
                                        <option value="1">Reperaturrechung</option>
                                        <option value="2">Ölrechnung</option>
                                        <option value="3">Wasserrechnung</option>
                                        <option value="4">Stromrechnung</option>
                                        <option value="5">Hauswartsrechung</option>
                                        <option value="6">Mieter: Kautionrückzahlung</option>
                                        <option value="7">anderes</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">Betrag:*</td>
                                <td>
                                    <input maxlength="50" name="amount" size="45" type="number" />
                                </td>
                            </tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Speichern" class="actionbutton"/>
                        </td>
                        </tbody>
                    </table>
                </form>

