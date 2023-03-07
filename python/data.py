<html>
<head>
<style>
tr:nth-child(even) {background-color: #f2f2f2;}
a{
color:white;
background-color:#FF3399;
padding:5px 15px 5px 15px;
text-decoration:none;
border-radius:20px;
text-align:center;
display: block;
width: 120px;
}
.login-dark
{
background-color:rgb(30,40,51);
text-align:center;
padding:20px;
width:350px;
height:450px;
border-radius:5px;
}

* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}
</style>
</head>
<body style="background-color:rgb(6,23,58)">
<table border="0" width="100%" height="10%" bgcolor="#000000" style="position: absolute; top: 0; bottom: 0; left: 0; right: 0;border-bottom:1px dotted white;">
<tr>
<td style="color:#ffffff;font-size:50px;text-shadow:2px 2px 2px red">Project Reporting</td>
<td width="10%" align="center"> <a href="index">Home</a></td>
<td width="10%" align="center"> <a href="about">About</a></td>
<td width="10%" align="center"> <a href="projectreg">Registration</a></td>
<td width="10%" align="center"> <a href="projectlist">Project List</a></td>
    <td width="10%" align="center"> <a href="proupdate">Pro Update</a></td>
<td width="10%" align="center"> <a href="admin">Admin</a></td>
</tr>
</table><br><br><br><br><br><br><br>

<table border="0" style="box-shadow:1px 1px 10px white" width="70%" height="70%" align="center">
<tr>
<td style="background-position:center center" valign="top" align="center">
 <table border="0" cellpadding="8px" width="100%" style="background-color:#CCCCCC">
 <tr style="background-color:navy;color:white">
 <td>Project Name</td>
 <td>Technology Used</td>
 <td>Brief Description</td>
 <td>Group Members</td>
 <td>Status</td>
 </tr>
  {% for item in data %}
<tr>
 <td>{{item.PRO_NAME}}</td>
 <td>{{item.TECHNOLOGY}}</td>
 <td>{{item.DESCRIPTION}}</td>
 <td>{{item.GROUP_NAME}}</td>
 {% if item.PRO_STATUS == 'Rejected' %}
       <td style="background-color:red"> {{item.PRO_STATUS  }}</td>
   {% elif item.PRO_STATUS == 'Accepted' %}
      <td style="background-color:green"> {{item.PRO_STATUS  }}</td>
  {% else %}
      <td style="background-color:yellow"> {{item.PRO_STATUS  }}</td>
    {% endif %}
 </tr>
  {% endfor %}
 </table>
 
 </td>
</tr>
<tr style="background-color:black;color:white;height:25px">
<td colspan="2"><marquee behavior="alternate">
Welcome of You in my Project.
</marquee></td>
</tr>
</table>
</body>
</html>