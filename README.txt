##### Development VM #####
System hostname = cpu6013.dev
system ip address 192.168.0.100
login:
root = superuser
student = cpu6013_dev

database login:
student = twp_db_user

NB: the /etc/hosts file has mapped tp the CentosCPU6013-DevServer VM as part of this appliance package.
##### Server VM #####
System hostname = twp
system ip address 192.168.0.80
login:
root = superuser
student = cpu6013_dev

database login:
student = twp_db_user

CODE IS LOCATED IN: /var/www/html/october
(cd //var/www/html/october)

To access the site, turn on both VM's and then in the dev vm navigate to twp/october in your browser.
See How to Use doc for further info.
