<!DOCTYPE html>
<html>
<head>
<style> 
div
{
border:15px solid transparent;
width:250px;
padding:10px 20px;
}

#round
{
-webkit-border-image:url(../public/images/favicon.png) 30 30 round; /* Safari 5 */
-o-border-image:url(../public/images/favicon.png) 30 30 round; /* Opera 10.5-12.1 */
border-image:url(../public/images/favicon.png) 30 30 round;
}

#stretch
{
-webkit-border-image:url(../public/images/favicon.png) 30 30 stretch; /* Safari 5 */
-o-border-image:url(../public/images/favicon.png) 30 30 stretch; /* Opera 10.5-12.1 */
border-image:url(../public/images/favicon.png) 30 30 stretch;
}
</style>
</head>
<body>

<p><strong>Note:</strong> Internet Explorer 10, and earlier versions, do not support the border-image property.</p>

<p>The border-image property specifies an image to be used as a border.</p>

<div id="round">Here, the image is tiled (repeated) to fill the area.</div>
<br>
<div id="stretch">Here, the image is stretched to fill the area.</div>

<p>Here is the image used:</p>
<img src="border.png">

</body>
</html>