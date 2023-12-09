<!-- Modal -->
<div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel">Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <div style="text-align: center;">
                    <br>
                    <label>{{ $data->project_name }}</label>
                    <br>
                </div>

                <label>Status</label>
                <p>{{ $records->status }}</p>
                <br>

                <label>Research Group</label>
                <p>{!! $data->research_group !!}</p>
                <br>

                <label>Author(s):</label>
                {{ $data->authors }}
                <p>{{ $data->user->name }}</p>
                @foreach ($projMembers as $member)
                    <p>{{ $member->member_name }}</p>
                @endforeach
                <br>

                <label>Introduction</label>
                <p>{!! $data->introduction !!}</p>
                <br>

                <label>Aims and Objectives</label>
                <p>{!! $data->aims_and_objectives !!}</p>
                <br>

                <label>Background</label>
                <p>{!! $data->background !!}</p>
                <br>

                <label>Expected Research Contribution</label>
                <p>{!! $data->expected_research_contribution !!}</p>
                <br>

                <label>The Proposed Methodology</label>
                <p>{!! $data->proposed_methodology !!}</p>
                <br>

                <label>Work Plan</label>
                <p>{!! $data->workplan !!}</p>
                <br>

                <label>Resources</label>
                <p>{!! $data->resources !!}</p>
                <br>

                <label>References</label>
                <p>{!! $data->references !!}</p>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
