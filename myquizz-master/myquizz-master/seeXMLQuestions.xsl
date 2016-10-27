<?xml version="1.0" encoding ="ISO-8859-1"?>
<xsl:stylesheet version= "1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html>
<body>
	<h3>XML Fitxategia TRANFORMATUA</h3>
	<table align="center" border="2">
		<thead>
			<tr><th>Galdera</th><th>Zailtasuna</th><th>Gaia</th></tr>
		</thead>
	<xsl:for-each select ="/assessmentItems/assessmentItem">
		<tr>
			<td align="left"> <FONT SIZE="3">
				<xsl:value-of select ="itemBody/Galdera"/><br/>
			</FONT></td>
			
			<td align="center"><FONT SIZE="3">
				<xsl:value-of select ="@Zailtasuna"/><br/>
			</FONT></td>
		
			<td align="left"><FONT SIZE="3">
				<xsl:value-of select ="@Gaia"/><br/>
			</FONT></td>
		</tr>
	</xsl:for-each>
	</table>
	<br/>
	<a href="Ekintzak.html"> <img src="./irudiak/atzera.jpg" height="50px"  width="50px"/></a>
	
</body>
</html>
</xsl:template>
</xsl:stylesheet>