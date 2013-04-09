mdpx-web-ui
===========

Web interface for viewing and manipulating data in the MDPX database.

MDPX is a research project initiated by the Physics Department at Auburn University. The project supports multi-institutional collaboration and research.

Dependencies
============

This project is a web application written in PHP and Yii Framework. The following are the requirements.

- PHP (5.4.7 or later for PHPUnit test)
- Yii Framework 1.1.13 or later
    - This application has not been tested with Yii 2.0.


Operational Requirements
========================

In additional to dependencies list above, the following are needed to run the application.

- A relational database
    - Most relational database will most likely work, but Yii Framework does use foreign key constraints in the object model classes. This project has been tested with MySQL 5.1.67
- A web server that supports PHP
    - This application was written with Apache 2.
