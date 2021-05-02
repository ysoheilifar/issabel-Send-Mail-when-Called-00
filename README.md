1. copy all file on /var/www/html on issabel with WinSCP

2. set permission 775 or 777 to all files with WinSCP or Linux CLI

3. go to /var/www/html directory

cd /var/www/html

4. open checkcdr00.php and give it database user and pass and save it
$username = "root";
$password = "pass_of_root";

5. open mail.php file and set emails on it
## issabel@gmail.com is issabel Gmail for send mail to admin@yahoo.com
$mail->Username = "issabel@gmail.com";                 
$mail->Password = "pass_of_issabel_Gmail";
$mail->From = "issabel@gmail.com";
$mail->addAddress("admin@yahoo.com", "Recepient Name");

6. Go to the issabel@gmail.com Gmail (Manage your Google Account) then go to the Security and Less Secure app access and enable it

7. run checkcdr00.sh

./checkcdr00.sh

--------------------------------------
## for automatic daily run on crontab


crontab -e
0 1 * * * /var/www/html/checkcdr00.sh
