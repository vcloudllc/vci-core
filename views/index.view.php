<?php include 'partials/head.php'; ?>

<button class="btn btn-success btn-sm" style="margin-bottom: 20px" data-toggle="modal" data-target="#entryModal" data-button="@add">Add a New Entry</button>

<table id="table_id" class="display">
    <thead>
        <tr>
            <th>Unique ID</th>
            <th>Industry</th>
            <th>Application/Service</th>
            <th>Question Category</th>
            <th>Question</th>
            <th>Response</th>
            <th>Approved By</th>
            <th>Edit/Delete</th>
            <th>Modified Date</th>
            <th>Created Date</th>
        </tr>
    </thead>
    <tbody>
        <?php

        foreach($result as $rfp){
            echo "<tr>
            <td>$rfp->id</td>
            <td>$rfp->industry</td>
            <td>$rfp->service</td>
            <td>$rfp->question_category</td>
            <td>$rfp->question</td>
            <td>$rfp->response</td>
            <td>$rfp->approved_by</td>
            <td>
            <div class='btn-group' role='group' aria-label='Basic example'>
            <button class='btn btn-primary btn-sm' data-id='$rfp->id' data-toggle='modal' data-target='#entryModal' data-button='@edit'><i class='far fa-edit'></i></button>
            <button class='btn btn-danger btn-sm' data-id='$rfp->id'><i class='far fa-minus-square'></i></button>
            </div>
            </td>
            <td>$rfp->updated_at</td>
            <td>$rfp->created_at</td>
            </tr>";
        }

        ?>
    </tbody>
</table>

<!-- Add Modal -->
<div class="modal fade" id="entryModal" tabindex="-1" aria-labelledby="entryLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="entryLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="industryselect">Industry</label>
                    <select class="form-control" id="industryselect" multiple required>
                    <option>Education</option>
                    <option>Financial</option>
                    <option>Government</option>
                    <option>Healthcare</option>
                    <option>Hospitality</option>
                    <option>Information Technology</option>
                    <option>Non-Profit</option>
                    <option>Pharmaceutical</option>
                    <option>Retail/Shopping</option>
                    <option>Telecommunication</option>
                    <option>Tourism</option>
                    <option>Transporation</option>
                    <option>All Industries</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="serviceselect">Application/Service</label>
                    <select multiple class="form-control" id="serviceselect" required>
                    <option>Analytics</option>
                    <option>Artificial Intelligence (AI)</option>
                    <option>Auto Transcription</option>
                    <option>Automatic Call Distribution (ACD)</option>
                    <option>Call Center</option>
                    <option>Interactive Voice Response (IVR)</option>
                    <option>Chat/Chatbot</option>
                    <option>Click to Call (CTC)</option>
                    <option>Computer Telephony Integration (CTI)</option>
                    <option>Customer Relations Management</option>
                    <option>Custom Grammar Speech</option>
                    <option>Database</option>
                    <option>Fax</option>
                    <option>Human Transcription</option>
                    <option>Microsite</option>
                    <option>Multimedia</option>
                    <option>Natural Language/Speech AI</option>
                    <option>Notification System</option>
                    <option>Payment Processing</option>
                    <option>Post Call Survey</option>
                    <option>Process Automation</option>
                    <option>Reminders</option>
                    <option>Reporting</option>
                    <option>SMS Gateway</option>
                    <option>Social Media</option>
                    <option>Speech Analytics</option>
                    <option>Surveys</option>
                    <option>Telecommunications</option>
                    <option>Telephony</option>
                    <option>Tracking Software</option>
                    <option>All Applications/Services</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="questioncategoryselect">Question Category</label>
                    <select class="form-control" id="questioncategoryselect" multiple required>
                    <option>Audits</option>
                    <option>Awards/Certifications</option>
                    <option>Business Continuity/Disaster Recovery</option>
                    <option>Case Studies</option>
                    <option>Cost/Pricing</option>
                    <option>Development</option>
                    <option>Documentation/Governance</option>
                    <option>Examples (Flows/Project Plans/Timelines)</option>
                    <option>General VCloud</option>
                    <option>Incident Management</option>
                    <option>IT/Security</option>
                    <option>Quality</option>
                    <option>References</option>
                    <option>Reporting</option>
                    <option>Services Offered</option>
                    <option>SLAs/KPIs/Goals</option>
                    <option>Staffing</option>
                    <option>Standard Operating Procedures (SOPs)/Policies</option>
                    <option>Training</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="question">Question</label>
                    <textarea class="form-control" id="question" rows="3" placeholder="Type the question here..."></textarea>
                </div>
                <div class="form-group">
                    <label for="response">Response</label>
                    <textarea class="form-control" id="response" rows="3" placeholder="Type the response here..."></textarea>
                </div>
                <div class="form-group">
                    <label for="keywords">Keywords</label>
                    <textarea class="form-control" id="keywords" rows="3" placeholder="Type the keywords here, for multiple keywords separate it using commas(,)..."></textarea>
                </div>
                <div class="form-group">
                    <label for="approvedby">Approved By</label>
                    <select class="form-control" id="approvedby">
                    <option>Cristina Cook</option>
                    <option>Crystal Kelley</option>
                    <option>Gerald Merolda</option>
                    <option>James Franklin</option>
                    <option>John Lombardi</option>
                    <option>Rich Scarbath</option>
                    <option>BMS RFP</option>
                    <option>Commonwealth of PA RFP</option>
                    <option>Novartis RFP</option>
                    <option>Pfizer RFP</option>
                    <option>Woodmen Life RFP</option>
                    </select>
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" id="submitbtn"></button>
      </div>
    </div>
  </div>
</div>

<?php include 'partials/footer.php'; ?>
