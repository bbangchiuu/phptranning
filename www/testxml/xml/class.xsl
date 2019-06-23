<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
  <body>
  <h2>My Class list</h2>
  
  <table border="1">
    <tr bgcolor="#9acd32">
      <th>class  name</th>
    </tr>
    
	<xsl:for-each select="school/fpt/class">
    <tr>
      <td><xsl:value-of select="@name" /></td>
    </tr>
  </xsl:for-each>
	
	<xsl:for-each select="school/vin/class">
    <tr>
      <td><xsl:value-of select="@name" /></td>
    </tr>
  </xsl:for-each>	
  </table>
  
  <table border="1">
    <tr bgcolor="#9acd32">
      <th>id</th>
	  <th>name</th>
	  <th>phone</th>
	  <th>address</th>
    </tr>

    <xsl:for-each select="school/fpt/class/student">
    <tr>
		<td><xsl:value-of select="id" /></td>
		<td><xsl:value-of select="name" /></td>
		<td><xsl:value-of select="phone" /></td>
		<td><xsl:value-of select="address" /></td>
    </tr>
    </xsl:for-each>

    <xsl:for-each select="school/vin/class/student">
    <tr>
		<td><xsl:value-of select="id" /></td>
		<td><xsl:value-of select="name" /></td>
		<td><xsl:value-of select="phone" /></td>
		<td><xsl:value-of select="address" /></td>
    </tr>
    </xsl:for-each>
  </table>
  
  </body>
  </html>
</xsl:template>

</xsl:stylesheet>