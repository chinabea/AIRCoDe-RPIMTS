<!DOCTYPE html>
<html>
<head>
    <title>TinyMCE Editor Example</title>
    <script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
    <textarea id="editor"></textarea>

    <script>
        tinymce.init({
            selector: '#editor'
        });
    </script>
</body>
</html>
