# Minecraft-Server-Hosting
An implementation of a Minecraft Server Hosting site.

Server-side handled in PHP.

The `minecraft_server.1.19.2.jar` sheould be under a folder called `server_files/`.

## How it works
When the user presses start, or stop, or types a command and sends it to the server, it is communicated via a subprocess pipe (which the PHP script starts and maintains) to the minecraft subprocess.

The output of the subprocess is live sent to the webpage via AJAX, so data can be send without refreshing of the page.
