<div align="center" style="width:100%;">
<h1>Startup Engine</h1>
A beautiful & open-source platform for launching startups.<br>
<img src="storage/docs/images/logo.png" width="100">    
</div>

<img src="storage/docs/screenshots/admin.jpg" alt="Startup Engine Admin Panel" style="border:1px solid #eee;border-radius:5px;"><br>

# Key Features

- [x] Publish & sell software/content subscriptions.
- [x] Completely plug-and-play. Coding is optional.
- [x] Supports any workflow, architecture, or framework.
- [x] JSON API allows you integrate with external sites/apps.
- [x] Completely open-source.
- [x] 1-Click Install.

# Installation

<div> After cloning the repository: </div>
<ul>
  <li> Rename '.env.example' to '.env' </li>
  <li> Create an empty database with a name of your choosing </li>
  <li> Edit '.env' with the correct parameters (connection, host, port, database, username, and password).</li>
</ul>

<div> In a terminal, run the following commands: </div>
  <code> cd startupengine </code><br>
  <code> composer install </code><br>
  <code> php artisan key:generate </code><br>
  <code> php artisan migrate:refresh --seed </code><br>
  <code> php artisan serve </code>
<div> go to this URL: <a href="localhost:8000">StartupEngine</a> </div>

# Deployment

Click the button below to deploy a new instance of Startup Engine to Heroku instantly.

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy?template=https://github.com/luckyrabbitllc/StartupEngine)

# Contact Us

### E-mail
Have suggestions, concerns, or feature requests? [Send us an e-mail](mailto:inbox-w8agf2hymzpvnw4zcudlfwpa@inbound.productboard.com).

### Code Support
Found a bug? [Submit an issue.](https://github.com/startupengine/startupengine/issues)


# License

Startup Engine is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
