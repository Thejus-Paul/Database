# Database
I created Database to organize and to have a quick overview of the downloaded movies, tv series and anime that I have. Database is made from PHP and MySQL.

To install, Please follow these steps:
1. Download XAMPP or any other webserver application having php and mysql.(I personally use usbwebserver)
2. Import videos.sql through PHPmyAdmin.
3. Put rest of the files in Root Directory of PHP server.
4. Now start the webserver and open localhost/index.php
5. It should open a website.

Notice: The given steps will only ensure that this website is working. To be able to use them you need the files in this tree

Database
  |
  |__Videos
      |
      |__Anime
      |   |__(all the anime with folder name same as in mysql and file name according to episode list.)
      |
      |__Movies
      |   |__(all the movies with folder name and file name same as in the mysql.)
      |
      |__TV
          |__(all the TV series with folder name same as in mysql and file name according to episode list.)
      

If you want to, you can delete the file names and images that are given and create your own by a simply editing the code.
