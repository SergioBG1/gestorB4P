<html>
    <head>
        <style>
            html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}
body {
	line-height: 1;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}
body {
	background-color: #C0C0C0;
	color: #000;
	font-family: "Varela Round", Arial, Helvetica, sans-serif;
	font-size: 16px;
	line-height: 1.5em;
}

input {
	border: none;
	font-family: inherit;
	font-size: inherit;
	font-weight: inherit;
	line-height: inherit;
	-webkit-appearance: none;
}

/* ---------- LOGIN ---------- */

#ini {
	margin: 50px auto;
	width: 400px;
}

#ini h2 {
	background-color: #6AD521;
	-webkit-border-radius: 20px 20px 0 0;
	-moz-border-radius: 20px 20px 0 0;
	border-radius: 20px 20px 0 0;
	color: #fff;
	font-size: 28px;
	padding: 20px 26px;
}

#ini h2 span[class*="fontawesome-"] {
	margin-right: 14px;
}

#ini fieldset {
	background-color: #fff;
	-webkit-border-radius: 0 0 20px 20px;
	-moz-border-radius: 0 0 20px 20px;
	border-radius: 0 0 20px 20px;
	padding: 20px 26px;
}

#ini fieldset p {
	color: #777;
	margin-bottom: 14px;
}

#ini fieldset p:last-child {
	margin-bottom: 0;
}

#ini fieldset input {
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}

#ini fieldset input#pass,
#ini fieldset input#usuario{
	background-color: #eee;
	color: #777;
	padding: 4px 10px;
	width: 328px;
}

#ini fieldset input[type="submit"] {
	background-color: #33cc77;
	color: #fff;
	display: block;
	margin: 0 auto;
	padding: 4px 0;
	width: 100px;
}

#ini fieldset input[type="submit"]:hover {
	background-color: #28ad63;
}
#candado{
width:30px;
height: 30px;
}

        </style>
    </head>
    <body>
        
       
       
            <div id="ini">
               
                <h2><img id="candado" src="./imagenes/usuario.png"> Inicia Sesión de Empresa</h2>
                  <form method="POST" action="login.php">
            <fieldset>
            {$frase}
            <input type="text" id="usuario" name="user" placeholder="Usuario"><br><br>
            <input type="password" id="pass" name="pass" placeholder="Contraseña"><br><br>
            <input type="submit" name="enviar" value="Entrar">         
            </fieldset>
           
        </form> </div>
    </body>
</html>