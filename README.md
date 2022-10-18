# blogSiem
The Security information and event management (SIEM) based on the blog website.

Blog content management system (CMS) with the CRUD features. 
In addition, through simple Security information and event management (SIEM) to monitoring the whole website (collect logs, events), 
and detected Cross-site scripting (XSS), SQL Injection, Spam script. Then process some analysis and catch visitor details information.

The whole project basically developed in PHP.




<h2>Blog Website Application</h2>


![image](https://user-images.githubusercontent.com/66684175/196557542-e1ef583a-43fd-4dee-a8ee-141025cb5357.png)
This page is a small-website application for this project using to collecting data for the SIEM. Which is our blog application for showing the article. 

![image](https://user-images.githubusercontent.com/66684175/196557803-2b2f4d4b-64d3-4fa2-82b0-26d2719054f8.png)

Visitors can watch the post and comment on this page without login.

![image](https://user-images.githubusercontent.com/66684175/196557823-e49668af-448d-42c0-9951-66c5ef14d860.png)
The Admin Panel of Post Management
which can process all the activities related to the post on this website.



<h2>Security Information and Event Management (SIEM)</h2>

![image](https://user-images.githubusercontent.com/66684175/196557907-fd7701a4-1c12-4692-a783-ccb2a77f93d8.png)
Log data monitoring page

As previously mentioned, this page is the admin panel's log data page, all data collected from the visitor. On this page, each row is a log that can view the visitor's IP address, entering which page and correspond to which file of the website folder. Also, on the page can know the visitor who is entering this website and their website browser agent, which means browser type.

![image](https://user-images.githubusercontent.com/66684175/196557971-dd9e2a30-b402-4efe-90a9-32c28199dc3f.png)
Event log monitoring

This page is the event monitoring page that includes all the event logs, which include the event of the threat, and the alert page at the top of the chart table, which uses the google chart to create which can show data visualization graph to count all types of events. Besides, the middle of the table is the alert table of events. Suppose the website application detected the threats , which will be shown on this table to alert the administrator. Furthermore, the table list at the bottom is the event log caused by the visitor, and each row is an event log that includes the four types of events: normal, XSS, injection, and spam.

![image](https://user-images.githubusercontent.com/66684175/196558089-971eb439-33d2-4182-9401-3e61a81685f3.png)
Threats events tracking page

That page tracks the IP address that causes a very suspicious event or threat. That must copy or input the IP on the top of the search bar text box, then click the search button, showing the graph like this, which will display the details information and some of the maps belonging this the IP address. The information type includes continent, country code, region, region name, city, zip code, coordinate, city location, time zone, the internet supplier's information ISP, ORG, AS and can detect whether using a mobile device or proxy (VPN) and hosting server. Besides, the bottom of the page can input the IP and some content describing this IP, such as XSS, injection or spam, to bookmark this record.

![image](https://user-images.githubusercontent.com/66684175/196558111-8794a64f-25ce-4cf4-931b-e39f7ad49a66.png)
Monitoring Bookmarked List

![image](https://user-images.githubusercontent.com/66684175/196558131-d46b9299-127d-449e-8fad-bb4f8d372cc3.png)
The IP distributed graph of the bookmarked record

These are on the same page. This page views the statistics of the attacker or suspicious IP address from which country or region. Moreover, in the table, these data are added by previous actions.



