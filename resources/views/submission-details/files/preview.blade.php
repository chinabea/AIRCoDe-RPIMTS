<!DOCTYPE html>
<html>
<head>
    <title>PDF Preview</title>
</head>
<body>
    <h1>PDF Preview</h1>
    <embed src="{{ Storage::url($filePath) }}" width="100%" height="600px" type="application/pdf">
</body>
</html>
