# Discount Juice Shop

A parody on the OWASP Juice Shop vulnerable web appication comes my Web Application Security final project, where we were tasked with creating our very own **discount** juice shop!

In this course I
- Built a LAMP stack and worked toward hardening the server.
- Got my first experience with MySQL and PHP, as I continue to build a Web Application (an online store) on this stack.
- Got experience using Burp Suite (Community Edition) and OWASP ZAP to test the security of my web app.
- Setup phpMyAdmin to manage my databases
- Created two databases; one for products being sold on my website and one for login credentials. Passwords are stored in the database as hash values.
- Setup the app as a CRUD app, allowing creating, reading, updating, and deleting of elements in the database from the website.
- Setup authentication so that only logged in users could access CRUD pages (specifically the create, update, and delete pages). Additionally, learned about session management.
- Ran DirBuster against my webserver to see how files and directories of my web server could be brute-forced.
- Learned about and implemented Cross-site scripting (XSS) mitigations.
- Learned about and implemented SQL Injection (SQLi) mitigations.
- Learned about and implemented Cross Site Request Forgery (CSRF) mitigations, including how to setup session tokens.

All within an 8 week course! Now if only I had taken a PHP and databse course beforehand...

## Requirements
This application was designed on top of a LAMP stack running:
- Ubuntu 20.04 LTS
- Apache/2.4.41 (Ubuntu)
- MySQL Ver 8.0.32-0ubuntu0.20.04.2
- PHP 7.4.3-4ubuntu2.18
