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
#ini fieldset input#usuario,
#ini fieldset input#seguidores,
#ini fieldset input#visitas,
#ini fieldset input#url,
#ini fieldset input#direccion,
#ini fieldset input#correo{
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
               
                <h2><img id="candado" src="./imagenes/usuario.png">Registro de Medio</h2>
                  <form method="POST" action="registroMedio.php">
            <fieldset>
            {$frase}
                 {literal} 
            <input type="text" id="usuario" name="user" pattern="[A-Z]*[a-z]+[0-9]{0,9}"   placeholder="Usuario" required><br><br>
                 {/literal} 
            {literal} 
            <input type="email" id="correo"  pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$" name="correo"  placeholder="Correo" required="required"><br><br>
             {/literal} 
            <input type="password" id="pass" name="pass" placeholder="Contraseña" required><br><br>
            <input type="text" id="direccion" name="direccion" placeholder="Dirección" required><br><br>
            {literal} 
            <input type="text" id="visitas" pattern="[0-9]{0,9}" name="visitas"  placeholder="Visitas" required><br><br>
            {/literal}
            {literal} 
            <input type="text" id="url" name="url" pattern="^http://www.[a-z]+[0-9]*[a-z]*(.com|.es)$"  placeholder="URL en http sin /" required><br><br>
               {/literal}{literal} 
            <input type="text" id="seguidores"  pattern="[0-9]{0,9}" name="seguidores"  placeholder="Seguidores" required><br><br>
            {/literal} 
            <input type="submit" name="enviar" value="Pedir registro">         
            </fieldset>
      
        </form> </div>
    </body>
</html>