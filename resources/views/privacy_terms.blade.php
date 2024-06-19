<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Community</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/assets/css/style.css">
  <script src="/assets/js/index.js"></script>
  <style>
      /* Gaya CSS tambahan */
.nav-item:hover .nav-link {
text-decoration: underline;
}

.profile-info {
display: none;
position: absolute;
top: 40px;
right: 0;
background-color: #fff;
border: 1px solid #ccc;
padding: 10px;
box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
z-index: 1;
}

.nav-item .profile:hover .profile-info {
display: block;
}

.profile-info a {
text-decoration: none;
color: #333;
display: block;
}

.profile-info a:hover {
text-decoration: underline;
}
.profile-info p {
margin: 5px 0;
color: #333;
}

.icon.user.outline {
color: black;
}

.hidden {
display: none;
}

.navbar-bawah .nav-item .nav-link.active {
    text-decoration: underline; 
    color: #13005A !important; 
}

.hero-section {
  background-image: url('{{asset('/assets/img/comunity_new_banner.png')}}');
  background-size: cover;
  height: 30vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  color: white;
  text-align: center;
  margin-top: 60px; /* Tambahkan margin atas */
}

        #footer {
            background-color: #015AAA;
            padding: 2rem 0;
        }
        #footer .footer-col {
            margin-bottom: 1rem;
        }
        #footer .footer-col h6 {
            font-weight: bold;
        }
        #footer .footer-col ul {
            list-style: none;
            padding: 0;
        }
        #footer .footer-col ul li {
            margin-bottom: 0.5rem;
        }
        #footer .social-icons i {
            font-size: 1.5rem;
            margin-right: 0.5rem;
            color: white;
        }
        #footer .app-buttons img {
            height: 40px;
            margin-right: 0.5rem;
        }
        #footer a {
            color: white;
            text-decoration: none;
        }
        #footer a:hover {
          color: yellow;
          text-decoration: underline;
      }
        #footer .footer-bottom {
            border-top: 1px solid #dee2e6;
            padding-top: 1rem;
            margin-top: 1rem;
            text-align: center;
        }
        #footer .footer-logo {
            max-width: 200px;
            height: auto;
        }

  </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-light bg-light fixed-top mb-4">
            <div class="container d-flex justify-content-center"> 
                <a class="navbar-brand" href="#">
                    <img src="{{asset('/assets/img/Thrivian Logo_OK.png')}}" alt="" width="50" height="50" style="display: block; margin: 0 auto;">
                </a>
            </div>
        </nav>
    </header>

<!-- Tampilan untuk banner utama -->
<section class="hero-section">
    <h1 class="fw-bold">Privacy & Policy</h1>
    <p>Last updated June 13th, 2024</p>
  </section>

            
  <main class="container">
    <div class="mx-auto">
        <div style="padding-inline: 5%;">
        <h1 class="fw-bold mt-5" style="color: #015AAA;">Your Privacy Matters</h1>
        <p class="mb-4">Thrivian mission is to connect the world’s professionals to allow them to be more productive and successful. Central to this mission is our commitment to be transparent about the data we collect about you, how it is used and with whom it is shared.</p>
        <p>This Privacy Policy applies when you use our Services. We offer our users choices about the data we collect, use and share as described in this Privacy Policy, Cookie Policy, Settings and our Help Center.</p>
        </div>
    </div>

    <div class="mx-auto">
        <div style="padding-inline: 5%;">
        <h1 class="fw-bold mt-5" style="color: #015AAA;">Introduction</h1>
        <p class="mb-4">We are a social network and online platform for professionals. People use our Services to find and be found for business opportunities, to connect with others and find information. Our Privacy Policy applies to any Member or Visitor to our Services.</p>
        <p>Our registered users (“Members”) share their professional identities, engage with their network, exchange knowledge and professional insights, post and view relevant content, learn and develop skills, and find business and career opportunities. Content and data on some of our Services is viewable to non-members (“Visitors”).</p>
        </div>
    </div>

    <div class="mx-auto">
        <div style="padding-inline: 5%;">
        <h1 class="fw-bold mt-5" style="color: #015AAA;">Services</h1>
        <p class="mb-5">This Privacy Policy applies to Thrivian.org, Thrivian Community, Thrivian Event, Thrivian E-Learning, and other Thrivian-related sites, apps, communications and services (“Services”), including off-site Services, such as our ad services and the “Apply with Thrivian” and “Share with Thrivian” plugins, but excluding services that state that they are offered under a different privacy policy.</p>
        </div>
    </div>
    <hr class="mb-5" style="height: 3px;">

    <div class="mx-auto">
        <div style="padding-inline: 5%;">
        <h1 class="fw-bold mt-5" style="color: #015AAA;">1. Data We Collect</h1>
        <h2 class="fw-bold mt-5" style="color: #015AAA;">1.1 Data You Provide To Us</h2>
        <h3 class="py-3">Registration</h3>
        <p class="mb-4">To create an account you need to provide data including your name, email address and/or mobile number, general location (e.g., city), and a password. If you register for a premium Service, you will need to provide payment (e.g., credit card) and billing information.</p>
        <h3 class="py-3">Profile</h3>
        <p class="mb-4">You have choices about the information on your profile, such as your education, work experience, skills, photo, city or area and endorsements. You don’t have to provide additional information on your profile; however, profile information helps you to get more from our Services, including helping recruiters and business opportunities find you. It’s your choice whether to include sensitive information on your profile and to make that sensitive information public. Please do not post or add personal data to your profile that you would not want to be publicly available.</p>
        <h3 class="py-3">Posting and Uploading</h3>
        <p class="mb-4">We collect personal data from you when you provide, post or upload it to our Services, such as when you fill out a form, (e.g., with demographic data or salary), respond to a survey, or submit a resume or fill out a job application on our Services. If you opt to import your address book, we receive your contacts (including contact information your service provider(s) or app automatically added to your address book when you communicated with addresses or numbers not already in your list).</p>
        <p class="mb-4">If you sync your contacts or calendars with our Services, we will collect your address book and calendar meeting information to keep growing your network by suggesting connections for you and others, and by providing information about events, e.g. times, places, attendees and contacts.</p>
        <p class="mb-4">You don’t have to post or upload personal data; though if you don’t, it may limit your ability to grow and engage with your network over our Services.</p>
        </div>
    </div>

    <div class="mx-auto">
        <div style="padding-inline: 5%;">
        <h2 class="fw-bold mt-5" style="color: #015AAA;">1.2 Data From Others</h2>
        <h3 class="py-3">Content and News</h3>
        <p class="mb-4">You and others may post content that includes information about you (as part of articles, posts, comments, videos) on our Services. We also may collect public information about you, such as professional-related news and accomplishments, and make it available as part of our Services, including, as permitted by your settings, in notifications to others of mentions in the news.</p>
        <h3 class="py-3">Contact and Calendar Information</h3>
        <p class="mb-4">We receive personal data (including contact information) about you when others import or sync their contacts or calendar with our Services, associate their contacts with Member profiles, scan and upload business cards, or send messages using our Services (including invites or connection requests). If you or others opt-in to sync email accounts with our Services, we will also collect “email header” information that we can associate with Member profiles.</p>
        <h3 class="py-3">Partners</h3>
        <p class="mb-4">We receive personal data (e.g., your job title and work email address) about you when you use the services of our customers and partners, such as employers or prospective employers and applicant tracking systems providing us job application data.</p>
        </div>
    </div>

    <div class="mx-auto">
        <div style="padding-inline: 5%;">
        <h2 class="fw-bold mt-5" style="color: #015AAA;">1.3 Service Use</h2>
        <p class="mb-4">We log usage data when you visit or otherwise use our Services, including our sites, app and platform technology, such as when you view or click on content (e.g., learning video) or ads (on or off our sites and apps), perform a search, install or update one of our mobile apps, share articles or apply for jobs. We use log-ins, cookies, device information and internet protocol (“IP”) addresses to identify you and log your use.</p>
        </div>
    </div>

    <div class="mx-auto">
        <div style="padding-inline: 5%;">
        <h2 class="fw-bold mt-5" style="color: #015AAA;">1.4 Cookies and Similar Technologies</h2>
        <p class="mb-4">As further described in our Cookie Policy, we use cookies and similar technologies (e.g., pixels and ad tags) to collect data (e.g., device IDs) to recognize you and your device(s) on, off and across different services and devices where you have engaged with our Services. We also allow some others to use cookies as described in our Cookie Policy. If you are outside the Designated Countries, we also collect (or rely on others who collect) information about your device where you have not engaged with our Services (e.g., ad ID, IP address, operating system and browser information) so we can provide our Members with relevant ads and better understand their effectiveness.</p>
        </div>
    </div>

    <div class="mx-auto">
        <div style="padding-inline: 5%;">
        <h2 class="fw-bold mt-5" style="color: #015AAA;">1.5 Your Device and Location</h2>
        <p class="mb-4">When you visit or leave our Services (including some plugins and our cookies or similar technology on the sites of others), we receive the URL of both the site you came from and the one you go to and the time of your visit. We also get information about your network and device (e.g., IP address, proxy server, operating system, web browser and add-ons, device identifier and features, cookie IDs and/or ISP, or your mobile carrier). If you use our Services from a mobile device, that device will send us data about your location based on your phone settings. We will ask you to opt-in before we use GPS or other tools to identify your precise location.</p>
        </div>
    </div>

    <div class="mx-auto">
        <div style="padding-inline: 5%;">
        <h2 class="fw-bold mt-5" style="color: #015AAA;">1.6 Messages</h2>
        <p class="mb-4">We collect information about you when you send, receive, or engage with messages in connection with our Services. For example, if you get a Thrivian connection request, we track whether you have acted on it and will send you reminders. We also use automatic scanning technology on messages to support and protect our site. For example, we use this technology to suggest possible responses to messages and to manage or block content that violates our User Agreement or Professional Community Policies from our Services.</p>
        </div>
    </div>

    <div class="mx-auto">
        <div style="padding-inline: 5%;">
        <h2 class="fw-bold mt-5" style="color: #015AAA;">1.7 Other</h2>
        <p class="mb-4">Our Services are dynamic, and we often introduce new features, which may require the collection of new information. If we collect materially different personal data or materially change how we collect, use or share your data, we will notify you and may also modify this Privacy Policy.</p>
        </div>
    </div>

    <div class="mx-auto">
        <div style="padding-inline: 5%;">
        <h1 class="fw-bold mt-5" style="color: #015AAA;">2. How We Use Your Data</h1>
        <h2 class="fw-bold mt-5" style="color: #015AAA;">2.1 Services</h2>
        <h3 class="py-3">Stay Connected</h3>
        <p class="mb-4">Our Services allow you to stay in touch and up to date with colleagues, partners, clients, and other professional contacts. To do so, you can “connect” with the professionals who you choose, and who also wish to “connect” with you. Subject to your and their settings, when you connect with other Members, you will be able to search each others’ connections in order to exchange professional opportunities.</p>
        <p class="mb-4">We use data about you (such as your profile, profiles you have viewed or data provided through address book uploads or partner integrations) to help others find your profile, suggest connections for you and others (e.g. Members who share your contacts or job experiences) and enable you to invite others to become a Member and connect with you. You can also opt-in to allow us to use your precise location or proximity to others for certain tasks (e.g. to suggest other nearby Members for you to connect with, calculate the commute to a new job, or notify your connections that you are at a professional event).</p>
        <p class="mb-4">It is your choice whether to invite someone to our Services, send a connection request, or allow another Member to become your connection. When you invite someone to connect with you, your invitation will include your network and basic profile information (e.g., name, profile photo, job title, region). We will send invitation reminders to the person you invited. You can choose whether or not to share your own list of connections with your connections.</p>
        <h3 class="py-3">Stay Informed</h3>
        <p class="mb-4">
            Our Services allow you to stay informed about news, events and ideas regarding professional topics you care about, and from professionals you respect. Our Services also allow you to improve your professional skills, or learn new ones. We use the data we have about you (e.g., data you provide, data we collect from your engagement with our Services and inferences we make from the data we have about you), to personalize our Services for you, such as by recommending or ranking relevant content and conversations on our Services. We also use the data we have about you to suggest skills you could add to your profile and skills that you might need to pursue your next opportunity. So, if you let us know that you are interested in a new skill (e.g., by watching a learning video), we will use this information to personalize content in your feed, suggest that you follow certain members on our site, or suggest related learning content to help you towards that new skill. We use your content, activity and other data, including your name and photo, to provide notices to your network and others. For example, subject to your settings, we may notify others that you have updated your profile, posted content, took a social action, used a feature, made new connections or were mentioned in the news.
        </p>
        <h3 class="py-3">Productivity</h3>
        <p class="mb-4">Our Services allow you to collaborate with colleagues, search for potential clients, customers, partners and others to do business with. Our Services allow you to communicate with other Members and schedule and prepare meetings with them. If your settings allow, we scan messages to provide “bots” or similar tools that facilitate tasks such as scheduling meetings, drafting responses, summarizing messages or recommending next steps.</p>
    </div>
    </div>

    <div class="mx-auto">
        <div style="padding-inline: 5%;">
        <h2 class="fw-bold mt-5" style="color: #015AAA;">2.2 Communications</h2>
        <p class="mb-4">We will contact you through email, mobile phone, notices posted on our websites or apps, messages to your Thrivian inbox, and other ways through our Services, including text messages and push notifications. We will send you messages about the availability of our Services, security, or other service-related issues. We also send messages about how to use our Services, network updates, reminders, job suggestions and promotional messages from us and our partners. You may change your communication preferences at any time. Please be aware that you cannot opt out of receiving service messages from us, including security and legal notices.</p>
        <h2 class="fw-bold mt-5" style="color: #015AAA;">2.3 Security and Investigations</h2>
        <p class="mb-4">We use your data (including your communications) for security purposes or to prevent or investigate possible fraud or other violations of our User Agreement and/or attempts to harm our Members, Visitors or others.</p>
    </div>
    </div> 
</main>

         <!-- Footer yang berisi informasi mengenai perusahaan, navigasi halaman, dan akun sosial media -->
         <footer id="footer" class="text-light">
            <div class="container">
                <div class="row text-center text-md-start">
                    <div class="col-md-12 d-flex justify-content-center justify-content-md-start align-items-center mb-3">
                        <img src="{{asset('/assets/img/thrivian-white.png')}}" alt="logo-thrivian" class="footer-logo">
                    </div>
                    <hr class="mt-3" style="border-top: 3px solid #E5E5E5;">
                    <div class="col-md-3 footer-col">
                        <h6 class="pb-3">Thrivian.org</h6>
                        <ul>
                            <li><a href="intro_page.html">Tentang Kami</li></a>
                            <li>Kontak Kami</li>
                            <li>Merchandise</li>
                            <li>Blog</li>
                        </ul>
                    </div>
                    <div class="col-md-3 footer-col">
                        <h6 class="pb-3">Layanan Kami</h6>
                        <ul>
                            <li><a href="community.html">Community</li></a>
                            <li><a href="home_events.html">Event</li></a>
                            <li><a href="#">E-Learning</li></a>
                            <li>Bantuan</li>
                        </ul>
                    </div>
                    <div class="col-md-3 footer-col">
                        <h6 class="pb-3">Lainnya</h6>
                        <ul>
                            <li>Syarat dan Ketentuan</li>
                            <li><a href="{{route('privacy')}}">Kebijakan Privasi</li></a>

                        </ul>
                    </div>
                    <div class="col-md-3 footer-col">
                        <h6 class="mb-3">Ikuti Kami</h6>
                        <div class="social-icons">
                            <a href="#"><i class="bi bi-youtube"></i></a>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-twitter"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center py-5">
                    <p>Thrivian.org @ 2024. All rights reserved.</p>
                </div>
            </div>
        </footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>
