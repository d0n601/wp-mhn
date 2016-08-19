# wp-mhn
Integrates your [Modern Honeypot Network Server](https://github.com/threatstream/mhn) and your [Wordpress Blog](https://wordpress.org) via MHN's REST API and WP's shortcodes


## Installation and Usage
1. [Download](https://github.com/d0n601/wp-mhn/archive/master.zip) wp-mhn as a zip file, or clone the repo and compress it.
2. Edit ```config.sample.php``` with information corresponding to your MHN server.
3. Save/Rename ```config.sample.php``` to ```config.php```
4. Upload the plugin to your blog and activate it.
5. Add shortcodes to pages which you desire the corresponding information to appear.
    * ```[last_day]```
    * ```[top_attackers]```
    * ```[honeypot hp="HONEYPOT"]```
    * ```[sessions]```


## Examples
1. ```[last_day]``` [Attacks over last 24 hours](https://ryankozak.com/honeypots/last-24-hours/)
2. ```[top_attackers]``` [Top Attacking IP Addresses](https://ryankozak.com/honeypots/)
3. ```[honeypot hp="glastopf"]``` [Glastopf Honeypot Output](https://ryankozak.com/honeypots/glastopf/)
4. ```[honeypot hp="dionaea"]``` [Dionaea Honeypot Output](https://ryankozak.com/honeypots/dionaea/)
5. ```[honeypot hp="wordpot"]``` [Wordpot Honeypot Output](https://ryankozak.com/honeypots/wordpot/)
6. ```[sessions]``` [Sessions by Attacking IP, must contain GET souce_ip](https://ryankozak.com/attackers-sessions/?source_ip=89.163.140.254) 


## Contributions
This plugin is not on the Wordpress Plugin Directory. I developed it to meed the needs of my blog, and open sourced it as it may be a quick start for other developers looking to do something similar.
If you'd like to contribute additional shortcodes or implement WP-Admin functionality then please submit a pull request and I'll potentially merge it.
