<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        h1, h2 { font-weight: bold; }
    </style>
</head>
<body>
<h1>Resume</h1>
<div>{!! nl2br(e($resume)) !!}</div>

<h2>Cover Letter</h2>
<div>{!! nl2br(e($coverLetter)) !!}</div>
</body>
</html>
