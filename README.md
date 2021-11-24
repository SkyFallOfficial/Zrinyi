<h1 align="center">Zrinyi/h1>
<p align="center">A fork of Znix's panel.</p>

> Panel made by Znix, modified by me. <br />
> Default login: `admin:admin` <br />
> Join Znix's Discord server: https://discord.gg/9Ef5t2fMkk

---

### Features
###### AUTH
* Login
* Register (Invite only.)
* Password reset (W.I.P)
###### USER
* Change password
* Activate subscription with code (32 days)
* Download loader (Needs a subscription.)
* Look at your support pin
###### ADMIN PANEL
* Generate invite code
* Generate subscription code
* Ban/unban user
* Make user admin/non-admin
* Reset hardware ID (HWID)
* Set cheat detected/undetected
* Set maintenance/non-maintenance
* Set cheat version
* Look at the support pin for users
###### API
###### Note: User password and hardwareid has to be sent in base64 format.
* Sends user data in JSON format on call.
	* Usage: `api.php?user={username}&pass={password}&hwid={hwid}&key={key}`
	* Example: `api.php?user=admin&pass=YWRtaW4=&hwid=aHdpZA==&key=yes`

---

### Functions 
###### List of functions and methods which you should know, to modify.
* SessionController
	* isLogged - `Returns true if user is logged, else false.` 
	* isAdmin - `Returns true if user is admin, else false.`
	* isBanned - `Returns true if user is banned, else false.`
* UtilController
	* navbar - `Calls include/navbar.inc.php in the page.`
	* footer - `Calls include/footer.inc.php in the page.`
	* head - `Calls include/head.inc.php in the page. Pass page title into this.` *Requires 1 parameter.*
	* redirect - `Redirects to paramter provided.` *Requires 1 parameter.*
	* display - `Sanitzes the parameter with htmlspecialchars.` *Requires 1 parameter.*

---

### Installation 
* Change database information in app/core/Database.php. <br>
* Import DB.sql file. <br>
* Change Site information in app/core/Config.php.

---

### Credits
* Znix for making the panel: https://github.com/znixbtw/panel-v2
