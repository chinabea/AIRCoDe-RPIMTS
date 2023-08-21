<!DOCTYPE html>
<html>
<head>
    <!-- Include Bootstrap CSS and other necessary stylesheets -->
</head>
<body>
    <div class="container mt-5">
        <h1>Research Project Review</h1>
        <div class="row">
            <div class="col-md-8">
                <h2>Project Title</h2>
                <p>Project details and content go here...</p>
                
                <!-- Comment Section -->
                <div class="card mt-4">
                    <div class="card-header">
                        Comments
                    </div>
                    <div class="card-body">
                        <ul class="list-group" id="commentList">
                            <!-- Comments will be dynamically added here -->
                        </ul>
                    </div>
                </div>
                
                <!-- Comment Form -->
                <div class="card mt-4">
                    <div class="card-header">
                        Add Comment
                    </div>
                    <div class="card-body">
                        <form id="commentForm">
                            <div class="form-group">
                                <textarea class="form-control" id="commentText" rows="3" placeholder="Enter your comment"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Include Bootstrap JS and other necessary scripts -->
    <script src="your-script.js"></script>
</body>
</html>
