<?xml version="1.0"?>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">

<html>
	<body>
		<h2>Library</h2>
		<table border="1">
			<tr>
				<td>Title</td>
				<td>Author</td>
				<td>Category</td>
				<td>Year</td>
			</tr>
			<xsl:for-each select="library/book">
			<xsl:sort select="category"/>
			<xsl:sort select="title"/>
                <tr>
                    <td><xsl:value-of select="title"/></td>
                    <td><xsl:value-of select="author"/></td>
					<td><xsl:value-of select="category"/></td>
                    <td><xsl:value-of select="year"/></td>
                </tr>
			</xsl:for-each>
		</table>
	</body>
</html>

</xsl:template>
</xsl:stylesheet>