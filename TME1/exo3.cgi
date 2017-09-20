#!/bin/sh

cat << EOF
Content-Type : text/html ; charset=utf-8
<html><head>
<meta http-equiv="content-Type" content="text/html; charset=utf-8"/>
<title>Afficher les informations connues du serveur </title> 
</head>
<body><div>
EOF
echo "je suis <a href='www.apache.org'>$SCRIPT_NAME</a>servi par <a href='www.apache.org'>$SERVER_SOFTWARE</a>pour <a href='www.apache.org'>$HTTP_USER_AGENT</div></body></html>"
