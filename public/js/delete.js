
function confirmDelete(url) {
    if (confirm('Are you sure you want to delete this record?')) {
    // Create a hidden form and submit it programmatically
    var form = document.createElement('form');
    form.action = url;
    form.method = 'POST';
    form.innerHTML = '@csrf @method("delete")';
    document.body.appendChild(form);
    form.submit();
    }
}