


            <div class="modal fade" id="EDITProjectTeam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-gradient-light text-dark">
                            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        <form action="{{ route('submission-details.project-teams.update', $projectTeam->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="member_name" value="{{ $projectTeam->member_name }}">
                            <input type="text" name="role" value="{{ $projectTeam->role }}">
                            <button type="submit">Update</button>
                        </form>




                        </div>
                        <div class="modal-footer">
                            <h6 class="text-primary">LICOMS</h6>
                        </div>
                    </div>
                </div>
            </div>
