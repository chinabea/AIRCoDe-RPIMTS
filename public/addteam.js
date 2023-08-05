
    document.addEventListener('DOMContentLoaded', function () {
        const showAddTeamFormButton = document.getElementById('showAddTeamFormButton');
        const addTeamForm = document.getElementById('addTeamForm');

        showAddTeamFormButton.addEventListener('click', function () {
            addTeamForm.style.display = 'block';
        });
    });
