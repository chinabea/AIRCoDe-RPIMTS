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
                    
                    <label>{{ $data->project_name }}</label>
                </div>

                <label>Status</label>
                <p>{{ $records->status }}</p>

                <label>Research Group</label>
                <p>{!! $data->research_group !!}</p>

                <label>Author(s):</label>
                {{ $data->authors }}
                <p>{{ $data->user->name }}</p>
                @foreach ($projMembers as $member)
                    <p>{{ $member->member_name }}</p>
                @endforeach
                

                <label>Introduction</label>
                <p>{!! $data->introduction !!}</p>
                

                <label>Aims and Objectives</label>
                <p>{!! $data->aims_and_objectives !!}</p>
                

                <label>Background</label>
                <p>{!! $data->background !!}</p>
                

                <label>Expected Research Contribution</label>
                <p>{!! $data->expected_research_contribution !!}</p>
                

                <label>The Proposed Methodology</label>
                <p>{!! $data->proposed_methodology !!}</p>
                

                <label>Work Plan</label>
                <p>{!! $data->workplan !!}</p>
                

                <label>Resources</label>
                <p>{!! $data->resources !!}</p>
                

                <label>References</label>
                <p>{!! $data->references !!}</p>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
