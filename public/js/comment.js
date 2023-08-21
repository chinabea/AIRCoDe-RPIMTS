// public/js/comment.js

let selectedText = '';

document.addEventListener('mouseup', () => {
    selectedText = window.getSelection().toString().trim();
    if (selectedText !== '') {
        showCommentInput();
    }
});

function showCommentInput() {
    const commentInput = document.createElement('div');
    commentInput.innerHTML = `
        <form id="commentForm">
            @csrf
            <textarea class="form-control" id="commentText" rows="3" placeholder="Enter your comment"></textarea>
            <button type="submit" class="btn btn-primary">Submit Comment</button>
        </form>
    `;

    commentList.innerHTML = '';
    commentList.appendChild(commentInput);

    const commentForm = commentInput.querySelector('#commentForm');
    const commentText = commentInput.querySelector('#commentText');

    commentForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        const projectId = commentForm.dataset.projectId;

        const response = await fetch(`/projects/${projectId}/comments`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                content: commentText.value,
                selected_text: selectedText
            })
        });

        if (response.ok) {
            selectedText = '';
            commentText.value = '';
            fetchComments();
        }
    });
}
