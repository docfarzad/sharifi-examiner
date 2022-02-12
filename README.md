# سامانه آزمون گیری تمام خودکار شریفی

سامانه آزمونیار شریفی یک سامانه تمام خودکار آزمونگیری می باشد. چنانچه در محیط های فرهنگی تدریس میکنید و نیاز به یک سامانه برای آزمونگیری از دانش آموزان خود هستید، میتوانید با بهره گیری از این سیستم، کار آزمون گیری و کارنامه دهی را به صورت تمام اتوماتیک انجام دهید

**کلیه بخش های سامانه به زبان فارسی طراحی شده است**

-----

### راهنمای کار با سامانه


آموزش کار و شرح امکانات سامانه بصورت ویدیویی [در اینجا موجود است](http://me.refinedview.com/?p=62 "در اینجا موجود است")


-----

### آموزش نصب

1. Create a MySQL database and import "db.sql" into it. 
2. Copy the contents of the "htdocs" folder into the root directory of your website (typically "public_html"). 
3. Create a folder named "files" in the root directory (next to the 'CSS' folder), then change its permission to 755.
4. Edit the following 2 files to finalize the installation:



###### 	"config.php":
- [Line 4](https://github.com/docfarzad/sharifi-examiner/blob/f100d4840e795af9015cb9ad396d0107b681bf84/htdocs/config.php#L4 "Line 4"): set "$base_url" to the URL to your website where the examiner is hosted. It must include a slash (/) in the end.
- [Line 5](https://github.com/docfarzad/sharifi-examiner/blob/f100d4840e795af9015cb9ad396d0107b681bf84/htdocs/config.php#L5 "Line 5"): set "$totalexamsfornewuser" to the number of exams you wish to assign to new users. This is the total number of exams a new user can make.
- [Line 6](https://github.com/docfarzad/sharifi-examiner/blob/f100d4840e795af9015cb9ad396d0107b681bf84/htdocs/config.php#L6 "Line 6"): for "$con", set the credentials for the connection to your database of choice (where you previously imported "db.sql").

###### 	"auth.php":
- [Line 14](https://github.com/docfarzad/sharifi-examiner/blob/f100d4840e795af9015cb9ad396d0107b681bf84/htdocs/auth.php#L14 "Line 14"): for "$con", set the credentials for the connection to your database of choice (where you previously imported "db.sql").
- [Line 51](https://github.com/docfarzad/sharifi-examiner/blob/f100d4840e795af9015cb9ad396d0107b681bf84/htdocs/auth.php#L51 "Line 51"): for "$cont", set the credentials for the connection to your database of choice (where you previously imported "db.sql").

**Done! Test the system at the URL you specified for "$base_url". You must register first.**



------

##### **Donate**
[PayPal](https://www.paypal.me/docfarzad "PayPal")


