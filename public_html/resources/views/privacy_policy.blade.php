@extends('layout.app')
@section('content')

@php
$bannerbg = Helper::bannerimg();

$settings = DB::table('settings')->first();
@endphp



    <!-- Banner -->
    
    {!! $bannerbg !!}
	
    <!-- /Banner -->


		
		    <section class="section-content">
		        <div class="container-fluid">
		            <div class="col-md-10 offset-1">
		                {!! $settings->privacy_policy !!}
<!--		            <ol>-->
<!--		                <li>Your privacy is important to us. Maintaining your trust and confidence is one of our highest priorities.</li>-->
<!--		                <li>We ensure secure transactions and strive to take reasonable care in the protection of information we receive during our rendering of services.</li>-->
<!--		                <li>The purpose of this Privacy Policy (“Privacy Policy” / “Policy “), as amended from time to time, is to give you an understanding on how we intend to collect, store, transfer, disclose, process and use the information you provide to us.</li>-->
<!--		                <li>This Privacy Policy may be subject to further changes including as may be warranted by change in law. Upon updating the Policy, we may revise the “Updated” date at the bottom of this Policy. We therefore request you to go through our Privacy Policy frequently to be updated with changes incorporated from time to time. Your continued engagement with us will imply your acceptance of such updates to this Policy.</li>-->
<!--		                <li>If you do not agree to the terms of this Privacy Policy, please do not -->
<!--		                <ul>-->
<!--		                    <li>access or use our website</li>-->
<!--		                    <li>avail of services from us, and do not disclose your information to us.</li>-->
<!--		                </ul></li>-->
<!--		                <li>By providing us your and/or your family members and/or your dependents information, you here by consent to the collection, storage, disclosure, processing and transfer of such information for the purposes as disclosed in this Policy.</li>-->
<!--		                <li>You are providing the information out of your free will.You have the option not to provide the data or Personal Information or Sensitive Personal Data or Information sought to be collected if you do not agree with this Policy.</li>-->
<!--		                <li>Collection of Information and Usage:-->
<!--		                <ul>-->
<!--		                    <li>We may collect certain Personal Information, Sensitive Personal Data or Information from you and/or your family members and/or your dependents while using our website or directly from the concerned insurer and your employer, if applicable.</li>-->
<!--		                    <li>Personal Information means any information that relates to you and/or your family members and/or your dependents and may include date of birth, employee code, email address, residential address, mobile number,	alternate telephone number, etc.</li>-->
<!--		                    <li>Further, you would be required to give us certain Sensitive Personal Data or Information about you and/or your family members and/or your dependents, Sensitive Personal Data or Information shall mean such personal</li>-->
<!--		                </ul></li>-->
<!--		                <li>Information which consists of information relating to;--->
<!--		                <ul>-->
<!--		                    <li>Financial information such as bank account or any other payment instrument details</li>-->
<!--		                    <li>Physical, physiological and mental health condition</li>-->
<!--		                    <li>Medical records and history</li>-->
<!--		                    <li>Any detail relating to the above clauses as provided to body corporate for providing service</li>-->
<!--		                    <li>Any of the information received under above clauses by body corporate for processing, stored or processed</li>-->
<!--		                </ul></li>-->
<!--		                <li>under lawful contract or otherwise:-->
<!--		                <ul>-->
<!--		                    <p>Provided that, any information that is freely available or accessible in public domain or furnished under the Right to Information Act, 2005 or any other law for the time being in force shall not be regarded as Sensitive Personal Data or Information. We inform you that our website may collect certain Personal Information and/or Sensitive Personal Data orInformation about you and/or your family members and/or your dependents such as medical and health recordsincluding but not limited to your prescription, test reports, past medical history, etc. We understand that the-->
<!--Personal Information and/or Sensitive Personal Data or Information is extremely private to you and/or your-->
<!--family members and/or your dependents and assure you that it will be used only for providing required-->
<!--healthcare services as mutually agreed to be rendered by us.-->
<!--</p>-->
<!--<p>While using our website and for availing any of our services you would be required to give us your and/or yourfamily members and/or your dependents Personal Information and/or Sensitive Personal Data or Information.</p>-->
<!--		                <p>This could be done post login on our website using the credentials given by us, which will be shared with you by email, which is unique to you and you will be required to change the password at the time of first login. Access You may be given the privilege to upload and store your and/or your family members and/or your dependents medical and health records on our website to which only you shall have access to by using your unique username. This will help you have access to all your and/or your family members and/or your dependents medical and health records. We would like to reiterate that barring you, no one shall have access to these records except to the parties as mentioned in this Privacy Policy and the same shall be transmitted by us in encrypted form to avoid being hacked and decoded.This website is not directed to children under 14. We do not knowingly collect, use or disclose personallyidentifiable information from anyone under 14 years of age. If we determine upon collection that a user is underthis age, we will not use or maintain his/her Personal Information without the parent/guardian’s consent. If we become aware that we have unknowingly collected personally identifiable information from a child under theage of 14, we will make reasonable efforts to delete such information from our records.</p>-->
<!--		               <p>Information We Collect Automatically Usage Information. Whenever you visit our website, we, as well as any third-party advertisers and/or service	providers, may use a variety of technologies that automatically or passively collect information about how the website is accessed and used (“Usage Information”). Usage Information may include browser type, device type, operating system, application version, the page served, the time, the preceding page views, and your use offeatures or applications on the website. This information helps us keep our website fresh and interesting to ourvisitors and allows us to tailor content to a visitor’s interests.</p>-->
<!--		                <p>Device Identifier. We automatically collect your IP address or other unique identifier (“Device Identifier”) for the Device (computer, mobile phone, tablet or another device) you use to access the website. A Device Identifier is a number that is assigned to your Device when you access a website or its servers, and our computers identify your Device by its Device Identifier. We may use a Device Identifier to, among other things, administer the website, help diagnose problems with our servers, analyse trends, track users’ web page movements, help	identify you and your interests, and gather broad demographic information for aggregate use.</p>-->
<!--		                <p>The technologies used on the website to collect Usage Information, including Device Identifiers, include but are not limited to: cookies (data files placed on a Device when it is used to visit the website), mobile analytics software and pixel tags (transparent graphic image, sometimes called a web beacon or tracking beacon, placed on a web page or in an email, which indicates that a page or email has been viewed). Cookies may also be used to associate you with social networking sites like LinkedIn, Facebook and Twitter and, if you so choose, enable interaction between your activities on the website and your activities on such social networking sites. </p>-->
<!--		                <p>We, or our vendors, may place cookies or similar files on your Device for security purposes, to facilitate site navigation, to perform analytics, and personalize your experience while visiting our website (such as allowing us to selectwhich ads or offers are most likely to appeal to you, based on your interests, preferences, location, or	demographic information). A pixel tag may tell your browser to get content from another server.</p>-->
<!--		                <p>To learn how you may be able to reduce the number of cookies you receive from us, or delete cookies that have already been installed in your browser’s cookie folder, or prevent tracking activities, please refer to your browser’s tools or help menu or other instructions related to your browser. Because an industry-standard Do-Not-Track protocol has not yet been established, our information collection practices on our website will continue to operate as described in this online privacy policy regardless of any “Do Not Track” signals that may be sent by certain browsers. However, you may refuse to accept cookies in order to prevent tracking activities.</p>-->
<!--		                <p>If you do disable or opt out of receiving cookies, please be aware that some features and services on our website may not work properly because we may not be able to recognize and associate you with your account(s). In addition, the offers we provide when you visit us may not be as relevant to you or tailored to your interests.</p>-->
<!--		                <p>Information We Receive from Third Parties We may receive information about you from third parties such as consumer or other reporting agencies and medical or health care providers; or through your interactions with our affiliated companies. In addition, if youare on another website and you opt-in to receive information from us, that website will submit to us your email address and other information about you so that we may contact you as requested. You may also choose toparticipate in a third party application or feature (such as one of our LinkedIn, Facebook or Twitter applications-->
<!--or a similar application or feature on a third party website) through which you allow us to collect (or the third party to share) information about you, including Usage Information and Personal Information such as lists of your friends, “likes”, comments you have shared, groups and location. Services like LinkedIn, Facebook Connect give you the option to post information about your activities on our website to your profile page to share with others within your network. In addition, we may receive information about you if other users of a third party website give us access to their profiles and you are one of their “connections” or information about you is otherwise accessible through your “connections’” web page, profile page, or similar page on a social networking-->
<!--or other third party website or interactive service. We may supplement the information we collect about you through the website with such information from third parties in order to enhance our ability to serve you, to tailor our content to you and/or to offer you opportunities to purchase products or services that we believe may be of interest to you.Purpose for which Personal Information and/or Sensitive Personal Data or Information iscollected and processed-->
<!--.</p>-->
<!--<p>We would like to state that we collect Personal Information and/or Sensitive Personal Data or Information that is absolutely necessary and relevant for us to make your experience hassle-free, convenient, smooth and most importantly, safe. This will also help us in providing you with customized services, assist you with all your queries, resolve the issues faced by you, to follow up with you in order to ensure a long, sustained relationship and mostimportantly to safeguard you from any kind of fraudulent and unlawful usage. Personal Information and/or Sensitive Personal Data or Information may be collected by us directly from you and/or your family members and/or your dependents for the purpose of providing inpatient and outpatient services. We use data collection methods / mechanisms such as “Cookies” on certain pages of the website to help analyse our web page flow and promote trust and safety. “Cookies” are small files placed on your hard drive that assist us in providing our services. We offer certain features that are only available through the use of “Cookies”. We also use “Cookies” to allow you to enter your password less frequently during a session. Most “Cookies” are “Session Cookies”, meaning that they are automatically deleted from your hard drive at the end of a session. You are free to decline our “Cookies” if your browser permits you to do so although we recommend strongly that you allow them tensure you have access to all of our services.</p>-->
<!--		                <p>Data Storage:-->
<!--		                <ul>-->
<!--		                    <li>All your Personal Information and/or Sensitive Personal Data or Information is hosted and/or processed by us at the Company’s data centers located at our registered office situated at Bangalore, India or at such location(s) in India as the Company may so desire to store.</li>-->
<!--		                <li>Your and/or your family members and/or your dependents’ Personal Information and/or Sensitive Personal Data or Information is retained by us only for the purpose of providing the required services or for historical or statistical or legal purposes and such retention shall be for a period as required under applicable law.</li>-->
<!--		                </ul></p>-->
<!--		                <p>Transfer / Sharing of Information:-->
<!--		                <ul>-->
<!--		                    <li>We respect your privacy and hereby declare we do not transfer and / or disclose your and/or your family members and/or your dependents’ Personal Information and/or Sensitive Personal Data or Information exceptas under:-->
<!--		                    <ul>-->
<!--		                        <Li>To law enforcement agencies in connection with an investigation having the interest of general public at large, after having been approved by the due process of law.</Li>-->
<!--		                        <li>To our associates and affiliates to help detect and prevent fraud, identity theft and other illegal activities,correlate related or multiple accounts to prevent abuse of our services; and to facilitate joint or co-branded services that you request where such services are provided by more than one corporate entity.</li>-->
<!--		                        <li>To our full-time employees and associates on a need to know basis for the purpose of enabling the Company to provide the necessary services to you.</li>-->
<!--		                        <li> With our empanelled healthcare providers on a need to know basis for the purpose of enabling the Company to provide the necessary services to you.</li>-->
<!--		                        <li>We shall also share such information with our associates or affiliates should the Company decide to undergo  restructuring in anyway or is acquired by any other entity and ensure that in such an event the other entity continues to follow this policy strictly; With your employer or its authorized representatives, if applicable, and on receipt of a formal request from your employer and upon receipt of necessary approval(s).</li>-->
<!--		                    </ul></li>-->
<!--		                </ul></p>-->
<!--		                <p>Safety Precautions:-->
<!--		                <ul>-->
<!--		                    <li>We respect your privacy and hereby declare we do not transfer and / or disclose your and/or your family members and/or your dependents’ Personal Information and/or Sensitive Personal Data or Information except as under:-->
<!--		                    <ul>-->
<!--		                        <li>To law enforcement agencies in connection with an investigation having the interest of general public at large, after having been approved by the due process of law; To our associates and affiliates to help detect and prevent fraud, identity theft and other illegal activities, correlate related or multiple accounts to prevent</li>-->
<!--		                        <li>Abuse of our services; and to facilitate joint or co-branded services that you request where such services are provided by more than one corporate entity; To our full time employees and associates on a need to know basis for the purpose of enabling the Company to provide the necessary services to you; With our empanelled</li>-->
<!--		                        <li>Healthcare providers on a need to know basis for the purpose of enabling the Company to provide the necessary services to you; We shall also share such information with our associates or affiliates should the Company decide to undergo restructuring in anyway or is acquired by any other entity and ensure that in such an event the other entity continues to follow this policy strictly; With your employer or its authorized representatives, if applicable, and on receipt of a formal request from your employer and upon receipt of necessary approval(s).</li>-->
<!--		                        <li>We never sell your personal information including your Sensitive Personal Data or Information.Consent By using our website and providing your and/or your family members and/or your dependents’ Personal Information and/or Sensitive Personal Data or Information, you hereby consent to the collection, storage, disclosure, transfer, processing and usage of your and/or your family members and/or your dependents.</li>-->
<!--		                        <li>Personal Information and/or Sensitive Personal Data or Information by us as per the terms of this Privacy Policy.Kindly frequent this section to keep yourself updated of any changes made by us in the Privacy Policy.You hereby confirm to the Company that you have taken necessary consent from your family members and/oryour dependents for submission of their Personal Information and/or Sensitive Personal Data or Information with us.</li>-->
<!--		                    </ul></li>-->
<!--		                </ul></p>-->
<!--		                <P>Request to Know:-->
<!--		                </br>You may request and, subject to certain exemptions, we will provide:-->
<!--		                <ul>-->
<!--		                    <li>The categories of personal information we collect about you.</li>-->
<!--		                    <li>The categories of sources of the personal information we collect about you.</li>-->
<!--		                    <li>Our business or commercial purpose for collecting your personal information.</li>-->
<!--		                    <li>The categories of personal information we disclose about you.</li>-->
<!--		                    <li>The specific pieces of personal information we collect about you.</li>-->
<!--		                </ul></P>-->
<!--		                <p>Request to Delete:-->
<!--		                <ul>-->
<!--		                    <li>You may request that we delete the personal information we have collected about you. Subject to exemptions, such as a need to retain the information to service products you have purchased from us or as stated in this Privacy Policy, or such as requirements under federal or state law, we will delete the personal information we have collected from you.</li>-->
<!--		                    <li>Your Privacy Rights, Choice and Access You control the Personal Information that you provide to us on the website, but some Personal Information is required by us in order for you to obtain services from us or for you to use the website. If you choose not to provide us with your Personal Information on the Website, you may not be able to take advantage of some of he services we offer or use some functionality on the website. Except as provided above, we will not share</li>-->
<!--		                    <li>Personal Information collected on the website with third parties without your consent. You may also direct us to stop sending you promotional emails by following the removal instructions in a communication you receive from us. Your opt-out request will be processed within 10 business days of the date on which we receive it.</li>-->
<!--		                    <li>If you wish to modify, verify, correct or delete any of your Personal Information collected through the website,you may edit your registered user information or contact us at support@safewaytpa.in In accordance with our routine record keeping, we may delete certain records that contain Personal Information you have submitted through the website. We are under no obligation to store such Personal Information indefinitely and disclaim any liability arising out of, or related to, the destruction of such Personal Information.</li>-->
<!--		                    <li>It may not always be possible to completely remove or delete all of your information from our databases without some residual data because of backups and other reasons. We will retain your information (including geo-location data) for as long as your account is active or as needed to provide you services. If you wish to cancel your online account or request that we no longer use your information to provide you services through the website, you may contact us, we will retain and use your information as necessary to comply with our legal obligations, resolve disputes, comply with our internal compliance and record retention policies, enforce our agreements, carry out legitimate business functions, and for any other purpose permitted by law. We do not control certain privacy settings and preferences maintained by our social media partners like LinkedIn, Facebook and Twitter. If you wish to make changes to those settings and preferences, you may do so by visiting the settings page of the appropriate social media site.</li>-->
<!--		                </ul></p>-->
<!--		                <p>Right to opt out:-->
<!--		                <ul>-->
<!--		                    <li>The Company respects your privacy considerations and hence provides an option to you, to not provide the Personal Information and/or Sensitive Personal Data or Information sought to be collected. Further, you can also withdraw your consent which was earlier given to the Company, and the same must be communicated to the Company in writing. However, we inform you that on your electing to opt out (as envisaged in this section) or on withdrawal of your consent, the Company may not be in a position to provide you necessary services /benefits for which the Personal Information and/or Sensitive Personal Data or Information was sought to be collected.</li>-->
<!--		                    <li>Further, you will have the option to not provide your consent, or withdraw any consent given earlier, provided that the decision to not provide consent / withdrawal of the consent is communicated to us at surender@rakshatpa.com</li>-->
<!--		                    <li>If you have any reason to believe that we or any company associated with us has misused any of your and/or your family members and/or your dependents Personal Information and/or Sensitive Personal Data or Information please contact us immediately and report such misuse.</li>-->
<!--		                    <li>We can address any questions, comments and concerns about our online privacy practices and policy. Please write to our Compliance Officer at the above-mentioned email address.</li>-->
<!--		                </ul></p>-->
<!--		                <p>Governing rules and law:-->
<!--		                <ul>-->
<!--		                    <Li>If you choose to visit our website, your visit and any dispute over privacy is subject to this Privacy Policy. In addition to the foregoing, any disputes arising under this Privacy Policy shall be governed by the laws of India.</Li>-->
<!--		                    <li>This Privacy Policy is compliant with the provisions of The Information Technology Act, 2000 and Rules made there under including any modifications or amendments made thereto. </li>-->
<!--		                    <li>The Company may made necessary changes to this Privacy Policy consequent upon any changes or modification in the law. It is hence imperative that you frequently read this Privacy Policy to keep yourself updated of any changes made by us.</li>-->
<!--		                </ul></p>-->
<!--		                </ul></li>-->
		                
<!--		            </ol>-->
		            </div>
		        </div>
		</section>
	


@endsection
