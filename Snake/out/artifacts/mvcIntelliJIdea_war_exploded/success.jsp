
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Snake</title>
    <link rel="stylesheet" type="text/css" href="snake-style.css">
    <script type="text/javascript" src="snake-script.js"></script>

</head>
<body style="background-color:lightblue">
<%
    out.write(
            "<center><label id=\"minutes\">00</label>:<label id=\"seconds\">00</label></center>\n" +
            "<div id=\"container\">\n" +
            "   <div id=\"body_snake\" onclick=\"init()\"></div>\n" +
            "</div>\n" +
            "<script type=\"text/javascript\" src=\"snake-script.js\"></script>\n"
    );
%>

</body>
</html>