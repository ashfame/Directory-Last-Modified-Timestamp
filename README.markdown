PHP Code to track when was the last time a directory was modified. I needed this to show how long ago was the staging server updated.

Call dlmt() with path as argument to it which you would like to monitor, for eg: themes folder in my case

Normal usage:     echo dlmt( '/home/ashfame/www/git/' );    

WordPress usage: To monitor theme, drop the code in functions.php & use it like     echo dlmt( trailingslashit( dirname( __FILE__ ) );    
