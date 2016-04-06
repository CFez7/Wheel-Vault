<?php include_once("../includes/header.php"); ?>
<body class="ibg"> <!-- gives this body class ibg (to stop background slideshow) -->

        <div class="container">
            <!-- show navigation bar found at nav.php -->
            <div class="head">
                <?php include '../includes/nav.php'; ?>
            </div>
            <div class="log"> 
                
                <!-- If session username is set, display welcome, logout. If not show log in. -->
                <p class="sessionMessage">                 
                    <?php if(isset($_SESSION["message"])) {
                        echo ucfirst($_SESSION["message"]);}
                    ?>
                </p>
                <?php if(isset($_SESSION["name"])) { ?>
                    <?php include '../includes/logged-in-nav.php'; ?>
                <?php } else { ?>
                        <?php include '../includes/login-nav.php'; ?>
                <?php } ?>
            </div>
            
            <div class="box-background" style="background-color:black">
                
                <h1 style="margin:0; text-align:center">Privacy Policy!</h1>
                
                <p>
        
<strong>SECTION 1 - WHAT DO WE DO WITH YOUR INFORMATION?</strong><br><br>

When you purchase something from our store, as part of the buying and selling process, we collect the personal information you give us such as your name, address and email address.<br><br>

When you browse our store, we also automatically receive your computer’s internet protocol (IP) address in order to provide us with information that helps us learn about your browser and operating system.<br><br>

Email marketing (if applicable): With your permission, we may send you emails about our store, new products and other updates.<br><br>


<strong>SECTION 2 - CONSENT</strong><br><br>

How do you get my consent?<br><br>

When you provide us with personal information to complete a transaction, verify your credit card, place an order, arrange for a delivery or return a purchase, we imply that you consent to our collecting it and using it for that specific reason only.<br><br>

If we ask for your personal information for a secondary reason, like marketing, we will either ask you directly for your expressed consent, or provide you with an opportunity to say no.<br><br>


How do I withdraw my consent?<br><br>

If after you opt-in, you change your mind, you may withdraw your consent for us to contact you, for the continued collection, use or disclosure of your information, at anytime, by contacting us at connorferry8@me.com or mailing us at: Wheel Vault Little Vachery, Rudgwick, WSX, rh12 3ae, United Kingdom<br><br>


<strong>SECTION 3 - DISCLOSURE</strong><br><br>

We may disclose your personal information if we are required by law to do so or if you violate our Terms of Service.<br><br>


<strong>SECTION 5 - THIRD-PARTY SERVICES</strong><br><br>


In general, the third-party providers used by us will only collect, use and disclose your information to the extent necessary to allow them to perform the services they provide to us.<br><br>

However, certain third-party service providers, such as payment gateways and other payment transaction processors, have their own privacy policies in respect to the information we are required to provide to them for your purchase-related transactions.<br><br>

For these providers, we recommend that you read their privacy policies so you can understand the manner in which your personal information will be handled by these providers.<br><br>

In particular, remember that certain providers may be located in or have facilities that are located a different jurisdiction than either you or us. So if you elect to proceed with a transaction that involves the services of a third-party service provider, then your information may become subject to the laws of the jurisdiction(s) in which that service provider or its facilities are located.<br><br>

As an example, if you are located in Canada and your transaction is processed by a payment gateway located in the United States, then your personal information used in completing that transaction may be subject to disclosure under United States legislation, including the Patriot Act.<br><br>

Once you leave our store’s website or are redirected to a third-party website or application, you are no longer governed by this Privacy Policy or our website’s Terms of Service.<br><br>


Links<br><br>

When you click on links on our store, they may direct you away from our site. We are not responsible for the privacy practices of other sites and encourage you to read their privacy statements.<br><br>


<strong>SECTION 6 - SECURITY</strong><br><br>

To protect your personal information, we take reasonable precautions and follow industry best practices to make sure it is not inappropriately lost, misused, accessed, disclosed, altered or destroyed.<br><br>

If you provide us with your credit card information, the information is encrypted using secure socket layer technology (SSL) and stored with a AES-256 encryption.  Although no method of transmission over the Internet or electronic storage is 100% secure, we follow all PCI-DSS requirements and implement additional generally accepted industry standards.<br><br>


<strong>COOKIES</strong><br><br>

Here is a list of cookies that we use. We’ve listed them here so you that you can choose if you want to opt-out of cookies or not.<br><br>

_session_id, unique token, sessional, Allows Shopify to store information about your session (referrer, landing page, etc).<br><br>

<strong>SECTION 7 - AGE OF CONSENT</strong><br><br>

By using this site, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.<br><br>


<strong>SECTION 8 - CHANGES TO THIS PRIVACY POLICY</strong><br><br>

We reserve the right to modify this privacy policy at any time, so please review it frequently. Changes and clarifications will take effect immediately upon their posting on the website. If we make material changes to this policy, we will notify you here that it has been updated, so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we use and/or disclose it.<br><br>

If our store is acquired or merged with another company, your information may be transferred to the new owners so that we may continue to sell products to you.<br><br>


<strong>QUESTIONS AND CONTACT INFORMATION</strong><br><br>

If you would like to: access, correct, amend or delete any personal information we have about you, register a complaint, or simply want more information contact our Privacy Compliance Officer at connorferry8@me.com or by mail at Wheel Vault<br><br>

[Re: Privacy Compliance Officer]<br><br>

[Little Vachery, Rudgwick, WSX, rh12 3ae, United Kingdom]<br><br>

----

                </p>
                
            </div>
            
        </div>
    
        <?php
            include_once("../includes/footer.php"); 
        ?>